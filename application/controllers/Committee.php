<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 22/07/2017
 * Time: 08:03 PM
 */
class Committee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $data["committee_title"] = $this->lang->line("committee_title");
        $this->load->model('Model_Committee');
        $data['member'] = $this->Model_Committee->getMembers();
        $this->load->view('header');
        $this->load->view('committee_view',$data);
        $this->load->view('footer');
    }

    public function new_member()
    {
        $this->load->view('header');
        $this->load->view('config/admincommittee_view');
        $this->load->view('footer');
    }
    public function members()
    {
        $this->load->view('header');
        $this->load->view('config/members_view');
        $this->load->view('footer');
    }

    // FUNCIONES DE BASE DE DATOS

    public function newMember()
    {
        $carpeta = 'assets/images';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
        $config['upload_path'] = 'assets/images';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ec_photo')) {
            echo $this->upload->display_errors();
        } else {
            $datos = array('upload_data' => $this->upload->data());
            $this->load->model('Model_Committee');

            $data = array(
                'ec_name' => $this->input->post('ec_name'),
                'ec_position' => $this->input->post('ec_position'),
                'ec_bio' => $this->input->post('ec_bio'),
                'ec_photo' => $datos['upload_data'] ['file_name'],
                'ec_fbaccount' => $this->input->post('ec_fbaccount'),
                'ec_twaccount' => $this->input->post('ec_twaccount')

            );

            if ($data['ec_name'] == null) {
                redirect('home', 'refresh');
            }

            $insert = $this->Model_Committee->newMember($data);

            if ($insert == true) {
                $jsondata["code"] = 200;
                $jsondata["msg"] = "Registrado correctamente";
                $jsondata["details"] = "OK";
            } else {
                $jsondata["code"] = 500;
                $jsondata["msg"] = "Error en el registro";
                $jsondata["details"] = "OK";
            }
            header('Content-type: application/json; charset=utf-8');
            header("Cache-Control: no-store");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);

        }

    }//new member

    public function getMembers(){
        $roleid = $this->session->userdata('roleid');
        if($roleid == null) {
            redirect('home', 'refresh');
        }
        else{
            $this->load->model('Model_Committee');
            $data = $this->Model_Committee->getMembers();
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

    public function updateMember(){
        $this->load->model('Model_Committee');
        $jsondata = array();
        $data = array(
            'ec_memberid' => $this->input->post('ec_memberid'),
            'ec_name' => $this->input->post('ec_name'),
            'ec_position' => $this->input->post('ec_position'),
            'ec_bio' => $this->input->post('ec_bio'),
            'ec_fbaccount' => $this->input->post('ec_fbaccount'),
            'ec_twaccount' => $this->input->post('ec_twaccount')
        );
        if($data['ec_name']==null){
            redirect('home', 'refresh');
        }
        $update = $this->Model_Committee->updateMember(array('ec_memberid' => $this->input->post('ec_memberid')), $data);
        if($update == true){
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Actiualizado correctamente";
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

    public function changeMemberPhoto(){
        $carpeta = 'assets/images';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
        $config['upload_path'] = 'assets/images';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ec_photo')) {
            echo $this->upload->display_errors();
        } else {
            $datos = array('upload_data' => $this->upload->data());
            $this->load->model('Model_Committee');
            $jsondata = array();
            $data = array(
                'ec_memberid' => $this->input->post('ec_memberid'),
                'ec_photo' => $datos['upload_data'] ['file_name']
            );
            if($data['ec_photo']==null){
                redirect('home', 'refresh');
            }
            $update = $this->Model_Committee->updateMember(array('ec_memberid' => $this->input->post('ec_memberid')), $data);
            if($update == true){
                $jsondata["code"] = 200;
                $jsondata["msg"] = "Actiualizado correctamente";
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

    public function deleteMember(){
        $this->load->model('Model_Committee');
        $jsondata = array();
        $data = array(
            'ec_memberid' => $this->input->post('ec_memberid')
        );

        if($data['ec_memberid']==null){
            redirect('home', 'refresh');
        }

        $delete =  $this->Model_Committee->deleteMember($data['ec_memberid']);
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