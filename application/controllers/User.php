<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


    public function sign_up()
    {
        $this->load->view('header');
        $this->load->view('user/signup_view');
        $this->load->view('footer');
    }
    public function users_new()
    {
        $this->load->view('header');
        $this->load->view('user/newusers_view');
        $this->load->view('footer');
    }
    public function users()
    {
        $this->load->view('header');
        $this->load->view('user/users_view');
        $this->load->view('footer');
    }

    public function newUser(){
        $this->load->model('Model_User');
        $jsondata = array();
        $hoy = date("Y-m-d");

        $data = array(
            'username' => $this->input->post('username'),
            'lastname' => $this->input->post('lastname'),
            'maternalsurname' => $this->input->post('maternalsurname'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'position' => $this->input->post('position'),
            'institute' => $this->input->post('institute'),
            'gender' => $this->input->post('gender'),
            'initials' => $this->input->post('initials'),
            'sign' => $this->input->post('sign'),
            'photo' => $this->input->post('photo'),
            'roleid' => $this->input->post('roleid'),
            'status' => 'P',
            'registerdate' => $hoy,
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country'),
            'neighborhood' => $this->input->post('neighborhood'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'streetnumber' => $this->input->post('streetnumber'),
            'zipcode' => $this->input->post('zipcode')

        );

        if($data['username']==null){
            redirect('home', 'refresh');
        }
        $insert = $this->Model_User->newUser($data);
        if($insert == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Registrado correctamente";
            $jsondata["details"] = "OK";
        }
        else{
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Error en el registro";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }

    public function getUsers(){

        $this->load->model('Model_User');
        $data = $this->Model_User->getUsers();
        $jsondata["code"] = 200;
        $jsondata["msg"] = array();
        foreach($data as $user){
            $jsondata["msg"][] = $user;
        }

        $jsondata["details"] = "OK";


        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata);
    }
    public function getUserById(){

        $this->load->model('Model_User');
        $email = $this->session->userdata('nombre');
        $data = $this->Model_User->getUserByEmail($email);
        $jsondata["code"] = 200;
        $jsondata["msg"] = array();
        foreach($data as $user){
            $jsondata["msg"][] = $user;
        }

        $jsondata["details"] = "OK";


        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata);
    }
    public function updateUser(){
        $this->load->model('Model_User');
        $jsondata = array();
        $hoy = date("Y-m-d");

        $data = array(
            'userid' => $this->input->post('userid'),
            'username' => $this->input->post('username'),
            'lastname' => $this->input->post('lastname'),
            'maternalsurname' => $this->input->post('maternalsurname'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'position' => $this->input->post('position'),
            'institute' => $this->input->post('institute'),
            'gender' => $this->input->post('gender'),
            'initials' => $this->input->post('initials'),
            'sign' => $this->input->post('sign'),
            'photo' => $this->input->post('photo'),
            'roleid' => $this->input->post('roleid'),
            'status' => 'P',
            'registerdate' => $hoy,
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country'),
            'neighborhood' => $this->input->post('neighborhood'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'streetnumber' => $this->input->post('streetnumber'),
            'zipcode' => $this->input->post('zipcode')

        );

        if($data['username']==null){
            redirect('home', 'refresh');
        }
        $update = $this->Model_User->updateUser(array('userid' => $this->input->post('userid')), $data);
        if($update == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Registrado correctamente";
            $jsondata["details"] = "OK";
        }
        else{
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Error en el registro";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }
    public function deleteUser()    {

        $this->load->model('Model_User');
        $jsondata = array();
        $insert = false;
        $data = array(
            'userid' => $this->input->post('userid')
        );

        if($data['userid']==null){
            redirect('home', 'refresh');
        }

        $delete =  $this->Model_User->deleteUser($data['userid']);
        if($delete == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Eliminado correctamente";
            $jsondata["details"] = "OK";
        }
        else{
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Error en el registro";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }


    public function register()
    {
        $this->load->model('Model_User');
        $jsondata = array();
        $hoy = date("Y-m-d");

        $data = array(
            'username' => $this->input->post('username'),
            'lastname' => $this->input->post('lastname'),
            'maternalsurname' => $this->input->post('maternalsurname'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'position' => $this->input->post('position'),
            'institute' => $this->input->post('institute'),
            'gender' => $this->input->post('gender'),
            'initials' => $this->input->post('initials'),
            'sign' => $this->input->post('sign'),
            'photo' => $this->input->post('photo'),
            'roleid' => 2,
            'status' => 'P',
            'registerdate' => $hoy,
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country'),
            'neighborhood' => $this->input->post('neighborhood'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'streetnumber' => $this->input->post('streetnumber'),
            'zipcode' => $this->input->post('zipcode')

        );

        if($data['username']==null){
            redirect('home', 'refresh');
        }
        $insert = $this->Model_User->newUser($data);
        if($insert == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Registrado correctamente";
            $jsondata["details"] = "OK";
        }
        else{
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Error en el registro";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }



    public function profile()
    {

        $this->load->model('Model_User');

        $email = $this->session->userdata('nombre');
        $data['user'] = $this->Model_User->getUserByEmail($email);

        $this->load->view('header');
        $this->load->view('user/profile_view',$data);
        $this->load->view('footer');
    }
}
