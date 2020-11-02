-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2020 pada 00.33
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
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(225) NOT NULL,
  `foto_admin` varchar(225) NOT NULL,
  `status_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `foto_admin`, `status_admin`) VALUES
(1, 'Reski Solihin', 'image_1602955536.PNG', 'Aktif'),
(6, 'Muhammad Azwar Bahar', 'image_1602955710.jpg', 'Aktif');

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
(2, '2', 'anggota', '$2y$10$2.3Faw84gMTWiRtsKLy7.OKpNxgkq2KjT6xxUeXFgAV6SLTf0DqF6', 'dpr', 'Aktif'),
(3, '3', 'riswan', '$2y$10$bGbcG.k6Diq.U4Fhx63pSOF6OVPu.oCYc7kszsgqCnR8D2M0y6vLK', 'dpr', 'Aktif'),
(10, '6', 'azwar', '$2y$10$95tqIWQL7IdJM3Ye1r0B4.l6jj9PCvV3YgXJGV6lL06VuBD48utze', 'admin', 'Aktif'),
(12, '5', 'testing', '$2y$10$b8l7d/m.7G21kVgU/h/0ZODU1jFszACSeA5qrQRfSfZdmLTiqWXGS', 'dpr', 'Aktif');

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
(2, 'A.Mapparemma M, SE, MM', 'Jl. Bila Utara No. 28 Watansoppeng', 'Soppeng', '7 Mei 1964', 'Islam', 'Kawin', 'Wakil', '2', '1', '2', '3', 'image_anggota_1602943306.jpg', 'Aktif'),
(3, 'H.Riswan,S.Sos', 'Makassar', 'Soppeng', '15 Agustus 1966', 'Islam', 'Kawin', 'Wakil II DPRD Kabupaten Soppeng', '4', '2', '2', '2', 'image_anggota_1602946152.jpg', 'Aktif'),
(5, 'Azwar', 'Makassar', 'Makassar', '15 Oktober 2007', 'Buddha', 'Belum Kawin', 'Presiden', '1', '1', '2', '2', 'image_anggota_1604233768.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota_fraksi`
--

CREATE TABLE `tb_anggota_fraksi` (
  `id_anggota_fraksi` int(11) NOT NULL,
  `id_fraksi` varchar(255) NOT NULL,
  `jabatan_fraksi` varchar(255) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota_fraksi`
--

INSERT INTO `tb_anggota_fraksi` (`id_anggota_fraksi`, `id_fraksi`, `jabatan_fraksi`, `nama_anggota`) VALUES
(1, '1', 'Pembina', 'H. Syahruddin M. Adam, S.Sos, MM'),
(2, '2', 'Ketua', 'H.Riswan,S.Sos'),
(4, '2', 'Sekretaris', 'Azwar'),
(5, '3', 'Ketua', 'A.Mapparemma M, SE, MM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aspirasi`
--

CREATE TABLE `tb_aspirasi` (
  `id_aspirasi` int(11) NOT NULL,
  `id_lokasi` varchar(255) NOT NULL,
  `id_anggota` varchar(225) NOT NULL,
  `id_jadwal` varchar(100) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `skpd` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status_aspirasi` varchar(255) NOT NULL,
  `keterangan_aspirasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_aspirasi`
--

INSERT INTO `tb_aspirasi` (`id_aspirasi`, `id_lokasi`, `id_anggota`, `id_jadwal`, `kegiatan`, `skpd`, `lokasi`, `status_aspirasi`, `keterangan_aspirasi`) VALUES
(1, '3', '3', '3', 'Berenang', 'Anggotayya', 'Kolam', 'Kirim', ''),
(3, '1', '3', '3', 'libur2', 'apa ini', 'tess edit lagi tes', 'Approve', ''),
(4, '1', '3', '3', 'Tes', 'lagi', 'tambah edit', 'Approve', ''),
(5, '4', '5', '3', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesett', 'Lorem Ipsum adalah contoh teks atau dummy dalam ', 'Approve', ''),
(6, '3', '3', '3', 'Mangkal', 'Banyal', 'aaa gut', 'Approve', ''),
(7, '1', '3', '3', 'Main Game', 'testing', 'lokasi test', 'Simpan', '');

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
(1, 'I'),
(2, 'II'),
(3, 'III');

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
-- Struktur dari tabel `tb_dokumentasi`
--

CREATE TABLE `tb_dokumentasi` (
  `id_dokumentasi` int(11) NOT NULL,
  `id_lokasi` varchar(255) NOT NULL,
  `id_anggota` varchar(255) NOT NULL,
  `id_jadwal` varchar(255) NOT NULL,
  `nama_dokumentasi` varchar(255) NOT NULL,
  `keterangan_dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokumentasi`
--

INSERT INTO `tb_dokumentasi` (`id_dokumentasi`, `id_lokasi`, `id_anggota`, `id_jadwal`, `nama_dokumentasi`, `keterangan_dokumentasi`) VALUES
(1, '1', '3', '3', 'image_1604317933.jpg', 'Buat Bumbu'),
(2, '1', '3', '3', 'image_1604317975.jpg', 'Beli daging'),
(3, '3', '3', '3', 'image_1604319202.png', 'Testing App');

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
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `nama_jadwal` varchar(255) NOT NULL,
  `mulai_jadwal` date NOT NULL,
  `akhir_jadwal` date NOT NULL,
  `status_jadwal` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `nama_jadwal`, `mulai_jadwal`, `akhir_jadwal`, `status_jadwal`) VALUES
(1, 'Semester I', '2020-01-12', '2020-04-12', 'Selesai'),
(2, 'Semester II', '2020-05-12', '2020-08-12', 'Selesai'),
(3, 'Semester III', '2020-09-12', '2020-11-04', 'Berjalan');

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
-- Struktur dari tabel `tb_lokasi_reses`
--

CREATE TABLE `tb_lokasi_reses` (
  `id_lokasi` int(11) NOT NULL,
  `id_anggota` varchar(255) NOT NULL,
  `id_jadwal` text NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `tanggal_lokasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lokasi_reses`
--

INSERT INTO `tb_lokasi_reses` (`id_lokasi`, `id_anggota`, `id_jadwal`, `nama_lokasi`, `tanggal_lokasi`) VALUES
(1, '3', '3', 'Sudiang', '2020-10-22'),
(3, '3', '3', 'Antang', '2020-10-31'),
(4, '5', '3', 'Alauddin', '2020-11-17');

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
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

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
-- Indeks untuk tabel `tb_anggota_fraksi`
--
ALTER TABLE `tb_anggota_fraksi`
  ADD PRIMARY KEY (`id_anggota_fraksi`);

--
-- Indeks untuk tabel `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`);

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
-- Indeks untuk tabel `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indeks untuk tabel `tb_fraksi`
--
ALTER TABLE `tb_fraksi`
  ADD PRIMARY KEY (`id_fraksi`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tb_komisi`
--
ALTER TABLE `tb_komisi`
  ADD PRIMARY KEY (`id_komisi`);

--
-- Indeks untuk tabel `tb_lokasi_reses`
--
ALTER TABLE `tb_lokasi_reses`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `tb_partai`
--
ALTER TABLE `tb_partai`
  ADD PRIMARY KEY (`id_partai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_anggota_fraksi`
--
ALTER TABLE `tb_anggota_fraksi`
  MODIFY `id_anggota_fraksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  MODIFY `id_aspirasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_dapil`
--
ALTER TABLE `tb_dapil`
  MODIFY `id_dapil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_dapil_wilayah`
--
ALTER TABLE `tb_dapil_wilayah`
  MODIFY `id_dapil_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_fraksi`
--
ALTER TABLE `tb_fraksi`
  MODIFY `id_fraksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_komisi`
--
ALTER TABLE `tb_komisi`
  MODIFY `id_komisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_lokasi_reses`
--
ALTER TABLE `tb_lokasi_reses`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_partai`
--
ALTER TABLE `tb_partai`
  MODIFY `id_partai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
