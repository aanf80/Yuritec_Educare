<?php

/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 03/04/2017
 * Time: 11:42 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Model_Article extends CI_Model
{
    var $table = 'article';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function newArticle($data)
    {
        $this->db->insert($this->table, $data);
        return true;
    } //C

    function getArticles()
    {
        $this->db->from('article');
        $query = $this->db->get();
        return $query->result();
    }

    public function getArticleByID($id) //C
    {
        $this->db->from($this->table);
        $this->db->where('userid', $id);
        $query = $this->db->get();


        return $query->result();
    }

    public function getSendedArticles() //C
    {
        $this->db->from($this->table);
        $this->db->where('status', "Enviado");
        $query = $this->db->get();


        return $query->result();
    }

    public function getArticle($id) //C
    {
        $this->db->from($this->table);
        $this->db->where('articleid', $id);

        $query = $this->db->get();


        return $query->result();
    }

    public function getArticlesByVolume($id) //C
    {
        $this->db->from($this->table);
        $this->db->where('magazineid', $id);

        $query = $this->db->get();


        return $query->result();
    }
    public function getArticlesByTheme($category) //C
    {
        $this->db->from($this->table);
        $this->db->where('categoryid', $category);
        $this->db->where('magazineid != ',0,FALSE);

        $query = $this->db->get();


        return $query->result();
    }

    public function getArticlesByCategory($id, $porpagina, $desde)
{
    $this->db->where('categoryid', $id);
    $this->db->where('magazineid != ',0,FALSE);
    $query = $this->db->get($this->table, $porpagina, $desde);

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;
    }
}
public function getArticlesByArt_Type($category) //C
    {
        $this->db->from($this->table);
        $this->db->where('article_typeid', $category);
        $this->db->where('magazineid != ',0,FALSE);

        $query = $this->db->get();


        return $query->result();
    }

    public function getArticlesByType($id, $porpagina, $desde)
{
    $this->db->where('categoryid', $id);
    $this->db->where('magazineid != ',0,FALSE);
    $query = $this->db->get($this->table, $porpagina, $desde);

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;
    }
}


    public function getArticlesByStatus($status) //C
    {
        $this->db->from($this->table);
        $this->db->where('status', $status);

        $query = $this->db->get();


        return $query->result();
    }

    //R
    public function updateArticle($where, $data)
    {// U
        $this->db->update($this->table, $data, $where);
        return true;
    }

    function deleteArticle($id)
    {
        $this->db->where('articleid', $id);
        $this->db->delete($this->table);
        return true;
    } //D

    public function getArticlesByMagazine($id, $porpagina, $desde)
    {
        $this->db->where('magazineid', $id);
        $query = $this->db->get($this->table, $porpagina, $desde);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
