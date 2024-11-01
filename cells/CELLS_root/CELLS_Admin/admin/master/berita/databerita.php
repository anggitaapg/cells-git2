<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Berita</h4>
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
                        <a href="#">Berita</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Berita</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddNews">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Konten</th>
                                            <th>Tanggal</th>
                                            <th>Gambar</th>
                                            <th>Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($conn, 'SELECT * from news ORDER BY date DESC');
                                        while ($news = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $news['title'] ?></td>
                                                <td><?php echo substr($news['content'], 0, 100) ?>...</td>
                                                <td><?php echo date('d-m-Y', strtotime($news['date'])) ?></td>
                                                <td><img src="master/berita/img/<?php echo $news['image_url'] ?>" width="50px"></td>
                                                <td><?php echo $news['link_url'] ?></td>
                                                <td>
                                                    <a href="#modalDetailNews<?php echo $news['id'] ?>" data-toggle="modal" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                                    <a href="#modalEditNews<?php echo $news['id'] ?>" data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                                    <a href="#modalHapusNews<?php echo $news['id'] ?>" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
</div>

<!-- Modal Add News -->
<div class="modal fade" id="modalAddNews" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Tambah</span>
                    <span class="fw-light">Berita</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="title" class="form-control" placeholder="Judul berita..." required>
                    </div>
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea name="content" class="form-control" rows="5" placeholder="Isi berita..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Upload Gambar</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>URL Link</label>
                        <input type="text" name="link_url" class="form-control" placeholder="URL link..." required>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit News -->
<?php
$query = mysqli_query($conn, 'SELECT * from news');
while ($news = mysqli_fetch_array($query)) {
?>
    <div class="modal fade" id="modalEditNews<?php echo $news['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">Edit</span>
                        <span class="fw-light">Berita</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $news['id'] ?>">
                        <div class="form-group">
                            <label>Judul Berita</label>
                            <input type="text" name="title" value="<?php echo $news['title'] ?>" class="form-control" placeholder="Judul berita..." required>
                        </div>
                        <div class="form-group">
                            <label>Konten</label>
                            <textarea name="content" class="form-control" rows="5" placeholder="Isi berita..." required><?php echo $news['content'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="date" value="<?php echo $news['date'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Upload Gambar</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>URL Link</label>
                            <input type="text" name="link_url" value="<?php echo $news['link_url'] ?>" class="form-control" placeholder="URL link..." required>
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

<!-- Modal Hapus News -->
<?php
$query = mysqli_query($conn, 'SELECT * from news');
while ($news = mysqli_fetch_array($query)) {
?>
    <div class="modal fade" id="modalHapusNews<?php echo $news['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">Hapus</span>
                        <span class="fw-light">Berita</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $news['id'] ?>">
                        <h4>Apakah Anda Yakin Ingin Menghapus Data Ini?</h4>
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

<!-- Modal Detail News -->
<?php
$query = mysqli_query($conn, 'SELECT * from news');
while ($news = mysqli_fetch_array($query)) {
?>
    <div class="modal fade" id="modalDetailNews<?php echo $news['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">Detail</span>
                        <span class="fw-light">Berita</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" value="<?php echo $news['title'] ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea class="form-control" rows="5" readonly><?php echo $news['content'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" value="<?php echo date('d-m-Y', strtotime($news['date'])) ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <img src="master/berita/img/<?php echo $news['image_url'] ?>" width="100%">
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" value="<?php echo $news['link_url'] ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
// Proses Simpan
if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $link_url = $_POST['link_url'];
    
    // Upload Gambar
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = $image_name;
    
    // Pindahkan gambar ke folder img
    if (move_uploaded_file($image_tmp, __DIR__ . $image_path)) {
        mysqli_query($conn, "INSERT INTO news (title, content, date, image_url, link_url, created_at) 
                            VALUES ('$title', '$content', '$date', '$image_path', '$link_url', NOW())");

        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo "<meta http-equiv='refresh' content=0; URL=?view=datanews>";
    } else {
        echo "<script>alert('Gagal mengupload gambar')</script>";
    }
}

// Proses Ubah
if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $link_url = $_POST['link_url'];
    
    // Cek apakah ada gambar yang diupload
    if (!empty($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = 'master/berita/img/' . $image_name;
        
        if (move_uploaded_file($image_tmp, __DIR__ . '/' . $image_path)) {
            mysqli_query($conn, "UPDATE news SET 
                                title='$title', 
                                content='$content', 
                                date='$date', 
                                image_url='$image_name', 
                                link_url='$link_url' 
                                WHERE id='$id'");
        } else {
            echo "<script>alert('Gagal mengupload gambar')</script>";
        }
    } else {
        mysqli_query($conn, "UPDATE news SET 
                            title='$title', 
                            content='$content', 
                            date='$date', 
                            link_url='$link_url' 
                            WHERE id='$id'");
    }
    

    echo "<script>alert('Data Berhasil Diubah')</script>";
    echo "<meta http-equiv='refresh' content=0; URL=?view=datanews>";
}


// Proses Hapus
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE from news where id='$id'");
    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<meta http-equiv='refresh' content=0; URL=?view=datanews>";
}
?>