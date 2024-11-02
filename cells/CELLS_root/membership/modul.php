<?php
require '../koneksi.php'; // Pastikan path untuk koneksi.php benar

// Ambil data konten berdasarkan kondisi, misalnya id_konten atau urutan tertentu
$sql = "SELECT * FROM konten ORDER BY id_konten DESC LIMIT 1"; // Menampilkan konten terbaru
$result = mysqli_query($koneksi, $sql);
$commentsQuery = mysqli_query($koneksi, "SELECT * FROM comment ORDER BY username DESC");

// Periksa apakah ada data yang ditemukan
if ($data = mysqli_fetch_assoc($result)) {
    $judul = $data['judul'];
    $deskripsi = $data['deskripsi'];
    $videoUrl = $data['video_url'];
} else {
    // Set nilai default jika tidak ada konten yang ditemukan
    $judul = "Tidak ada konten";
    $deskripsi = "Deskripsi tidak tersedia";
    $videoUrl = ""; // Set ke URL default atau kosong
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $comment = mysqli_real_escape_string($koneksi, $_POST['comment']);

    if ($username && $comment) {
        $sqlInsert = "INSERT INTO comment (username, comment, created_at) VALUES ('$username', '$comment', NOW())";
        
        if (mysqli_query($koneksi, $sqlInsert)) {
            echo "<p>Komentar berhasil disimpan.</p>";
        } else {
            echo "<p>Error: " . mysqli_error($koneksi) . "</p>";
        }
    } else {
        echo "<p>Data username atau komentar kosong.</p>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Modul</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .navbar {
            height: 79px;
        }
        .video-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        video {
            max-width: 100%;
            height: auto;
        }
        .comment-section {
            margin-top: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .comment {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .comment-user {
            font-weight: bold;
            font-size: 14px;
            color: #333;
        }
        .comment-time {
            font-size: 12px;
            color: #888;
            margin-left: 5px;
        }
        .comment-text {
            margin-top: 5px;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php include "header.php" ?>
            <!-- Page content-->
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo $judul; ?></h1>
                <p>
                    <?php echo $deskripsi; ?>
                </p>
                <div class="video-container">
                    <?php if ($videoUrl): ?>
                    <video class="video" width="640" height="360" controls>
                    <source src="<?php echo $videoUrl; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <?php else: ?>
                        <p>Video tidak tersedia.</p>
                    <?php endif; ?>
                </div>
                <!-- Area Komentar -->
                <div class="comment-section">
                    <h2>Komentar</h2>
                    <form id="commentForm" method="POST" action="">
                        <div class="mb-3">
                            <label for="usernameInput" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="usernameInput" name="username" required />
                        </div>
                        <div class="mb-3">
                            <label for="commentInput" class="form-label">Tulis Komentar Anda:</label>
                            <textarea class="form-control" id="commentInput" name="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                    <div id="commentsList">
                        <?php while ($row = mysqli_fetch_assoc($commentsQuery)) : ?>
                            <div class="comment">
                                <p><strong><?= htmlspecialchars($row['username']) ?>:</strong> <?= htmlspecialchars($row['comment']) ?></p>
                                <small><?= $row['created_at'] ?></small>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
        const commentForm = document.getElementById('commentForm');
        const usernameInput = document.getElementById('usernameInput');
        const commentInput = document.getElementById('commentInput');
        const commentsList = document.getElementById('commentsList');

        function formatTimeAgo(timestamp) {
            const now = new Date();
            const secondsAgo = Math.floor((now - timestamp) / 1000);
            if (secondsAgo < 60) return `${secondsAgo} seconds ago`;
            const minutesAgo = Math.floor(secondsAgo / 60);
            if (minutesAgo < 60) return `${minutesAgo} minutes ago`;
            const hoursAgo = Math.floor(minutesAgo / 60);
            if (hoursAgo < 24) return `${hoursAgo} hours ago`;
            const daysAgo = Math.floor(hoursAgo / 24);
            return `${daysAgo} days ago`;
        }

        function updateCommentTimes() {
            const commentTimes = document.querySelectorAll('.comment-time');
            commentTimes.forEach(timeElement => {
                const timestamp = new Date(timeElement.getAttribute('data-timestamp'));
                timeElement.textContent = formatTimeAgo(timestamp);
            });
        }

        commentForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const timestamp = new Date();

            const comment = document.createElement('div');
            comment.classList.add('comment');
            comment.innerHTML = `
                <div class="comment-user">${usernameInput.value}
                    <span class="comment-time" data-timestamp="${timestamp.toISOString()}">${formatTimeAgo(timestamp)}</span>
                </div>
                <div class="comment-text">${commentInput.value}</div>
            `;

            commentsList.appendChild(comment);

            usernameInput.value = '';
            commentInput.value = '';

            updateCommentTimes();
        });

        setInterval(updateCommentTimes, 60000); // Perbarui waktu komentar setiap 60 detik
    </script>
</body>
</html>