<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 11:02 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class LanguageLoader{
    function initialize(){
        $ci=&get_instance();
        $ci->load->helper('language');
        $ci->load->library('session');

        $site_lang = $ci->session->userdata('site_lang');
        if($site_lang){
            $ci->lang->load(array('about','committee','home','contact','login','magazine','profile'),$site_lang);        
        } else{
            $ci->lang->load(array('about','committee','home','contact','login','magazine','profile'),'spanish');
        }
            
    }
}