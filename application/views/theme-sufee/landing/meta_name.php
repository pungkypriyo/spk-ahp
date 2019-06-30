<?php
   $PAGE_SESSION = $this->uri->segment(1);
   $META_CONTENT = '';
   if(!isset($PAGE_TITLE)){
      $META_CONTENT .='<title>'.SITE_NAME.'</title>';
      $META_CONTENT .='<meta name="description" content="'.SITE_NAME.'">';
      $META_CONTENT .='<meta name="viewport" content="width=device-width, initial-scale=1">';
   }else{   
      $META_CONTENT .='<title>'.SITE_NAME.' - '.$PAGE_TITLE.'</title>';
      $META_CONTENT .='<meta name="description" content="'.SITE_NAME.' - '.$PAGE_TITLE.'">';
      $META_CONTENT .='<meta name="viewport" content="width=device-width, initial-scale=1">';
   }
   echo $META_CONTENT;
?>