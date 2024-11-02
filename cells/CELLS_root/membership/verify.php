<?php
session_start();
include '../koneksi.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Periksa apakah token valid
    $stmt = $koneksi->prepare("SELECT * FROM membership WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Token valid, ubah status is_verified menjadi 1
        $stmt = $koneksi->prepare("UPDATE membership SET is_verified = 1, token = NULL WHERE token = ?");
        $stmt->bind_param("s", $token);

        if ($stmt->execute()) {
            // Setelah verifikasi, arahkan ke halaman login
            echo "<script>alert('Verifikasi berhasil! Silakan login untuk melanjutkan.'); window.location.href = 'login.php';</script>";
            exit();
        } else {
            echo "<div class='alert alert-danger'>Verifikasi gagal. Silakan coba lagi nanti.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Token tidak valid atau sudah kadaluarsa.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Token tidak ditemukan.</div>";
}
?>
