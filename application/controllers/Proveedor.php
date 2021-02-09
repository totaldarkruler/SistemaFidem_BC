<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller {

    public function registro()
    {
        $this->load->model('solicitud_registro_model');
        $id = $this->solicitud_registro_model->nueva_solicitud_registro($_POST);


        if ($id > 0)
        {
            $data['contenido'] = 'mensaje-confirmacion-solicitud';
            $data['solicitante'] = $this->solicitud_registro_model->obtener_solicitud_registro($id);

            $this->load->model('correo_model');
            $correo = $this->correo_model->obtener_correo(9);

            /*
            //obtener el correo de solicitud de registro a cual enviarse

            // enviar el email de notificacion
            $this->load->library('email');

            $this->email->from('notificaciones@sistemafidem.org.mx', 'Notificación FIDEM');
            $this->email->to($correo); 
            //$this->email->cc('another@another-example.com'); 
            //$this->email->bcc('them@their-example.com'); 

            $this->email->subject('Nueva Solicitud de Registo');
            $this->email->message('<p>Existe una nueva solicitud de registro. Por favor revise el Sistema de FIDEM.</p>');	

            @$this->email->send();
            //$this->email->print_debugger();
            */

            $name       = @trim(stripslashes("Sistema FIDEM")); 
            // $from       = @trim(stripslashes("notificaciones@sistemafidem.org.mx")); 
            $from       = @trim(stripslashes("noreply@cdem.org.mx")); 
            
            $subject    = @trim(stripslashes("Nueva Solicitud de Registro")); 
            $message    = @trim(stripslashes("Existe una nueva solicitud de registro por parte de '" . $data['solicitante']->nombre . "' .Por favor revise el Sistema de FIDEM.")); 
            $to         = $correo->correo . "," . $data['solicitante']->correo;

            // $headers = array();
            // $headers .= "MIME-Version: 1.0";
            // $headers .= "Content-type: text/plain; charset=iso-8859-1";
            // $headers .= "From: {$name} <{$from}>";
            // $headers .= "Reply-To: <{$from}>";
            // $headers .= "Subject: {$subject}";
            // $headers .= "X-Mailer: PHP/".phpversion();

            // mail($to, $subject, $message, $headers);
        //     $config['protocol']    = 'smtp';
        // // $config['smtp_host']    = 'cdem.org.mx';
        // // $config['smtp_port']    = '587';
        // $config['smtp_host']    = 'smtpout.secureserver.net';
        // $config['smtp_port']    = '587';
        // $config['smtp_timeout'] = '7';
        // $config['smtp_user']    = 'noreply@cdem.org.mx';
        // $config['smtp_pass']    = 'cdemnoreply';
        // $config['charset']    = 'utf-8';
        // $config['newline']    = "\r\n";
        // $config['mailtype'] = 'html'; // text or html
        // $config['validation'] = TRUE; 

            $this->load->library('email');
            $this->email->initialize();
            $this->email->from('noreply@cdem.org.mx', 'Notificaciones');
            $this->email->to($to);  
            $this->email->cc('jacerda9@hotmail.com');
            $this->email->subject($subject);
        
            $this->email->message($message);  
    
            $this->email->send();
            
            /*
            $to =  $correo;
            $subject = "Nueva Solicitud de Registro";
            $txt = "Existe una nueva solicitud de registro. Por favor revise el Sistema de FIDEM.";
            $headers = "From: notificaciones@sistemafidem.org.mx" . "\r\n" .
                "CC: emanueldiaz.mx@gmail.com, lsc.tanyamtz@hotmail.com, " . $data['solicitante']->correo;

            mail($to,$subject,$txt,$headers);
            */
            $this->load->view('templete', $data);        
        }
        else
        {
            $this->session->set_flashdata('error', 'Error al enviar la solicitud de registro');
            redirect(base_url() . "terminos_referencia");
        }

    }
}
