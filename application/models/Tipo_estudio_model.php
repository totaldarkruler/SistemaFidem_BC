<?php
class Tipo_estudio_model extends CI_Model
{
    function obtener_tipos_estudio()
    {  
        if ($this->db->get('tipo_estudio')->num_rows() > 0)
            return $this->db->get('tipo_estudio');
        else
            return false;
    }
    
    function obtener_tEstudio()
    {  
        if ($this->db->get('tipo_estudio')->num_rows() > 0)
            return $this->db->get('tipo_estudio');
        else
            return false;
    }
    
     function obtener_tipos_ciudad()
    {  
        if ($this->db->get('ciudad')->num_rows() > 0)
            return $this->db->get('ciudad');
        else
            return false;
    }
    
    function obtener_ciudad_por_proyecto($id)
    {  
        $condiciones = array(
            'id' => $id
        );
        if($this->db->where($condiciones)->get('ciudad')->num_rows>0)
            return $this->db->where($condiciones)->get('ciudad');
        else
            return false;
        
        
//       $query ="SELECT * FROM ciudad WHERE id =" . $id;
//       return $this->db->query($query);
    }
    

    function obtener_tipos_estudio_por_proyecto($id)
    {
        $query ="SELECT p. * , tp.tipo AS tipo_proyecto, te.tipo AS tipo_estudio,py.id_tipo_estudio, py.otro_estudio, te.id AS tipos_estudio_por_proyecto  FROM proyecto AS p INNER JOIN tipo_proyecto AS tp ON p.id_tipo_proyecto = tp.id LEFT OUTER JOIN proyecto_documento AS py ON p.id = py.id_proyecto LEFT OUTER JOIN tipo_estudio AS te ON py.id_tipo_estudio = te.id WHERE p.id_tipo_proyecto = tp.id and py.id_clasificacion=6 and p.id = " . $id;

        return $this->db->query($query);
    }
    
     function obtener_ciudad($id)
    {
        $query ="SELECT *  from ciudad where id=  " . $id;

        return $this->db->query($query);
    }

    function nuevo_tipo_estudio($datos)
    {
        $agregado = false;

        $tipo_estudio = array(
            'tipo' => strtoupper($datos['tipo_estudio'])         
        );

        $this->db->trans_begin();

        // insertar el registro
        $this->db->insert('tipo_estudio', $tipo_estudio);

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

    function eliminar_tipo_estudio($id)
    {
        $eliminado = false;

        // trarme la info de la ruta y documento
        // if lo elimina el archivo

        $condiciones = array(
            'id' => $id
        );

        $this->db->where($condiciones)->delete('tipo_estudio');

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

    function editar_tipo_estudio($datos)
    {
        $editado = false;

        $condiciones = array(
            'id' => $datos['id']
        );
        $tipo_estudio = array(
            'tipo' => strtoupper($datos['tipo'])
        );
        $this->db->where($condiciones)->update('tipo_estudio', $tipo_estudio);

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