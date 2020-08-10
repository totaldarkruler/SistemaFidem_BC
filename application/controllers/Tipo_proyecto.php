<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_proyecto extends CI_Controller {

    public function nuevo()
    {
        $this->load->model('tipo_proyecto_model');

        if ($this->tipo_proyecto_model->nuevo_tipo_proyecto($_POST))
            $this->session->set_flashdata('mensaje', 'El tipo de proyecto ha sido agregado');
        else
            $this->session->set_flashdata('error', 'Error al agregar el tipo de proyecto');

        redirect(base_url() . "panel_control/mostrarMantenimientos");
    }

    public function eliminar($id)
    {
        $this->load->model('tipo_proyecto_model');

        if ($this->tipo_proyecto_model->eliminar_tipo_proyecto($id))
            $this->session->set_flashdata('mensaje', 'El tipo de proyecto ha sido eliminado');
        else
            $this->session->set_flashdata('error', 'Error al eliminar el tipo de proyecto');

        redirect(base_url() . "panel_control/mostrarMantenimientos");

    }

    public function editar()
    {
        $this->load->model('tipo_proyecto_model');

        if ($this->tipo_proyecto_model->editar_tipo_proyecto($_POST))
            $this->session->set_flashdata('mensaje', 'El tipo de proyecto ha sido modificado');
        else
            $this->session->set_flashdata('error', 'Error al modificar el tipo de proyecto');

        redirect(base_url() . "panel_control/mostrarMantenimientos");

    }

}



