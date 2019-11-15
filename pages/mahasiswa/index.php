<?php
session_start();
if(empty($_SESSION["user_id"])) {
    $_SESSION["errorMessage"] = "Please Login";
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
    <article id="bidang">
      <div class="container">
        <header class="section-header">
          <h3 class="section-title">Formulir Pendaftaran Tugas Akhir</h3>
        </header>
        <div class="row bidang-container">
          <div class="col-lg-4 col-md-6 bidang-item">
            <div class="bidang-wrap">
              <figure>
                <img src="../../images/ta.jpeg" class="img-fluid" alt="">
              </figure>

              <div class="bidang-info">
                <h4>
                    <a href="./daftar_ta.php" onclick="cek_status('cek_ta')">Formulir Tugas Akhir</a>
                </h4>
                <p>
                  Silahkan melengkapi formulit tugas akhir yang ada sesuai dengan ketentuan pedoman alur tugas akhir.
                </p>
                <div class="arrow">
                <a href="./daftar_ta.php" onclick="cek_status('cek_ta')"><span class="label label-info">Read More</span></a>
              </div>
              </div>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 bidang-item">
            <div class="bidang-wrap">
              <figure>
                <img src="../../images/sempro.jpeg" class="img-fluid" alt="">
              </figure>

              <div class="bidang-info">
                <h4><a href="./daftar_sempro.php" onclick="cek_status('cek_sempro')">Formulir Seminar Proposal</a></h4>
                <p>
                  Setelah anda melakukan pendaftaran formulir tugas akhir maka silahkan dikerjakan sesuai dengan ide anda lalu apabila anda
                  sudah siap maka silahkan mengajukan Seminar Proposal. Berikut merupakan formulir seminar proposal.
                </p>
                <div class="arrow">
                <a href="./daftar_sempro.php" onclick="cek_status('cek_sempro')"><span class="label label-info">Read More</span></a>
              </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 bidang-item">
            <div class="bidang-wrap">
              <figure>
                <img src="../../images/sidang.jpeg" class="img-fluid" alt="">
              </figure>

              <div class="bidang-info">
                <h4>
                    <a href="./daftar_sidang.php" onclick="cek_status('cek_sidang')">Formulir Sidang Akhir</a>
                </h4>
                <p>
                  Selamat bagi anda yang sudah menyelesaikan proses seminar proposal namun bagi anda yang belum sampai tahap selesai seminar proposal maka jangan melanjutkan ke tahap selanjutnya.
                </p>
                <div class="arrow">
                <a href="./daftar_sidang.php" onclick="cek_status('cek_sidang')"><span class="label label-info">Read More</span></a>
              </div>
              </div>
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

  <!-- Template Main Javascript File -->
  <script src="../../assets/js/main.js"></script>
  <script>
    function cek_status(statusParam) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'aksi_cek_status.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                //alert(xhr.responseText);
                //alert(typeof xhr.responseText);
                let result = JSON.parse(xhr.responseText);
                switch (statusParam) {
                    case 'cek_ta':
                        if (result['status'] === true) {
                            alert("Kamu udah ngambil TA!");
                            window.location.href = './index.php';
                        }
                        else window.location.href = 'daftar_ta.php';
                        break;
                    case 'cek_sempro':
                        if (result['status'] === true && result['acc'] === true){
                            alert("Kamu dah ngajuin Sempro dan dah di ACC");
                            window.location.href='./index.php';
                        } 
                        else if (result['status'] === true && result['acc'] === false) {
                            alert("Kamu dah ngajuin Sempro dan belum di ACC");
                            window.location.href='./index.php';
                        }
                        else window.location.href = 'daftar_sempro.php';
                        break;
                    case 'cek_sidang':
                        if (result['status'] === true && result['acc'] === true){
                            alert("Kamu dah ngajuin Sidang dan dah di ACC");
                            window.location.href='./index.php';
                        } 
                        else if (result['status'] === true && result['acc'] === false) {
                            alert("Kamu dah ngajuin Sidang dan belum di ACC");
                            window.location.href='./index.php';
                        }
                        else window.location.href = 'daftar_sidang.php';
                        break;
                }
            }
        };
        xhr.send('status_param='+statusParam);
    }
    </script>

</body>
</html>