<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
   <!-- META -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Skripsi AHP | Login Admin</title>
   <meta name="description" content="Sufee Admin - HTML5 Admin Template">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php 
      if($this->session->flashdata('status'))
         echo  '<meta http-equiv="refresh" content="'.$this->session->flashdata('redirect_delay').
               ';url='.$this->session->flashdata('redirect_url').'"/>';
   ?>
   
   <link rel="apple-touch-icon" href="apple-icon.png">
   <link rel="shortcut icon" href="favicon.ico">

   <!-- VENDOR CSS -->
   <link rel="stylesheet" href="<?=base_url();?>vendors/bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?=base_url();?>vendors/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?=base_url();?>vendors/themify-icons/css/themify-icons.css">
   <link rel="stylesheet" href="<?=base_url();?>vendors/flag-icon-css/css/flag-icon.min.css">
   <link rel="stylesheet" href="<?=base_url();?>vendors/selectFX/css/cs-skin-elastic.css">

   <!-- CSS -->
   <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">

   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                  <?php
                     if($this->session->flashdata('message')){
                        echo $this->session->flashdata('message');
                     }
                  ?>
                    <form  method="post" id="login" action="<?=site_url('login/authlogin');?>">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id='username' name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id='username' name="password">
                        </div>
                        <button type="submit" id='loginAction' class="btn btn-success btn-flat m-b-30 m-t-30">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   <!-- VENDOR JS -->
   <script src="<?=base_url();?>vendors/jquery/dist/jquery.min.js"></script>
   <script src="<?=base_url();?>vendors/popper.js/dist/umd/popper.min.js"></script>
   <script src="<?=base_url();?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>

   <!-- CUSTOM JS -->
   <script>
      $('form#login').submit(function(e){
         alert('Memproses login...');
      });
   </script>

   <!-- MAIN -->
   <script src="<?=base_url();?>assets/js/main.js"></script>

</body>

</html>
