<?php
include '../../action/koneksi.php';
session_start();
if (empty($_SESSION["user_id"])) {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../');
}
?>
<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
<?php
if(isset($_SESSION["errorMessage"])) {
    ?>
    <div style="padding: 7px 10px;
    background: #fff1f2;
    border: #ffd5da 1px solid;
    color: #d6001c;
    border-radius: 4px;
    margin: 30px 10px 10px 10px;">
    <?php echo $_SESSION["errorMessage"]; ?>
    </div>
    <?php
    unset($_SESSION["errorMessage"]);
}
elseif (isset($_SESSION["successMessage"])) {
?>
    <div style="padding: 7px 10px;
    background: #fff1f2;
    border: #ffd5da 1px solid;
    color: green;
    border-radius: 4px;
    margin: 30px 10px 10px 10px;">
        <?php echo $_SESSION["successMessage"]; ?>
    </div>
    <?php
    unset($_SESSION["successMessage"]);
}
?>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="../../">ASPI</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="../../"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        <a href="./register.php"><i class="menu-icon fa fa-user-plus"></i>Create Account </a>
                    </li>
                    <h3 class="menu-title">Data</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tugas Akhir</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="./ta_mhs.php">Tugas Akhir</a></li>
                            <li><i class="fa fa-table"></i><a href="./sempro_mhs.php">Seminar Proposal</a></li>
                            <li><i class="fa fa-table"></i><a href="./sidang_mhs.php">Tugas Akhir</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="./mahasiswa.php">Mahasiswa</a></li>
                            <li><i class="fa fa-table"></i><a href="./dosen.php">Dosen</a></li>
                        </ul>
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
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../../images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../../action/logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
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
        </div>

        <div class="content mt-3">
            <div style="display:flex">
                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 18rem; margin-right: 10px">
                  <img src="../../images/ta.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Tugas Akhir</h5>
                    <p class="card-text">Berisikan daftar laporan tugas akhir mahasiswa</p>
                    <a href="./ta_mhs.php" class="btn btn-primary">Klik Tugas Akhir</a>
                  </div>
                </div>

                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 18rem;margin-right: 10px">
                  <img src="../../images/sempro.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Seminar Proposal</h5>
                    <p class="card-text">Daftar mahasiswa yang mengajukan untuk mengadakan seminar.</p>
                    <a href="./sempro_mhs.php" class="btn btn-primary">Klik Seminar</a>
                  </div>
                </div>

                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 18rem;margin-right: 10px">
                  <img src="../../images/sidang.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Sidang Akhir</h5>
                    <p class="card-text">Berisikan jadwal sidang dan nilai untuk mahasiswa yang sudah menempung sidang akhir.</p>
                    <a href="./sidang_mhs.php" class="btn btn-primary">Klik Sidang</a>
                  </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>


    <script src="../../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/widgets.js"></script>
    <script src="../../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
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
