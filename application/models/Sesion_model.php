<?php
    class Sesion_model extends CI_Model
    {
        function login($usuario, $contrasenia)
        {
            $condiciones = array(
                'usuario' => $cuenta,
                'contrasenia' => $contrasena
            );
            
            if ($this->db->where($condiciones)->get('usuario')->num_rows() > 0)
                return $this->db->where($condiciones)->get('usuario')->row();
            else
                return false;
        }
        
        
    }
?>