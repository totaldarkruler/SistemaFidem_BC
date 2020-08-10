<?php
    class Tipo_usuario_model extends CI_Model
    {
        function obtener_tipos_usuario()
        {
            if ($this->db->get('tipo_usuario')->num_rows() > 0)
                return $this->db->get('tipo_usuario');
            else
                return false;
        }
        
    }
?>