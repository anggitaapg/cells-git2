<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Carousel</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Data</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Carousel</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Carousel</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddBarang">
											<i class="fa fa-plus"></i>
											Tambah Carousel
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Judul Carousel</th>
													<th>Deskripsi</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>
												<?php
													$no = 1;
													$query = mysqli_query($conn,'SELECT * from slides');
													while ($carousel = mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $carousel['title'] ?></td>
													<td><?php echo $carousel['description'] ?></td>
													<td>
														<a href="#modalDetailBarang<?php echo $carousel['id'] ?>"  data-toggle="modal" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalEditBarang<?php echo $carousel['id'] ?>"  data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
														<a href="#modalHapusBarang<?php echo $carousel['id'] ?>"  data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
													</td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<p class="text-footer text-center p-3">&copy; Center of Excellences Lessons and Learning Studies</p>
		</div>

		<div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">New</span> 
                    <span class="fw-light">Carousel</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="" id="addCarouselForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control" placeholder="Nama Carousel ..." required="">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea placeholder="Deskripsi ..." class="form-control" rows="5" name="deskripsi" style="white-space: pre-line;" required=""></textarea>
                    </div>
					<div class="form-group">
    <label>Link/Destination (Optional)</label>
    <input type="text" name="link_destination" class="form-control" placeholder="https://example.com/article">
</div>
                    <div class="form-group">
                        <label>Image (Recommended: 1366x768)</label>
                        <input type="file" name="foto" class="form-control" id="imageInput" accept="image/*" required="">
                        <div id="preview-container" style="display: none;">
                            <div class="image-container">
                                <img id="preview" src="" alt="Preview">
                            </div>
                        </div>
                        <input type="hidden" name="cropped_data" id="croppedData">
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

									<?php 
										$p = mysqli_query($conn,'SELECT * from slides');
										while($d = mysqli_fetch_array($p)) {
									?>

<div class="modal fade" id="modalEditBarang<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Edit</span> 
                    <span class="fw-light">Carousel</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="" class="editCarouselForm">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                    <div class="form-group">
                        <label>Judul Carousel</label>
                        <input value="<?php echo $d['title'] ?>" type="text" name="nama_barang" class="form-control" placeholder="Judul Carousel ..." required="">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi ..." rows="5" name="deskripsi" style="white-space: pre-line;" required=""><?php echo $d['description'] ?></textarea>
                    </div>
					<div class="form-group">
    <label>Link/Destination (Optional)</label>
    <input type="text" name="link_destination" value="<?php echo $d['link_destination'] ?>" class="form-control" placeholder="https://example.com/article">
    <small class="form-text text-muted">Current link: <?php echo $d['link_destination'] ?? 'No link set' ?></small>
</div>
                    <div class="form-group">
                        <label>Foto (Recommended: 1366x768)</label>
                        <input type="file" name="foto" class="form-control imageInput" accept="image/*">
                        <div class="preview-container" style="display: none;">
                            <div class="image-container">
                                <img class="preview" src="" alt="Preview">
                            </div>
                        </div>
                        <input type="hidden" name="cropped_data" class="croppedData">
                        <small class="form-text text-muted">Current image: <?php echo $d['image'] ?></small>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

									<?php } ?>

									<?php 
										$c = mysqli_query($conn,'SELECT * from slides');
										while($row = mysqli_fetch_array($c)) {
									?>

<div class="modal fade" id="modalHapusBarang<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Hapus</span> 
                    <span class="fw-light">Carousel</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
                    <p>Carousel: <?php echo $row['title'] ?></p>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="hapus" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Hapus
                    </button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="fa fa-undo"></i> Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

									<?php } ?>

									<?php 
										$q = mysqli_query($conn,'SELECT * from slides');
										while($k = mysqli_fetch_array($q)) {
									?>

									<div class="modal fade" id="modalDetailBarang<?php echo $k['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Detail</span> 
														<span class="fw-light">
															Carousel
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?php echo $k['id'] ?>">
													<div class="form-group">
														<label>Judul Carousel</label>
														<input readonly value="<?php echo $k['title'] ?>" type="text" name="nama_barang" class="form-control" placeholder="Nama Barang ..." required="">
													</div>
													<div class="form-group">
														<label>Deskripsi</label>
														<textarea readonly class="form-control" rows="5" name="deskripsi" style="white-space: pre-line;" required=""><?php echo $k['description'] ?></textarea>
													</div>
													<div class="form-group">
    <label>Link/Destination</label>
    <input readonly value="<?php echo $k['link_destination'] ?? 'No link set' ?>" type="text" class="form-control">
</div>
													<div class="form-group">
														<img src="master/carousel/Fotocarousel/<?php echo $k['image'] ?>" width="100%" height="200">
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

								<?php } ?>

								<?php
if(isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $deskripsi = $_POST['deskripsi'];
	$link_destination = $_POST['link_destination'] ?? NULL;

    
    if(isset($_POST['cropped_data'])) {
        $croppedImage = $_POST['cropped_data'];
        $image_array_1 = explode(";", $croppedImage);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        
        $image_name = time() . '.png';
        $upload_path = 'master/carousel/Fotocarousel/' . $image_name;
        
        file_put_contents($upload_path, $data);
        
		mysqli_query($conn,"INSERT into slides (title, description, image, link_destination) values ('$title','$deskripsi','$image_name', '$link_destination')");
        echo "<script>alert ('Data Berhasil Disimpan') </script>";
        echo"<meta http-equiv='refresh' content=0; URL=?view=datacarousel>";
    }
}

if(isset($_POST['hapus'])) {
    $id = $_POST['id'];
    
    // First get the image filename before deleting the record
    $query = mysqli_query($conn, "SELECT image FROM slides WHERE id='$id'");
    $row = mysqli_fetch_assoc($query);
    
    // Delete the image file if it exists
    if($row['image']) {
        $image_path = 'master/carousel/Fotocarousel/' . $row['image'];
        if(file_exists($image_path)) {
            unlink($image_path);
        }
    }
    
    // Delete the record from database
    $delete = mysqli_query($conn, "DELETE FROM slides WHERE id='$id'");
    
    if($delete) {
        echo "<script>alert('Data Berhasil Dihapus');</script>";
        echo "<meta http-equiv='refresh' content='0; URL=?view=datacarousel'>";
    } else {
        echo "<script>alert('Gagal Menghapus Data: " . mysqli_error($conn) . "');</script>";
    }
}

elseif(isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $deskripsi = $_POST['deskripsi'];
	$link_destination = $_POST['link_destination'] ?? NULL;

    
    if(isset($_POST['cropped_data'])) {
        // Hapus foto lama
        $query = mysqli_query($conn, "SELECT image FROM slides WHERE id='$id'");
        $row = mysqli_fetch_assoc($query);
        if($row['image']) {
            unlink('master/carousel/Fotocarousel/' . $row['image']);
        }
        
        // Simpan foto baru
        $croppedImage = $_POST['cropped_data'];
        $image_array_1 = explode(";", $croppedImage);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        
        $image_name = time() . '.png';
        $upload_path = 'master/carousel/Fotocarousel/' . $image_name;
        
        file_put_contents($upload_path, $data);
        
		if(isset($_POST['cropped_data'])) {
			mysqli_query($conn,"UPDATE slides SET title='$title', description='$deskripsi', image='$image_name', link_destination='$link_destination' WHERE id='$id'");
		} else {
			mysqli_query($conn,"UPDATE slides SET title='$title', description='$deskripsi', link_destination='$link_destination' WHERE id='$id'");
		}
	}
    
    echo "<script>alert ('Data Berhasil Diubah') </script>";
    echo"<meta http-equiv='refresh' content=0; URL=?view=datacarousel>";
}
?>