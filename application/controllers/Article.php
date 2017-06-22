<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 07:37 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');


class Article extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

    }
    public function index()
    {
        $this->load->view('header');
        $this->load->view('contact');
        $this->load->view('footer');
    }
    public function new_article()
    {

        $this->load->view('header');
        $this->load->view('articles/edit_view');
        $this->load->view('footer');
    }

    public function edit_article()
    {
        $this->load->view('header');
        $this->load->view('articles/edit_view');
        $this->load->view('footer');
    }
    public function review_area()
    {
        $this->load->view('header');
        $this->load->view('articles/review_view');
        $this->load->view('footer');
    }
//Funciones de BD
    public function newArticle(){
        if($this->session->userdata('userid')==null){
            redirect('home', 'refresh');
        }
        $this->load->model('Model_Article');
        $jsondata = array();
        $hoy = date("Y-m-d");

        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'articledate' => $hoy,
            'status' => 'En edición',
            'resumen' => $this->input->post('resumen'),
            'abstract' => $this->input->post('abstract'),
            'palabrasclave' => $this->input->post('palabrasclave'),
            'keywords' => $this->input->post('keywords'),
            'userid' => $this->session->userdata('userid'),
            'magazineid' => 1,
            'categoryid' => $this->input->post('categoryid'),
        );

        $insert = $this->Model_Article->newArticle($data);
        if($insert == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Registrado correctamente";
            $jsondata["details"] = "OK";
        }
        else{
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Error en el registro";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }
    public function getArticles(){
        $this->load->model('Model_Article');
        $data = $this->Model_Article->getArticles();
        $jsondata["code"] = 200;
        $jsondata["msg"] = array();
        foreach($data as $cat){
            $jsondata["msg"][] = $cat;
        }

        $jsondata["details"] = "OK";


        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata);
    }

     public function getArticlesByVolume(){

    }
    public function getArticlesByID(){
        $userid = $this->session->userdata('userid');
        $this->load->model('Model_Article');
        $data = $this->Model_Article->getArticleByID($userid);
        $jsondata["code"] = 200;
        $jsondata["msg"] = array();
        foreach($data as $cat){
            $jsondata["msg"][] = $cat;
        }

        $jsondata["details"] = "OK";


        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata);
    }
    public function updateArticle(){
        if($this->session->userdata('nombre')==null){
            redirect('home', 'refresh');
        }
        $this->load->model('Model_Article');
        $jsondata = array();
        $hoy = date("Y-m-d");

        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'articledate' => $hoy,
            'status' => $this->input->post('status'),
            'resumen' => $this->input->post('resumen'),
            'abstract' => $this->input->post('abstract'),
            'palabrasclave' => $this->input->post('palabrasclave'),
            'keywords' => $this->input->post('keywords'),
            'userid' => $this->session->userdata('userid'),
            'magazineid' => 1,
            'categoryid' => $this->input->post('categoryid'),
        );
        if($data['username']==null){
            redirect('home', 'refresh');
        }
        $update = $this->Model_User->updateUser(array('userid' => $this->input->post('userid')), $data);
        if($update == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Registrado correctamente";
            $jsondata["details"] = "OK";
        }
        else{
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Error en el registro";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }
    public function deleteArticle(){
        $this->load->model('Model_Article');
        $jsondata = array();
        $insert = false;
        $data = array(
            'articleid' => $this->input->post('articleid')
        );

        if($data['articleid']==null){
            redirect('home', 'refresh');
        }

        $delete =  $this->Model_Article->deleteArticle($data['articleid']);
        if($delete == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Eliminado correctamente";
            $jsondata["details"] = "OK";
        }
        else{
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Error en el registro";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }

}
