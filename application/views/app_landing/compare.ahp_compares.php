<?=$_Breadcrumb;?>

<div class="content mt-2">
   <div class="row">
      <?php foreach ($KainSelected as $row){ ?>         
         <div class="col-lg-4 col-md-6">
            <div class="card">
                  <div class="card-header">
                     ID : FAM-<?=$row->id_kain;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <strong class="card-title mb-3"><?=$row->nm_kain;?></strong>
                  </div>
                  <div class="card-body">
                     <div class="mx-auto d-block">
                        <img class="card-img-top rounded-circle" src="https://spk-ahp.dev/images/kain/<?=$row->gambar;?>" alt="<?=$row->nm_kain;?>" width="150px" height="150px">
                     </div>
                  </div>
            </div>
         </div>
      <?php } ?>
   </div>
   <div class="row">
      <div class=" col-lg-12">
         <div class="card">
            <div class="card-header">
               <strong class="card-title">Perbandingan Kriteria</strong>
               <button type="button" id="btnSave" class="btn btn-sm btn-primary float-right">
                  Proses &nbsp;<i class="ti-arrow-circle-right"></i>
               </button>
            </div>
            <div class="card-body">
               <form id="frm-data-acuan" method="post" action="<?=site_url('compare/ahp_calculate');?>">
                  <input type="hidden" name="txtKain" value="<?=$KainArr;?>">
                  <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="text-align:center;">
                     <thead>
                        <tr>
                           <!-- <th>No</th> -->
                           <!-- <th>No</th> -->
                           <th>Nama Kriteria</th>
                           <th>Pilih Nilai</th>
                           <th>Nama Kriteria</th>
                           <!-- <th>No</th> -->
                           <!-- <th>No</th>
                           <th>No</th> -->
                        </tr>
                     </thead>
                     <tbody>
                     
                  
                     <?php 
                        // echo json_encode($KriteriaList);
                        $x = $KriteriaList;
                        // $y = $KriteriaList;
                        $cList = array();
                        $cSubList = array();

                        foreach ($x as $key => $xVal) {
                           foreach ($KriteriaList as $yKey => $yVal) {
                              $row = array(
                                 'mainId' => $xVal->id_kriteria,
                                 'mainName' => $xVal->nm_kriteria,
                                 'subId' => $yVal->id_kriteria,
                                 'subName' => $yVal->nm_kriteria
                              );
                              // $cList[] = $row ;
                              $cList[$xVal->id_kriteria][$yVal->id_kriteria] = $row ;
                           }
                           
                        }
                        // echo json_encode($cList);
                        // echo json_encode($cList[1]);
                        for ($i=1; $i <= sizeof($cList) ; $i++) { 
                           $n =1;
                           for ($j=1; $j < $i ; $j++) { 
                              $inputIndex = '<input type="hidden"  id="txtBobotIndex" data-row="'.$cList[$j][$i]['subId'].'" data-col="'.$cList[$j][$i]['subId'].'" name="txtBobotIndex[]" value="1">';
                              
                              $inputLeft = '<input type="hidden"  id="txtBobot" data-id="txt_'.$cList[$j][$i]['subId'].'_'.$cList[$j][$i]['mainId'].'" data-row="'.$cList[$j][$i]['subId'].'" data-col="'.$cList[$j][$i]['mainId'].'" name="txtBobot[]" required>';
                              $inputLeft .= '<input type="hidden"  id="txtKriteria"  data-row="'.$cList[$j][$i]['subId'].'" data-col="'.$cList[$j][$i]['mainId'].'" name="txtKriteria[]" value="'.$cList[$j][$i]['subId'].'">';
                              $inputLeft .= '<input type="hidden"  id="txtKriteriaTo" data-row="'.$cList[$j][$i]['mainId'].'" data-col="'.$cList[$j][$i]['subId'].'" name="txtKriteriaTo[]" value="'.$cList[$j][$i]['mainId'].'">';

                              $inputRight = '<input type="hidden"  id="txtBobot" data-id="txt_'.$cList[$j][$i]['mainId'].'_'.$cList[$j][$i]['subId'].'" data-row="'.$cList[$j][$i]['mainId'].'" data-col="'.$cList[$j][$i]['subId'].'" name="txtBobot[]" required>';
                              $inputRight .= '<input type="hidden"  id="txtKriteria" data-row="'.$cList[$j][$i]['mainId'].'" data-col="'.$cList[$j][$i]['subId'].'" name="txtKriteria[]" value="'.$cList[$j][$i]['mainId'].'">';
                              $inputRight .= '<input type="hidden"  id="txtKriteriaTo" data-row="'.$cList[$j][$i]['subId'].'" data-col="'.$cList[$j][$i]['mainId'].'" name="txtKriteriaTo[]" value="'.$cList[$j][$i]['subId'].'">';
                              echo '<tr>';
                              // echo '<td class="p0">'.$j.'</td>';
                              // echo '<td class="p0">['.$cList[$j][$i]['subId'].','.$cList[$j][$i]['mainId'].']</td>';
                              // echo '<td class="p0">'.$inputLeft.'</td>';
                              echo '<td class="p0">'.$cList[$j][$i]['subName'].$inputLeft.'</td>';
                              echo '<td class="p0">'.DynamicValueRange($cList[$j][$i]['subId'],$cList[$j][$i]['mainId']).$inputIndex.'</td>';                     
                              echo '<td class="p0">'.$cList[$j][$i]['mainName'].$inputRight.'</td>';
                              // echo '<td class="p0">'.$inputRight.'</td>';
                              // echo '<td class="p0">['.$cList[$j][$i]['mainId'].','.$cList[$j][$i]['subId'].']</td>';
                              // echo '<td class="p0">'.$cList[$j][$i]['subId'].'</td>';
                              echo '</tr>';
                           }
                        }
                        
                     ?>
                  
                     </tbody>
                  </table>
               </form>
               <button type="button" id="btnSave" class="btn btn-sm btn-primary float-right">
                  Proses &nbsp;<i class="ti-arrow-circle-right"></i>
               </button>
            </div>
         </div>
      </div>
   </div>
</div>
         