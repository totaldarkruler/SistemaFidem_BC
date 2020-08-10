<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_estudio extends CI_Controller {

    public function nuevo()
    {
        $this->load->model('tipo_estudio_model');

        if ($this->tipo_estudio_model->nuevo_tipo_estudio($_POST))
            $this->session->set_flashdata('mensaje', 'El tipo de solución ha sido agregado');
        else
            $this->session->set_flashdata('error', 'Error al agregar el tipo de solución');

        redirect(base_url() . "panel_control/mostrarMantenimientos");
    }
    
    

    public function eliminar($id)
    {
        $this->load->model('tipo_estudio_model');

        if ($this->tipo_estudio_model->eliminar_tipo_estudio($id))
            $this->session->set_flashdata('mensaje', 'El tipo de estudio ha sido eliminado');
        else
            $this->session->set_flashdata('error', 'Error al eliminar el tipo de estudio');

        redirect(base_url() . "panel_control/mostrarMantenimientos");
    }

    public function editar()
    {
        $this->load->model('tipo_estudio_model');

        if ($this->tipo_estudio_model->editar_tipo_estudio($_POST))
            $this->session->set_flashdata('mensaje', 'El tipo de estudio ha sido modificado');
        else
            $this->session->set_flashdata('error', 'Error al modificar el tipo de estudio');

        redirect(base_url() . "panel_control/mostrarMantenimientos");
    }

}



