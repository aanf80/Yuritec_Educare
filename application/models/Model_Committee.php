<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 22/07/2017
 * Time: 08:01 PM
 */
class Model_Committee extends CI_Model{
    var $table = 'ec_member';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function  newMember($data){
        $this->db->insert($this->table, $data);
        return true;
    }

    public function getMembers(){//R
        $this->db->from('ec_member');
        $query=$this->db->get();
        return $query->result();
    }
    public function updateContact($where,$data){// U
        $this->db->update($this->table, $data, $where);
        return true;
    }

    public function deleteECMember($id){
        $this->db->where('ec_memberid', $id);
        $this->db->delete($this->table);
        return true;
    }

}