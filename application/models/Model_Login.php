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

    function validaLogin($username, $password){
        $roleid = 0;
        $email = "";
        $this -> db -> select('email, password,roleid');
        $this -> db -> from('user');
        $this -> db -> where('email', $username);
        $this -> db -> where('password',$password);
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        foreach ($query ->result() as $row)
        {
            $roleid = $row->roleid;
            $email = $row->email;
        }
        $usuario_data = array(
            'id' => $roleid,
            'nombre' => $email,
            'logueado' => false
        );
        if($query -> num_rows() == 1)
        {
            $usuario_data['logueado']=true;
        }
        return $usuario_data;
    }


    public  function access($username, $password){
        $this -> db -> select('email, password, roleid');
        $this -> db -> from('user');
        $this -> db -> where('email', $username);
        $this -> db -> where('password',$password);
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        $resultado = $query->row();
        return $resultado;
    }

}
