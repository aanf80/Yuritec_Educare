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
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
    }


    public function sign_up()
    {
        $this->load->view('header');
        $this->load->view('user/signup_view');
        $this->load->view('footer');
    }
    public function forgotten_password()
    {
        $this->load->view('header');
        $this->load->view('user/forgottenpwd_view');
        $this->load->view('footer');
    }
    public function change_password($key)
    {
        $data['key'] = $key;
        $this->load->view('header');
        $this->load->view('user/changepassword_view',$data);
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
        $carpeta = 'assets/images/';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        if (!file_exists($carpeta . "profile_default.png")) {
            copy(base_url('assets/img/profile_default.png'), $carpeta . "profile_default.png");
        }

        $hoy = date("Y-m-d");
        $this->load->model('Model_User');

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
            'photo' => $carpeta . 'profile_default.png',
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

        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $lastname = $this->input->post('lastname');

        $query = $this->Model_User->userExists($email);

        if ($query != 0) {
            $jsondata["code"] = 402;
            $jsondata["msg"] = "El correo ya se encuentra registrado.";
            $jsondata["details"] = "Correo duplicado";

            header('Content-type: application/json; charset=utf-8');
            header("Cache-Control: no-store");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);

            return;
        }

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

    public function getUsersByRole($roleid)
    {
        $this->load->model('Model_User');

        $data = $this->Model_User->getUsersByRole($roleid);
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

        $userid = $this->session->userdata('userid');
        $user = $this->Model_User->getUserByID($userid);


        $password = $user[0]->password;

        if($user[0]->password !== $this->input->post('password')){
            $password = md5((string)$this->input->post('password'));
        }

        $data = array(
            'userid' => $this->input->post('userid'),
            'username' => $this->input->post('username'),
            'lastname' => $this->input->post('lastname'),
            'maternalsurname' => $this->input->post('maternalsurname'),
            'password' => $password,
            'institute' => $this->input->post('institute'),
            'gender' => $this->input->post('gender'),
            'initials' => $this->input->post('initials'),
            'sign' => $this->input->post('sign'),
            'roleid' => $this->input->post('roleid'),
            'status' => $this->input->post('status'),
            'registerdate' => $hoy,
            'bio' => $this->input->post('bio'),
            'street' => $this->input->post('address'),
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

    public function changeUserPhoto(){

        $carpeta = 'assets/images';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
        $config['upload_path'] = 'assets/images';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            echo $this->upload->display_errors();
        } else {
            $datos = array('upload_data' => $this->upload->data());
            $this->load->model('Model_User');
            $jsondata = array();
            $data = array(
                'userid' => $this->input->post('userid'),
                'photo' => $datos['upload_data'] ['file_name']
            );
            if($data['photo']==null){
                redirect('home', 'refresh');
            }
            $update = $this->Model_User->updateUser(array('userid' => $this->input->post('userid')), $data);
            if($update == true){
                $jsondata["code"] = 200;
                $jsondata["msg"] = "Actiualizado correctamente";
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

    }

    public function deleteUser()
    {
        $this->load->model('Model_User');
        $jsondata = array();

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
    public function changePassword(){
        $this->load->model('Model_User');
        $jsondata = array();
        $key = $this->input->post('key');
       
        $users = $this->Model_User->getUsers();

        foreach($users as $user){
            $email = md5((string) $user->email);
            $emailcode = md5((string) $user->emailcode);       
         
            if($email."-".$emailcode == $key){
                $userid = $user->userid;     
            }
        }
        $password = md5((string)$this->input->post('password'));
        $data = array(
            'userid' => $userid,
            'password' => $password            
        );
        if ($data['password'] == null) {
            redirect('home', 'refresh');
        }

        $update = $this->Model_User->updateUser(array('userid' => $userid), $data);
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
    public function password_request(){
        
     $this->load->model('Model_User');
      $email = $this->input->post('email');
      $user = $this->Model_User->getUserByEmail($email);
      $emailcode = $user[0]->emailcode;
      $key = md5((string)$email);
      $key2 = md5((string)$emailcode);
        $data['username'] = $this->Model_User->getUserByEmail($email)[0]->username;
        $data['lastname'] = $this->Model_User->getUserByEmail($email)[0]->lastname;
        $data['password'] = $this->Model_User->getUserByEmail($email)[0]->password;
        $pass =md5($data['password']); 

     
    $jsondata = array();
    $emailFrom = "armando.navarroflores94@gmail.com";
    $emailTo =  $email;


    $emailMessage = "<h2>Solicitud de contraseña </h2>";
    $emailMessage .= "<h3>Hola ". $data['username']." ". $data['lastname']."</h3>";
    $emailMessage .= "<p>Ingrese a la siguiente dirección para cambiar su contraseña: ".base_url()."user/change_password/".$key."-".$key2;

    $emailSubject = "Solicitud de contraseña Yurítec Educare";

    $data = Array(
        'name' => $this->input->post('email'),
        'emailFrom' => $emailFrom,
        'emailTo' => $emailTo,
        'message' => $emailMessage,
        'subject' => $emailSubject

    );

    $headers = 'From: ' . $data['name'] . "\r\n" .
        'Reply-To: ' . $data['emailFrom'] . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $config = Array(
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

    public function register()
    {    
        $hoy = date("Y-m-d");

        $password = md5((string)$this->input->post('password'));

      
            $this->load->model('Model_User');

            $data = array(
                'username' => $this->input->post('username'),
                'lastname' => $this->input->post('lastname'),
                'maternalsurname' => $this->input->post('maternalsurname'),
                'password' => $password,
                'email' => $this->input->post('email'),
                'institute' => $this->input->post('institute'),
                'gender' => $this->input->post('gender'),
                'initials' => $this->input->post('initials'),
                'sign' => $this->input->post('sign'),
                'roleid' => 2,
                'status' => 'P',
                'registerdate' => $hoy,
                'street' => $this->input->post('address'),
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

            $query = $this->Model_User->userExists($email);

            if ($query != 0) {
                $jsondata["code"] = 402;
                $jsondata["msg"] = "El correo ya se encuentra registrado.";
                $jsondata["details"] = "Correo duplicado";

                header('Content-type: application/json; charset=utf-8');
                header("Cache-Control: no-store");
                echo json_encode($jsondata, JSON_FORCE_OBJECT);

                return;
            }

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
        echo "No entró al IF ".$emailcode." - ".md5((string)$user[0]->emailcode);
    }

    public function validateEmail($email, $emailcode)
    {
        $validated = false;
        $emailcode = trim($emailcode);

        $this->load->model('Model_User');
        $validated = $this->validate($email, $emailcode);

        if ($validated === true) {
            redirect('login', 'refresh');
        } else {
            echo 'Error al confirmar el correo electrónico. Por favor contacte al administrador :/.';
        }
    }

    public function sendEmail($email, $username, $lastname, $emailcode)
    {
        $emailFrom = "armando.navarroflores94@gmail.com";
        $emailTo = $email;
        $emailSubject = "Confirme su cuenta de Yurítec Educare";
        $headers = 'From: ' . 'Revista Yurítec Educare' . "\r\n" .
            'Reply-To: ' . $emailFrom . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $emailMessage = "<h1>Hola " . $username . " " . $lastname . "</h1>";
        $emailMessage .= "<h2>Su registro a la revista Yurítec Educare ha sido exitoso.</h2>";
        $emailMessage .= "<p>Para continuar por favor confirme su cuenta a continuación:</p>";
        $emailMessage .= "<a href= " . base_url('/user/validateEmail/' . $email . '/' . $emailcode) . "> Confirmar y continuar</a>";
        $emailMessage .= "<h5>¡Gracias!</h5>";
        $config = Array(
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
        $this->email->from($emailFrom, "Revista Yurítec Educare");
        $this->email->to($emailTo);
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');

        $this->email->subject($emailSubject);
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
