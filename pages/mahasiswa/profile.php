<?php
session_start();
include '../../action/koneksi.php';
if(empty($_SESSION["user_id"])) {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ASPI</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <!-- <link href="../../img/favicon.png" rel="icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../vendors/animate/animate.min.css" rel="stylesheet">
  <link href="../../vendors/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../../assets/css/latest_posts.css" rel="stylesheet">
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="../../index.php" class="scrollto"><?php echo $_SESSION['name']; ?></a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="../../index.php">Home</a></li>
          <li><a href="./index.php">Formulir</a></li>
          <li><a href="./profile.php">Berkas</a></li>
          <li><a href="../../action/logout.php">Logout</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <main id="main" class="section-bg">
    <!--==========================
      Latest News Section
    ============================-->
    <article id="bidang">
      <div class="container">
        <header class="section-header">
          <h3 class="section-title">Daftar Berkas Tugas Akhir</h3>
        </header>
        <div class="row bidang-container">
          <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h4>Data Tugas Akhir</h4>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="app">
                      <table id="datatable-responsive" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>ID TA</th>
                            <th>ID Mahasiswa</th>
                            <th>Nama</th>
                            <th>Judul</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $save = $_SESSION['nim'];
                            $query = "SELECT id_ta, id_mhs, mahasiswa.nama AS name, judul from ta,mahasiswa WHERE ta.id_mhs='$save' AND mahasiswa.nim='$save'";
                            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                            while ($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <tr>
                                    <td class="text-table"><?php echo $row['id_ta']; ?></td>
                                    <td class="text-table"><?php echo $row['id_mhs']; ?></td>
                                    <td class="text-table"><?php echo $row['name']; ?></td>
                                    <td class="text-table"><?php echo $row['judul']; ?></td>
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

          <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h4>Data Seminar Proposal</h4>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="app1">
                      <table id="datatable-responsive" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                              <th>NIM</th>
                              <th>Mahasiswa</th>
                              <th>Ruang</th>
                              <th>Tanggal</th>
                              <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                            $query = "SELECT nim, mahasiswa.nama AS name, jadwal.ruang,jadwal.datetime,acc_status from ta,mahasiswa,jadwal WHERE jadwal.jenis_jadwal ='sempro' AND ta.id_mhs='$save' AND mahasiswa.nim = '$save' AND ta.id_ta = jadwal.id_jadwal";
                            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                            while ($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <tr>
                                    <td class="text-table"><?php echo $row['nim']; ?></td>
                                    <td class="text-table"><?php echo $row['name']; ?></td>
                                    <td class="text-table"><?php echo $row['ruang']; ?></td>
                                    <td class="text-table"><?php echo $row['datetime']; ?></td>
                                    <td class="text-table"><?php echo $row['acc_status']; ?></td>
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

          <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h4>Data Sidang Akhir</h4>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content" id="app2">
                        <table id="datatable-responsive" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                                  <th>NIM</th>
                                  <th>Mahasiswa</th>
                                  <th>Ruang</th>
                                  <th>Nilai</th>
                                  <th>Tanggal</th>
                                  <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $query = "SELECT nim, nama, ruang,nilai,datetime, acc_status from ta,mahasiswa,jadwal WHERE jadwal.jenis_jadwal ='sidang' AND ta.id_mhs='$save' AND mahasiswa.nim = '$save' AND ta.id_ta = jadwal.id_jadwal ";
                              $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                              while ($row = mysqli_fetch_array($result))
                              {
                                  ?>
                                  <tr>
                                      <td class="text-table"><?php echo $row['nim']; ?></td>
                                      <td class="text-table"><?php echo $row['nama']; ?></td>
                                      <td class="text-table"><?php echo $row['ruang']; ?></td>
                                      <td class="text-table"><?php echo $row['nilai']; ?></td>
                                      <td class="text-table"><?php echo $row['datetime']; ?></td>
                                      <td class="text-table"><?php echo $row['acc_status']; ?></td>
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
        </div>
      </div>
    </article>

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; ASPI 2019 . All Rights Reserved
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="../../vendors/jquery/jquery.min.js"></script>
  <script src="../../vendors/jquery/jquery-migrate.min.js"></script>
  <script src="../../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendors/wow/wow.min.js"></script>
  <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../../assets/js/main.js"></script>

</body>
</html>
