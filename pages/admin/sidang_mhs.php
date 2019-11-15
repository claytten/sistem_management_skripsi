<?php
session_start();
include '../../action/koneksi.php';
if(empty($_SESSION["user_id"])) {
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
    <title>List Management Sidang Akhir Mahasiswa</title>
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
    <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="../../assets/css/style.css">

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
                <a class="navbar-brand" href="../../">Project</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="../../"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        <a href="./register.php"><i class="menu-icon fa fa-user-plus"></i>Create Account </a>
                    </li>
                    <h3 class="menu-title">Data</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Mahasiswa</a>
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
                        <h1>Management List Sidang Akhir Mahasiswa</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_content" id="app">
                        <table id="datatable-responsive" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Mahasiswa</th>
                                <th>Ruang</th>
                                <th>Judul</th>
                                <th>Nilai</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $query = "SELECT tema,judul, ta.id_ta, idx, nim, mahasiswa.nama AS name, ruang, datetime, acc_status, nilai from ta, mahasiswa, jadwal WHERE id_mhs=nim AND id_jadwal=id_ta AND jenis_jadwal='sidang';";
                              $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                              while ($row = mysqli_fetch_array($result))
                              {
                                  ?>
                                  <tr>
                                      <td class="text-table"><?php echo $row['nim']; ?></td>
                                      <td class="text-table"><?php echo $row['name']; ?></td>
                                      <td class="text-table"><?php echo $row['ruang']; ?></td>
                                      <td class="text-table"><?php echo $row['judul']; ?></td>
                                      <td class="text-table"><?php echo $row['nilai']; ?></td>
                                      <td class="text-table"><?php echo $row['datetime']; ?></td>
                                      <td class="text-table"><?php echo $row['acc_status']; ?></td>
                                      <td class="text-table">
                                          <!-- <a href="#" title="">
                                              <i class="fa fa-file" aria-hidden="true"></i>
                                          </a> -->
                                          <a href="action/edit_sidang.php?idx=<?php echo $row['idx']; ?>&nim=<?php echo $row['nim']; ?>&name=<?php echo $row['name']; ?>&datetime=<?php echo $row['datetime']; ?>&ruang=<?php echo $row['ruang']; ?>&status=<?php echo $row['acc_status']; ?>&nama_dosbing=<?php echo $row['nama']; ?>&id_dosbing=<?php echo $row['id_dosbing']?>&nilai=<?php echo $row['nilai'] ?>&id_ta=<?php echo $row['id_ta'] ?>&tema=<?php echo $row['tema'] ?>" title="">
                                              <i class="fa fa-edit"></i>
                                          </a>
                                          <a href="action/aksi_edit_sidang.php?idx=<?php echo $row['idx']; ?>&aksi=delete" title="">
                                              <i class="fa fa-trash"></i>
                                          </a>
                                      </td>
                                  </tr>
                                  <?php
                              }
                              ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                <div class="clearfix"></div>
              </div>
            </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
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
    <script src="../../assets/js/custom.min.js"></script>

</body>

</html>
