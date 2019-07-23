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
      $data['TableBenang'] = $this->get_compiled_table(2);
      $data['TableCorak'] = $this->get_compiled_table(3);
      $data['TableSerap'] = $this->get_compiled_table(4);
      $data['TableGrade'] = $this->get_compiled_table(5);
      $data['TablePengguna'] = $this->get_compiled_table(6);
      $data['_Breadcrumb'] = _Breadcrumb(array(1=>'Dashboard',2=>'Bobot Nilai'));
      $data['LoadScripts'] = _LoadJS(array('bobot/nilai'));
      $this->template->DisplayView('dashboard','app/bobot.nilai',$data);
   }

   function get_compiled_table($id_kriteria){
      $HTML_HEADER = $this->get_row_header($id_kriteria);
      $HTML_CONTENT = $this->get_row_content($id_kriteria);
      $HTML_TOTAL = $this->get_row_total($id_kriteria);
      $HTML = '<table id="table-data" class="table table-striped table-bordered" style="text-align:center;">';
      $HTML.= $HTML_HEADER;
      $HTML.= $HTML_CONTENT;
      $HTML.= $HTML_TOTAL;
      $HTML.= '</table>';
      return $HTML;
   }

   function get_row_header($id_kriteria){
      $cKriteria = $this->App->_GetTableData('data_kriteria', array('id_kriteria' => $id_kriteria ));
      $cList = $this->Mod->get_kain();

      $HTML ='';
      $HTML .='<tr>';
      // $HTML .='<td style="font-size:11px">'.$cVal.'</td>';
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
            $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row['item'][$cRow][$cItemKey].'"></td>';
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
         $HTML.='<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$sum[$key].'"></td>';            
      }
      // var_dump($sum);
      
      $HTML.= '</tr>';
      return $HTML;
   }


   
   public function forms(){
      $data['_Breadcrumb'] = _Breadcrumb($this->uri->segment_array());
		$this->template->DisplayView('dashboard','app/bobot.nilai',$data);
   }

}
