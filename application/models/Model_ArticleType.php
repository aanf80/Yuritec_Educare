<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 04/07/2017
 * Time: 10:10 PM
 */
class Model_ArticleType extends CI_Model{
    var $table = 'article_type';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function newArticleType($data){
        $this->db->insert($this->table, $data);
        return true;
    } //C
    function getArticleTypes(){
        $this->db->from('article_type');
        $query=$this->db->get();
        return $query->result();
    }

    public function getArticleTypeByID($id) //C
    {
        $this->db->from($this->table);
        $this->db->where('article_typeid',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function updateArticleType($where,$data){// U
        $this->db->update($this->table, $data, $where);
        return true;
    }
    function deleteArticleType($id){
        $this->db->where('article_typeid', $id);
        $this->db->delete($this->table);
        return true;
    } //D



}
