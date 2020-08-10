<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {

        if( ! ini_get('date.timezone') )
        {
            date_default_timezone_set('GMT');
        } 

        //$this->load->model('sesion_model');
        //$data = $this->sesion_model->datos_usuario();
        //if (@$data['tipo'] != '')
        //    $this->lanzar();
        $data['contenido'] = 'principal';
        $this->load->view('templete', $data);
    }
}
