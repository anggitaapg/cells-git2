<?php
function saveImage($base64Image, $targetPath) {
    // Remove the "data:image/png;base64," part
    $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
    $base64Image = str_replace('data:image/jpeg;base64,', '', $base64Image);
    
    // Convert base64 to image and save
    $imageData = base64_decode($base64Image);
    return file_put_contents($targetPath, $imageData);
}
?>

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
                                <table id="add-row" class="display table table-striped table-hover">
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
                                        $query = mysqli_query($conn, 'SELECT * from highlights');
                                        while ($highlight = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $highlight['title'] ?></td>
                                                <td><img src="master/highlight/img/<?php echo $highlight['image'] ?>" width="100"></td>
                                                <td><?php echo $highlight['link'] ?></td>
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

<!-- Add these CSS links in your header -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">

<!-- Add these JavaScript links before closing body tag -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

<?php
$query = mysqli_query($conn, 'SELECT * from highlights');
while ($highlight = mysqli_fetch_array($query)) {
?>
    <div class="modal fade" id="modalEditHighlight<?php echo $highlight['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                <form method="POST" enctype="multipart/form-data" action="" id="formEdit<?php echo $highlight['id'] ?>">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $highlight['id'] ?>">
                        <input type="hidden" name="croppedImage" id="croppedImage<?php echo $highlight['id'] ?>">
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
                            <input type="file" name="image" class="form-control image-input" accept="image/*" data-id="<?php echo $highlight['id'] ?>">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                            <?php if (!empty($highlight['image'])) : ?>
                                <div class="mt-2">
                                    <small>Current Image:</small><br>
                                    <img src="master/highlight/img/<?php echo $highlight['image'] ?>" width="100">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="img-container" style="max-height: 400px; display: none;">
                            <img id="image<?php echo $highlight['id'] ?>" src="" style="max-width: 100%;">
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="button" class="btn btn-success crop-btn" data-id="<?php echo $highlight['id'] ?>" style="display: none;"><i class="fa fa-crop"></i> Crop</button>
                        <button type="submit" name="ubah" class="btn btn-primary submit-btn" data-id="<?php echo $highlight['id'] ?>"><i class="fa fa-save"></i> Save Changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<script>
let croppers = {};

document.querySelectorAll('.image-input').forEach(input => {
    input.addEventListener('change', function(e) {
        const id = this.getAttribute('data-id');
        const imgContainer = this.parentElement.nextElementSibling;
        const img = document.getElementById('image' + id);
        const cropBtn = document.querySelector('.crop-btn[data-id="' + id + '"]');
        
        // Destroy existing cropper if any
        if (croppers[id]) {
            croppers[id].destroy();
            delete croppers[id];
        }

        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                imgContainer.style.display = 'block';
                cropBtn.style.display = 'inline-block';
                
                croppers[id] = new Cropper(img, {
                    aspectRatio: 4/3,
                    viewMode: 2,
                    minContainerWidth: 400,
                    minContainerHeight: 300,
                });
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});

document.querySelectorAll('.crop-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        const id = this.getAttribute('data-id');
        const cropper = croppers[id];
        
        if (cropper) {
            // Get cropped canvas
            const canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 300
            });
            
            // Convert to base64 string
            const croppedImage = canvas.toDataURL('image/jpeg');
            document.getElementById('croppedImage' + id).value = croppedImage;
            
            // Hide crop button after cropping
            this.style.display = 'none';
        }
    });
});

// Prevent form submission if image is uploaded but not cropped
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(e) {
        const id = this.id.replace('formEdit', '');
        const imageInput = this.querySelector('.image-input');
        const cropBtn = document.querySelector('.crop-btn[data-id="' + id + '"]');
        
        if (imageInput.files.length > 0 && cropBtn.style.display !== 'none') {
            e.preventDefault();
            alert('Please crop the image before saving.');
        }
    });
});
</script>

<?php
if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $link = $_POST['link'];
    
    if (!empty($_POST['croppedImage'])) {
        // Generate unique filename
        $image = time() . '_highlight.jpg';
        $upload_path = 'master/highlight/img/' . $image;
        
        // Delete old image if exists
        $query = mysqli_query($conn, "SELECT image FROM highlights WHERE id='$id'");
        $old_image = mysqli_fetch_array($query)['image'];
        if ($old_image && file_exists('master/highlight/img/' . $old_image)) {
            unlink('master/highlight/img/' . $old_image);
        }
        
        // Save cropped image
        if (saveImage($_POST['croppedImage'], $upload_path)) {
            mysqli_query($conn, "UPDATE highlights SET title='$title', link='$link', image='$image' WHERE id='$id'");
            echo "<script>alert('Data Berhasil Diubah')</script>";
        } else {
            echo "<script>alert('Gagal menyimpan gambar')</script>";
        }
    } else {
        mysqli_query($conn, "UPDATE highlights SET title='$title', link='$link' WHERE id='$id'");
        echo "<script>alert('Data Berhasil Diubah')</script>";
    }
    
    echo "<meta http-equiv='refresh' content=0; URL=?view=datahighlight>";
}
?>