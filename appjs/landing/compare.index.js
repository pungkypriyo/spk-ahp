(function ($) {
   /* Datatables */
   var dt_url = base_url() + 'compare/dt_compare_ahp';
   var dt_table = $('table#table-data');
   var dt_table_selected = $('table#table-data-selected');
   var frm = $('form#frm-data');
   var txtSelection = $('input#txt_selection');
   var btnNext = $('button#btn-next');


/* DataTable main data. */
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
            "targets" : [8,9],
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

/* DataTable sub data selected. */
   var oTableDest = dt_table_selected.DataTable({
      "sDom": 't',
      "oLanguage": {
         "sEmptyTable": 'Tidak ada data dipilih. '
      }
   });

   var storedData = [];
   $('#table-data tbody').on('click', 'tr', function () {
      if ($(this).hasClass('selected')) {
         // oTableDest.row('.selected').remove().draw(false);
         $(this).removeClass('selected');
         var ids = oTable.rows('.selected').data().pluck('id').toArray();
         storedData = ids;

      } else {
         $(this).addClass('selected');
         // var aTrs = oTable.rows('.selected').data();  
         var ids = oTable.rows('.selected').data().pluck('id').toArray();  
         storedData = ids;
         // txtSelection.val(ids);

         // var aCol = oTable.columns(0).data();  
         // var destRow = [];
         // var destRow = [aTrs.id,aTrs.nama,aTrs.jenis,aTrs.tipe];
         // for (var i = 0; i < ids.length; i++) {  
            // oTableDest.row.add(aTrs[i]).draw();
            // var inputs = $('<input>', {id:'txtId'+ids[i] , name:'txt_id[]' , type:'hidden'});
            // frm.append(inputs);
         // }
         // console.log(destRow);
         // console.log(aTrs);
         // console.log(ids);
      }
      // console.log(aTrs);
   });

   btnNext.click(function (e) {
      // console.log(storedData);
      var dataLen = storedData.length;
      if(dataLen < 2){
         alert('tidak ada data pembanding');
      }else{
         var data = storedData.toString();
         txtSelection.val(data);
         frm.submit();
         // alert('data ada: '+ storedData);
         // $.ajax({
         //    url: frm.attr('action'),
         //    type: frm.attr('method'),
         //    data: frm.serialize(),
         //    success:function(data){
         //       alert('berhasil');
         //    },
         //    error:function(errMsg){
         //       alert(errMsg);
         //    }
         // })
      }
      e.preventDefault();
   });

   // oTable.on('deselect', function (e, dt, type, indexes) {
   //    if (type === 'row') {
   //       var data = table.rows(indexes).data().pluck('id');
   //       console.log(data);
   //       // do something with the ID of the deselected items
   //    }
   // });




})(jQuery);