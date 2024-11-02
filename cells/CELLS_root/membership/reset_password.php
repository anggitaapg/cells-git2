<?php
session_start();
include '../koneksi.php';

// Proses reset kata sandi
if (isset($_POST['update_password'])) {
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $token = $_POST['token'];

    // Cek token di database
    $stmt = $koneksi->prepare("SELECT * FROM membership WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update kata sandi
        $stmt = $koneksi->prepare("UPDATE membership SET password = ?, token = NULL WHERE token = ?");
        $stmt->bind_param("ss", $new_password, $token);
        if ($stmt->execute()) {
            echo "<script>alert('Kata sandi berhasil diperbarui. Silakan login.'); window.location.href = 'login.php';</script>";
        } else {
            echo "<div class='alert alert-danger'>Gagal memperbarui kata sandi.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Token tidak valid.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Sandi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 400px;
            margin-top: 100px;
        }
        .card {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Reset Kata Sandi</h2>
    <div class="card">
        <form method="post">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <div class="form-group">
                <label for="newPassword">Kata Sandi Baru:</label>
                <input type="password" name="new_password" class="form-control" id="newPassword" required>
            </div>
            <button type="submit" name="update_password" class="btn btn-primary">Perbarui Kata Sandi</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
