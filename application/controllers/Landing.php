<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('LandingModel','Mod');
      $this->load->model('KainModel','KMod');
      //Do your magic here
   }
   

	public function index()
	{

      /* 
         function DisplayView : 
            DisplayView( $LayoutType = null, $FileContentPath = null , $data=null ) 
      */
      $data['ListMotif'] = $this->landingawal();
      $data['ListKain'] = $this->KMod->getdata();
      $data['LoadScripts'] = _LoadJS(array('landing'));
		$this->template->DisplayView('landing','app_landing/landing.index',$data);
   }

   public function landingawal(){
      $list = $this->Mod->getKain();
      $data = array();
      
      foreach ($list as $MDB){
         $row = array();
         $row['gambar'] = (empty($MDB->gambar)||$MDB->gambar == null) ? '' : sizeGambar('kain/'.$MDB->gambar,$MDB->nm_kain);
         $row['id'] = ucwords($MDB->id_kain);
         $row['nama'] = ucwords($MDB->nm_kain);
         $data[]= $row;
      }

      // Set output
      // $output = array(
      //          "recordsTotal" => $this->Mod->count_all(),
      //          "recordsFiltered" => $this->Mod->count_filtered(),
      //          "data" => $data,
      // );

      // Output to json
      //header('Content-Type: application/json');
      return $data;
   }

   public function datatables(){
		$list = $this->KMod->datatables_build();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $MDB) {
			$no++;
			$row = array();
			// $row[] = $no;
			$row['id'] = ucwords($MDB->id_kain);
			$row['nama'] = ucwords($MDB->nm_kain);
			$row['jenis'] = ucwords($MDB->jenis_bahan);
			$row['tipe'] = ucwords($MDB->tipe_benang);
			$row['corak'] = ucwords($MDB->corak_kain);
			$row['serap'] = ucwords($MDB->kualitas_serap);
			$row['grade'] = ucwords($MDB->grade_kain);
			$row['pengguna'] = ucwords($MDB->kategori_pengguna);
			$row['gambar'] = (empty($MDB->gambar)||$MDB->gambar == null) ? '' : _DtImages('kain/'.$MDB->gambar,$MDB->nm_kain);
			$row['act'] = $this->dt_buttons($MDB->id_kain);
			$data[]= $row;
		}

      // Set output
      $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->KMod->count_all(),
               "recordsFiltered" => $this->KMod->count_filtered(),
               "data" => $data,
      );

      // Output to json
      header('Content-Type: application/json');
      echo json_encode($output);
   }

   private function dt_buttons($id){
      $_HTML = '';
      $_HTML.= anchor(site_url('kain/detil/'.$id),'<i class="fa fa-image"></i>','class="btn btn-info btn-sm" id="btn-detil" data-toggle="modal" data-target="#datamodal"');
      // $_HTML.= anchor(site_url('kain/form_edit/'.$id),'<i class="fa fa-pencil"></i>','class="btn btn-primary btn-sm" id="btn-edit"');
      // $_HTML.= anchor(site_url('kain/delete/'.$id),'<i class="fa fa-trash"></i>','class="btn btn-danger btn-sm" id="btn-hapus"');
      return $_HTML;
   }
   
   // Upload Image
   function save_uploaded_images($imgConfig){		
      // Load "upload" library
		$this->load->library('upload',$imgConfig);

		if($this->upload->do_upload('gambar')){
			$data = $this->upload->data();
			return $data;
		}else{
			return false;
		}
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

   public function datatablesAHP(){
		$list = $this->KMod->datatables_build();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $MDB) {
			$no++;
			$row = array();
			// $row[] = $no;
			$row['id'] = ucwords($MDB->id_kain);
			$row['nama'] = ucwords($MDB->nm_kain);
			$row['jenis'] = ucwords($MDB->jenis_bahan);
			$row['tipe'] = ucwords($MDB->tipe_benang);
			$row['corak'] = ucwords($MDB->corak_kain);
			$row['serap'] = ucwords($MDB->kualitas_serap);
			$row['grade'] = ucwords($MDB->grade_kain);
			$row['pengguna'] = ucwords($MDB->kategori_pengguna);
			$row['gambar'] = (empty($MDB->gambar)||$MDB->gambar == null) ? '' : _DtImages('kain/'.$MDB->gambar,$MDB->nm_kain);
			$row['pilih'] = $this->dt_check($MDB->id_kain);
			$data[]= $row;
		}

      // Set output
      $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->KMod->count_all(),
               "recordsFiltered" => $this->KMod->count_filtered(),
               "data" => $data,
      );

      // Output to json
      header('Content-Type: application/json');
      echo json_encode($output);
   }

   private function dt_check($id){
      $_HTML = '';
      $_HTML.= '<input type="checkbox" id="checkbox1" name="checkbox1" value="option1" class="form-check-input ml-2">';
      return $_HTML;
   }
   
   public function Kain(){
      $data['ListKain'] = $this->KMod->getdata();
      $data['LoadScripts'] = _LoadJS( array('landing/kain') );
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Landing',2=>'Data Motif Kain'));
		$this->template->DisplayView('landing','app_landing/landing.kain',$data);
   }

   public function Ahp(){
      $data['ListKain'] = $this->KMod->getdata();
      $data['LoadScripts'] = _LoadJS( array('landing/ahp') );
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Landing',2=>'Pilih Motif Kain'));
		$this->template->DisplayView('landing','app_landing/landing.ahp',$data);
   }

   public function Ahp2(){
      $data['LoadScripts'] = _LoadJS( array('') );
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Landing',2=>'Perbandingan Kriteria'));
		$this->template->DisplayView('landing','app_landing/landing.ahp2',$data);
   }
}
