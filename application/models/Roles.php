<?php

/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 03/04/2017
 * Time: 11:42 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Roles extends CI_Model{
    var $table = 'role';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function newRole($data){
        $this->db->insert($this->table, $data);
        return true;
    }
    public function getRoles(){
        $this->db->from('role');
        $query=$this->db->get();
        return $query->result();
    }
    public function updateRole($where,$data){
        $this->db->update($this->table, $data, $where);
        return true;
    }
    public function deleteRole($id){
        $this->db->where('roleid', $id);
        $this->db->delete($this->table);
        return true;
    }
}
?>
