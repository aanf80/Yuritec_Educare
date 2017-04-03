<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');


    }

    public function insertCategory(){
        $this->load->model('Categories');
        $jsondata = array();
        $insert = false;
        $data = array(
            'categoryname' => $this->input->post('categoryname')
        );
        $insert = $this->Categories->newCategory($data);
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
    public function updateCategory(){
        $this->load->model('Categories');
        $jsondata = array();
        $insert = false;
        $data = array(
            'categoryid' => $this->input->post('categoryid'),
            'categoryname' => $this->input->post('categoryname')
        );
        $insert = $this->Categories->updateCategory(array('categoryid' => $this->input->post('categoryid')), $data);
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
    public function getCategories(){
        $this->load->model('Categories');
        $data = $this->Categories->getCategories();

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
    public function categories()
    {
        $this->load->view('header');
        $this->load->view('revista/categories_view');
        $this->load->view('footer');
    }
}
