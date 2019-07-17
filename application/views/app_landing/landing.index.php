<div class="content mt-2"> 
   <?php
      if($this->session->flashdata('msg')){
         echo "<div class='row'><div class='col-md-12'>".$this->session->flashdata('msg')."</div></div>";
      }  
      
      
      foreach ($ListMotif as $row){

      
   ?>         
   <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-header">
            ID : <?=$row['id'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong class="card-title mb-3"><?=$row['nama'];?></strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <?=$row['gambar'];?>
                </div>
                <hr>
                <div class="card-text text-sm-center">
                  
                </div>
            </div>
        </div>
    </div>
      <?php } ?>
</div>