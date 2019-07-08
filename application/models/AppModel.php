<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AppModel extends CI_Model {
   
   //Insert Single Record
   function InsertRecord($table, $inputs_array){
     $insert = $this->db->insert($table, $inputs_array);
     if ($this->db->affected_rows() > 0){
        return true;
     } else {
        return false;
     }
   }

   function _GetTableData($table, $where=null){
     if (!empty($where) || $where!=null){
        $this->db->where($where);
     }
     $this->db->from($table);
     $data = $this->db->get();
     $count = $data->num_rows();

     if ($count == 0) {
        return false;
     } else {
        return $data->row();
     }
   }


   
}
