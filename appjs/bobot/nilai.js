(function ($) {
   var $obj = $('input#inTextBobotK-1:eq(0)');
   var $obj1 = $('input#inTextBobotK-1:eq(7)');
   var $obj2 = $('input#inTextBobotK-1:eq(14)');
   var $obj3 = $('input#inTextBobotK-1:eq(21)');
   var $obj4 = $('input#inTextBobotK-1:eq(28)');
   var $obj5 = $('input#inTextBobotK-1:eq(35)');
   var $objTotal = $('input#inTextTotalK-1');

   var initForm = function(){
      // Kolom 1,2 & 2,1 {1 & 6}
      $('input#inTextBobotK-1:eq(1)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(7)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(6)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(6)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(7)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(1)').val(hitung);
      });
      
      // Kolom 1,3 & 3,1 {2 & 12}
      $('input#inTextBobotK-1:eq(2)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(14)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(12)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(12)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(14)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(2)').val(hitung);
      });

      // Kolom 1,4 & 4,1 {3 & 18}
      $('input#inTextBobotK-1:eq(3)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(21)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(18)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(18)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(21)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(3)').val(hitung);
      });

      // Kolom 1,5 & 5,1 {4 & 24}
      $('input#inTextBobotK-1:eq(4)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(28)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(24)').val(hitung);
      });
      
      $('input#inTextBobotK-1:eq(24)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(28)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(4)').val(hitung);
      });

      // Kolom 1,6 & 6,1 {5 & 30}
      $('input#inTextBobotK-1:eq(5)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(35)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(30)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(30)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(35)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(5)').val(hitung);
      });

      // Kolom 2,3 & 3,2 {8, 13}
      $('input#inTextBobotK-1:eq(8)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(14)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(13)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(13)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(14)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(8)').val(hitung);
      });

      // Kolom 2,4 & 4,2 {9 & 19}
      $('input#inTextBobotK-1:eq(9)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(21)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(19)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(19)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(21)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(9)').val(hitung);
      });

      // Kolom 2,5 & 5,2 {10 & 25}
      $('input#inTextBobotK-1:eq(10)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(28)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(25)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(25)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(28)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(10)').val(hitung);
      });

      // Kolom 2,6 & 6,2 {11 & 31}
      $('input#inTextBobotK-1:eq(11)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(35)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(31)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(31)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(35)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(11)').val(hitung);
      });

      // Kolom 3,4 & 4,3 {15 & 20}
      $('input#inTextBobotK-1:eq(15)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(21)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(20)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(20)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(21)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(15)').val(hitung);
      });

      // Kolom 3,5 & 5,3 {16 & 26}
      $('input#inTextBobotK-1:eq(16)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(28)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(26)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(26)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(28)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(16)').val(hitung);
      });

      // Kolom 3,6 & 6,3 {17 & 32}
      $('input#inTextBobotK-1:eq(17)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(35)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(32)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(32)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(35)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(17)').val(hitung);
      });

      // Kolom 4,5 & 5,4 {22 & 27}
      $('input#inTextBobotK-1:eq(22)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(28)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(27)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(27)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(28)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(22)').val(hitung);
      });

      // Kolom 4,6 & 6,4 {23 & 33}
      $('input#inTextBobotK-1:eq(23)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(35)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(33)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(33)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(35)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(23)').val(hitung);
      });

      // Kolom 5,6 & 6,5 {29 & 34}
      $('input#inTextBobotK-1:eq(29)').on('keyup',function(e){
         var hitung = $($('input#inTextBobotK-1:eq(35)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(34)').val(hitung);
      });

      $('input#inTextBobotK-1:eq(34)').on('keyup', function (e) {
         var hitung = $($('input#inTextBobotK-1:eq(35)')).val() / $(this).val();
         $('input#inTextBobotK-1:eq(29)').val(hitung);
      });

      // Style::Centering text inside inputs
      $('.form-control').css('text-align','center');
      // Style::NumberFormats
      $('input#inTextBobotK-1').on("keypress keyup blur", function (event) {
         //this.value = this.value.replace(/[^0-9\.]/g,'');
         $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
         if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
         }
      });
      // Style lock all listed inputs
      // lockAllListed();
      // Hide button simpan & batal
      // $('button#btn-batal1').hide();
      // $('button#btn-simpan1').hide();
      onDefault();
      $('input#inText').attr('disabled', 'disabled');    
      $('input#RowNormTotal').attr('disabled', 'disabled');    

   }
   
   var onDefault = function (){
      $('button#btn-edit1').show();
      $('button#btn-batal1').hide();
      $('button#btn-simpan1').hide();
      unlockAllListed();
      lockAllListed();
   }

   var onEdit = function(){
      $('button#btn-edit1').hide();
      $('button#btn-batal1').show();
      $('button#btn-simpan1').show();
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
      
      // var $obj = $('input#inTextBobotK-1:eq(0)');
      // var $obj1 = $('input#inTextBobotK-1:eq(7)');
      // var $obj2 = $('input#inTextBobotK-1:eq(14)');
      // var $obj3 = $('input#inTextBobotK-1:eq(21)');
      // var $obj4 = $('input#inTextBobotK-1:eq(28)');
      // var $obj5 = $('input#inTextBobotK-1:eq(35)');
   }

   var lockAllListed = function(){
      $('input#inTextBobotK-1').attr('readonly','readonly');    
      $objTotal.attr('readonly', 'readonly');  
   }
   var unlockAllListed = function(){
      $('input#inTextBobotK-1').removeAttr('readonly');      
   }

   /* Event Handler Buttons */
   $('button#btn-simpan1').click(function(e){
      var values = $("input#inTextBobotK-1").map(function () { return $(this).val(); }).get();
      // console.log(values);
      console.log($('form#frm_data_1').serialize());
      var dataArr = $('form#frm_data_1').serialize();
      $.ajax({
         type: "POST",
         url: base_url() + 'nilai/update_bobot',
         data: dataArr,
         dataType:'json',
         failure: function (errMsg) {
            console.error("error:", errMsg);
         },
         success: function (data) {
            alert(data.msg);
            location.href = data.redirect;
         }
      });
      e.preventDefault();
   });

   // On Edit
   $('button#btn-edit1').click(function(e){
      onEdit();
      e.preventDefault();
   });
   // On Batal
   $('button#btn-batal1').click(function(e){
      onDefault();
      e.preventDefault();
   });

   initForm();
   // alert($objTotal.length);
})(jQuery);