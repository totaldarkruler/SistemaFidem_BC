<?php
class Actividad_model extends CI_Model
{
    function obtener_actividades($proyecto_id)
    {  
        $condiciones = array(
            'id_proyecto' => $proyecto_id
        );
        
        if ($this->db->where($condiciones)->get('actividad')->num_rows() > 0)
            return $this->db->where($condiciones)->get('actividad');
        else
            return false;
    }


    function nueva_actividad($datos)
    {
        $id = 0;
        $agregado = false;

        $this->db->trans_begin();

        // agregar la actividad
        $actividad = array(
            'id_proyecto' => $datos['proyecto_id'],
            'actividad' => strtoupper($datos['actividad']),
            'col1' => @$datos['actividad1'],
            'col2' => @$datos['actividad2'],
            'col3' => @$datos['actividad3'],
            'col4' => @$datos['actividad4'],
            'col5' => @$datos['actividad5'],
            'col6' => @$datos['actividad6'],            
            'col7' => @$datos['actividad7'],
            'col8' => @$datos['actividad8'],
            'col9' => @$datos['actividad9'],
            'col10' => @$datos['actividad10'],
            'col11' => @$datos['actividad11'],
            'col12' => @$datos['actividad12']            
        );
        $this->db->insert('actividad', $actividad);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $agregado = false;                       
        }
        else
        {
            $this->db->trans_commit();
            $agregado = true;
        }

        return $agregado;

    }
    
    function eliminar_actividad($id)
    {
        $eliminado = false;

        // traerme la info de la ruta y documento
        $condiciones = array(
            'id' => $id
        );

        $this->db->where($condiciones)->delete('actividad');

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