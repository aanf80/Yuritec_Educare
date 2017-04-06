<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


    public function sign_up()
    {
        $this->load->view('header');
        $this->load->view('user/signup_view');
        $this->load->view('footer');
    }



    public function profile()
    {
        $this->load->view('header');
        $this->load->view('user/profile_view');
        $this->load->view('footer');
    }
}
