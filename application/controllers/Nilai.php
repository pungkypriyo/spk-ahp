<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CoreModules {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('NIlaiModel','Mod');
   }
   

	public function index($params = null)
	{
      $acuan = $this->Mod->get_list_acuan();

      $data['List'] = $acuan;
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Dashboard',2=>'Bobot Nilai'));
      $data['LoadScripts'] = _LoadJS(array('bobot/nilai'));
      $this->template->DisplayView('dashboard','app/bobot.nilai',$data);
   }
   
   public function forms(){
      $data['_Breadcrumb'] = _Breadcrumb($this->uri->segment_array());
		$this->template->DisplayView('dashboard','app/bobot.nilai',$data);
   }

}
