-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 01:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sorange`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `login_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`login_id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Rofi Nafiis Z'),
(2, 'admin2', 'fcea920f7412b5da7be0cf42b8c93759', 'Haris Riyoni'),
(25, 'rofinafiin', '25d55ad283aa400af464c76d713c07ad', 'ropi'),
(26, 'haris123', 'fcea920f7412b5da7be0cf42b8c93759', 'Haris Riyoni');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `judul_berita` varchar(150) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `kategori`, `judul_berita`, `deskripsi`, `isi_berita`, `gambar`) VALUES
(35, 'Sport', 'Sengit! Nigma Galaxy SEA Sukses Promosi ke Upper Division SEA', 'Penentuan promosi Nigma Galaxy SEA ke upper division DPC regional SEA harus dilewati dengan laga sengit', 'Penentuan promosi Nigma Galaxy SEA ke upper division DPC regional SEA harus dilewati dengan laga sengit. Menghadapi Ragdoll dalam tiebreaker menentukan peringkat kedua di lower division, Inyourdream cs hampir saja takluk oleh perlawanan sengit dari Ragdoll.\r\n\r\nNGX tertinggal di game pertama akibat draft teamfight dan crowd control yang superior dari Ragdoll. Kehadiran Puck, Brewmaster, Lion dan Death Prophet menyulitkan NGX menginisiasi serangan karena banyak stun dan silance yang dimiliki Ragdoll.\r\nLine up tanky yang coba dipakai NGX dengan Kunkka carry dan Doom tak mampu berbuat banyak tanpa skill mereka. Sementara Ragdoll mempercayakan output damage burst dari Templar Assassin yang bisa melumat musuh dalam beberapa kali pukul.\r\n\r\nGame dua tak kalah berat untuk NGX SEA. Inyourdream menjalani laning yang cukup menderita harus terciduk dua kali di 10 menit pertama pertandingan. Untungnya, Alacrity Ember Spirit dan Mizu memakai Dark Seer andalannya menggila di game ini.', '466520220123202048.jpg'),
(36, 'Kesehatan', 'Presiden Pastikan Pemberian Vaksin Covid-19 Dosis Ketiga Gratis', 'Presiden Joko Widodo resmi mengumumkan bahwa pemberian vaksin Covid-19 dosis ketiga (booster) akan dimulai pada 12 Januari 2022 dengan prioritas masyarakat lanjut usia (lansia) dan kelompok rentan. ', 'Presiden Joko Widodo resmi mengumumkan bahwa pemberian vaksin Covid-19 dosis ketiga (booster) akan dimulai pada 12 Januari 2022 dengan prioritas masyarakat lanjut usia (lansia) dan kelompok rentan. \r\n\r\nSaat menyampaikan keterangannya di Istana Merdeka, pada Selasa, 11 Januari 2022, Presiden menegaskan bahwa vaksin dosis ketiga akan diberikan secara gratis bagi seluruh masyarakat Indonesia. \r\n\r\n\"Saya telah memutuskan pemberian vaksin ketiga ini gratis bagi seluruh masyarakat Indonesia karena sekali lagi saya tegaskan bahwa keselamatan rakyat adalah yang utama,” ujar Presiden.\r\n\r\nMenurut Presiden Jokowi, pemberian vaksin dosis ketiga (booster) Covid-19 dilakukan pemerintah untuk meningkatkan kekebalan tubuh masyarakat dari paparan virus korona yang terus bermutasi. Vaksin dosis ketiga ini pun akan diberikan kepada masyarakat sesuai dengan syarat dan ketentuan yang dibutuhkan penerima vaksin.\r\n\r\n“Syarat dan ketentuan yang dibutuhkan untuk menerima vaksinasi ketiga ini adalah calon penerima sudah menerima vaksin Covid-19 dosis kedua lebih dari enam bulan sebelumnya,” ungkap Presiden. \r\n\r\nPresiden mengimbau agar masyarakat tetap waspada dan disiplin dalam menerapkan protokol kesehatan meski telah divaksin.\r\n\r\n“Saya mengingatkan masyarakat untuk tetap disiplin dalam menjalankan protokol kesehatan, memakai masker, menjaga jarak, dan mencuci tangan, karena vaksinasi dan disiplin protokol kesehatan merupakan kunci dalam mengatasi pandemi Covid-19,” lanjutnya.\r\n\r\n\r\nJakarta, 11 Januari 2022\r\nBiro Pers, Media, dan Informasi Sekretariat Presiden\r\n\r\nWebsite: https://www.presidenri.go.id\r\nYouTube: Sekretariat Presiden', 'presiden.jpeg'),
(37, 'Sains', 'Obyek Misterius di Antariksa Ini Bikin Takut Ilmuwan  /', 'Terbaru, astronom menemukan obyek misterius yang belum pernah ditemukan atau terlihat sebelumnya di antariksa.', 'Seperti dikutip detikINET dari CTV News, Kamis (27/1/2022) tim ilmuwan yang memetakan gelombang radio di alam semesta, mendeteksi obyek itu, yang terpantau melepaskan pancaran energi besar sebanyak 3 kali dalam 1 jam. Obyek ini juga tampak timbul tenggelam.\r\n\r\nTemuan tersebut telah dipublikasikan di jurnal Nature. Walau pun belum diketahui dengan pasti obyek apa itu, astronom meyakini kemungkinannya adalah antara bintang neutron atau bintang katai putih, bintang yang intinya kolaps dengan medan magnet kuat.\r\n\"Obyek ini tampak muncul dan hilang dalam beberapa jam saat kami melakukan observasi. Hal itu benar-benar mengejutkan dan cukup menakutkan bagi astronom karena tidak ada obyek di antariksa yang seperti itu,\" kata Natasha Hurley Walker, salah satu periset.\r\n\r\n\"Dan juga obyek misterius tersebut letaknya benar-benar dekat dengan kita, sekitar 4.000 tahun cahaya jauhnya. Ibaratnya seperti di halaman belakang galaksi kita,\" tambah dia.\r\n\r\nObyek yang timbul tenggelam di antariksa bukan hal baru dalam sains, namun bedanya obyek ini melakukannya dalam waktu singkat.\r\n\r\nBenda misterius ini sangat terang, lebih kecil dari Matahari, dan memancarkan gelombang radio yang menandakan medan magnetnya sangat kuat. Saat ini, para astronom itu terus mengamatinya dengan teleskop Murchison Widefield Array (MWA) yang berada di Australia.\r\n\r\n\"Saya sempat cemas bahwa obyek misterius ini adalah alien, akan tetapi ia berada di frekuensi yang sangat luas dan artinya prosesnya adalah alami, ini bukan sinyal buatan,\" tambah Hurley Walker.', 'angkasa.png'),
(38, 'Teknologi', 'Maaf Tesla, Mobil Listrik China Masih Lebih Laku di Seluruh Dunia ', 'Meski Tesla jadi nama paling besar, penjualan mobil listrik secara global ternyata didominasi merek asal China.', 'Elektrifikasi semakin gencar dilakukan oleh pabrikan otomotif, maka tidak heran jika dalam beberapa tahun terakhir penjualan mobil listrik terus meningkat. Meski Tesla jadi nama paling besar, penjualan mobil listrik secara global ternyata didominasi merek asal China.\r\nJika membahas mobil listrik, hal yang terlintas di dalam benak pikiran adalah Tesla. Ya, produsen otomotif asal Amerika Serikat itu merupakan salah satu pelopor kendaraan listrik yang kini sudah mendunia.Dari data tersebut, merek asal China menyumbang 45 persen penjualan kendaraan listrik secara global. Artinya, hampir setengah penjualan mobil EV di seluruh dunia dipegang oleh merek asal Negeri Tirai Bambu tersebut.\r\n\r\nDikutip dari laman Jato, data dari Jato Dynamics menunjukkan angka penjualan mobil listrik secara global mencapai 2,79 juta unit antara Januari-September 2021. Angka tersebut naik sebesar 149 persen jika dibandingkan pada periode yang sama di tahun lalu.\r\n\r\nDari data tersebut, merek asal China menyumbang 45 persen penjualan kendaraan listrik secara global. Artinya, hampir setengah penjualan mobil EV di seluruh dunia dipegang oleh merek asal Negeri Tirai Bambu tersebut.', 'tesla.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
