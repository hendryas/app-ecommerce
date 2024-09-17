-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2022 pada 07.48
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_product` varchar(256) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `diskon_harga` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `ukuran` varchar(256) NOT NULL,
  `tipe` varchar(256) NOT NULL,
  `warna` varchar(256) NOT NULL,
  `stok` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `kode_product`, `nama_barang`, `harga`, `berat`, `diskon_harga`, `deskripsi`, `ukuran`, `tipe`, `warna`, `stok`, `image`, `date_created`) VALUES
(1, 2, 'zgVnKUdM3B', 'Poco M3 Pro 5G', 2000000, 120, 1000000, 'Merek : Xiomi', '0', '-', '1', '99', 'product_zgvnkudm3b.jpg', '2022-04-11 11:09:35'),
(3, 5, 'i1quvo4SWw', 'Kaos Polos', 100000, 100, 50000, 'Kaos kualitas Terbaik', 'L', '-', '5', '20', 'product_i1quvo4sww.jpg', '2022-03-23 22:40:49'),
(4, 5, 'NsizTljyq2', 'Kaos Polos Wanita', 60000, 100, 30000, 'Kaos Polos Wanita', 'M', '-', '2', '20', 'product_nsiztljyq2.jpg', '2022-04-18 06:30:11'),
(5, 5, 'aZ9IRdBKPO', 'Kaos Polos Merah', 80000, 100, 40000, 'Kaos Polos Merah', 'L', '-', '3', '30', 'product_az9irdbkpo.jpg', '2022-04-18 06:30:54'),
(6, 5, 'jRFtn06SMB', 'Kaos Polos Cowok', 40000, 100, 20000, 'Kaos Polos Cowok', 'L', '-', '9', '60', 'product_jrftn06smb.jpg', '2022-04-18 06:31:43'),
(7, 5, 'eDdCWnx1Vr', 'Sepatu Ventela', 250000, 1000, 200000, 'Sepatu Ventela', '0', 'Sepatu', '0', '100', 'product_eddcwnx1vr.jpg', '2022-06-21 11:15:22'),
(8, 5, 'Nj3V6P5TaF', 'Kaos Kaki', 100000, 1000, 50000, 'Kaos Kaki', '0', 'Kaos Kaki', '0', '100', 'product_nj3v6p5taf.jpg', '2022-06-21 11:25:50'),
(9, 5, '46tIh2RdJZ', 'Tas', 200000, 1000, 150000, 'Tas', '0', 'Kaos Kaki', '0', '100', 'product_46tih2rdjz.jpg', '2022-06-21 11:27:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `warna` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `color`
--

INSERT INTO `color` (`id`, `warna`) VALUES
(1, 'Putih'),
(2, 'Hitam'),
(3, 'Merah'),
(4, 'Kuning'),
(5, 'Biru'),
(6, 'Hijau'),
(7, 'Coklat'),
(8, 'Ungu'),
(9, 'Abu-abu'),
(10, 'Oranye'),
(11, 'Merah Muda/Pink');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `date_created`) VALUES
(2, 'Handphone', '2022-03-23 09:14:15'),
(4, 'Elektronik', '2022-03-23 09:54:47'),
(5, 'Pakaian', '2022-03-23 09:56:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_level_1`
--

CREATE TABLE `menu_level_1` (
  `id` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `icon` longtext NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu_level_1`
--

INSERT INTO `menu_level_1` (`id`, `url`, `title`, `icon`, `date_created`) VALUES
(1, 'admin', 'Admin', 'fas fa-user-astronaut', '2022-03-27 12:51:57'),
(2, 'home', 'Member', 'fas fa-home', '2022-04-07 11:17:24'),
(3, 'Keuangan', 'Keuangan', '', '2022-03-27 16:53:19'),
(5, 'menu', 'Menu', 'far fa-folder', '2022-04-05 10:19:07'),
(6, 'master', 'Master', 'fas fa-laptop', '2022-04-05 13:03:03'),
(7, 'pembayaran', 'Pembayaran', 'far fa-clipboard', '2022-04-07 11:17:42'),
(8, 'rekapadmin', 'Rekap Admin', 'fas fa-users-cog', '2022-04-07 11:18:04'),
(9, 'laporan', 'Laporan', 'far fa-file-alt', '2022-05-05 15:22:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_level_2`
--

CREATE TABLE `menu_level_2` (
  `id` int(11) NOT NULL,
  `id_menu_level_1` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `icon` varchar(256) NOT NULL,
  `is_active` int(11) NOT NULL,
  `status_sub` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu_level_2`
--

INSERT INTO `menu_level_2` (`id`, `id_menu_level_1`, `url`, `title`, `icon`, `is_active`, `status_sub`, `date_created`) VALUES
(1, 1, 'admin/cadmin/admin', 'Dashboard', 'fab fa-black-tie', 1, 1, '2022-04-06 13:06:51'),
(3, 1, 'admin/cadmin/admin/role', 'Role', 'fas fa-user-edit', 1, 1, '2022-04-05 10:54:20'),
(4, 5, 'menu', 'Menu Level 1', 'far fa-folder-open', 1, 1, '2022-04-05 10:44:16'),
(5, 5, 'menu/menulevel2', 'Menu Level 2', 'far fa-folder-open', 1, 1, '2022-04-05 10:46:48'),
(6, 5, 'menu/menulevel3', 'Menu Level 3', 'far fa-folder-open', 1, 1, '2022-04-05 10:47:05'),
(7, 6, 'master/ckategori/kategori', 'Kategori Product', 'fab fa-buromobelexperte', 1, 1, '2022-04-05 13:47:32'),
(8, 6, 'master/cproduct/product', 'Product', 'fab fa-product-hunt', 1, 1, '2022-04-05 13:48:40'),
(9, 7, 'pembayaran/crekappembayaran/rekappembayaran', 'Lihat Riwayat Pesanan', 'fas fa-history', 1, 1, '2022-04-06 21:30:08'),
(10, 8, 'rekapadmin/crekapadmin/rekapadmin', 'Pembayaran Pembeli', 'fas fa-money-check-alt', 1, 1, '2022-04-07 11:11:17'),
(11, 1, 'admin/cadmin/admin/setting', 'Setting', 'fas fa-wrench', 1, 1, '2022-04-11 14:47:13'),
(12, 9, 'laporan/claporan/laporan', 'Laporan Penjualan', 'fas fa-file-alt', 1, 1, '2022-05-05 15:24:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_level_3`
--

CREATE TABLE `menu_level_3` (
  `id` int(11) NOT NULL,
  `id_menu_level_2` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `icon` varchar(256) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu_level_3`
--

INSERT INTO `menu_level_3` (`id`, `id_menu_level_2`, `url`, `title`, `icon`, `is_active`, `date_created`) VALUES
(1, 1, 'OK', 'Contoh', '-', 1, '2022-03-29 20:52:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi_admin`
--

CREATE TABLE `notifikasi_admin` (
  `id` int(11) NOT NULL,
  `nik` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `isi_notifikasi` longtext NOT NULL,
  `status_notif` int(11) NOT NULL,
  `id_status_pembayaran` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi_admin`
--

INSERT INTO `notifikasi_admin` (`id`, `nik`, `nama`, `isi_notifikasi`, `status_notif`, `id_status_pembayaran`, `tanggal`) VALUES
(1, '0000000000000013', 'hendry', 'hendryMelakukan order barang, untuk melihat bukti pembayaran pembeli silahkan pergi ke rekap admin -> pembayaran pembeli', 1, 0, '2022-05-07 16:02:43'),
(2, '0000000000000013', 'hendry', 'hendry Berhasil upload bukti pembayaran, silahkan cek bukti pembayaran pembeli serta melakukan verifikasi pembayaran.', 1, 1, '2022-05-07 16:15:48'),
(3, '0000000000000001', 'Admin', ' Pesanan untukAdmin Berhasil dikirim', 1, 1, '2022-05-07 16:27:47'),
(4, '0000000000000013', 'hendry', 'hendry Melakukan order barang, untuk melihat bukti pembayaran pembeli silahkan pergi ke rekap admin -> pembayaran pembeli', 1, 0, '2022-05-07 16:45:27'),
(5, '0000000000000013', 'hendry', 'hendry Berhasil upload bukti pembayaran, silahkan cek bukti pembayaran pembeli serta melakukan verifikasi pembayaran.', 1, 1, '2022-05-07 16:46:01'),
(6, '', '', 'Pesanan Berhasil dikirim', 1, 1, '2022-05-07 16:46:42'),
(7, '0000000000000013', 'hendry', 'hendry Berhasil upload bukti pembayaran, silahkan cek bukti pembayaran pembeli serta melakukan verifikasi pembayaran.', 1, 1, '2022-05-07 16:50:16'),
(8, '', '', 'Pesanan Berhasil dikirim', 1, 1, '2022-05-07 16:51:01'),
(9, '0000000000000031', 'Sugeng', 'Sugeng Melakukan order barang, untuk melihat bukti pembayaran pembeli silahkan pergi ke rekap admin -> pembayaran pembeli', 1, 0, '2022-05-12 09:38:52'),
(10, '0000000000000031', 'Sugeng', 'Sugeng Berhasil upload bukti pembayaran, silahkan cek bukti pembayaran pembeli serta melakukan verifikasi pembayaran.', 1, 1, '2022-05-12 09:51:26'),
(11, '', '', 'Pesanan Berhasil dikirim', 1, 1, '2022-05-12 09:56:18'),
(12, '0000000000000031', 'Sugeng', 'Sugeng Melakukan order barang, untuk melihat bukti pembayaran pembeli silahkan pergi ke rekap admin -> pembayaran pembeli', 1, 0, '2022-05-12 12:30:32'),
(13, '0000000000000031', 'Sugeng', 'Sugeng Berhasil upload bukti pembayaran, silahkan cek bukti pembayaran pembeli serta melakukan verifikasi pembayaran.', 1, 1, '2022-05-12 12:31:22'),
(14, '', '', 'Pesanan Berhasil dikirim', 1, 1, '2022-05-12 12:43:31'),
(15, '0000000000000013', 'hendry', 'hendry Melakukan order barang, untuk melihat bukti pembayaran pembeli silahkan pergi ke rekap admin -> pembayaran pembeli', 1, 0, '2022-06-04 16:02:12'),
(16, '0000000000000013', 'hendry', 'hendry Berhasil upload bukti pembayaran, silahkan cek bukti pembayaran pembeli serta melakukan verifikasi pembayaran.', 1, 1, '2022-06-04 16:03:07'),
(17, '0000000000000013', 'hendry', 'hendry Melakukan order barang, untuk melihat bukti pembayaran pembeli silahkan pergi ke rekap admin -> pembayaran pembeli', 1, 0, '2022-06-21 09:53:09'),
(18, '0000000000000013', 'hendry', 'hendry Melakukan order barang, untuk melihat bukti pembayaran pembeli silahkan pergi ke rekap admin -> pembayaran pembeli', 1, 0, '2022-06-21 10:17:51'),
(19, '0000000000000013', 'hendry', 'hendry Melakukan order barang, untuk melihat bukti pembayaran pembeli silahkan pergi ke rekap admin -> pembayaran pembeli', 0, 0, '2022-06-21 22:39:55'),
(20, '0000000000000013', 'hendry', 'hendry Berhasil upload bukti pembayaran, silahkan cek bukti pembayaran pembeli serta melakukan verifikasi pembayaran.', 0, 1, '2022-06-21 22:43:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi_member`
--

CREATE TABLE `notifikasi_member` (
  `id` int(11) NOT NULL,
  `nik` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `isi_notifikasi` longtext NOT NULL,
  `status_notif` int(11) NOT NULL,
  `id_status_pembayaran` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi_member`
--

INSERT INTO `notifikasi_member` (`id`, `nik`, `nama`, `isi_notifikasi`, `status_notif`, `id_status_pembayaran`, `tanggal`) VALUES
(1, '0000000000000013', 'hendry', ' Pesanan anda sedang di proses, silahkan untuk melakukan pembayaran melalui transfer bank yang sudah kami sediakan.', 1, 0, '2022-05-07 16:02:43'),
(2, '0000000000000013', 'hendry', ' Upload bukti pembayarn berhasil, silahkan menunggu verifikasi pembayaran dari admin.', 1, 1, '2022-05-07 16:15:48'),
(3, '0000000000000001', 'Admin', ' Pesanan berhasil dikirim, silahkan cek nomer resi anda di riwayat pesanan.', 0, 1, '2022-05-07 16:27:47'),
(4, '0000000000000013', 'hendry', ' Pesanan anda sedang di proses, silahkan untuk melakukan pembayaran melalui transfer bank yang sudah kami sediakan.', 1, 0, '2022-05-07 16:45:27'),
(5, '0000000000000013', 'hendry', ' Upload bukti pembayarn berhasil, silahkan menunggu verifikasi pembayaran dari admin.', 1, 1, '2022-05-07 16:46:01'),
(6, '', '', ' Pesanan berhasil dikirim, silahkan cek nomer resi anda di riwayat pesanan.', 0, 1, '2022-05-07 16:46:42'),
(7, '0000000000000013', 'hendry', ' Upload bukti pembayarn berhasil, silahkan menunggu verifikasi pembayaran dari admin.', 1, 1, '2022-05-07 16:50:16'),
(8, '', '', ' Pesanan berhasil dikirim, silahkan cek nomer resi anda di riwayat pesanan.', 0, 1, '2022-05-07 16:51:01'),
(9, '0000000000000031', 'Sugeng', ' Pesanan anda sedang di proses, silahkan untuk melakukan pembayaran melalui transfer bank yang sudah kami sediakan.', 1, 0, '2022-05-12 09:38:52'),
(10, '0000000000000031', 'Sugeng', ' Upload bukti pembayarn berhasil, silahkan menunggu verifikasi pembayaran dari admin.', 1, 1, '2022-05-12 09:51:26'),
(11, '', '', ' Pesanan berhasil dikirim, silahkan cek nomer resi anda di riwayat pesanan.', 0, 1, '2022-05-12 09:56:18'),
(12, '0000000000000031', 'Sugeng', ' Pesanan anda sedang di proses, silahkan untuk melakukan pembayaran melalui transfer bank yang sudah kami sediakan.', 1, 0, '2022-05-12 12:30:32'),
(13, '0000000000000031', 'Sugeng', ' Upload bukti pembayarn berhasil, silahkan menunggu verifikasi pembayaran dari admin.', 1, 1, '2022-05-12 12:31:22'),
(14, '', '', ' Pesanan berhasil dikirim, silahkan cek nomer resi anda di riwayat pesanan.', 0, 1, '2022-05-12 12:43:31'),
(15, '0000000000000013', 'hendry', ' Pesanan anda sedang di proses, silahkan untuk melakukan pembayaran melalui transfer bank yang sudah kami sediakan.', 1, 0, '2022-06-04 16:02:12'),
(16, '0000000000000013', 'hendry', ' Upload bukti pembayarn berhasil, silahkan menunggu verifikasi pembayaran dari admin.', 1, 1, '2022-06-04 16:03:07'),
(17, '0000000000000013', 'hendry', ' Pesanan anda sedang di proses, silahkan untuk melakukan pembayaran melalui transfer bank yang sudah kami sediakan.', 1, 0, '2022-06-21 09:53:09'),
(18, '0000000000000013', 'hendry', ' Pesanan anda sedang di proses, silahkan untuk melakukan pembayaran melalui transfer bank yang sudah kami sediakan.', 1, 0, '2022-06-21 10:17:51'),
(19, '0000000000000013', 'hendry', ' Pesanan anda sedang di proses, silahkan untuk melakukan pembayaran melalui transfer bank yang sudah kami sediakan.', 0, 0, '2022-06-21 22:39:55'),
(20, '0000000000000013', 'hendry', ' Upload bukti pembayarn berhasil, silahkan menunggu verifikasi pembayaran dari admin.', 0, 1, '2022-06-21 22:43:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_pembayaran_pelanggan`
--

CREATE TABLE `rekap_pembayaran_pelanggan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_order` varchar(256) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(256) DEFAULT NULL,
  `provinsi` varchar(256) DEFAULT NULL,
  `kota` varchar(256) DEFAULT NULL,
  `alamat_penerima` text DEFAULT NULL,
  `kode_pos` varchar(100) DEFAULT NULL,
  `ekspedisi` varchar(256) DEFAULT NULL,
  `paket` varchar(256) DEFAULT NULL,
  `estimasi` varchar(256) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_pembayaran` varchar(256) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(256) DEFAULT NULL,
  `nama_bank` varchar(256) DEFAULT NULL,
  `no_rek` varchar(256) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(256) DEFAULT NULL,
  `keterangan` longtext DEFAULT NULL,
  `hp_penerima` varchar(128) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekap_pembayaran_pelanggan`
--

INSERT INTO `rekap_pembayaran_pelanggan` (`id`, `id_user`, `no_order`, `tgl_order`, `nama_penerima`, `provinsi`, `kota`, `alamat_penerima`, `kode_pos`, `ekspedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_pembayaran`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`, `keterangan`, `hp_penerima`, `date_created`) VALUES
(3, 7, '20220414DGY8CKTN', '2022-04-14', 'NOVITA KURNIA NINGRUM', 'Jawa Tengah', 'Batang', 'Petamanan Banyuputih RT 05 / RW 03', '51271', 'tiki', 'ECO', '4 Hari', 13000, 980, 0, 13000, '1', 'bukti_bayar_0000000000000013.jpg', 'lola', 'BCA', '23432425252', 0, NULL, NULL, '0865643556655', '2022-04-14 10:54:10'),
(4, 7, '20220414GBCBTDMZ', '2022-04-14', 'hendry agus setiawan', 'Jawa Tengah', 'Batang', 'Petamanan Banyuputih RT 05 / RW 03', '51271', 'pos', 'Paket Kilat Khusus', '4 HARI Hari', 13300, 1020, 0, 13300, '1', 'bukti_bayar_0000000000000013.jpg', 'papa', 'BRI', '72673264233', 0, NULL, NULL, '0865643556655', '2022-04-14 10:56:04'),
(5, 7, '20220414QJBL1M5S', '2022-04-14', 'satria', 'Jawa Tengah', 'KABUPATEN SEMARANG', 'Semarang indah', '53300', 'tiki', 'ECO', '4 Hari', 20000, 2000, 0, 20000, '1', 'bukti_bayar_0000000000000013.jpg', 'mama', 'BRI', '12234567866', 0, NULL, NULL, '0865643556655', '2022-04-14 10:58:28'),
(6, 7, '20220414MOCWIKA5', '2022-04-14', 'pulung3', 'Jawa Tengah', 'KABUPATEN SEMARANG', 'Semarang indah', '53300', 'tiki', 'ECO', '4 Hari', 12500, 580, 0, 12500, '1', 'bukti_bayar_0000000000000013.jpg', 'sasa', 'BCA', '123142343534', 0, NULL, NULL, '0865643556655', '2022-04-14 10:59:31'),
(7, 7, '202204148AFNT3JS', '2022-04-14', 'NOVITA KURNIA NINGRUM', 'Lampung', 'JAKARTA UTARA', 'Petamanan Banyuputih RT 05 / RW 03', '14420', 'tiki', 'ECO', '5 Hari', 26000, 680, 0, 26000, '1', 'bukti_bayar_0000000000000013.jpg', 'Tawon', 'BCA', '2343242525', 0, NULL, NULL, '0865643556655', '2022-04-14 11:01:18'),
(8, 7, '20220414ULIJGMHB', '2022-04-14', 'satria', 'Jawa Tengah', 'Tegal', 'Tegal', '51271', 'pos', 'Paket Kilat Khusus', '3 HARI Hari', 9000, 600, 0, 9000, '1', 'bukti_bayar_0000000000000013.jpg', 'Kucingku', 'BCA', '1234543234', 0, NULL, NULL, '0865643556655', '2022-04-14 20:36:03'),
(9, 7, '20220427AZM80CDM', '2022-04-27', 'satria', 'Bangka Belitung', 'Batang', 'Semarang indah', '51271', 'jne', 'OKE', '3-6 Hari', 44000, 100, 0, 44000, '1', 'bukti_bayar_0000000000000013.jpg', 'Kucing', 'BRI', '027782662123723', 0, NULL, NULL, '0865643556655', '2022-04-27 08:12:01'),
(10, 7, '2022042702ASAGY4', '2022-04-27', 'samsul', 'Kepulauan Riau', 'Batang', 'batang', '51271', 'tiki', 'ECO', '5 Hari', 56000, 200, 0, 56000, '1', 'bukti_bayar_0000000000000013.jpg', 'saifudin', 'BCA', '2837495873', 0, NULL, NULL, '0865643556655', '2022-04-27 09:23:30'),
(11, 7, '20220430TKEZHVBZ', '2022-04-30', 'NOVITA KURNIA NINGRUM', 'Lampung', 'Batang', 'Petamanan Banyuputih RT 05 / RW 03', '51271', 'tiki', 'ECO', '5 Hari', 29000, 200, 0, 29000, '1', 'bukti_bayar_0000000000000013_20220430tkezhvbz.jpg', 'sasabila', 'BNI', '24324322543', 3, 'JKT2347623423424', NULL, '0865643556655', '2022-04-30 07:43:17'),
(12, 7, '20220504LKJD7YVE', '2021-05-01', 'musin', 'Banten', 'JAKARTA UTARA', 'batang', '14420', 'pos', 'Paket Kilat Khusus', '4 HARI Hari', 14000, 100, 0, 14000, '1', 'bukti_bayar_0000000000000013_20220504lkjd7yve.jpg', 'Hendry Agus Setiawan', 'BCA', '2343242525', 3, 'JKT2347623423421', NULL, '0865643556655', '2022-05-04 06:43:34'),
(13, 7, '20220507BMR4ECZH', '2022-05-07', 'setiawan', 'Jawa Tengah', 'JAKARTA UTARA', 'Semarang', '14420', 'pos', 'Paket Kilat Khusus', '3 HARI Hari', 14000, 400, 140000, 154000, '1', 'bukti_bayar_0000000000000013_20220507bmr4eczh.jpg', 'bagas', 'BCA', '1234567543', 3, 'JKT2347623423333', NULL, '0865643556655', '2022-05-07 09:28:20'),
(14, 7, '20220507SV2LRSP1', '2022-05-07', 'wanto', 'Banten', 'KABUPATEN SEMARANG', 'batang', '53300', 'jne', 'OKE', '3-6 Hari', 16000, 120, 1000000, 1016000, '1', 'bukti_bayar_0000000000000013_20220507sv2lrsp1.jpg', 'Samsul Aja', 'BCA', '1234543212', 3, 'JKT2347623421211', NULL, '0865643556655', '2022-05-07 15:12:27'),
(15, 7, '20220507VQWZNBEP', '2022-05-07', 'satria', 'Nanggroe Aceh Darussalam (NAD)', 'KABUPATEN SEMARANG', 'Petamanan Banyuputih RT 05 / RW 03', '53300', 'tiki', 'REG', '3 Hari', 84000, 100, 40000, 124000, '1', 'bukti_bayar_0000000000000013_20220507vqwznbep.jpg', 'Uvuvwewe', 'BRI', '027782662123723', 2, 'JKT2347623423420', NULL, '0865643556655', '2022-05-07 16:02:43'),
(16, 7, '20220507ODGV7E1V', '2022-05-07', 'Aris Dwiyanto', 'Maluku Utara', 'Batang', 'Kampung Japat Saleh', '51271', 'tiki', 'ECO', '6 Hari', 93000, 220, 1050000, 1143000, '1', 'bukti_bayar_0000000000000013_20220507odgv7e1v.jpg', 'Hendry Agus Setiawan', 'BCA', '2837495873', 3, 'JKT2347623423424', NULL, '0865643556655', '2022-05-07 16:45:27'),
(17, 11, '20220512SLBNWX3G', '2022-05-12', 'Sugeng', 'Jawa Tengah', 'Semarang', 'Jl. Walisongo No.3-5, Tambakaji, Kec. Ngaliyan, Kota Semarang, Jawa Tengah 50185', '51722', 'pos', 'Paket Kilat Khusus', '3 HARI Hari', 11000, 100, 50000, 61000, '1', 'bukti_bayar_0000000000000031_20220512slbnwx3g.jpg', 'Sugeng', 'BCA', '2297220891', 3, 'JKT23476234234001', NULL, '0865643556655', '2022-05-12 09:38:52'),
(18, 11, '20220512G82MTAFN', '2022-05-12', 'samin', 'Jawa Tengah', 'Batang', 'Petamanan Banyuputih RT 05 / RW 03', '51271', 'tiki', 'ONS', '1 Hari', 16500, 400, 160000, 176500, '1', 'bukti_bayar_0000000000000031_20220512g82mtafn.jpg', 'Hendry Agus Setiawan', 'BCA', '027782662123723', 3, 'JKT2347623423424', NULL, '0865643556655', '2022-05-12 12:30:31'),
(19, 7, '20220604SPBHC9CB', '2022-06-04', 'JGFKUVFJH', 'Jawa Tengah', 'Tegal', 'TEgal', '52131', 'jne', 'CTCYES', '1-1 Hari', 10000, 120, 1000000, 1010000, '1', 'bukti_bayar_0000000000000013_20220604spbhc9cb.jpg', 'Januar Satria Ramadhan', 'BCA', '047040199', 1, NULL, NULL, '0818099020493123', '2022-06-04 16:02:12'),
(20, 7, '20220621EWLGPPAY', '2022-06-21', 'sa', 'Jawa Timur', 'Tegal', 'Jalan Arum Indah 5 Gang 5 No 29 Tegal', '52131', 'tiki', 'REG', '3 Hari', 15000, 500, 200000, 215000, '1', 'bukti_bayar_0000000000000013_20220621ewlgppay.jpg', 'Januar Satria Ramadhan', 'BCA', '142345', 0, NULL, NULL, '0818099020493123', '2022-06-21 09:53:09'),
(21, 7, '20220621JKGM8PA4', '2022-06-21', 'Ruri suko basuki', 'Kalimantan Selatan', 'Tegal', 'Jalan Arum Indah 5 Gang 5 No 29 Tegal', '52131', 'pos', 'Paket Kilat Khusus', '5 HARI Hari', 47500, 100, 50000, 97500, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '0818099020493123', '2022-06-21 10:17:51'),
(22, 7, '20220621YOLCLUHT', '2022-06-21', 'Adiba', 'Jawa Tengah', 'Tegal', 'Jalan Arum Indah 5 Gang 5 No 29 Tegal', '52131', 'tiki', 'REG', '3 Hari', 11000, 120, 1000000, 1011000, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '0818099020493123', '2022-06-21 22:39:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama_role`, `date_created`) VALUES
(1, 'Admin', '2022-03-27 07:23:35'),
(2, 'Member', '2022-03-27 07:25:55'),
(3, 'Keuangan', '2022-03-27 07:26:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(256) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telepon` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telepon`) VALUES
(1, 'SatriaShop', 472, 'Jl. Satria 12 No.21 Kota Tegal', '   085367895678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id` int(11) NOT NULL,
  `status_pembayaran` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id`, `status_pembayaran`) VALUES
(0, 'Belum Bayar'),
(1, 'Sudah Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(256) DEFAULT NULL,
  `no_rek` varchar(256) DEFAULT NULL,
  `atas_nama` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BNI', '1137864740', 'Januar Satria Ramadhan'),
(2, 'BRI', '027782662123742', 'Januar Satria Ramadhan'),
(3, 'BCA', '3397260891', 'Januar Satria Ramadhan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id` int(11) NOT NULL,
  `no_order` varchar(256) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id`, `no_order`, `id_barang`, `qty`) VALUES
(1, '20220414DGY8CKTN', 3, 5),
(2, '20220414DGY8CKTN', 1, 5),
(3, '20220414GBCBTDMZ', 3, 3),
(4, '20220414GBCBTDMZ', 1, 3),
(5, '20220414QJBL1M5S', 3, 8),
(6, '20220414QJBL1M5S', 1, 8),
(7, '20220414MOCWIKA5', 3, 1),
(8, '20220414MOCWIKA5', 1, 4),
(9, '202204148AFNT3JS', 3, 2),
(10, '202204148AFNT3JS', 1, 4),
(11, '20220414ULIJGMHB', 1, 5),
(12, '20220427AZM80CDM', 5, 1),
(13, '2022042702ASAGY4', 4, 1),
(14, '2022042702ASAGY4', 5, 1),
(15, '20220430TKEZHVBZ', 5, 1),
(16, '20220430TKEZHVBZ', 4, 1),
(17, '20220504LKJD7YVE', 3, 1),
(18, '20220507BMR4ECZH', 5, 2),
(19, '20220507BMR4ECZH', 4, 2),
(20, '20220507SV2LRSP1', 1, 1),
(21, '20220507VQWZNBEP', 5, 1),
(22, '20220507ODGV7E1V', 1, 1),
(23, '20220507ODGV7E1V', 3, 1),
(24, '20220512SLBNWX3G', 3, 1),
(25, '20220512G82MTAFN', 3, 2),
(26, '20220512G82MTAFN', 4, 2),
(27, '20220604SPBHC9CB', 1, 1),
(28, '20220621EWLGPPAY', 3, 2),
(29, '20220621EWLGPPAY', 4, 2),
(30, '20220621EWLGPPAY', 5, 1),
(31, '20220621JKGM8PA4', 3, 1),
(32, '20220621YOLCLUHT', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `nik` varchar(256) NOT NULL,
  `alamat` longtext NOT NULL,
  `email` longtext NOT NULL,
  `username` longtext NOT NULL,
  `password` longtext NOT NULL,
  `no_hp` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `nik`, `alamat`, `email`, `username`, `password`, `no_hp`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Adam', '0000000000000012', 'kendal', 'KzMybEdCdkI2K2NuUmRFS3g2c1dGeVh6djJwVXlYSTBreXJzWnJhUGRodz0=', 'VHIyVkM4UUlmejdwQ2pBTE10eDVIZz09', 'Wjk0cFNxaEZIZERzM1ExTmxtMXk4UT09', '085325026752', 'profile_0000000000000012.png', 2, 1, '2022-03-19 14:20:44'),
(7, 'hendry', '0000000000000013', 'Petamanan Banyuputih RT 05 / RW 03', 'KzMybEdCdkI2K2NuUmRFS3g2c1dGeVh6djJwVXlYSTBreXJzWnJhUGRodz0=', 'aW5VeDd0N0prQlFPZExaVnc1Y05Fdz09', 'Wjk0cFNxaEZIZERzM1ExTmxtMXk4UT09', '085325026752', 'profile_0000000000000013.png', 2, 1, '2022-03-19 14:27:26'),
(8, 'Admin', '0000000000000001', 'Tegal', 'KzMybEdCdkI2K2NuUmRFS3g2c1dGeVh6djJwVXlYSTBreXJzWnJhUGRodz0=', 'RE5pblB1OEJKYnBaUy91YUZ1WUYvUT09', 'Wjk0cFNxaEZIZERzM1ExTmxtMXk4UT09', '085325026752', 'profile_0000000000000001.png', 1, 1, '2022-03-22 14:58:11'),
(9, 'ahok69', '0000000000000014', 'tegal', 'KzMybEdCdkI2K2NuUmRFS3g2c1dGeVh6djJwVXlYSTBreXJzWnJhUGRodz0=', 'VXMrNHRHREwrTGg5YzNrWldncnNBdz09', 'Wjk0cFNxaEZIZERzM1ExTmxtMXk4UT09', '085325026752', 'profile_0000000000000014.jpg', 2, 1, '2022-03-25 11:17:57'),
(11, 'Sugeng', '0000000000000031', 'Jl. Walisongo No.3-5, Tambakaji, Kec. Ngaliyan, Kota Semarang, Jawa Tengah 50185', 'dXU1QytNNng3VHJzeXV6TWNYNDdOb3NpSXZHdUpJZVR2K1pNVzB5dkR5VT0=', 'cFZrMVk3UThFOHFZTGw4YjQxNzFXZz09', 'Wjk0cFNxaEZIZERzM1ExTmxtMXk4UT09', '085325026752', 'profile_0000000000000031.jpg', 2, 1, '2022-05-12 09:03:55'),
(12, 'Admin', '0000000000000123', 'Kota Tegal', 'TUdXY2hZWGtYNG5qc3NESGV4V3RuWGRwbXpuSG5sY2lIUFpuRGI3S2t5bz0=', 'Wjgvd3hMbWxEdWFKNTU3NmJDTWtTdz09', 'Wjk0cFNxaEZIZERzM1ExTmxtMXk4UT09', '085325026711', 'profile_0000000000000123.png', 1, 1, '2022-05-13 06:16:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_menu_level_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `id_menu_level_1`) VALUES
(1, 1, 1),
(2, 1, 5),
(14, 3, 3),
(18, 1, 6),
(21, 2, 7),
(23, 1, 8),
(24, 1, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` longtext NOT NULL,
  `token` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'TUdXY2hZWGtYNG5qc3NESGV4V3RuWGRwbXpuSG5sY2lIUFpuRGI3S2t5bz0=', 'ogezflEgoulQ+3GJgxzmiLd375obhKD0Pnk42L0mELU=', 1652397417);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_level_1`
--
ALTER TABLE `menu_level_1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_level_2`
--
ALTER TABLE `menu_level_2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_level_3`
--
ALTER TABLE `menu_level_3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi_admin`
--
ALTER TABLE `notifikasi_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi_member`
--
ALTER TABLE `notifikasi_member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekap_pembayaran_pelanggan`
--
ALTER TABLE `rekap_pembayaran_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menu_level_1`
--
ALTER TABLE `menu_level_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `menu_level_2`
--
ALTER TABLE `menu_level_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `menu_level_3`
--
ALTER TABLE `menu_level_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `notifikasi_admin`
--
ALTER TABLE `notifikasi_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `notifikasi_member`
--
ALTER TABLE `notifikasi_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `rekap_pembayaran_pelanggan`
--
ALTER TABLE `rekap_pembayaran_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
