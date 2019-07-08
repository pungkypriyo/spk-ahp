<?=$_Breadcrumb;?>

<div class="content mt-2">            
   <div class=" col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="card-header">
                  <strong class="card-title">Data Motif Kain</strong>
               </div>
               <div class="card-body">
               <a href="<?=site_url('kain/tambahkain');?>" class="btn btn-primary">Tambah Data</a>
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
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                        <?php foreach($ListKain as $u){ ?>
                           <tr>
                              <td><?= $u->id_kain?></td>
                              <td><?php echo $u->nm_kain?></td>
                              <td><?php echo $u->jenis_bahan?></td>
                              <td><?php echo $u->tipe_benang?></td>
                              <td><?php echo $u->corak_kain?></td>
                              <td><?php echo $u->kualitas_serap?></td>
                              <td><?php echo $u->grade_kain?></td>
                              <td><?php echo $u->kategori_pengguna?></td>
                              <td><?php echo $u->gambar?></td>
                              <td>
                                    <?php echo anchor('kain/form_edit/'.$u->idk,'Edit'); ?>
                                    <?php echo anchor('crud/hapus/'.$u->idk,'Hapus'); ?>
                              </td>
                           </tr>
                           <?php } ?>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
   </div>
</div>