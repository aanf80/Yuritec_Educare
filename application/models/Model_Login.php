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
    var $table = 'role';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function validaLogin($username, $password)
    {
        $this -> db -> select('email, contrasena');
        $this -> db -> from('user');
        $this -> db -> where('email', $username);
        $this -> db -> where('contrasena',$password);
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}
