<?php
class Proyecto_entregable_model extends CI_Model
{
    function obtener_entregables($proyecto_id)
    {  
        $condiciones = array(
            'id_proyecto' => $proyecto_id
        );

        if ($this->db->where($condiciones)->get('proyecto_entregable')->num_rows() > 0)
            return $this->db->where($condiciones)->get('proyecto_entregable');
        else
            return false;
    }

    function obtener_entregables2($proyecto_id)
    {  
        $condiciones = array(
            'id_proyecto' => $proyecto_id
        );

        if ($this->db->where($condiciones)->get('proyecto_entregable2')->num_rows() > 0)
            return $this->db->where($condiciones)->get('proyecto_entregable2');
        else
            return false;
    }


    function nuevo_entregable($datos)
    {
        $id = 0;
        $agregado = 1;

        $this->db->trans_begin();

        // validar que el nuevo entregable no sobrepase la suma del 100% ni de avance ni de ministracion
        $query = "select sum(avance) as total_avance, sum(ministracion) as total_ministracion from proyecto_entregable where id_proyecto = " . $datos["proyecto_id"];
        $resultado = $this->db->query($query);

        foreach($resultado->result() as $aux)
        {
            $total_avance = $aux->total_avance;
            $total_ministracion = $aux->total_ministracion;
        }

        $suma1 = round($datos['ministracion'],2) + round($total_ministracion,2);
        if ($suma1 > round(100,2))
        {
            $this->db->trans_rollback();
            return 0;
        }

        $suma2 = round($datos['ministracion'],2) + round($total_ministracion,2);
        if ($suma2 > round(100,2))
        {
            $this->db->trans_rollback();
            return 0;
        }

        // agregar el proyecto
        $proyecto_entregable = array(
            'id_proyecto' => $datos['proyecto_id'],
            'no_ministracion' => $datos['fecha_entregable'],
            //'fecha' => date('Y-m-d H:i:s'),
            'fecha' => $datos['fecha'],
            
            'descripcion' => strtoupper($datos['descripcion']),
            'avance' => $datos['avance'],
            'ministracion' => $datos['ministracion']
        );
        $this->db->insert('proyecto_entregable', $proyecto_entregable);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $agregado = -1;                       
        }
        else
        {
            $this->db->trans_commit();
            $agregado = 1;
        }

        return $agregado;

    }

    function nuevo_entregable2($datos)
    {
        $id = 0;
        $agregado = 1;

        $this->db->trans_begin();

        // agregar el proyecto
        $proyecto_entregable2 = array(
            'id_proyecto' => $datos['proyecto_id'],
            'fecha' => $datos['fecha'],
            'no_entregable' => $datos['numero_entregable'],
            'descripcion' => strtoupper($datos['descripcion'])
        );
        $this->db->insert('proyecto_entregable2', $proyecto_entregable2);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $agregado = -1;                       
        }
        else
        {
            $this->db->trans_commit();
            $agregado = 1;
        }

        return $agregado;

    }


    function eliminar_entregable($id)
    {
        $eliminado = false;

        // traerme la info de la ruta y documento
        $condiciones = array(
            'id' => $id
        );

        $this->db->where($condiciones)->delete('proyecto_entregable');

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

    function eliminar_entregable2($id)
    {
        $eliminado = false;

        // traerme la info de la ruta y documento
        $condiciones = array(
            'id' => $id
        );

        $this->db->where($condiciones)->delete('proyecto_entregable2');

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