<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public $userData = array();

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
        if ($this->session->userdata('email') == null) {
            redirect('home', 'refresh');
        }
        $this->load->view('header');
        $this->load->view('user/users_view');
        $this->load->view('footer');
    }

    public function newUser()
    {
        if ($this->session->userdata('email') == null) {
            redirect('home', 'refresh');
        }
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
            'bio' => $this->input->post('bio'),
            'country' => $this->input->post('country'),
            'neighborhood' => $this->input->post('neighborhood'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'streetnumber' => $this->input->post('streetnumber'),
            'zipcode' => $this->input->post('zipcode')

        );

        if ($data['username'] == null) {
            redirect('home', 'refresh');
        }
        $insert = $this->Model_User->newUser($data);

        if ($insert == true) {
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Registrado correctamente.";
            $jsondata["details"] = "OK";
        } else {
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Error en el registro";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }

    public function getUsers()
    {
        $roleid = $this->session->userdata('roleid');
        if ($roleid != 1) {
            redirect('home', 'refresh');
        } else {
            $this->load->model('Model_User');
            $data = $this->Model_User->getUsers();
            $jsondata["code"] = 200;
            $jsondata["msg"] = array();
            foreach ($data as $user) {
                $jsondata["msg"][] = $user;
            }

            $jsondata["details"] = "OK";


            header('Content-type: application/json; charset=utf-8');
            header("Cache-Control: no-store");
            echo json_encode($jsondata);
        }

    }

    public function getUserById()
    {
        $this->load->model('Model_User');
        $userid = $this->session->userdata('userid');
        $data = $this->Model_User->getUserByID($userid);
        $jsondata["code"] = 200;
        $jsondata["msg"] = array();
        foreach ($data as $user) {
            $jsondata["msg"][] = $user;
        }
        $jsondata["details"] = "OK";
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata);
    }

    public function updateUser()
    {
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
            'bio' => $this->input->post('bio'),
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country'),
            'neighborhood' => $this->input->post('neighborhood'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'streetnumber' => $this->input->post('streetnumber'),
            'zipcode' => $this->input->post('zipcode')

        );

        if ($data['username'] == null) {
            redirect('home', 'refresh');
        }
        $update = $this->Model_User->updateUser(array('userid' => $this->input->post('userid')), $data);
        if ($update == true) {
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Actualizado correctamente";
            $jsondata["details"] = "OK";
        } else {
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Error en el registro";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }

    public function deleteUser()
    {

        $this->load->model('Model_User');
        $jsondata = array();
        $insert = false;
        $data = array(
            'userid' => $this->input->post('userid')
        );

        if ($data['userid'] == null) {
            redirect('home', 'refresh');
        }

        $delete = $this->Model_User->deleteUser($data['userid']);
        if ($delete == true) {
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Eliminado correctamente";
            $jsondata["details"] = "OK";
        } else {
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
            'bio' => $this->input->post('bio'),
            'country' => $this->input->post('country'),
            'neighborhood' => $this->input->post('neighborhood'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'streetnumber' => $this->input->post('streetnumber'),
            'zipcode' => $this->input->post('zipcode')

        );

        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $lastname = $this->input->post('lastname');

        if ($data['username'] == null) {
            redirect('home', 'refresh');
        }
        $insert = $this->Model_User->newUser($data);

        $user = $this->Model_User->getUserByEmail($email);
        $emailcode = md5((string)$user[0]->emailcode);

        if ($insert == true) {

            $jsondata["code"] = 200;
            $jsondata["msg"] = "Registrado correctamente. Se ha enviado un correo de confirmación.
            \nFavor de revisar su correo electrónico.";
            $jsondata["details"] = "OK";

            //Enviar correo electrónico de confirmación
            $this->sendEmail($email, $username, $lastname, $emailcode);
        } else {
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Error en el registro";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);

    }


    public function validate($email, $emailcode)
    {
        $result = false;
        $this->load->model('Model_User');
        $user = $this->Model_User->getUserByEmail($email);

        if (md5((string)$user[0]->emailcode) === $emailcode) {
            $result = $this->Model_User->updateStatus($email);
            if ($result === true) {
                return true;
            } else {
                echo 'Hubo un error al activar su cuenta. Por favor contacte al administrador.';
                return false;
            }
        }
    }

    public function validateEmail($email, $emailcode)
    {
        $validated = false;
        $emailcode = trim($emailcode);

        $this->load->model('Model_User');
        $validated = $this->validate($email, $emailcode);

        if ($validated === true) {
            redirect('login/');
        } else {
            echo 'Error al confirmar el correo electrónico. Por favor contacte al administrador.';
        }
    }

    public function sendEmail($email, $username, $lastname, $emailcode)
    {
        $emailFrom = "jess.pardo1811@gmail.com";
        $emailTo = $email;
        $emailSubject = "Confirme su cuenta de Yurítec Educare";
        $headers = 'From: ' . 'Revista Yurítec Educare' . "\r\n" .
            'Reply-To: ' . $emailFrom . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $emailMessage = "<h1>Hola ".$username." ".$lastname."</h1>";
        $emailMessage .= "<h2>Su registro a la revista Yurítec Educare ha sido exitoso.</h2>";
        $emailMessage .= "<p>Para continuar por favor confirme su cuenta a continuación:</p>";
        $emailMessage .= "<a href= ". base_url('/user/validateEmail/' . $email . '/' . $emailcode). "> Confirmar y continuar</a>";
        $emailMessage .= "<p>¡Gracias!</p>";
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'jess.pardo1811@gmail.com',
            'smtp_pass' => 'jessly1811',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $email_setting = array('mailtype' => 'html');
        $this->email->initialize($email_setting);
        $this->email->from($emailFrom, "Revista Yurítec Educare");
        $this->email->to($emailTo);
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');

        $this->email->subject($emailSubject);
        //$this->email->attach("/Yuritec_Educare/assets/img/yuritecbanner.png", 'inline');
        $this->email->message($emailMessage);
        $this->email->set_header("Headers", $headers);
        $this->email->send();
    }

//Vistas
    public
    function profile()
    {
        $userid = $this->session->userdata('userid');
        $this->load->model('Model_User');
        $data['user'] = $this->Model_User->getUserByID($userid);

        $this->load->view('header');
        $this->load->view('user/profile_view', $data);
        $this->load->view('footer');
    }

    public
    function my_articles()
    {
        $this->load->view('header');
        $this->load->view('articles/myarticles_view');
        $this->load->view('footer');
    }
}
