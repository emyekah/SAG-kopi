-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 12:01 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `c_pembayaran`
--

CREATE TABLE `c_pembayaran` (
  `id_cara` int(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `c_pembayaran`
--

INSERT INTO `c_pembayaran` (`id_cara`, `judul`, `deskripsi`) VALUES
(9, 'Tata Cara Pemesanan', '<p style=\"text-align: justify;\">* Untuk mempermudah proses pemesanan anda silahkan terlebih dahulu registrasi agar dapat masuk melalui akun yang telah anda daftarkan </p>\r\n<p style=\"text-align: justify;\">CARA PEMESANAN :</p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Pilih barang yang ingin anda beli, lalu pilih tambah ke keranjang</li>\r\n<li>Cek barang yang anda beli di keranjang belanja</li>\r\n<li>Jika selesai cek barang belanjaan anda kemudian pilih menu selesai belanja</li>\r\n<li>Lalu silahkan masukkan data informasi pengiriman, dan pilih kirim</li>\r\n<li>Silahkan cek e-mail anda untuk melihat informasi pembayaran</li>\r\n<li>Tranfer VIA Bank BCA atau BRI</li>\r\n<li>Setelah melakukan pembayaran silahkan konfirmasi pembayaran anda pada menu unggah bukti</li>\r\n<li>Kemudian masukkan <strong>id order</strong> yang tertulis pada email yang anda terima, dan foto bukti transfer pembayaran</li>\r\n<li>Jika admin telah mengkonfirmasi pembayaran anda, maka anda akan menerima email yang berisi status pemesanan dan pengiriman barang belanjaan anda segera diproses</li>\r\n<li>Apabila barang sudah sampai silahkan check list data transaksi pembelian anda pada menu transaksi untuk mengkonfirmasi admin</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">Anda dapat melihat history pembelian apabila anda sudah masuk dengan akun yang telah terdaftar, jika belum memiliki akun segera daftar pada menu registrasi dengan e-mail yang anda gunakan untuk transaksi pembelian</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\"># untuk informasi lebih lanjut silahkan hubungi customer service kami dengan nomor telephone  <strong>087719052174 / 082225705183</strong> atau langsung datang ke toko kami pada alamat <strong>Dusun Jambon, Gandurejo, Bulu, Jambon, Gandurejo, Kec. Bulu, Kabupaten Temanggung, Jawa Tengah 56253<br /></strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` tinyint(2) NOT NULL,
  `username` varchar(35) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reset` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `username`, `fullname`, `password`, `email`, `reset`) VALUES
(1, 'admin', 'mayuka', '$2y$10$c6gMMd5KoCGnKOT1aL1PzeGoexIKvz7zydk.Qk32ss/o58V8AUy1y', 'leadload6@gmail.com', 'ad1848d68e61ebeadd05e65dcabb7d0e'),
(2, 'operator', 'yusuf dekon', '$2y$10$aXv4I9pfNzT04ymZaUoIWOKZfzBrZ72SzAZUnTNCljX0w2/FEh8AO', 'agraesport@gmail.com', ''),
(3, 'pemilik', 'kaharudin', '$2y$10$L9fl3wzlSKN.Q2IiOghEve4kXcV69nso404tRZLs0H74MMWE6b7x6', 'mykaharudin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_biji`
--

CREATE TABLE `t_biji` (
  `id_biji` int(11) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_biji`
--

INSERT INTO `t_biji` (`id_biji`, `tanggal_datang`, `jumlah`, `jenis`) VALUES
(2, '2020-11-12', 91, 'robusta'),
(3, '2020-08-07', 66, 'arabika');

-- --------------------------------------------------------

--
-- Table structure for table `t_catatan`
--

CREATE TABLE `t_catatan` (
  `id_catatan` int(11) NOT NULL,
  `tanggal_catatan` date NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_order`
--

CREATE TABLE `t_detail_order` (
  `id_order` varchar(10) NOT NULL,
  `id_item` int(7) NOT NULL,
  `qty` smallint(4) NOT NULL,
  `biaya` int(9) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `bts_bayar` date NOT NULL,
  `status_proses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_hasil_produksi`
--

CREATE TABLE `t_hasil_produksi` (
  `tanggal_hasil_produksi` date NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `jumlah_hasil_jadi` int(11) NOT NULL,
  `jumlah_sortir` int(11) NOT NULL,
  `hasil_bersih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hasil_produksi`
--

INSERT INTO `t_hasil_produksi` (`tanggal_hasil_produksi`, `id_produksi`, `jumlah_hasil_jadi`, `jumlah_sortir`, `hasil_bersih`) VALUES
('2020-08-15', 3, 55, 11, 55);

-- --------------------------------------------------------

--
-- Table structure for table `t_img`
--

CREATE TABLE `t_img` (
  `id_item` int(7) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_items`
--

CREATE TABLE `t_items` (
  `id_item` int(7) NOT NULL,
  `link` varchar(10) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `harga` int(10) NOT NULL,
  `berat` int(5) NOT NULL,
  `stok` smallint(2) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `t_items`
--

INSERT INTO `t_items` (`id_item`, `link`, `nama_item`, `harga`, `berat`, `stok`, `aktif`, `gambar`, `deskripsi`) VALUES
(1, '1584145863', 'Robusta', 12000, 100, 55, 1, 'gambar1597396819.jpg', 'bagi para perokok jangan lupa ngopi di temani kopi robusta yang cocok khas dari tanah temanggung'),
(2, '1584147321', 'Arabika', 24000, 250, 20, 1, 'gambar1597397066.jpg', 'Silakan bagi para pecinta UEA bisa dicoba kopi arabika yang bisa membuat anda fasih bahasa arab sambil lihat buku'),
(3, '1584168968', 'Arabusta', 20000, 100, 25, 1, 'gambar1597397238.jpg', 'Yok yang seneng ada kata arab tapi mau belum kesampean mending  mending ngopi arabusta khas temanggung di jamin berkah jika anda jual kembali dan hasil nya bisa di tabung buat ke UAE'),
(4, '1585566075', 'Kopi Lanang', 25000, 250, 54, 1, 'gambar1597397338.jpg', 'Hey para kaum lelaki minum kopi pilih lah kopi lanang ini top brand nya asli kopi mukidi dijamin rasa dan tekstur nya bikin kebayang sama dia'),
(5, '1597397419', 'Special Blend', 25000, 250, 30, 1, 'gambar1597397418.jpg', 'Bingung mau kado apa ke orang special mending kopi Special blend kopi mungkin aja cocok buat kamu pecinta senja');

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` smallint(6) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`id_kategori`, `kategori`, `url`) VALUES
(3, 'Robusta', 'robusta'),
(4, 'Arabika', 'arabika'),
(5, 'Arabusta', 'arabusta'),
(6, 'Lanang', 'lanang'),
(7, 'Special', 'special');

-- --------------------------------------------------------

--
-- Table structure for table `t_order`
--

CREATE TABLE `t_order` (
  `id_order` varchar(15) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `pos` int(5) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kurir` varchar(5) NOT NULL,
  `service` varchar(50) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `bts_bayar` date NOT NULL,
  `bukti` varchar(25) NOT NULL,
  `status_proses` enum('belum','proses','selesai','kadaluarsa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_produk`
--

CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `dipesan` int(11) NOT NULL,
  `tersedia` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_produksi`
--

CREATE TABLE `t_produksi` (
  `id_produksi` int(11) NOT NULL,
  `id_biji` int(11) NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `jumlah_produksi` int(11) NOT NULL,
  `catatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_produksi`
--

INSERT INTO `t_produksi` (`id_produksi`, `id_biji`, `tanggal_produksi`, `jumlah_produksi`, `catatan`) VALUES
(2, 2, '2020-11-12', 81, '10 lagi masih dalam pengeringan'),
(3, 3, '2020-11-12', 66, 'tak ada Kendala');

-- --------------------------------------------------------

--
-- Table structure for table `t_profil`
--

CREATE TABLE `t_profil` (
  `id_profil` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `shopee` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `whatsapp1` varchar(50) NOT NULL,
  `whatsapp2` varchar(50) NOT NULL,
  `email_toko` varchar(50) NOT NULL,
  `pass_toko` varchar(50) NOT NULL,
  `api_key` varchar(50) NOT NULL,
  `asal` mediumint(9) NOT NULL,
  `rekening1` varchar(15) NOT NULL,
  `rekening2` varchar(15) NOT NULL,
  `rekening3` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `t_profil`
--

INSERT INTO `t_profil` (`id_profil`, `title`, `alamat_toko`, `phone1`, `phone2`, `facebook`, `shopee`, `instagram`, `whatsapp1`, `whatsapp2`, `email_toko`, `pass_toko`, `api_key`, `asal`, `rekening1`, `rekening2`, `rekening3`) VALUES
(1, 'Kopi Mukidi', 'Dusun Jambon, Gandurejo, Bulu, Jambon, Gandurejo, Kec. Bulu, Kabupaten Temanggung, Jawa Tengah 56253', '087719052174', '082225705183', 'https://facebook.com/kopimukidi', 'https://shopee.com/kopimukidi', 'https://instagram.com/kopimukidi', 'https://api.whatsapp.com/send?phone=6287719052174', 'https://api.whatsapp.com/send?phone=6282225705183', 'leadload6@gmail.com', 'Suksesitu678', '5bf92167626fd60c6567f78553946af6', 411, '172201000817531', '8025120224', '0794008404');

-- --------------------------------------------------------

--
-- Table structure for table `t_rkategori`
--

CREATE TABLE `t_rkategori` (
  `id_item` int(7) NOT NULL,
  `id_kategori` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `t_rkategori`
--

INSERT INTO `t_rkategori` (`id_item`, `id_kategori`) VALUES
(1, 3),
(2, 4),
(3, 5),
(4, 6),
(5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `id_user` int(7) NOT NULL,
  `username` varchar(35) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `reset` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c_pembayaran`
--
ALTER TABLE `c_pembayaran`
  ADD PRIMARY KEY (`id_cara`) USING BTREE;

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- Indexes for table `t_biji`
--
ALTER TABLE `t_biji`
  ADD PRIMARY KEY (`id_biji`);

--
-- Indexes for table `t_catatan`
--
ALTER TABLE `t_catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `t_items`
--
ALTER TABLE `t_items`
  ADD PRIMARY KEY (`id_item`) USING BTREE;

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`) USING BTREE;

--
-- Indexes for table `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`id_order`) USING BTREE;

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `t_produksi`
--
ALTER TABLE `t_produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `t_profil`
--
ALTER TABLE `t_profil`
  ADD PRIMARY KEY (`id_profil`) USING BTREE;

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `c_pembayaran`
--
ALTER TABLE `c_pembayaran`
  MODIFY `id_cara` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_biji`
--
ALTER TABLE `t_biji`
  MODIFY `id_biji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_catatan`
--
ALTER TABLE `t_catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_items`
--
ALTER TABLE `t_items`
  MODIFY `id_item` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id_kategori` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_produksi`
--
ALTER TABLE `t_produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_profil`
--
ALTER TABLE `t_profil`
  MODIFY `id_profil` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
