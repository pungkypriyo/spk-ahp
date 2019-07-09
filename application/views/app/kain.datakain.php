<?=$_Breadcrumb;?>

<div class="content mt-2">    
   <?php
      if($this->session->flashdata('message')){
         echo "<div class='row'><div class='col-md-12'>".$this->session->flashdata('message')."</div></div>";
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
                  <!-- <th>Gambar</th> -->
                  <th width="90px"></th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
   </div>
</div>