<?php
class Tipo_proyecto_model extends CI_Model
{
    function obtener_tipos_proyecto()
    {
        if ($this->db->get('tipo_proyecto')->num_rows() > 0)
            return $this->db->get('tipo_proyecto');
        else
            return false;
    }

    function nuevo_tipo_proyecto($datos)
    {
        $agregado = false;

        $tipo_proyecto = array(
            'tipo' => strtoupper($datos['tipo_proyecto'])         
        );

        $this->db->trans_begin();

        // insertar el registro
        $this->db->insert('tipo_proyecto', $tipo_proyecto);

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

    function eliminar_tipo_proyecto($id)
    {
        $eliminado = false;

        $condiciones = array(
            'id' => $id
        );

        $this->db->where($condiciones)->delete('tipo_proyecto');

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

    function editar_tipo_proyecto($datos)
    {
        $editado = false;

        $condiciones = array(
            'id' => $datos['id']
        );
        $tipo_proyecto = array(
            'tipo' => strtoupper($datos['tipo'])
        );
        $this->db->where($condiciones)->update('tipo_proyecto', $tipo_proyecto);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $editado = false;
        }
        else
        {
            $this->db->trans_commit();
            $editado = true;
        }

        return $editado;
    }


}
?>