<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_control extends CI_Controller {

    public function index()
    {
        $this->mostrarMantenimientos();
    }

    public function mostrarMantenimientos()
    {
        $data['opcion_panel'] = 'mantenimientos';

        $this->load->model('calendario_model');
        $data['sesiones'] = $this->calendario_model->obtener_sesiones(); 
        $this->load->model('reglas_operacion_model');
        $data['reglas'] = $this->reglas_operacion_model->obtener_reglas_operacion(); 
        $this->load->model('tipo_proyecto_model');
        $data['tipos_proyecto'] = $this->tipo_proyecto_model->obtener_tipos_proyecto(); 
        $this->load->model('tipo_estudio_model');
        $data['tipos_estudio'] = $this->tipo_estudio_model->obtener_tipos_estudio(); 


        $this->load->model('firma_model');
        $firmas = $this->firma_model->obtener_firmas();
        $array = array();

        foreach($firmas->result() as $firma)
        {
            array_push($array, array($firma->nombre, $firma->puesto));
        }

        $data['firmas'] = $array;

        $this->load->view('templete-panel-control', $data);
    }

    public function mostrarMantenimientoUsuarios()
    {    
        $this->load->model('usuario_model');
        $data['usuarios'] = $this->usuario_model->obtener_usuarios();
        $data['usuario'] = null;

        $this->load->model('tipo_usuario_model');
        $data['tipos_usuario'] = $this->tipo_usuario_model->obtener_tipos_usuario();

        $data['opcion_panel'] = 'mantenimiento-usuarios';
        $this->load->view('templete-panel-control', $data);
    }

    public function mostrarSolicitudesRegistro()
    {    
        $this->load->model('solicitud_registro_model');
        $data['solicitudes'] = $this->solicitud_registro_model->obtener_solicitudes_registro();

        $data['opcion_panel'] = 'solicitudes-registro';
        $this->load->view('templete-panel-control', $data);
    }

    public function mostrarInstitucionesRegistradas()
    {    
        $this->load->model('institucion_model');
        $data['instituciones'] = $this->institucion_model->obtener_instituciones_registradas();

        $data['opcion_panel'] = 'instituciones-registradas';
        $this->load->view('templete-panel-control', $data);
    }

    public function mostrarPresentacionProyectos()
    {    
        $this->load->model('proyecto_model');
        $data['proyectos'] = $this->proyecto_model->obtener_proyectos();

        $this->load->model('institucion_model');
        $data['instituciones'] = $this->institucion_model->obtener_instituciones_registradas();
        
        $data['opcion_panel'] = 'presentacion-proyectos';
        $this->load->view('templete-panel-control', $data);
    }

}
