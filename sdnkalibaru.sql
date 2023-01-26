-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2023 pada 16.07
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdnkalibaru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` varchar(50) NOT NULL,
  `nomorinduk_guru` varchar(30) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `wali_kelas` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nomorinduk_guru`, `nama_guru`, `jenis_kelamin`, `wali_kelas`, `alamat`, `no_telp`) VALUES
('2a706ae9-d0a4-44ed-a75d-a0b28e97e31b', '0000000002', 'Susy Nurhayati', 'Perempuan', 'Kelas 1B', 'Jl. Marunda Baru Gg. IV No.11 Rt.005/006. Kel. Marunda Kec. Cilincing. Jakarta Utara', '08712346363'),
('bc2fe165-8a7f-11ed-906a-040e3c46141a', '0000000001', 'Pangeran Saddam Husain', 'Laki-Laki', 'Kelas 1A', 'Jl. Marunda Baru Gg. IV No.11 Rt.005/006. Kel. Marunda Kec. Cilincing. Jakarta Utara', '081807141988'),
('ebecb220-e85f-4316-b5e9-0ce67dcea547', '0000000003', 'Al-Fatih', 'Laki-Laki', 'Kelas 1C', 'Edirne, Turkey', '08785653453');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` varchar(50) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `lantai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `lantai`) VALUES
('0ab46e79-86aa-11ed-800d-040e3c46141a', 'Kelas 3B', '1'),
('0ab49a8a-86aa-11ed-800d-040e3c46141a', 'Kelas 3A', '1'),
('2c6234de-3296-481f-b467-e0cd08d4b36b', 'Kelas 2B', '1'),
('4469df98-682d-4342-8959-694793023535', 'Musholla', '1'),
('5aa62124-1303-4f07-8c5c-acb6c0f7120c', 'Ruangan Kepala Sekolah', '1'),
('663422ad-20fc-4dd1-8475-012e0a44a669', 'Kelas 2A', '1'),
('ed49c839-21e6-4e02-9400-c68ccf52e9a9', 'Kelas 1A', '1'),
('f460544e-253d-446f-91bf-2e5704a549ed', 'Kelas 1B', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` varchar(50) NOT NULL,
  `nomor_induk` varchar(30) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nomor_induk`, `nama_siswa`, `jenis_kelamin`, `ruangan`, `alamat`, `no_telp`) VALUES
('08655a2f-d91b-4c66-a2b4-92cbce372c77', '00000006', 'Beth Harmon', 'Perempuan', 'Kelas 1A', 'United States', '087123463644'),
('27d1d9b0-d2f2-45f7-ac54-e2f9122acd67', '00000012', 'Zoolander', 'Laki-Laki', 'Kelas 1A', 'United States', '0000001'),
('3071a8db-d07d-4dde-8a5c-8dc29b705af9', '00000001', 'Pangeran Saddam Husain', 'Laki-Laki', 'Kelas 1A', 'Jl. Marunda Baru Gg. IV No.11 Rt.005/006. Kel. Marunda Kec. Cilincing. Jakarta Utara', '081807148900'),
('33e01e79-9790-4367-98fd-923869e72f44', '00000022', 'Leonardo Di Caprio', 'Laki-Laki', 'Kelas 1B', 'United States', '00000000'),
('6c414fcf-d2da-4647-a20a-61516fcb5b74', '00000011', 'Frenchie', 'Laki-Laki', 'Kelas 1A', 'France', '00000000'),
('6fb58a10-d3df-4997-b76f-77794a259aa1', '00000002', 'Anya Taylor Joy', 'Perempuan', 'Kelas 1A', 'California, United States', '00000000'),
('85f020ac-d209-436d-a108-600e7bf95b07', '00000007', 'Wednesday Addams', 'Perempuan', 'Kelas 1A', 'United States', '43434343'),
('9e6854aa-53e8-4be8-be53-1f3e73245711', '00000008', 'Bradd Pitt', 'Laki-Laki', 'Kelas 1A', 'United States', '087123463631'),
('a0ebc51b-a50d-4a4b-a366-35d46d3751e2', '00000014', 'Camilla Ratu', 'Perempuan', 'Kelas 1A', 'Jl. Marunda Baru Gg. IV No.11 Rt.005/006. Kel. Marunda Kec. Cilincing. Jakarta Utara', '081897642222'),
('c677c82f-eee6-46e9-8983-1a60b8fd7db7', '00000017', 'Syifa Farahdilla Al-Andiuan', 'Perempuan', 'Kelas 1A', 'Tarumajaya', '00000000'),
('c6ba42dd-0c48-483e-8938-9fa14d264d2e', '00000004', 'Cristiano Ronaldo', 'Laki-Laki', 'Kelas 1A', 'Lisbon, Portugal', '087123463631'),
('f2499ef1-8596-4505-ada0-1fb9b314ba1c', '00000010', 'Homelander', 'Laki-Laki', 'Kelas 1A', 'United States', '0000000'),
('f696dde2-7a93-4428-9296-ef342ffe035c', '00000009', 'Tyler Durden', 'Laki-Laki', 'Kelas 1A', 'United States', '0000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('26dc1d47-7fa4-11ed-ac05-040e3c46141a', 'Tata Usaha', 'tatausaha', '04a8eac0ffcc5450e1540d3c83b3d9c58ec7aa5b', '1'),
('f2c5e386-d5fb-11ea-89a9-040e3c46141a', 'Pangeran Saddam Husain', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
