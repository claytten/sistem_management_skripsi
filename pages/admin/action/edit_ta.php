<?php
include '../../../action/koneksi.php';
session_start();
if (empty($_SESSION["user_id"])) {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../../');
}
$id_ta = $_GET['id_ta'];
$nama_mhs = $_GET['nama'];
$nama_dosbing = $_GET['dosbing'];
$nama_iddosbing = $_GET['id_dosbing'];
$nim = $_GET['nim'];
$tema = $_GET['tema'];
$judul = $_GET['judul'];
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

    <link rel="stylesheet" href="../../../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../../vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../../../../assets/css/style.css">

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
                <a class="navbar-brand" href="../../../">Project</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="../../../"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Data</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Mahasiswa</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="../ta_mhs.php">Tugas Akhir</a></li>
                            <li><i class="fa fa-table"></i><a href="../sempro_mhs.php">Seminar Proposal</a></li>
                            <li><i class="fa fa-table"></i><a href="../sidang_mhs.php">Tugas Akhir</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="../mahasiswa.php">Mahasiswa</a></li>
                            <li><i class="fa fa-table"></i><a href="../dosen.php">Dosen</a></li>
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
                            <img class="user-avatar rounded-circle" src="../../../images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../../../action/logout.php"><i class="fa fa-power-off"></i> Logout</a>
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
                        <h1>Edit Tugas Akhir</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <form class="needs-validation" novalidate action="./aksi_edit_ta.php" method="post">
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="validationTooltip01">Name</label>
                  <input type="text" class="form-control" id="validationTooltip01" placeholder="Full Name" name="nama" value="<?php echo $nama_mhs?>"required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationTooltip01">NIM</label>
                  <input type="text" class="form-control" id="validationTooltip01" placeholder="NIM/NIDN"  name="nim" value="<?php echo $nim?>" required="required" autofocus="autofocus" readonly>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationTooltipUsername">Judul</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" name="judul" value="<?php echo $judul?>" required>
                    <div class="invalid-tooltip">
                      Please choose a unique and valid username.
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationTooltip01">Tema</label>
                  <input type="text" class="form-control" id="validationTooltip01" placeholder="Tema"  name="tema" value="<?php echo $tema?>" required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                    <label for="exampleInputPassword1">Dosen Pembimbing</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Dosen Pembimbing" name="pembimbing" value="<?php echo $nama_dosbing?>" required>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                    <label for="exampleInputPassword1">ID TA</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $id_ta?>" name ="id_ta" required="required" autofocus="autofocus" readonly>
                  </div>
                </div>
              </div>
              <input type="submit" name="aksi" class="btn btn-primary" value="edit">
            </form>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/main.js"></script>


    <script src="../../../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../../../../assets/js/dashboard.js"></script>
    <script src="../../../../assets/js/widgets.js"></script>
    <script src="../../../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
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
    <script type='text/javascript'>
    $(window).load(function(){
        $("#status").change(function() {
            console.log($("#status option:selected").val());
            if ($("#status option:selected").val() == 'mahasiswa') {
                $('#cek').removeAttr('required');
                $('#cek').prop('hidden', 'true');
            } else {
                $('#cek').attr('required', 'required');
                $('#cek').prop('hidden', false);
            }
        });
    });
</script>
</body>

</html>
