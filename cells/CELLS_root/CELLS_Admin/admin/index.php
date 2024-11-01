<?php
ob_start();
session_start();
include '../koneksi.php';


// Check if the user is not logged in or doesn't have the 'admin' level
if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'admin') {
    // Redirect to the login page
    header("location: ./404.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Admin CELLS</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/upi.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/azzara.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
	<link rel="stylesheet" href="../assets/css/bg2.css">

	<!-- Add Cropper.js CSS and JS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

	<style>
		.image-container {
			max-width: 100%;
			position: relative;
		}

		.preview {
			max-width: 100%;
			overflow: hidden;
		}

		.preview-container {
			max-width: 100%;
			margin: 20px 0;
		}

		.cropper-container {
			margin: 20px 0;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" >
			<!-- Logo Header -->
			<div class="logo-header">
			<a href="?view=dashboard" class="logo">
        <img src="../assets/img/Logo_CELLS_UPI.png" alt="navbar brand" class="navbar-brand" width="100" height="55" style="margin-top: 3px;">

				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">

				<div class="container-fluid">
					<!-- <div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div> -->
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					<li class="nav-item dropdown hidden-caret">
							<!-- <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a> -->
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span>
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
												<div class="notif-content">
													<span class="block">
														Rahmad commented on Admin
													</span>
													<span class="time">12 minutes ago</span>
												</div>
											</a>
											<a href="#">
												<div class="notif-img">
													<img src="../assets/img/profile2.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="block">
														Reza send messages to you
													</span>
													<span class="time">12 minutes ago</span>
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
												<div class="notif-content">
													<span class="block">
														Farrah liked Admin
													</span>
													<span class="time">17 minutes ago</span>
												</div>
											</a>
										</div>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>


			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar" style="background-image: url('../assets/img/sidebar.png');" >

			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav">
						<li class="nav-item">
							<a href="?view=dashboard">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Fitur</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Kelola Data</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="?view=datacarousel">
											<span class="sub-item">Carousel</span>
										</a>
									</li>
									<li>
										<a href="?view=datahighlight">
											<span class="sub-item">Highlight</span>
										</a>
									</li>

									<li>
										<a href="?view=databerita">
											<span class="sub-item">Berita</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a href="?view=datauser">
								<i class="fas fa-briefcase"></i>
								<p>Data User</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?view=dataaboutus">
								<i class="fas fa-briefcase"></i>
								<p>Data Pegawai</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?view=datakonten">
								<i class="fas fa-briefcase"></i>
								<p>Open Lesson</p>
							</a>
						</li>

            <li class="nav-item">
							<a href="?view=datapartnet">
								<i class="fas fa-briefcase"></i>
								<p>Partner & Network</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="../logout.php">
								<i class="fas fa-lock"></i>
								<p>Logout</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<?php
                    // Dashboard
                    if(@$_GET['view']=='')
                        include 'dashboard.php';
                    elseif($_GET['view']=='dashboard')
                        include 'dashboard.php';

                    // Data Carousel
                    elseif($_GET['view']=='datacarousel')
                        include 'master/carousel/datacarousel.php';

                    // Data Highlight
                    elseif($_GET['view']=='datahighlight')
                        include 'master/highlight/datahighlight.php';

					// Data News
					elseif($_GET['view']=='databerita')
                        include 'master/berita/databerita.php';

					//Data User
					elseif($_GET['view']=='datauser')
                        include 'user/datauser.php';

					//Data About Us

                    // // Data Peminjaman Barang
                    // elseif($_GET['view']=='partnet')
                    //     include 'peminjaman/partnet.php';
                    // elseif($_GET['view']=='detailpinjambarang')
                    //     include '../user/peminjaman/barang/detailpinjambarang.php';

					// Data Peminjaman Ruangan
                    elseif($_GET['view']=='dataaboutus')
                        include 'aboutus/dataaboutus.php';
                    elseif($_GET['view']=='detailpinjamruangan')
                        include '../user/peminjaman/ruangan/detailpinjamruangan.php';

					// Data Konten
					elseif($_GET['view']=='datakonten')
					include 'membership/openles.php';


          // Data Konten
					elseif($_GET['view']=='datapartnet')
					include 'partnet/partnet.php';
          elseif ($_GET['view']=='partnet')
          include 'partnet/partnet.php';


                 ?>

		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Azzara JS -->
	<script src="../assets/js/ready.min.js"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>
	<script >
		$(document).ready(function() {
			$('#add-row').DataTable({
			});
		});
	</script>

	<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk menginisialisasi Cropper
    function initCropper(imageInput, preview, previewContainer, croppedDataInput) {
        let cropper;

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onload = function(event) {
                preview.src = event.target.result;
                previewContainer.style.display = 'block';

                if (cropper) {
                    cropper.destroy();
                }

                cropper = new Cropper(preview, {
                    aspectRatio: 16/9,
                    viewMode: 2,
                    crop: function(event) {
                        const canvas = this.cropper.getCroppedCanvas({
                            width: 1366,
                            height: 768
                        });
                        croppedDataInput.value = canvas.toDataURL();
                    }
                });
            };

            reader.readAsDataURL(file);
        });
    }

    // Inisialisasi untuk form tambah
    const addImageInput = document.getElementById('imageInput');
    const addPreview = document.getElementById('preview');
    const addPreviewContainer = document.getElementById('preview-container');
    const addCroppedData = document.getElementById('croppedData');

    if (addImageInput) {
        initCropper(addImageInput, addPreview, addPreviewContainer, addCroppedData);
    }

    // Inisialisasi untuk form edit
    document.querySelectorAll('.editCarouselForm').forEach(form => {
        const imageInput = form.querySelector('.imageInput');
        const preview = form.querySelector('.preview');
        const previewContainer = form.querySelector('.preview-container');
        const croppedData = form.querySelector('.croppedData');

        initCropper(imageInput, preview, previewContainer, croppedData);
    });
});
</script>
</body>
</html>
