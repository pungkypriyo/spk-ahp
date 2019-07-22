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
            <ul class="nav nav-tabs">
               <li class="nav-item">
                     <a class="nav-link active" href="#">Jenis Bahan</a>
               </li>
               <li class="nav-item">
                     <a class="nav-link" href="#">Tipe Benang</a>
               </li>
               <li class="nav-item">
                     <a class="nav-link" href="#">Corak Kain</a>
               </li>
               <li class="nav-item">
                     <a class="nav-link" href="#">Kualitas Daya Serap</a>
               </li>
               <li class="nav-item">
                     <a class="nav-link" href="#">Grade Kain</a>
               </li>
               <li class="nav-item">
                     <a class="nav-link" href="#">Kategori Pengguna</a>
               </li>
            </ul>
               <?php
                  //print_r($row);
                  $data = array();
                  $row = array();
                  foreach ($List as $key) {
                     $row[$key->id_kain][$key->id_kain_to] = $key->nilai_bobot;
                     $data[] = array('id' => $key->id_bobot,'val' => $key->nilai_bobot);
                  }   
               ?>
            <h3 style="text-align:center;"><strong class="card-title">Jenis Bahan</strong></h3>
            <table id="table-data" class="table table-striped table-bordered" style="text-align:center;">
               <tr>
                  <th style="font-size:0.8em">Jenis Bahan</th>
                  <th style="font-size:0.8em">Kain A</th>
                  <th style="font-size:0.8em">Kain B</th>
                  <th style="font-size:0.8em">Kain C</th>
                  <th style="font-size:0.8em">Kain D</th>
                  <th style="font-size:0.8em">Kain E</th>
                  <th style="font-size:0.8em">Kain F</th>
               </tr>
               
               <tr>
                  <th style="font-size:0.8em">Kain A</th>
                  <?php 

                     for ($i=1; $i < count($row['001'])+1 ; $i++) { 
                        $html ='';
                        $html.='<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row['001']['00'.$i].'"></td>';                        
                        echo $html;
                     }
                  ?>
               <tr>
                  <th style="font-size:0.8em">Kain B</th>
                  <?php 
                     for ($i=1; $i < count($row['002'])+1 ; $i++) { 
                        $html ='';
                        $html.= '<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row['002']['00'.$i].'"></td>';                        
                        echo $html;
                     }
                  ?>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Kain C</th>
                  <?php 
                     for ($i=1; $i < count($row['003'])+1 ; $i++) { 
                        $html ='';
                        $html.= '<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row['003']['00'.$i].'"></td>';                        
                        echo $html;
                     }
                  ?>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Kain D</th>
                  <?php 
                     for ($i=1; $i < count($row['004'])+1 ; $i++) { 
                        $html ='';
                        $html.= '<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row['004']['00'.$i].'"></td>';                        
                        echo $html;
                     }
                  ?>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Kain E</th>
                  <?php 
                     for ($i=1; $i < count($row['005'])+1 ; $i++) { 
                        $html ='';
                        $html.= '<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row['005']['00'.$i].'"></td>';                        
                        echo $html;
                     }
                  ?>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Kain F</th>
                  <?php 
                     for ($i=1; $i < count($row['006'])+1 ; $i++) { 
                        $html ='';
                        $html.= '<td><input class="form-control-sm form-control input-sm" type="text" id="inText" name="bobot[]" value="'.$row['006']['00'.$i].'"></td>';                        
                        echo $html;
                     }
                  ?>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Jumlah</th>
               </tr>
            </table>
       
            <h5 style="text-align:center;"><strong class="card-title">Bobot Relatif & Vektor Prioritas</strong></h5>
            <h6 style="text-align:center;"><strong>Jenis Bahan</h6><strong>
            <table id="table-data" class="table table-striped table-bordered" style="text-align:center;">
               <tr>
                  <th style="font-size:0.8em">Jenis Bahan</th>
                  <th style="font-size:0.8em">Kain A</th>
                  <th style="font-size:0.8em">Kain B</th>
                  <th style="font-size:0.8em">Kain C</th>
                  <th style="font-size:0.8em">Kain D</th>
                  <th style="font-size:0.8em">Kain E</th>
                  <th style="font-size:0.8em">Kain F</th>
                  <th style="font-size:0.8em">Jumlah</th>
                  <th style="font-size:0.8em">PV</th>
               </tr>
               
               <tr>
                  <th style="font-size:0.8em">Kain A</th>  
               </tr>
               <tr>
                  <th style="font-size:0.8em">Kain B</th>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Kain C</th>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Kain D</th>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Kain E</th>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Kain F</th>
               </tr>
               <tr>
                  <th style="font-size:0.8em">Jumlah</th>
               </tr>
            </table>
         </div>
      </div>
   </div>
</div>