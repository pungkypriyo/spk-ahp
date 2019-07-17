// $('#table-data').dataTables();

(function ($) {
   var $obj = $('input#inText:eq(0)');
   var $obj1 = $('input#inText:eq(7)');
   var $obj2 = $('input#inText:eq(14)');
   var $obj3 = $('input#inText:eq(21)');
   var $obj4 = $('input#inText:eq(28)');
   var $obj5 = $('input#inText:eq(35)');

   var initForm = function(){
      // Style::Centering text inside inputs
      $('.form-control').css('text-align','center');
      // Style::NumberFormats
      $('input#inText').on("keypress keyup blur", function (event) {
         //this.value = this.value.replace(/[^0-9\.]/g,'');
         $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
         if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
         }
      });
      // Style lock all listed inputs
      lockAllListed();
      // Hide button simpan & batal
      $('button#btn-batal').hide();
      $('button#btn-simpan').hide();

   }
   
   var onDefault = function (){
      $('button#btn-edit').show();
      $('button#btn-batal').hide();
      $('button#btn-simpan').hide();
      unlockAllListed();
      lockAllListed();
   }

   var onEdit = function(){
      $('button#btn-edit').hide();
      $('button#btn-batal').show();
      $('button#btn-simpan').show();
      unlockAllListed();
      lockListed();
   }

   var lockListed = function(){
      // Style::Readonly some special text
      $obj.attr('readonly', 'readonly');
      $obj1.attr('readonly', 'readonly');
      $obj2.attr('readonly', 'readonly');
      $obj3.attr('readonly', 'readonly');
      $obj4.attr('readonly', 'readonly');
      $obj5.attr('readonly', 'readonly');
      // var $obj = $('input#inText:eq(0)');
      // var $obj1 = $('input#inText:eq(7)');
      // var $obj2 = $('input#inText:eq(14)');
      // var $obj3 = $('input#inText:eq(21)');
      // var $obj4 = $('input#inText:eq(28)');
      // var $obj5 = $('input#inText:eq(35)');
   }

   var lockAllListed = function(){
      $('input#inText').attr('readonly','readonly');      
   }
   var unlockAllListed = function(){
      $('input#inText').removeAttr('readonly');      
   }

   /* Event Handler Buttons */
   // On Edit
   $('button#btn-edit').click(function(e){
      onEdit();
      e.preventDefault();
   });
   // On Batal
   $('button#btn-batal').click(function(e){
      onDefault();
      e.preventDefault();
   });

   initForm();
})(jQuery);