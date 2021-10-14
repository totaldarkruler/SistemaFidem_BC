<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Controller {
    function actualizar_no_evaluadores()
    {
        $this->load->model('Proyecto_model');

        if ($this->Proyecto_model->actualizar_no_evaluadores($_POST))
            $this->session->set_flashdata('mensaje', 'La cantidad de evaluadores ha sido actualizada');
        else
            $this->session->set_flashdata('error', 'Error al actualizar la cantidad de evaluadores');

        redirect(base_url() . "cedula_administrador/evaluar/" . $_POST['proyecto_id']);
    }

    function agregar_evaluador()
    {
        $this->load->model('Proyecto_model');

        if ($this->Proyecto_model->agregar_evaluador($_POST))
            $this->session->set_flashdata('mensaje', 'El evaluador ha sido agregado al proyecto');
        else
            $this->session->set_flashdata('error', 'Error al agregar el evaluador al proyecto');

        redirect(base_url() . "cedula_administrador/evaluar/" . $_POST['proyecto_id']);
    }


    function eliminar_evaluador($proyecto_id, $evaluador_id)
    {
        $this->load->model('Proyecto_model');

        if ($this->Proyecto_model->eliminar_evaluador($proyecto_id, $evaluador_id))
            $this->session->set_flashdata('mensaje', 'El evaluador ha sido eliminado del proyecto');
        else
            $this->session->set_flashdata('error', 'Error al eliminar el evaluador del proyecto');

        redirect(base_url() . "cedula_administrador/evaluar/" . $proyecto_id);
    }

    function enviar_notificacion_evaluacion($proyecto_id, $evaluador_id)
    {
        $this->load->model('Proyecto_model');
        $proyecto = $this->Proyecto_model->obtener_proyecto($proyecto_id);

        $this->load->model('Usuario_model');
        $evaluador = $this->Usuario_model->obtener_usuario($evaluador_id);

        // $correo = "'".$evaluador->correo."'";

         $correo =(string) $evaluador->correo;

        $titulo = 'Evaluacion de proyectos';

        // Cuerpo o mensaje
        $mensaje = '
		<html>
		<head>
		  <title>Evaluacion de Proyectos</title>
		</head>
		<body>
		  <p style="text-align:left;font-weight:bold">Se ha asignado al siguiente proyecto para su evaluación:</p>
		  <br>
		  <table>
			<tr>
			  <td style="text-align:left;">Folio:</td><td>'.$proyecto->folio.'</td>
			</tr>
			<tr>
			  <td style="text-align:left;">Proyecto:</td><td>'.$proyecto->proyecto.'</td>
			</tr>
			<tr>
			  <td style="text-align:left;">Area de influencia:</td><td>'.$proyecto->area_influencia.'</td>
			</tr>
			<tr>
			  <td style="text-align:left;">Tipo de proyecto:</td><td>'.$proyecto->tipo_proyecto.'</td>
			</tr>
		  </table>

		  <p style="text-align:left; font-weight: normal;">Podra accesar a la evaluacion de proyectos a traves del siguiente enlace: <a href="http://sistemafidem.org.mx/Sesion/mostrarLoginEvaluador/" target="_blank">Click aqui</a> </p>
		</body>
		</html>
		';
        //$mensaje = this.omitirCaracteres($mensaje);
        
        
        $this->load->library('email');

        // $config['protocol']    = 'smtp';
        // $config['smtp_host']    = 'sistemafidem.org.mx';
        // $config['smtp_port']    = '587';
        // $config['smtp_timeout'] = '7';
        // $config['smtp_user']    = 'notificaciones@sistemafidem.org.mx';
        // $config['smtp_pass']    = 'Azul123123!';
        // $config['charset']    = 'utf-8';
        // $config['newline']    = "\r\n";
        // $config['mailtype'] = 'html'; // text or html
        // $config['validation'] = TRUE; 

        // $config['protocol']    = 'smtp';
        // $config['smtp_host']    = 'cdem.org.mx';
        // $config['smtp_port']    = '587';
        $config['smtp_host']    = 'smtpout.secureserver.net';
        $config['smtp_port']    = '587';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'noreply@cdem.org.mx';
        $config['smtp_pass']    = 'cdemnoreply';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // text or html
        $config['validation'] = TRUE; 

        $this->email->initialize($config);

        // $this->email->from('notificaciones@sistemafidem.org.mx', 'Notificaciones');
        $this->email->from('noreply@cdem.org.mx', 'Notificaciones');
        $this->email->to($correo);  
        // $this->email->cc('jacerda9@hotmail.com');
        $this->email->subject($titulo);
    
        $this->email->message($mensaje);  

        $this->email->send();

        //echo 'el correo es: ' .  $correo;
        //echo $this->email->print_debugger();
        
		$this->session->set_flashdata('mensaje', 'La notificación ha sido enviada');
        redirect(base_url() . "cedula_administrador/evaluar/" . $proyecto->id);

    }


    function evaluar($evaluacion_proyecto_id, $deshabilitar = 0)
    {
        // obtener el proyecto_id y evluador_id en base a la evaluacion_proyecto
        // obtener_observaciones
        $this->load->model("Evaluacion_proyecto_model");
        $evaluacion_proyecto = $this->Evaluacion_proyecto_model->obtener_evaluacion_proyecto($evaluacion_proyecto_id);


        $this->load->model("Proyecto_model");
        $proyecto = $this->Proyecto_model->obtener_proyecto($evaluacion_proyecto->id_proyecto);
        $data['proyecto'] = $proyecto;
        
        $iEvaluadorID = $evaluacion_proyecto->id_evaluador;
        $data['observaciones'] = $evaluacion_proyecto->observaciones;

        // si es admin tomar evaluador_id del proyecto si no de la session
        $data['evaluador_id'] = $evaluacion_proyecto->id_evaluador;

        //agregamos el id del proyecto evaluador para volver a cargar
        $data['evaluador_proyecto_id'] = $evaluacion_proyecto_id;

        $this->load->model("Preguntas_model");
        //$data['preguntas'] = $this->Preguntas_model->obtener_preguntas($proyecto->id_tipo_proyecto);
        $preguntas = $this->Preguntas_model->obtener_preguntas($proyecto, $evaluacion_proyecto);

        // ordernar preguntas por pregunta_id
        $registros = array();
        foreach($preguntas->result() as $pregunta)
        {
            array_push($registros, array($pregunta->variable, $pregunta->pregunta,$pregunta->id, $pregunta->respuesta,$pregunta->pregunta_id, $pregunta->valor, $pregunta->id_respuesta, $pregunta->pregunta_calculada));

        }

        //$registros = usort($registros, 'pregunta_id');

        foreach ($registros as $key => $row) {
            // replace 0 with the field's index/key
            $dates[$key]  = $row[4];
        }

        array_multisort($dates, SORT_ASC, $registros);
        //echo '<pre>'; print_r($registros); echo '</pre>';
        /*
        foreach ( $registros as $var ) {
            echo "\n", $var[0], "\t\t", $var[1];
        }
*/
        //echo '<pre>'; print_r($registros); echo '</pre>';

        $data['preguntas'] = $registros;
        $data['contenido'] = 'evaluacion-proyecto';
        $data['deshabilitar'] = $deshabilitar;
        $this->load->view('templete', $data);

    }

    function cmp($a, $b)
    {
        return strcmp($a["pregunta_id"], $b["pregunta_id"]);
    }


    function guardar_evaluacion()
    {
        $this->load->model('Proyecto_model');

        if ($this->Proyecto_model->guardar_evaluacion($_POST))
            $this->session->set_flashdata('mensaje', 'La evaluación ha sido guardada');
        else
            $this->session->set_flashdata('error', 'Error al guardar la evaluación');

        redirect(base_url() . "proyecto/evaluar/" . $_POST['evaluador_proyecto_id']);
    }


    function finalizar_evaluacion()
    {
        $this->load->model('Proyecto_model');

        if ($this->Proyecto_model->finalizar_evaluacion($_POST))
            $this->session->set_flashdata('mensaje', 'La evaluación ha sido finalizada');
        else
            $this->session->set_flashdata('error', 'Error al finalizar la evaluación');

        redirect(base_url() . "evaluacion");
    }

    function guardar_observacion_evaluacion()
    {
        $proyecto_id = $_POST['proyecto_id'];

        $this->load->model('Proyecto_model');

        if ($this->Proyecto_model->guardar_observacion_evaluacion($_POST))
            $this->session->set_flashdata('mensaje', 'La observación ha sido guardada');
        else
            $this->session->set_flashdata('error', 'Error al guardar la observación');

        redirect(base_url() . "cedula_administrador/evaluar/" . $proyecto_id);
    }


    function omitirCaracteres($string)
    {

        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

         //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!",
                  "·", "$", "%", "&", "/",
                  "(", ")", "?", "'", "¡",
                  "¿", "[", "^", "<code>", "]",
                  "+", "}", "{", "¨", "´",
                  ">", "< ", ";", ",", ":",
                  ".", " "),
            '',
            $string
        );


        return $string;
    }

}
