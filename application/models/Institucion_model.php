<?php
class Institucion_model extends CI_Model
{
    function obtener_instituciones_registradas()
    {  
        $condiciones = array(
            'id_estatus' => 1 // activas
        );

        if ($this->db->where($condiciones)->get('institucion')->num_rows() > 0)
            return $this->db->where($condiciones)->get('institucion');
        else
            return false;
    }

    function obtener_institucion($id)
    {
        $query = "select i.*, ds.documento
                        from institucion i, documento_sistema ds 
                        where i.id_documento_sistema =  ds.id";

        if ($id > 0)
            $query .= " and i.id = " . $id;


        return $this->db->query($query)->row();
    }

    function actualizar_institucion($datos)
    {
        $actualizada = false;

        $condiciones = array(
            'id' => $datos['id']
        );

        $institucion = array(
            'nombre' => strtoupper($datos['nombre']),
            'direccion' => strtoupper($datos['direccion']),
            'representante' => strtoupper($datos['representante']),
            'cargo' => strtoupper($datos['cargo_representante']),
            'telefono' => strtoupper($datos['telefono']),
            'extension' => strtoupper($datos['extension']),
            'correo' => strtoupper($datos['correo_electronico']),
            'ruta_acta' => strtoupper("/DOCUMENTOS/ACTA_CONSTITUTIVA/")         
        );

        $this->db->where($condiciones)->update("institucion", $institucion);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $actualizada = false;
        }
        else
        {
            $this->db->trans_commit();
            $actualizada = true;
        }

        return $actualizada;
    }

    function eliminar_institucion($institucion_id)
    {
        $eliminada = false;

        $condiciones = array(
            'id' => $institucion_id
        );
        $institucion = array(
        'id_estatus' => 1
        );

        $this->db->where($condiciones)->update("institucion",$institucion);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $eliminada = false;
        }
        else
        {
            $this->db->trans_commit();
            $eliminada = true;
        }

        return $eliminada;
    }


}
?>