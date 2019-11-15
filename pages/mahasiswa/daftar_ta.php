<?php
include '../../action/koneksi.php';
session_start();
if (empty($_SESSION["user_id"])) {
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
  <link href="../../vendors/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../vendors/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../../assets/css/latest_posts.css" rel="stylesheet">
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

  <main id="main" class="section-bg" style="padding-bottom:200px">
    <article id="bidang">
      <div class="container">
        <header class="section-header">
          <h3 class="section-title">Formulir Tugas Akhir <br><?php echo $_SESSION['name']; ?></h3>
        </header>
        <section id="contact" class="section-bg wow fadeInUp">
          <div class="container">
            <div class="form">
              <form action="./action/aksi_daftar_ta.php" method="post">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" name="nim" class="form-control"  placeholder="Your Name"   value="<?php echo $_SESSION['nim'];?>" readonly required />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" name="nama" class="form-control" placeholder="Your Name"   value="<?php echo $_SESSION['name'];?>" readonly required />
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" name="id_dosbing" class="form-control"  placeholder="NIDN Dosen Pembimbing"   />
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" name="judul" class="form-control"  placeholder="Judul"   />
                  </div>
                </div>
                <div class="form-group">
                    <select class="form-control" name="tema" required>
                        <option class="hidden"  selected disabled>Please select your type!</option>
                        <?php
                        $query = "SELECT * FROM dosen"; $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                        while ($row = mysqli_fetch_array($result)) { ?>
                        <option value="<?php echo $row['nama_tema'];
                        ?>"><?php echo $row['nama_tema']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Daftarkan">
                </div>
              </form>
            </div>

          </div>
        </section>
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
  <script src="../../vendors/easing/easing.min.js"></script>
  <script src="../../vendors/superfish/hoverIntent.js"></script>
  <script src="../../vendors/superfish/superfish.min.js"></script>
  <script src="../../vendors/wow/wow.min.js"></script>
  <script src="../../vendors/waypoints/waypoints.min.js"></script>
  <script src="../../vendors/counterup/counterup.min.js"></script>
  <script src="../../vendors/owlcarousel/owl.carousel.min.js"></script>
  <script src="../../vendors/isotope/isotope.pkgd.min.js"></script>
  <script src="../../vendors/lightbox/js/lightbox.min.js"></script>
  <script src="../../vendors/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="../../vendors/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../../assets/js/main.js"></script>

</body>
</html>