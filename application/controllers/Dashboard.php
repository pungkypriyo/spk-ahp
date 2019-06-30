<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CoreModules {

   
   public function __construct()
   {
      parent::__construct();
   }
   

	public function index($params = null)
	{
      /* 
      | App_helper::_Breadcrumb()
      | Setup custom breadcrumbs using array.
      | Example : 
      |  _Breadcrumb( 
            array ( 
               1=> 'Dashboard' ,
               2=> 'Description sub'
            )
         );
      */
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Dashboard',2=>'Penjualan'));
      
      /* 
      |   function DisplayView : 
      |     DisplayView( $LayoutType = null, $FileContentPath = null , $data=null ) 
      |*/
		$this->template->DisplayView('dashboard','app/dashboard.index',$data);
   }
   
   public function forms(){
      $data['_Breadcrumb'] = _Breadcrumb($this->uri->segment_array());
		$this->template->DisplayView('dashboard','dashboard.index',$data);
   }

   function logout(){
      $this->authlogout();
      redirect('login/loggedout','refresh');
   }
}
