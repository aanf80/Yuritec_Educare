<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 07:01 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index()
    {
        $data["about_title"] = $this->lang->line("about_title");
        $data["about_obj"] = $this->lang->line("about_obj");
        $data["about_op"] = $this->lang->line("about_op");
        $data["about_ep"] = $this->lang->line("about_ep");
        $this->load->view('header');
        $this->load->view('about_view',$data);
        $this->load->view('footer');
    }

    public function policies()
    {
        $data["about_title"] = $this->lang->line("about_title");
        $data["about_obj"] = $this->lang->line("about_obj");
        $data["about_op"] = $this->lang->line("about_op");
        $data["about_ep"] = $this->lang->line("about_ep");
        $this->load->model('Model_Terms');
        $data['terms'] = $this->Model_Terms->getTermsByID(1);
        $this->load->view('header');
        $this->load->view('terms_view',$data);
        $this->load->view('footer');
    }
    public function evaluation_terms()
    {
        $data["about_title"] = $this->lang->line("about_title");
        $data["about_obj"] = $this->lang->line("about_obj");
        $data["about_op"] = $this->lang->line("about_op");
        $data["about_ep"] = $this->lang->line("about_ep");
        $this->load->model('Model_Terms');
        $data['terms'] = $this->Model_Terms->getTermsByID(2);
        $this->load->view('header');
        $this->load->view('evaluationterms_view',$data);
        $this->load->view('footer');
    }
    public function objectives()
    {
        $data["about_title"] = $this->lang->line("about_title");
        $data["about_obj"] = $this->lang->line("about_obj");
        $data["about_op"] = $this->lang->line("about_op");
        $data["about_ep"] = $this->lang->line("about_ep");
       $this->load->model('Model_Objectives');
       $data['objectives'] = $this->Model_Objectives->getObjectives();
        $this->load->view('header');
        $this->load->view('objectives_view',$data);
        $this->load->view('footer');
    }
}
