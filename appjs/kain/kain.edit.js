// $('#table-data').dataTables();

(function ($) {
   /* Kode Kain */
   var $txtKodeKain = $('input#id_kain');
   // $txtKodeKain.val('#GenerateKodeKain#'); 
   
   var $txtNamaKain = $('input#nm_kain');
   $txtNamaKain.focus();

   $('button').click(function(e){
      console.log('testSubmit');
      $('form').submit();
   });
})(jQuery);