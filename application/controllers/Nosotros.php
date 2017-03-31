<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 07:01 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends CI_Controller {

    public function index()
    {
        $this->load->view('header');
        $this->load->view('about');
        $this->load->view('footer');
    }
}
