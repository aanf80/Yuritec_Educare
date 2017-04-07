<?php

/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 07/04/2017
 * Time: 12:14 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view('header');
        $this->load->view('magazine/publications_view');
        $this->load->view('footer');
    }
}
