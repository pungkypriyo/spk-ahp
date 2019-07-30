<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compare extends CoreLanding {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('AppModel','App');
      $this->load->model('CompareModel','Mod');
      $this->load->model('KainModel','KMod');
   }
   

	public function index(){
      $data['ListKain'] = $this->KMod->getdata();
      /* function DisplayView : DisplayView( $LayoutType = null, $FileContentPath = null , $data=null ) */
      $data['LoadScripts'] = _LoadJS( array('landing/compare.index') );
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Compare',2=>'Pilih Kain Motif Kain'));
		$this->template->DisplayView('landing','app_landing/compare.index',$data);
   }

   public function dt_compare_ahp(){
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
      $_HTML.= '<input type="checkbox" id="cbSelected" name="selected" value="'.$id.'" class="form-check-input ml-2">';
      return $_HTML;
   }
   
/* 
| Start proccess compare with system. 
| Getting id of "kain" was selected, and return it as stored val.
*/
   public function ahp_compares(){
      // Prepare value sent.
      $inputs = $this->input->post();
      $id = $inputs['selection'];
      $arrSelected = explode(',',$id);
      $arrRet = array();
      for ($i=0; $i < sizeof($arrSelected) ; $i++) { 
         $arrRet[] = array('id_kain' => $arrSelected[$i]);
      }

      // foreach ($arrSelected as $key ) {
      // }
      // var_dump($inputs);
      // echo json_encode($arrSelected);
      // echo json_encode($arrRet);

      $data['KainArr'] = $id;
      $data['KainSelected'] = $this->Mod->get_kain_selected($arrSelected);
      $data['KriteriaList'] = $this->Mod->get_kriteria_list();

      // Display setup
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Compare',2=>'Perbandingan Kriteria'));
      $data['LoadScripts'] = _LoadJS( array('landing/compare.ahp_compares') );
		$this->template->DisplayView('landing','app_landing/compare.'.__FUNCTION__,$data);
   }

   public function ahp_calculate(){
      $inputs = $this->input->post();
      $token = $this->makeTokens();
      $cMatrixIndex = array();
      for ($i=1; $i <= max($inputs['txtKriteria']) ; $i++) { 
         $cMatrixIndex[] = array(
            'id_kriteria' => $i,
            'id_kriteria_to' => $i,
            'nilai_acuan' => 1,
            'ip_address'=>$this->input->ip_address(),
            'kain'=>$inputs['txtKain'],
            'token'=>$token,
            'created_at'=> date("Y-m-d H:i:s")
         );
      }
      $vaInputs = array();
      for ($i=0; $i < sizeof($inputs['txtKriteria']) ; $i++) { 
         $vaInputs[] = array(
            'id_kriteria' => $inputs['txtKriteria'][$i],
            'id_kriteria_to' => $inputs['txtKriteriaTo'][$i],
            'nilai_acuan' => $inputs['txtBobot'][$i],
            'ip_address'=>$this->input->ip_address(),
            'kain'=>$inputs['txtKain'],
            'token'=>$token,
            'created_at'=> date("Y-m-d H:i:s")
         );
      }

      $arrInputs = array_merge($vaInputs,$cMatrixIndex);
      asort($arrInputs);
      $insert = $this->db->insert_batch('data_user_acuan',$arrInputs); 
      if($insert == true) {
         // return true;
         $responses = array(
            'Status' => 'success',
            'Msg' => 'Berhasil kalkulasi data!',
            'Redirect' => site_url('compare/ahp_result/'.$token)
         );
      }else{
         // return false;
         $responses = array(
            'Status' => 'error',
            'Msg' => 'Gagal kalkulasi data. Ulangi pengisian. :(',
            'Redirect' => site_url('compare')
         );
      }
      // $responses = asort($arrInputs);
      // echo json_encode($arrInputs);
      echo json_encode($responses);
      // echo json_encode($arrInputs);
      // echo json_encode(sizeof($arrInputs));
      // echo json_encode($inputs);
      // echo json_encode($cMatrixIndex);
      // echo json_encode(sizeof($inputs['txtKriteria']));
   }

   public function ahp_result($token = null){
      if(empty($token) || $token == null)
         redirect('landing','refresh');
      
      // $data['List'] = $this->Mod->get_acuan_by_token($token);
      $data['TableAcuan'] = $this->TableBobotBuild($token);
      // $data['TableAcuan'] = $this->get_compiled_table($token);
      // $data['TableAcuanNorm'] = $this->TableBobotNormalisasiBuild($token);
      // $data['TableAcuanNorm'] = $this->get_compiled_normalisasi_table($token);
      $data['TableAcuanMulti'] = $this->get_compiled_calc($token);
      $data['TableKeputusan'] = $this->TableKeputusanBuild($token);

      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Compare',2=>'Hasil Keputusan'));
      $data['LoadScripts'] = _LoadJS(array('landing/compare.ahp_result'));
		$this->template->DisplayView('landing','app_landing/compare.'.__FUNCTION__,$data);
   }

/* 
| Perhitungan Konsistensi (Keakuratan)
| 1. Tabel yang menampilkan data bobot user yang diinputkan.
| 2. Tabel yang menampilkan normalisasi data bobot yang diinputkan oleh user.
| 3. Tabel konsistensi. 
*/

/* Tabel data bobot inputed by user.*/
   /* Main Table */
   function TableBobotBuild($token){
      $HEADER = $this->makeRowHeader();
      $CONTENT = $this->makeRowContent($token);

      $HTML = '';
      $HTML.= '<table id="table-data-'.$token.'" class="table table-bordered" style="text-align:center;">';
      $HTML.= $HEADER;
      $HTML.= $CONTENT;
      $HTML.= '</table>';
      $HTML.= '';
      return $HTML;
   }

   /* Header */
   function dataHeader($Type = null){
      $arrData = $this->Mod->get_kriteria_list();
      $vaRet = array();
      if($Type == null || $Type = 'row'){
         $vaRet = $arrData;
      }elseif($Type == 'col'){
         foreach ($arrData as $key => $value) {
            $vaRet[] = $value->nm_kriteria;
         }
      }else{
         $vaRet = $arrData;
      }
      return $vaRet;
   }

   function makeRowHeader(){
      // $cData = $this->Mod->get_kriteria_list();
      $cData = $this->dataHeader('col');
      $HTML ='';
      $HTML .='<tr>';
      $HTML .='<th class="bg-primary text-white" style="font-size:14px"> Kriteria </th>';

      foreach ($cData as $row) {
         $HTML .='<th style="font-size:14px">'.$row->nm_kriteria.'</th>';
      }

      $HTML .='</tr>';
      return $HTML;
   }
   

   /* Content */
   function dataContent($token){
      // Inputed by user
      $input = $this->Mod->get_bobot_by_user_acuan_token($token);
      $dataRet = array();
      $row = array();
      foreach ($input as $key) {
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = array('idb' => $key->id_acuan,'bobot' =>$key->nilai_acuan);
      }

      // return json_encode($header);
      return $row;
   }

   function makeRowContent($token){
      $dataIn = $this->dataContent($token);
      $headerCol = $this->dataHeader('col');

      $HTML ='';
      $i = 0;
      foreach ($headerCol as $key => $val) {
         $i = $key +1;
         $HTML.='<tr>';
         $HTML.='<th style="font-size:14px">'.$val->nm_kriteria.'</th>';
         foreach ($dataIn['item'] as $itemKey => $itemVal) {
            $HTML.='<td><span class="text-center">'.$dataIn['item'][$i][$itemKey]['bobot'].'</span></td>';
         }
         $HTML.='</tr>';
         $i++;
      }
      return $HTML;
   }

/* Tabel data bobot normalisasi proses.*/
   /* Main Table */
   function TableBobotNormalisasiBuild($token){
      $HEADER = $this->makeRowHeaderNorm();
      $CONTENT = $this->makeContentNorm($token);

      $HTML = '';
      $HTML.= '<table id="table-data-'.$token.'" class="table table-bordered" style="text-align:center;">';
      $HTML.= $HEADER;
      $HTML.= $CONTENT;
      $HTML.= '</table>';
      $HTML.= '';
      return $HTML;
   }

   function makeRowHeaderNorm(){
      $cData = $this->dataHeader('col');
      $HTML ='';
      $HTML .='<tr>';
      $HTML .='<th class="bg-primary text-white" style="font-size:14px"> Kriteria </th>';
      
      foreach ($cData as $row) {
         $HTML .='<th style="font-size:14px">'.$row->nm_kriteria.'</th>';
      }

      $HTML .='<th class="bg-primary text-white" style="font-size:14px"> Jumlah </th>';
      $HTML .='<th class="bg-primary text-white" style="font-size:14px"> PV </th>';
      $HTML .='</tr>';
      return $HTML;
   }

   /* Content Normalisasi */
   function dataContentNorm($token){

   }
   function makeContentNorm($token){
      // Inputed by user
      $dataIn = $this->dataContent($token);
      $headerCol = $this->dataHeader('col');
      $dataDiv = $this->get_total($token);   


      $HTML ='';
      $i = 0;
      foreach ($headerCol as $key => $val) {
         $i = $key +1;
         $HTML.='<tr>';
         $HTML.='<th style="font-size:14px">'.$val->nm_kriteria.'</th>';
         $dataSum = array();
         foreach ($dataIn['item'] as $itemKey => $itemVal) {
            $vaAcuan = ($dataIn['item'][$i][$itemKey]['bobot'] / $dataDiv[$itemKey]);
            $dataSum[] = $vaAcuan;
            $HTML.='<td><span class="text-center">'.round($vaAcuan,2).'</span></td>';
         }
         /* Menghitung Jumlah Dari Baris */
         $HTML.='<td><span class="text-center">'.round(array_sum($dataSum),2).'</span></td>';
         /* Menghitung Normalisasi */
         $sumPv = round((array_sum($dataSum) / $this->get_pv_division($this->get_content_normalisasi($token))),3) ;
         $HTML.='<td><span class="text-center">'.$sumPv.'</span></td>';
         $HTML.='</tr>';
         
         $i++;
      }
      return $HTML;
   }






/* Table Acuan */
   function get_compiled_table($token){
      $HTML_HEADER = $this->get_row_header($token);
      $HTML_CONTENT = $this->get_row_content($token);
      $HTML_TOTAL = $this->get_row_total($token);
      // $HTML = $this->get_compiled_button($token);
      $HTML = '';
      $HTML.= '<form id="frm_data_'.$token.'">';
      $HTML.= '<input type="hidden" name="kriteria_id" value="'.$token.'">';
      $HTML.= '<table id="table-data-'.$token.'" class="table table-striped table-bordered" style="text-align:center;">';
      $HTML.= $HTML_HEADER;
      $HTML.= $HTML_CONTENT;
      $HTML.= $HTML_TOTAL;
      $HTML.= '</table>';
      $HTML.= '</form>';
      return $HTML;
   }

   function get_row_header($token){
      $cKriteria = $this->App->_GetTableData('data_user_acuan', array('token' => $token));
      $cList = $this->Mod->get_kriteria_list();
      

      // $HTML =var_dump($token);
      $HTML ='';
      $HTML .='<tr>';
      $HTML .='<td style="font-size:14px"> Kriteria </td>';
      foreach ($cList as $row) {
         $HTML .='<td style="font-size:14px">'.$row->nm_kriteria.'</td>';
      }
      $HTML .='</tr>';
      return $HTML;
   }

   function get_row_content($token){
      
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $row = array();
      foreach ($cList as $key) {
         // $row['item'][$key->id_kain][$key->id_kain_to] = $key->nilai_bobot;
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = array('idb' => $key->id_acuan,'bobot' =>$key->nilai_acuan);
         $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      }
      
      
      $HTML= '';
      foreach ($row['parent'] as $cRow => $cVal) {
         
         $HTML.= '<tr>';
         $HTML.='<td style="font-size:14px">'.$cVal.'</td>';
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            // echo '<td>'.$row['item'][$cRow][$cItemKey].'</td>';
            $HTML.='<td>';
            $HTML.='<input class="form-control-sm form-control input-sm" type="text" data-row="'.number_format($cRow).'" data-col="'.number_format($cItemKey).'" id="inTextBobotK-'.$token.'" name="bobot_k'.$token.'[]" value="'.$row['item'][$cRow][$cItemKey]['bobot'].'">';
            $HTML.='<input type="hidden" id="inTextBobotIdK-'.$token.'" name="bobot_id_k'.$token.'[]" value="'.$row['item'][$cRow][$cItemKey]['idb'].'">';
            $HTML.='</td>';
         }
         $HTML.='</tr>';
      }
      return $HTML;
      // return $data;
   }
   
   function get_row_total($token=null){
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_acuan;
         $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      }
      
      $HTML= '';
      $HTML.= '<tr>';
      $HTML.='<td style="font-size:14px">Jumlah</td>';
      $cData = array();
      foreach ($row['parent'] as $cRow => $cVal) {
         $cData[] = $row['item'][$cRow];   
      }
      
      $sum = array();
      foreach ($cData as $key => $sub_array) {
         foreach ($sub_array as $sub_key => $value) {
            if( ! array_key_exists($sub_key, $sum)) $sum[$sub_key] = 0;
            $sum[$sub_key]+=$value;
         }
      }
      foreach ($sum as $key => $value) {
         // $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="inTextTotalK-'.$token.'" disabled="disabled" value="'.$sum[$key].'"></td>';            
         $HTML.='<td>'.$sum[$key].'</td>';            
      }
      // var_dump($sum);
      
      $HTML.= '</tr>';
      return $HTML;
   }

/* Table Acuan Normalisasi */   
   // Compiled
   function get_compiled_normalisasi_table($token){
      $ContentList = $this->get_content_normalisasi($token);
      // $cKriteria = $this->App->_GetTableData('data_kriteria',array('id_kriteria' => $id_kriteria));

      $HTML_HEADER = $this->get_row_header_normalisasi($token);
      $HTML_CONTENT = $this->get_row_content_normalisasi($token);
      $HTML_TOTAL = $this->get_row_total_normalisasi($ContentList);

      $HTML = '<div class="row pb-2"><div class="col-md-12"><h3>Tabel Normalisasi</h3></div></div>';
      // $HTML = '<div class="row pb-2"><div class="col-md-12"><h3>Tabel Normalisasi "'.$cKriteria->nm_kriteria.'"</h3></div></div>';
      $HTML.= '<table id="table-data" class="table table-striped table-bordered" style="text-align:center;">';
      $HTML.= $HTML_HEADER;
      $HTML.= $HTML_CONTENT;
      $HTML.= $HTML_TOTAL;
      $HTML.= '</table>';
      return $HTML;
   }

   function get_row_header_normalisasi($token){
      $cKriteria = $this->App->_GetTableData('data_user_acuan', array('token' => $token));
      $cList = $this->Mod->get_kriteria_list();

      $HTML ='';
      $HTML .='<tr>';
      $HTML .='<td style="font-size:14px">Kriteria</td>';
      foreach ($cList as $row) {
         $HTML .='<td style="font-size:14px">'.$row->nm_kriteria.'</td>';
      }
      $HTML .='<td style="font-size:14px">Jumlah</td>';
      $HTML .='<td style="font-size:14px">PV</td>';
      $HTML .='</tr>';
      return $HTML;
   }

   // Content Normalisasi HTML
   function get_row_content_normalisasi($token){
      
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_acuan;
         $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      }
      
      
      $HTML= '';
      $cDivision = $this->get_total($token);   
      foreach ($row['parent'] as $cRow => $cVal) {
         $HTML.= '<tr>';
         $HTML.='<td style="font-size:14px">'.$cVal.'</td>';
         $cData = array();
         $cDataSum = array();
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            $cData[] = round(($row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey]),2);
            $cDataSum[] = $row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey];
            $opDiv = round(($row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey]),2);
            $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$opDiv.'"></td>';
         }
         $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.array_sum($cData).'"></td>';
         $pvDiv = $this->get_pv_division($this->get_content_normalisasi($token));
         $countDiv = round((array_sum($cDataSum) / $pvDiv),3) ;
         $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="RowPv'.$token.'" name="RowNormTotal[]" value="'.$countDiv.'" disabled="disabled"></td>';            
         
         $HTML.='</tr>';
      }
      return $HTML;
   }

   // Calculate Normalisasi
   function get_content_normalisasi($token){
      
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_acuan;
         $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      }
      
      
      $HTML= '';
      $cDivision = $this->get_total($token);   
      $cData = array();
      foreach ($row['parent'] as $cRow => $cVal) {
         $Rows = array();
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            $Rows[] = ($row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey]);
            // $cData = $Rows;
         }
         $cData[] = $Rows;
      }
      // return json_encode($Rows);
      // return json_encode($cData);
      return $cData;
   }

   // Total Normalisasi HTML
   function get_row_total_normalisasi($dataList=array()){
      
      $sum = array();
      $HTML ='';
      foreach ($dataList as $key => $sub_array) {
         foreach ($sub_array as $sub_key => $value) {
            if( ! array_key_exists($sub_key, $sum)) $sum[$sub_key] = 0;
            $sum[$sub_key]+=$value;
         }
      }
      
      $HTML.= '<tr>';
      $HTML.='<td style="font-size:14px">Jumlah</td>';
      foreach ($sum as $key => $value) {
         $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="RowNormTotal" name="RowNormTotal[]" value="'.$sum[$key].'"></td>';            
         // $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="inTextTotalK-'.$id_kriteria.'" name="bobot[]" value="'.$sum[$key].'"></td>';            
      }

      $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="RowNormTotal" name="RowNormTotal[]" value="'.array_sum($sum).'"></td>';            
      $HTML.= '</tr>';
      return $HTML;
   }

   // Calculate Total
   function get_total($token=null){
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_acuan;
         $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      }
      
      $cData = array();
      foreach ($row['parent'] as $cRow => $cVal) {
         $cData[] = $row['item'][$cRow];   
      }
      
      $sum = array();
      foreach ($cData as $key => $sub_array) {
         foreach ($sub_array as $sub_key => $value) {
            if( ! array_key_exists($sub_key, $sum)) $sum[$sub_key] = 0;
            $sum[$sub_key]+=$value;
         }
      }
      return $sum;
   }

   // get divisions after normalisasi
   function get_pv_division($dataList=array()){
      $sum = array();
      $HTML ='';
      foreach ($dataList as $key => $sub_array) {
         foreach ($sub_array as $sub_key => $value) {
            if( ! array_key_exists($sub_key, $sum)) $sum[$sub_key] = 0;
            $sum[$sub_key]+=$value;
         }
      }
      
      return array_sum($sum);
   }

/* Table Acuan Calculate */   
   // Compiled
   function get_compiled_calc($token){
      $ContentList = $this->get_content_normalisasi($token);
      // $cKriteria = $this->App->_GetTableData('data_kriteria',array('id_kriteria' => $id_kriteria));

      $HTML_HEADER = $this->get_row_header_calc($token);
      $HTML_CONTENT = $this->get_row_content_calc($token);
      $HTML_PV_MATRIX_1 = $this->dataInputed($token);
      // $HTML_PV_MATRIX_2 = $this->get_content_pv($token);
      $HTML_PV_MATRIX_2 = array();
      foreach ($this->get_content_pv($token) as $key => $value) {
         $row = array();
         $row[] = $value;
         $HTML_PV_MATRIX_2[] = $row;
      }
      // $HTML_CONTENT = $this->get_row_content($token);
      $HTML_TOTAL = $this->get_row_total($token);

      // $HTML = '<div class="row pb-2"><div class="col-md-12"><h3>Tabel Normalisasi</h3></div></div>';
      // $HTML = '<div class="row pb-2"><div class="col-md-12"><h3>Tabel Normalisasi "'.$cKriteria->nm_kriteria.'"</h3></div></div>';
      $HTML = '';
      $HTML.= '<table id="table-data" class="table table-striped table-bordered" style="text-align:center;">';
      $HTML.= $HTML_HEADER;
      // $HTML.= json_encode($HTML_CONTENT);
      $HTML.= $HTML_CONTENT;
      $HTML.= $HTML_TOTAL;
      // $HTML.= json_encode(sizeof($HTML_PV_MATRIX_1));
      // $HTML.= json_encode($HTML_PV_MATRIX_1);
      // $HTML.= json_encode(sizeof($HTML_PV_MATRIX_2));
      // $HTML.= json_encode($HTML_PV_MATRIX_2);
      // $HTML.= json_encode($this->perkalian_matriks($HTML_PV_MATRIX_1,array($HTML_PV_MATRIX_2)));
      // $hasil = $this->perkalian_matriks($HTML_PV_MATRIX_1,$HTML_PV_MATRIX_2);
      // $HTML.= json_encode($hasil);
      // for ($i=0; $i<sizeof($hasil); $i++) {
      //    $HTML.= "<tr>";
      //    for ($j=0; $j<sizeof($hasil[$i]); $j++) {
      //       $HTML.= "<td>".round($hasil[$i][$j],2) ."</td>";
      //    }
      //    $HTML.= "</tr>";
      // }
      // $HTML.= $HTML_TOTAL;
      $HTML.= '</table>';
      return $HTML;
   }

   function get_row_hasil_kali($token){
      $HTML_PV_MATRIX_1 = $this->dataInputed($token);
      $HTML_PV_MATRIX_2 = array();
      foreach ($this->get_content_pv($token) as $key => $value) {
         $row = array();
         $row[] = $value;
         $HTML_PV_MATRIX_2[] = $row;
      }

      $hasil = $this->perkalian_matriks($HTML_PV_MATRIX_1,$HTML_PV_MATRIX_2);
      // $HTML.= json_encode($hasil);
      $HTML= '';
      $cRow = array();
      for ($i=0; $i<sizeof($hasil); $i++) {
         // $HTML.= "<tr>";
         for ($j=0; $j<sizeof($hasil[$i]); $j++) {
            $HTML.= "<td>".round($hasil[$i][$j],2) ."</td>";
            $cRow[] = round($hasil[$i][$j],2);
         }
         // $HTML.= "</tr>";
      }
      return $hasil;
      // return $HTML;

   }

   function get_row_header_calc($token){
      $cKriteria = $this->App->_GetTableData('data_user_acuan', array('token' => $token));
      $cList = $this->Mod->get_kriteria_list();

      $HTML ='';
      $HTML .='<tr>';
      $HTML .='<th style="font-size:14px">Kriteria</th>';
      foreach ($cList as $row) {
         $HTML .='<th style="font-size:14px">'.$row->nm_kriteria.'</th>';
      }
      $HTML .='<th style="font-size:14px">PV</th>';
      $HTML .='<th style="font-size:14px">HK</th>';
      $HTML .='<th style="font-size:14px">HK / PV</th>';
      $HTML .='</tr>';
      return $HTML;
   }

   // Content Normalisasi HTML
   /* function get_row_content_calc($token){
      
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $cMatrix1 = $this->get_content_calc_row($token);
      $cMatrix2 = $this->get_content_pv($token);
      $cListRow = $this->get_content_pv($token);

      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_acuan;
         $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      }
      
      // $kali= ;

      // foreach ($row['parent'] as $cRow => $cVal) {
      //    // $j = 0;
      //    $cData = array();
      //    foreach ($row['item'] as $cItemKey => $cItemVal) {
      //       $cData[] = $row['item'][$cRow][$cItemKey];
      //    }
         
      // }

      // $perkalian =  $this->perkalian_matriks($cMatrix1,array($cMatrix2));
      
      $HTML= '';

      $i = 0;
      foreach ($row['parent'] as $cRow => $cVal) {
         // $j = 0;
         $HTML.= '<tr>';
         $HTML.='<td style="font-size:14px">'.$cVal.'</td>';
         $cData = array();
         $cPV = array();
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            // echo '<td>'.$row['item'][$cRow][$cItemKey].'</td>';
            $HTML.='<td>';
            $HTML.='<input class="form-control-sm form-control input-sm" type="text" data-row="'.number_format($cRow).'" data-col="'.number_format($cItemKey).'" id="inTextBobotK-'.$token.'" name="bobot_k'.$token.'[]" value="'.$row['item'][$cRow][$cItemKey].'">';
            $HTML.='<input type="hidden" id="inTextBobotIdK-'.$token.'" name="bobot_id_k'.$token.'[]" value="'.$row['item'][$cRow][$cItemKey].'">';
            $HTML.='</td>';
            $cData[] = $row['item'][$cRow][$cItemKey];
            $cPV = $cMatrix2;
         }
         $HTML.='<td style="font-size:14px">'.$cListRow[$i].'</td>';
         
         $HTML.='</tr>';
         // $HTML.= json_encode($perkalian);
         // $HTML.= json_encode($cListRow);
         // $HTML.= json_encode($kali);
         // $HTML.= json_encode(array($cListRow));
         
         // $i= $i +1;
         $i = $i +1;
         // $j++;
      }
      // $HTML.= json_encode(array($cMatrix1));
      // $HTML.= json_encode(sizeof($cMatrix1));
      // $HTML.= json_encode($cMatrix2);
      // $HTML.= json_encode(sizeof($cMatrix2));
      // $HTML.= json_encode(sizeof($cPV));
      $HTML.= json_encode($cPV);
     
      return $HTML;
   } */
   
   
   function get_row_content_calc($token){
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_acuan;
         $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      }
      
      
      $HTML= '';
      $cDivision = $this->get_total($token);   
      $pvDiv = $this->get_pv_division_calc($this->get_content_calc($token));
      // $matrix = array();
      $perkalian = $this->get_row_hasil_kali($token);
      $i = 0;
      foreach ($row['parent'] as $cRow => $cVal) {
         $j = 0;
         
         $HTML.= '<tr>';
         $HTML.='<th style="font-size:14px">'.$cVal.'</th>';
         $cData = array();
         $cDataSum = array();
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            $cData[] = $row['item'][$cRow][$cItemKey];
            $cDataSum[] = $row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey];
            $HTML.='<td>'.$row['item'][$cRow][$cItemKey].'</td>';
         }
         
         $Pv = array_sum($cDataSum) / $pvDiv ;
         
         $HTML.='<td>'.round($Pv,2).'</td>';            
         $HTML.='<td>'.round($perkalian[$i][$j],2).'</td>';            
         $HTML.='<td>'.round($perkalian[$i][$j] / $Pv,2).'</td>';            
         // $HTML.='<td>'.sizeof($row['parent']).'</td>';            
         
         // $Kali = $this->get_row_hasil_kali($token);
         // $HTML.=$Kali;            
         // $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="RowPv'.$token.'" name="RowNormTotal[]" value="'.$Pv.'" disabled="disabled"></td>';            
         
         
         
         $HTML.='</tr>';
         
         $i++;
         $j++;
      }
      return $HTML;
   }

   // Calculate Normalisasi
   // Menampilkan tabel nomalisasi
   function dataInputed($token){
      
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_acuan;
         $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      }
      
      
      $HTML= '';
      $cDivision = $this->get_total($token);   
      $cData = array();
      $cDataPv = array();
      foreach ($row['parent'] as $cRow => $cVal) {
         $Rows = array();
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            // $Rows[] = ($row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey]);
            $Rows[] = $row['item'][$cRow][$cItemKey] ;
            // $cData = $Rows;
         }
         $cData[] = $Rows;
         
      }
      // return json_encode($Rows);
      // return json_encode($cData);
      return $cData;
   }
   
   function get_content_calc($token){
      
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_acuan;
         $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      }
      
      
      $HTML= '';
      $cDivision = $this->get_total($token);   
      $cData = array();
      $cDataPv = array();
      foreach ($row['parent'] as $cRow => $cVal) {
         $Rows = array();
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            $Rows[] = ($row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey]);
            // $Rows[] = $row['item'][$cRow][$cItemKey] ;
            // $cData = $Rows;
         }
         $cData[] = $Rows;
         
      }
      // return json_encode($Rows);
      // return json_encode($cData);
      return $cData;
   }
   
   // Table Row Inputs
   // Menampilkan tabel 
   function get_content_calc_row($token){
      
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_acuan;
         $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      }
      
      
      $HTML= '';
      $cData = array();
      $cDataPv = array();
      foreach ($row['parent'] as $cRow => $cVal) {
         $Rows = array();
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            $Rows[] = $row['item'][$cRow][$cItemKey];
         }
         $cData[] = $Rows;
         // $cData['item'][] = $Rows;
         // $cData['parent'] = $row['parent'];
         
      }
      // return json_encode($Rows);
      // return json_encode($cData);
      return $cData;
   }

   function get_content_pv($token){
      
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $row = array();
      // foreach ($cList as $key) {
      //    $row['item'][$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_acuan;
      //    $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      // }
      
      
      // $HTML= '';
      // $cDivision = $this->get_total($token);   
      // $cData = array();
      // foreach ($row['parent'] as $cRow => $cVal) {
      //    $Rows = array();
      //    foreach ($row['item'] as $cItemKey => $cItemVal) {
      //       $Rows[] = ($row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey]);
      //       // $cData = $Rows;
      //    }
      //    $cData[] = $Rows;
      // }
      $cData = $this->get_content_calc($token);
      $cDataPv = array();
      $PvDiv = $this->get_pv_division_calc($cData);
      foreach ($cData as $key => $sub_array) {
         // $PV = array(array_sum($cData[$key]) / $PvDiv) ;
         $PV = array_sum($cData[$key]) / $PvDiv ;
         $cDataPv[] = $PV;
         // foreach ($sub_array as $sub_key => $value) {
         //    # code...
         // }
      }
      // $cDataPv[] = array_sum($cData) / $PvDiv;
      // return json_encode($Rows);
      // return json_encode($cData);
      // return $cData;
      return $cDataPv;
   }

   // Total Normalisasi HTML
   function get_row_total_calc($dataList=array()){
      
      $sum = array();
      $HTML ='';
      foreach ($dataList as $key => $sub_array) {
         foreach ($sub_array as $sub_key => $value) {
            if( ! array_key_exists($sub_key, $sum)) $sum[$sub_key] = 0;
            $sum[$sub_key]+=$value;
         }
      }
      
      $HTML.= '<tr>';
      $HTML.='<td style="font-size:14px">Jumlah</td>';
      foreach ($sum as $key => $value) {
         $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="RowNormTotal" name="RowNormTotal[]" value="'.$sum[$key].'"></td>';            
         // $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="inTextTotalK-'.$id_kriteria.'" name="bobot[]" value="'.$sum[$key].'"></td>';            
      }

      $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="RowNormTotal" name="RowNormTotal[]" value="'.array_sum($sum).'"></td>';            
      $HTML.= '</tr>';
      return $HTML;
   }

   // Calculate Total
   function get_total_calc($token=null){
      $cList = $this->Mod->get_bobot_by_user_acuan_token($token);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_acuan;
         $row['parent'][$key->id_kriteria] = $key->nm_kriteria;
      }
      
      $cData = array();
      foreach ($row['parent'] as $cRow => $cVal) {
         $cData[] = $row['item'][$cRow];   
      }
      
      $sum = array();
      foreach ($cData as $key => $sub_array) {
         foreach ($sub_array as $sub_key => $value) {
            if( ! array_key_exists($sub_key, $sum)) $sum[$sub_key] = 0;
            $sum[$sub_key]+=$value;
         }
      }
      return $sum;
   }

   // get divisions after normalisasi
   function get_pv_division_calc($dataList=array()){
      $sum = array();
      $HTML ='';
      foreach ($dataList as $key => $sub_array) {
         foreach ($sub_array as $sub_key => $value) {
            if( ! array_key_exists($sub_key, $sum)) $sum[$sub_key] = 0;
            $sum[$sub_key]+=$value;
         }
      }
      
      return array_sum($sum);
   }

/* Matrix multipication */
   function perkalian_matriks($matriks_a, $matriks_b) {
      $hasil = array();
      for ($i=0; $i<sizeof($matriks_a); $i++) {
         for ($j=0; $j<sizeof($matriks_b[0]); $j++) {
            $temp = 0;
            for ($k=0; $k<sizeof($matriks_b); $k++) {
               $temp += $matriks_a[$i][$k] * $matriks_b[$k][$j];
            }
            $hasil[$i][$j] = $temp;
         }
      }
      return $hasil;
   }

/* Create Unique Tokens */
   private function makeTokens(){
      $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $vaToken = substr(str_shuffle($permitted_chars), 0, 10);
      return $vaToken;
   }



/* Table Keputusan */
   function TableKeputusanBuild($token){
      
      $kriteria = $this->Mod->get_kriteria();
      $Kain = $this->Mod->get_inputed_kain($token);
      $dataKain = explode(',',$Kain->kain);
      $dataList = array();
      foreach ($kriteria as $key => $val) {
         $dataList[$key] = $this->get_each_pv_by($val->id_kriteria);
      }
      $PVList = array();
      
      foreach ($dataList as $key => $sub_arr) {
         foreach ($sub_arr as $subkey => $subval) {
            $PVList[$subval['KainId']][] = $sub_arr[$subkey];
         }
      }
      
      /* HEADER */
      $HeaderList = $this->dataHeader();
      $HTML_HEADER = '';
      $HTML_HEADER .='<tr>';
      $HTML_HEADER .='<th class="bg-primary text-white" style="font-size:14px"> Motif / Kriteria </th>';
      foreach ($HeaderList as $row) {
         $HTML_HEADER .='<th style="font-size:14px">'.$row->nm_kriteria.'</th>';
      }
      // $HTML_HEADER .='<th class="bg-primary text-white" style="font-size:14px"> PV </th>';
      $HTML_HEADER .='</tr>';
      
      /* CONTENT */
      $ContentList = $this->get_content_normalisasi($token);
      $HTML_HEADER_COL = '';
      for ($i=0; $i < sizeof($dataKain) ; $i++) { 
         $HTML_HEADER_COL .='<tr>';
         $HTML_HEADER_COL .='<td>'.$this->GetNamaKain($dataKain[$i]).'</td>';
         for ($j=0; $j < sizeof($PVList[$dataKain[$i]]) ; $j++) { 
            $HTML_HEADER_COL .='<td>'.$PVList[$dataKain[$i]][$j]['PVal'].'</td>';
         }
         $HTML_HEADER_COL .='</tr>';
      }
      // $ItemList = $dataList;


      $HTML_TOTAL = $this->get_row_total($token);

      $HTML = '<h3>Keputusan</h3><br>';
      $HTML.= '<table id="table-data" class="table table-striped table-bordered" style="text-align:center;">';
      $HTML.= $HTML_HEADER;
      $HTML.= $HTML_HEADER_COL;
      // $HTML.= $HTML_CONTENT;
      // $HTML.= $HTML_TOTAL;
      $HTML.= '</table>';
      return $HTML;
      // return json_encode($dataList);
      // return json_encode(sizeof($dataList));
      // return json_encode(sizeof($dataKain));
      // return json_encode($Kain);
      return json_encode(sizeof($PVList));
      // return json_encode($PVList);
   }

   function GetNamaKain($id){
      $this->db->select('nm_kain as nama');
      $this->db->from('data_kain');
      $this->db->where('id_kain',$id);
      $data = $this->db->get();
      if($data->num_rows() == 1){
         $row = $data->row();
         return $row->nama;
      }else{
         return 'undefined';
      }
   }

   function get_each_pv_by($id_kriteria){
      
      $cList = $this->Mod->get_bobot($id_kriteria);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kain][$key->id_kain_to] = $key->nilai_bobot;
         // $row['item'][$key->id_kain][$key->id_kain_to] = $key->nilai_bobot;
         $row['parent'][$key->id_kain] = $key->nm_kain;
      }
      
      
      $HTML= '';
      $cDivision = $this->get_total_nilai($id_kriteria);   
      $cPv = array();
      foreach ($row['parent'] as $cRow => $cVal) {
         $cData = array();
         $cDataSum = array();
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            $cData[] = array(round(($row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey]),2));
            $cDataSum[] = $row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey];
            $opDiv = round(($row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey]),2);
         }
         // $pvDiv = $this->get_content_norm_nilai($id_kriteria);
         $pvDiv = $this->get_pv_div_nilai($this->get_content_norm_nilai($id_kriteria));
         $countDiv = round((array_sum($cDataSum) / $pvDiv),2) ;
         // $countDiv = $pvDiv ;
         // $cPv['data_norm'][] = $cData;
         // $cPv['data_div'] = $pvDiv;
         $cPv[] = array(
            'KriteriaId' =>$id_kriteria,
            'KainId' => $cRow,
            'PVal' =>$countDiv
         );
         // $cPv[] = array(
         //    'acuanVal' => $cData,
         //    'pvVal' => $countDiv
         // );
      }
      // return $HTML;
      return $cPv;
   }

   function get_total_nilai($id_kriteria=null){
      $cList = $this->Mod->get_bobot($id_kriteria);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kain][$key->id_kain_to] = $key->nilai_bobot;
         $row['parent'][$key->id_kain] = $key->nm_kain;
      }
      
      $cData = array();
      foreach ($row['parent'] as $cRow => $cVal) {
         $cData[] = $row['item'][$cRow];   
      }
      
      $sum = array();
      foreach ($cData as $key => $sub_array) {
         foreach ($sub_array as $sub_key => $value) {
            if( ! array_key_exists($sub_key, $sum)) $sum[$sub_key] = 0;
            $sum[$sub_key]+=$value;
         }
      }
      return $sum;
   }

   function get_content_norm_nilai($id_kriteria){
      
      $cList = $this->Mod->get_bobot($id_kriteria);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kain][$key->id_kain_to] = $key->nilai_bobot;
         $row['parent'][$key->id_kain] = $key->nm_kain;
      }
      
      
      $HTML= '';
      $cDivision = $this->get_total_nilai($id_kriteria);   
      $cData = array();
      foreach ($row['parent'] as $cRow => $cVal) {
         $Rows = array();
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            $Rows[] = ($row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey]);
            // $cData = $Rows;
         }
         $cData[] = $Rows;
      }
      // return json_encode($Rows);
      // return json_encode($cData);
      return $cData;
   }

   function get_pv_div_nilai($dataList=array()){
      $sum = array();
      $HTML ='';
      foreach ($dataList as $key => $sub_array) {
         foreach ($sub_array as $sub_key => $value) {
            if( ! array_key_exists($sub_key, $sum)) $sum[$sub_key] = 0;
            $sum[$sub_key]+=$value;
         }
      }
      
      return array_sum($sum);
   }

}