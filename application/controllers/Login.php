<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('header');
        $this->load->view('login_view');
        $this->load->view('footer');
    }

    public function validaLogin(){
        $this->load->model('Model_Login');
        $jsondata = array();
        $insert = false;

        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $result = $this->Model_Login->validaLogin($username,$password);
        if ($result==true) {
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Si tiene acceso al sistema";
            $jsondata["details"] = "OK";


            session_start();
            $_SESSION["username"] = $username;

        }else{
            $jsondata["code"] = 401;
            $jsondata["msg"] = "No tiene acceso al sistema";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);

    }
}
