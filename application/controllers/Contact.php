<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->model('Model_Contact');
        $data['contact'] = $this->Model_Contact->getContact();
        
        $data["contact_title"] = $this->lang->line("contact_title");
        $data["contact_msgTitle"] = $this->lang->line("contact_msgTitle");
        $data["contact_name"] = $this->lang->line("contact_name");
        $data["contact_phone"] = $this->lang->line("contact_phone");
        $data["contact_email"] = $this->lang->line("contact_email");
        $data["contact_msg"] = $this->lang->line("contact_msg");
        $data["contact_sendMsg"] = $this->lang->line("contact_sendMsg");
        $data["contact_detail"] = $this->lang->line("contact_detail");

        $this->load->view('header');
        $this->load->view('contact_view',$data);
        $this->load->view('footer');
    }


    public function sendContactEmail()
    {
        $jsondata = array();
        $emailFrom = "armando.navarroflores94@gmail.com";
        $emailTo = "arannavarrofl@ittepic.edu.mx";

        $emailMessage = '<p>' . $this->input->post('message') . '</p>';
        $emailMessage .= "<p> Número de contacto: " . $this->input->post('phone') . '</p>';
        $emailMessage .= "<p> Email de contacto: " . $this->input->post('email') . '</p>';
        $emailSubject = "Contacto Yurítec Educare";

        $data = Array(
            'name' => $this->input->post('name'),
            'emailFrom' => $emailFrom,
            'emailTo' => $emailTo,
            'message' => $emailMessage,
            'subject' => $emailSubject

        );

        $headers = 'From: ' . $data['name'] . "\r\n" .
            'Reply-To: ' . $data['emailFrom'] . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $config = Array(
            'smtp_timeout'=>'30',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'armando.navarroflores94@gmail.com',
            'smtp_pass' => 'Chivascampeon.12',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $email_setting = array('mailtype' => 'html');
        $this->email->initialize($email_setting);
        $this->email->from($data['emailFrom'], $data['name']);
        $this->email->to($data['emailTo']);

        $this->email->subject($data['subject']);
        $this->email->message($data['message']);
        $this->email->set_header("Headers", $headers);

        if ($this->email->send() == true) {

            $jsondata["code"] = 200;
            $jsondata["msg"] = "Su mensaje se ha enviado correctamente.";
            $jsondata["details"] = "OK";

        } else {
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Ocurrió un error al enviar el mensaje, intente más tarde";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }
}
