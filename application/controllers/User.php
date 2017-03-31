<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function sign_up()
    {
        $this->load->view('header');
        $this->load->view('user/signup_view');
        $this->load->view('footer');
    }
}
