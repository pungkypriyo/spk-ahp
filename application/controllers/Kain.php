<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kain extends CoreModules {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('KainModel','Mod');
   }
   

	public function index($params = null)
	{

      $data['ListKain'] = $this->Mod->getdata();
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Dashboard',2=>'Data Kain'));
      $data['LoadScripts'] = _LoadJS(array('kain/kain'));
      
      $this->template->DisplayView('dashboard','app/kain.datakain',$data);
   }
   
   public function tambahkain(){
      $data['LoadScripts'] = _LoadJS(array('kain/kain.add'));
      $data['_Breadcrumb'] = _Breadcrumb($this->uri->segment_array());
		$this->template->DisplayView('dashboard','app/kain.add',$data);
   }
   
   function add(){
      
      $inputs=$this->input->post();
      $insert = $this->App->InsertRecord('data_kain',$inputs);
      
      
      if($insert == true){
         echo 'testBerhasil';
         
      }else{
         echo $this->db->_error_message();
      }
      // var_dump($inputs);
      
   }
   
   
   public function form_edit($params=null){
      $id = (!empty($params)) ? $params : '';
      // if($params != null) $id = $params;
      $data['Kain'] = $this->Mod->getKain($params);
      $data['LoadScripts'] = _LoadJS(array('kain/kain.edit'));
      $data['_Breadcrumb'] = _Breadcrumb($this->uri->segment_array());
		$this->template->DisplayView('dashboard','app/kain.edit',$data);
   }
}
