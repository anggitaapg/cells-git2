<?php
session_start();
include '../koneksi.php';

// Login
if (isset($_POST['login'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if ($email && $password) {
        // Query untuk memeriksa email
        $stmt = $koneksi->prepare("SELECT * FROM membership WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Memeriksa password
            if (password_verify($password, $user['password'])) {
                $_SESSION['email'] = $email; // Menyimpan email dalam session
                echo "<script>alert('Login berhasil!'); window.location.href = './index.php';</script>";
                exit; // Pastikan untuk exit setelah redirect
            } else {
                echo "<div class='alert alert-danger'>Password salah!</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Email tidak terdaftar.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email dan Password tidak boleh kosong.</div>";
    }
}

// Registrasi
if (isset($_POST['register'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';

    // Cek apakah email sudah terdaftar
    $stmt = $koneksi->prepare("SELECT * FROM membership WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='alert alert-danger'>Email sudah terdaftar. Silakan gunakan email lain.</div>";
    } else {
        // Masukkan ke database
        $stmt = $koneksi->prepare("INSERT INTO membership (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        if ($stmt->execute()) {
            echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location.href = 'login.php';</script>";
            exit; // Pastikan untuk exit setelah redirect
        } else {
            echo "<div class='alert alert-danger'>Pendaftaran gagal: " . $koneksi->error . "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Login & Register</title>
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
    <h2 class="text-center" id="formTitle">Login</h2>

    <div class="card">
        <!-- Form Login -->
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="loginEmail">Email:</label>
                <input type="email" name="email" class="form-control" id="loginEmail" required>
            </div>
            <div class="form-group">
                <label for="loginPassword">Password:</label>
                <input type="password" name="password" class="form-control" id="loginPassword" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <p class="mt-3">Belum punya akun? <a href="#" id="showRegister">Daftar di sini</a></p>
        </form>

        <!-- Form Register -->
        <form id="registerForm" method="post" style="display: none;">
            <div class="form-group">
                <label for="registerUsername">Username:</label>
                <input type="text" name="username" class="form-control" id="registerUsername" required>
            </div>
            <div class="form-group">
                <label for="registerEmail">Email:</label>
                <input type="email" name="email" class="form-control" id="registerEmail" required>
            </div>
            <div class="form-group">
                <label for="registerPassword">Password:</label>
                <input type="password" name="password" class="form-control" id="registerPassword" required>
            </div>
            <button type="submit" name="register" class="btn btn-success">Daftar</button>
            <p class="mt-3">Sudah punya akun? <a href="#" id="showLogin">Login di sini</a></p>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#showRegister').click(function(e) {
            e.preventDefault();
            $('#loginForm').hide();
            $('#registerForm').show();
            $('#formTitle').text('Daftar');
        });

        $('#showLogin').click(function(e) {
            e.preventDefault();
            $('#registerForm').hide();
            $('#loginForm').show();
            $('#formTitle').text('Login');
        });
    });
</script>
</body>
</html>
