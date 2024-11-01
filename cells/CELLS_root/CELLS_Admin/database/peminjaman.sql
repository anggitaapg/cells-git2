-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 08:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id_team` int(25) NOT NULL,
  `nama` text NOT NULL,
  `jabatan` text NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `kategori` enum('Executive','Intern','Advisor','Trustees') DEFAULT NULL,
  `linkedin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `periode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id_team`, `nama`, `jabatan`, `Foto`, `kategori`, `linkedin`, `email`, `cv`, `periode`) VALUES
(16, 'Nadia Mubarokah, M.S., M.Pd.', 'Cells Intern', 'Teh Nadia - Artboard 1@4x.png', 'Intern', '', '', '', ''),
(18, 'Fajar Miraz Fauzi, S.Pd.', 'Cells Intern', 'Fajar1 - Artboard 1@4x.png', 'Intern', '', '', '', ''),
(19, 'Rika Amalia, S.Pd.', 'Cells Intern', 'Rika - Artboard 1@4x.png', 'Intern', '', '', '', ''),
(20, 'Nissa Aulia Belistiana Utami, M.Pd.', 'Cells Intern', 'Teh Nisa - Artboard 1@4x.png', 'Intern', '', '', '', ''),
(21, 'Jezzy Putra Munggaran', 'Cells Intern', 'Profile CELLS Fix_Jezzy.png', 'Intern', '', '', '', ''),
(22, 'Arif Hidayat, M.Si., Ph DEd.', 'Head', 'Pak Arif1 - Artboard 1@4x.png', 'Executive', '', '', '', ''),
(23, 'Dr. rer. nat. Asep Supriatna, M.Si.', 'Vice Head', 'Dr.rer_.nat-Asep-Supriatna-M.Si_.-Artboard-1@4x.png', 'Executive', '', '', '', ''),
(24, 'Prof. Riandi, M.Si.', 'Secretary', 'Prof.-Riandi-M.Si_.-Artboard-1@4x.png', 'Executive', '', '', '', ''),
(25, 'Lina Aviyanti, Ph.D.', 'Treasurer', 'Lina-Aviyanti-Ph.D.-Artboard-1@4x.png', 'Executive', '', '', '', ''),
(26, 'Dr. Eni Nuraeni, M.Pd.', 'Coordinator of Partnership Division', 'Dr.-Eni-Nuraeni-M.Pd_.-Artboard-1@4x.png', 'Executive', '', '', '', ''),
(27, 'Utari Wijayanti, M.Si.', 'Coordinator of Academic Division', 'Utari-Wijayanti-M.Si_.-Artboard-1@4x.png', 'Executive', '', '', '', ''),
(28, 'Jajang Kusnendar, M.T.', 'Coordinator of Dissemination and Service Division', 'Pak-Jajang-Artboard-1@4x.png', 'Executive', '', '', '', ''),
(29, 'Triannisa Rahmawati, M.Si.', 'Coordinator of Research and Publications Division', 'Triannisa-Rahmawati-M.Si_.-Artboard-1@4x.png', 'Executive', '', '', '', ''),
(30, 'Dr. Yadi Ruyadi, M.Si.', 'Director of Direktorat Inovasi Pusat Unggulan Universitas (DIPUU) UPI', 'Dr.-Yadi-Ruyadi-M.Si_.-Artboard-1@4x.png', 'Advisor', '', '', '', ''),
(37, 'Prof. Dr. M. Solehuddin, M.A., M.Pd.', 'Rector', 'Prof.-Dr.-H.-M.-Solehuddin-M.Pd_.-MA.-Artboard-1@4x.png', 'Trustees', '', '', '', ''),
(38, 'Prof. Dr. Didi Sukyadi, M.A.', 'Vice Rector for Education and Student Affairs', 'Prof.-Dr.-Didi-Sukyadi-M.A.-Artboard-1@4x.png', 'Trustees', '', '', '', ''),
(39, 'Prof. Dr. Adang Suherman, M.A.', 'Vice Rector for Research, International, Cooperation, and Business', 'Prof.-Dr.-Adang-Suherman-M.A.-Artboard-1@4x.png', 'Trustees', '', '', '', ''),
(40, 'Prof. Dr. Agus Rahayu, M.Pd.', 'Vice Rector for Resources and Finance', 'Prof.-Dr.-Agus-Rahayu-M.Pd_.-Artboard-1@4x.png', 'Trustees', '', '', '', ''),
(41, 'Prof. Dr. Bunyamin, M.A., M.Pd.', 'Vice Rector for Planning, Organization, and Information Systems', 'Prof.-Dr.-Bunyamin-M.A.-M.Pd_.-Artboard-1@4x.png', 'Trustees', '', '', '', ''),
(45, 'Yunus Ilyasa', 'Software Engineer', 'Untitled design (20).png', 'Intern', 'https://www.linkedin.com/in/yunus-ilyasa/', '@gmail.com', 'https://', '2024-2025'),
(46, 'Anggita Apriliani Putri Gustiansyah', 'Software Engineer', 'Untitled design (21).png', 'Intern', 'https://www.linkedin.com/in/anggitaapg', 'anggitaaprilianii19@gmail.com', 'https://', '2024-2025'),
(47, 'Raihan Akbar Nugraha', 'Software Engineer', 'Untitled design (22).png', 'Intern', 'https://www.linkedin.com/in/raihanakbarn', 'raihanakbar1717@gmail.com', 'https://', '2024-2025'),
(49, 'Bhima Arya Dhaniswara', 'Software Engineer', 'Untitled design (24).png', 'Intern', 'https://www.linkedin.com/in/bhimaad18', 'bhima.arya56@gmail.com', 'https://', '2024-2025'),
(50, 'test', 'test', 'teampngwing.com (22).png', 'Executive', 'https://www.linkedin.com/in/anggitaapg', 'anggitaaprilianii19@gmail.com', 'https://', '2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `stok`, `deskripsi`, `foto`) VALUES
(3, 'Buku', 18, 'Buku Bagus', 'search.PNG'),
(4, 'Kursi', 98, 'Bagus', 'ALAT MQTT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `highlights`
--

CREATE TABLE `highlights` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `highlights`
--

INSERT INTO `highlights` (`id`, `title`, `image`, `link`) VALUES
(1, 'Web ', 'dummy-1.png', '#'),
(2, 'Graphic Design', 'dummy-2.png', '#'),
(3, 'Video Editing', 'dummy-3.png', '#'),
(4, 'Online Marketing', 'dummy-4.png', '#'),
(5, 'Photography', 'dummy-5.png', '#'),
(6, 'App Development', 'dummy-6.png', '#');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `judul`, `deskripsi`, `video`) VALUES
(9, 'Bima Lebah', 'Petualangan Lebah', 'lv_7136115179825155330_20220913195008.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `image_url`, `link_url`, `created_at`) VALUES
(1, 'New Course Launch', 'We are excited to announce the launch of our new course on Web Development.', '2024-10-10', 'img/course1.jpg', 'https://example.com/course-launch', '2024-10-16 08:47:30'),
(2, 'Special Workshop', 'Join our upcoming special workshop on AI and Machine Learning.', '2024-10-05', 'img/course2.jpg', 'https://example.com/ai-workshop', '2024-10-16 08:47:30'),
(3, 'Student Achievement', 'Congratulations to our students for winning the regional hackathon.', '2024-10-03', 'img/course3.jpg', 'https://example.com/student-achievement', '2024-10-16 08:47:30'),
(4, 'Upcoming Webinar', 'Don\'t miss our free webinar on digital marketing strategies.', '2024-09-30', 'img/course4.jpg', 'https://example.com/webinar', '2024-10-16 08:47:30'),
(5, 'Summer Bootcamp', 'Our intensive summer bootcamp is now open for registration.', '2024-09-25', 'img/course5.jpg', 'https://example.com/summer-bootcamp', '2024-10-16 08:47:30'),
(6, 'New Partnerships', 'We have formed new partnerships with leading tech companies.', '2024-09-20', 'img/course6.jpg', 'https://example.com/new-partnerships', '2024-10-16 08:47:30'),
(7, 'Scholarship Program', 'Apply now for our newly launched scholarship program.', '2024-09-15', 'img/course7.jpg', 'https://example.com/scholarship', '2024-10-16 08:47:30'),
(8, 'Coding Challenge', 'Participate in our coding challenge and win exciting prizes.', '2024-09-10', 'img/course8.jpg', 'https://example.com/coding-challenge', '2024-10-16 08:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `pinjambarang`
--

CREATE TABLE `pinjambarang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `lokasi_barang` text DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `dokumentasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjambarang`
--

INSERT INTO `pinjambarang` (`id`, `id_barang`, `id_user`, `qty`, `tgl_mulai`, `tgl_selesai`, `lokasi_barang`, `status`, `pdf_file`, `dokumentasi`) VALUES
(10, 4, 2, 5, '2023-12-14', '2023-12-16', 'Gedung I', 'selesai', NULL, NULL),
(11, 4, 2, 7, '2023-12-14', '2023-12-18', 'Gedung i', 'selesai', NULL, NULL),
(12, 3, 2, 1, '2023-12-22', '2023-12-14', 'aw', 'approve', NULL, NULL),
(13, 4, 2, 2, '2023-12-22', '2023-12-24', 'sda', 'menunggu', 'Sertif IC3.pdf', NULL),
(16, 3, 3, 1, '2023-12-27', '2023-12-29', 'aa', 'menunggu', 'Sertif IC3.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `pinjamruangan`
--

CREATE TABLE `pinjamruangan` (
  `id` int(11) NOT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `dokumentasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjamruangan`
--

INSERT INTO `pinjamruangan` (`id`, `id_ruangan`, `id_user`, `tgl_mulai`, `tgl_selesai`, `status`, `pdf_file`, `dokumentasi`) VALUES
(2, 4, 2, '2023-12-22', '2023-12-14', 'menunggu', NULL, NULL),
(3, 3, 3, '2023-12-27', '2023-12-28', 'approve', 'Sertif IC3.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama_ruangan`, `deskripsi`, `foto`, `status`) VALUES
(3, 'Gedung B', 'Gedung B Bagus', 'Multi.PNG', 'dipinjam'),
(4, 'Gedung I', 'Lantai 1', 'Alat.jpg', 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(7, 'Fun Fun Fun', 'Happy Happy Happy', '1730166383.png', '2024-10-29 01:46:23'),
(8, 'Happy', 'Lalalalala', '1730168126.png', '2024-10-29 02:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `nohp`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '089654362', 'admin', 'admin', 'admin'),
(2, 'Farhan Naufal', 'han@gmail.com', '085434243', 'han', '123', 'user'),
(3, 'Ahan', 'ahan', '12312', 'ahan', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id_team`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjambarang`
--
ALTER TABLE `pinjambarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjamruangan`
--
ALTER TABLE `pinjamruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id_team` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pinjambarang`
--
ALTER TABLE `pinjambarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pinjamruangan`
--
ALTER TABLE `pinjamruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
