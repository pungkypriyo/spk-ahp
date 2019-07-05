<?=$_Breadcrumb;?>

<!-- <?php var_dump($Kain);?> -->


<div class="content mt-2">            
   <div class=" col-lg-12">
      <div class="card">
         <div class="card-header">
            <strong>Tambah Data Motif Kain</strong>
         </div>
         <div class="card-body card-block">
               <form action="<?=site_url('kain/add');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <input type="hidden" id="idk" name="idk" value="<?=$Kain->idk;?>">
                  <div class="row form-group">
                     <div class="col col-md-2"><label for="id_kain" class=" form-control-label">ID Motif</label></div>
                     <div class="col-12 col-md-3">
                        <input type="text" id="id_kain" name="id_kain" class="form-control" value="<?=$Kain->id_kain;?>" readonly>
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-2"><label for="nm_kain" class=" form-control-label">Nama Motif</label></div>
                     <div class="col-12 col-md-9"><input type="text" id="nm_kain" name="nm_kain" value="<?=$Kain->nm_kain;?>" class="form-control"></div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-2"><label for="jenis_bahan" class=" form-control-label">Jenis Bahan</label></div>
                     <div class="col-12 col-md-3">
                        <?php
                           $optionBahan = array('combed','bamboo','carded','TC','CVC','hyget');
                           echo Static_SelectOptions('jenis_bahan','Pilih Jenis Bahan',$Kain->jenis_bahan,$optionBahan);
                        ?>
                     </div>
                  <!-- </div>
                  <div class="row form-group"> -->
                     <div class="col col-md-2"><label for="tipe_benang" class=" form-control-label">Tipe Benang</label></div>
                     <div class="col-12 col-md-3">
                        <?php
                           $optionBenang = array('20s','23s','24s','30s','40s');
                           echo Static_SelectOptions('tipe_benang','Pilih Tipe Benang',$Kain->tipe_benang,$optionBenang);
                        ?>
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-2"><label for="corak_kain" class=" form-control-label">Corak Kain</label></div>
                     <div class="col-12 col-md-3">
                        <?php
                           $optionCorak = array('polos','mamboo','wash','stripes','print');
                           echo Static_SelectOptions('corak_kain','Pilih Corak Kain',$Kain->corak_kain,$optionCorak);
                        ?>
                    </div>
                  <!-- </div>
                  <div class="row form-group"> -->
                     <div class="col col-md-2"><label class=" form-control-label"> Daya Serap</label></div>
                        <div class="col col-md-4">
                           <div class="form-check-inline form-check">
                                 <!-- <div class="radio"> -->
                                    <label for="serap_rendah" class="form-check-label ">
                                       <input type="radio" id="serap_rendah" name="kualitas_serap" value="rendah" class="form-check-input"> Rendah
                                    </label>&nbsp;&nbsp;&nbsp;
                                 <!-- </div> -->
                                 <!-- <div class="radio"> -->
                                    <label for="serap_sedang" class="form-check-label ">
                                       <input type="radio" id="serap_sedang" name="kualitas_serap" value="sedang" class="form-check-input"> Sedang
                                    </label>&nbsp;&nbsp;&nbsp;
                                 <!-- </div> -->
                                 <!-- <div class="radio"> -->
                                    <label for="serap_tinggi" class="form-check-label ">
                                       <input type="radio" id="serap_tinggi" name="kualitas_serap" value="tinggi" class="form-check-input"> Tinggi
                                    </label>
                                 <!-- </div> -->
                           </div>
                        </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-2"><label for="grade_kain" class=" form-control-label">Grade Kain</label></div>
                     <div class="col-12 col-md-9">
                        <?php
                           $optionGrade = array('A','B','C','D');
                           echo Static_SelectOptions('grade_kain','Pilih Grade Kain',$Kain->grade_kain,$optionGrade);
                        ?>
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-2"><label class=" form-control-label">Kategori Pengguna</label></div>
                        <div class="col col-md-9">
                           <div class="form-check">
                                 <div class="radio">
                                    <label for="pengguna_pria" class="form-check-label ">
                                       <input type="radio" id="pengguna_pria" name="kategori_pengguna" value="pria" class="form-check-input"> Pria
                                    </label>
                                 </div>
                                 <div class="radio">
                                    <label for="pengguna_wanita" class="form-check-label ">
                                       <input type="radio" id="pengguna_wanita" name="kategori_pengguna" value="wanita" class="form-check-input"> Wanita
                                    </label>
                                 </div>
                           </div>
                        </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-2"><label for="file-input" class=" form-control-label">Detail Motif</label></div>
                     <div class="col-12 col-md-9"><input type="file" id="file-input" name="gambar" class="form-control-file"></div>
                  </div>
               </form>
                </div>
                <div class="card-footer">
                    <button type="submit" id="submit-form" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Simpan Data
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
         </div>
   </div>
</div>