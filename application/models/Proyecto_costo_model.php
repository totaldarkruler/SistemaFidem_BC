<?php
class Proyecto_costo_model extends CI_Model
{
    function obtener_costos($proyecto_id)
    {  
        $condiciones = array(
            'id_proyecto' => $proyecto_id
        );

        if ($this->db->where($condiciones)->get('proyecto_costo')->num_rows() > 0)
            return $this->db->where($condiciones)->get('proyecto_costo');
        else
            return false;
    }


    function nuevo_costo($datos)
    {
        $id = 0;
        $agregado = "0";

        $this->db->trans_begin();

        $monto = substr($datos['monto'],0,1);

        if ($monto == "$") 
            $monto_aux = str_replace(',', '', substr($datos['monto'],1)); 
        else  if ($monto != "$") 
            $monto_aux = str_replace(',', '', $datos['monto']);


        // agregar el proyecto costo
        $proyecto = array(
            'id_proyecto' => $datos['proyecto_id'],
            'aplicacion' => strtoupper($datos['aplicacion']),
            'monto' => $monto_aux,
            'porcentaje' => $datos['porcentaje']
        );
        $this->db->insert('proyecto_costo', $proyecto);

        // actualizar el monto de apoyo fidem en la tabla de proyecto
        $renglon = $this->db->query("select * from proyecto where id = " .  $datos['proyecto_id'])->row();
        $apoyo_fidem = $renglon->apoyo_fidem;
        $otro_apoyo = $renglon->otro_apoyo;
        $apoyo_fidem_nuevo = $apoyo_fidem + $monto_aux;
        $costo_total = $apoyo_fidem_nuevo + $renglon->otro_apoyo;

        if ($apoyo_fidem_nuevo > 0)
        {
            $apoyo_fidem_porcentaje = ($apoyo_fidem_nuevo * 100) / ($apoyo_fidem_nuevo + $otro_apoyo);
        }
        else
        {
            $apoyo_fidem_porcentaje = 0;
        }
        
        if ($otro_apoyo > 0)
        {
            $otro_apoyo_porcentaje = ($otro_apoyo * 100) / ($apoyo_fidem_nuevo + $otro_apoyo);       
        }
        else
        {
            $otro_apoyo_porcentaje = 0;
        }
/*
        // que no se pase del apoyo fidem solicitado
        if ($costo_total > $renglon->costo_total)
        {
            $this->db->trans_rollback();
            return "0";            
        }
*/
        $condiciones=array(
            'id' => $datos['proyecto_id']
        );
        $proyecto = array(
            'apoyo_fidem' => $apoyo_fidem_nuevo,
            'apoyo_fidem_porcentaje' => $renglon->apoyo_fidem_porcentaje,
            'costo_total' => $costo_total,
            'otro_apoyo_porcentaje' => $renglon->otro_apoyo_porcentaje
        );
        $this->db->where($condiciones)->update("proyecto", $proyecto);

        
        // recalcular el porcentaje para cada registro en proyecto costo en base al nuevo apoyo_fidem en la tabla de proyecto
        // 
        // 
        /*
        $registros = $this->db->get("proyecto_costo");
        foreach($registros->result() as $registro)
        {
            if ($apoyo_fidem_nuevo > 0)
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

        // recalcular el porcentaje para cada registro en otro apoyo en base al nuevo apoyo_fidem en la tabla de proyecto
        /*
        $registros = $this->db->get("proyecto_otro_apoyo");
        foreach($registros->result() as $registro)
        {
            if ($apoyo_fidem_nuevo > 0)
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

    function eliminar_costo($id)
    {
        $eliminado = false;

        // primero actualizar apoyo fidem de la tabla proyecto
        $renglon = $this->db->query("select * from proyecto_costo where id = " . $id)->row();
        $monto_registro = $renglon->monto;
        $proyecto_id = $renglon->id_proyecto;

        // actualizar el monto de otro apoyo en la tabla de proyecto
        $renglon = $this->db->query("select * from proyecto where id = " . $proyecto_id)->row();
        $otro_apoyo = $renglon->otro_apoyo;
        $apoyo_fidem = $renglon->apoyo_fidem;
        $apoyo_fidem_nuevo = $apoyo_fidem - $monto_registro;
        $costo_total = $otro_apoyo + $apoyo_fidem_nuevo;

        if ($costo_total > 0)
        {
            $otro_apoyo_porcentaje = ($otro_apoyo * 100) / $costo_total;
            $apoyo_fidem_porcentaje = ($apoyo_fidem_nuevo * 100) / $costo_total;
        }
        else{
            $otro_apoyo_porcentaje = 0;
            $apoyo_fidem_porcentaje = 0;
        }

        $condiciones=array(
            'id' => $proyecto_id
        );
        $proyecto = array(
            'otro_apoyo' => $otro_apoyo,
            'otro_apoyo_porcentaje' => $renglon->otro_apoyo_porcentaje,
            'costo_total' => $costo_total,
            'apoyo_fidem' => $apoyo_fidem_nuevo,
            'apoyo_fidem_porcentaje' => $renglon->apoyo_fidem_porcentaje
        );
        $this->db->where($condiciones)->update("proyecto", $proyecto);


        // eliminar el registro
        $condiciones = array(
            'id' => $id
        );
        $this->db->where($condiciones)->delete('proyecto_costo');

        // actualizar porcentaje de los registros ya existentes
        /*
        $registros = $this->db->get("proyecto_costo");
        foreach($registros->result() as $registro)
        {
            if ($apoyo_fidem_nuevo > 0)
                $porcentaje = ($registro->monto * 100) / $costo_total;
            else 
                $porcentaje = 0;

            $condiciones = array(
                'id' => $registro->id
            );
            $proyecto_costo = array(
                'porcentaje' => $porcentaje
            );

            $this->db->where($condiciones)->update("proyecto_costo", $proyecto_costo);
        }
*/
         // recalcular el porcentaje para cada registro en otro apoyo en base al nuevo apoyo_fidem en la tabla de proyecto
         /*
        $registros = $this->db->get("proyecto_otro_apoyo");
        foreach($registros->result() as $registro)
        {
            if ($apoyo_fidem_nuevo > 0)
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