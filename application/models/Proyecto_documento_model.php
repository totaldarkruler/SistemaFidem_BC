<?php
class Proyecto_documento_model extends CI_Model
{
    function obtener_documentos($id_proyecto, $id_clasificacion)
    {  
        if ($id_clasificacion == 6)
            $query = "select pd.id_proyecto as proyecto_id,pd.documento, pd.ruta, pd.otro_estudio, pd.id as proyecto_documento_id, te.tipo from proyecto_documento pd, tipo_estudio te where pd.id_tipo_estudio = te.id and pd.id_proyecto = $id_proyecto and pd.id_clasificacion = $id_clasificacion";
        else
            $query = "select * from proyecto_documento where id_proyecto = $id_proyecto and id_clasificacion = $id_clasificacion";

        if ($this->db->query($query)->num_rows() > 0)
            return $this->db->query($query);
        else
            return false;
    }

    function eliminar_documento_proyecto($id)
    {
        $eliminado = false;

        // traerme la info de la ruta y documento
        $condiciones = array(
            'id' => $id
        );

        $proyecto_documento = $this->db->where($condiciones)->get('proyecto_documento')->row();

        $path = $_SERVER['DOCUMENT_ROOT']. $proyecto_documento->ruta . $proyecto_documento->documento;

        if(is_file($path))
        {
            if (unlink($path)) {
                {
                    $condiciones = array(
                        'id' => $id
                    );

                    $this->db->where($condiciones)->delete('proyecto_documento');

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

}
?>