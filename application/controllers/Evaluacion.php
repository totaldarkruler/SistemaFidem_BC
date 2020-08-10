<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluacion extends CI_Controller {

    public function index()
    {
        $this->mostrarProyectosPorEvaluar();
    }

    public function mostrarProyectosPorEvaluar()
    {
         $this->load->model('proyecto_model');
        $data['proyectos'] = $this->proyecto_model->obtener_proyectos_evaluar();
        
        $data['opcion_panel'] = 'proyectos-por-evaluar';

        $this->load->view('templete-evaluaciones', $data);
    }

    public function mostrarProyectosEvaluados()
    {
        $this->load->model('proyecto_model');
        $data['proyectos'] = $this->proyecto_model->obtener_proyectos_evaluados();
        
        $data['opcion_panel'] = 'proyectos-evaluados';

        $this->load->view('templete-evaluaciones', $data);
    }
    
    public function cambiarContrasena()
    {
         $data['opcion_panel'] = 'evaluador-cambio-contrasena';

        $this->load->view('templete-evaluaciones', $data);
    }

    
     public function mostrarReporte($proyecto_id)
    {
        $this->load->model('proyecto_model');
        $data['proyecto'] = $this->proyecto_model->obtener_proyecto($proyecto_id);
         
                 $data['valores'] = $this->proyecto_model->obtener_valores($proyecto_id);
         

        $this->load->view('reporte-evaluacion', $data);
    }

   

}
