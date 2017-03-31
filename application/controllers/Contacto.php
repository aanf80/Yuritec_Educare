<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

    public function index()
    {
        $this->load->view('header');
        $this->load->view('contact');
        $this->load->view('footer');
    }
}
