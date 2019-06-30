<?php
   if(!isset($LoadScripts) && empty($LoadScripts)){
      echo '<!-- No Script Loaded -->';
   }else{
      echo $LoadScripts;
   }
?>