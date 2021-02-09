<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    public function guardar()
    {
        $this->load->model('usuario_model');

        // si tiene id entonces es edicion si no pues es nuevo registro
        if ($_POST['id'] == 0)
        {
            if ($this->usuario_model->nuevo_usuario($_POST))
                $this->session->set_flashdata('mensaje', 'El usuario ha sido creado');
            else
                $this->session->set_flashdata('error', 'Error al crear el usuario');
        }
        else
        {
            if ($this->usuario_model->editar_usuario($_POST))
                $this->session->set_flashdata('mensaje', 'El usuario ha sido modificado');
            else
                $this->session->set_flashdata('error', 'Error al modificar el usuario');
        }

        redirect(base_url() . "panel_control/mostrarMantenimientoUsuarios");

    }
    //JACP QUITAR OPCION ELIMINAR
    // public function eliminar($id)
    // {
    //     $this->load->model('usuario_model');
    //     if ($this->usuario_model->eliminar_usuario($id))
    //         $this->session->set_flashdata('mensaje', 'El usuario ha sido eliminado');
    //     else
    //         $this->session->set_flashdata('error', 'Error al eliminar el usuario');

    //     redirect(base_url() . "panel_control/mostrarMantenimientoUsuarios");

    // }

    public function editar($id)
    {
        $this->load->model('usuario_model');
        $data['usuario'] = $this->usuario_model->obtener_usuario($id);
        $data['usuarios'] = $this->usuario_model->obtener_usuarios();

        $this->load->model('tipo_usuario_model');
        $data['tipos_usuario'] = $this->tipo_usuario_model->obtener_tipos_usuario();

        $data['opcion_panel'] = 'mantenimiento-usuarios';
        $this->load->view('templete-panel-control', $data);

    }
    
    public function cambiarContrasenaEvaluador()
    {
        $this->load->model('usuario_model');
     
         if ($this->usuario_model->cambiar_contrasena($_POST))
            $this->session->set_flashdata('mensaje', 'La contraseña ha sido actualizada');
        else
            $this->session->set_flashdata('error', 'Error al actualizar la contraseña');

        redirect(base_url() . "evaluacion/cambiarContrasena");
    }
    

}
