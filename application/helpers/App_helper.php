<?php if (!defined('BASEPATH')) {exit('No direct script access allowed'); }

/**
 * NindaZ
 * App Helper
 * @author PungkyPriyo
 */    



/* 
| App_helper: _LoadJS($js=array())
| Load Native Js insede layout
|---------------------------------------
*/
if(!function_exists('_LoadJS')){
   function _LoadJS($js=array()){
      $_HTML = '';
      if(is_array($js)){
         if(!empty($js)){
            foreach ($js as $rowJS) {
               $_HTML .= '<script type="text/javascript" src="'.base_url('appjs/').$rowJS.'.js"></script>';
            }
            return $_HTML;
         }else{
            return '<!--- No JS Loaded --->';
         }
      }else{
         return '<!--- Invalid JS Request Format --->';
      }
   }
}


/* 
| App_helper: _ShowAlert(alert-type,status-alert,title,message)
| Notifikasi Pemberitahuan (Basic,Dismissable)
|---------------------------------------
*/
if(!function_exists('_ShowAlert')){
   function _ShowBasicAlert($status,$title,$msg,$type=null){
      $types = ($type==null || empty($type)) ? 'basic' : 'dismiss';
      
      $icons = array(
         'defaut'  => 'fa fa-info-circle',
         'danger'  => 'fa fa-ban',
         'info'    => 'fa fa-info',
         'warning' => 'fa fa-warning',
         'success' => 'fa fa-check'
      );
      
      $title = (!empty($title)) ? $title : '' ;
      $msg   = (!empty($msg)) ? $msg : '';

      $_HTML = '';
      if ($types == 'basic') {
         $_HTML .= '<div class="alert alert-'.$status.'" role="alert">';
         $_HTML .= '<b>'.$title.'</b> - '.$msg;
         $_HTML .= '</div>';
      }else{
         $_HTML .= '<div class="sufee-alert alert with-close alert-'.$status.' alert-dismissible fade show">';
         $_HTML .= '<span class="badge badge-pill badge-'.$status.'">'.$title.'</span> ';
         $_HTML .= $msg;
         $_HTML .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
         $_HTML .= '<span aria-hidden="true">×</span>';
         $_HTML .= '</button>';
         $_HTML .= '</div>';
      }

      return $_HTML;
   }
}

/* 
| Breadcrumb - Automatic/Custom
| App_helper: _Breadcrumb($customs-segment=array())
|---------------------------------------
*/
if(!function_exists('_Breadcrumb')){
   function _Breadcrumb($customs=array()){
      $_HTML ='';
      $_HTML.='<div class="breadcrumbs">';
      $_HTML.='<div class="col-sm-4">';
      $_HTML.='<div class="page-header float-left">';
      $_HTML.='<div class="page-title">';
      $_HTML.='<h1>'.ucwords($customs[1]).'</h1>';
      $_HTML.='</div>';
      $_HTML.='</div>';
      $_HTML.='</div>';
      $_HTML.='<div class="col-sm-8">';
      $_HTML.='<div class="page-header float-right">';
      $_HTML.='<div class="page-title">';
      $_HTML.='<ol class="breadcrumb text-right">';
      foreach ($customs as $items) {
         $_HTML.='<li class="active">'.ucwords($items).'</li>';
      }
      $_HTML.='</ol>';
      $_HTML.='</div>';
      $_HTML.='</div>';
      $_HTML.='</div>';
      $_HTML.='</div>';
      return $_HTML;
   }
}

/* 
| Datatables - Generate Images Display
| App_helper: _DtImages($data)
|---------------------------------------
*/
if(!function_exists('_DtImages')){
   function _DtImages($img_path,$alt=null){
      $alt = (empty($alt) ? $img_path : $alt);
      $_HTML ='<img class="card-img-top" src="'.base_url("images/".$img_path).'" alt="'.$alt.'" width="300px">';
      return $_HTML;
   }
}

if(!function_exists('sizeGambar')){
   function sizeGambar($img_path,$alt=null){
      $alt = (empty($alt) ? $img_path : $alt);
      $_HTML ='<img class="card-img-top" src="'.base_url("images/".$img_path).'" alt="'.$alt.'" height="300px">';
      return $_HTML;
   }
}
