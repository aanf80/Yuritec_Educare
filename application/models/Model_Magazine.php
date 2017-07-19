<?php

/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 23/06/2017
 * Time: 11:17 AM
 */
class Model_Magazine extends CI_Model{
    var $table = 'magazine';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function newMagazine($data){
        $this->db->insert($this->table, $data);
        return true;
    } //C

    function getMagazines(){
        $this->db->from('magazine');
        $query=$this->db->get();
        return $query->result();
    }
    public function getMagazineByID($id)
    {
        $this->db->from($this->table);
        $this->db->where('magazineid',$id);
        $query = $this->db->get();


        return $query->result();
    }//R

     public function getMagazineByStatus($status)
    {
        $this->db->from($this->table);
        $this->db->where('status',$status);
        $query = $this->db->get();


        return $query->result();
    }//R

    public function updateMagazine($where, $data){
        $this->db->update($this->table, $data, $where);
        return true;
    } //U

    public function deleteMagazine($id){
        $this->db->where('magazineid', $id);
        $this->db->delete($this->table);
        return true;
    } //D

    public function get_magazines($porpagina,$desde){

        $this->db->where('status','publicada');
        $query = $this->db->get($this->table,$porpagina,$desde);

        if( $query -> num_rows() > 0 ){
            return $query->result();
        }
        else{
            return false;
        }

    }
}