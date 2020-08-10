<?php
class Solicitud_registro_model extends CI_Model
{
    function obtener_solicitudes_registro()
    {  
        $condiciones = array(
            'id_estatus' => 3 // en revision
        );
        
        if ($this->db->where($condiciones)->get('solicitud_registro')->num_rows() > 0)
            return $this->db->where($condiciones)->get('solicitud_registro');
        else
            return false;
    }

    function nueva_solicitud_registro($datos)
    {
        $agregado = false;

        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/DOCUMENTOS/ACTA_CONSTITUTIVA/';
        $uploadfile = $uploaddir . $_FILES['documento']['name'];

        if (move_uploaded_file($_FILES['documento']['tmp_name'], $uploadfile)) {
            {
                $documento_sistema = array(
                    'id_clasificacion' => 4, // terminos de referencia
                    'documento' => $_FILES['documento']['name'],
                    'ruta' => strtoupper("/DOCUMENTOS/ACTA_CONSTITUTIVA/")                  
                );

                $this->db->trans_begin();

                // insertar el registro del documento de acta consititutiva
                $this->db->insert('documento_sistema', $documento_sistema);
                $documento_sistema_id = $this->db->insert_id();

                // insertar el registro de solicitud de registro
                $solicitud_registro = array(
                    'nombre' => strtoupper($datos['nombre']),
                    'id_institucion' => 0,
                    'id_documento_sistema' => $documento_sistema_id,
                    'direccion' => strtoupper($datos['direccion']),
                    'representante' => strtoupper($datos['representante']),
                    'cargo' => strtoupper($datos['cargo_representante']),
                    'telefono' => strtoupper($datos['telefono']),
                    'extension' => strtoupper($datos['extension']),
                    'correo' => strtoupper($datos['correo_electronico']),
                    'id_estatus' => 3, // en revision
                    'ruta_acta' => strtoupper("/DOCUMENTOS/ACTA_CONSTITUTIVA/"),   
                    'fecha' => date('Y-m-d H:i:s')          
                );

                $this->db->insert('solicitud_registro', $solicitud_registro);
                $id = $this->db->insert_id();
                
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
            }
        } else {
            $agregado = false;
        }

        if ($agregado)
            return $id;
        else
            return 0;

    }

    function eliminar_solicitud_registro($id)
    {
        $eliminado = false;

        // trarme la info de la ruta y documento
        // if lo elimina el archivo

        $condiciones = array(
            'id' => $id
        );

        $this->db->where($condiciones)->delete('solicitud_registro');

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

    function obtener_solicitud_registro($id)
    {
        $query = "select sr.*, ds.documento
                    from solicitud_registro sr, documento_sistema ds 
                    where sr.id_documento_sistema =  ds.id";

        if ($id > 0)
            $query .= " and sr.id = " . $id;


        return $this->db->query($query)->row();
        /*
        $condiciones = array(
            'id' => $id    
        );

        if ($this->db->where($condiciones)->get('solicitud_registro')->num_rows() > 0)
            return $this->db->where($condiciones)->get('solicitud_registro')->row();
        else
            return false;
            */
    }

    function aprobar_solicitud_registro($id)
    {
        // return actualizado
        $aprobado = false;

        // traer la info de la solicitud_registro
        $solicitud_registro = $this->obtener_solicitud_registro($id);

        // actualizar primero el estado de la solicitud
        $condiciones = array(
            'id' => $id
        );
        $valores = array(
            'id_estatus' => 4 // aprobado
        );

        $this->db->where($condiciones)->update('solicitud_registro', $valores);

        // agregarlo a la tabla de instituciones
        $institucion = array(
            'nombre' => strtoupper($solicitud_registro->nombre),
            'id_documento_sistema' => $solicitud_registro->id_documento_sistema,
            'direccion' => strtoupper($solicitud_registro->direccion),
            'representante' => strtoupper($solicitud_registro->representante),
            'cargo' => strtoupper($solicitud_registro->cargo),
            'telefono' => strtoupper($solicitud_registro->telefono),
            'extension' => strtoupper($solicitud_registro->extension),
            'correo' => strtoupper($solicitud_registro->correo),
            'ruta_acta' => strtoupper($solicitud_registro->ruta_acta),
            'fecha' => date('Y-m-d H:i:s'),
            'id_estatus' => 1 // activo
        );

        $this->db->insert('institucion', $institucion);

        // eliminarlo de la tabla de solicitudes 
        $this->db->where($condiciones)->delete('solicitud_registro');

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $aprobado = false;
        }
        else
        {
            $this->db->trans_commit();
            $aprobado = true;
        }

        return $aprobado;

    }

    function rechazar_solicitud_registro($id)
    {
        $rechazado = false;

        // actualizar primero el estado de la solicitud
        $condiciones = array(
            'id' => $id
        );
        $valores = array(
            'id_estatus' => 5 // rechazado
        );

        $this->db->where($condiciones)->update('solicitud_registro', $valores);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $rechazado = false;
        }
        else
        {
            $this->db->trans_commit();
            $rechazado = true;
        }

        return $rechazado;
    }

}
?>