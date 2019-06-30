<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoreModules extends CI_Controller {

   public $AuthSession;
   public $data = array();
   
   public function __construct(){
      parent::__construct();

      // Setting up timezone :: Never forget this things!
      date_default_timezone_set("Asia/Jakarta");

      // Session Parse into Global Vars
      $this->AuthSession = $this->session->userdata('AuthSession');
      $this->AuthId = $this->AuthSession['AuthId'];
      $this->AuthUser = $this->AuthSession['AuthUser'];
      if(empty($this->AuthSession))
         redirect('login','refresh');
         
   }

   function authlogout(){
      session_destroy();
   }
   
}
