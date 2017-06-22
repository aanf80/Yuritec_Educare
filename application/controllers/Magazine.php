<?php

/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 07/04/2017
 * Time: 12:14 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller
{
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
        $this->load->view('magazine/publications_view', $data);
        $this->load->view('footer');
    }

    public function articles()
    {
        $this->load->model('Model_Article');
        $data['articles'] = $this->Model_Article->getArticles();

        $this->load->model('Model_User');
        $users = $this->Model_User->getUsers();

        foreach ($users as $user){
            if ($user->userid == $data['articles'][0]->userid){
                $data['autorname'] = $this->Model_User->getUserById($user->userid)[0]->username;
                $data['autorlastname'] = $this->Model_User->getUserById($user->userid)[0]->lastname;
                $data['autormoaternalsurname'] = $this->Model_User->getUserById($user->userid)[0]->maternalsurname;
            }
        }

        $this->load->view('header');
        $this->load->view('articles/articlemenu_view', $data);
        $this->load->view('footer');
    }


    public function generatePDF($idarticle)
    {
        $this->load->model('Model_Article');
        $this->load->model('Model_User');
        $this->load->model('Categories');

        $data['articles'] = $this->Model_Article->getArticle($idarticle);
        $category = $this->Categories->getCategoryName($data['articles'][0]->categoryid);
        $autor = $this->Model_User->getUserById($data['articles'][0]->userid);

        //add title
        $html ="<h1>" . $data['articles'][0]->title . "</h1>";

        //add autor
        $html .= "<p> " . $autor[0]->username . " " .$autor[0]->lastname . " " . $autor[0]->maternalsurname . "</p>";
        //add institución
        $html .= "<p>".$autor[0]->institute. "</p>";

        //add email
        $html .= "<p>". $autor[0]->email ."</p>";

        //add resumen
        $html .= "<p> <strong>Resumen</strong></p>";
        $html .= $data['articles'][0]->resumen;

        //add abstract
        $html .= "<p> <strong>Abstract</strong></p>";
        $html .= $data['articles'][0]->abstract;

        //add palabras clave
        $html .= "<p> <strong>Palabras clave</strong></p>";
        $html .= $data['articles'][0]->palabrasclave;

        //add keywords
        $html .= "<p> <strong>Keywords</strong></p>";
        $html .= $data['articles'][0]->keywords;

        //add content
        $html .= "<p> <strong>Contenido</strong></p>";
        $html .= $data['articles'][0]->content;
        //print_r($data['articles']);
        $this->load->library('Pdf');

        // create new PDF document
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($data['articles'][0]->userid);
        $pdf->SetTitle($data['articles'][0]->title);
        $pdf->SetSubject($category[0]->categoryname);
        $pdf->SetKeywords($data['articles'][0]->palabrasclave);

        // set default header data
        $pdf->SetHeaderData('yuritecbanner.png', PDF_HEADER_LOGO_WIDTH, "Yurítec Educare", "Instituto Tecnológico de Tepic");

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        $pdf->SetFont('dejavusans', '', 12);

        // add a page
        $pdf->AddPage();

        $pdf->writeHTML($html, true, false, true, false, 'J');

        // reset pointer to the last page
        $pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
        $pdf->Output($data['articles'][0]->title, 'I');
    }

    public function article_view($idarticle)
    {
        $this->load->model('Categories');
        $data['categories'] = $this->Categories->getCategories();

        $this->load->model('Model_Article');
        $data['articles'] = $this->Model_Article->getArticle($idarticle);

        $this->load->model('Model_User');
        $data['autorname'] = $this->Model_User->getUserById($data['articles'][0]->userid)[0]->username;
        $data['autorlastname'] = $this->Model_User->getUserById($data['articles'][0]->userid)[0]->lastname;
        $data['autormoaternalsurname'] = $this->Model_User->getUserById($data['articles'][0]->userid)[0]->maternalsurname;

        $this->load->view('header');
        $this->load->view('articles/article_view', $data);
        $this->load->view('footer');
    }


}
