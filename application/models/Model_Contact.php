<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 12/07/2017
 * Time: 08:40 PM
 */
class Model_Contact extends CI_Model{
    var $table = 'contact';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function  newContact($data){
        $this->db->insert($this->table, $data);
        return true;
    }

    public function getContact(){//R
        $this->db->from('contact');
        $query=$this->db->get();
        return $query->result();
    }
    public function updateContact($where,$data){// U
        $this->db->update($this->table, $data, $where);
        return true;
    }



}