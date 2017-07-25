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
//se carga la biblioteca de pagincacion
        $this->load->library('pagination');

        //
        $config['base_url'] = base_url().'magazine/index/';
        $config['total_rows'] = count($this->Model_Magazine->getMagazineByStatus('publicada'));
        /*Obtiene el numero de registros a mostrar por pagina */
        $config['per_page'] = '1';

        /*Se personaliza la paginación para que se adapte a bootstrap*/
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_link'] = FALSE;
        $config['first_link'] = FALSE;
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        /* Se inicializa la paginacion*/
        $this->pagination->initialize($config);


        //$data['magazines'] = $this->Model_Magazine->get_magazines($config['per_page']);
        $desde = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['magazines'] = $this->Model_Magazine->get_magazines($config['per_page'],$desde);


        $this->load->view('header');

        $this->load->view('magazine/publications_view', $data);
        $this->load->view('footer');
    }

    public function articles($id)
    {
        $this->load->model('Model_Article');
        $this->load->library('pagination');

        $config['base_url'] = base_url().'magazine/articles/'.$id."/";
        $config['total_rows'] = count($this->Model_Article->getArticlesByVolume($id));
        /*Obtiene el numero de registros a mostrar por pagina */
        $config['per_page'] = 2;
        $config["uri_segment"] = 4;
        /*Se personaliza la paginación para que se adapte a bootstrap*/
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_link'] = FALSE;
        $config['first_link'] = FALSE;
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        /* Se inicializa la paginacion*/
        $this->pagination->initialize($config);

        $desde = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['articles'] = $this->Model_Article->getArticlesByMagazine($id,$config['per_page'],$desde);

        if($data['articles'] != false){
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
        }

        $this->load->view('header');
        $this->load->view('articles/articlemenu_view', $data);
        $this->load->view('footer');

    }
    public function articlesByCategory($category)
    {
        $this->load->model('Model_Article');
        $data['articles'] = $this->Model_Article->getArticlesByCategory($category);

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

        $html = "<br>";
        //add title
        $html .="<h1>" . $data['articles'][0]->title . "</h1>";

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
        $pdf->SetHeaderData('header_pdf.png', 180, "", "");

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

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
            if ($data['volume'] == null) {
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

    public function getMagazineByID($id){

        $this->load->model('Model_Magazine');
        $data = $this->Model_Magazine->getMagazineByID($id);
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

    public function updateMagazine(){

        $this->load->model('Model_Magazine');
        $jsondata = array();

        $data = array(
            'volume' => $this->input->post('volume'),
            'number' => $this->input->post('number'),
            'date' => $this->input->post('date'),
            'status' => $this->input->post('status'),
            'period' => $this->input->post('period'),
            'year' => $this->input->post('year'),
            'file' => $this->input->post('file'),
            'cover' => $this->input->post('cover')
        );
        if($data['volume']==null){
            redirect('home', 'refresh');
        }
        $update = $this->Model_Magazine->updateMagazine(array('magazineid' => $this->input->post('magazineid')), $data);
        if($update == true){
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


    public function deleteMagazine(){
        $this->load->model('Model_Magazine');
        $jsondata = array();

        $data = array(
            'magazineid' => $this->input->post('magazineid')
        );

        if ($data['magazineid'] == null) {
            redirect('home', 'refresh');
        }

        $delete = $this->Model_Magazine->deleteMagazine($data['magazineid']);
        if ($delete == true) {
            $jsondata["code"] = 200;
            $jsondata["msg"] = "Eliminado correctamente";
            $jsondata["details"] = "OK";
        } else {
            $jsondata["code"] = 500;
            $jsondata["msg"] = "Error en el registro";
            $jsondata["details"] = "OK";
        }
        header('Content-type: application/json; charset=utf-8');
        header("Cache-Control: no-store");
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }
}