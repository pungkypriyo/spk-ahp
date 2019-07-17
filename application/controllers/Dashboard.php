<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CoreModules {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('LandingModel','Mod');
      $this->load->model('KainModel','KMod');
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
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Dashboard'));
      
      /* 
      |   function DisplayView : 
      |     DisplayView( $LayoutType = null, $FileContentPath = null , $data=null ) 
      |*/
      $data['ListMotif'] = $this->dashboardawal();
		$this->template->DisplayView('dashboard','app/dashboard.index',$data);
   }

   public function dashboardawal(){
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

   public function datatablesDashboard(){
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
   
   public function forms(){
      $data['_Breadcrumb'] = _Breadcrumb($this->uri->segment_array());
		$this->template->DisplayView('dashboard','dashboard.index',$data);
   }

   function logout(){
      $this->authlogout();
      redirect('login/loggedout','refresh');
   }
}
