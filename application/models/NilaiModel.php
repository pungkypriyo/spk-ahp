<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NilaiModel extends CI_Model {
   
   private $table = 'data_bobot';
   private $table_as = 'data_bobot as a';

   public function query(){
      $this->db->select('*')
               ->from($this->table);
   }

   public function get_list_acuan(){
      $this->query();
      $data = $this->db->get(); 
      if($data->num_rows() > 0 ){
         return $data->result();
      }else{
         return false;
      }       
   }


}
