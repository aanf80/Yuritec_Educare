<?php

/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 08/06/2017
 * Time: 09:52 AM
 */
class Model_Terms extends CI_Model{
    var $table = 'terms';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function  newTerms($data){
        $this->db->insert($this->table, $data);
        return true;
    }

    public function getTerms(){//R
        $this->db->from('terms');
        $query=$this->db->get();
        return $query->result();
    }
    public function updateTerms($where,$data){// U
        $this->db->update($this->table, $data, $where);
        return true;
    }
    public function deleteTerms($id){//D
        $this->db->where('userid', $id);
        $this->db->delete($this->table);
        return true;
    }


}