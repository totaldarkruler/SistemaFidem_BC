<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cedula_administrador extends CI_Controller {
    public function mostrar($id, $deshabilitar = 0)
    {
        $this->load->model('proyecto_model');
        $data['proyecto'] = $this->proyecto_model->obtener_proyecto($id);
        $data['deshabilitar'] = $deshabilitar;        
        $this->load->model('institucion_model');     
        $data['institucion'] = $this->institucion_model->obtener_institucion($data['proyecto']->id_institucion);
        // leer catalogos
        $this->load->model('tipo_estudio_model'); 
        $data['ciudad'] = $this->tipo_estudio_model->obtener_tipos_ciudad();
        $data['tipos_estudio'] = $this->tipo_estudio_model->obtener_tipos_estudio();
        $data['tipos_proyecto'] = $this->proyecto_model->obtener_tipos_proyecto();        
        // leer proyectos por clasificacion
        $this->load->model('proyecto_documento_model');   
        $data['documentos_estudios'] = $this->proyecto_documento_model->obtener_documentos($data['proyecto']->id,6);        
        $data['documentos_terminos_referencia'] = $this->proyecto_documento_model->obtener_documentos($data['proyecto']->id,4);        
        $data['documentos_anexos_gobierno'] = $this->proyecto_documento_model->obtener_documentos($data['proyecto']->id,5);        
        // leer proyectos por clasificacion
        $this->load->model('proyecto_documento_model');  
        $data['documentos_anexos'] = $this->proyecto_documento_model->obtener_documentos($data['proyecto']->id,6);        
        // leer costos extras de proyecto
        $this->load->model('proyecto_costo_model');  
        $data['proyecto_costos'] = $this->proyecto_costo_model->obtener_costos($data['proyecto']->id);        
        // leer otros costos del proyecto
        $this->load->model('proyecto_otro_apoyo_model');  
        $data['proyecto_otros_apoyos'] = $this->proyecto_otro_apoyo_model->obtener_otros_apoyos($data['proyecto']->id);  
        // leer entregables
        $this->load->model('proyecto_entregable_model');  
        $data['proyecto_entregables'] = $this->proyecto_entregable_model->obtener_entregables($data['proyecto']->id);  
        $data['proyecto_entregables2'] = $this->proyecto_entregable_model->obtener_entregables2($data['proyecto']->id);  
        // leer titulo de actividades por proyecto
        $this->load->model('actividad_titulo_model');  
        $data['actividad_titulos'] = $this->actividad_titulo_model->obtener_actividad_titulos($data['proyecto']->id);  
        // leer actividades por proyecto
        $this->load->model('actividad_model');  
        $data['actividades'] = $this->actividad_model->obtener_actividades($data['proyecto']->id);  
        $this->session->set_userdata("administrador","1");
        $data['contenido'] = 'cedula-administrador';
        $this->load->view('templete', $data);
    }
    public function actualizar()
    {
        $this->load->model('proyecto_model');
        if ($this->proyecto_model->actualizar_proyecto_administrador($_POST))
            $this->session->set_flashdata('mensaje', 'El proyecto ha sido modificado');
        else
            $this->session->set_flashdata('error', 'Error al modificar el proyecto');
        redirect(base_url() . "cedula_administrador/mostrar/" . $_POST["id"]);
    }

    public function desbloquear()
    {
        echo 'wtf';
        $this->load->model('proyecto_model');
        if ($this->proyecto_model->desbloquear_puntos_proyecto_administrador($_POST))
            $this->session->set_flashdata('mensaje', 'Puntos han sido desbloqueados');
        else
            $this->session->set_flashdata('error', 'Error al desbloquear puntos');
        redirect(base_url() . "cedula_administrador/mostrar/" . $_POST["id"]);
    }

    public function eliminar_proyecto($proyecto_id, $url)
    {
        $this->load->model('proyecto_model');
        if ($this->proyecto_model->eliminar_proyecto_administrador($proyecto_id, $url))
            $this->session->set_flashdata('mensaje', 'El proyecto ha sido eliminado');
        else
            $this->session->set_flashdata('error', 'Error al eliminar el proyecto');
        redirect(base_url() . "panel_control/mostrarPresentacionProyectos/");
    }    
    public function evaluar($proyecto_id)
    {
       $this->load->model('Evaluacion_proyecto_model');
       $data['evaluadores_disponibles'] = $this->Evaluacion_proyecto_model->obtenerEvaluadoresDisponibles($proyecto_id);
         $data['evaluadores_proyecto'] = $this->Evaluacion_proyecto_model->obtenerEvaluadoresProyecto($proyecto_id);        
        $resultado = $this->db->query("select 
SUM(r.valor)/(select COUNT(ep.id_evaluador) as resultado from evaluadores_proyecto ep WHERE 1=1 and ep.estatus_evaluacion=7 AND  ep.id_proyecto=" . $proyecto_id . ") as resultado
from 
evaluadores_proyecto ep,
evaluaciones e,
respuestas r
WHERE 1=1
and e.id_respuesta=r.id
and ep.id_proyecto=e.id_proyecto
and ep.id_evaluador=e.id_evaluador
and ep.estatus_evaluacion=7
and ep.id_proyecto=$proyecto_id")->row();        
        $data['resultado'] = $resultado;        
        $this->load->model('proyecto_model');
        $data['proyecto'] = $this->proyecto_model->obtener_proyecto($proyecto_id);     
        $data['opcion_panel'] = 'evaluar-proyecto';
        $this->load->view('templete-panel-control', $data);
    }
}