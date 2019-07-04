// $('#table-data').dataTables();

(function ($) {
   $('button').click(function(e){
      alert('testSubmit');
      $('form').submit();
   });
})(jQuery);