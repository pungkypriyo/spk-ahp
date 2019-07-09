<?=$_Breadcrumb;?>

<div class="content mt-2">    
   <?php
      if($this->session->flashdata('msg')){
         echo "<div class='row'><div class='col-md-12'>".$this->session->flashdata('msg')."</div></div>";
      }
   ?>
   <div class="card">
      <div class="card-header">
         <strong class="card-title">Data Motif Kain</strong>
         <button type="button" id="btn-add" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button>
      </div>
      <div class="card-body">
         <table id="table-data" class="table table-striped table-bordered dataTable no-footer">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Jenis Bahan</th>
                  <th>Tipe Benang</th>
                  <th>Corak</th>
                  <th>Kualitas Serap</th>
                  <th>Grade</th>
                  <th>Kat. Pengguna</th>
                  <th>Gambar</th>
                  <th width="100px"></th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
   </div>

   <!-- <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#scrollmodal">
      Scrolling
   </button> -->

   <div class="modal fade" id="datamodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="scrollmodalLabel">Gambar Motif Kain</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <div id="gambar-kain"></div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
         </div>
      </div>
   </div>
</div>