<?=$_Breadcrumb;?>

<div class="content mt-2">            
   <div class=" col-lg-12">
      <div class="card">
         <div class="card-header">
            <strong class="card-title">Data Bobot Acuan Kriteria</strong>
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
               <?php
                  print_r($List);
                  $data = array();
                  $row = array();
                  foreach ($List as $key) {
                     $row[$key->id_kriteria][$key->id_kriteria_to] = $key->nilai_bobot_ac;
                     $data[] = array('id' => $key->id_acuan,'val' => $key->nilai_bobot_ac);
                  }   
               ?>

            <table id="table-data" class="table table-striped table-bordered" style="text-align:center;">
               <tr>
                  <th style="font-size:0.8em">Kriteria</th>
                  <th style="font-size:0.8em">Jenis Bahan</th>
                  <th style="font-size:0.8em">Tipe Benang</th>
                  <th style="font-size:0.8em">Corak Kain</th>
                  <th style="font-size:0.8em">Daya Serap</th>
                  <th style="font-size:0.8em">Grade Kain</th>
                  <th style="font-size:0.8em">Kategori Pengguna</th>
               </tr>
               
               <tr>
                  <th style="font-size:0.8em">Jenis Bahan</th>
                  <?php 
                     for ($i=1; $i < count($row[1])+1 ; $i++) { 
                        $html ='';
                        $html.='<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row[1][$i].'"></td>';                        
                        echo $html;
                     }
                  ?>
               <tr>
                  <th style="font-size:0.8em">Tipe Benang</th>
                  <?php 
                     for ($i=1; $i < count($row[2])+1 ; $i++) { 
                        $html ='';
                        $html.= '<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row[2][$i].'"></td>';                        
                        echo $html;

                     }
                  ?>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Corak Kain</th>
                  <?php 
                     for ($i=1; $i < count($row[3])+1 ; $i++) { 
                        $html ='';
                        $html.= '<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row[3][$i].'"></td>';                        
                        echo $html;

                     }
                  ?>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Daya Serap</th>
                  <?php 
                     for ($i=1; $i < count($row[4])+1 ; $i++) { 
                        $html ='';
                        $html.= '<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row[4][$i].'"></td>';                        
                        echo $html;

                     }
                  ?>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Grade Kain</th>
                  <?php 
                     for ($i=1; $i < count($row[5])+1 ; $i++) { 
                        $html ='';
                        $html.= '<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row[5][$i].'"></td>';                        
                        echo $html;

                     }
                  ?>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Kategori Pengguna</th>
                  <?php 
                     for ($i=1; $i < count($row[6])+1 ; $i++) { 
                        $html ='';
                        $html.= '<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row[6][$i].'"></td>';                        
                        echo $html;

                     }
                  ?>
               </tr>
            </table>
            </div>
      </div>
   </div>
</div>