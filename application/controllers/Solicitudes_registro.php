<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes_registro extends CI_Controller {

    public function obtener($id)
    {
        $this->load->model('solicitud_registro_model');

        $data['solicitud'] = $this->solicitud_registro_model->obtener_solicitud_registro($id);
        $data['solicitudes'] = $this->solicitud_registro_model->obtener_solicitudes_registro();
        $data['opcion_panel'] = 'solicitudes-registro';
        $this->load->view('templete-panel-control', $data);
    }

    public function aprobar($id)
    {
        $this->load->model('solicitud_registro_model');

        if ($this->solicitud_registro_model->aprobar_solicitud_registro($id))
        {
            $data['contenido'] = 'mensaje-confirmacion-solicitud';
            $solicitante = $this->solicitud_registro_model->obtener_solicitud_registro($id);

            $this->load->model('correo_model');
            $correo = $this->correo_model->obtener_correo(9);


            $name       = @trim(stripslashes("Sistema FIDEM")); 
            $from       = @trim(stripslashes("notificaciones@sistemafidem.org.mx")); 
            $subject    = @trim(stripslashes("Su solicitud de registro ha sido aprobada")); 
            $message    = @trim(stripslashes("Su institucion " . $solicitante->nombre . " ha sido aprobada")); 
            $to         = $correo->correo . "," . $solicitante->correo;

            $headers = array();
            $headers .= "MIME-Version: 1.0";
            $headers .= "Content-type: text/plain; charset=iso-8859-1";
            $headers .= "From: {$name} <{$from}>";
            $headers .= "Reply-To: <{$from}>";
            $headers .= "Subject: {$subject}";
            $headers .= "X-Mailer: PHP/".phpversion();

            mail($to, $subject, $message, $headers);

            $this->session->set_flashdata('mensaje', 'La solicitud de registro ha sido aprobada');
        }
        else
            $this->session->set_flashdata('error', 'Error al aprobar la solicitud de registro');

        redirect(base_url() . "panel_control/mostrarSolicitudesRegistro");

    }

    public function rechazar($id)
    {
        $this->load->model('solicitud_registro_model');

        if ($this->solicitud_registro_model->rechazar_solicitud_registro($id))
        {
            $data['contenido'] = 'mensaje-confirmacion-solicitud';
            $solicitante = $this->solicitud_registro_model->obtener_solicitud_registro($id);

            $this->load->model('correo_model');
            $correo = $this->correo_model->obtener_correo(9);


            $name       = @trim(stripslashes("Sistema FIDEM")); 
            $from       = @trim(stripslashes("notificaciones@sistemafidem.org.mx")); 
            $subject    = @trim(stripslashes("Su solicitud de registro ha sido rechazada")); 
            $message    = @trim(stripslashes("Lo sentimos. Su institucion " . $solicitante->nombre . " ha sido rechazada")); 
            $to         = $correo->correo . "," . $solicitante->correo;

            $headers = array();
            $headers .= "MIME-Version: 1.0";
            $headers .= "Content-type: text/plain; charset=iso-8859-1";
            $headers .= "From: {$name} <{$from}>";
            $headers .= "Reply-To: <{$from}>";
            $headers .= "Subject: {$subject}";
            $headers .= "X-Mailer: PHP/".phpversion();

            mail($to, $subject, $message, $headers);

            $this->session->set_flashdata('mensaje', 'La solicitud de registro ha sido rechazada');
        }
        else
            $this->session->set_flashdata('error', 'Error al rechazar la solicitud de registro');

        redirect(base_url() . "panel_control/mostrarSolicitudesRegistro");

    }


}
