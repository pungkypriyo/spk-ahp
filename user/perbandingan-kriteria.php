<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Skripsi AHP | Data Kain</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="../images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="../images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="../index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Master</h3><!-- /.menu-title -->
                    <li>
                        <a href="#"> <i class="menu-icon ti-files"></i>Data Kain </a>
                    </li>
                    <li>
                        <a href="data-kain.php"> <i class="menu-icon fa fa-table"></i>Perhitungan </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                    <a href="../page-login.php" class="btn btn-outline-secondary">Login Admin</a>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Pilih Data Motif</a></li>
                            <li class="active">Perbandingan Kriteria</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Perbandingan Kriteria</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="text-align:center;">
                                    <thead>
										<tr>
											<th>No</th>
											<th>Nama Kriteria</th>
											<th>Pilih Nilai</th>
											<th>Nama Kriteria</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Jenis Bahan</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Tipe Benang</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Jenis Bahan</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Corak Kain</td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Jenis Bahan</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Kualitas Daya Serap</td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Jenis Bahan</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Grade Kain</td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>Jenis Bahan</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Kategori Pengguna</td>
                                        </tr>
                                        <tr>
                                            <td>6.</td>
                                            <td>Tipe Benang</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Corak Kain</td>
                                        </tr>
                                        <tr>
                                            <td>7.</td>
                                            <td>Tipe Benang</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Kualitas Daya Serap</td>
                                        </tr>
                                        <tr>
                                            <td>8.</td>
                                            <td>Tipe Benang</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Grade Kain</td>
                                        </tr>
                                        <tr>
                                            <td>9.</td>
                                            <td>Tipe Benang</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Kategori Pengguna</td>
                                        </tr>
                                        <tr>
                                            <td>10.</td>
                                            <td>Corak Kain</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Kualitas Daya Serap</td>
                                        </tr>
                                        <tr>
                                            <td>11.</td>
                                            <td>Corak Kain</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Grade Kain</td>
                                        </tr>
                                        <tr>
                                            <td>12.</td>
                                            <td>Corak Kain</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Kategori Pengguna</td>
                                        </tr>
                                        <tr>
                                            <td>13.</td>
                                            <td>Kualitas Daya Serap</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Grade Kain</td>
                                        </tr>
                                        <tr>
                                            <td>14.</td>
                                            <td>Kualitas Daya Serap</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Kategori Pengguna</td>
                                        </tr>
                                        <tr>
                                            <td>15.</td>
                                            <td>Grade Kain</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">9</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">1</button>
                                            <button type="button" class="btn btn-primary btn-sm">2</button>
                                            <button type="button" class="btn btn-primary btn-sm">3</button>
                                            <button type="button" class="btn btn-primary btn-sm">4</button>
                                            <button type="button" class="btn btn-primary btn-sm">5</button>
                                            <button type="button" class="btn btn-primary btn-sm">6</button>
                                            <button type="button" class="btn btn-primary btn-sm">7</button>
                                            <button type="button" class="btn btn-primary btn-sm">8</button>
                                            <button type="button" class="btn btn-primary btn-sm">9</button></td>
                                            <td>Kategori Pengguna</td>
                                        </tr>
									</thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success"><i class="ti-angle-right"></i>&nbsp; Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


    <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/widgets.js"></script>
    <script src="../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
