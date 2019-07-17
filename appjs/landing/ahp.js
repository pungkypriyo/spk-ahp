(function ($) {
   /* Datatables */
   var dt_url = base_url() + 'landing/datatablesAHP';
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
         { "data": ['id'] },
         { "data": ['nama'] },
         { "data": ['jenis'] },
         { "data": ['tipe'] },
         { "data": ['corak'] },
         { "data": ['serap'] },
         { "data": ['grade'] },
         { "data": ['pengguna'] },
         { "data": ['gambar'] },
         { "data": ['pilih'] }
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
})(jQuery);