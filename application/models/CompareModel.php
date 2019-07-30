<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CompareModel extends CI_Model {
   /* Global Variables */
   var $kain = 'data_kain';
   var $kain_as = 'data_kain as a';
   var $pk = 'id_kain';
   var $pk_as = 'a.id_kain';
 
   
/* DataTables  */
   // DataTables Global Vars 
   var $column_order = array('a.id_kain','a.nm_kain','a.jenis_bahan','a.tipe_benang','a.corak_kain','a.kualitas_serap','a.grade_kain','a.kategori_pengguna'); 
   var $column_search = array('a.id_kain','a.nm_kain'); 
   var $order = array('a.id_kain' => 'desc'); 

   // DataTables Query - Data Kain
   public function dt_query(){
      $this->db->select('a.*')
               ->from($this->kain_as);
   }

   // Datatables Server-side scripting request
   function datatables_query(){
      // Call main query
      $this->dt_query();
       
      $i = 0;
      foreach ($this->column_search as $item) {
         // if datatable send POST for search
         if($_POST['search']['value']){
            // first loop
            if($i===0) {
               $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
               $this->db->like($item, $_POST['search']['value']);
            }else{
               $this->db->or_like($item, $_POST['search']['value']);
            }
               
            //last loop
            if(count($this->column_search) - 1 == $i) 
               $this->db->group_end(); //close bracket
         }
         $i++;
      }
         
      // Here processing to order list
      if(isset($_POST['order'])){
         $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      }elseif(isset($this->order)) {
         $order = $this->order;
         $this->db->order_by(key($order), $order[key($order)]);
      }
   }

   // Datatables Build
   public function datatables_build(){
        $this->datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
   }

   // Datatables Count data on filtered
   public function count_filtered(){
      $this->datatables_query();
      $query = $this->db->get();
      return $query->num_rows();
   }
   
   // Datatables Count data all
   public function count_all(){
      $this->db->from($this->table);
      return $this->db->count_all_results();
   }


/* 
| ----------------------------------------------------------------
| Compare Data Kain                                   
| ----------------------------------------------------------------
| Proses pengelolaan data kain yang diinputkan oleh user untuk
| melakukan kalkulasi perbandingan data motif kain.
|
*/

   function get_kriteria_list(){
      $data = $this->db->get('data_kriteria');
      return $data->result();
   }

   function get_kain_selected($selected){
      $this->db->select('*');
      $this->db->from('data_kain');
      $this->db->where_in('id_kain',$selected);
      $data = $this->db->get();
      return $data->result();
      // foreach ($selected as $item) {
         // $i = 0;

         // if ($i === 0) {
         //    $this->db->where($item);
         // }else{
         //    $this->db->or_where($item);
         // }
      // }
   }

   function get_acuan_by_token($token){
      $this->db->select('*')
               ->from('data_user_acuan')
               ->where('token',$token);
      $data = $this->db->get(); 
      if($data->num_rows() > 0 ){
         return $data->result();
      }else{
         return false;
      }   
   }

   function get_bobot_by_user_acuan_token($token){
      $this->db->where('token',$token);
      $data = $this->db->get('bobot_by_user_acuan');
      if($data->num_rows() > 0 ){
         return $data->result();
      }else{
         return false;
      }  
   }

   public function get_bobot($kriteria,$kain=null){
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

   public function get_inputed_kain($token){
      $this->db->select('kain');
      $this->db->from('bobot_by_user_acuan');
      $this->db->where('token',$token);
      $this->db->limit(1);
      $data = $this->db->get();
      if($data->num_rows() == 1 ){
         return $data->row();
      }else{
         return false;
      }     
   }






/* Data Processing :: Add */
   // Generate autonumber
   function autonumber(){
      $field_id = 'id_kain';
      $len = 3;
      $query = $this->db->query("SELECT MAX(RIGHT(".$field_id.",".$len.")) as kode FROM ".$this->table); 

        if($query->num_rows() <> 0){       
            //cek dulu apakah ada sudah ada kode di tabel.    
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $last = intval($data->kode);      
            $kode = $last + 1;      
        }else{       
            //jika kode belum ada      
            $kode = 1;     
        }

        $kodemax  = str_pad($kode, $len, "0", STR_PAD_LEFT);    
        $kodejadi = $kodemax;     
        return $kodejadi;
   }

   

/* Data Processing :: Edit */
   function get_last_kain(){
      $this->db->select('id_kain')
               ->from($this->table)
               ->order_by('id_kain','desc')
               ->limit(1);
      $data = $this->db->get();
      return $data->row();
   }
   
   public function get_listed_kain(){
      $id_kain_new = $this->get_last_kain();
      $all = $this->get_kain_data();
      $exc = $this->get_kain_data('except');
      $kriteria = $this->get_kriteria();
      

      
      $cAll = array();
      foreach ($all as $key) {
         $cAll[] = array('id_kain' => $id_kain_new->id_kain,'id_kain_to' => $key->id_kain);
      }
      $cExc = array();
      foreach ($exc as $key) {
         $cExc[] = array('id_kain' => $key->id_kain,'id_kain_to' => $id_kain_new->id_kain);
      }
      $merge = array_merge($cAll,$cExc);
      
      $vaRet = array();
      $vaData = array();
      foreach ($kriteria as $cKey => $val) {
         // $cKriteria = array('id_kriteria' => $cKey->id_kriteria);
         $getList = array();
         foreach ($merge as $key => $value) {
            $getList[] = array_merge($merge[$key],array('id_kriteria' => $val->id_kriteria));
         }
         $vaData[] = $getList;
      }
      // $vaRet = $getList;
      // $kain['all'] = $this->get_kain_data();
      // $kain['except'] = $this->get_kain_data('except');
      // return $merge;
      // return $vaRet;
      return $vaData;
   }

/* Data Processing :: Edit */
   public function get_kain_data($params = null){
      $GetLastId = $this->get_last_kain();
      $this->db->select('id_kain');
      $this->db->from($this->table);
      if($params == 'except')
         $this->db->where('id_kain <> ',$GetLastId->id_kain);
      $data = $this->db->get();
      return $data->result();
   }

   public function getKain($id){
     $this->query();
     $this->db->where($this->pk,$id);
     $data = $this->db->get(); 
     if($data->num_rows() == 1 ){
        return $data->row();
     }else{
        return false;
     } 

   }
   
   public function getdata(){
      // fungsi  query
      $this->query();
      $data = $this->db->get(); 
      if($data->num_rows() > 0 ){
         return $data->result();
      }else{
         return false;
      }
   }

   /* Get Kriteria */
   public function get_kriteria(){
     $this->db->select('id_kriteria');
     $data = $this->db->get('data_kriteria'); 
     if($data->num_rows() > 0 ){
        return $data->result();
     }else{
        return false;
     }
   }


   
}