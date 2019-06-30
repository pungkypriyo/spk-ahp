<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

   
   public function __construct()
   {
      parent::__construct();
      //Do your magic here
   }
   

	public function index()
	{

      /* 
         function DisplayView : 
            DisplayView( $LayoutType = null, $FileContentPath = null , $data=null ) 
      */
      $data['LoadScripts'] = _LoadJS(array('landing'));
		$this->template->DisplayView('landing','app_landing/landing.index',$data);
	}
   
   public function datakain()
	{

      /* 
         function DisplayView : 
            DisplayView( $LayoutType = null, $FileContentPath = null , $data=null ) 
      */
      $data['LoadScripts'] = _LoadJS( array('') );
		$this->template->DisplayView('landing','app_landing/landing.index',$data);
	}
}
