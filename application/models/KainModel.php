<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KainModel extends CI_Model {
   var $table = 'data_kain';
   var $table_as = 'data_kain as a';
   var $pk = 'id_kain';
   

   // Main Query for define all data to show
   public function query(){
      // $this->db->select('idk,id_kain,nm_kain')
      $this->db->select('*')
               ->from($this->table);
   }
   
   
   /* DataTables  */
   var $column_order = array('a.id_kain','a.nm_kain','a.jenis_bahan','a.tipe_benang','a.corak_kain','a.kualitas_serap','a.grade_kain','a.kategori_pengguna'); 
   var $column_search = array('a.id_kain','a.nm_kain'); 
   var $order = array('a.id_kain' => 'desc'); 

   public function dt_query(){
      $this->db->select('a.*')
      // $this->db->select('a.id_kain,a.nm_kain,a.jenis_bahan,a.tipe_benang,a.corak_kain,a.kualitas_serap,a.grade_kain,a.kategori_pengguna','a.gambar')
               ->from($this->table_as);
   }

   // Server-side scripting request
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

   // Build
   public function datatables_build(){
        $this->datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
   }

   // Count data on filtered
   public function count_filtered(){
      $this->datatables_query();
      $query = $this->db->get();
      return $query->num_rows();
   }
   
   // Count data all
   public function count_all(){
      $this->db->from($this->table);
      return $this->db->count_all_results();
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


   
}
