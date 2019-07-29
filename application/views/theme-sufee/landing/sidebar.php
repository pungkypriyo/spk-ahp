<nav class="navbar navbar-expand-sm navbar-default">
   <div class="navbar-header">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
         </button>
         <a class="navbar-brand" href="./"><img src="<?=base_url('images/logo.png');?>" alt="Logo"></a>
         <a class="navbar-brand hidden" href="./"><img src="<?=base_url('images/logo2.png');?>" alt="Logo"></a>
   </div>

   <div id="main-menu" class="main-menu collapse navbar-collapse">
         <ul class="nav navbar-nav">
            <li class="active"> <a href="<?=base_url();?>"> <i class="menu-icon fa fa-dashboard"></i>Landing Page </a> </li>
            <li class="active"> <a href="<?=site_url('Landing/Kain');?>"> <i class="menu-icon fa fa-file"></i>Data Kain </a> </li>
            <li class="active"> <a href="<?=site_url('Compare');?>"> <i class="menu-icon fa fa-random"></i>Compare Kain </a> </li>
            <!-- <h3 class="menu-title">Master</h3>
            <li> <a href="#"> <i class="menu-icon ti-files"></i>Data Kain </a> </li>
            <li> <a href="user/data-kain.php"> <i class="menu-icon fa fa-table"></i>Perhitungan </a> </li> -->
         </ul>
   </div><!-- /.navbar-collapse -->
</nav>