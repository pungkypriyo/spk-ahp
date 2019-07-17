<?=$_Breadcrumb;?>

<div class="content mt-2">            
   <div class=" col-lg-12">
         <div class="card">
            <div class="card-header">
               <strong>Tambah Data Motif Kain</strong>
            </div>
            <div class="card-body card-block">
               <?php
                  if($this->session->flashdata('message')){
                     echo $this->session->flashdata('message');
                  }
               ?>
               <form action="<?=site_url('kain/add');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="row form-group">
                     <div class="col col-md-2"><label for="id_kain" class=" form-control-label">ID Motif</label></div>
                     <div class="col-12 col-md-3">
                        <input type="text" id="id_kain" name="id_kain" class="form-control" readonly>
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-2"><label for="nm_kain" class=" form-control-label">Nama Motif</label></div>
                     <div class="col-12 col-md-9"><input type="text" id="nm_kain" name="nm_kain" placeholder="Ketikkan nama motif kain..." class="form-control"></div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-2"><label for="jenis_bahan" class=" form-control-label">Jenis Bahan</label></div>
                     <div class="col-12 col-md-3">
                        <select name="jenis_bahan" id="jenis_bahan" class="form-control">
                           <option value="0">- Pilih Jenis Bahan -</option>
                           <option value="combed">Combed</option>
                           <option value="bamboo">Bamboo</option>
                           <option value="carded">Carded</option>
                           <option value="tc">TC (Teteron Cotton)</option>
                           <option value="cvc">CVC (Chief Value Cotton)</option>
                           <option value="hyget">Hyget</option>
                        </select>
                     </div>
                  <!-- </div>
                  <div class="row form-group"> -->
                     <div class="col col-md-2"><label for="tipe_benang" class=" form-control-label">Tipe Benang</label></div>
                     <div class="col-12 col-md-4">
                        <select name="tipe_benang" id="tipe_benang" class="form-control">
                           <option value="0">- Pilih Tipe Benang -</option>
                           <option value="20s">20s</option>
                           <option value="23s">23s</option>
                           <option value="24s">24s</option>
                           <option value="30s">30s</option>
                           <option value="40s">40s</option>
                        </select>
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-2"><label for="corak_kain" class=" form-control-label">Corak Kain</label></div>
                     <div class="col-12 col-md-3">
                        <select name="corak_kain" id="corak_kain" class="form-control">
                           <option value="0">- Pilih Corak Kain -</option>
                           <option value="polos">Polos</option>
                           <option value="mamboo">Mamboo</option>
                           <option value="wash">Wash</option>
                           <option value="stripes">Stripes</option>
                           <option value="print">Print</option>
                        </select>
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
                     <div class="col-12 col-md-3">
                        <select name="grade_kain" id="grade_kain" class="form-control">
                           <option value="0">- Pilih Grade Kain -</option>
                           <option value="A">A</option>
                           <option value="B">B</option>
                           <option value="C">C</option>
                           <option value="D">D</option>
                        </select>
                     </div>
                  <!-- </div>
                  <div class="row form-group"> -->
                     <div class="col col-md-2"><label class=" form-control-label">Kategori Pengguna</label></div>
                        <div class="col col-md-3">
                           <div class="form-check-inline form-check">
                                 <div class="radio">
                                    <label for="pengguna_pria" class="form-check-label ">
                                       <input type="radio" id="pengguna_pria" name="kategori_pengguna" value="pria" class="form-check-input"> Pria
                                    </label>&nbsp;&nbsp;
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
                    <button type="submit" id="btn-submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Simpan Data
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
         </div>
   </div>
</div>