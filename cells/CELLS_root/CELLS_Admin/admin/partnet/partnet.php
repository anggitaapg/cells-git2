<?php
include_once '../koneksi.php';

// Menambah partnet
if (isset($_POST['tambahpartnet'])) {
    $nama_partnet = $_POST['nama_partnet'];
    $nama_partnet2 = $_POST['nama_partnet2'];
    $instansi = $_POST['instansi'];
    $link = $_POST['link'];

    if (isset($_FILES['logo']) && !empty($_FILES['logo']['name'])) {
        $logo = $_FILES['logo']['name'];
        $target_logo = "partnet/partnet/" . basename($logo);

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_logo)) {
            $addtotable = mysqli_query($conn, "INSERT INTO partnet(nama_partnet, nama_partnet2, instansi, logo, link) VALUES('$nama_partnet', '$nama_partnet2', '$instansi', '$logo', '$link')");

            if ($addtotable) {
                echo "<script>
                window.location.href='?view=partnet';
                </script>";
                exit();
            }
        }
    }
}

// Edit partnet
if (isset($_POST['editpartnet'])) {
    $id_partnet = $_POST['id_partnet'];
    $nama_partnet = $_POST['nama_partnet'];
    $nama_partnet2 = $_POST['nama_partnet2'];
    $instansi = $_POST['instansi'];
    $link = $_POST['link'];

    if (!empty($_FILES['logo']['name'])) {
        $logo = $_FILES['logo']['name'];
        $target_logo = "partnet/partnet/" . basename($logo);
        move_uploaded_file($_FILES['logo']['tmp_name'], $target_logo);
        $query = "UPDATE partnet SET nama_partnet='$nama_partnet', nama_partnet2='$nama_partnet2', instansi='$instansi', logo='$logo', link='$link' WHERE id_partnet='$id_partnet'";
    } else {
        $query = "UPDATE partnet SET nama_partnet='$nama_partnet', nama_partnet2='$nama_partnet2', instansi='$instansi', link='$link' WHERE id_partnet='$id_partnet'";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            window.location.href='?view=partnet';
        </script>";
        exit();
    }
}

// Delete partnet
if (isset($_POST['hapus'])) {
    $id_partnet = $_POST['id'];
    $query = "DELETE FROM partnet WHERE id_partnet='$id_partnet'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Dihapus');</script>";
        echo "<meta http-equiv='refresh' content='0; URL=?view=partnet'>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
}
?>


<style>
    .btn-xs {
        width: 30px;
        height: 30px;
    }
</style>



<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Partner and Network</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#"><i class="flaticon-home"></i></a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="#">Partner</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="#">& Network</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Partner and Network</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddpartnet">
            										<i class="fa fa-plus"></i>
            										Tambah Partner and Network
            								</button>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama 1</th>
                                            <th>Nama 2</th>
                                            <th>Instansi</th>
                                            <th>Logo</th>
                                            <th>Link Website</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambildatapartnet = mysqli_query($conn, "SELECT * FROM partnet");
                                        if (mysqli_num_rows($ambildatapartnet) > 0) {
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($ambildatapartnet)) {
                                                $id_partnet = $data['id_partnet'];
                                                $nama_partnet = $data['nama_partnet'];
                                                $nama_partnet2 = $data['nama_partnet2'];
                                                $instansi = $data['instansi'];
                                                $logo = $data['logo'];
                                                $link = $data['link'];
                                        ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $nama_partnet ?></td>
                                            <td><?= $nama_partnet2 ?></td>
                                            <td><?= $instansi ?></td>
                                            <td><img src="partnet/partnet/<?= $logo ?>" width="100" alt="Foto"></td>
                                            <td><?= $link ?></td>
                                            <td>
                                                <a href="#modalEditpartnet<?= $id_partnet ?>" data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="#modalHapuspartnet<?= $id_partnet ?>" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr><!-- Modal Edit partnet -->
                                        <div class="modal fade" id="modalEditpartnet<?=$id_partnet?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header no-bd">
                                                        <h5 class="modal-title">
                                                            <span class="fw-mediumbold">Edit</span>
                                                            <span class="fw-light">partnet</span>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
																										<form method="POST" enctype="multipart/form-data" action="">
																										<div class="modal-body">
																											<input type="hidden" name="id_partnet" value="<?=$id_partnet?>">
																			                    <div class="form-group">
																			                        <label>Nama 1</label>
																			                        <input type="text" name="nama_partnet" value="<?=$nama_partnet?>" class="form-control">
																			                    </div>
																			                    <div class="form-group">
																			                        <label>Nama 2</label>
																			                        <input type="text" name="nama_partnet2" value="<?=$nama_partnet2?>" class="form-control">
																			                    </div>
																			                    <div class="form-group">
																			                        <label>Instansi</label>
																			                        <input type="text" name="instansi" value="<?=$instansi?>" class="form-control">
																			                    </div>
																			                    <div class="form-group">
																			                        <label>Logo</label>
																			                        <input type="file" name="logo" class="form-control">
																			                    </div>
                                                          <div class="form-group">
																			                        <label>Link Website</label>
																			                        <input type="text" name="link" value="<?=$link?>" class="form-control">
																			                    </div>
																			                </div>
                                                        <div class="modal-footer no-bd">
                                                            <button type="submit" name="editpartnet" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>

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
            <p class="text-footer text-center p-3">&copy; Sarana dan Prasarana - Universitas Pendidikan Indonesia Kampus UPI di Cibiru</p>
        </div>
    </div>
</div>

<!-- Modal Add partnet -->
<div class="modal fade" id="modalAddpartnet" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">New</span>
                    <span class="fw-light">partnet</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama 1</label>
                        <input type="text" name="nama_partnet" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama 2</label>
                        <input type="text" name="nama_partnet2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Instansi</label>
                        <input type="text" name="instansi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Link Website</label>
                        <input type="text" name="link" class="form-control">
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="tambahpartnet" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<?php
$c = mysqli_query($conn, 'SELECT * FROM partnet');
while ($row = mysqli_fetch_array($c)) {
?>
<div class="modal fade" id="modalHapuspartnet<?= $row['id_partnet'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">Hapus Data partnet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $row['id_partnet'] ?>">
                    <h4>Apakah Anda Ingin Menghapus Data Ini?</h4>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
