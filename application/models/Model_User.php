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
    public function  newUser($data){
        $this->db->insert($this->table, $data);
        return true;
    }

    public function getUserByEmail($email) //C
    {
        $this->db->from($this->table);
        $this->db->where('email',$email);
        $this -> db -> limit(1);
        $query = $this->db->get();

        return $query->result();
    }

    public function userExists($email) //C
    {
        $this->db->from($this->table);
        $this->db->where('email',$email);
        $this -> db -> limit(1);
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function updateStatus ($email){

        $data = array('status' => 'C');

        $this->db->where('email', $email);
        $this->db->limit(1);
        return $this->db->update($this->table, $data);
    }

    public function getEmailCode($emailcode){
        $this->db->from($this->table);
        $this->db->where('emailcode', $emailcode);
        $this -> db -> limit(1);
        $query = $this->db->get();


        return $query->result();
    }

    public function getUserByID($id)
    {
        $this->db->from($this->table);
        $this->db->where('userid',$id);
        $this -> db -> limit(1);

        $query = $this->db->get();


        return $query->result();
    }
    public function getUsers(){//R
        $this->db->from('user');
        $query=$this->db->get();
        return $query->result();
    }
    public function updateUser($where,$data){// U
        $this->db->update($this->table, $data, $where);
        return true;
    }
    public function deleteUser($id){//D
        $this->db->where('userid', $id);
        $this->db->delete($this->table);
        return true;
    }


}