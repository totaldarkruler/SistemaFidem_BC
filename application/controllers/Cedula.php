<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cedula extends CI_Controller {

    public function index()
    {
        $this->abrirCedula();
    }

    public function abrirCedula()
    {
        $data['contenido'] = 'abrir-proyecto';
        $data['boton_anexo_clicado'] = 0;
        $this->load->view('templete', $data);
    }

    public function mostrar()
    {
        $this->load->model('proyecto_model');
        $data['proyecto'] = $this->proyecto_model->abrir_proyecto($_POST['folio_proyecto'], $_POST['contrasenia']);


        if ($data['proyecto']->id > 0)
        {
            $this->load->model('institucion_model');     
            $data['institucion'] = $this->institucion_model->obtener_institucion($data['proyecto']->id_institucion);

            // leer catalogos
            $this->load->model('tipo_estudio_model');     
            $data['tipos_estudio'] = $this->tipo_estudio_model->obtener_tipos_estudio();
            $data['tipos_proyecto'] = $this->proyecto_model->obtener_tipos_proyecto();   


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

            $this->load->library('session');
            $this->session->set_userdata("administrador","0");

            $data['contenido'] = 'cedula';
            $data['puntos_desbloqueo']=$this->proyecto_model->obtener_puntos_desbloqueados($data['proyecto']->id);
            $data['boton_anexo_clicado'] = 0;
            $this->load->view('templete', $data);
           


        }
        else
        {
            $data['boton_anexo_clicado'] = 0;
            $this->session->set_flashdata('error', 'Por favor revise la información ingresada');
            redirect(base_url() . "cedula");
        }

    }

    public function reAbrir($id)
    {
        $this->load->model('proyecto_model');
        $data['proyecto'] = $this->proyecto_model->obtener_proyecto($id);

        $this->load->model('institucion_model');     
        $data['institucion'] = $this->institucion_model->obtener_institucion($data['proyecto']->id_institucion);

        $this->load->model('tipo_estudio_model');     
        $data['tipos_estudio'] = $this->tipo_estudio_model->obtener_tipos_estudio();
        $data['tipos_proyecto'] = $this->proyecto_model->obtener_tipos_proyecto();        

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
        $this->session->set_userdata("administrador","0");

        $data['puntos_desbloqueo']=$this->proyecto_model->obtener_puntos_desbloqueados($data['proyecto']->id);

        $data['contenido'] = 'cedula';
        $data['boton_anexo_clicado'] = 0;
        
        $this->load->view('templete', $data);

    }

    public function actualizar()
    {
        $this->load->model('proyecto_model');
        $this->proyecto_model->actualizar_proyecto($_POST);
        if($_POST['boton_anexo_clicado']=="0"){
        $this->actualizarPuntosDesbloqueados($_POST);
        }

        if ($this->proyecto_model->actualizar_proyecto($_POST))
            $this->session->set_flashdata('mensaje', 'La cedula ha sido modificada');
        else
            $this->session->set_flashdata('error', 'Error al modificar la cedula');

        //$this->mostrar();
        $data['boton_anexo_clicado'] = 0;
        redirect(base_url() . "cedula/reAbrir/" . $_POST["id"]);

    }

    function actualizarPuntosDesbloqueados($proyecto){
        if($this->proyecto_model->tiene_puntos_desbloqueados($proyecto['id'])>0){

            $this->proyecto_model->limpiar_puntos_desbloqueados($proyecto['id']);
            $this->load->model('correo_model');
            $correo = $this->correo_model->obtener_correo(9);
    
            $subject    = @trim(stripslashes("Modificacion de Cedula")); 
            $message    = @trim(stripslashes("Se realizo modificacion en la cedula '" . $proyecto['folio_proyecto'] . "' .Por favor revise el Sistema de FIDEM.")); 
            $to         = $correo->correo;
    
            $this->load->library('email');
            $this->email->initialize();
            $this->email->from('noreply@cdem.org.mx', 'Notificaciones');
            $this->email->to($to);  
            // $this->email->cc('jacerda9@hotmail.com');
            $this->email->subject($subject);
        
            $this->email->message($message);  
    
            $this->email->send();
            }
    }


    public function actualizarAJAX()
    {
        $this->load->model('proyecto_model');
        //$this->proyecto_model->actualizar_proyecto($_POST);

        if ($this->proyecto_model->actualizar_proyecto($_POST))
            echo "OK";
        else
            echo "-1";

        //$this->mostrar();
        //redirect(base_url() . "cedula/reAbrir/" . $_POST["id"]);

    }

    public function eliminarDocumentoProyecto($id_proyecto, $id_anexo)
    {
        $this->load->model('Proyecto_documento_model');

        if ($this->Proyecto_documento_model->eliminar_documento_proyecto($id_anexo))
            $this->session->set_flashdata('mensaje', 'El anexo ha sido eliminado');
        else
            $this->session->set_flashdata('error', 'Error al eliminar el anexo');

        // $this->mostrar();
        redirect(base_url() . "cedula/reAbrir/" . $id_proyecto);

    }

    public function eliminarEntregable($id_proyecto,$id_entregable)
    {
        $this->load->model('proyecto_entregable_model');

        if ($this->proyecto_entregable_model->eliminar_entregable($id_entregable))
            $this->session->set_flashdata('mensaje', 'El entregable ha sido eliminado');
        else
            $this->session->set_flashdata('error', 'Error al eliminar el entregable');

        // $this->mostrar();
        redirect(base_url() . "cedula/reAbrir/" . $id_proyecto);

    }
    
     public function eliminarEntregable2($id_proyecto,$id_entregable2)
    {
        $this->load->model('proyecto_entregable_model');

        if ($this->proyecto_entregable_model->eliminar_entregable2($id_entregable2))
            $this->session->set_flashdata('mensaje', 'El entregable ha sido eliminado');
        else
            $this->session->set_flashdata('error', 'Error al eliminar el entregable');

        // $this->mostrar();
        redirect(base_url() . "cedula/reAbrir/" . $id_proyecto);

    }

    public function eliminarActividad($id_proyecto,$id_actividad)
    {
        $this->load->model('actividad_model');

        if ($this->actividad_model->eliminar_actividad($id_actividad))
            $this->session->set_flashdata('mensaje', 'La actividad ha sido eliminada');
        else
            $this->session->set_flashdata('error', 'Error al eliminar la actividad');

        // $this->mostrar();
        redirect(base_url() . "cedula/reAbrir/" . $id_proyecto);

    }

    public function eliminarCosto($id_proyecto,$id_costo)
    {
        $this->load->model('Proyecto_costo_model');

        if ($this->Proyecto_costo_model->eliminar_costo($id_costo))
            $this->session->set_flashdata('mensaje', 'El costo ha sido eliminado');
        else
            $this->session->set_flashdata('error', 'Error al eliminar el costo');

        // $this->mostrar();
        redirect(base_url() . "cedula/reAbrir/" . $id_proyecto);

    }

    public function eliminarOtroApoyo($id_proyecto,$id_otro_apoyo)
    {
        $this->load->model('Proyecto_otro_apoyo_model');

        if ($this->Proyecto_otro_apoyo_model->eliminar_otro_apoyo($id_otro_apoyo))
            $this->session->set_flashdata('mensaje', 'El apoyo ha sido eliminado');
        else
            $this->session->set_flashdata('error', 'Error al eliminar el apoyo');

        // $this->mostrar();
        redirect(base_url() . "cedula/reAbrir/" . $id_proyecto);

    }


    public function buscar()
    {
        $this->load->model('proyecto_model');
        $data['proyectos'] = $this->proyecto_model->buscar_proyecto($_POST);

        $this->load->model('institucion_model');
        $data['instituciones'] = $this->institucion_model->obtener_instituciones_registradas();

        $data['opcion_panel'] = 'presentacion-proyectos';
        $this->load->view('templete-panel-control', $data);

    }

    public function nuevoProyectoCosto()
    {
        $this->load->model('proyecto_costo_model');

        if ($this->proyecto_costo_model->nuevo_costo($_POST) == "1")
            $this->session->set_flashdata('mensaje', 'El costo ha sido agregado');
        else if ($this->proyecto_costo_model->nuevo_costo($_POST) == "0")
            $this->session->set_flashdata('error', 'El monto acumulado sobrepasa el Apoyo Solicitado a Fidem');
        else if ($this->proyecto_costo_model->nuevo_costo($_POST) == "-1")
            $this->session->set_flashdata('error', 'Error al guardar el costo');

        //$this->mostrar();
        redirect(base_url() . "cedula/reAbrir/" . $_POST['proyecto_id']);

    }


    public function nuevoOtroApoyo()
    {
        $this->load->model('proyecto_otro_apoyo_model');

        if ($this->proyecto_otro_apoyo_model->nuevo_otro_apoyo($_POST) == "1")
            $this->session->set_flashdata('mensaje', 'El apoyo ha sido agregado');
        else if ($this->proyecto_otro_apoyo_model->nuevo_otro_apoyo($_POST) == "0")
            $this->session->set_flashdata('error', 'El monto acumulado sobrepasa el Apoyo Solicitado a Fidem');
        else if ($this->proyecto_otro_apoyo_model->nuevo_otro_apoyo($_POST) == "-1")
            $this->session->set_flashdata('error', 'Error al guardar el apoyo');

        //$this->mostrar();
        redirect(base_url() . "cedula/reAbrir/" . $_POST['proyecto_id']);

    }


    public function nuevoEntregable()
    {
        $this->load->model('proyecto_entregable_model');  
        
        if ($this->proyecto_entregable_model->nuevo_entregable($_POST) == 1)
            $this->session->set_flashdata('mensaje', 'El entregable ha sido agregado');
        else if ($this->proyecto_entregable_model->nuevo_entregable($_POST) == 0)
            $this->session->set_flashdata('error', 'Por favor revisa el porcentaje ya que sobre pasa el 100%');
        else if ($this->proyecto_entregable_model->nuevo_entregable($_POST) == -1)
            $this->session->set_flashdata('error', 'Error al guardar el entregable');

        //$this->mostrar();
        redirect(base_url() . "cedula/reAbrir/" . $_POST['proyecto_id']);

    }
    
     public function nuevoEntregable2()
    {
        $this->load->model('proyecto_entregable_model');  
        
        if ($this->proyecto_entregable_model->nuevo_entregable2($_POST) == 1)
            $this->session->set_flashdata('mensaje', 'El entregable ha sido agregado');
        else if ($this->proyecto_entregable_model->nuevo_entregable2($_POST) == 0)
            $this->session->set_flashdata('error', 'Por favor revisa el porcentaje ya que sobre pasa el 100%');
        else if ($this->proyecto_entregable_model->nuevo_entregable2($_POST) == -1)
            $this->session->set_flashdata('error', 'Error al guardar el entregable');

        //$this->mostrar();
        redirect(base_url() . "cedula/reAbrir/" . $_POST['proyecto_id']);

    }

    public function nuevoEntregableAJAX()
    {
        $this->load->model('proyecto_entregable_model');  
        if ($this->proyecto_entregable_model->nuevo_entregable($_POST))
            echo "OK";
        else
            echo "-1";

        //$this->mostrar();
        // redirect(base_url() . "cedula/reAbrir/" . $_POST['proyecto_id']);

    }

    public function enviar()
    {
        $this->load->model('proyecto_model');

        if ($this->proyecto_model->enviar_cedula_proyecto($_POST))
        {
            // obtener el correo de envio de cedula a cual enviarse
            $this->load->model('correo_model');
            $correo = $this->correo_model->obtener_correo(8);

            // enviar correo a la institucion
            $proyecto = $this->proyecto_model->obtener_proyecto($_POST['proyecto_id']);

            $this->load->model('institucion_model');

            // $name       = @trim(stripslashes("Sistema FIDEM")); 
            // $from       = @trim(stripslashes("notificaciones@sistemafidem.org.mx")); 
            // $from       = @trim(stripslashes("noreply@cdem.org.mx"));             
            // $subject    = @trim(stripslashes("Nueva Cedula Recibida")); 
            // $message    = @trim(stripslashes("Existe un nuevo envio de una cedula. Por favor revise el Sistema de FIDEM.")); 
            // $to         = $correo->correo;

            // $headers = array();
            // $headers .= "MIME-Version: 1.0";
            // $headers .= "Content-type: text/plain; charset=iso-8859-1";
            // $headers .= "From: {$name} <{$from}>";
            // $headers .= "Reply-To: <{$from}>";
            // $headers .= "Subject: {$subject}";
            // $headers .= "X-Mailer: PHP/".phpversion();

            // mail($to, $subject, $message, $headers);
             //here
            //  $this->load->model('correo_model');
            //  $correo = $this->correo_model->obtener_correo(9);
     
             $subject    = @trim(stripslashes("Nueva Cedula Recibida")); 
             $message    = @trim(stripslashes("Existe un nuevo envio de una cedula. Por favor revise el Sistema de FIDEM.")); 
             $to         = $correo->correo;
     
             $this->load->library('email');
             $this->email->initialize();
             $this->email->from('noreply@cdem.org.mx', 'Notificaciones');
             $this->email->to($to);  
            //  $this->email->cc('jacerda9@hotmail.com');
             $this->email->subject($subject);
         
             $this->email->message($message);  
     
             $this->email->send();

            $this->session->set_flashdata('mensaje', 'La cédula ha sido enviada exitosamente');
        }
        else
            $this->session->set_flashdata('error', 'Error al enviar la cédula');

        //$this->mostrar();
        redirect(base_url() . "cedula/reAbrir/" . $_POST['proyecto_id']);

    }

    public function nuevaActividad()
    {
        $this->load->model('actividad_model');

        if ($this->actividad_model->nueva_actividad($_POST))
            $this->session->set_flashdata('mensaje', 'La actividad ha sido creada');
        else
            $this->session->set_flashdata('error', 'Error al crear la actividad');

        //$this->mostrar();
        redirect("cedula/reAbrir/" . $_POST['proyecto_id']);

    }

    public function mostrarReporte()
    {
        $this->load->view('reporte');  
    }

    public function imprimir()
    {
        $this->load->model('proyecto_model');
        $data['proyecto'] = $this->proyecto_model->obtener_proyecto($_POST['proyecto_id']);


        if ($data['proyecto']->id > 0)
        {
            $this->load->model('institucion_model');     
            $data['institucion'] = $this->institucion_model->obtener_institucion($data['proyecto']->id_institucion);

            // leer catalogos
            $this->load->model('tipo_estudio_model');   
            $data['ciudad'] = $this->tipo_estudio_model->obtener_tipos_ciudad();
            $data['tipos_estudio'] = $this->tipo_estudio_model->obtener_tipos_estudio();
            $data['tipos_proyecto'] = $this->proyecto_model->obtener_tipos_proyecto();   
            
            $data['ciudad_por_proyecto'] = $this->tipo_estudio_model->obtener_ciudad_por_proyecto($data['proyecto']->ciudadid);
            $data['tipos_estudio_por_proyecto'] = $this->tipo_estudio_model->obtener_tipos_estudio_por_proyecto($data['proyecto']->id);

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

            // obtener firmas
            $this->load->model('firma_model');  
            $data['firmas'] = $this->firma_model->obtener_firmas();  

            $this->load->view('reporte', $data);

        }
        else
        {

            $this->session->set_flashdata('error', 'Por favor revise la información ingresada');
            redirect(base_url());
        }
    }

}
