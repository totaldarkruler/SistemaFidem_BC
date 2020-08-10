<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Firma extends CI_Controller {
    function obtener_firmas()
    {
        if ($this->db->get('firma')->num_rows() > 0)
            return $this->db->get('firma');
        else
            return false;
    }

    public function actualizarFirmas()
    {
        $this->load->model('firma_model');

        if ($this->firma_model->actualizar_firmas($_POST))
            $this->session->set_flashdata('mensaje', 'Las firmas de organismo intermedio han sido actualizadas');
        else
            $this->session->set_flashdata('error', 'Error al actualizar las firmas de organismo intermedio');

        redirect(base_url() . "panel_control/mostrarMantenimientos");
    }



}

