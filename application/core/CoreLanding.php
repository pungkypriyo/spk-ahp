<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoreLanding extends CI_Controller {
      
   public $data = array();
   
   public function __construct(){
      parent::__construct();

      // Setting up timezone :: Never forget this things!
      date_default_timezone_set("Asia/Jakarta");

   }
   
}
