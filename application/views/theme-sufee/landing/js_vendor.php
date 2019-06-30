<script src="<?=base_url();?>/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url();?>/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?=base_url();?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<?php
   if(!isset($LoadScripts) && empty($LoadScripts)){
      echo '<!-- No Script Loaded -->';
   }else{
      echo $LoadScripts;
   }
?>

<script src="<?=base_url();?>/assets/js/main.js"></script>