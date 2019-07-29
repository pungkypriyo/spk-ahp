(function ($) {
   
   var $btnInside = $('label');
   var $frm = $('form#frm-data-acuan');
   var $btnSave = $('button#btnSave');

   

   $btnInside.click(function(e){
      $inputs = $(this).find('input[type="radio"]');
      $inVal = $inputs.val();
      // alert($(this).val());
      // alert($inputs.val());
      // alert($(this).parent());
      // console.log($(this).parents());
      // console.log(tr);
      var tr = $(this).parents().find('tr');

      // console.log($inputs.attr('id'));
      // console.log($inputs.val());
      // console.log(uniqueId);
      // var uniqueTxt = $('input#' + uniqueId);
      var uniqueId = $inputs.attr('id').replace('opt','txt');
      var uniqueTxt = $('input[data-id="' + uniqueId + '"]');
      
      var iRow = $('input[data-id="' + uniqueId + '"]').data('row');
      var iCol = $('input[data-id="' + uniqueId + '"]').data('col');
      var uniqueTxtD = $('input[data-id="txt_' + iCol + '_' + iRow +'"]');
      var iCalcMain,iCalcSub;
      if($inVal === 1){
         uniqueTxt.val($inVal);
         uniqueTxtD.val($inVal);
      }else{
         iCalcSub = 1 / $inVal ;
         iCalcMain = $inVal ;
         uniqueTxt.val(iCalcMain);
         uniqueTxtD.val(iCalcSub);

      }
      // console.log($('input[data-id="' + uniqueId + '"]').data('col'));
      // console.log($('input[data-id="' + uniqueId + '"]').data('col') - $('input[data-id="' + uniqueId + '"]').data('row'));
      // console.log($('input[data-id="' + uniqueId + '"]').data('row') - $('input[data-id="' + uniqueId + '"]').data('col'));

      e.preventDefault();
   });

   $btnSave.click(function(e){
      if ($('input#txtBobot').filter(function () { return this.value === ''; }).length === 0) {
         // alert($frm.serialize());
         // console.log($frm.serialize());
         $.ajax({
            url: $frm.attr('action'),
            type: $frm.attr('method'),
            data: $frm.serialize(),
            dataType: 'json',
            success:function(data){
               console.log(data);
               alert('Redirect to:' + data.Redirect);
               location.href = data.Redirect;
            },
            error:function(errMsg){
               alert(errMsg);
            }
         })
      } else {
         alert("Silahkan isikan semua pilihan kriteria.");
      }

      e.preventDefault();
   });






})(jQuery);