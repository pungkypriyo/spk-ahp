(function ($) {
   /* Datatables */
   var dt_url = base_url() + 'landing/datatables';
   var dt_table = $('table#table-data');

   var oTable = dt_table.DataTable({
      "sDom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rtip',
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
         "url": dt_url,
         "type": "post",
         "dataType": 'json'
      },
      "columns": [
         { 
            "data": ['id'],
            "render": function(d){
               return "FAM-" + d;
            }
         },
         { "data": ['nama'] },
         { "data": ['jenis'] },
         { "data": ['tipe'] },
         { "data": ['corak'] },
         { "data": ['serap'] },
         { "data": ['grade'] },
         { "data": ['pengguna'] },
         { "data": ['gambar'] },
         { "data": ['act'] }
      ],
      "columnDefs": [
         {
            "targets" : [8],
            "visible" :false
         },
         {
            "targets": [9],
            "orderable": false
         }
      ],
      "iDisplayLength": 10,
      "oLanguage": {
         "sEmptyTable": 'Tidak ada data. ',
         "sProcessing": 'Loading data...',
         "sSearch": "Cari:",
         "sLengthMenu": "_MENU_",
         "sInfo": "<b> _END_ </b> dari Total _TOTAL_ data"
      }
   });

   dt_table.on('click', 'a#btn-detil', function (e) {
      var url = $(this).attr('href');
      var id = url.substring(url.length - 3, url.length);
      var data = oTable.row($(this).parents('tr')).data();

      var img = $('#datamodal').find('#gambar-kain');
      img.html('');
      img.html(data['gambar']);
      e.preventDefault();
   });
   
})(jQuery);