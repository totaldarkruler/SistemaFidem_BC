<?php
class Correo_model extends CI_Model
{
    function obtener_correo($id_clasificacion)
    {
        $condiciones = array(
            'id_clasificacion' => $id_clasificacion    
        );

        if ($this->db->where($condiciones)->get('correo')->num_rows() > 0)
            return $this->db->where($condiciones)->get('correo')->row();
        else
            return false;
    }

  
}
?>