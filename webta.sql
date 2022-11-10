-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2022 pada 08.29
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'instruktur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_beasiswa`
--

CREATE TABLE `tb_beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `nama_beasiswa` varchar(50) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_beasiswa`
--

INSERT INTO `tb_beasiswa` (`id_beasiswa`, `nama_beasiswa`, `start_date`, `end_date`, `is_active`) VALUES
(1, 'Beasiswa PPA', '2021-09-05', '2021-09-15', 1),
(2, 'Beasiswa Swasta', '2021-08-29', '2021-10-01', 0),
(3, 'aaa', '2021-10-12', '2021-10-29', 0),
(13, 'Beasiswa PPAaaaa', '2021-10-10', '2021-10-22', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` int(1) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Fakultas Ekonomi'),
(2, 'Fakultas Hukum'),
(3, 'Fakultas Teknik A'),
(4, 'Fakultas Kedokteran'),
(5, 'Fakultas Pertanian'),
(25, 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `keterangan_gaji` varchar(128) NOT NULL,
  `nilai_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `keterangan_gaji`, `nilai_gaji`) VALUES
(1, '<= Rp. 1.600.000', 1),
(2, 'Rp. 1.600.001 - Rp. 4.600.000', 2),
(3, 'Rp. 4.600.001 - Rp. 7.600.000', 3),
(4, '>= 7.600.001', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hitungakhir`
--

CREATE TABLE `tb_hitungakhir` (
  `id_hitungakhir` int(11) NOT NULL,
  `nim_mahasiswa` varchar(128) NOT NULL,
  `c1_akhir` int(11) NOT NULL,
  `c2_akhir` int(11) NOT NULL,
  `c3_akhir` int(11) NOT NULL,
  `c4_akhir` int(11) NOT NULL,
  `hasil_akhir` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hitungakhir`
--

INSERT INTO `tb_hitungakhir` (`id_hitungakhir`, `nim_mahasiswa`, `c1_akhir`, `c2_akhir`, `c3_akhir`, `c4_akhir`, `hasil_akhir`) VALUES
(1, '09021381722110', 1, 1, 1, 1, 'Layak'),
(2, '01010581519052', 3, 1, 3, 2, 'Layak'),
(3, '01010581519072', 2, 1, 3, 2, 'Layak'),
(4, '01010581519145', 3, 3, 3, 3, 'Layak'),
(5, '09021181722017', 1, 3, 2, 3, 'Tidak Layak'),
(7, '0902192839188932', 2, 2, 3, 2, 'Layak'),
(8, '013', 3, 3, 2, 2, 'Layak'),
(9, '0013', 1, 1, 3, 1, 'Tidak Layak'),
(10, '015', 2, 1, 2, 3, 'Layak'),
(11, '017', 1, 3, 2, 1, 'Tidak Layak'),
(12, '018', 2, 3, 2, 1, 'Tidak Layak'),
(13, '020', 1, 2, 4, 2, 'Tidak Layak'),
(14, '01010581620023', 2, 3, 4, 1, 'Tidak Layak'),
(15, '01010581620024', 2, 1, 4, 1, 'Tidak Layak'),
(16, '01010581620028', 1, 3, 2, 2, 'Tidak Layak'),
(17, '01010581620029', 1, 3, 2, 1, 'Tidak Layak'),
(18, '01010581620030', 1, 2, 2, 2, 'Tidak Layak'),
(19, '01010581620031', 1, 3, 2, 2, 'Tidak Layak'),
(20, '01010581620040', 1, 2, 2, 2, 'Tidak Layak'),
(21, '01010581620042', 2, 2, 2, 2, 'Tidak Layak'),
(22, '01010581620043', 1, 2, 2, 2, 'Tidak Layak'),
(23, '01010581620047', 1, 3, 1, 2, 'Tidak Layak'),
(24, '01010581620048', 1, 3, 2, 2, 'Tidak Layak'),
(25, '01010581620050', 1, 3, 2, 2, 'Tidak Layak'),
(26, '01010581620051', 1, 2, 2, 2, 'Tidak Layak'),
(27, '0033', 1, 3, 2, 2, 'Tidak Layak'),
(28, '123', 1, 1, 2, 1, 'Tidak Layak'),
(29, '098', 3, 2, 4, 2, 'Layak'),
(30, '121', 1, 3, 3, 2, 'Tidak Layak'),
(31, '873', 2, 2, 3, 1, 'Layak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ipk`
--

CREATE TABLE `tb_ipk` (
  `id_ipk` int(11) NOT NULL,
  `rangeawal_ipk` decimal(3,2) NOT NULL,
  `rangeakhir_ipk` decimal(3,2) NOT NULL,
  `nilai_ipk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ipk`
--

INSERT INTO `tb_ipk` (`id_ipk`, `rangeawal_ipk`, `rangeakhir_ipk`, `nilai_ipk`) VALUES
(1, '3.00', '3.30', 1),
(2, '3.31', '3.60', 2),
(3, '3.61', '4.00', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(1, 'IPK'),
(2, 'Pekerjaan Orang Tua'),
(3, 'Penghasilan Orang Tua'),
(7, 'Jumlah Tanggungan Orang Tua'),
(9, 'aaaaaaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_latih`
--

CREATE TABLE `tb_latih` (
  `id_latih` int(11) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `nim_mahasiswa` varchar(50) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `hasil` enum('Layak','Tidak Layak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_latih`
--

INSERT INTO `tb_latih` (`id_latih`, `nama_mahasiswa`, `nim_mahasiswa`, `c1`, `c2`, `c3`, `c4`, `hasil`) VALUES
(1, 'M Rizky Agustian', '01010581519076', 1, 3, 2, 2, 'Tidak Layak'),
(2, 'Dimaz Nurrizqi Bhaskoro', '01010581519060', 2, 2, 3, 2, 'Tidak Layak'),
(3, 'Tara Alina Rizki', '01010581519073', 2, 1, 2, 1, 'Tidak Layak'),
(4, 'Yossa Septian Dita', '01010581519143', 2, 3, 1, 1, 'Tidak Layak'),
(6, 'Tri Putri Utami', '01010581519138', 1, 3, 4, 1, 'Tidak Layak'),
(7, 'Okta Nila Sari', '01010581519144', 2, 3, 2, 2, 'Tidak Layak'),
(8, 'Tri Sriyanto', '01010581519049', 2, 3, 2, 2, 'Tidak Layak'),
(10, 'Cindy Efsiara Pasela', '01010581519142', 1, 3, 2, 3, 'Tidak Layak'),
(11, 'Cindy Apriana', '09020581721035', 2, 3, 3, 2, 'Tidak Layak'),
(12, 'M. Farid Landriandini', '09021181621012', 1, 3, 2, 1, 'Tidak Layak'),
(13, 'Rahmad Hidayat', '01010581620005', 2, 3, 2, 1, 'Tidak Layak'),
(14, 'Satria Nugraha', '01010581519056', 1, 1, 2, 1, 'Tidak Layak'),
(15, 'Lydia Febriati', '01010581620003', 2, 2, 4, 2, 'Tidak Layak'),
(16, 'Rohmatulliza', '01010581620012', 3, 3, 2, 2, 'Layak'),
(17, 'Ayu Rezky Permata', '01010581620033', 1, 3, 2, 2, 'Layak'),
(18, 'Safrina Nurkamila', '01010581519046', 3, 1, 3, 2, 'Layak'),
(19, 'Dhia Afra Naziha', '01010581519061', 2, 3, 1, 1, 'Layak'),
(20, 'Marshal Prima', '01010581620056', 1, 2, 2, 2, 'Layak'),
(21, 'Yoanita Andriyani', '01010581519057', 3, 2, 2, 2, 'Layak'),
(22, 'Mareta Putri', '01010581519067', 2, 3, 2, 1, 'Layak'),
(23, 'Riri Andika Putri', '01010581519009', 3, 3, 3, 2, 'Layak'),
(24, 'Khalimatussa\'Diah', '01010581620102', 2, 3, 2, 2, 'Layak'),
(25, 'Vinka Chairunissa', '01010581620098', 2, 3, 3, 2, 'Layak'),
(26, 'Destria Daniastati', '01010581519035', 3, 2, 3, 2, 'Layak'),
(27, 'Aisyah Filza Aliyah', '09021181722015', 3, 2, 3, 2, 'Layak'),
(28, 'Muhammad Irfan Triananto Putra', '09021281621046', 3, 3, 2, 2, 'Layak'),
(29, 'Faiz Muhammad', '09021181520004', 3, 3, 3, 2, 'Layak'),
(30, 'Ayu Lestari', '09021181520021', 3, 3, 2, 1, 'Layak'),
(31, 'Yulinda Ramadhana', '09021181520039', 3, 3, 2, 1, 'Layak'),
(32, 'Atan Wicaksana Ramadhanti', '09021181621028', 3, 3, 2, 2, 'Layak'),
(33, 'Elsya Krismi Afindri', '09021281419061', 2, 1, 2, 2, 'Layak'),
(34, 'Ahmad Emir Al Fatah', '09021381722130', 3, 1, 2, 3, 'Layak'),
(35, 'Rana Septian', '01010581519052', 3, 1, 3, 2, 'Layak'),
(36, 'Nina Anitia Nasharudin', '01010581519072', 2, 1, 3, 2, 'Layak'),
(37, 'Dwi Puspita Sari', '01010581519145', 3, 3, 2, 3, 'Layak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim_mahasiswa` varchar(128) NOT NULL,
  `nama_mahasiswa` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `c1` decimal(3,2) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `nim_mahasiswa`, `nama_mahasiswa`, `jenis_kelamin`, `id_fakultas`, `id_prodi`, `c1`, `c2`, `c3`, `c4`) VALUES
(1, '09021381722110', 'M imam', 'L', 1, 1, '1.00', 1, 1, 1),
(2, '01010581519052', 'Rana Septiani ', 'P', 1, 1, '3.70', 1, 3, 2),
(3, '01010581519072', 'Nina Anitia Nasharudin', 'P', 1, 1, '3.50', 1, 3, 2),
(4, '01010581519145', 'Dwi Puspita Sari', 'P', 1, 1, '3.74', 3, 3, 3),
(5, '09021181722017', 'YASMIN AZZAHRAH LUBIS', 'P', 25, 22, '3.14', 3, 2, 3),
(7, '0902192839188932', 'Adrian', 'L', 25, 22, '3.40', 2, 3, 2),
(8, '013', 'Rohma', 'P', 1, 1, '3.82', 3, 2, 2),
(9, '0013', 'Gusti Ayu ', 'L', 1, 1, '3.20', 1, 3, 1),
(10, '015', 'Adinda', 'P', 1, 1, '3.37', 1, 2, 3),
(11, '017', 'Nuraini', 'P', 1, 1, '3.05', 3, 2, 1),
(12, '018', 'Nur Halimah', 'P', 1, 1, '3.48', 3, 2, 1),
(13, '020', 'Diah Nabilah', 'P', 1, 1, '3.14', 2, 4, 2),
(14, '01010581620023', 'MUHAMMAD IRSYAD ADITYARMAN', 'L', 1, 1, '3.58', 3, 4, 1),
(15, '01010581620024', 'MUHAMMAD RIDHO AGUSTRIAWAN', 'L', 1, 1, '3.58', 1, 4, 1),
(16, '01010581620028', 'AYU MARCEILLA', 'P', 1, 1, '3.30', 3, 2, 2),
(17, '01010581620029', 'DONNA PRATIWI', 'P', 1, 1, '3.11', 3, 2, 1),
(18, '01010581620030', 'AULIA VENTYARI UTAMI', 'P', 1, 1, '3.08', 2, 2, 2),
(19, '01010581620031', 'NABILA', 'P', 1, 1, '3.22', 3, 2, 2),
(20, '01010581620040', 'MOHD ISNAENI EL AMIN', 'L', 1, 1, '3.03', 2, 2, 2),
(21, '01010581620042', 'ANDREW BERNADIN', 'L', 1, 1, '3.36', 2, 2, 2),
(22, '01010581620043', 'NABILAH FEBIYANTI', 'P', 1, 1, '3.30', 2, 2, 2),
(23, '01010581620047', 'UTARI', 'P', 1, 1, '3.10', 3, 1, 2),
(24, '01010581620048', 'CINDY OKTALIZA', 'P', 1, 1, '3.20', 3, 2, 2),
(25, '01010581620050', 'DESTALIA KUSUMACIWARNI', 'P', 1, 1, '3.12', 3, 2, 2),
(26, '01010581620051', 'GEBBY IVO JONABAYA', 'P', 1, 1, '3.14', 2, 2, 2),
(27, '0033', 'AYU REZKY', 'P', 1, 1, '3.08', 3, 2, 2),
(28, '123', 'Rusman', 'L', 25, 22, '3.20', 1, 2, 1),
(29, '098', 'wiwik', 'P', 4, 22, '4.00', 2, 4, 2),
(30, '121', 'opang', 'L', 29, 28, '3.20', 3, 3, 2),
(31, '873', 'Aldi', 'L', 5, 6, '3.50', 2, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_parameter`
--

CREATE TABLE `tb_parameter` (
  `id_parameter` int(1) NOT NULL,
  `id_kriteria` int(1) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_parameter`
--

INSERT INTO `tb_parameter` (`id_parameter`, `id_kriteria`, `keterangan`, `bobot`) VALUES
(1, 1, '3,00 - 3,20', 1),
(2, 1, '3,21 - 3,40', 2),
(3, 1, '3,41 - 3,60', 3),
(4, 1, '3,61 - 3,80', 4),
(5, 1, '> 3,81', 5),
(6, 2, 'Pegawai Negeri Sipil', 1),
(7, 2, 'Polri', 2),
(8, 2, 'Karyawan BUMN', 3),
(9, 2, 'Karyawan Swasta', 4),
(10, 2, 'dan lain-lain', 5),
(11, 3, '<= Rp. 1.000.000', 1),
(12, 3, 'Rp. 1.000.001 - Rp. 3.000.000', 2),
(13, 3, 'Rp. 3.000.001 - Rp. 5.000.000', 3),
(14, 3, 'Rp. 5.000.001 - Rp. 7.000.000', 4),
(15, 3, '>= Rp. 7.000.001', 5),
(16, 7, '1', 1),
(17, 7, '2', 2),
(18, 7, '3', 3),
(19, 7, '4', 4),
(20, 7, '>= 5', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `keterangan_pekerjaan` varchar(128) NOT NULL,
  `nilai_pekerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id_pekerjaan`, `keterangan_pekerjaan`, `nilai_pekerjaan`) VALUES
(1, 'Pegawai Negeri Sipil / Polri', 1),
(2, 'Karyawan BUMN / Karyawan Swasta', 2),
(3, 'dan Lain - Lain', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_prodi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`) VALUES
(1, 1, 'Akutansi (D3)'),
(2, 1, 'Manajemen (S1)'),
(3, 1, 'Manajemen (S1 Asal D3)'),
(4, 1, 'Kesekretariatan (D3)'),
(6, 1, 'Ekonomi Pembangunan (S1)'),
(22, 25, 'S1 - Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tanggungan`
--

CREATE TABLE `tb_tanggungan` (
  `id_tanggungan` int(11) NOT NULL,
  `keterangan_tanggungan` varchar(128) NOT NULL,
  `nilai_tanggungan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tanggungan`
--

INSERT INTO `tb_tanggungan` (`id_tanggungan`, `keterangan_tanggungan`, `nilai_tanggungan`) VALUES
(1, '1 - 2 Anak', 1),
(2, '3 - 4 Anak', 2),
(3, '>= 5 anak', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `password`, `role`) VALUES
(2, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'Imam', 'gumay@gmail.com', 'ab3d1a006895a6bcf517b5151d8d0a5a', 3),
(4, 'user', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `gaji` varchar(128) DEFAULT NULL,
  `ipk` varchar(128) DEFAULT NULL,
  `pln` varchar(128) DEFAULT NULL,
  `tanggung` varchar(128) NOT NULL,
  `layak` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `training`
--

INSERT INTO `training` (`id`, `gaji`, `ipk`, `pln`, `tanggung`, `layak`) VALUES
(1, 'Mampu', 'Tinggi', '450', 'Banyak', 'Layak'),
(2, 'Mampu', 'Tinggi', '450', 'Banyak', 'Layak'),
(3, 'Tidak Mampu', 'Rendah', '900', 'sedikit', 'tidak layak'),
(4, 'menengah', 'Sedang', '900', 'banyak', 'layak'),
(5, 'Tidak Mampu', 'Sedang', '1300', 'sedikit', 'layak'),
(6, 'Tidak Mampu', 'Tinggi', '900', 'sedikit', 'layak'),
(7, 'Tidak Mampu', 'Tinggi', '900', 'banyak', 'tidak layak'),
(8, 'menengah', 'Sedang', '450', 'sedang', 'layak'),
(9, 'mampu', 'Tinggi', '1300', 'sedang', 'layak'),
(10, 'Tidak Mampu', 'Rendah', '900', 'banyak', 'layak'),
(11, 'mampu', 'Sedang', '900', 'sedikit', 'tidak layak'),
(12, 'Tidak Mampu', 'Sedang', '450', 'banyak', 'layak'),
(13, 'Tidak Mampu', 'Tinggi', '450', 'sedang', 'layak'),
(14, 'mampu', 'Rendah', '1300', 'banyak', 'tidak layak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `_hitungakhir`
--

CREATE TABLE `_hitungakhir` (
  `id_hitungakhir` int(11) NOT NULL,
  `nim_mahasiswa` varchar(128) NOT NULL,
  `c1_akhir` int(11) NOT NULL,
  `c2_akhir` int(11) NOT NULL,
  `c3_akhir` int(11) NOT NULL,
  `c4_akhir` int(11) NOT NULL,
  `hasil_akhir` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `_hitungakhir`
--

INSERT INTO `_hitungakhir` (`id_hitungakhir`, `nim_mahasiswa`, `c1_akhir`, `c2_akhir`, `c3_akhir`, `c4_akhir`, `hasil_akhir`) VALUES
(6, '000000109', 3, 1, 3, 1, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `_mahasiswa`
--

CREATE TABLE `_mahasiswa` (
  `nim_mahasiswa` varchar(128) NOT NULL,
  `nama_mahasiswa` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `c1` decimal(3,2) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `_mahasiswa`
--

INSERT INTO `_mahasiswa` (`nim_mahasiswa`, `nama_mahasiswa`, `jenis_kelamin`, `id_fakultas`, `id_prodi`, `c1`, `c2`, `c3`, `c4`) VALUES
('000000109', 'bunga', 'P', 4, 1, '3.76', 1, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indeks untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indeks untuk tabel `tb_hitungakhir`
--
ALTER TABLE `tb_hitungakhir`
  ADD PRIMARY KEY (`id_hitungakhir`),
  ADD KEY `nim_mahasiswa` (`nim_mahasiswa`);

--
-- Indeks untuk tabel `tb_ipk`
--
ALTER TABLE `tb_ipk`
  ADD PRIMARY KEY (`id_ipk`);

--
-- Indeks untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tb_latih`
--
ALTER TABLE `tb_latih`
  ADD PRIMARY KEY (`id_latih`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `nim_mahasiswa` (`nim_mahasiswa`);

--
-- Indeks untuk tabel `tb_parameter`
--
ALTER TABLE `tb_parameter`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `tb_prodi_ibfk_1` (`id_fakultas`);

--
-- Indeks untuk tabel `tb_tanggungan`
--
ALTER TABLE `tb_tanggungan`
  ADD PRIMARY KEY (`id_tanggungan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`role`);

--
-- Indeks untuk tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `_hitungakhir`
--
ALTER TABLE `_hitungakhir`
  ADD PRIMARY KEY (`id_hitungakhir`),
  ADD KEY `nim_mahasiswa` (`nim_mahasiswa`);

--
-- Indeks untuk tabel `_mahasiswa`
--
ALTER TABLE `_mahasiswa`
  ADD PRIMARY KEY (`nim_mahasiswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id_fakultas` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_hitungakhir`
--
ALTER TABLE `tb_hitungakhir`
  MODIFY `id_hitungakhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_ipk`
--
ALTER TABLE `tb_ipk`
  MODIFY `id_ipk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_latih`
--
ALTER TABLE `tb_latih`
  MODIFY `id_latih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_parameter`
--
ALTER TABLE `tb_parameter`
  MODIFY `id_parameter` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_tanggungan`
--
ALTER TABLE `tb_tanggungan`
  MODIFY `id_tanggungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `_hitungakhir`
--
ALTER TABLE `_hitungakhir`
  MODIFY `id_hitungakhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_hitungakhir`
--
ALTER TABLE `tb_hitungakhir`
  ADD CONSTRAINT `tb_hitungakhir_ibfk_1` FOREIGN KEY (`nim_mahasiswa`) REFERENCES `tb_mahasiswa` (`nim_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_parameter`
--
ALTER TABLE `tb_parameter`
  ADD CONSTRAINT `tb_parameter_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD CONSTRAINT `tb_prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `tb_fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`role_id`);

--
-- Ketidakleluasaan untuk tabel `_hitungakhir`
--
ALTER TABLE `_hitungakhir`
  ADD CONSTRAINT `_hitungakhir_ibfk_1` FOREIGN KEY (`nim_mahasiswa`) REFERENCES `_mahasiswa` (`nim_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
