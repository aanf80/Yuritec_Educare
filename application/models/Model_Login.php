<?php

/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 03/04/2017
 * Time: 11:42 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Model_Login extends CI_Model{



    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function isConfirmed($username){
        $this -> db -> select('status');
        $this -> db -> from('user');
        $this -> db -> where('email', $username);
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        return $query->result();
    }

    function validaLogin($username, $password){
        $roleid = 0;
        $userid = 0;
        $email = "";
        $this -> db -> select('userid, email, password, roleid');
        $this -> db -> from('user');
        $this -> db -> where('email', $username);
        $this -> db -> where('password',$password);
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        foreach ($query ->result() as $row)
        {
            $userid = $row->userid;
            $roleid = $row->roleid;
            $email = $row->email;
        }
        $usuario_data = array(
            'userid' => $userid,
            'roleid' => $roleid,
            'email' => $email,
            'logueado' => false
        );
        if($query -> num_rows() == 1)
        {
            $usuario_data['logueado']=true;
        }
        return $usuario_data;
    }


}
