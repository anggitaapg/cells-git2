<?php

$host     = "localhost";
$username = "root";
$password = "";
$database = "cellsgit";

// Koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Menambah team
if (isset($_POST['tambahteam'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $kategori = $_POST['kategori'];
    $Foto = $_FILES['Foto']['name'];  // Ambil nama file
    $target = "./img/" . basename($Foto);   // Tentukan lokasi penyimpanan
    $periode = $_POST['periode'];
    $linkedin = $_POST['linkedin'];
    $cv = $_POST['cv'];
    $email = $_POST['email'];

    // Pindahkan file yang diupload ke folder target
    if (move_uploaded_file($_FILES['Foto']['tmp_name'], $target)) {
        // Query untuk menambah data ke tabel
        $addtotable = mysqli_query($koneksi, "INSERT INTO about_us(nama, jabatan, kategori, Foto, periode, linkedin, cv, email) VALUES('$nama', '$jabatan', '$kategori', '$Foto', '$periode', '$linkedin', '$cv', '$email')");

        if ($addtotable) {
            header('location: index.php');
        } else {
            echo 'Gagal menambah data';
        }
    } else {
        echo 'Gagal mengupload file';
    }
}

// Edit team
if (isset($_POST['editteam'])) {
    $id_team = $_POST['id_team'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $kategori = $_POST['kategori'];
    $periode = $_POST['periode'];
    $linkedin = $_POST['linkedin'];
    $cv = $_POST['cv'];
    $email = $_POST['email'];

    // Jika ada foto baru diupload
    if (!empty($_FILES['Foto']['name'])) {
        $Foto = $_FILES['Foto']['name'];
        $target = "./img/" . basename($Foto);
        move_uploaded_file($_FILES['Foto']['tmp_name'], $target);
        $query = "UPDATE about_us SET nama='$nama', jabatan='$jabatan', kategori='$kategori', Foto='$Foto', periode='$periode', linkedin='$linkedin', cv='$cv', email='$email' WHERE id_team='$id_team'";
    } else {
        $query = "UPDATE about_us SET nama='$nama', jabatan='$jabatan', kategori='$kategori', periode='$periode', linkedin='$linkedin', cv='$cv', email='$email' WHERE id_team='$id_team'";
    }

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header('location: index.php');
    } else {
        echo 'Gagal memperbarui data';
    }
}

// Delete team
if (isset($_GET['id_team'])) {
    $id_team = $_GET['id_team'];
    $query = "DELETE FROM about_us WHERE id_team='$id_team'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header('location: index.php');
    } else {
        echo 'Gagal menghapus data';
    }
}

//tambah projek
if (isset($_POST['tambahprojek'])) {
    $nama_projek = $_POST['nama_projek'];
    $caption = $_POST['caption'];
    $sampul = $_FILES['sampul']['name'];
    $target_sampul = "./img/projek/" . basename($sampul);
    $news = $_POST['news'];

    $gambar1 = $_FILES['gambar1']['name'];
    $target_gambar1 = "./img/projek/" . basename($gambar1);
    $capt1 = $_POST['capt1'];  // Caption gambar1

    $gambar2 = $_FILES['gambar2']['name'];
    $target_gambar2 = "./img/projek/" . basename($gambar2);
    $capt2 = $_POST['capt2'];  // Caption gambar2

    $gambar3 = $_FILES['gambar3']['name'];
    $target_gambar3 = "./img/projek/" . basename($gambar3);
    $capt3 = $_POST['capt3'];  // Caption gambar3

    // Pindahkan file yang diupload ke folder target
    $upload_success = true;

    if (!move_uploaded_file($_FILES['sampul']['tmp_name'], $target_sampul)) {
        echo 'Gagal mengupload sampul';
        $upload_success = false;
    }

    if (!move_uploaded_file($_FILES['gambar1']['tmp_name'], $target_gambar1)) {
        echo 'Gagal mengupload gambar1';
        $upload_success = false;
    }

    if (!move_uploaded_file($_FILES['gambar2']['tmp_name'], $target_gambar2)) {
        echo 'Gagal mengupload gambar2';
        $upload_success = false;
    }

    if (!move_uploaded_file($_FILES['gambar3']['tmp_name'], $target_gambar3)) {
        echo 'Gagal mengupload gambar3';
        $upload_success = false;
    }

    // Jika semua upload berhasil, lakukan query untuk menambah data ke tabel
    if ($upload_success) {
        $addtotable = mysqli_query($koneksi, "INSERT INTO projek(nama_projek, caption, news, sampul, gambar1, capt1, gambar2, capt2, gambar3, capt3) VALUES('$nama_projek', '$caption','$news', '$sampul', '$gambar1', '$capt1', '$gambar2', '$capt2', '$gambar3', '$capt3')");

        if ($addtotable) {
            header('location: projek.php');
        } else {
            echo 'Gagal menambah data';
        }
    }
}


// Edit projek
if (isset($_POST['editprojek'])) {
    $id_projek = $_POST['id_projek'];
    $nama_projek = $_POST['nama_projek'];
    $caption = $_POST['caption'];
    $news = $_POST['news'];

    $query = "UPDATE projek SET nama_projek='$nama_projek', caption='$caption', news='$news'";

    if (!empty($_FILES['sampul']['name'])) {
        $sampul = $_FILES['sampul']['name'];
        $target_sampul = "./img/projek/" . basename($sampul);
        move_uploaded_file($_FILES['sampul']['tmp_name'], $target_sampul);
        $query .= ", sampul='$sampul'";
    }

    if (!empty($_FILES['gambar1']['name'])) {
        $gambar1 = $_FILES['gambar1']['name'];
        $target_gambar1 = "./img/projek/" . basename($gambar1);
        move_uploaded_file($_FILES['gambar1']['tmp_name'], $target_gambar1);
        $capt1 = $_POST['capt1'];
        $query .= ", gambar1='$gambar1', caption1='$capt1'";
    }

    if (!empty($_FILES['gambar2']['name'])) {
        $gambar2 = $_FILES['gambar2']['name'];
        $target_gambar2 = "./img/projek/" . basename($gambar2);
        move_uploaded_file($_FILES['gambar2']['tmp_name'], $target_gambar2);
        $capt2 = $_POST['capt2'];
        $query .= ", gambar2='$gambar2', caption2='$capt2'";
    }

    if (!empty($_FILES['gambar3']['name'])) {
        $gambar3 = $_FILES['gambar3']['name'];
        $target_gambar3 = "./img/projek/" . basename($gambar3);
        move_uploaded_file($_FILES['gambar3']['tmp_name'], $target_gambar3);
        $capt3 = $_POST['capt3'];
        $query .= ", gambar3='$gambar3', caption3='$capt3'";
    }

    // Tambahkan kondisi WHERE
    $query .= " WHERE id_projek='$id_projek'";

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header('Location: projek.php'); // Redirect ke halaman projek setelah update
    } else {
        echo 'Gagal memperbarui data: ' . mysqli_error($koneksi); // Debug jika gagal
    }
}

// Delete team
if (isset($_GET['id_projek'])) {
    $id_projek = $_GET['id_projek'];
    $query = "DELETE FROM projek WHERE id_projek='$id_projek'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header('location: projek.php');
    } else {
        echo 'Gagal menghapus data';
    }
}

// Menambah Partnet
if (isset($_POST['tambahpartnet'])) {
    $nama_partnet = $_POST['nama_partnet'];
    $nama_partnet2 = $_POST['nama_partnet2'];
    $instansi = $_POST['instansi'];

    // Pastikan file 'logo' ada dan diunggah
    if (isset($_FILES['logo']) && !empty($_FILES['logo']['name'])) {
        $logo = $_FILES['logo']['name'];
        $target_logo = "./img/logo/" . basename($logo);

        // Pindahkan file yang diupload ke folder target
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_logo)) {
            // Query untuk menambah data ke tabel
            $addtotable = mysqli_query($koneksi, "INSERT INTO partnet(nama_partnet, nama_partnet2, instansi, logo) VALUES('$nama_partnet', '$nama_partnet2', '$instansi', '$logo')");

            if ($addtotable) {
                header('location: partnet.php');
            } else {
                echo 'Gagal menambah data';
            }
        } else {
            echo 'Gagal mengupload file';
        }
    } else {
        echo 'File logo belum diunggah';
    }
}

// Edit Partnet
if (isset($_POST['editpartnet'])) {
    $id_partnet = $_POST['id_partnet'];
    $nama_partnet = $_POST['nama_partnet'];
    $nama_partnet2 = $_POST['nama_partnet2'];
    $instansi = $_POST['instansi'];

    // Jika ada foto baru diupload
    if (!empty($_FILES['logo']['name'])) {
        $logo = $_FILES['logo']['name'];
        $target_logo = "./img/logo/" . basename($logo);
        move_uploaded_file($_FILES['logo']['tmp_name'], $target_logo);
        $query = "UPDATE partnet SET nama_partnet='$nama_partnet', nama_partnet2='$nama_partnet2', instansi='$instansi', logo='$logo' WHERE id_partnet='$id_partnet'";
    } else {
        $query = "UPDATE partnet SET nama_partnet='$nama_partnet', nama_partnet2='$nama_partnet2', instansi='$instansi' WHERE id_partnet='$id_partnet'";
    }

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header('location: partnet.php');
    } else {
        echo 'Gagal memperbarui data';
    }
}

// Delete Partnet
if (isset($_GET['id_partnet'])) {
    $id_partnet = $_GET['id_partnet'];
    $query = "DELETE FROM partnet WHERE id_partnet='$id_partnet'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header('location: partnet.php');
    } else {
        echo 'Gagal menghapus data';
    }
}

?>
