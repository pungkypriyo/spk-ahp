<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginModel extends CI_Model {
   
   private $table = 'admin';

   public function auth($username){
      $this->db->where('uname', $username); // Untuk menambahkan Where Clause : username='$username'
      $data = $this->db->get($this->table);

      if($data->num_rows() == 0){
         $result = false;
      }else{
         $result = $data->row(); // Untuk mengeksekusi dan mengambil data hasil query
      }

      return $result;
   }
}
