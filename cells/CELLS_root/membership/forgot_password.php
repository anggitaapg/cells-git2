<?php
session_start();
include '../koneksi.php';
require 'vendor/autoload.php'; // Include PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Proses permintaan reset kata sandi
if (isset($_POST['reset'])) {
    $email = $_POST['email'];

    // Cek apakah email terdaftar
    $stmt = $koneksi->prepare("SELECT * FROM membership WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $token = bin2hex(random_bytes(50)); // Generate a unique token

        // Simpan token di database
        $stmt = $koneksi->prepare("UPDATE membership SET token = ? WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Send reset password email
        $mail = new PHPMailer(true);
        try {
             // Server settings
             $mail->isSMTP();
             $mail->Host = 'smtp.gmail.com'; // Set the SMTP server
             $mail->SMTPAuth = true;
             $mail->Username = 'yunusilyasa@gmail.com';
             $mail->Password = 'rjhdpzbvrcznospl';
             $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
             $mail->Port = 587;

            // Recipients
            $mail->setFrom('your_email@gmail.com', 'Membership Lesson Studies'); // Ganti dengan email Anda
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body = "Hi, <br>Click the link below to reset your password: <br><a href='http://localhost/cells/CELLS_root/membership/reset_password.php?token=$token'>Reset Password</a>";

            $mail->send();
            echo "<script>alert('Email untuk reset kata sandi telah dikirim. Silakan cek email Anda.'); window.location.href = 'login.php';</script>";
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Email tidak dapat dikirim. Error: {$mail->ErrorInfo}</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email tidak terdaftar.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi</title>
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
    <h2 class="text-center">Lupa Kata Sandi</h2>
    <div class="card">
        <form method="post">
            <div class="form-group">
                <label for="resetEmail">Email:</label>
                <input type="email" name="email" class="form-control" id="resetEmail" required>
            </div>
            <button type="submit" name="reset" class="btn btn-primary">Kirim Link Reset</button>
            <p class="mt-3">Kembali ke <a href="login.php">Halaman Login</a></p>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
