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
    public function edit_area()
    {
        $this->load->view('header');
        $this->load->view('articulos/edit_view');
        $this->load->view('footer');
    }
//Funciones de BD
    public function newArticle(){
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
            'status' => 'R',
            'resumen' => $this->input->post('resumen'),
            'abstract' => $this->input->post('abstract'),
            'palabrasclave' => $this->input->post('palabrasclave'),
            'keywords' => $this->input->post('keywords'),
            'userid' => 4,
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

    }
    public function updateArticle(){

    }
    public function deleteArticle(){

    }

}
