<?php
class Proyecto_otro_apoyo_model extends CI_Model
{
    function obtener_otros_apoyos($proyecto_id)
    {  
        $condiciones = array(
            'id_proyecto' => $proyecto_id
        );

        if ($this->db->where($condiciones)->get('proyecto_otro_apoyo')->num_rows() > 0)
            return $this->db->where($condiciones)->get('proyecto_otro_apoyo');
        else
            return false;
    }


    function nuevo_otro_apoyo($datos)
    {
        $id = 0;
        $agregado = "0";

        $this->db->trans_begin();

        $monto = substr($datos['monto'],0,1);

        if ($monto == "$") 
            $monto_aux = str_replace(',', '', substr($datos['monto'],1)); 
        else  if ($monto != "$") 
            $monto_aux = str_replace(',', '', $datos['monto']);

        // agregar el proyecto
        $proyecto = array(
            'id_proyecto' => $datos['proyecto_id'],
            'origen' => strtoupper($datos['origen']),
            'aplicacion' => strtoupper($datos['aplicacion']),
            'monto' => $monto_aux,
            'porcentaje' => $datos['porcentaje']
        );
        $this->db->insert('proyecto_otro_apoyo', $proyecto);

        // actualizar el monto de otro apoyo en la tabla de proyecto
        $renglon = $this->db->query("select * from proyecto where id = " .  $datos['proyecto_id'])->row();
        $otro_apoyo = $renglon->otro_apoyo;
        $apoyo_fidem = $renglon->apoyo_fidem;
        $otro_apoyo_nuevo = $otro_apoyo + $monto_aux;
        $costo_total = $renglon->apoyo_fidem + $otro_apoyo_nuevo;

        if ($costo_total > 0)
        {
            $otro_apoyo_porcentaje = ($otro_apoyo_nuevo * 100) / $costo_total;
            $apoyo_fidem_porcentaje = ($apoyo_fidem * 100) / $costo_total;
        }
        else
        {
            $otro_apoyo_porcentaje = 0;
            $apoyo_fidem_porcentaje = 0;
        }


        $condiciones=array(
            'id' => $datos['proyecto_id']
        );
        $proyecto = array(
            'otro_apoyo' => $otro_apoyo_nuevo,
            'otro_apoyo_porcentaje' => $renglon->otro_apoyo_porcentaje,
            'costo_total' => $costo_total,
            'apoyo_fidem' => $apoyo_fidem,
            'apoyo_fidem_porcentaje' => $renglon->apoyo_fidem_porcentaje
        );
        $this->db->where($condiciones)->update("proyecto", $proyecto);


        // recalcular el porcentaje para cada registro en proyecto costo en base al nuevo apoyo_fidem en la tabla de proyecto
        /*
        $registros = $this->db->get("proyecto_otro_apoyo");
        foreach($registros->result() as $registro)
        {
            if ($otro_apoyo_nuevo > 0)
                $porcentaje = ($registro->monto * 100) / $costo_total;
            else
                $porcentaje = 100;

            $condiciones = array(
                'id' => $registro->id
            );
            $proyecto_otro_apoyo = array(
                'porcentaje' => $porcentaje
            );

            $this->db->where($condiciones)->update("proyecto_otro_apoyo", $proyecto_otro_apoyo);
        }
        */

        
        // recalcular el porcentaje para cada registro en proyecto costo en base al nuevo apoyo_fidem en la tabla de proyecto
        /*
        $registros = $this->db->get("proyecto_costo");
        foreach($registros->result() as $registro)
        {
            if ($otro_apoyo_nuevo > 0)
                $porcentaje = ($registro->monto * 100) / $costo_total;
            else
                $porcentaje = 100;

            $condiciones = array(
                'id' => $registro->id
            );
            $proyecto_costo = array(
                'porcentaje' => $porcentaje
            );

            $this->db->where($condiciones)->update("proyecto_costo", $proyecto_costo);
        }
        */

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $agregado = "-1";                       
        }
        else
        {
            $this->db->trans_commit();
            $agregado = "1";
        }

        return $agregado;

    }

    function eliminar_otro_apoyo($id)
    {
        $eliminado = false;

        // primero actualizar apoyo fidem de la tabla proyecto
        $renglon = $this->db->query("select * from proyecto_otro_apoyo where id = " . $id)->row();
        $monto_registro = $renglon->monto;
        $proyecto_id = $renglon->id_proyecto;

        // actualizar el monto de otro apoyo en la tabla de proyecto
        $renglon = $this->db->query("select * from proyecto where id = " .  $proyecto_id)->row();
        $otro_apoyo = $renglon->otro_apoyo;
        $apoyo_fidem = $renglon->apoyo_fidem;
        $otro_apoyo_nuevo = $otro_apoyo - $monto_registro;
        $costo_total = $apoyo_fidem + $otro_apoyo_nuevo;

        if ($costo_total > 0)
        {
            $otro_apoyo_porcentaje = ($otro_apoyo_nuevo * 100) / $costo_total;
            $apoyo_fidem_porcentaje = ($apoyo_fidem * 100) / $costo_total;
        }
        else
        {
            $otro_apoyo_porcentaje = 0;
            $apoyo_fidem_porcentaje = 0;
        }


        $condiciones=array(
            'id' => $proyecto_id
        );
        $proyecto = array(
            'otro_apoyo' => $otro_apoyo_nuevo,
            'otro_apoyo_porcentaje' => $renglon->otro_apoyo_porcentaje,
            'costo_total' => $costo_total,
            'apoyo_fidem' => $apoyo_fidem,
            'apoyo_fidem_porcentaje' => $renglon->apoyo_fidem_porcentaje
        );
        $this->db->where($condiciones)->update("proyecto", $proyecto);

        // eliminar el registro
        $condiciones = array(
            'id' => $id
        );
        $this->db->where($condiciones)->delete('proyecto_otro_apoyo');

        // actualizar porcentaje de los registros ya existentes
        /*
        $registros = $this->db->get("proyecto_otro_apoyo");
        foreach($registros->result() as $registro)
        {
            if ($otro_apoyo_nuevo > 0)
                $porcentaje = ($registro->monto * 100) / $costo_total;
            else 
                $porcentaje = 0;

            $condiciones = array(
                'id' => $registro->id
            );
            $proyecto_otro_apoyo = array(
                'porcentaje' => $porcentaje
            );

            $this->db->where($condiciones)->update("proyecto_otro_apoyo", $proyecto_otro_apoyo);
        }
        */
        
       
        // recalcular el porcentaje para cada registro en proyecto costo en base al nuevo apoyo_fidem en la tabla de proyecto
        /*
        $registros = $this->db->get("proyecto_costo");
        foreach($registros->result() as $registro)
        {
            if ($otro_apoyo_nuevo > 0)
                $porcentaje = ($registro->monto * 100) / $costo_total;
            else
                $porcentaje = 100;

            $condiciones = array(
                'id' => $registro->id
            );
            $proyecto_costo = array(
                'porcentaje' => $porcentaje
            );

            $this->db->where($condiciones)->update("proyecto_costo", $proyecto_costo);
        }
        */


        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $eliminado = false;
        }
        else
        {
            $this->db->trans_commit();
            $eliminado = true;
        }

        return $eliminado;
    }

}
?>