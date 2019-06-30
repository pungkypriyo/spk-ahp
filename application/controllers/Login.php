<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CoreAuth {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('LoginModel','Mod');
   }
   

	public function index(){
		$this->load->view('theme-sufee/login');
   }
   
   function authlogin(){
      // Mengambil data dari form dengan atribut name.
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));

      // Memanggil fungsi pada model LoginModel::auth()
      $rowAdmin = $this->Mod->auth($username);

      if($rowAdmin == false){
         $this->session->set_flashdata('status','fail');
         $this->session->set_flashdata('message',_ShowBasicAlert('danger','Failed!','Username tidak ditemukan.'));
         redirect('login');
      }else{
         if($password != $rowAdmin->upass){
            $this->session->set_flashdata('status','fail');
            $this->session->set_flashdata('message',_ShowBasicAlert('danger','Error!','Password salah.'));
            redirect('login');
         }else{
            // Create and register sessions
            $AuthSession = array(
               'AuthStatus' => true,
               'AuthId' =>  $rowAdmin->uid,
               'AuthUser' => $rowAdmin->uname,
            );
            $this->session->set_userdata('AuthSession',$AuthSession);

            $URL_Redirect = base_url('dashboard');
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message',_ShowBasicAlert('info','Info !','Username ditemukan. Redirecting...','dismiss'));
            $this->session->set_flashdata('redirect_delay',2);
            $this->session->set_flashdata('redirect_url',$URL_Redirect);
            redirect('login','refresh');
         }
      }
   }

   function loggedout(){
      $this->session->set_flashdata('message',_ShowBasicAlert('warning','Perhatian !','Session telah habis.','dismiss'));
		$this->load->view('theme-sufee/login');
   }

}
