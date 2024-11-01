<?php
require 'koneksi.php';

if (isset($_GET['id_projek'])) {
    $id_projek = $_GET['id_projek'];

    // Mengambil data berdasarkan id_projek
    $sql = "SELECT * FROM projek WHERE id_projek = '$id_projek'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
        $nama_projek = $data['nama_projek'];
        $sampul = $data['sampul'];
        $news = $data['news'];
        $gambar1 = $data['gambar1'];
        $gambar = $data['gambar2'];
        $gambar3 = $data['gambar3'];
        $capt1 = $data['capt1'];
        $capt2 = $data['capt2'];
        $capt3 = $data['capt3'];
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID projek tidak ditemukan.";
}
?>


<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CELLS UPI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        /* Mengatur margin dan padding dasar */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        /* Gambar Besar di bagian atas */
        .header-image img {
            width: 35%;
            height: auto;
            display: block;
            margin: 20px auto; /* Agar gambar berada di tengah */
            border-radius: 2%; /* Membuat gambar melingkar sempurna */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.4); /* Memberikan shadow */
            object-fit: cover; /* Menjaga rasio tanpa merusak gambar */
        }

        /* Judul */
        .title {
            text-align: center;
            margin: 20px 0;
        }

        .title h1 {
            font-size: 24px;
            font-weight: bold;
        }

        /* Paragraf */
        .content {
            width: 80%;
            margin: 0 auto;
            text-align: justify;
        }

        .content p {
            margin-bottom: 20px;
        }

        /* Gallery */
        .gallery {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 40px 0;
        }

        .gallery-item {
            text-align: center;
        }

        .gallery-item img {
            width: 200px;
            height: auto;
            display: block;
            margin-bottom: 10px;
            border-radius: 15%; /* Menambahkan border radius pada gambar di gallery */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.4); /* Memberikan shadow pada gambar gallery */
        }
    </style>

  </head>
  <body>
    <?php include "header.php" ?>

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-lg-10 text-center">
            <h1 class="display-3 text-white animated slideInDown">Our Project</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Project -->

    <!-- Gambar Besar -->
    <div class="header-image">
        <img src="./CELLS_Admin/img/<?=$sampul?>" alt="Header Image" <?=$nama_projek?>>
    </div>

    <!-- Judul -->
    <div class="title">
        <h1><?=$nama_projek?></h1>
    </div>

    <!-- Paragraf -->
    <div class="content">
        <p<?=$news?></p>
    <!-- Gambar Kecil dengan Caption -->
    <div class="gallery">
        <div class="gallery-item">
            <img src="./CELLS_Admin/img/<?=$gambar1?>" alt="caption gambar 1">
            <p><?=$capt1?></p>
        </div>
        <div class="gallery-item">
            <img src="./CELLS_Admin/img/<?=$gambar2?>" alt="caption gambar 2">
            <p><?=$capt2?></p>
        </div>
        <div class="gallery-item">
            <img src="./CELLS_Admin/img/<?=$gambar3?>" alt="caption gambar 3">
            <p><?=$capt3?></p>
        </div>
    </div>

    <!-- End Project -->




    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-3 col-md-6">
            <h4 class="text-white mb-3">Quick Link</h4>
            <a class="btn btn-link" href="about_us.html">About Us</a>
            <a class="btn btn-link" href="projects.html">Projects</a>
            <a class="btn btn-link" href="publication.html">Publication</a>
            <a class="btn btn-link" href="partner_and_network.html">Partner and Network</a>
            <a class="btn btn-link" href="vacancies.html">Vacancies</a>
          </div>

          <div class="col-lg-3 col-md-6">
            <h4 class="text-white mb-3"><a href="contact.html" class="contact-href">Contact</a></h4>
            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Dr. Setiabudhi No. 229, Bandung, West Java, Indonesia</p>
            <p class="mb-2"><i class="fa fa-envelope me-3"></i><a href="mailto:admin_cells@upi.edu" target="_blank" class="custom-email">admin_cells@upi.edu</a></p>
            <div class="d-flex pt-2">
    					<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
    					<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h4 class="text-white mb-3">Gallery</h4>
            <div class="row g-2 pt-2">
              <div class="col-4">
                <img class="img-fluid bg-light p-1" src="img/Non_Degree_Training_1.jpg" alt="Non-Degree Training Overseas Program Immerses Indonesian Academics in Japanese Education Practices">
              </div>
              <div class="col-4">
                <img class="img-fluid bg-light p-1" src="img/Indonesian_Teacher_Assemble_1.png" alt="Indonesian Teachers Assemble: STEM Leadership Workshop Focuses on Building 21st Century Skills">
              </div>
              <div class="col-4">
                <img class="img-fluid bg-light p-1" src="img/Envisioning_New_Frontiers_1.jpg" alt="Envisioning New Frontiers: CELLS-DIPUU UPI and UIII’s Partnership Takes Shape">
              </div>
              <div class="col-4">
                <img class="img-fluid bg-light p-1" src="img/Global_Insights_Unleashed_1.jpg" alt="Global Insights Unleashed: Streaming Lesson Study Workshop with Japan’s IDCJ">
              </div>
              <div class="col-4">
                <img class="img-fluid bg-light p-1" src="img/Southeast_Asia_Workshop_1.jpg" alt="SOUTHEAST ASIA (SEA) WORKSHOP: Professional Learning Community Through Lesson Study">
              </div>
              <div class="col-4">
                <img class="img-fluid bg-light p-1" src="img/Southeast_Asia_Workshop_2.jpg" alt="SOUTHEAST ASIA (SEA) WORKSHOP: Professional Learning Community Through Lesson Study">
              </div>
            </div>
          </div>
  				<div class="col-lg-3 col-md-6">
  					<h4 class="text-white mb-3">Visitor Counter</h4>
  					<!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
  <!-- Histats.com  START  (aync)-->
  <script type="text/javascript">var _Hasync= _Hasync|| [];
  _Hasync.push(['Histats.start', '1,4891304,4,424,112,75,00011111']);
  _Hasync.push(['Histats.fasi', '1']);
  _Hasync.push(['Histats.track_hits', '']);
  (function() {
  var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
  hs.src = ('//s10.histats.com/js15_as.js');
  (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
  })();</script>
  <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4891304&101" alt="" border="0"></a></noscript>
  <!-- Histats.com  END  -->
  				</div>
        </div>
      </div>
          <div class="container">
              <div class="copyright">
                  <div class="row">
                      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                          &copy; <a class="border-bottom" href="#">CELLS UPI</a>, All Right Reserved.

                          <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                          Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </body>
</html>
