<?php
class Usuario_model extends CI_Model
{
    function obtener_usuarios()
    {
        if ($this->db->get('usuario')->num_rows() > 0)
            return $this->db->get('usuario');
        else
            return false;
    }


    function nuevo_usuario($datos)
    {
        $agregado = false;

        $usuario = array(
            'usuario' => $datos['usuario'],
            'id_tipo_usuario' => $datos['tipo_usuario'],
            'usuario' => $datos['usuario'],
            'ap_paterno' => strtoupper($datos['ap_paterno']),
            'ap_materno' => strtoupper($datos['ap_materno']),            
            'nombre' => strtoupper($datos['nombre']),
            'puesto' => strtoupper($datos['puesto']),
            'contrasenia' => $datos['contrasenia'],
            'correo' => $datos['correo'] 
        );

        $this->db->trans_begin();

        // insertar el registro
        $this->db->insert('usuario', $usuario);
        $usuario_id = $this->db->insert_id();

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

    function eliminar_usuario($id)
    {
        $eliminado = false;
        $condiciones = array(
            'id' => $id
        );

        $this->db->trans_begin();

        $this->db->where($condiciones)->delete('usuario');

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

    function obtener_usuario($id)
    {
        $condiciones = array(
            'id' => $id
        );

        if ($this->db->where($condiciones)->get('usuario')->row())
            return $this->db->where($condiciones)->get('usuario')->row();
        else
            return null;
    }

    function editar_usuario($datos)
    {
        $actualizado = false;

        $condiciones = array(
            'id' => $datos['id']
        );
        $valores = array(
            'id_tipo_usuario' => $datos['usuario'],
            'usuario' => $datos['usuario'],
            'id_tipo_usuario' => $datos['tipo_usuario'],
            'ap_paterno' => strtoupper($datos['ap_paterno']),
            'ap_materno' => strtoupper($datos['ap_materno']),            
            'nombre' => strtoupper($datos['nombre']),
            'puesto' => strtoupper($datos['puesto']),
            'contrasenia' => $datos['contrasenia'],
            'correo' => $datos['correo'] 
        );

        $this->db->trans_begin();

        // actualizar el registro
        $this->db->where($condiciones)->update('usuario', $valores);

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

    function validar($usuario, $contrasenia,$tipo_usuario_id)
    {  
        $condiciones = array(
            'usuario' => $usuario,
            'contrasenia' => $contrasenia,
			'id_tipo_usuario'=>$tipo_usuario_id
        );

        if ($this->db->where($condiciones)->get('usuario')->num_rows() > 0)
            return $this->db->where($condiciones)->get('usuario')->row();
        else
            return false;
    }
    
    
    function cambiar_contrasena($datos)
    {
         $actualizada = false;

        $condiciones = array(
            'id' => $datos['usuario_id']
        );
        $valores = array(
            'contrasenia' => $datos['contrasenia']
        );

        $this->db->trans_begin();

        // actualizar el registro
        $this->db->where($condiciones)->update('usuario', $valores);

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
  


}
?>