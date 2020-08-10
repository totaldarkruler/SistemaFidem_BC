<?php
class Firma_model extends CI_Model
{
    function obtener_firmas()
    {
        if ($this->db->get('firma')->num_rows() > 0)
            return $this->db->get('firma');
        else
            return false;
    }

    function actualizar_firmas($datos)
    {
        $actualizado = false;

        $this->db->trans_begin();

        // eliminar firmas actuales
        $this->db->query("delete from firma");

        // insertar la primer firma
        $firma = array(           
            'nombre' => strtoupper($datos['nombre']),
            'puesto' => strtoupper($datos['puesto'])                  
        );


        $this->db->insert('firma', $firma);

        // insertar la segunda firma
        $firma = array(           
            'nombre' => strtoupper($datos['nombre2']),
            'puesto' => strtoupper($datos['puesto2'])                  
        );


        $this->db->insert('firma', $firma);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $actualizado = false;
        }
        else
        {
            $this->db->trans_commit();
            $actualizado = true; 
        }


        return $actualizado;

    }

}
?>