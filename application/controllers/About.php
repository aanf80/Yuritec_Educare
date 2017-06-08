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
        $this->load->view('header');
        $this->load->view('about_view');
        $this->load->view('footer');
    }

    public function terms()
    {
        $this->load->model('Model_Terms');
        $data['terms'] = $this->Model_Terms->getTerms();
        $this->load->view('header');
        $this->load->view('terms_view',$data);
        $this->load->view('footer');
    }
    public function objectives()
    {
       // $this->load->model('Model_Terms');
        //$data['terms'] = $this->Model_Terms->getTerms();
        $this->load->view('header');
        $this->load->view('objectives_view');
        $this->load->view('footer');
    }
}
