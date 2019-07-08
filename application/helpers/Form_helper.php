<?php if (!defined('BASEPATH')) {exit('No direct script access allowed'); }

/**
 * NindaZ
 * Form Helper
 */    

/* 
| Form_helper: function:: Static_SelectOptions($OptName,$Desc,$ValueSelected,$Selection = array())
| Load Native Js insede layout
|---------------------------------------
*/

if(!function_exists('Static_SelectOptions')){
   function Static_SelectOptions($OptName,$Desc,$ValueSelected,$Selection = array()){
      $_HTML ='';
      $_HTML.='<select name="'.$OptName.'" id="'.$OptName.'" class="form-control">';
      if(empty($id)){
         $_HTML.='<option value="">- '.$Desc.' -</option>';
         $_CONTENT ='';
         for ($i=0; $i < count($Selection); $i++) {
            $_CONTENT .='<option value="'.$Selection[$i].'">'.ucwords($Selection[$i]).'</option>';
         }
         $search = 'value="'.$ValueSelected.'"';
         $replace = 'value="'.$ValueSelected.'" selected';
         $_HTML .= str_replace($search, $replace , $_CONTENT);
      }else{
         $_HTML.='<option value="">- '.$Desc.' -</option>';
      }
      $_HTML.='</select>';
      return $_HTML;
      // return var_dump($Selection);
   }
}

if(!function_exists('Static_SelectRadios')){
   function Static_SelectRadios($OptName,$ValueSelected,$Selection = array()){
      // $Selection = array('Pria','Wanita');
      $_HTML ='';
      if(!empty($ValueSelected)){
         for ($i=0; $i < count($Selection) ; $i++) { 
            $Checked = ($Selection[$i] == strtolower($ValueSelected)) ? 'checked' : '';
            $_HTML.='<input type="radio" id="'.$OptName.$Selection[$i].'" value="'.$Selection[$i].'" class="form-check-input"' .$Checked.'>';
            $_HTML.='<label for="'.$OptName.$Selection[$i].'" id="'.$OptName.'" class="form-check-label">'.ucwords($Selection[$i]).'</label>&nbsp;&nbsp;&nbsp;';

            
         }
      }else{
         $_HTML.='#EmptySelection#';
      }
      // $_HTML.='</select>';
      return $_HTML;
      // return var_dump($Selection);
   }
}
