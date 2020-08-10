<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institucion extends CI_Controller {

    public function obtener($id)
    {
        $this->load->model('institucion_model');

        $data['institucion'] = $this->institucion_model->obtener_institucion($id);
        $data['instituciones'] = $this->institucion_model->obtener_instituciones_registradas();
        $data['opcion_panel'] = 'instituciones-registradas';
        $this->load->view('templete-panel-control', $data);
    }

    public function aprobar($id)
    {
        $this->load->model('solicitud_registro_model');

        if ($this->solicitud_registro_model->aprobar_solicitud_registro($id))
        {
            // enviar correo a la institucion
            $this->load->model('institucion_model');
            $solicitante = $this->institucion_model->obtener_institucion($id);

            $name       = @trim(stripslashes("Sistema FIDEM")); 
            $from       = @trim(stripslashes("notificaciones@sistemafidem.org.mx")); 
            $subject    = @trim(stripslashes("Tu solicitud ha sido aprobada")); 
            $message    = @trim(stripslashes("Felicidades...Tu informacion de registro ha sido aceptada"));
            $to         = $solicitante->correo;

            $headers = array();
            $headers .= "MIME-Version: 1.0";
            $headers .= "Content-type: text/plain; charset=iso-8859-1";
            $headers .= "From: {$name} <{$from}>";
            $headers .= "Reply-To: <{$from}>";
            $headers .= "Subject: {$subject}";
            $headers .= "X-Mailer: PHP/".phpversion();

            if (mail($to, $subject, $message, $headers))
                $this->session->set_flashdata('mensaje', 'La solicitud de registro ha sido aprobada y enviada a ' . $solicitante->correo);
            else
                $this->session->set_flashdata('error', 'Error al enviar el correo');

            redirect(base_url() . "panel_control/mostrarSolicitudesRegistro");
        }
        else
        { 
            $this->session->set_flashdata('error', 'Error al aprobar la solicitud de registro');
            redirect(base_url() . "panel_control/mostrarSolicitudesRegistro");

        }


    }

    public function rechazar($id)
    {
        $this->load->model('solicitud_registro_model');

        if ($this->solicitud_registro_model->rechazar_solicitud_registro($id))
        {
            // enviar correo a la institucion
            $this->load->model('institucion_model');
            $solicitante = $this->institucion_model->obtener_institucion($id);

            $name       = @trim(stripslashes("Sistema FIDEM")); 
            $from       = @trim(stripslashes("notificaciones@sistemafidem.org.mx")); 
            $subject    = @trim(stripslashes("Tu solicitud ha sido rechazada")); 
            $message    = @trim(stripslashes("Lo sentimos...Tu solicitud ha sido rechazada"));
            $to         = $solicitante->correo;

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

    public function actualizar()
    {
        $this->load->model('institucion_model');

        if ($this->institucion_model->actualizar_institucion($_POST))
            $this->session->set_flashdata('mensaje', 'La institución ha sido modificada');
        else
            $this->session->set_flashdata('error', 'Error al modificar la institución');

        redirect(base_url() . "panel_control/mostrarInstitucionesRegistradas");

    }

    public function obtenerDireccionPorInstitucion()
    {
        $id = $_POST['institucion_id'];
        $this->load->model('institucion_model');

        $institucion = $this->institucion_model->obtener_institucion($id);

        echo $institucion->direccion;

    }

    public function eliminar($institucion_id)
    {
        $this->load->model('institucion_model');

        if ($this->institucion_model->eliminar_institucion($institucion_id))
            $this->session->set_flashdata('mensaje', 'La institución ha sido eliminada');
        else
            $this->session->set_flashdata('error', 'Error al eliminar la institución');

        redirect(base_url() . "panel_control/mostrarInstitucionesRegistradas");


    }

}
