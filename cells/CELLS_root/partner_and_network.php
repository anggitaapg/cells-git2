<?php
require 'koneksi.php';
// echo "./CELLS_Admin/img/".$Foto;

$sql = "SELECT * FROM partnet ORDER BY logo DESC";
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

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include "header.php" ?>


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Partner and Network</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Partner and Network Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Partner and Network</h6>
            <h1 class="mb-5">Our Partner and Network</h1>
        </div>

        <div class="owl-carousel testimonial-carousel position-relative">
            <?php
            // Koneksi ke database
            require 'koneksi.php';

            // Query untuk mengambil data dari tabel partnet
            $result = mysqli_query($koneksi, "SELECT logo, nama_partnet, nama_partnet2, instansi FROM partnet");

            // Cek apakah ada data
            if (mysqli_num_rows($result) > 0) {
                // Loop melalui setiap baris data
                while ($row = mysqli_fetch_assoc($result)) {
                    $logo = $row['logo'];
                    $nama_partnet = $row['nama_partnet'];
                    $nama_partnet2 = $row['nama_partnet2'];
                    $instansi = $row['instansi'];
            ?>
                    <div class="testimonial-item text-center">
                        <img src="CELLS_Admin/img/logo/<?=$logo?>" alt="<?=$nama_partnet?> Logo" width="100" height="100">
                        <h5 class="mb-0"><?=$nama_partnet?></h5>
                        <h5 class="mb-0"><?=$nama_partnet2?></h5>
                        <p><?=$instansi?></p>
                    </div>
            <?php
                }
            } else {
                echo "<p>Tidak ada data partner dan network yang ditemukan.</p>";
            }
            ?>
        </div>
    </div>
</div>

    <!-- Partner and Network End -->


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
