<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KainModel extends CI_Model {
   var $table = 'data_kain';
   var $pk = 'idk';

   function query(){
      // $this->db->select('idk,id_kain,nm_kain')
      $this->db->select('*')
               ->from($this->table);
   }

   function getKain($id){
     $this->query();
     $this->db->where($this->pk,$id);
     $data = $this->db->get(); 
     if($data->num_rows() == 1 ){
        return $data->row();
     }else{
        return false;
     } 

   }
   
   function getdata(){
      // fungsi  query
      $this->query();
      $data = $this->db->get(); 
      if($data->num_rows() > 0 ){
         return $data->result();
      }else{
         return false;
      }
   }


   
}
