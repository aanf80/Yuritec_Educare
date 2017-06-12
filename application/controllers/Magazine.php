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
        $this->load->model('Categories');
        $data['categories'] = $this->Categories->getCategories();
        $this->load->view('header');
        $this->load->view('magazine/publications_view',$data);
        $this->load->view('footer');
    }

    public function articles()
    {
        $this->load->model('Model_Article');
        $data['articles'] = $this->Model_Article->getArticles();

        $this->load->view('header');
        $this->load->view('articles/articlemenu_view',$data);
        $this->load->view('footer');
    }

    public function article_view()
    {
        $this->load->model('Categories');
        $data['categories'] = $this->Categories->getCategories();

        $this->load->model('Model_Article');
        $data['articles'] = $this->Model_Article->getArticle(3);


        $this->load->view('header');
        $this->load->view('articles/article_view',$data);
        $this->load->view('footer');
    }





}
