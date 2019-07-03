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
            <li class="active">
               <a href="#"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
            </li>
            <h3 class="menu-title">Master</h3><!-- /.menu-title -->
            <li>
               <a href="<?=site_url('kain');?>"> <i class="menu-icon ti-files"></i>Data Kain </a>
            </li>
            <li>
               <a href="<?=site_url('acuan');?>"> <i class="menu-icon fa fa-table"></i>Data Bobot Acuan </a>
            </li>
         </ul>
   </div><!-- /.navbar-collapse -->
</nav>