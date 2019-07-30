<?=$_Breadcrumb;?>

<div class="content mt-2" >
   
   <div class="row" >
      <div class=" col-lg-12">
         <div class="card " >
            <div class="card-header">
               <!-- <strong class="card-title">Tes Keakuratan / Konsisten</strong> -->
               <button type="button" id="btnPrint" class="btn btn-sm btn-primary float-right">
                  Print &nbsp;<i class="ti-arrow-circle-right"></i>
               </button>
            </div>
            <div class="card-body" id="print">
               <?=$TableAcuan;?>
               <br>
               <!-- <?=$TableAcuanNorm;?> -->
               <?=$TableAcuanMulti;?>
               <br>
               <?=$TableKeputusan;?>
            </div>
         </div>
      </div>
   </div>
</div>