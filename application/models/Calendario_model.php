<?php
class Calendario_model extends CI_Model
{
    function obtener_sesiones()
    {
        $condiciones = array(
            'id_clasificacion' => 1    
        );

        if ($this->db->where($condiciones)->get('documento_sistema')->num_rows() > 0)
            return $this->db->where($condiciones)->get('documento_sistema');
        else
            return false;
    }

    function nuevo_calendario($datos)
    {
        $agregado = false;

        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/DOCUMENTOS/CALENDARIO_SESIONES/';
        $uploadfile = $uploaddir . $_FILES['documento']['name'];

        if (move_uploaded_file($_FILES['documento']['tmp_name'], $uploadfile)) {
            {
                $documento_sistema = array(
                    'id_clasificacion' => 1,
                    'documento' => $_FILES['documento']['name'],
                    'ruta' => strtoupper("/DOCUMENTOS/CALENDARIO_SESIONES/")                  
                );

                $this->db->trans_begin();

                // insertar el registro
                $this->db->insert('documento_sistema', $documento_sistema);

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

        return $agregado;

    }

    function eliminar_calendario($id)
    {
        $eliminado = false;

        // traerme la info de la ruta y documento
        $calendario = $this->obtener_calendario($id);

        $path = $_SERVER['DOCUMENT_ROOT']. $calendario->ruta . $calendario->documento;
        
        if(is_file($path))
        {
            if (unlink($path)) {
                {
                    $condiciones = array(
                        'id' => $id
                    );

                    $this->db->where($condiciones)->delete('documento_sistema');

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
                }
            } else {
                $eliminado = false;
            }
        }

       return $eliminado;
       
    }

    function obtener_calendario($id)
    {
        $condiciones = array(
            'id' => $id    
        );

        if ($this->db->where($condiciones)->get('documento_sistema')->num_rows() > 0)
            return $this->db->where($condiciones)->get('documento_sistema')->row();
        else
            return false;
    }

}
?>