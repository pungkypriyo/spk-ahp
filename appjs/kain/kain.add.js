// $('#table-data').dataTables();

(function ($) {
   /* Initialize form */
   var initForm = function(){
      // Prepare Variable
      var $txtKodeKain = $('input#id_kain');
      var $txtNamaKain = $('input#nm_kain');

      // Call AutoNumber
      AjaxAutoNumber(base_url()+ 'kain/autonumber',$txtKodeKain);
      // Move focus pointer
      $txtNamaKain.focus();

      // Form handler to submit
      $('button#btn-submit').click(function(e){
         $('form').submit();
      });

   }
   


   var AjaxAutoNumber = function(url,selector){
      $.ajax({
         url: url,
         type: 'get',
         success: function (dataResponse) {
            var $data = dataResponse;
            if ($data.Status == 'success') {
               selector.val($data.ParamsId);
            }
         },
         error: function (textStatus, jqxhr) {
            console.log(textStatus + ' - ' + jqxhr);
         }
      });
   }

   initForm();
   

})(jQuery);