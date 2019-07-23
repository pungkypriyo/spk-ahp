<?=$_Breadcrumb;?>

<div class="content mt-2">            
   <div class=" col-lg-12">
      <div class="card">
         <div class="card-header">
            <strong class="card-title">Data Bobot Nilai</strong>
            <button type="button" class="btn btn-primary btn-sm float-right" id="btn-edit">
               <i class="fa fa-dot-circle-o"></i> Edit Bobot
            </button>
            <button type="button" class="btn btn-danger btn-sm float-right" id="btn-batal">
               <i class="fa fa-times"></i> Batal
            </button> 
            <button type="submit" class="btn btn-primary btn-sm float-right" id="btn-simpan">
               <i class="fa fa-dot-circle-o"></i> Simpan Data
            </button> 
         </div>
         <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="jenisBahan-tab" data-toggle="tab" href="#jenisBahan" role="tab" aria-controls="jenisBahan" aria-selected="true">Jenis Bahan</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tipeBenang-tab" data-toggle="tab" href="#tipeBenang" role="tab" aria-controls="tipeBenang" aria-selected="false">Tipe Benang</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="corakKain-tab" data-toggle="tab" href="#corakKain" role="tab" aria-controls="corakKain" aria-selected="false">Corak Kain</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="dayaSerap-tab" data-toggle="tab" href="#dayaSerap" role="tab" aria-controls="dayaSerap" aria-selected="false">Kualitas Daya Serap</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="gradeKain-tab" data-toggle="tab" href="#gradeKain" role="tab" aria-controls="gradeKain" aria-selected="false">Grade Kain</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="kategoriPengguna-tab" data-toggle="tab" href="#kategoriPengguna" role="tab" aria-controls="kategoriPengguna" aria-selected="false">Kategori Pengguna</a>
               </li>
            </ul>
            <div class="tab-content pl-3 p-1" id="myTabContent">
               <div class="tab-pane fade show active" id="jenisBahan" role="tabpanel" aria-labelledby="jenisBahan-tab">
                  <h3 style="text-align:center;">Jenis Bahan</h3>
                  <?=$TableJenisBahan;?>
               </div>
               <div class="tab-pane fade" id="tipeBenang" role="tabpanel" aria-labelledby="tipeBenang-tab">
                  <h3 style="text-align:center;">Tipe Benang</h3>
                  <?=$TableBenang;?>
               </div>
               <div class="tab-pane fade" id="corakKain" role="tabpanel" aria-labelledby="corakKain-tab">
                  <h3 style="text-align:center;">Corak Kain</h3>
                  <?=$TableCorak;?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>