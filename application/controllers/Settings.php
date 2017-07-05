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

    //Aqui empiezan las categorías

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
        $roleid = $this->session->userdata('roleid');
        if($roleid == null) {
            redirect('home', 'refresh');
        }
        else{
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

    //Aqui empiezan los roles de usuario

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
        $roleid = $this->session->userdata('roleid');
        if($roleid != 1) {
            redirect('home', 'refresh');
        }
        else {
            $this->load->model('Roles');
            $data = $this->Roles->getRoles();
            $jsondata["code"] = 200;
            $jsondata["msg"] = array();
            foreach ($data as $cat) {
                $jsondata["msg"][] = $cat;
            }

            $jsondata["details"] = "OK";


            header('Content-type: application/json; charset=utf-8');
            header("Cache-Control: no-store");
            echo json_encode($jsondata);
        }
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

//Aqui empiezan las politicas de operación
    public function getTermsByID($ID){

        $this->load->model('Model_Terms');
        $data = $this->Model_Terms->getTermsByID($ID);
        $jsondata["code"] = 200;
        $jsondata["msg"] = array();
        foreach($data as $term){
            $jsondata["msg"][] = $term;
        }

        $jsondata["details"] = "OK";

        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata);
    }





    public function updateTerms(){

        $this->load->model('Model_Terms');
        $jsondata = array();
        $hoy = date("Y-m-d");

        $data = array(
            'termsid' => $this->input->post('termsid'),
            'content' => $this->input->post('content'),
            'mod_date' => $hoy
        );
        if($data['termsid']==null){
            redirect('home', 'refresh');
        }
        $update = $this->Model_Terms->updateTerms(array('termsid' => $this->input->post('termsid')), $data);
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
    //Aqui empiezan los objetivos

    public function getObjectives(){

        $this->load->model('Model_Objectives');
        $data = $this->Model_Objectives->getObjectives();
        $jsondata["code"] = 200;
        $jsondata["msg"] = array();
        foreach($data as $objective){
            $jsondata["msg"][] = $objective;
        }

        $jsondata["details"] = "OK";


        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata);
    }

    public function updateObjectives(){

        $this->load->model('Model_Objectives');
        $jsondata = array();
        $hoy = date("Y-m-d");

        $data = array(
            'objectiveid' => $this->input->post('objectiveid'),
            'objectivecontent' => $this->input->post('objectivecontent')
        );
        if($data['objectiveid']==null){
            redirect('home', 'refresh');
        }
        $update = $this->Model_Objectives->updateObjectives(array('objectiveid' => $this->input->post('objectiveid')), $data);
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

//----------------------------------------------------------------------------------------------------------
    //Aqui empiezan las vistas!
    public function categories()
    {
        $roleid = $this->session->userdata('roleid');
        if($roleid != 1) {
            redirect('home', 'refresh');
        }
        else {
            $this->load->view('header');
            $this->load->view('config/categories_view');
            $this->load->view('footer');
        }
    }
    public function roles()
    {
        $roleid = $this->session->userdata('roleid');
        if($roleid != 1) {
            redirect('home', 'refresh');
        }
        else {
            $this->load->view('header');
            $this->load->view('config/roles_view');
            $this->load->view('footer');
        }
    }

    public function terms()
    {
        $roleid = $this->session->userdata('roleid');
        if($roleid != 1) {
            redirect('home', 'refresh');
        }
        else {
            $this->load->view('header');
            $this->load->view('config/adminterms_view');
            $this->load->view('footer');
        }
    }
    public function evaluation_terms()
    {
        $roleid = $this->session->userdata('roleid');
        if($roleid != 1) {
            redirect('home', 'refresh');
        }
        else {
            $this->load->view('header');
            $this->load->view('config/adminevaluationterms_view');
            $this->load->view('footer');
        }
    }
    public function objectives()
    {
        $roleid = $this->session->userdata('roleid');
        if($roleid != 1) {
            redirect('home', 'refresh');
        }
        else {
            $this->load->view('header');
            $this->load->view('config/adminobjectives_view');
            $this->load->view('footer');
        }

    }

    public function magazine()
    {
        $roleid = $this->session->userdata('roleid');
        if($roleid != 1) {
            redirect('home', 'refresh');
        }
        else {
            $this->load->view('header');
            $this->load->view('config/configmagazine_view');
            $this->load->view('footer');
        }

    }
    public function select_articles()
    {
        $roleid = $this->session->userdata('roleid');
        if($roleid != 1) {
            redirect('home', 'refresh');
        }
        else {
            $this->load->view('header');
            $this->load->view('config/selectarticles_view');
            $this->load->view('footer');
        }

    }
    public function magazines()
    {
        $roleid = $this->session->userdata('roleid');
        if($roleid != 1) {
            redirect('home', 'refresh');
        }
        else {
            $this->load->view('header');
            $this->load->view('config/magazines_view');
            $this->load->view('footer');
        }

    }


}
