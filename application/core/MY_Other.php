<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Auths extends CI_Controller {

   public $data = array();
   
   public function __construct()
   {
      parent::__construct();
      // Setting up timezone
      date_default_timezone_set("Asia/Jakarta");

      // echo 'test';
      
   }
   
}
