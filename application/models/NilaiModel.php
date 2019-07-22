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
   
   private function query_nilai_bobot(){
      $this->db->select('
                  data_bobot.id_bobot,
                  data_kain.nm_kain,
                  data_bobot.id_kain,
                  data_bobot.id_kain_to,
                  data_bobot.id_kriteria,
                  data_kriteria.nm_kriteria,
                  data_bobot.nilai_bobot')
               ->from('data_bobot')
               ->join('data_kriteria','data_kriteria.id_kriteria = data_bobot.id_kriteria')
               ->join('data_kain','data_kain.id_kain = data_bobot.nilai_bobot');
   }

   public function get_bobot($kriteria=null){
      // $this->query_nilai_bobot();
      $this->db->where('id_kriteria',$kriteria);
      $data = $this->db->get('bobot_by_kain');
      if($data->num_rows() > 0 ){
         return $data->result();
      }else{
         return false;
      }     
   }


   public function query_kain(){
      $this->db->select('*')
               ->from('data_kain');
   }

   public function get_kain(){
      $this->query_kain();
      $data = $this->db->get();
      if($data->num_rows() > 0 ){
         return $data->result();
      }else{
         return false;
      }     
   }



   private function query_kriteria(){
      $this->db->select('*')
               ->from('data_kriteria');
   }


}
