<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
	public function index()
	{
        $data["greeting"] = $this->lang->line("greeting");
        $data["sites"] = $this->lang->line("sites");
        $this->load->view('header');
		$this->load->view('home_view',$data);
        $this->load->view('footer');
	}
}
