-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 02:18 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tukang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `title_menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `title_menu`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `bintang`
--

CREATE TABLE `bintang` (
  `id_bintang` int(11) NOT NULL,
  `bintang` varchar(50) NOT NULL,
  `jumlah_bintang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bintang`
--

INSERT INTO `bintang` (`id_bintang`, `bintang`, `jumlah_bintang`) VALUES
(1, '1 Bintang', '<i class=\"bi bi-star-fill\"></i>'),
(2, '2 Bintang', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i>\r\n'),
(3, '3 Bintang', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i>'),
(4, '4 Bintang', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i>'),
(5, '5 Bintang', '<i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i><i class=\"bi bi-star-fill\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Pendor'),
(2, 'Penguna ');

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id`, `icon`, `title`, `deskripsi`, `harga`, `img`) VALUES
(1, 'fa-solid fa-mountain-city', 'Construction', 'Membangun rumah atau bangunan impian Anda dengan kualitas terbaik, dirancang untuk daya tahan dan keindahan.', 35000, 'construction-2.jpg'),
(2, 'fa-solid fa-arrow-up-from-ground-water', 'Remodeling', 'Ubah ruangan Anda menjadi lebih modern dan fungsional dengan layanan renovasi profesional dari kami.', 40000, 'remodeling-3.jpg'),
(3, 'fa-solid fa-compass-drafting', 'Design', 'Ciptakan ruang yang estetis dan sesuai kebutuhan Anda dengan desain interior dan eksterior yang berkelas.\r\n', 50000, 'design-1.jpg'),
(4, 'fa-sharp-duotone fa-solid fa-paint-roller', 'Painting & Finishing ', 'Layanan pengecatan dan penyelesaian yang memberikan tampilan sempurna untuk setiap sudut rumah Anda.', 35000, 'cat.jpeg'),
(5, 'fa-solid fa-trowel-bricks', 'Repairs', 'Perbaikan cepat dan terpercaya untuk menjaga rumah Anda tetap nyaman dan aman digunakan.', 25000, 'repairs-2.jpg'),
(6, 'fa-solid fa-broom', 'Decluttering', 'Menyulap ruang Anda menjadi lebih rapi dan terorganisir dengan layanan pembersihan dan penataan profesional.', 40000, 'bersih.jpg'),
(7, 'fab fa-youtube', 'coba 1', 'untuk coba', 25000, 'php_icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id` int(11) NOT NULL,
  `m_bayar` varchar(128) NOT NULL,
  `rekening` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_bayar`
--

INSERT INTO `metode_bayar` (`id`, `m_bayar`, `rekening`) VALUES
(1, 'dana', '081346699080123'),
(2, 'ovo  ', '081346699080456'),
(3, 'bca ', '081346699080789'),
(5, 'BRI', '081346699080321'),
(6, 'GoPay', '081346699080654');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `kategori_project` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `title_project` varchar(128) NOT NULL,
  `desk_project` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `kategori_project`, `img`, `title_project`, `desk_project`) VALUES
(1, 'filter-remodeling', 'remodeling-1.jpg', 'Home Upgrade', 'Transformasi rumah jadi lebih modern.'),
(2, 'filter-construction', 'construction-1.jpg', 'Strong Build', 'Konstruksi tahan lama dan aman.'),
(3, 'filter-repairs', 'repairs-1.jpg', 'Quick Fix', 'Solusi perbaikan cepat dan praktis.'),
(4, 'filter-design', 'design-1.jpg', 'Creative Design', 'Desain inovatif untuk ruang ideal.'),
(5, 'filter-remodeling', 'remodeling-2.jpg', 'Dream Remodel', 'Ubah rumah jadi impian Anda.'),
(6, 'filter-construction', 'construction-2.jpg', 'Solid Structure', 'Bangunan kokoh untuk masa depan.'),
(7, 'filter-repairs', 'repairs-2.jpg', 'Repair Pro', 'Perbaikan profesional dan cepat.'),
(8, 'filter-design', 'design-2.jpg', 'Elegant Space', 'Ruang elegan dengan sentuhan kreatif.'),
(9, 'filter-remodeling', 'remodeling-3.jpg', 'Modern Remodel', 'Renovasi modern untuk gaya hidup Anda.'),
(10, 'filter-construction', 'construction-3.jpg', 'Build Better', 'Pembangunan berkualitas tinggi.'),
(11, 'filter-repairs', 'repairs-3.jpg', 'Fix It All', 'semua masalah, satu solusi.'),
(12, 'filter-design', 'design-3.jpg', 'Unique Design', 'Desain unik, hasil memukau.'),
(13, 'filter-remodeling', 'design-1.jpg', 'keindahan', 'jangan lupa pesan dan jadi bagian dari penguna '),
(14, 'filter-Decluttering', 'remodeling-2.jpg', 'Kebersihan dan kenyaman ', 'jasa terbaik di sini, menjamin kebersihan \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu_admin`
--

CREATE TABLE `sub_menu_admin` (
  `id` int(11) NOT NULL,
  `name_menu` varchar(128) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menu_admin`
--

INSERT INTO `sub_menu_admin` (`id`, `name_menu`, `url`, `icon`) VALUES
(1, 'Dashboard', 'admin', 'bi bi-grid'),
(2, 'Profile', 'admin/profile', 'bi bi-person-vcard'),
(3, 'Jasa', 'admin/jasa', 'bi bi-buildings-fill'),
(4, 'Project', 'admin/project', 'bi bi-house-door-fill'),
(5, 'Metode Bayar', 'admin/metode', '\r\nbi bi-cash-coin'),
(6, 'Testimoni', 'admin/testimoni', 'bi bi-quote'),
(7, 'Transaksi selesai', 'admin/TransaksiSelesai', 'bi bi-cash'),
(8, 'Data User', 'admin/dataUser', 'bi bi-person-badge');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `img` varchar(255) DEFAULT 'default.jpg',
  `bintang` varchar(255) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `name_user`, `jabatan`, `img`, `bintang`, `komentar`) VALUES
(1, 'Saul Goodman', '1', 'testimonials-1.jpg', '5', 'Layanan cepat, hasil rapi, dan profesional. Sangat puas!'),
(2, 'Sara Wilsson', '2', 'testimonials-2.jpg', '5', 'Tim yang sangat terampil, hasil kerja benar-benar memuaskan.'),
(3, 'Jena Karlis', '2', 'testimonials-3.jpg', '5', 'Kualitas luar biasa, layanan yang ramah dan terpercaya!'),
(4, 'Matt Brandon', '2', 'testimonials-4.jpg', '5', 'Hasil kerja sangat memuaskan, rumah jadi lebih indah.'),
(5, 'John Larson', '2', 'testimonials-5.jpg', '5', 'Detail pekerjaan luar biasa, sangat merekomendasikan jasa ini!\r\n'),
(11, 'alexander rikky', '2', 'default.jpg', '5', 'jasa terbaikk lahh '),
(12, 'alexander rikky', '1', 'default.jpg', '5', 'sangat terbaik sekali ');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` varchar(128) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nama_jasa` varchar(128) NOT NULL,
  `jam` int(128) NOT NULL,
  `pekerja` int(11) NOT NULL,
  `total_bayar` int(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `tgl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `name`, `nama_jasa`, `jam`, `pekerja`, `total_bayar`, `email`, `metode`, `alamat`, `nomor`, `image`, `tgl`) VALUES
('111731002', 'alexander rikky', 'Construction', 1, 1, 35000, 'alexanderrikky10@gmail.com', '1', 'jalan perdana no 51', '48735346534283487234634', 'logo_himaif4.png', '1733480251');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_selesai`
--

CREATE TABLE `transaksi_selesai` (
  `no_transaksi` varchar(128) NOT NULL,
  `nama_jasa` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `ttl_jam` int(11) NOT NULL,
  `pekerja` int(11) NOT NULL,
  `ttl_bayar` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `metode_bayar` varchar(255) NOT NULL,
  `nomor` int(128) NOT NULL,
  `img` varchar(128) NOT NULL,
  `tgl_transaksi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'selesai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_selesai`
--

INSERT INTO `transaksi_selesai` (`no_transaksi`, `nama_jasa`, `name`, `ttl_jam`, `pekerja`, `ttl_bayar`, `email`, `alamat`, `metode_bayar`, `nomor`, `img`, `tgl_transaksi`, `status`) VALUES
('05112024028', 'Design', '', 1, 1, 50000, 'alexanderrikky123@gmail.com', 'urang unsa', '1', 2147483647, 'GKL2_Kapuas_hulu_-_Koleksilogo_com.jpg', '1730821496', 'selesai'),
('05112024036', 'Construction', '', 1, 1, 35000, 'alexanderrikky123@gmail.com', 'urang unsa', '2', 2147483647, 'css_icon1.jpeg', '2024-11-05 15:11:37', 'selesai'),
('072559028', 'Decluttering', 'alexander rikky', 3, 3, 360000, 'alexanderrikky100@gmail.com', 'jalan perdana no 51', '6', 2147483647, 'Gambar_WhatsApp_2024-02-07_pukul_14_31_57_abf7d5802.jpg', '1733120759', 'selesai'),
('073408028', 'Construction', 'alexander rikky', 6, 4, 840000, 'alexanderrikky10@gmail.com', 'jalan perdana', '1', 2147483647, 'logo_himaif.png', '1731652448', 'selesai'),
('093142028', 'Design', 'alexander rikky', 1, 1, 50000, 'alexanderrikky10@gmail.com', 'jalan perdana no 51', '5', 2147483647, 'logo_himaif2.png', '1732437102', 'selesai'),
('113116028', 'Construction', 'alexander rikky', 1, 1, 35000, 'alexanderrikky10@gmail.com', 'jalan perdana', '6', 2147483647, 'Gambar_WhatsApp_2024-02-07_pukul_14_31_57_abf7d5801.jpg', '1732357876', 'selesai'),
('142032028', 'Decluttering', 'alexander rikky', 1, 1, 40000, 'alexanderrikky10@gmail.com', 'jalan perdana', '1', 2147483647, 'GKL2_Kapuas_hulu_-_Koleksilogo_com2.jpg', '1731504032', 'selesai'),
('143512028', 'Construction', 'alexander rikky', 1, 1, 35000, 'alexanderrikky123@gmail.com', 'jalan perdana', '1', 2147483647, 'logo_amuk4.png', '1731936912', 'selesai'),
('165826028', 'Construction', '', 3, 1, 105000, 'alexanderrikky001@gmail.com', 'urang unsa', '1', 2147483647, 'html_icon.png', '1730822306', 'selesai'),
('170059028', 'Remodeling', '', 1, 1, 40000, 'alexanderrikky001@gmail.com', 'urang unsa', '2', 2147483647, 'GKL2_Kapuas_hulu_-_Koleksilogo_com1.jpg', '1730822459', 'selesai'),
('170338028', 'Design', '', 1, 1, 50000, 'alexanderrikky123@gmail.com', 'urang unsa', '6', 2147483647, 'Lambang_Kapuas_Hulu.png', '1730822618', 'selesai'),
('170813028', 'Construction', 'alexander rikky', 2, 2, 140000, 'alexanderrikky10@gmail.com', 'jalan perdana no 51', '6', 2147483647, 'logo_himaif3.png', '1732637293', 'selesai'),
('181505028', 'Construction', 'alexander rikky', 1, 1, 35000, 'alexanderrikky123@gmail.com', 'perdana ujung', '1', 2147483647, 'logo_amuk3.png', '1731518105', 'selesai'),
('184620028', 'Construction', 'alexander rikky', 1, 1, 35000, 'alexanderrikky123@gmail.com', 'uncak kapuas ', '1', 2147483647, 'GKL2_Kapuas_hulu_-_Koleksilogo_com3.jpg', '1731519980', 'selesai'),
('185056028', 'Remodeling', 'alexander rikky', 1, 1, 40000, 'alexanderrikky123@gmail.com', 'jalan perdana no 51', '1', 2147483647, 'Gambar_WhatsApp_2024-02-07_pukul_14_31_57_abf7d580.jpg', '1732038656', 'selesai'),
('191601028', 'Construction', 'alexander rikky', 3, 4, 420000, 'alexanderrikky10@gmail.com', 'kapuas hulu ', '1', 2147483647, 'logo_amuk2.png', '1731089761', 'selesai'),
('25', 'Construction', '', 1, 1, 35000, 'alexanderrikky123@gmail.com', 'urang unsa', '1', 2147483647, 'bayar2.jpg', '1729011106', 'selesai'),
('26', 'Construction', '', 1, 1, 35000, 'alexanderrikky123@gmail.com', 'urang unsa ', '1', 2147483647, 'one.png', '1729011839', 'selesai'),
('27', 'Construction', 'alexander rikky', 4, 1, 140000, 'alexanderrikky@gmail.com', 'jalan perdana no 51', '3', 2147483647, 'himaif.jpg', '1729093830', 'selesai'),
('28', 'Decluttering', '', 8, 1, 320000, 'alexanderrikky123@gmail.com', 'urang unsa', '3', 2147483647, 'kegiatan_2.jpg', '1729262612', 'selesai'),
('29', 'Construction', '', 1, 1, 35000, 'alexanderrikky123@gmail.com', 'desa urang unsa ', '1', 2147483647, 'himaif1.jpg', '1729489948', 'selesai'),
('30', 'Construction', '', 8, 1, 280000, 'alexanderrikky123@gmail.com', 'desa urang unsa', '1', 2147483647, 'kegiatan_4.jpg', '1729510101', 'selesai'),
('31', 'Painting & Finishing ', '', 8, 1, 280000, 'alexanderrikky123@gmail.com', 'desa unrang unsa\r\n', '2', 2147483647, 'kegiatan_21.jpg', '1729518371', 'selesai'),
('32', 'Repairs', '', 1, 1, 25000, 'alexanderrikky@gmail.com', 'desa urang unsa', '1', 2147483647, 'rikky123.jpg', '1729530186', 'selesai'),
('33', 'Remodeling', '', 7, 1, 280000, 'alexanderrikky@gmail.com', 'desa urang unsa', '1', 2147483647, 'kegiatan_1.jpg', '1729530379', 'selesai'),
('34', 'Design', '', 8, 5, 2000000, 'alexanderrikky@gmail.com', 'desa urang unsa', '2', 2147483647, 'php_icon.png', '1729661616', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `x_app` varchar(128) NOT NULL,
  `facebook` varchar(128) NOT NULL,
  `instagram` varchar(128) NOT NULL,
  `linkedin` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `alamat`, `tlp`, `x_app`, `facebook`, `instagram`, `linkedin`) VALUES
(8, 'alexander rikky', 'alexanderrikky123@gmail.com', 'default.jpg', '$2y$10$WX.fLVHszfhMPu.XdMBazO2cx4QWXIhTdnxOHW6bFomEWZ0Rm5h7e', 2, 1, 1721484211, 'desa Urang Unsa', '081346699080', 'https://x.com/AlexanderRikky1?t=zybZijYPbEPFbcYvcE3Jaw&s=09', '', 'https://www.instagram.com/alexanderrikky10/profilecard/?igsh=MTV5YXR0aXcxYW13Zg==', ''),
(9, 'ALEXANDER RIKKY', 'alexanderrikky@gmail.com', 'logo_himaif1.png', '$2y$10$wvgl5yHoItQHCyA6FDAvbOsX7I4jspdrObEPvz4LSb7pcsMe6FVJm', 1, 1, 1727079404, 'desa Urang Unsa', '081346699080', 'https://x.com/AlexanderRikky1?t=HZwlMd2rhqGwnyu4hFebGA&s=09', 'https://www.instagram.com/alexanderrikky10/profilecard/?igsh=MTV5YXR0aXcxYW13Zg==', 'https://www.instagram.com/alexanderrikky10/profilecard/?igsh=MTV5YXR0aXcxYW13Zg==', 'https://www.instagram.com/alexanderrikky10/profilecard/?igsh=MTV5YXR0aXcxYW13Zg=='),
(10, 'ALEXANDER RIKKY', 'boy@gmail.com', 'default.jpg', '$2y$10$N6UbWwfyaw28DgqkdWKj3.Sel/asylP.RjLkWfjFqQhvL7VGjW7t2', 2, 1, 1729663328, 'desa Urang Unsa', '0', '', '', '', ''),
(12, 'alexander rikky', 'alexanderrikky10@gmail.com', 'logo_himaif2.png', '$2y$10$iupZ89e3XC8p9MB2gjbFyuxSAJS1lOze9GHIGrKd9EhKN.L4UFwzy', 2, 1, 1731089722, 'desa Urang Unsa', '081346699080', 'https://x.com/AlexanderRikky1?t=HZwlMd2rhqGwnyu4hFebGA&s=09', 'https://www.instagram.com/alexanderrikky10/profilecard/?igsh=MTV5YXR0aXcxYW13Zg==', 'https://www.instagram.com/alexanderrikky10/profilecard/?igsh=MTV5YXR0aXcxYW13Zg==', 'https://www.instagram.com/alexanderrikky10/profilecard/?igsh=MTV5YXR0aXcxYW13Zg=='),
(16, 'alexander rikky', 'alexanderrikky001@gmail.com', 'default.jpg', '$2y$10$3YNRTpa1gj7zPv2qmILs1uZ534Zht6CIlfvOgHxFqiM7a88nsPt2K', 2, 1, 1733085437, '', '', '', '', '', ''),
(17, 'alexander rikky', 'alexanderrikky100@gmail.com', 'default.jpg', '$2y$10$Ft1WSi/5YMLNjEpFzq6Mnu0Oyj8Xui5CG7u/n1KuJJaMo2mdNae6G', 2, 1, 1733120524, '', '', '', '', '', ''),
(18, 'admin', 'admin@gmail.com', 'default.jpg', '$2y$10$S4vgAWDBGa2nOZsQ6j8KMu/5kqYvF.GDfS/ioGqhojNsgD2gltOwO', 1, 1, 1736435514, '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bintang`
--
ALTER TABLE `bintang`
  ADD PRIMARY KEY (`id_bintang`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `sub_menu_admin`
--
ALTER TABLE `sub_menu_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_selesai`
--
ALTER TABLE `transaksi_selesai`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bintang`
--
ALTER TABLE `bintang`
  MODIFY `id_bintang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_menu_admin`
--
ALTER TABLE `sub_menu_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
