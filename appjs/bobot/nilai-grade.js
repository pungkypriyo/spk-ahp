(function ($) {
   
   var txtEl = $('input#inTextBobotK-5');
   var lenEl = txtEl.length;
   var ordo = Math.sqrt(lenEl);
   var $objTotal = $('input#inTextTotalK-5');

   var initForm = function(){


      txtEl.each( function(index) {         
         $(this).focus(function (e) {
            var $this = $(this);
            var $dRow = $this.data('row');
            var $dCol = $this.data('col');
            console.log('matrix : ' + '[' + $dRow + ',' + $dCol + ']') ;
         }).on('keyup', function (e) {
            var $this = $(this);
            var $dRow = $this.data('row');
            var $dCol = $this.data('col');
            var $iPos = $($('input#inTextBobotK-5[data-row="' + $dCol + '"][data-col="' + $dCol +'"]'));
            var hitung = $iPos.val() / $this.val();
            $('input#inTextBobotK-5[data-row="'+$dCol+'"][data-col="'+$dRow+'"]').val(hitung);
            // console.log('targeted : ' + '[' + $dCol + ',' + $dRow + ']') ;
            // console.log(hitung) ;
         });
      });


      // Style::Centering text inside inputs
      $('.form-control').css('text-align','center');
      // Style::NumberFormats
      $('input#inTextBobotK-5').on("keypress keyup blur", function (event) {
         //this.value = this.value.replace(/[^0-9\.]/g,'');
         $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
         if ((event.which != 46 || $(this).val().indexOf('.') != -5) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
         }
      });
      onDefault();
      $('input#inText').attr('disabled', 'disabled');    
      $('input#RowNormTotal').attr('disabled', 'disabled');    

   }
   
   var onDefault = function (){
      $('button#btn-edit5').show();
      $('button#btn-batal5').hide();
      $('button#btn-simpan5').hide();
      unlockAllListed();
      lockAllListed();
   }

   var onEdit = function(){
      $('button#btn-edit5').hide();
      $('button#btn-batal5').show();
      $('button#btn-simpan5').show();
      unlockAllListed();
      lockListed();
   }

   var lockListed = function(){

      var dStart = 0;
      var dEnd = lenEl;
      // var ordo = Math.sqrt(lenEl);

      // var arr = [];

      for (var i = dStart; i < dEnd ; i++) {
         txtEl.eq(i).attr('readonly', 'readonly');
         i = i + ordo;
      }
   }

   var lockAllListed = function(){
      $('input#inTextBobotK-5').attr('readonly','readonly');    
      $objTotal.attr('readonly', 'readonly');  
   }
   var unlockAllListed = function(){
      $('input#inTextBobotK-5').removeAttr('readonly');      
   }

   /* Event Handler Buttons */
   $('button#btn-simpan5').click(function(e){
      var values = $("input#inTextBobotK-5").map(function () { return $(this).val(); }).get();
      // console.log(values);
      console.log($('form#frm_data_5').serialize());
      var dataArr = $('form#frm_data_5').serialize();
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
   $('button#btn-edit5').click(function(e){
      onEdit();
      e.preventDefault();
   });
   // On Batal
   $('button#btn-batal5').click(function(e){
      onDefault();
      e.preventDefault();
   });

   initForm();
   // alert($objTotal.length);
})(jQuery);