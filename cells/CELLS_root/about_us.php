<?php
require 'koneksi.php';
// echo "./CELLS_Admin/admin/aboutus/team/".$Foto;

$sql = "SELECT * FROM about_us ORDER BY Foto DESC";
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

    <style>
    .card-team {
            border-radius: 5%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          }
    .img-team{
      margin-top: 3px; /* Atur jarak atas */
          margin-left: 1px; /* Atur jarak kiri */
          width: 100%; /* Masih mempertahankan gambar responsif */
          object-fit: cover;
          border-radius: 20%;

    }
    .btn{
      border-radius: 5%;
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
          <h1 class="display-3 text-white animated slideInDown">About Us</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- Header End -->

  <!-- About Us -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
          <h6 class="section-title bg-white text-center text-primary px-3">About Us</h6>
          <br>
          <h1 class="mb-5">Center for Excellences of Lesson and Learning Studies (CELLS) UPI</h1>
          <p>CELLS is a center of excellence that was established by Universitas Pendidikan Indonesia in 2023 to develop, implement, and downstream the innovation product in creating the networking of learning improvement related to lesson and learning studies in Asia and Africa.</p>
          <br>
        </div>

<!-- Team -->
<!-- Trustees -->
        <?php
        // Mengambil data "Board of Trustees"
        $sql = "SELECT * FROM about_us WHERE kategori = 'Trustees' ORDER BY id_team ASC";
        $result = mysqli_query($koneksi, $sql);
        ?>

        <h1 class="mb-5">Board of Trustees</h1>

        <?php
        if (mysqli_num_rows($result) > 0) {
        while($data = mysqli_fetch_array($result)) {
          $nama = $data['nama'];
          $jabatan = $data['jabatan'];
          $Foto = $data['Foto'];
        ?>
        <div class="col-md-4 d-flex">
          <div class="card mb-3 flex-fill bg-light card-team">
              <div class="row g-0">
                  <div class="overflow-hidden col-md-4">
                    <img src="./CELLS_Admin/admin/aboutus/team/<?=$Foto?>" class="img-fluid img-team" alt="Foto <?=$nama?>">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title"><?=$nama?></h5>
                          <p class="card-text"><?=$jabatan?></p>

                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSelengkapnnya"
                          data-nama="<?=$nama?>"
                          data-jabatan="<?=$jabatan?>"
                          data-foto="./CELLS_Admin/admin/aboutus/team/<?=$Foto?>"
                          data-periode="<?=$data['periode']?>"
                          data-linkedin="<?=$data['linkedin']?>"
                          data-cv="<?=$data['cv']?>"
                          data-email="<?=$data['email']?>">Selengkapnya</button>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <?php
        }
        } else {
        echo "<p>Tidak ada data Trustees.</p>";
        }
        ?>

<!-- Advisor -->
        <?php
        // Mengambil data "Board of Executive"
        $sql = "SELECT * FROM about_us WHERE kategori = 'Advisor' ORDER BY id_team ASC";
        $result = mysqli_query($koneksi, $sql);
        ?>

        <h1 class="mb-5">Advisor</h1>

        <?php
        if (mysqli_num_rows($result) > 0) {
        while($data = mysqli_fetch_array($result)) {
          $nama = $data['nama'];
          $jabatan = $data['jabatan'];
          $Foto = $data['Foto'];
        ?>
        <div class="col-md-4 d-flex">
          <div class="card mb-3 flex-fill bg-light card-team">
              <div class="row g-0">
                  <div class="overflow-hidden col-md-4">
                      <img src="./CELLS_Admin/admin/aboutus/team//<?=$Foto?>" class="img-fluid img-team" alt="Foto <?=$nama?>">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title"><?=$nama?></h5>
                          <p class="card-text"><?=$jabatan?></p>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSelengkapnnya"
                          data-nama="<?=$nama?>"
                          data-jabatan="<?=$jabatan?>"
                          data-foto="./CELLS_Admin/admin/aboutus/team/<?=$Foto?>"
                          data-periode="<?=$data['periode']?>"
                          data-linkedin="<?=$data['linkedin']?>"
                          data-cv="<?=$data['cv']?>"
                          data-email="<?=$data['email']?>">Selengkapnya</button>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <?php
        }
        } else {
        echo "<p>Tidak ada data Advisor.</p>";
        }
        ?>

<!-- Board of Executive -->
        <?php
        // Mengambil data "Board of Executive"
        $sql = "SELECT * FROM about_us WHERE kategori = 'Executive' ORDER BY id_team ASC";
        $result = mysqli_query($koneksi, $sql);
        ?>

        <h1 class="mb-5">Board of Executive</h1>

        <?php
        if (mysqli_num_rows($result) > 0) {
        while($data = mysqli_fetch_array($result)) {
          $nama = $data['nama'];
          $jabatan = $data['jabatan'];
          $Foto = $data['Foto'];
        ?>
        <div class="col-md-4 d-flex">
          <div class="card mb-3 flex-fill bg-light card-team">
              <div class="row g-0">
                  <div class="overflow-hidden col-md-4">
                      <img src="./CELLS_Admin/admin/aboutus/team/<?=$Foto?>" class="img-fluid img-team" alt="Foto <?=$nama?>">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title"><?=$nama?></h5>
                          <p class="card-text"><?=$jabatan?></p>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSelengkapnnya"
                          data-nama="<?=$nama?>"
                          data-jabatan="<?=$jabatan?>"
                          data-foto="./CELLS_Admin/admin/aboutus/team/<?=$Foto?>"
                          data-periode="<?=$data['periode']?>"
                          data-linkedin="<?=$data['linkedin']?>"
                          data-cv="<?=$data['cv']?>"
                          data-email="<?=$data['email']?>">Selengkapnya</button>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <?php
        }
        } else {
        echo "<p>Tidak ada data Executive.</p>";
        }
        ?>

<!-- Intern Members -->
        <?php
        // Mengambil data "Intern Members"
        $sql = "SELECT * FROM about_us WHERE kategori = 'Intern' ORDER BY id_team ASC";
        $result = mysqli_query($koneksi, $sql);
        ?>

            <h1 class="mb-5">Intern Members</h1>

            <?php
            if (mysqli_num_rows($result) > 0) {
            while($data = mysqli_fetch_array($result)) {
                $nama = $data['nama'];
                $jabatan = $data['jabatan'];
                $Foto = $data['Foto'];
            ?>
            <div class="col-md-4 d-flex">
                <div class="card mb-3 flex-fill bg-light card-team">
                    <div class="row g-0">
                        <div class="overflow-hidden col-md-4">
                            <img src="./CELLS_Admin/admin/aboutus/team/<?=$Foto?>" class="img-fluid img-team" alt="Foto <?=$nama?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?=$nama?></h5>
                                <p class="card-text"><?=$jabatan?></p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSelengkapnnya"
                                data-nama="<?=$nama?>"
                                data-jabatan="<?=$jabatan?>"
                                data-foto="./CELLS_Admin/admin/aboutus/team/<?=$Foto?>"
                                data-periode="<?=$data['periode']?>"
                                data-linkedin="<?=$data['linkedin']?>"
                                data-cv="<?=$data['cv']?>"
                                data-email="<?=$data['email']?>">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            } else {
            echo "<p>Tidak ada data Intern Members.</p>";
            }
            ?>

      </div>
    </div>
  </div>

<!-- Modal selengkapnya-->
<div class="modal fade" id="modalSelengkapnnya" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Detail Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalFoto" src="" class="img-fluid rounded-start mb-3" alt="Foto" width="150px">
                <h5 id="modalNama" class="card-title">Nama</h5>
                <p id="modalJabatan" class="card-text">Jabatan</p>
                <p id="modalPeriode" class="card-text">Periode</p>
                <a id="modalLinkedin" href="#" target="_blank" class="btn btn-primary">LinkedIn</a>
                <a id="modalCV" href="#" target="_blank" class="btn btn-primary">CV</a>
                <a id="modalEmail" href="#" class="btn btn-primary">Email</a>
            </div>
        </div>
    </div>
</div>




  <!-- <div class="modal fade" id="modalSelengkapnnya" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img src="./CELLS_Admin/admin/aboutus/team/" class="img-fluid rounded-start" alt="..." width="100px" height="100px">
          <h5 class="card-title">Nama Lengkap</h5>
          <p class="card-text">Jabatan</p>
          <p class="card-text">Periode</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Linkedin</button>
          <button type="button" class="btn btn-primary">CV</button>
          <button type="button" class="btn btn-primary" class="">Email</button>
        </div>
      </div>
    </div>
  </div> -->
  <!-- End Modal -->

<!-- Team setelah end -->


  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg-3 col-md-6">
          <h4 class="text-white mb-3">Quick Link</h4>
          <a class="btn btn-link" href="about_us.php">About Us</a>
          <a class="btn btn-link" href="projects.php">Projects</a>
          <a class="btn btn-link" href="publication.php">Publication</a>
          <a class="btn btn-link" href="partner_and_network.php">Partner and Network</a>
          <a class="btn btn-link" href="vacancies.php">Vacancies</a>
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
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- untuk Modal Selengkapnya -->
    <script>
        // Saat modal akan ditampilkan
        var modalSelengkapnnya = document.getElementById('modalSelengkapnnya');
        modalSelengkapnnya.addEventListener('show.bs.modal', function (event) {
            // Tombol yang diklik
            var button = event.relatedTarget;

            // Ambil data dari tombol
            var nama = button.getAttribute('data-nama');
            var jabatan = button.getAttribute('data-jabatan');
            var Foto = button.getAttribute('data-foto');
            var periode = button.getAttribute('data-periode');
            var linkedin = button.getAttribute('data-linkedin');
            var cv = button.getAttribute('data-cv');
            var email = button.getAttribute('data-email');

            // Update konten modal
            document.getElementById('modalNama').textContent = nama;
            document.getElementById('modalJabatan').textContent = jabatan;
            document.getElementById('modalFoto').src = Foto;
            document.getElementById('modalPeriode').textContent = periode;
            document.getElementById('modalLinkedin').href = linkedin;
            document.getElementById('modalCV').href = cv;
            document.getElementById('modalEmail').href = 'mailto:' + email;
        });
    </script>


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
