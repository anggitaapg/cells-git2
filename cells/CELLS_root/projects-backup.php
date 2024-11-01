<?php
require 'koneksi.php';
// echo "./CELLS_Admin/img/".$Foto;

$sql = "SELECT * FROM projek ORDER BY sampul DESC";
 ?>
<!DOCTYPE html>
<html lang="en">

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
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <head>
    <style>
    .fixed-size {
      width: 100%; /* Lebar mengikuti card */
      height: 200px; /* Tinggi tetap */
      object-fit: cover; /* Gambar tetap pada proporsi dan menutupi area dengan crop */
      }
        }
    </style>
</head>

</head>

<body>
    <?php include "header.php" ?>

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Projects</h1>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
      // Mengambil data "Board of projek"
      $sql = "SELECT * FROM projek ORDER BY id_projek ASC";
      $result = mysqli_query($koneksi, $sql);

      if (mysqli_num_rows($result) > 0) {
          while($data = mysqli_fetch_array($result)) {
              $nama_projek = $data['nama_projek'];
              $caption = $data['caption'];
              $sampul = $data['sampul'];

              // Memotong caption jika lebih dari 130 karakter
              if (strlen($caption) > 130) {
                  $caption = substr($caption, 0, 125) . '...';
              }
      ?>
      <div class="col-md-4 d-flex">
          <div class="card cardpro h-100 flex-fill">
              <img src="CELLS_Admin/img/projek<?=$sampul?>" class="img-fluid img-team fixed-size" alt="Foto <?=$nama_projek?>">
              <div class="card-body">
                  <h5 class="card-title"><?=$nama_projek?></h5>
                  <p class="card-text"><?=$caption?></p>
              </div>
          </div>
      </div>
      <?php
          }
      } else {
          echo "<p>Tidak ada data projek</p>";
      }
      ?>
  </div>
</div>

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
<!--

                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><a href="tel:+4733378901">+012 345 67890</p>

-->
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


<!--
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
-->

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

<!--
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FAQs</a>
                        </div>
                    </div>
-->

                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
