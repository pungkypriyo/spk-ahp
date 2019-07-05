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
