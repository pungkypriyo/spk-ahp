<?=$_Breadcrumb;?>

<div class="content mt-2">    
   <?php
      if($this->session->flashdata('msg')){
         echo "<div class='row'><div class='col-md-12'>".$this->session->flashdata('msg')."</div></div>";
      } 
   ?>       
   <div class="col-lg-12" style="display:none">
   <!-- <div class="col-lg-12"> -->
      <div class="card">
         <div class="card-header">
            <strong class="card-title">Data Motif Kain Terpilih</strong>
         </div>
         <div class="card-body">
            <table class="table table-striped" id="table-data-selected">
               <thead>
                  <tr>
                     <!-- <th scope="col">#</th> -->
                     <th scope="col">Id</th>
                     <th scope="col">Nama Motif Kain</th>
                     <th scope="col">Jenis Bahan</th>
                     <th scope="col">Tipe Benang</th>
                  </tr>
               </thead>
               <tbody></tbody>
            </table>
         </div>
      </div>
   </div>
   <div class=" col-lg-12">
      <div class="card">
         <div class="card-header">
            <strong class="card-title">Data Motif Kain</strong>
            <button type="button" id="btn-next" class="btn btn-sm btn-primary float-right">
               Selanjutnya &nbsp;<i class="ti-arrow-circle-right"></i>
            </button>
         </div>
         <div class="card-body">
            <table id="table-data" class="table table-striped table-bordered">
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
                     <th>Pilih</th>
                  </tr>
               </thead>
               <tbody></tbody>
            </table>
            <form id="frm-data" method="post" action="<?=site_url('compare/ahp_compares');?>">
               <input type="hidden" id="txt_selection" name="selection">
            </form>
            <!-- <button type="button" class="btn btn-success"><i class="ti-angle-right"></i>&nbsp; Selanjutnya</button> -->
         </div>
      </div>
   </div>
   
</div>