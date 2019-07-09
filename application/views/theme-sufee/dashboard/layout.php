<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
   <!-- META CHARSET -->
   <?=$META_CHARSET;?>
   <!-- TITLE,META DESC,META NAME -->
   <?=$META_NAME;?>
   <!-- FAVICON -->
   <?=$FAVICON;?>
   <!-- VENDOR CSS -->
   <?=$CSS_VENDOR;?>
   <!-- MAIN CSS -->
   <?=$CSS_MAIN;?>
   <style>
      body {
         overflow:hidden
      }
   </style>
</head>

<body>

   <!-- LEFT PANEL -->
   <aside id="left-panel" class="left-panel">
      <?=$SIDEBAR;?>
   </aside>
   <!-- LEFT PANEL -->

   <!-- PANEL RIGHT -->
   <div id="right-panel" class="right-panel">

      <!-- HEADER -->
      <header id="header" class="header">
         <div class="header-menu">
            <!-- HEADER SEARCH -->
               <div class="col-sm-7">
                  <?=$HEADER;?>
               </div>
            <!-- END HEADER SEARCH -->

            <!-- HEADER USER INFO -->
               <div class="col-sm-5">
                  <?=$HEADER_USER;?>
               </div>
            <!-- END HEADER USER INFO -->
         </div>
      </header>
      <!-- HEADER -->

      
      <!-- CONTENT -->
         <?=$CONTENT;?>
      <!-- CONTENT -->
      
   </div>
   <!-- PANEL RIGHT -->

   <!-- JS VENDOR -->
   <?=$JS_VENDOR;?>


</body>
</html>