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
        $this->load->view('header');
        $this->load->view('committee_view');
        $this->load->view('footer');
    }


}