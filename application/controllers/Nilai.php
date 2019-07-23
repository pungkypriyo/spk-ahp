<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CoreModules {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('NIlaiModel','Mod');
   }
   

	public function index($params = null)
	{
      $acuan = $this->Mod->get_list_acuan();

      $data['TableJenisBahan'] = $this->get_compiled_table(1);
      $data['TableJenisBahanNorm'] = $this->get_compiled_normalisasi_table(1);
      $data['TableBenang'] = $this->get_compiled_table(2);
      $data['TableBenangNorm'] = $this->get_compiled_normalisasi_table(2);
      $data['TableCorak'] = $this->get_compiled_table(3);
      $data['TableCorakNorm'] = $this->get_compiled_normalisasi_table(3);
      $data['TableSerap'] = $this->get_compiled_table(4);
      $data['TableSerapNorm'] = $this->get_compiled_normalisasi_table(4);
      $data['TableGrade'] = $this->get_compiled_table(5);
      $data['TableGradeNorm'] = $this->get_compiled_normalisasi_table(5);
      $data['TablePengguna'] = $this->get_compiled_table(6);
      $data['TablePenggunaNorm'] = $this->get_compiled_normalisasi_table(6);

      /* Load */
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Dashboard',2=>'Bobot Nilai'));
      $data['LoadScripts'] = _LoadJS(
         array(
            'bobot/nilai',
            'bobot/nilai-benang',
            'bobot/nilai-corak',
            'bobot/nilai-serap',
            'bobot/nilai-grade',
            'bobot/nilai-pengguna'
         )
      );
      $this->template->DisplayView('dashboard','app/bobot.nilai',$data);
   }

/* Table Bobot By Kriteria */
   function get_compiled_table($id_kriteria){
      $HTML_HEADER = $this->get_row_header($id_kriteria);
      $HTML_CONTENT = $this->get_row_content($id_kriteria);
      $HTML_TOTAL = $this->get_row_total($id_kriteria);
      $HTML = $this->get_compiled_button($id_kriteria);
      $HTML.= '<table id="table-data-'.$id_kriteria.'" class="table table-striped table-bordered" style="text-align:center;">';
      $HTML.= $HTML_HEADER;
      $HTML.= $HTML_CONTENT;
      $HTML.= $HTML_TOTAL;
      $HTML.= '</table>';
      return $HTML;
   }

   function get_compiled_button($id_kriteria){
      $cKriteria = $this->App->_GetTableData('data_kriteria',array('id_kriteria' => $id_kriteria));
      $HTML = '<div class="row pb-2">';
      $HTML.= '<div class="col-md-6">';
      $HTML.= '<h3>'.$cKriteria->nm_kriteria.'</h3>';
      $HTML.= '</div>';
      $HTML.= '<div class="col-md-6">';
      $HTML.= '<button type="button" class="btn btn-primary btn-sm float-right" id="btn-edit'.$id_kriteria.'">';
      $HTML.= '<i class="fa fa-dot-circle-o"></i> Edit Bobot';
      $HTML.= '</button>';
      $HTML.= '<button type="button" class="btn btn-danger btn-sm float-right" id="btn-batal'.$id_kriteria.'">';
      $HTML.= '<i class="fa fa-times"></i> Batal';
      $HTML.= '</button>';
      $HTML.= '<button type="submit" class="btn btn-primary btn-sm float-right" id="btn-simpan'.$id_kriteria.'">';
      $HTML.= '<i class="fa fa-dot-circle-o"></i> Simpan Data';
      $HTML.= '</button>';
      $HTML.= '</div>';
      $HTML.= '</div>';
      return $HTML;
   }

   function get_row_header($id_kriteria){
      $cKriteria = $this->App->_GetTableData('data_kriteria', array('id_kriteria' => $id_kriteria ));
      $cList = $this->Mod->get_kain();

      $HTML ='';
      $HTML .='<tr>';
      $HTML .='<td style="font-size:14px">'.$cKriteria->nm_kriteria.'</td>';
      foreach ($cList as $kain) {
         $HTML .='<td style="font-size:14px">'.$kain->nm_kain.'</td>';
      }
      $HTML .='</tr>';
      return $HTML;
   }

   function get_row_content($id_kriteria){
      
      $cList = $this->Mod->get_bobot($id_kriteria);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kain][$key->id_kain_to] = $key->nilai_bobot;
         $row['parent'][$key->id_kain] = $key->nm_kain;
      }
      
      
      $HTML= '';
      foreach ($row['parent'] as $cRow => $cVal) {
         
         $HTML.= '<tr>';
         $HTML.='<td style="font-size:14px">'.$cVal.'</td>';
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            // echo '<td>'.$row['item'][$cRow][$cItemKey].'</td>';
            $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="inTextBobotK-'.$id_kriteria.'" name="bobot_k'.$id_kriteria.'[]" value="'.$row['item'][$cRow][$cItemKey].'"></td>';
         }
         $HTML.='</tr>';
      }
      return $HTML;
      // return $data;
   }
   
   function get_row_total($id_kriteria=null){
      $cList = $this->Mod->get_bobot($id_kriteria);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kain][$key->id_kain_to] = $key->nilai_bobot;
         $row['parent'][$key->id_kain] = $key->nm_kain;
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
         $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="inTextTotalK-'.$id_kriteria.'" name="bobot[]" value="'.$sum[$key].'"></td>';            
      }
      // var_dump($sum);
      
      $HTML.= '</tr>';
      return $HTML;
   }

/* Table Normalisasi */
   // Compiled
   function get_compiled_normalisasi_table($id_kriteria){
      $ContentList = $this->get_content_normalisasi($id_kriteria);
      $cKriteria = $this->App->_GetTableData('data_kriteria',array('id_kriteria' => $id_kriteria));

      $HTML_HEADER = $this->get_row_header($id_kriteria);
      $HTML_CONTENT = $this->get_row_content_normalisasi($id_kriteria);
      $HTML_TOTAL = $this->get_row_total_normalisasi($ContentList);

      $HTML = '<div class="row pb-2"><div class="col-md-12"><h3>Tabel Normalisasi "'.$cKriteria->nm_kriteria.'"</h3></div></div>';
      $HTML.= '<table id="table-data" class="table table-striped table-bordered" style="text-align:center;">';
      $HTML.= $HTML_HEADER;
      $HTML.= $HTML_CONTENT;
      $HTML.= $HTML_TOTAL;
      $HTML.= '</table>';
      return $HTML;
   }

   // Content Normalisasi HTML
   function get_row_content_normalisasi($id_kriteria){
      
      $cList = $this->Mod->get_bobot($id_kriteria);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kain][$key->id_kain_to] = $key->nilai_bobot;
         $row['parent'][$key->id_kain] = $key->nm_kain;
      }
      
      
      $HTML= '';
      $cDivision = $this->get_total($id_kriteria);   
      foreach ($row['parent'] as $cRow => $cVal) {
         $HTML.= '<tr>';
         $HTML.='<td style="font-size:14px">'.$cVal.'</td>';
         foreach ($row['item'] as $cItemKey => $cItemVal) {
            $opDiv = round(($row['item'][$cRow][$cItemKey] / $cDivision[$cItemKey]),2);
            $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$opDiv.'"></td>';
         }
         $HTML.='</tr>';
      }
      return $HTML;
   }

   // Calculate Normalisasi
   function get_content_normalisasi($id_kriteria){
      
      $cList = $this->Mod->get_bobot($id_kriteria);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kain][$key->id_kain_to] = $key->nilai_bobot;
         $row['parent'][$key->id_kain] = $key->nm_kain;
      }
      
      
      $HTML= '';
      $cDivision = $this->get_total($id_kriteria);   
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
      $HTML.= '</tr>';
      return $HTML;
   }

   // Calculate Total
   function get_total($id_kriteria=null){
      $cList = $this->Mod->get_bobot($id_kriteria);
      $row = array();
      foreach ($cList as $key) {
         $row['item'][$key->id_kain][$key->id_kain_to] = $key->nilai_bobot;
         $row['parent'][$key->id_kain] = $key->nm_kain;
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
         // $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$sum[$key].'"></td>';            
      }
      // var_dump($sum);
      
      // $HTML.= '</tr>';
      return $sum;
   }

   
   public function forms(){
      $data['_Breadcrumb'] = _Breadcrumb($this->uri->segment_array());
		$this->template->DisplayView('dashboard','app/bobot.nilai',$data);
   }

}
