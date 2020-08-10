<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reglas_operacion extends CI_Controller {

    public function index()
    {
        $this->mostrarReglasOperacion();
    }

    public function mostrarReglasOperacion()
    {
        $this->load->model('reglas_operacion_model');
        $data['reglas'] = $this->reglas_operacion_model->obtener_reglas_operacion(); 
        $data['contenido'] = 'reglas-operacion';
        $this->load->view('templete', $data);
    }

    public function nuevo()
    {
        $this->load->model('reglas_operacion_model');

        if ($this->reglas_operacion_model->nueva_regla_operacion($_POST))
            $this->session->set_flashdata('mensaje', 'La regla de operación ha sido agregada');
        else
            $this->session->set_flashdata('error', 'Error al agregar la regla de operación');

        redirect(base_url() . "panel_control/mostrarMantenimientos");
    }

    public function eliminar($id)
    {
        $this->load->model('reglas_operacion_model');

        if ($this->reglas_operacion_model->eliminar_regla_operacion($id))
            $this->session->set_flashdata('mensaje', 'La regla de operación ha sido eliminada');
        else
            $this->session->set_flashdata('error', 'Error al eliminar la regla de operación');

        redirect(base_url() . "panel_control/mostrarMantenimientos");
    }

}

