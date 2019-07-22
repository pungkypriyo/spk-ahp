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
            <h3>Jenis Bahan</h3>
            <?=$TableJenisBahan;?>
            <h3>Benang</h3>
            <?=$TableBenang;?>
         </div>
      </div>
   </div>
</div>