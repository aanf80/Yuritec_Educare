<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 07:37 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

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
}
