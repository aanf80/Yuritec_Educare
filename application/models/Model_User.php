<?php

/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 07/04/2017
 * Time: 10:48 AM
 */
class Model_User extends CI_Model{
    var $table = 'user';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getUserByEmail($email)
    {
        $this->db->from($this->table);
        $this->db->where('email',$email);
        $this -> db -> limit(1);

        $query = $this->db->get();


        return $query->result();
    }


}