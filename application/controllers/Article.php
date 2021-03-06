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
        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));

    }
    public function new_article()
    {

        $this->load->view('header');
        $this->load->view('articles/edit_view');
        $this->load->view('footer');
    }
 public function evaluated_articles()
    {

        $this->load->view('header');
        $this->load->view('articles/evaluatedarticles_view');
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
    public function assign_reviewer()
    {
        $this->load->view('header');
        $this->load->view('articles/assignreviewer_view');
        $this->load->view('footer');
    }
//Funciones de BD
    public function newArticle(){
        if($this->session->userdata('userid')==null){
            redirect('home', 'refresh');
        }

        $carpeta = './upload/articles';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
        $config['upload_path'] = './upload/articles';
        $config['allowed_types'] = 'doc|docx';

        $this->load->library('upload', $config);



        if (!$this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
            $jsondata["code"] = 400;
            $jsondata["msg"] = "Tipo de documento no aceptado";
            $jsondata["details"] = "OK";
            header('Content-type: application/json; charset=utf-8');
            header("Cache-Control: no-store");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);

        } else {
            $this->load->model('Model_Article');
            $datos = array('upload_data' => $this->upload->data());
            $jsondata = array();
            $hoy = date("Y-m-d");

            $data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'articledate' => $hoy,
                'status' => 'Enviado',
                'resumen' => $this->input->post('resumen'),
                'palabrasclave' => $this->input->post('palabrasclave'),
                'coautors' => $this->input->post('coautors'),
                'userid' => $this->session->userdata('userid'),
                'magazineid' => null,
                'categoryid' => $this->input->post('categoryid'),
                'file' => $datos['upload_data']['file_name']
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

    public function getArticlesByUser(){
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

    public function getArticlesByID($id){

        $this->load->model('Model_Article');
        $data = $this->Model_Article->getArticle($id);
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

    public function getArticlesByVolume($volume){

        $this->load->model('Model_Article');
        $data = $this->Model_Article->getArticlesByVolume($volume);
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
    public function getArticlesByStatus($status){
        $estado= "";
        switch($status){
            case 1:
                $estado = "Enviado";
                break;
            case 2:
                $estado = "En revisión";
                break;
            case 3:
                $estado = "Aprobado";
                break;
            case 4:
                $estado = "Revisado";
                break;
        }

        $this->load->model('Model_Article');
        $data = $this->Model_Article->getArticlesByStatus($estado);
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
    public function updateContent(){
        $this->load->model('Model_Article');
        $jsondata = array();
        $articleid = $this->input->post('articleid');
        $data = array(
            'content' => $this->input->post('content'),
        );
        if($articleid == null){
            redirect('home', 'refresh');
        }
        $update = $this->Model_Article->updateArticle(array('articleid' => $articleid), $data);
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
    public function changeArticle(){

        $carpeta = './upload/articles';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
        $config['upload_path'] = './upload/articles';
        $config['allowed_types'] = 'doc|docx';

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
        }
        else {
            $datos = array('upload_data' => $this->upload->data());
            $this->load->model('Model_Article');
            $jsondata = array();
            $data = array(
                'status' => 'Enviado',
                'file' => $datos['upload_data'] ['file_name']
            );
            if($data['file']==null){
                redirect('home', 'refresh');
            }
            $update = $this->Model_Article->updateArticle(array('articleid' => $this->input->post('articleid')), $data);
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

    }
    public function updateArticle(){

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
            'magazineid' => 0,
            'categoryid' => $this->input->post('categoryid'),
        );
        if($data['title']==null){
            redirect('home', 'refresh');
        }
        $update = $this->Model_Article->updateArticle(array('articleid' => $this->input->post('articleid')), $data);
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

    public function setMagazine(){

        $this->load->model('Model_Article');
        $jsondata = array();

        $data = array(
            'magazineid' => $this->input->post('magazineid'),
            'status' => $this->input->post('status')
        );
        if($data['magazineid']==null){
            redirect('home', 'refresh');
        }
        $update = $this->Model_Article->updateArticle(array('articleid' => $this->input->post('articleid')), $data);
        if($update == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Se ha actualizado correctamente";
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
    public function unsetMagazine(){

        $this->load->model('Model_Article');
        $jsondata = array();

        $data = array(
            'magazineid' => 0,
            'status' => $this->input->post('status')
        );

        if($data['status']==null){
            redirect('home', 'refresh');
        }

        $update = $this->Model_Article->updateArticle(array('articleid' => $this->input->post('articleid')), $data);
        if($update == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Se ha actualizado correctamente";
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
    public function setReview(){

        $this->load->model('Model_Article');
        $jsondata = array();

        $data = array(
            'observations' => $this->input->post('observations'),
            'status' => $this->input->post('status')
        );
        if($this->session->userdata('userid')==null){
            redirect('home', 'refresh');
        }
        $update = $this->Model_Article->updateArticle(array('articleid' => $this->input->post('articleid')), $data);
        if($update == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Se ha actualizado correctamente";
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
   public function setReviewer(){

        $this->load->model('Model_Article');
        $jsondata = array();

        $data = array(
          //  'observations' => $this->input->post('observations'),
            'status' => "En revisión"
        );
        if($this->session->userdata('userid')==null){
            redirect('home', 'refresh');
        }
        $update = $this->Model_Article->updateArticle(array('articleid' => $this->input->post('articleid')), $data);
        if($update == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Se ha actualizado correctamente";
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

        if($this->session->userdata('userid')==null){
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
