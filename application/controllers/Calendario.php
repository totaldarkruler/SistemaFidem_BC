<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario extends CI_Controller {

    public function index()
    {
        $this->mostrarSesiones();
    }

    public function mostrarSesiones()
    {
        $this->load->model('calendario_model');
        $data['sesiones'] = $this->calendario_model->obtener_sesiones(); 
        $data['contenido'] = 'calendario';
        $this->load->view('templete', $data);
    }

    public function nuevo()
    {
        $this->load->model('calendario_model');

        if ($this->calendario_model->nuevo_calendario($_POST))
            $this->session->set_flashdata('mensaje', 'El calendario ha sido agregado');
        else
            $this->session->set_flashdata('error', 'Error al agregar el calendario');

        redirect(base_url() . "panel_control/mostrarMantenimientos");
    }

    public function eliminar($id)
    {
        $this->load->model('calendario_model');

        if ($this->calendario_model->eliminar_calendario($id))
            $this->session->set_flashdata('mensaje', 'El calendario ha sido eliminado');
        else
            $this->session->set_flashdata('error', 'Error al eliminar el calendario');

        redirect(base_url() . "panel_control/mostrarMantenimientos");
        
    }

}
