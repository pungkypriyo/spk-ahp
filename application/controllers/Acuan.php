<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acuan extends CoreModules {

   
   public function __construct()
   {
      parent::__construct();
   }
   

	public function index($params = null)
	{
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Dashboard',2=>'Bobot Acuan'));
      $data['LoadScripts'] = _LoadJS(array('bobot/acuan'));
      $this->template->DisplayView('dashboard','app/bobot.acuan',$data);
   }
   
   public function forms(){
      $data['_Breadcrumb'] = _Breadcrumb($this->uri->segment_array());
		$this->template->DisplayView('dashboard','app/kain.datakain',$data);
   }

}
