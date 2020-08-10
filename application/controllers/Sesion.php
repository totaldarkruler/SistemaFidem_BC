<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {

    public function index()
    {
        //$this->mostrarLogin();
    }

    public function mostrarLogin()
    {
        $this->load->view('iniciar-sesion');
    }
    
     public function mostrarLoginEvaluador()
    {
        $this->load->view('iniciar-sesion-evaluador');
    }

    public function iniciar($tipo_usuario_id)
    {
        $this->load->model('usuario_model');
        $cuenta = $this->usuario_model->validar($_POST['usuario'], $_POST['contrasenia'],$tipo_usuario_id);

        if ($cuenta)
        {
            //$this->load->library('session');

            //$this->session->sess_create();
            $this->session->set_userdata(array(
                'id'       => $cuenta->id,
                'ap_paterno'      => $cuenta->ap_paterno,
                'ap_materno'      => $cuenta->ap_materno,
                'nombre'       => $cuenta->nombre,
                'puesto'       => $cuenta->puesto,
                'tipo_usuario_id' => $tipo_usuario_id
            ));

            if ($tipo_usuario_id == 1)
                redirect(base_url() . "Panel_control");
            else 
                redirect(base_url() . "Evaluacion");
        }
        else
        {
			//$this->session->library('session');
            $this->session->set_flashdata('error', 'La información ingresada es incorrecta');
          
            if($tipo_usuario_id == 1)
                redirect(base_url() . 'Sesion/mostrarLogin');
            else
                redirect(base_url() . 'Sesion/mostrarLoginEvaluador');
            
			echo $this->session->flashdata('error');
        }    
        
        // $tipo_usuario_id 1: administrador
        // $tipo_usuario_id 4: evaluador
        
    }
}
