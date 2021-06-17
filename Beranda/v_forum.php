<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forum - BerkahTani</title>
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
          <li><a class="active" href="v_forum.php">Forum</a></li>
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
    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Forum Tani</h2>
          <p>
            Forum Tani merupakan wadah untuk menampung semua pendapat, saran, kritik, dan tips - tips seputar pertanian.
            Mari semua kita disini saling berbagi ilmu agar pertanian Indonesia semakin menabur berkah.
          </p>
        </div>
        <div class="content-wrapper">
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Kutipan tersedia</h3>
                <a href="v_upload.php" class="btn btn-success ">Upload Artikel Baru</a>
            </div>
            <br>
            <br>
            <div class="container">

                  <?php

                  require_once "m_forum.php";

                  // memasukkan data
                  $sql = "SELECT * FROM forum ORDER BY Id DESC";
                  if($result = mysqli_query($link, $sql)){
                      if(mysqli_num_rows($result) > 0){

                          echo "<table class='table table-bordered table-striped '>";
                              echo "<thead>";
                                  echo "<tr>";
                                      echo "<th>No</th>";
                                      echo "<th>Judul</th>";
                                      echo "<th>Kutipan</th>";
                                      echo "<th>Action</th>";
                                  echo "</tr>";
                              echo "</thead>";
                              echo "<tbody>";
                              //set counter variable
                              $counter = 1;
                              while($row = mysqli_fetch_array($result)){
                                  echo "<tr>";
                                      echo "<td>" . $counter . "</td>";
                                      echo "<td>" . $row['judul'] . "</td>";
                                      echo "<td>" . $row['Input'] . "</td>";
                                      echo "<td>";
                                          echo "<button type='button' class='btn btn-success'><a class='text-dark' href='v_artikel.php?Id=". $row['Id'] ."?>'><span >Show</span></a></button>";
                                          echo "<button type='button' class='btn btn-primary'><a class='text-dark' href='c_editArtikel.php?id=". $row['Id'] ."'><span>Update</span></a></button>";
                                          echo "<button type='button' class='btn btn-danger'><a class='text-dark' href='c_deleteArtikel.php?id=". $row['Id'] ."'><span >Delete</span></a></button>";
                                      echo "</td>";
                                  echo "</tr>";
                                  $counter++; //increment counter by 1 on every pass
                              }
                              echo "</tbody>";
                          echo "</table>";

                          mysqli_free_result($result);
                      } else{
                          echo "<p class='lead'><em>No records were found.</em></p>";
                      }
                  } else{
                      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                  }


                  mysqli_close($link);
                  ?>


      </section>
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
