<?php

/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 08/06/2017
 * Time: 01:53 PM
 */
class Model_Objectives extends CI_Model{
    var $table = 'objectives';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function  newObjectives($data){
        $this->db->insert($this->table, $data);
        return true;
    }

    public function getObjectives(){//R
        $this->db->from('objectives');
        $query=$this->db->get();
        return $query->result();
    }
    public function updateObjectives($where,$data){// U
        $this->db->update($this->table, $data, $where);
        return true;
    }



}