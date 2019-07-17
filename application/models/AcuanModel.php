<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AcuanModel extends CI_Model {
   
   private $table = 'data_bobot_acuan';
   private $table_as = 'data_bobot_acuan as a';

   public function query(){
      $this->db->select('*')
               ->from($this->table_as);
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
