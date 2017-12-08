<?php

/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 03/04/2017
 * Time: 11:42 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Categories extends CI_Model{
    var $table = 'category';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function newCategory($data){
        $this->db->insert($this->table, $data);
        return true;
    }
    public function getCategories(){
        $this->db->from('category');
        $query=$this->db->get();

        if( $query -> num_rows() > 0 ){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function getCategoryName($id){
        $this->db->from('category');
        $this->db->where('categoryid', $id);
        $query=$this->db->get();
        return $query->result();
    }
    public function getCategoryByID($id) //C
    {
        $this->db->from($this->table);
        $this->db->where('categoryid', $id);
        $query = $this->db->get();


        return $query->result();
    }

    public function updateCategory($where,$data){
        $this->db->update($this->table, $data, $where);
        return true;
    }
    public function deleteCategory($id){
        $this->db->where('categoryid', $id);
        $this->db->delete($this->table);
        return true;
    }
}
?>
