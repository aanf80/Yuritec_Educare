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
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');

    }

    public function index()
    {

        $this->load->model('Model_Magazine');
        $data['magazines'] = $this->Model_Magazine->getMagazines();

        $this->load->model('Categories');
        $data['categories'] = $this->Categories->getCategories();

        $this->load->view('header');
        $this->load->view('magazine/publications_view', $data);
        $this->load->view('footer');
    }

    public function articles($id)
    {
        $this->load->model('Model_Article');
        $data['articles'] = $this->Model_Article->getArticlesByVolume($id);

        $this->load->model('Model_User');
        $users = $this->Model_User->getUsers();

        foreach ($users as $user){
            if ($user->userid == $data['articles'][0]->userid){
                $data['autorname'] = $this->Model_User->getUserById($user->userid)[0]->username;
                $data['autorlastname'] = $this->Model_User->getUserById($user->userid)[0]->lastname;
                $data['autormoaternalsurname'] = $this->Model_User->getUserById($user->userid)[0]->maternalsurname;
            }
        }
        $this->load->model('Model_Magazine');
        $data['magazines'] = $this->Model_Magazine->getMagazines();

        foreach ($data['magazines'] as $magazine){
            if ($magazine->magazineid == $data['articles'][0]->magazineid){
                $data['volume'] = $this->Model_Magazine->getMagazineByID($magazine->magazineid)[0]->volume;
                $data['number'] = $this->Model_Magazine->getMagazineByID($magazine->magazineid)[0]->number;
                $data['magazineid'] = $this->Model_Magazine->getMagazineByID($magazine->magazineid)[0]->magazineid;
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

    public function article_view($magazineid,$idarticle)
    {
        $this->load->model('Categories');
        $data['categories'] = $this->Categories->getCategories();

        $data['magazineid'] = $magazineid;

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



//--------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function newMagazine(){
        $carpeta = 'C:/var/webapp/images';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
        $config['upload_path'] = 'C:/var/webapp/images';
        $config['allowed_types'] = 'gif|jpg|png';


        $this->load->library('upload', $config);
        $hoy = date("Y-m-d");

        if (!$this->upload->do_upload('cover')) {
            echo $this->upload->display_errors();
        } else {
            $datos = array('upload_data' => $this->upload->data());
            $this->load->model('Model_Magazine');
            $jsondata = array();
            $data = array(
                'volume' => $this->input->post('volume'),
                'number' => $this->input->post('number'),
                'date' => $hoy,
                'status' => 'sin publicar',
                'period' => $this->input->post('period'),
                'year' => $this->input->post('year'),
                'file' => "revista.pdf",
                'cover' => $datos['upload_data']['file_name']
            );
            if ($data['username'] == null) {
                redirect('home', 'refresh');
            }

            $insert = $this->Model_Magazine->newMagazine($data);

            if($insert == true){
                $jsondata["code"] = 200;
                $jsondata["msg"] = "Registrado correctamente";
                $jsondata["details"] = "OK";
            }
            else{
                $jsondata["code"] = 500;
                $jsondata["msg"] = "Error en el registro";
                $jsondata["details"] = "OK";
            }
            header('Content-type: application/json; charset=utf-8');
            header("Cache-Control: no-store");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);

        }

    }

    public function getMagazines(){

        $this->load->model('Model_Magazine');
        $data = $this->Model_Magazine->getMagazines();
        $jsondata["code"] = 200;
        $jsondata["msg"] = array();
        foreach($data as $mag){
            $jsondata["msg"][] = $mag;
        }

        $jsondata["details"] = "OK";

        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata);
    }



}