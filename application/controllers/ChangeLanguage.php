<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangeLanguage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('user_agent');
    }

   /*
public function language($language="")
    {
     $url = base_url();

     if($this->agent->referrer()){
         $url -> $this->agent->referrer();
     }
     $language = ($language != "") ? $language : "english";
     $this->session->set_userdata('site_lang',$language);
    redirect ($url);
    }

   */ 
function switchLanguage($language = "") {
    $url = base_url();
    
        $language = ($language != "") ? $language : "spanish";
        $this->session->set_userdata('site_lang', $language);
        redirect($url);
    }
}