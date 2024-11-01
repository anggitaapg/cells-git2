<?php
session_start();

// Check if the user is not logged in or doesn't have the 'admin' level
if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'admin') {
    // Redirect to the login page
    header("location: ./404.html");
    exit();
}

date_default_timezone_set('Asia/Jakarta');

// Get the current date and time
$currentDateTime = date('Y-m-d H:i:s');

include '../koneksi.php';

$query = mysqli_query($conn, 'SELECT count(*) as highlights from highlights');
$row = mysqli_fetch_array($query);

$p = mysqli_query($conn, 'SELECT count(*) as slides from slides');
$q = mysqli_fetch_array($p);

$key = mysqli_query($conn, 'SELECT count(*) as user from user');
$b = mysqli_fetch_array($key);

$r = mysqli_query($conn, 'SELECT count(*) as about_us from about_us');
$d = mysqli_fetch_array($r);

$t = mysqli_query($conn, 'SELECT count(*) as news from news');
$z = mysqli_fetch_array($t);

$v = mysqli_query($conn, 'SELECT count(*) as konten from konten');
$w = mysqli_fetch_array($v);

$a = mysqli_query($conn, 'SELECT count(*) as partnet from partnet');
$e = mysqli_fetch_array($a);
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
				<div class="row">
						<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-users"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category" style="color: white">Data User</p>
												<h4 class="card-title" style="color: white" ><?php echo $b['user'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-check-circle"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category" style="color: white"; >Carousel</p>
												<h4 class="card-title"style="color: white" ><?php echo $q['slides'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon"c:\xampp\htdocs\cells-git\cells\CELLS_root\CELLS_Admin\img\slides\1730168126.png c:\xampp\htdocs\cells-git\cells\CELLS_root\CELLS_Admin\img\slides\1730166383.png>
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-chart-bar"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category"style="color: white">Highlight</p>
												<h4 class="card-title"style="color: white"><?php echo $row['highlights'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-newspaper"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category"style="color: white">Berita</p>
												<h4 class="card-title"style="color: white"><?php echo $z['news'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-newspaper"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category"style="color: white">About Us</p>
												<h4 class="card-title"style="color: white"><?php echo $d['about_us'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-newspaper"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category"style="color: white">Open Lesson</p>
												<h4 class="card-title"style="color: white"><?php echo $w['konten'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

            <div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round" style="background: linear-gradient(to right, #009ad7, #e11b22);">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="fas fa-newspaper"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers" style="color: white;">
												<p class="card-category"style="color: white">Partner & Network</p>
												<h4 class="card-title"style="color: white"><?php echo $e['partnet'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


            </div>
        </div>
    </div>

    <div class="container-footerbg-transparent">
        <p class="text-footer text-center p-3">
            &copy; © Center of Excellences Lessons and Learning Studies|
            Current Date and Time: <?php echo $currentDateTime; ?>
        </p>
    </div>
</div>
