<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terminos_referencia extends CI_Controller {

    public function index()
    {
        // obtener insittituciones registadas
        $this->load->model('institucion_model');

        $data['instituciones'] = $this->institucion_model->obtener_instituciones_registradas();
        $data['contenido'] = 'terminos-referencia';        
        $this->load->view('templete', $data);
    }

    public function registro()
    {
        $data['contenido'] = 'registro-proveedor';
        $this->load->view('templete', $data);
    }

    public function nuevo()
    {
        $this->load->model('proyecto_model');
        $id = $this->proyecto_model->nuevo_proyecto($_POST);

        if ($id > 0)
        {
            // traer la info con el id
            // /*
           $this->load->model('proyecto_model');
            $data['proyecto'] = $this->proyecto_model->obtener_proyecto($id);
            $this->load->model('institucion_model');
            $data['solicitante'] = $this->institucion_model->obtener_institucion($data['proyecto']->id_institucion);

            // obtener el correo de envio de cedula a cual enviarse
            $this->load->model('correo_model');
            $correo = $this->correo_model->obtener_correo(8);

            $name       = @trim(stripslashes("Sistema FIDEM")); 
            // $from       = @trim(stripslashes("notificaciones@sistemafidem.org.mx")); 
            $from       = @trim(stripslashes("noreply@cdem.org.mx"));             
            $subject    = @trim(stripslashes("Nuevo Registro de los Terminos de Referencia")); 
            $message    = @trim(stripslashes("La informacion para ingresar a su cedula es la siguiente: Folio:" . $data['proyecto']->folio . ", Password:" . $data['proyecto']->clave)); 
            $to         = $data['proyecto']->correo;

            // $headers = array();
            // $headers = "MIME-Version: 1.0";
            // $headers .= "Content-type: text/plain; charset=iso-8859-1";
            // $headers .= "From: {$name} <{$from}>";
            // $headers .= "Reply-To: <{$from}>";ee
            // $headers .= "Subject: {$subject}";
            // $headers .= "X-Mailer: PHP/".phpversion();

            // mail($to, $subject, $message, $headers);
            $data['contenido'] = 'mensaje-confirmacion-termino-referencia';

            $this->load->library('email');
            $this->email->initialize();
            $this->email->from('noreply@cdem.org.mx', 'Notificaciones');
            $this->email->to($to);  
            // $this->email->cc('jacerda9@hotmail.com');
            $this->email->subject($subject);
            $this->email->message($message);  
            $this->email->send();

            $this->load->view('templete', $data);
            
        }
        else
        {
            $this->session->set_flashdata('error', 'Error al registrar el proyecto');
            redirect(base_url() . "terminos_referencia");
        }

    }

}
