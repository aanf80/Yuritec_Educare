<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index()
    {
        $data["login_title"] = $this->lang->line("login_title");
        $data["login_msg"] = $this->lang->line("login_msg");
        $data["login_pwd"] = $this->lang->line("login_pwd");
        $data["login_email"] = $this->lang->line("login_email");
        $data["login_signIn"] = $this->lang->line("login_signIn");
        $data["login_remember"] = $this->lang->line("login_title");
        $data["login_signUp"] = $this->lang->line("login_signUp");
        $data["login_remember"] = $this->lang->line("login_remember");       
        $data["login_forgot"] = $this->lang->line("login_forgot");
               
        $this->load->view('header');
        $this->load->view('login_view',$data);
        $this->load->view('footer');
    }

    public function validaLogin(){
        $this->load->model('Model_Login');
        $jsondata = array();
        $insert = false;

        $username = $this->input->post('username');

        $password = md5((string)$this->input->post('password'));

        $confirmed = $this->Model_Login->isConfirmed($username);
        if($confirmed[0]->status === 'C') {

            $result = $this->Model_Login->validaLogin($username, $password);

            if ($result['logueado']) {

                $jsondata["code"] = 200;
                $jsondata["msg"] = "Si tiene acceso al sistema" . " el correo es:" . $result['email'];
                $jsondata["details"] = "OK";

                $this->session->set_userdata($result);
                $this->load->library('session');
            } else {
                $jsondata["code"] = 401;
                $jsondata["msg"] = "No tiene acceso al sistema";
                $jsondata["details"] = "OK";
            }
        }
        else{
            $jsondata["code"] = 402;
            $jsondata["msg"] = "Cuenta no confirmada. Revise su correo electrónico para confirmarla.";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }

    public  function  sign_out(){
        $this->session->sess_destroy();
        redirect('home', 'refresh');
    }


}
