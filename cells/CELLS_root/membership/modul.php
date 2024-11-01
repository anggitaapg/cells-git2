<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Simple Sidebar - Start Bootstrap Template</title>
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
                <h1 class="mt-4">Modul 1: Lorem Ipsum</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <div class="video-container">
                    <video class="video" width="640" height="360" controls>
                        <source src="video.mp4" type="video/mp4">
                        <source src="video.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <!-- Area Komentar -->
                <div class="comment-section">
                    <h2>Komentar</h2>
                    <form id="commentForm">
                        <div class="mb-3">
                            <label for="usernameInput" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="usernameInput" required />
                        </div>
                        <div class="mb-3">
                            <label for="commentInput" class="form-label">Tulis Komentar Anda:</label>
                            <textarea class="form-control" id="commentInput" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                    <div id="commentsList"></div>
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
