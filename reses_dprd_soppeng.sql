-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Okt 2020 pada 14.45
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reses_dprd_soppeng`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id` int(11) NOT NULL,
  `id_akun` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level_akun` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`id`, `id_akun`, `username`, `password`, `level_akun`, `status`) VALUES
(1, '1', 'admin', '$2y$10$dw3996inoENCYr7ppG4V0eEtk9fB3WuSxPtUjEnz7gJm7F65rPa/i', 'admin', 'Aktif'),
(2, '2', 'anggota', '$2y$10$2.3Faw84gMTWiRtsKLy7.OKpNxgkq2KjT6xxUeXFgAV6SLTf0DqF6', 'dpr', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `alamat_anggota` varchar(255) NOT NULL,
  `tempat_lahir_anggota` varchar(225) NOT NULL,
  `tanggal_lahir_anggota` varchar(255) NOT NULL,
  `agama_anggota` varchar(225) NOT NULL,
  `status_kawin` varchar(225) NOT NULL,
  `jabatan_anggota` varchar(225) NOT NULL,
  `id_partai` varchar(225) NOT NULL,
  `id_dapil` varchar(225) NOT NULL,
  `id_komisi` varchar(225) NOT NULL,
  `id_fraksi` varchar(225) NOT NULL,
  `foto_anggota` varchar(225) NOT NULL,
  `status_anggota` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama_anggota`, `alamat_anggota`, `tempat_lahir_anggota`, `tanggal_lahir_anggota`, `agama_anggota`, `status_kawin`, `jabatan_anggota`, `id_partai`, `id_dapil`, `id_komisi`, `id_fraksi`, `foto_anggota`, `status_anggota`) VALUES
(1, 'H. Syahruddin M. Adam, S.Sos, MM', 'Jl. Sawah', 'Soppeng', '4 Februari 1967', 'Islam', 'Kawin', 'Ketua DPRD Kabupaten Soppeng', '1', '1', '1', '1', 'image_anggota_1602847361.jpg', 'Aktif'),
(2, 'A.Mapparemma M, SE, MM', 'Jl. Bila Utara No. 28 Watansoppeng', 'Soppeng', '7 Mei 1964', 'Islam', 'Kawin', 'Wakil', '2', '1', '2', '3', 'image_anggota_1602848759.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dapil`
--

CREATE TABLE `tb_dapil` (
  `id_dapil` int(11) NOT NULL,
  `nama_dapil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dapil`
--

INSERT INTO `tb_dapil` (`id_dapil`, `nama_dapil`) VALUES
(1, 'Daerah Pilihan I'),
(2, 'Daerah Pilihan II');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dapil_wilayah`
--

CREATE TABLE `tb_dapil_wilayah` (
  `id_dapil_wilayah` int(11) NOT NULL,
  `id_dapil` varchar(255) NOT NULL,
  `nama_wilayah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dapil_wilayah`
--

INSERT INTO `tb_dapil_wilayah` (`id_dapil_wilayah`, `id_dapil`, `nama_wilayah`) VALUES
(1, '1', 'Kecamatan Marioriwawo'),
(2, '2', 'Kecamatan Lilirilau'),
(3, '2', 'Kecamatan Liliriaja'),
(4, '2', 'Kecamatan Citta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fraksi`
--

CREATE TABLE `tb_fraksi` (
  `id_fraksi` int(11) NOT NULL,
  `id_partai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_fraksi`
--

INSERT INTO `tb_fraksi` (`id_fraksi`, `id_partai`) VALUES
(1, '1'),
(2, '4'),
(3, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komisi`
--

CREATE TABLE `tb_komisi` (
  `id_komisi` int(11) NOT NULL,
  `nama_komisi` varchar(255) NOT NULL,
  `bidang_komisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komisi`
--

INSERT INTO `tb_komisi` (`id_komisi`, `nama_komisi`, `bidang_komisi`) VALUES
(1, 'Komisi I', 'Bidang Pemerintahan'),
(2, 'Komisi II', 'Bidang Perekonomian ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_partai`
--

CREATE TABLE `tb_partai` (
  `id_partai` int(11) NOT NULL,
  `nama_partai` varchar(255) NOT NULL,
  `gambar_partai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_partai`
--

INSERT INTO `tb_partai` (`id_partai`, `nama_partai`, `gambar_partai`) VALUES
(1, 'Golkar', 'image_1602677940.jpg'),
(2, 'PDIP', 'image_1602680915.jpg'),
(4, 'Demokrat', 'image_1602687489.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tb_dapil`
--
ALTER TABLE `tb_dapil`
  ADD PRIMARY KEY (`id_dapil`);

--
-- Indeks untuk tabel `tb_dapil_wilayah`
--
ALTER TABLE `tb_dapil_wilayah`
  ADD PRIMARY KEY (`id_dapil_wilayah`);

--
-- Indeks untuk tabel `tb_fraksi`
--
ALTER TABLE `tb_fraksi`
  ADD PRIMARY KEY (`id_fraksi`);

--
-- Indeks untuk tabel `tb_komisi`
--
ALTER TABLE `tb_komisi`
  ADD PRIMARY KEY (`id_komisi`);

--
-- Indeks untuk tabel `tb_partai`
--
ALTER TABLE `tb_partai`
  ADD PRIMARY KEY (`id_partai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_dapil`
--
ALTER TABLE `tb_dapil`
  MODIFY `id_dapil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_dapil_wilayah`
--
ALTER TABLE `tb_dapil_wilayah`
  MODIFY `id_dapil_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_fraksi`
--
ALTER TABLE `tb_fraksi`
  MODIFY `id_fraksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_komisi`
--
ALTER TABLE `tb_komisi`
  MODIFY `id_komisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_partai`
--
ALTER TABLE `tb_partai`
  MODIFY `id_partai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
