<?php
include_once '../koneksi.php';

// Menambah team
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $kategori = $_POST['kategori'];
    $Foto = $_FILES['Foto']['name'];
    $target = "aboutus/team/" . basename($Foto);
    $periode = $_POST['periode'];
    $linkedin = $_POST['linkedin'];
    $cv = $_POST['cv'];
    $email = $_POST['email'];

    // Pindahkan file yang diupload ke folder target
    if (move_uploaded_file($_FILES['Foto']['tmp_name'], $target)) {
        $addtotable = mysqli_query($conn, "INSERT INTO about_us(nama, jabatan, kategori, Foto, periode, linkedin, cv, email) VALUES('$nama', '$jabatan', '$kategori', '$Foto', '$periode', '$linkedin', '$cv', '$email')");

        if ($addtotable) {
            echo "<script>
            window.location.href='?view=dataaboutus';
            </script>";
            exit();
        }
    } else {
        echo 'Gagal mengupload file';
    }
}

// Edit team
if (isset($_POST['simpanedit'])) {
    $id_team = $_POST['id_team'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $kategori = $_POST['kategori'];
    $periode = $_POST['periode'];
    $linkedin = $_POST['linkedin'];
    $cv = $_POST['cv'];
    $email = $_POST['email'];

    if (!empty($_FILES['Foto']['name'])) {
        $Foto = $_FILES['Foto']['name'];
        $target = "aboutus/team/" . basename($Foto);
        move_uploaded_file($_FILES['Foto']['tmp_name'], $target);
        $query = "UPDATE about_us SET nama='$nama', jabatan='$jabatan', kategori='$kategori', Foto='$Foto', periode='$periode', linkedin='$linkedin', cv='$cv', email='$email' WHERE id_team='$id_team'";
    } else {
        $query = "UPDATE about_us SET nama='$nama', jabatan='$jabatan', kategori='$kategori', periode='$periode', linkedin='$linkedin', cv='$cv', email='$email' WHERE id_team='$id_team'";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            window.location.href='?view=dataaboutus';
        </script>";
        exit();
    }
}

// Delete team
if (isset($_POST['hapus'])) {
    $id_team = $_POST['id']; // Ganti $id dengan $id_team
    $query = "DELETE FROM about_us WHERE id_team='$id_team'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Dihapus');</script>";
        echo "<meta http-equiv='refresh' content='0; URL=?view=dataaboutus'>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
}

?>

<style>
    th{
      width: 100px !important;
      min-width: 100px !important;
    }
    th:first-child {
       width: 35px !important;
       min-width: 35px !important;
     }
    th:last-child, td:last-child {
    width: 120px !important;
    min-width: 120px !important;
    }

</style>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Pegawai</h4>
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
                        <a href="#">Pegawai</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Team Cells</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddTeam">
                                    <i class="fa fa-plus"></i>
                                    Tambah Team
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jabatan</th>
                                            <th>Kategori</th>
                                            <th>Foto</th>
                                            <th>Periode</th>
                                            <th>LinkedIn</th>
                                            <th>Email</th>
                                            <th>CV</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
																			<?php
																									$ambildatateam = mysqli_query($conn, "SELECT * FROM about_us");

																									if (mysqli_num_rows($ambildatateam) > 0) {
																											$i = 1;
																											while ($data = mysqli_fetch_array($ambildatateam)) {
																													$id_team = $data['id_team'];
																													$nama = $data['nama'];
																													$jabatan = $data['jabatan'];
																													$Foto = $data['Foto'];
																													$kategori = $data['kategori'];
																													$periode = $data['periode'];
																													$linkedin = $data['linkedin'];
																													$cv = $data['cv'];
																													$email = $data['email'];
																									?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['jabatan']?></td>
                                            <td><?=$data['kategori']?></td>
                                            <td><img src="aboutus/team/<?=$data['Foto']?>" width="100" alt="Foto"></td>
                                            <td><?=$data['periode']?></td>
                                            <td><a href="<?=$data['linkedin']?>" target="_blank"><?=$data['linkedin']?></a></td>
                                            <td><a href="mailto:<?=$data['email']?>"><?=$data['email']?></a></td>
                                            <td><a href="<?=$data['cv']?>" target="_blank"><?=$data['cv']?></a></td>
                                            <td>
                                              	<a href="#modalDetailTeam<?php echo $data['id_team'] ?>"  data-toggle="modal" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="#modalEditTeam<?=$id_team?>" data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
																								<a href="#modalHapusBarang<?php echo $data['id_team'] ?>" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit Team -->
                                        <div class="modal fade" id="modalEditTeam<?=$id_team?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header no-bd">
                                                        <h5 class="modal-title">
                                                            <span class="fw-mediumbold">Edit</span>
                                                            <span class="fw-light">Team</span>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
																										<form method="POST" enctype="multipart/form-data" action="">
																										<div class="modal-body">
																											<input type="hidden" name="id_team" value="<?=$id_team?>">
																											<div class="form-group">
																												<label for="kategori" class="form-label">Kategori</label>
																					              <select class="form-select" id="kategori" name="kategori" required>
																													<option value="Executive" <?= $kategori == 'Executive' ? 'selected' : '' ?>>Executive</option>
																													<option value="Intern" <?= $kategori == 'Intern' ? 'selected' : '' ?>>Intern</option>
																													<option value="Advisor" <?= $kategori == 'Advisor' ? 'selected' : '' ?>>Advisor</option>
																													<option value="Trustees" <?= $kategori == 'Trustees' ? 'selected' : '' ?>>Trustees</option>
																					              </select>
																											</div>
																											<div class="form-group">
																												<label>Nama Lengkap</label>
																												<input type="text" name="nama" value="<?=$nama?>" class="form-control">
																											</div>
																											<div class="form-group">
																												<label>Jabatan</label>
																												<input type="text" name="jabatan" value="<?=$jabatan?>" class="form-control">
																											</div>
																											<div class="form-group">
																												<label>Periode Jabatan</label>
																												<input type="text" name="periode" value="<?=$periode?>" class="form-control">
																											</div>
																											<div class="form-group">
																												<label>Foto</label>
																												<input type="file" name="Foto" class="form-control" >
																											</div>
																											<div class="form-group">
																												<label>LinkedIn</label>
																												<input type="text" name="linkedin" value="<?=$linkedin?>" placeholder="Link LinkedIn, Contoh: https://www.linkedin.com/in/********" class="form-control">
																											</div>
																											<div class="form-group">
																												<label>Curriculum Vitae</label>
																												<input type="text" name="cv" value="<?=$cv?>" class="form-control">
																											</div>
																											<div class="form-group">
																												<label>Email</label>
																												<input type="text" name="email"  value="<?=$email?>"  class="form-control">
																											</div>
																										</div>
                                                        <div class="modal-footer no-bd">
                                                            <button type="submit" name="simpanedit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Read Team -->
                                        <div class="modal fade" id="modalDetailTeam<?=$id_team?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header no-bd">
                                                        <h5 class="modal-title">
                                                            <span class="fw-mediumbold">Detail</span>
                                                            <span class="fw-light">Team</span>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" enctype="multipart/form-data" action="">
                                                    <div class="modal-body">
                                                      <input type="hidden" name="id_team" value="<?=$id_team?>">
                                                      <div class="form-group">
                                                        <label for="kategori" class="form-label">Kategori</label>
                                                        <input readonly type="text" name="nama" value="<?=$kategori?>" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <input readonly type="text" name="nama" value="<?=$nama?>" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <input readonly type="text" name="jabatan" value="<?=$jabatan?>" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Periode Jabatan</label>
                                                        <input readonly type="text" name="periode" value="<?=$periode?>" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Foto</label>
                                                        <input readonly type="file" name="Foto" class="form-control" >
                                                      </div>
                                                      <div class="form-group">
                                                        <label>LinkedIn</label>
                                                        <input readonly type="text" name="linkedin" value="<?=$linkedin?>"  class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Curriculum Vitae</label>
                                                        <input readonly type="text" name="cv" value="<?=$cv?>" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Email</label>
                                                        <input readonly type="text" name="email"  value="<?=$email?>"  class="form-control">
                                                      </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='10'>Tidak ada data yang ditemukan.</td></tr>";
                                        }
                                        ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../../assets/js/scripts.js"></script> <!-- Path diperbarui -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../../assets/demo/chart-area-demo.js"></script> <!-- Path diperbarui -->
<script src="../../assets/demo/chart-bar-demo.js"></script> <!-- Path diperbarui -->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="../../assets/js/datatables-simple-demo.js"></script> <!-- Path diperbarui -->

<script>
          function confirmDelete(id) {
              if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                  window.location.href = "dataaboutus.php?id_team=" + id;
              }
          }
        </script>

<div class="modal fade" id="modalAddTeam" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header no-bd">
											<h5 class="modal-title">
												<span class="fw-mediumbold">
												New</span>
												<span class="fw-light">
													Team
												</span>
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="POST" enctype="multipart/form-data" action="">
										<div class="modal-body">
											<div class="form-group">
												<label for="kategori" class="form-label">Kategori</label>
					              <select class="form-select" id="kategori" name="kategori" required>
					                <option value="Executive">Executive</option>
					                <option value="Intern">Intern</option>
					                <option value="Advisor">Advisor</option>
					                <option value="Trustees">Trustees</option>
					              </select>
											</div>
											<div class="form-group">
												<label>Nama Lengkap</label>
												<input type="text" name="nama" class="form-control" placeholder="" required>
											</div>
											<div class="form-group">
												<label>Jabatan</label>
												<input type="text" name="jabatan" class="form-control" required>
											</div>
											<div class="form-group">
												<label>Periode Jabatan</label>
												<input type="text" name="periode" placeholder="Contoh: 2020-2022" class="form-control" required>
											</div>
											<div class="form-group">
												<label>Foto</label>
												<input type="file" name="Foto" class="form-control" required>
											</div>
											<div class="form-group">
												<label>LinkedIn</label>
												<input type="text" name="linkedin" placeholder="Link LinekdIn, Contoh: https://www.linkedin.com/in/********" class="form-control" required>
											</div>
											<div class="form-group">
												<label>Curriculum Vitae</label>
												<input type="text" name="cv" placeholder="Link CV (drive)" class="form-control" required>
											</div>
											<div class="form-group">
												<label>Email</label>
												<input type="text" name="email" placeholder="email, contoh loremipsum@gmail.com" class="form-control" required>
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
$c = mysqli_query($conn, 'SELECT * FROM about_us'); // Ganti 'barang' dengan 'about_us'
while ($row = mysqli_fetch_array($c)) {
?>
    <div class="modal fade" id="modalHapusBarang<?php echo $row['id_team'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">Hapus</span>
                        <span class="fw-light">Data Team</span> <!-- Sesuaikan judul jika perlu -->
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $row['id_team'] ?>"> <!-- Ganti 'id' dengan 'id_team' -->
                        <h4>Apakah Anda Ingin Menghapus Data Ini?</h4>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
