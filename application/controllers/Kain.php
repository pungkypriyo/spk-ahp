<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kain extends CoreModules {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('KainModel','Mod');
   }
   

	public function index($params = null){

      $data['ListKain'] = $this->Mod->getdata();
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Dashboard',2=>'Data Kain'));
      $data['LoadScripts'] = _LoadJS(array('kain/kain'));
      
      $this->template->DisplayView('dashboard','app/kain.datakain',$data);
   }

   public function datatables(){
		$list = $this->Mod->datatables_build();
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
			// $row['gambar'] = (empty($MDB->gambar)||$MDB->gambar == null) ? 'No-Images' : _DtImages('kain/'.$MDB->gambar,$MDB->nm_kain);
			$row['act'] = $this->dt_buttons($MDB->id_kain);
			$data[]= $row;
		}

      // Set output
      $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->Mod->count_all(),
               "recordsFiltered" => $this->Mod->count_filtered(),
               "data" => $data,
      );

      // Output to json
      header('Content-Type: application/json');
      echo json_encode($output);
   }
   
   private function dt_buttons($id){
      $_HTML = '';
      $_HTML.= anchor(site_url('kain/detil/'.$id),'<i class="fa fa-file-text"></i>','class="btn btn-info btn-sm" id="btn-detil"');
      $_HTML.= anchor(site_url('kain/form_edit/'.$id),'<i class="fa fa-pencil"></i>','class="btn btn-primary btn-sm" id="btn-edit"');
      $_HTML.= anchor(site_url('kain/delete/'.$id),'<i class="fa fa-trash"></i>','class="btn btn-danger btn-sm" id="btn-hapus"');
      return $_HTML;
   }


   
   public function tambahkain(){
      $data['LoadScripts'] = _LoadJS(array('kain/kain.add'));
      $data['_Breadcrumb'] = _Breadcrumb($this->uri->segment_array());
		$this->template->DisplayView('dashboard','app/kain.add',$data);
   }
   
   function add(){
      
      /* Post params received */
      $inputs = $this->input->post();

		/* Define path */
		$img_default = 'foto-default.jpg';
		$img_path = './images/kain';

		/* Define before upload */
		$img['upload_path'] = $img_path;
		$img['allowed_types'] = 'jpg|jpeg|png';
      $img['max_size'] = '1024';
  		$img['overwrite'] = true;

      
		/* Rename new images */
		$img['file_name'] = $inputs['id_kain'].'_'.time();

      $RunUpload = $this->save_uploaded_images($img);
      if($RunUpload == false){
         $this->session->set_flashdata('status','error');         
         $this->session->set_flashdata('msg',_ShowBasicAlert('info','Info !','Gagal upload gambar..'.$this->upload->display_errors(),'dismiss'));
         redirect('kain/tambahkain','refresh');
      }else{
         $inputs['gambar'] = $RunUpload['file_name'];
         $insert = $this->App->InsertRecord('data_kain',$inputs);
         if($insert == true){
            $this->session->set_flashdata('status','success');         
            $this->session->set_flashdata('msg',_ShowBasicAlert('info','Info !','Data berhasil disimpan. :D','dismiss'));
            // $this->session->set_flashdata('redirect_delay',2);
            // $this->session->set_flashdata('redirect_url',site_url('kain'));
            redirect('kain','refresh');
         }else{
            $this->session->set_flashdata('status','error');         
            $this->session->set_flashdata('msg',_ShowBasicAlert('info','Info !','Gagal simpan data.'.$this->insert->display_errors(),'dismiss'));
            redirect('kain/tambahkain','refresh');
         }
         
      }
      
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
   
   // Auto Number Generator by AjaxRequest
   function autonumber(){
      $GeneratedNumber = $this->Mod->autonumber();
		$SetResponse = array(
			'Status' => 'success',
			'ParamsId' => $GeneratedNumber
		);
		$Response = json_encode($SetResponse);
		header('Content-Type: application/json');
		echo $Response;
   }
   
   
   public function form_edit($params=null){
      $id = (!empty($params)) ? $params : '';
      // if($params != null) $id = $params;
      $data['Kain'] = $this->Mod->getKain($params);
      $data['LoadScripts'] = _LoadJS(array('kain/kain.edit'));
      $data['_Breadcrumb'] = _Breadcrumb($this->uri->segment_array());
		$this->template->DisplayView('dashboard','app/kain.edit',$data);
   }

   function edit(){
      
      $inputs=$this->input->post();
      $this->db->where('idk',$inputs['idk']);
      $update = $this->db->update('data_kain',$inputs);
      
      echo $this->db->last_query();
      
      // if($update == true){
      //    echo 'testBerhasil';
         
      // }else{
      //    echo $this->db->_error_message();
      // }
      // var_dump($inputs);
      
   }
}
