// $('#table-data').dataTables();

(function ($) {
   // $('#print-tables').hide();
   // $("#btnPrint").on('click',function(){
   //    $('#print-tables').show();
   // });
   $("#btnPrint").printPreview({
      obj2print: '#print',
      width:'1000',
      title: 'Print Hasil'
   });
})(jQuery);