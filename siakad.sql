-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2025 pada 15.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `nama_gambar` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `nama_gambar`, `deskripsi`) VALUES
(13, '01-guru.png', 'Guru'),
(14, '02-visi.png', 'Visi'),
(15, '03-misi.png', 'Misi'),
(16, '04-KBM.png', 'Kegiatan Belajar Mengajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` varchar(100) DEFAULT NULL,
  `NIP` varchar(25) DEFAULT NULL,
  `status_pegawai` varchar(50) DEFAULT NULL,
  `jenis_ptk` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `NIP`, `status_pegawai`, `jenis_ptk`, `agama`, `telp`, `email`) VALUES
(1, 'Abdul Latif', 'L', 'Tangerang', '1985-02-25', '198502252022211014', 'PPPK', 'Guru', 'Islam', '082310604323', 'abdullative85@gmail.com'),
(2, 'Ade Sutiyan', 'L', 'Tangerang', '1997-05-02', '', 'Honor', 'Guru', 'Islam', '085892769283', 'adesutiyan10@gmail.com'),
(3, 'Aepi', 'L', 'Tangerang', '1977-05-02', '197705102024211004', 'PPPK', 'Guru', 'Islam', '085887782250', 'aepiwais77@gmail.com'),
(4, 'Ahmad Syahrullah', 'L', 'Tangerang', '1994-08-19', '199408192024211008', 'PPPK', 'Guru', 'Islam', '085892976092', 'syahrullahahmad20@gmail.com'),
(5, 'Andhyka Eddy Casmudi', 'L', 'Pemalang', '1991-03-29', '199103292022211017', 'PPPK', 'Guru', 'Islam', '085891138778', 'adrian.mendem@gmail.com'),
(6, 'Ayu Nurfitriyani', 'P', 'Tangerang', '1990-01-02', '199001022023212008', 'PPPK', 'Guru', 'Islam', '08551183321', 'ayunurfitriyani90@gmail.com'),
(7, 'Elah Haryati', 'P', 'Tangerang', '1981-01-08', '198101082024212004', 'PPPK', 'Guru', 'Islam', '081212140181', 'ellaharyati30@gmail.com'),
(8, 'Erwan Sutrisna', 'L', 'Tangerang', '1990-03-20', '199003202022211008', 'PPPK', 'Guru', 'Islam', '083895909862', 'emiryusufsyakib@gmail.com'),
(9, 'Euis Kurniasih', 'P', 'Tangerang', '1976-06-21', '197606212021212002', 'PPPK', 'Guru', 'Islam', '081296222547', 'euiskurniasihardi@gmail.com'),
(10, 'Iin Kurniasih', 'P', 'Tangerang', '1971-05-04', '197105042022212005', 'PPPK', 'Guru', 'Islam', '085218610447', 'iin.kurniasih04@gmail.com'),
(11, 'Irma Indriyanti', 'P', 'Tangerang', '1989-03-24', '198903242019032017', 'PNS', 'Guru', 'Islam', '089639901779', 'irmaindriyanti1989@gmail.com'),
(12, 'Kartika Dewi', 'P', 'Tangerang', '1978-08-08', '197808082014062003', 'PNS', 'Guru', 'Islam', '081318922828', 'k.dewi78@gmail.com'),
(13, 'Mokh. Nursetiawan', 'L', 'Tangerang', '1970-10-09', '197010092008011006', 'PNS', 'Guru', 'Islam', '081246332721', 'nursetiawan1970@gmail.com'),
(14, 'Mukti Hartani', 'P', 'Pemalang', '1975-10-10', '197510102014062001', 'PNS', 'Guru', 'Islam', '081210827753', 'mhartani50@gmail.com'),
(15, 'Mutamar', 'L', 'Tangerang', '1966-08-12', '196608122010011004', 'PNS', 'Guru', 'Islam', '081311405345', 'mutamar66@gmail.com'),
(16, 'Neneng Komariah', 'P', 'Tangerang', '1971-05-03', '197105032006042017', 'PNS', 'Guru', 'Islam', '081384563401', 'nengkom1971@gmail.com'),
(17, 'Nova Nutiana', 'P', 'Tangerang', '1989-11-14', NULL, 'Honor', 'Guru', 'Islam', '082210746667', 'novanutiana@gmail.com'),
(18, 'Nuraeni', 'P', 'Jakarta', '1976-07-12', '197607122021212008', 'PPPK', 'Guru', 'Islam', '085217996164', 'nuraenilala76@gmail.com'),
(19, 'Nurseha', 'P', 'Tangerang', '1986-07-16', NULL, 'Honor', 'Guru', 'Islam', '083813826701', 'nnurseha206@gmail.com'),
(20, 'Rizka Hafidzin Nur', 'L', 'Tangerang', '1998-05-03', NULL, 'Honor', 'Guru', 'Islam', '082111240162', 'rizkahafidzin78@gmail.com'),
(21, 'Rumjanah', 'P', 'Tangerang', '1994-04-15', '199404152022212020', 'PPPK', 'Guru', 'Islam', '082299210269', 'yuu.rumjanah@gmail.com'),
(22, 'Sapri', 'L', 'Tangerang', '1972-08-06', '197208062014061001', 'Honor', 'Guru', 'Islam', '085310165595', 'sapri.smpn1kemiri@gmail.com'),
(23, 'Shelvia Suryani', 'P', 'Tangerang', '1998-05-01', NULL, 'Honor', 'Guru', 'Islam', '081293515030', 'shelviasuryanii@gmail.com'),
(24, 'Sidik Kostaman', 'L', 'Ciamis', '1989-09-04', '198909042022211005', 'PPPK', 'Guru', 'Islam', '085223339724', 'sk.04costa@gmail.com'),
(25, 'Siti Muminah', 'P', 'Tangerang', '1972-10-15', '197210152008012006', 'PNS', 'Guru', 'Islam', '087791030999', 'muminahsiti72@gmail.com'),
(26, 'Suami', 'P', 'Tangerang', '1970-04-06', '197004062003122001', 'PNS', 'Guru', 'Islam', '082111955724', 'suamidar@gmail.com'),
(27, 'Suaebah', 'P', 'Tangerang', '1972-11-21', '197211212006042010', 'PNS', 'Guru', 'Islam', '08129861271', 'ebah1972@gmail.com'),
(28, 'Suhendrik', 'L', 'Tangerang', '1989-06-07', '198906072022211011', 'PPPK', 'Guru', 'Islam', '085883534848', 'hendrik89.h8@gmail.com'),
(29, 'Susi Aprilianti', 'P', 'Tangerang', '1993-04-05', NULL, 'Honor', 'Guru', 'Islam', '081282221913', 'susi.aprilianti5@gmail.com'),
(30, 'Tati Handini', 'P', 'Tangerang', '1981-03-12', '198103122022212020', 'PPPK', 'Guru', 'Islam', '0895635500278', 'tatihandini@gmail.com'),
(31, 'Tati Mayasari', 'P', 'Tangerang', '1986-05-06', '198605062022212053', 'PPPK', 'Guru', 'Islam', '087878763384', 'tatimayasari86@gmail.com'),
(32, 'Topik Hidayat', 'L', 'Tangerang', '1985-03-17', '198503172022211028', 'PPPK', 'Guru', 'Islam', '085714604888', 'topik1700@gmail.com'),
(33, 'Uguh Sugianto', 'L', 'Tangerang', '1991-03-21', '199103212022211008', 'PPPK', 'Guru', 'Islam', '085710276426', 'uguhraya21@gmail.com'),
(34, 'Uyun Wahyuni', 'P', 'Tangerang', '1979-06-24', '197906242006042029', 'PNS', 'Guru', 'Islam', '081511457200', 'uyunwahyuni08@gmail.com'),
(35, 'Yuyu Yuningsih', 'P', 'Tangerang', '1974-06-17', '197406172023212003', 'PPPK', 'Guru', 'Islam', '087750642508', 'zahra.putrikamiila@gmail.com'),
(36, 'Afnia Nursofianita', 'P', 'Tangerang', '1999-07-30', NULL, 'Non ASN', 'Guru', 'Islam', '085702227698', 'afnianursofianita@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_mapel`, `id_guru`, `id_kelas`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(21, 9, 28, 1, 'Senin', '08:10:00', '09:30:00'),
(22, 5, 3, 1, 'Senin', '09:30:00', '10:10:00'),
(23, 10, 5, 1, 'Senin', '10:40:00', '12:00:00'),
(24, 8, 2, 1, 'Senin', '12:40:00', '14:00:00'),
(25, 4, 36, 1, 'Selasa', '07:10:00', '08:30:00'),
(26, 6, 23, 1, 'Selasa', '08:30:00', '09:50:00'),
(27, 1, 25, 1, 'Selasa', '10:20:00', '11:00:00'),
(28, 2, 18, 1, 'Selasa', '11:00:00', '11:40:00'),
(29, 9, 18, 1, 'Selasa', '11:40:00', '12:20:00'),
(30, 1, 25, 1, 'Rabu', '13:00:00', '14:20:00'),
(31, 5, 3, 1, 'Selasa', '13:00:00', '14:20:00'),
(32, 4, 36, 1, 'Rabu', '07:10:00', '08:30:00'),
(33, 7, 21, 1, 'Rabu', '08:30:00', '09:50:00'),
(34, 8, 2, 1, 'Rabu', '10:20:00', '11:00:00'),
(35, 3, 29, 1, 'Rabu', '11:00:00', '12:20:00'),
(36, 7, 21, 1, 'Kamis', '07:10:00', '08:30:00'),
(37, 6, 23, 1, 'Kamis', '08:30:00', '09:50:00'),
(38, 3, 29, 1, 'Kamis', '10:20:00', '11:40:00'),
(39, 4, 36, 1, 'Kamis', '11:40:00', '12:20:00'),
(40, 2, 18, 1, 'Senin', '13:00:00', '14:20:00'),
(41, 5, 3, 1, 'Jumat', '07:50:00', '09:10:00'),
(42, 3, 29, 1, 'Jumat', '09:40:00', '11:00:00'),
(43, 4, 24, 2, 'Jumat', '07:50:00', '09:10:00'),
(44, 9, 5, 2, 'Jumat', '09:40:00', '11:00:00'),
(45, 3, 9, 2, 'Kamis', '07:10:00', '08:30:00'),
(46, 9, 20, 2, 'Senin', '08:10:00', '09:30:00'),
(47, 1, 25, 2, 'Senin', '09:30:00', '10:10:00'),
(48, 2, 35, 2, 'Senin', '10:40:00', '12:00:00'),
(49, 7, 30, 2, 'Senin', '12:40:00', '14:00:00'),
(50, 5, 3, 2, 'Selasa', '07:10:00', '08:30:00'),
(51, 3, 9, 2, 'Selasa', '08:30:00', '09:50:00'),
(52, 4, 24, 2, 'Selasa', '11:20:00', '11:40:00'),
(53, 2, 35, 2, 'Selasa', '11:40:00', '12:20:00'),
(54, 6, 8, 2, 'Selasa', '13:00:00', '14:20:00'),
(55, 3, 9, 2, 'Rabu', '07:10:00', '08:30:00'),
(56, 1, 25, 2, 'Rabu', '08:30:00', '09:50:00'),
(57, 8, 18, 2, 'Rabu', '10:20:00', '11:00:00'),
(58, 9, 20, 2, 'Rabu', '11:00:00', '11:40:00'),
(59, 5, 3, 2, 'Rabu', '11:40:00', '12:20:00'),
(60, 6, 8, 2, 'Rabu', '13:00:00', '14:20:00'),
(61, 7, 30, 2, 'Kamis', '08:30:00', '09:50:00'),
(62, 8, 18, 2, 'Kamis', '10:20:00', '11:40:00'),
(63, 4, 24, 2, 'Kamis', '11:40:00', '12:20:00'),
(64, 5, 3, 2, 'Kamis', '13:00:00', '14:20:00'),
(65, 4, 34, 3, 'Senin', '08:10:00', '09:30:00'),
(66, 5, 14, 3, 'Senin', '09:30:00', '10:10:00'),
(67, 7, 30, 3, 'Senin', '10:40:00', '12:00:00'),
(68, 3, 12, 3, 'Senin', '12:40:00', '14:00:00'),
(69, 9, 33, 3, 'Selasa', '07:10:00', '08:30:00'),
(70, 2, 13, 3, 'Selasa', '08:30:00', '09:50:00'),
(71, 6, 1, 3, 'Selasa', '10:20:00', '11:40:00'),
(72, 4, 34, 3, 'Selasa', '11:40:00', '12:20:00'),
(73, 8, 23, 3, 'Selasa', '13:00:00', '14:20:00'),
(74, 5, 14, 3, 'Rabu', '07:10:00', '08:30:00'),
(75, 3, 12, 3, 'Rabu', '08:30:00', '09:50:00'),
(76, 2, 13, 3, 'Rabu', '10:20:00', '11:00:00'),
(77, 9, 33, 3, 'Rabu', '11:00:00', '11:40:00'),
(78, 8, 23, 3, 'Rabu', '11:40:00', '12:20:00'),
(79, 4, 34, 3, 'Rabu', '13:00:00', '14:20:00'),
(80, 5, 14, 3, 'Kamis', '07:10:00', '08:30:00'),
(81, 3, 12, 3, 'Kamis', '08:30:00', '09:50:00'),
(82, 1, 16, 3, 'Kamis', '10:20:00', '11:00:00'),
(83, 10, 10, 3, 'Kamis', '11:00:00', '12:20:00'),
(84, 6, 1, 3, 'Kamis', '13:00:00', '14:20:00'),
(85, 1, 16, 3, 'Jumat', '07:50:00', '09:10:00'),
(86, 7, 6, 3, 'Jumat', '09:40:00', '11:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `id_guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_guru`) VALUES
(1, '7', NULL),
(2, '8', NULL),
(3, '9', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'PAI'),
(2, 'PPKn'),
(3, 'BIN'),
(4, 'MTK'),
(5, 'IPA'),
(6, 'IPS'),
(7, 'BING'),
(8, 'SBK'),
(9, 'PJOK'),
(10, 'PRAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `nilai` decimal(5,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_mapel`, `id_guru`, `nilai`) VALUES
(267, 41, 1, NULL, 89.00),
(268, 41, 2, NULL, 88.00),
(269, 41, 3, NULL, 87.00),
(270, 41, 4, NULL, 86.00),
(271, 41, 5, NULL, 85.00),
(272, 41, 6, NULL, 84.00),
(273, 41, 7, NULL, 83.00),
(274, 41, 8, NULL, 82.00),
(275, 41, 9, NULL, 91.00),
(276, 41, 10, NULL, 81.00),
(277, 42, 1, NULL, 81.00),
(278, 42, 2, NULL, 86.00),
(279, 42, 3, NULL, 86.00),
(280, 42, 4, NULL, 83.00),
(281, 42, 5, NULL, 86.00),
(282, 42, 6, NULL, 87.00),
(283, 42, 7, NULL, 89.00),
(284, 42, 8, NULL, 81.00),
(285, 42, 9, NULL, 91.00),
(286, 42, 10, NULL, 74.00),
(287, 43, 1, NULL, 87.00),
(288, 43, 2, NULL, 80.00),
(289, 43, 3, NULL, 83.00),
(290, 43, 4, NULL, 81.00),
(291, 43, 5, NULL, 81.00),
(292, 43, 6, NULL, 80.00),
(293, 43, 7, NULL, 83.00),
(294, 43, 8, NULL, 86.00),
(295, 43, 9, NULL, 91.00),
(296, 43, 10, NULL, 81.00),
(297, 44, 1, NULL, 86.00),
(298, 44, 2, NULL, 83.00),
(299, 44, 3, NULL, 83.00),
(300, 44, 4, NULL, 76.00),
(301, 44, 5, NULL, 80.00),
(302, 44, 6, NULL, 80.00),
(303, 44, 7, NULL, 85.00),
(304, 44, 8, NULL, 86.00),
(305, 44, 9, NULL, 88.00),
(306, 44, 10, NULL, 85.00),
(307, 45, 1, NULL, 81.00),
(308, 45, 2, NULL, 87.00),
(309, 45, 3, NULL, 86.00),
(310, 45, 4, NULL, 79.00),
(311, 45, 5, NULL, 81.00),
(312, 45, 6, NULL, 79.00),
(313, 45, 7, NULL, 79.00),
(314, 45, 8, NULL, 82.00),
(315, 45, 9, NULL, 91.00),
(316, 45, 10, NULL, 86.00),
(317, 46, 1, NULL, 81.00),
(318, 46, 2, NULL, 83.00),
(319, 46, 3, NULL, 86.00),
(320, 46, 4, NULL, 77.00),
(321, 46, 5, NULL, 81.00),
(322, 46, 6, NULL, 77.00),
(323, 46, 7, NULL, 81.00),
(324, 46, 8, NULL, 85.00),
(325, 46, 9, NULL, 91.00),
(326, 46, 10, NULL, 86.00),
(327, 47, 1, NULL, 80.00),
(328, 47, 2, NULL, 87.00),
(329, 47, 3, NULL, 86.00),
(330, 47, 4, NULL, 80.00),
(331, 47, 5, NULL, 80.00),
(332, 47, 6, NULL, 79.00),
(333, 47, 7, NULL, 80.00),
(334, 47, 8, NULL, 81.00),
(335, 47, 9, NULL, 88.00),
(336, 47, 10, NULL, 86.00),
(337, 48, 1, NULL, 86.00),
(338, 48, 2, NULL, 83.00),
(339, 48, 3, NULL, 86.00),
(340, 48, 4, NULL, 78.00),
(341, 48, 5, NULL, 79.00),
(342, 48, 6, NULL, 78.00),
(343, 48, 7, NULL, 79.00),
(344, 48, 8, NULL, 87.00),
(345, 48, 9, NULL, 91.00),
(346, 48, 10, NULL, 79.00),
(347, 49, 1, NULL, 87.00),
(348, 49, 2, NULL, 82.00),
(349, 49, 3, NULL, 85.00),
(350, 49, 4, NULL, 79.00),
(351, 49, 5, NULL, 78.00),
(352, 49, 6, NULL, 77.00),
(353, 49, 7, NULL, 75.00),
(354, 49, 8, NULL, 87.00),
(355, 49, 9, NULL, 88.00),
(356, 49, 10, NULL, 76.00),
(357, 50, 1, NULL, 81.00),
(358, 50, 2, NULL, 82.00),
(359, 50, 3, NULL, 83.00),
(360, 50, 4, NULL, 76.00),
(361, 50, 5, NULL, 80.00),
(362, 50, 6, NULL, 77.00),
(363, 50, 7, NULL, 81.00),
(364, 50, 8, NULL, 86.00),
(365, 50, 9, NULL, 91.00),
(366, 50, 10, NULL, 76.00),
(367, 51, 1, NULL, 88.00),
(368, 51, 2, NULL, 87.00),
(369, 51, 3, NULL, 88.00),
(370, 51, 4, NULL, 85.00),
(371, 51, 5, NULL, 85.00),
(372, 51, 6, NULL, 83.00),
(373, 51, 7, NULL, 84.00),
(374, 51, 8, NULL, 85.00),
(375, 51, 9, NULL, 92.00),
(376, 51, 10, NULL, 80.00),
(377, 52, 1, NULL, 80.00),
(378, 52, 2, NULL, 87.00),
(379, 52, 3, NULL, 87.00),
(380, 52, 4, NULL, 82.00),
(381, 52, 5, NULL, 85.00),
(382, 52, 6, NULL, 86.00),
(383, 52, 7, NULL, 88.00),
(384, 52, 8, NULL, 80.00),
(385, 52, 9, NULL, 90.00),
(386, 52, 10, NULL, 73.00),
(387, 53, 1, NULL, 88.00),
(388, 53, 2, NULL, 80.00),
(389, 53, 3, NULL, 82.00),
(390, 53, 4, NULL, 80.00),
(391, 53, 5, NULL, 80.00),
(392, 53, 6, NULL, 77.00),
(393, 53, 7, NULL, 82.00),
(394, 53, 8, NULL, 85.00),
(395, 53, 9, NULL, 90.00),
(396, 53, 10, NULL, 80.00),
(397, 54, 1, NULL, 85.00),
(398, 54, 2, NULL, 82.00),
(399, 54, 3, NULL, 82.00),
(400, 54, 4, NULL, 75.00),
(401, 54, 5, NULL, 79.00),
(402, 54, 6, NULL, 79.00),
(403, 54, 7, NULL, 84.00),
(404, 54, 8, NULL, 85.00),
(405, 54, 9, NULL, 87.00),
(406, 54, 10, NULL, 85.00),
(407, 55, 1, NULL, 80.00),
(408, 55, 2, NULL, 86.00),
(409, 55, 3, NULL, 85.00),
(410, 55, 4, NULL, 78.00),
(411, 55, 5, NULL, 80.00),
(412, 55, 6, NULL, 78.00),
(413, 55, 7, NULL, 78.00),
(414, 55, 8, NULL, 81.00),
(415, 55, 9, NULL, 92.00),
(416, 55, 10, NULL, 85.00),
(417, 56, 1, NULL, 80.00),
(418, 56, 2, NULL, 82.00),
(419, 56, 3, NULL, 85.00),
(420, 56, 4, NULL, 75.00),
(421, 56, 5, NULL, 80.00),
(422, 56, 6, NULL, 76.00),
(423, 56, 7, NULL, 80.00),
(424, 56, 8, NULL, 84.00),
(425, 56, 9, NULL, 92.00),
(426, 56, 10, NULL, 85.00),
(427, 57, 1, NULL, 80.00),
(428, 57, 2, NULL, 85.00),
(429, 57, 3, NULL, 85.00),
(430, 57, 4, NULL, 80.00),
(431, 57, 5, NULL, 80.00),
(432, 57, 6, NULL, 78.00),
(433, 57, 7, NULL, 78.00),
(434, 57, 8, NULL, 80.00),
(435, 57, 9, NULL, 87.00),
(436, 57, 10, NULL, 85.00),
(437, 58, 1, NULL, 85.00),
(438, 58, 2, NULL, 82.00),
(439, 58, 3, NULL, 85.00),
(440, 58, 4, NULL, 77.00),
(441, 58, 5, NULL, 78.00),
(442, 58, 6, NULL, 77.00),
(443, 58, 7, NULL, 78.00),
(444, 58, 8, NULL, 86.00),
(445, 58, 9, NULL, 90.00),
(446, 58, 10, NULL, 78.00),
(447, 59, 1, NULL, 86.00),
(448, 59, 2, NULL, 81.00),
(449, 59, 3, NULL, 84.00),
(450, 59, 4, NULL, 78.00),
(451, 59, 5, NULL, 77.00),
(452, 59, 6, NULL, 76.00),
(453, 59, 7, NULL, 74.00),
(454, 59, 8, NULL, 86.00),
(455, 59, 9, NULL, 87.00),
(456, 59, 10, NULL, 75.00),
(457, 60, 1, NULL, 80.00),
(458, 60, 2, NULL, 81.00),
(459, 60, 3, NULL, 82.00),
(460, 60, 4, NULL, 75.00),
(461, 60, 5, NULL, 79.00),
(462, 60, 6, NULL, 76.00),
(463, 60, 7, NULL, 80.00),
(464, 60, 8, NULL, 85.00),
(465, 60, 9, NULL, 90.00),
(466, 60, 10, NULL, 75.00),
(467, 61, 1, NULL, 90.00),
(468, 61, 2, NULL, 89.00),
(469, 61, 3, NULL, 88.00),
(470, 61, 4, NULL, 87.00),
(471, 61, 5, NULL, 86.00),
(472, 61, 6, NULL, 85.00),
(473, 61, 7, NULL, 84.00),
(474, 61, 8, NULL, 83.00),
(475, 61, 9, NULL, 93.00),
(476, 61, 10, NULL, 82.00),
(477, 62, 1, NULL, 82.00),
(478, 62, 2, NULL, 88.00),
(479, 62, 3, NULL, 88.00),
(480, 62, 4, NULL, 84.00),
(481, 62, 5, NULL, 87.00),
(482, 62, 6, NULL, 88.00),
(483, 62, 7, NULL, 90.00),
(484, 62, 8, NULL, 82.00),
(485, 62, 9, NULL, 92.00),
(486, 62, 10, NULL, 75.00),
(487, 63, 1, NULL, 89.00),
(488, 63, 2, NULL, 82.00),
(489, 63, 3, NULL, 84.00),
(490, 63, 4, NULL, 82.00),
(491, 63, 5, NULL, 82.00),
(492, 63, 6, NULL, 79.00),
(493, 63, 7, NULL, 84.00),
(494, 63, 8, NULL, 87.00),
(495, 63, 9, NULL, 92.00),
(496, 63, 10, NULL, 82.00),
(497, 64, 1, NULL, 87.00),
(498, 64, 2, NULL, 84.00),
(499, 64, 3, NULL, 84.00),
(500, 64, 4, NULL, 77.00),
(501, 64, 5, NULL, 81.00),
(502, 64, 6, NULL, 81.00),
(503, 64, 7, NULL, 86.00),
(504, 64, 8, NULL, 87.00),
(505, 64, 9, NULL, 89.00),
(506, 64, 10, NULL, 87.00),
(507, 65, 1, NULL, 82.00),
(508, 65, 2, NULL, 88.00),
(509, 65, 3, NULL, 87.00),
(510, 65, 4, NULL, 80.00),
(511, 65, 5, NULL, 82.00),
(512, 65, 6, NULL, 80.00),
(513, 65, 7, NULL, 80.00),
(514, 65, 8, NULL, 83.00),
(515, 65, 9, NULL, 92.00),
(516, 65, 10, NULL, 87.00),
(517, 66, 1, NULL, 82.00),
(518, 66, 2, NULL, 84.00),
(519, 66, 3, NULL, 87.00),
(520, 66, 4, NULL, 77.00),
(521, 66, 5, NULL, 82.00),
(522, 66, 6, NULL, 78.00),
(523, 66, 7, NULL, 82.00),
(524, 66, 8, NULL, 86.00),
(525, 66, 9, NULL, 92.00),
(526, 66, 10, NULL, 87.00),
(527, 68, 1, NULL, 82.00),
(528, 68, 2, NULL, 88.00),
(529, 68, 3, NULL, 87.00),
(530, 68, 4, NULL, 82.00),
(531, 68, 5, NULL, 82.00),
(532, 68, 6, NULL, 80.00),
(533, 68, 7, NULL, 80.00),
(534, 68, 8, NULL, 82.00),
(535, 68, 9, NULL, 89.00),
(536, 68, 10, NULL, 87.00),
(537, 69, 1, NULL, 87.00),
(538, 69, 2, NULL, 84.00),
(539, 69, 3, NULL, 87.00),
(540, 69, 4, NULL, 79.00),
(541, 69, 5, NULL, 80.00),
(542, 69, 6, NULL, 79.00),
(543, 69, 7, NULL, 80.00),
(544, 69, 8, NULL, 88.00),
(545, 69, 9, NULL, 92.00),
(546, 69, 10, NULL, 80.00),
(547, 70, 1, NULL, 88.00),
(548, 70, 2, NULL, 83.00),
(549, 70, 3, NULL, 86.00),
(550, 70, 4, NULL, 80.00),
(551, 70, 5, NULL, 79.00),
(552, 70, 6, NULL, 78.00),
(553, 70, 7, NULL, 76.00),
(554, 70, 8, NULL, 88.00),
(555, 70, 9, NULL, 89.00),
(556, 70, 10, NULL, 77.00),
(557, 71, 1, NULL, 82.00),
(558, 71, 2, NULL, 83.00),
(559, 71, 3, NULL, 84.00),
(560, 71, 4, NULL, 77.00),
(561, 71, 5, NULL, 81.00),
(562, 71, 6, NULL, 78.00),
(563, 71, 7, NULL, 82.00),
(564, 71, 8, NULL, 87.00),
(565, 71, 9, NULL, 92.00),
(566, 71, 10, NULL, 77.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `NIPD` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `NISN` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `rt` varchar(25) DEFAULT NULL,
  `rw` varchar(25) DEFAULT NULL,
  `dusun` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kode_pos` int(25) DEFAULT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `izin` int(11) DEFAULT NULL,
  `alpha` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `NIPD`, `jenis_kelamin`, `NISN`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kode_pos`, `telp`, `sakit`, `izin`, `alpha`, `id_kelas`) VALUES
(41, 'ABIDAL LAIL', '24257001', 'L', '123591657', 'Tangerang', '2012-03-15', 'Islam', 'Jl. Ranca Labuh', '8', '2', 'Ranca Labuh', 'Ranca Labuh', 'Kemiri', 15530, '', 1, 2, 0, 1),
(42, 'AHMAD DHANI', '24257002', 'L', '127340940', 'Tangerang', '2012-03-10', 'Islam', 'Kp. Kayu Apu', '5', '4', '', 'Klebet', 'Kemiri', 15530, '', 0, 1, 1, 1),
(43, 'AHMAD SAEFULLAH MILLAH', '24257003', 'L', '125734230', 'Tangerang', '2012-09-10', 'Islam', 'Kp. Santri Sabrang', '19', '5', 'Santri Sabrang', 'Kemiri', 'Kemiri', 15530, '087771248021', 2, 1, 0, 1),
(44, 'ANDINI', '24257004', 'P', '125318171', 'Tangerang', '2012-03-28', 'Islam', 'Kemiri', '9', '3', 'Kemiri', 'Kemiri', 'Kemiri', 15530, '', 1, 0, 1, 1),
(45, 'CHAIRY JUNA AKBAR', '24257005', 'L', '111800610', 'Jakarta', '2011-06-23', 'Islam', 'Rawa Bengkel', '12', '7', '', 'Cengkareng Barat', 'Cengkareng', 11730, '081388629396', 0, 2, 0, 1),
(46, 'DEA AZAHRA', '24257006', 'P', '123685255', 'Tangerang', '2012-11-06', 'Islam', 'Kp. Pangarengan', '3', '1', 'Pangerangan', 'Pangerangan', 'Rajeg', 15540, '083891934738', 1, 1, 0, 1),
(47, 'DEWI PRATIWI', '24257007', 'P', '117957565', 'Tangerang', '2011-12-28', 'Islam', 'Kemiri', '9', '3', 'Kemiri', 'Kemiri', 'Kemiri', 15530, '08985254723', 2, 0, 1, 1),
(48, 'DINI ARSELA', '24257008', 'P', '123230964', 'Tangerang', '2012-01-12', 'Islam', 'Kp. Kayu Apu', '7', '5', '', 'Klebet', 'Klebet', 15530, '085778083212', 0, 1, 2, 1),
(49, 'IKHWAN TUNARO', '24257009', 'L', '3130834104', 'Tangerang', '2013-05-14', 'Islam', 'Kp. Kelebet', '2', '2', '', 'Klebet', 'Kemiri', 15530, '', 1, 1, 1, 1),
(50, 'INTAN FATHIYATUL MUJAMI', '24257010', 'P', '121551466', 'Tangerang', '2012-03-02', 'Islam', 'Kp. Pangarengan', '3', '1', 'Pengerangan', 'Pengerangan', 'Rajeg', 15540, '083891934740', 0, 2, 1, 1),
(51, 'AHMAD ABDUL REHAN', '23247001', 'L', '0105872537', 'Tangerang', '2010-05-27', 'Islam', 'Jl. Raya Cadas', '18', '4', 'Ribut', 'Kemiri', 'Kemiri', 15530, '083813748778', 1, 0, 0, 2),
(52, 'UKI FADILLAH', '23247037', 'L', '0114517649', 'Tangerang', '2011-02-19', 'Islam', 'Perum Taman Permata', '4', '1', '', 'Cipondoh', 'Cipondoh', 15148, '082112203747', 2, 1, 1, 2),
(53, 'AULIA RACHMANIA PUTRI', '23247009', 'P', '0124820440', 'Tangerang', '2012-02-07', 'Islam', 'Jl. Raya Kemiri Ranca Labuh', '19', '4', 'Kp. Ribut', 'Ranca Labuh', 'Kemiri', 15530, '085813084174', 0, 1, 2, 2),
(54, 'DEA RAMADHANI', '23247012', 'P', '0114209701', 'Tangerang', '2011-08-16', 'Islam', 'Kelebet', '8', '5', 'Kelebet', 'Kelebet', 'Kemiri', 15530, '089601626907', 1, 2, 0, 2),
(55, 'SITI AURA ZANAH', '23247036', 'P', '3124988457', 'Tangerang', '2012-01-08', 'Islam', 'Kp. Kemiri Pondok', '4', '2', '', 'Kemiri', 'Kemiri', 15530, '', 2, 0, 1, 2),
(56, 'NENG SYIFA AULIA', '23247029', 'P', '0119438890', 'Tangerang', '2011-07-31', 'Islam', 'Jl. Raya Kemiri', '8', '2', 'Kemiri', 'Kemiri', 'Kemiri', 15530, '082143711280', 0, 1, 1, 2),
(57, 'AYU NUR FADILAH', '23247010', 'P', '0124667049', 'Tangerang', '2012-06-30', 'Islam', 'Kp. Benyawakan', '4', '6', '', 'Klebet', 'Kemiri', 15530, '085882116735', 1, 1, 0, 2),
(58, 'QORI KHOIRUN NISSA', '23247031', 'P', '0116688519', 'Tangerang', '2012-10-21', 'Islam', 'Jl. Raya Ranca Labuh', '2', '1', 'Ranca Labuh', 'Ranca Labuh', 'Kemiri', 15530, '085770552668', 2, 2, 0, 2),
(59, 'KHIYARATUN ASRO', '23247019', 'P', '0129715083', 'Tangerang', '2012-07-15', 'Islam', 'Jl. Raya Ranca Labuh', '4', '1', 'Ranca Labuh', 'Ranca Labuh', 'Kemiri', 15530, '085781042486', 1, 0, 2, 2),
(60, 'YASMIN SOFIAH', '23247039', 'P', '0117525876', 'Tangerang', '2011-05-15', 'Islam', 'Kp. Kemiri', '1', '1', '', 'Kemiri', 'Kemiri', 15530, '085795423848', 0, 2, 1, 2),
(61, 'ABDUL AZIZ', '22237305', 'L', '0107766218', 'Tangerang', '2010-02-01', 'Islam', 'Kemiri', '3', '1', 'Kemiri', 'Kemiri', 'Kemiri', 15530, '', 2, 1, 0, 3),
(62, 'ABDUL ROHMAN', '22237001', 'L', '0016726393', 'Tangerang', '2011-01-26', 'Islam', 'Kemiri', '9', '3', 'Kemiri', 'Kemiri', 'Kemiri', 15530, '085773872645', 0, 1, 0, 3),
(63, 'ADHA SAPUTRA', '22237002', 'L', '0102154706', 'Tangerang', '2010-11-28', 'Islam', 'Kemiri Lio', '3', '1', 'Kemiri', 'Kemiri', 'Kemiri', 15530, '085697944095', 1, 2, 1, 3),
(64, 'ADHAR RIZKI SAPUTRA', '22237003', 'L', '0102547414', 'Tangerang', '2010-11-08', 'Islam', 'Karang Anyar', '1', '1', 'Karang Anyar', 'Karang Anyar', 'Kemiri', 15530, '083841117690', 2, 0, 2, 3),
(65, 'ADILAH RAMADHANI', '22237306', 'P', '0104587174', 'Tangerang', '2010-08-17', 'Islam', 'Patra Manggala', '0', '0', '', 'Kemiri', 'Kemiri', 15530, '085280376887', 0, 1, 1, 3),
(66, 'AHMAD HAIKAL APRIYANA PURDON', '22237004', 'L', '03113304809', 'Tangerang', '2011-04-17', 'Islam', 'Kp. Santri Tegal', '3', '2', '', 'Klebet', 'Kemiri', 15530, '', 1, 1, 0, 3),
(68, 'AHMAD SANTIO', '22237005', 'L', '0112393210', 'Tangerang', '2011-03-12', 'Islam', 'Kp. Pangarengan', '4', '1', 'Pengerangan', 'Pengerangan', 'Rajeg', 15540, '083891934536', 2, 2, 1, 3),
(69, 'AHMAD YANI', '22237006', 'L', '0101026541', 'Tangerang', '2010-05-03', 'Islam', 'Kp. Cipanis', '12', '4', '', 'Ranca Bango', 'Rajeg', 15540, '083898642913', 0, 0, 2, 3),
(70, 'AIRA KINANTI', '22237007', 'P', '0106326315', 'Tangerang', '2010-10-11', 'Islam', 'Nibung Tanjakan', '3', '1', 'Karang Anyar', 'Karang Anyar', 'Kemiri', 15530, '083895171186', 1, 2, 1, 3),
(71, 'AISYAH ELFA KESTURI', '22237008', 'P', '0091619431', 'Tangerang', '2009-10-03', 'Islam', 'Kemiri', '7', '2', 'Kemiri', 'Kemiri', 'Kemiri', 15530, '', 2, 1, 0, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('tatausaha','guru','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(4, 'tu', '$2y$10$Y.ZqvKAu7gAs62k2fo/EpOZNZMooZplOEdtgv/StdLBmwpEd2lAIW', 'tatausaha'),
(5, 'guru', '$2y$10$G4rub9Cc6xZAjn4CdGIM2Obl4rnC9oySIOl0f7kQOxUxVf7wA0IjC', 'guru'),
(6, 'siswa', '$2y$10$r9CmvIGTitKOULq.qMA6dOYNdr0SGWiXW2c10ANCrG5h2L7dqhlH2', 'siswa'),
(8, 'g', '$2y$10$S0sBB7FqA0PWxBZHF9HotO33i9qO/zRAQhuWOp0NNW4ADRE/xkEYW', 'guru'),
(9, 's', '$2y$10$JvvaoKOsPG1IkrWR7qG0hOQGqGcmb11yFaszIHCys1YLIqogCyyI.', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `NIPD` (`NIPD`),
  ADD UNIQUE KEY `NISN` (`NISN`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
