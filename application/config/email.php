<?php
defined('BASEPATH') OR exit('No direct script access allowed');

        
        // cuando hay ssl se pone mail en el protocol
        // $config['protocol']    = 'mail';   
        // $config['protocol']    = 'smtp';   
        // $config['smtp_host']    = 'cdem.org.mx';
        // $config['smtp_port']    = '587';
        // $config['protocol']    = 'mail';    
        // $config['smtp_host']    = 'relay-hosting.secureserver.net';
        // $config['smtp_port']    = '25';
        // $config['smtp_timeout'] = '10';
        // $config['smtp_user']    = 'noreply@cdem.org.mx';
        // $config['smtp_pass']    = 'cdemnoreply';
        // $config['charset']    = 'utf-8';
        // $config['newline']    = "\r\n";
        // $config['mailtype'] = 'html'; // text or html
        // $config['validation'] = TRUE; 


        $config['protocol']    = 'smtp';    
        // $config['smtp_host']    = 'cdem.org.mx';
        $config['smtp_port']    = '587';
        $config['smtp_host']    = 'smtpout.secureserver.net';
        // $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'noreply@cdem.org.mx';
        $config['smtp_pass']    = 'cdemnoreply';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // text or html
        $config['validation'] = TRUE; 