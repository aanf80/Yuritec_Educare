<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function insertCategory(){

        $this->load->model('Categories');
        $jsondata = array();
        $insert = false;
        $data = array(
            'categoryname' => $this->input->post('categoryname')
        );
        if($data['categoryname']==null){
            redirect('home', 'refresh');
        }
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
        if($data['categoryname']==null){
            redirect('home', 'refresh');
        }
        $update = $this->Categories->updateCategory(array('categoryid' => $this->input->post('categoryid')), $data);
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
    public function deleteCategory()    {

        $this->load->model('Categories');
        $jsondata = array();
        $insert = false;
        $data = array(
            'categoryid' => $this->input->post('categoryid')
        );

        if($data['categoryid']==null){
            redirect('home', 'refresh');
        }

        $delete =  $this->Categories->deleteCategory($data['categoryid']);
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


    public function insertRole(){

        $this->load->model('Roles');
        $jsondata = array();
        $insert = false;
        $data = array(
            'rolename' => $this->input->post('rolename')
        );
        if($data['rolename']==null){
            redirect('home', 'refresh');
        }
        $insert = $this->Roles->newRole($data);
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
    public function updateRole(){

        $this->load->model('Roles');
        $jsondata = array();
        $insert = false;
        $data = array(
            'roleid' => $this->input->post('roleid'),
            'rolename' => $this->input->post('rolename')
        );
        if($data['rolename']==null){
            redirect('home', 'refresh');
        }
        $update = $this->Roles->updateRole(array('roleid' => $this->input->post('roleid')), $data);
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
    public function getRoles(){

        $this->load->model('Roles');
        $data = $this->Roles->getRoles();
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
    public function deleteRole()    {

        $this->load->model('Roles');
        $jsondata = array();
        $insert = false;
        $data = array(
            'roleid' => $this->input->post('roleid')
        );

        if($data['roleid']==null){
            redirect('home', 'refresh');
        }

        $delete =  $this->Roles->deleteRole($data['roleid']);
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

    //Aqui empiezan las vistas!
    public function categories()
    {
        $this->load->view('header');
        $this->load->view('config/categories_view');
        $this->load->view('footer');
    }
    public function roles()
    {
        $this->load->view('header');
        $this->load->view('config/roles_view');
        $this->load->view('footer');
    }

    public function terms()
    {
       // $this->load->model('Categories');
        //$data['categories'] = $this->Categories->getCategories();
        $this->load->view('header');
        $this->load->view('config/adminterms_view');
        $this->load->view('footer');
    }
}
