<?=$_Breadcrumb;?>

<div class="content mt-2">    
   <?php
      if($this->session->flashdata('msg')){
         echo "<div class='row'><div class='col-md-12'>".$this->session->flashdata('msg')."</div></div>";
      } 
   ?>       
   <div class=" col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="card-header">
                  <strong class="card-title">Data Motif Kain</strong>
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
                  <a href="<?=site_url('Landing/Ahp2');?>" class="btn btn-success"><i class="ti-angle-right"></i>&nbsp; Selanjutnya</a>
               </div>
            </div>
         </div>
   </div>
</div>