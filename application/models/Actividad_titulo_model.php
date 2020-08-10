<?php
class Actividad_titulo_model extends CI_Model
{
    function obtener_actividad_titulos($proyecto_id)
    {  
        $condiciones = array(
            'id_proyecto' => $proyecto_id
        );

        if ($this->db->where($condiciones)->get('actividad_titulo')->num_rows() > 0)
            return $this->db->where($condiciones)->get('actividad_titulo');
        else
            return false;
    }


    function nueva_actividad_titulo($datos)
    {
        $id = 0;
        $agregado = false;

        $this->db->trans_begin();

        // agregar la actividad
        $actividad_titulo = array(
            'id_proyecto' => $datos['proyecto_id'],            
            'titulo_col1' => strtoupper($datos['titulo_col1']),
            'titulo_col2' => strtoupper($datos['titulo_col2']),
            'titulo_col3' => strtoupper($datos['titulo_col3']),
            'titulo_col4' => strtoupper($datos['titulo_col4']),
            'titulo_col5' => strtoupper($datos['titulo_col5']),
            'titulo_col6' => strtoupper($datos['titulo_col6']),
            'titulo_col7' => strtoupper($datos['titulo_col7']),
            'titulo_col8' => strtoupper($datos['titulo_col8']),
            'titulo_col9' => strtoupper($datos['titulo_col9']),
            'titulo_col10' => strtoupper($datos['titulo_col10']),
            'titulo_col11' => strtoupper($datos['titulo_col11']),
            'titulo_col12' => strtoupper($datos['titulo_col12'])

        );
        $this->db->insert('actividad_titulo', $actividad_titulo);

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

        $this->db->where($condiciones)->delete('actividad_titulo');

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