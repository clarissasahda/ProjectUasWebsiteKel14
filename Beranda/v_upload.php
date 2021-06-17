<?php

require_once "m_forum.php";


$judul = $Input = "";
$judul_err = $Input_err = "";

// proses data waktu di submit
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // validasi Judul
    $input_judul = trim($_POST["judul"]);
    if(empty($input_judul)){
        $nama_err = "Masukkan judul...";
    } else{
        $judul = $input_judul;
    }

    // validasi Artikel
    $input_Input = trim($_POST["Input"]);
    if(empty($input_Input)){
        $Input_err = "Masukkan Artikel...";
    } else{
        $Input= $input_Input;
    }

    // Check input error
    if(empty($judul_err) && empty($Input_err)){

        $sql = "INSERT INTO forum (judul, Input) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $param_judul, $param_Input);

            // Set parameters
            $param_judul = $judul;
            $param_Input = $Input;


            if(mysqli_stmt_execute($stmt)){

                header("location: v_forum.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Upload - BerkahTani</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/BerkahTani.png" rel="icon">
  <link href="assets/img/BerkahTani.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Kelly - v4.3.0
  * Template URL: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
    label{
      font-size: 20pt;
      color: black;
    }
    h2{
      font-size: 25pt;
      color: black;
    }
</style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">BerkahTani</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="v_index.php">Home</a></li>
          <li><a href="v_about.php">About</a></li>
          <li><a href="v_forum.php">Forum</a></li>
          <li><a href="v_akun.php">Akun</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>

    </div>

  </header><!-- End Header -->

  <main id="main">
    <section>
    <!-- ======= Contact Section ======= -->
      <div class="wrapper position-relative">
          <div class="container-fluid ">
              <div class="row">
                  <div class="col-sm-12">

                          <center><h2>Tambah Kutipan</h2></center>
                          <br>
                          <br>
                          <br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($judul_err)) ? 'has-error' : ''; ?>">
                <center><label>Judul</label></center>
                <input placeholder="Input Judul..." type="text" name="judul" class="form-control" value="<?php echo $judul; ?>">
                <span class="help-block"><?php echo $judul_err;?></span>
            </div>
            <div class="pt-2 form-group <?php echo (!empty($Input_err)) ? 'has-error' : ''; ?>">
                <center><label>Artikel</label></center>
                <input placeholder="Input Artikel..." type="textarea" name="Input" class="form-control" value="<?php echo $Input; ?>">
                <!-- <textarea rows="10" placeholder="Input Artikel..." name="Input" class="form-control" value="<?php echo $Input; ?>"></textarea> -->
                <span class="help-block"><?php echo $Input_err;?></span>
            </div>
            <br>
            <br>
            <center>
            <div class="pt-4">
              <input type="submit" class="btn btn-primary " value="Submit">
              <a href="v_forum.php" class="btn btn-default">Cancel</a>
            </div>
            </center>

        </form>


      </div>  </div>  </div>  </div>
      </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>BerkahTani</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
