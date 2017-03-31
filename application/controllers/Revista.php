<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Revista extends CI_Controller {

    public function apartados_tematicos()
    {
        $this->load->view('header');
        $this->load->view('revista/categories_view');
        $this->load->view('footer');
    }
}
