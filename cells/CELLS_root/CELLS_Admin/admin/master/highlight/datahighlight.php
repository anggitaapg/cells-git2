<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Highlight</h4>
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
                        <a href="#">Highlight</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Highlight</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($conn,'SELECT * from highlights');
                                        while ($highlight = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $highlight['title'] ?></td>
											<td><img src="master/highlight/img/<?php echo $highlight['image'] ?>" width="50" height="50"></td>                                            <td><?php echo $highlight['link'] ?></td>
                                            <td>
                                                <a href="#modalEditHighlight<?php echo $highlight['id'] ?>" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
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

<?php 
$query = mysqli_query($conn,'SELECT * from highlights');
while($highlight = mysqli_fetch_array($query)) {
?>

<div class="modal fade" id="modalEditHighlight<?php echo $highlight['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Edit</span> 
                    <span class="fw-light">Highlight</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $highlight['id'] ?>">
                    <div class="form-group">
                        <label>Title</label>
                        <input value="<?php echo $highlight['title'] ?>" type="text" name="title" class="form-control" placeholder="Title..." required>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input value="<?php echo $highlight['link'] ?>" type="text" name="link" class="form-control" placeholder="Link..." required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
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
if(isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $link = $_POST['link'];
    
    // Cek apakah ada file gambar yang diupload
    if(!empty($_FILES['image']['name'])) {
		$image = $_FILES['image']['name'];
		$file_tmp = $_FILES['image']['tmp_name'];
		move_uploaded_file($file_tmp, 'master/highlight/img/' . $image);
		
		mysqli_query($conn,"UPDATE highlights SET title='$title', link='$link', image='$image' WHERE id='$id'");
	} else {
		mysqli_query($conn,"UPDATE highlights SET title='$title', link='$link' WHERE id='$id'");
	}
    
    echo "<script>alert('Data Berhasil Diubah')</script>";
    echo "<meta http-equiv='refresh' content=0; URL=?view=datahighlight>";
}
?>