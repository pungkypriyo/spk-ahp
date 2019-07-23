<?=$_Breadcrumb;?>

<div class="content mt-2">            
   <div class=" col-lg-12">
      <div class="card">
         <div class="card-header">
            <strong class="card-title">Data Bobot Nilai</strong>            
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
                  <br>
                  <?=$TableJenisBahan;?>
                  <br>
                  <?=$TableJenisBahanNorm;?>
               </div>
               <div class="tab-pane fade" id="tipeBenang" role="tabpanel" aria-labelledby="tipeBenang-tab">
                  <br>
                  <?=$TableBenang;?>
                  <br>
                  <?=$TableBenangNorm;?>
               </div>
               <div class="tab-pane fade" id="corakKain" role="tabpanel" aria-labelledby="corakKain-tab">
                  <br>
                  <?=$TableCorak;?>
                  <br>
                  <?=$TableCorakNorm;?>
               </div>
               <div class="tab-pane fade" id="dayaSerap" role="tabpanel" aria-labelledby="dayaSerap-tab">
                  <br>
                  <?=$TableSerap;?>
                  <br>
                  <?=$TableSerapNorm;?>
               </div>
               <div class="tab-pane fade" id="gradeKain" role="tabpanel" aria-labelledby="gradeKain-tab">
                  <br>
                  <?=$TableGrade;?>
                  <br>
                  <?=$TableGradeNorm;?>
               </div>
               <div class="tab-pane fade" id="kategoriPengguna" role="tabpanel" aria-labelledby="kategoriPengguna-tab">
                  <br>
                  <?=$TablePengguna;?>
                  <br>
                  <?=$TablePenggunaNorm;?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>