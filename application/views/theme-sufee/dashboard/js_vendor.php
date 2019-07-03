<script src="<?=base_url();?>/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url();?>/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?=base_url();?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?=base_url();?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url();?>/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?=base_url();?>/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?=base_url();?>/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="<?=base_url();?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url();?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url();?>/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- <script src="<?=base_url();?>/assets/js/init-scripts/data-table/datatables-init.js"></script> -->

<?php
   if(!isset($LoadScripts) && empty($LoadScripts)){
      echo '<!-- No Script Loaded -->';
   }else{
      echo $LoadScripts;
   }
?>
<script src="<?=base_url();?>/assets/js/main.js"></script>

