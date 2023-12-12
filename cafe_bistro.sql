-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2022 pada 17.29
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe bistro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hidangan`
--

CREATE TABLE `hidangan` (
  `id` int(11) NOT NULL,
  `nama_hidangan` varchar(200) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `harga` varchar(250) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_users` int(11) DEFAULT NULL,
  `jenis` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hidangan`
--

INSERT INTO `hidangan` (`id`, `nama_hidangan`, `deskripsi`, `gambar`, `harga`, `create_at`, `id_users`, `jenis`, `status`) VALUES
(1, 'Ayam Popcorn', '         Ayam Pop dengan kelembutan yang nikmat', 'ayam popcron.jpg', '24000', '2022-06-12 15:27:35', 1, 'Makanan', 'Tersedia'),
(2, 'Aromatic Tempe Fries', ' Tempe Goreng dengan aroma yang enak', 'tempe fries.jpg', '18000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(3, 'Bakwan Bumbu Pecal', ' Gorengan bakwan dicampur dengan bumbu pecal', 'bakwan pecal.jpeg', '17000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(4, 'Chessy Wings', ' Sayap Ayam dengan lumeren keju yang enak', 'chessy wings.jpg', '27000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(5, 'Kentang Goreng', ' Kentang yang nikmat digoreng', 'kentang foreng.jpg', '28000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(6, 'Kentang Goreng Balado', ' Kentang goreng yang dicampuri dengan bumbum balado', 'kentang balado.jpg', '18000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(7, 'Kentang Goreng BBQ', ' Kentang goreng yang dicampuri dengan bumbum BBQ', 'kentang bbq.jpg', '20000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(8, 'Mantau Goreng', ' Nikmati kelezatan mantau goreng', 'mantau goreng.jpeg', '25000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(9, 'Pisang Bakar Jadoel', ' Pisang yang dibakar dengan bumbu jadoel', 'pisang bakar.jpg', '20000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(10, 'Pisang Goreng Saus Karamel', ' Pisang yang dibakar diolesi dengan saus karamel', 'pisang karamel.jpg', '25000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(11, 'Pisang Goreng Krispy', ' Pisang Goreng yang krispy', 'pisang krispi.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(12, 'Roti Bakar Choco Cheese', '  Roti Bakar dengan rasa coklat dan keju', 'Roti Bakar Choco Cheese.jpeg', '20000', '2022-06-11 03:55:07', 1, 'Makanan', 'Tersedia'),
(13, 'Roti Bakar Greentea             ', '  Roti Bakar dengan rasa greentea', 'Roti Bakar Greentea.jpg', '20000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(14, 'Roti Bakar Sugar Butter', '  Roti Bakar', 'Roti Bakar Sugar Butter.jpg', '17000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(15, 'Roti Bakar Tiramisu', '  Roti Bakar dengan rasa tiramisu', 'Roti Bakar Tiramisu.jpg', '20000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(16, 'Roti Salted Egg', ' Roti telor dengan garam', 'Roti Salted Egg.jpeg', '23000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(17, 'Tahu Krispy', ' Tahu goreng krispi ', 'tahu krispi.jpg', '18000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(18, 'Nasi Blackpepper Ayam', ' Nasi Goreng Ayam dengan blackpepper', 'Nasi Blackpepper Ayam.jpg', '32000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(19, 'Nasi Blackpepper Sapi', ' Nasi Goreng Sapi dengan blackpepper', 'Nasi Blackpepper Sapi.jpg', '40000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(20, 'Nasi Blackpepper Seafood', ' Nasi Goreng Seafood dengan blackpepper', 'Nasi Blackpepper Seafood.jpg', '38000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(21, 'Kwetiau Blackpepper Ayam', ' Kwetiau Ayam dengan blackpepper', 'Kwetiau Blackpepper Ayam.jpg', '30000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(22, 'Kwetiau Blackpepper Sapi', ' Kwetiau Sapi dengan blackpepper', 'Kwetiau Blackpepper sapi.jpg', '35000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(23, 'Kwetiau Blackpepper Seafood', ' Kwetiau Seafood dengan blackpepper', 'Kwetiau Blackpepper seafood.jpg', '40000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(24, 'Mie Hotplate Seafood Singapore', ' Mie Hotplate dengan seafood ', 'Mie Hotplate Seafood Singapore.jpg', '40000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(25, 'Hotplate Tahu Saus Singapore', ' Hotplate dengan Tahu dan Saus', 'Hotplate Tahu Saus Singapore.jpg', '30000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(26, 'Ifumie Goreng Seafood', ' Ifumi goreng dengan seafood ', 'Ifumie Goreng Seafood.jpeg', '35000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(27, 'Kwetiau Goreng Seafood', ' Kwetiau goreng dengan seafood', 'Kwetiau Goreng Seafood.jpg', '35000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(28, 'Mie Goreng Indonesia', ' Mie goreng khas Indonesia', 'Mie Goreng Indonesia.jpeg', '25000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(29, 'Mie Kuning Goreng Seafood', ' Mie kuning goreng dengan seafood', 'Mie Kuning Goreng Seafood.jpeg', '30000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(30, 'Mie Kuning Kangkung Belacan', ' Mie kuning dengan kangkung belacan ', 'Mie Kuning Kangkung Belacan.jpg', '35000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(31, 'Kwetiau Kangkung Belacan', ' Kwetiau dengan kangkung belacan', 'Kwetiau Kangkung Belacan.jpg', '35000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(32, 'Ifumie Goreng Kangkung Belacan', ' Ifumie goreng dengan campurang kangkung belacan', 'Ifumie Goreng Kangkung Belacan.jpg', '35000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(33, 'Dimsum Ayam', ' Dimsum dengan ditambahi dengan ayam', 'Dimsum Ayam.jpg', '25000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(34, 'Dimsum Kepiting', ' Dimsum dengan ditambahi dengan kepiting', 'Dimsum Kepiting.jpeg', '27000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(35, 'Dimsum Rumput Laut', ' Dimsum dengan ditambahi dengan Rumput Laut', 'Dimsum Rumput Laut.jpg', '27000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(36, 'Dimsum Udang', ' Dimsum dengan ditambahi dengan Udang', 'Dimsum Udang.jpg', '27000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(37, 'Lumpia Salad Goreng', ' Lumpia Goreng dengan campuran salad', 'Lumpia Salad Goreng.jpeg', '30000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(38, 'Ayam Goreng Krispy', ' Ayam goreng yang krispi', 'Ayam Goreng Krispy.jpg', '40000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(39, 'Ayam Saus Mentega', ' Ayam dengan saus mentega', 'Ayam Saus Mentega.jpg', '35000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(40, 'Brokoli Tumis Sapi', ' Brokoli di tumis dengan daging sapi', 'Brokoli Tumis Sapi.jpg', '28000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(41, 'Cah Kangkung', ' Cah kangkung yang segar', 'Cah Kangkung.jpeg', '18000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(42, 'Chapcay Ayam', ' Chapcay yang segar dengan campuran daging ayam', 'Chapcay Ayam.jpg', '22000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(43, 'Chicken Salted Egg', ' Telor Ayam yang segar dengan campuran garam', 'Chicken Salted Egg.jpg', '35000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(44, 'Sapo Tahu Saus Tiram', ' Tahu dengan tambahan saus tiram', 'Sapo Tahu Saus Tiram.jpg', '25000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(45, 'Udang Goreng Krispy', ' Udang goreng yang krispi', 'Udang Goreng Krispy.jpeg', '50000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(46, 'Udang Goreng Nestum', ' Udang goreng nestum yang lezat', 'Udang Goreng Nestum.jpeg', '50000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(47, 'Nasi Goreng Andaliman', ' Nasi goreng dengan campuran andaliman', 'Nasi Goreng Andaliman.jpg', '40000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(48, 'Nasi Goreng Rendang', ' Nasi goreng dengan campuran rendang', 'Nasi Goreng Rendang.jpeg', '55000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(49, 'Nasi Goreng Ayam', ' Nasi goreng dengan campuran daging ayam', 'Nasi Goreng Ayam.jpg', '27000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(50, 'Nasi Goreng Ikan Asin', ' Nasi goreng dengan campuran ikan asin', 'Nasi Goreng Ikan Asin.jpg', '30000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(51, 'Nasi Goreng Kampung', ' Nasi goreng ala kampung', 'Nasi Goreng Kampung.jpg', '37000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(52, 'Nasi Goreng Cabai Hijau', ' Nasi goreng dengan campuran cabai hijau', 'Nasi Goreng Cabai Hijau.jpg', '45000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(53, 'Nasi Goreng Sapi', ' Nasi goreng dengan campuran daging sapi', 'Nasi Goreng Sapi.jpg', '30000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(54, 'Nasi Goreng Telur', ' Nasi goreng dengan campuran telur', 'Nasi Goreng Telur.jpeg', '22000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(55, 'Ayam Bakar Madu + Nasi', ' Ayam Bakar dengan tambahan madu dan Nasi', 'Ayam Bakar Madu + Nasi.jpeg', '38000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(56, 'Ayam Bakar Rujak + Nasi', ' Ayam Bakar dengan tambahan rujak dan Nasi', 'Ayam Bakar Rujak + Nasi.jpg', '38000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(57, 'Ayam Bakar Tepi Danau + Nasi', ' Ayam Bakar khas tepi danau dengan tambahan Nasi', 'Ayam Bakar Tepi Danau + Nasi.jpg', '35000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(58, 'Ayam Geprek + Nasi', ' Ayam geprek dengan tambahan nasi', 'Ayam Geprek + Nasi.jpg', '30000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(59, 'Ayam Geprek Keju + Nasi', ' Ayam geprek dengan tambahan keju dan Nasi', 'Ayam Geprek Keju + Nasi.jpeg', '33000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(60, 'Ayam Rica Rica + Nasi', ' Ayam rica rica dengan tambahan nasi', 'Ayam Rica Rica + Nasi.jpg', '32000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(61, 'Asam Manis', ' Asam manis yang segar', 'Asam Manis.jpeg', '85000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(62, 'Bakar Bumbu Bali', ' Bakar dengan bumbu bali', 'Bakar Bumbu Bali.jpeg', '85000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(63, 'Sambel Pete Balado', ' Sambel pete dengan Balado', 'Sambel Pete Balado.jpg', '75000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(64, 'Tauco', ' Tauco yang lezat', 'Tauco.jpg', '70000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(65, 'Sup Ayam + Nasi', ' Sup Ayam dengan tambahan nasi', 'Sup Ayam + Nasi.jpeg', '28000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(66, 'Sup Ikan Tepi Danau + Nasi', ' Sup Ayam  khas tepi danau dengan tambahan nasi', 'Sup Ikan Tepi Danau + Nasi.jpg', '27000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(67, 'Sup Konro + Nasi', ' Sup Konro dengan tambahan nasi', 'Sup Konro + Nasi.jpg', '45000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(68, 'Sup Tomyam + Nasi', ' Sup Tomyam dengan tambahan nasi', 'Sup Tomyam + Nasi.jpg', '35000', '2022-06-11 10:55:07', 1, 'Makanan', 'Tersedia'),
(69, 'Alpukat', ' Jus Alpukat yang segar', 'Alpukat.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(70, 'Buah Naga', ' Jus buah naga yang segar', 'Buah Naga.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(71, 'Jeruk', ' Jus Jeruk yang segar', 'Jeruk.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(72, 'Kuini', ' Jus kuini yang segar', 'Kuini.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(73, 'Nenas', ' Jus nenas yang segar', 'Nenas.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(74, 'Semangka', ' Jus semangka yang segar', 'Semangka.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(75, 'Terong Belanda', ' Jus terong belanda yang segar ', 'Terong Belanda.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(76, 'Timun', ' Jus timun yang segar', 'Timun.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(77, 'Wortel', ' Jus wortel yang segar', 'Wortel.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(78, 'Wortel + Jeruk', ' Jus wortel dan jeruk yang segar', 'Wortel + Jeruk.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(79, 'Affogato Hot', ' Affogato Panas', 'Affogato Hot.jpg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(80, 'Affogato Ice', ' Affogato Dingin', 'Affogato Ice.jpeg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(81, 'Avocadoffee Hot', ' Avocadoffe Panas', 'Avocadoffee Hot.jpeg', '28000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(82, 'Avocadoffee Ice', ' Avocadoffe Dingin', 'Avocadoffee Hot.jpeg', '30000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(83, 'Cafe Latte Hot', ' Cafe Latte Panas', 'Cafe Latte Hot.jpg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(84, 'Cafe Latte Ice', ' Cafe Latte Dingin', 'Cafe Latte Ice.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(85, 'Cafe Latte Aren Hot', ' Cafe Latte Aren Panas', 'Cafe Latte Aren Hot.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(86, 'Cafe Latte Aren Ice', ' Caffe Latte Aren Dingin', 'Cafe Latte Aren ice.jpg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(87, 'Cafe Latte Caramel Hot', ' Cafe Latte Caramel Panas', 'Cafe Latte Caramel Hot.jpeg', '24000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(88, 'Cafe Latte Caramel Ice', ' Cafe Latte Caramel Dingin', 'Cafe Latte Caramel Ice.jpg', '26000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(89, 'Cafe Latte Hazelnut Hot', ' Cafe Latte Hazelnu Panas', 'Cafe Latte Hazelnut Hot.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(90, 'Cafe Latte Hazelnu Ice', ' Cafe Latte Hazelnu Dingin', 'Cafe Latte Hazelnu Ice.jpg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(91, 'Cafe Latte Kopiko Hot', ' Cafe Latte Kopiko Panas', 'Cafe Latte Kopiko Hot.jpg', '24000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(92, 'Cafe Latte Kopiko Ice', ' Cafe Latte Kopiko Dingin', 'Cafe Latte Kopiko Ice.jpeg', '26000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(93, 'Cafe Latte Pandan Hot', ' Cafe Latte Pandan Panas', 'Cafe Latte Pandan Hot.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(94, 'Cafe Latte Pandan Ice', ' Cafe Latte Pandan DIngin', 'Cafe Latte Pandan Ice.jpg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(95, 'Cafe Latte Tiramisu Hot', ' Cafe Latte Tiramisu Panas', 'Cafe Latte Tiramisu Hot.jpg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(96, 'Cafe Latte Tiramisu Ice', ' Cafe Latte Tiramisu Dingin', 'Cafe Latte Tiramisu Ice.jpg', '24000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(97, 'Cafe Latte Vanilla Hot', ' Cafe Latte Vanilla Panas', 'Cafe Latte Vanilla Hot.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(98, 'Cafe Latte Vanilla Ice', ' Cafe Latte Vanilla Dingin', 'Cafe Latte Vanilla Ice.jpeg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(99, 'Capuccino Hot', ' Capuccino Panas', 'Capuccino Hot.jpg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(100, 'Capuccino Ice', ' Capuccino Dingin', 'Capuccino Ice.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(101, 'Caramel Machiato Hot', ' Caramel Machiato Panas', 'Caramel Machiato Hot.jpeg', '26000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(102, 'Caramel Machiato Ice', ' Caramel Machiato Dingin', 'Caramel Machiato Ice.jpeg', '28000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(103, 'Espresso (Single) Hot', ' Espresso (Single) Panas', 'Espresso (Single) Hot.jpg', '10000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(104, 'Espresso (Single) Ice', ' Espresso (Single) Dingin', 'Espresso (Single) Ice.jpeg', '12000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(105, 'Espresso (Double) Hot', ' Espresso (Double) Panas', 'Espresso (Double) Hot.jpeg', '12000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(106, 'Espresso (Double) Ice', ' Espresso (Double) Dingin', 'Espresso (Double) Ice.jpg', '14000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(107, 'Longblack Hot', ' Longblack Panas', 'Longblack Hot.jpg', '12000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(108, 'Longblack Ice', ' Longblack Dingin', 'Longblack Ice.jpg', '14000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(109, 'Picollo Latte Hot', ' Picollo Latte Panas', 'Picollo Latte Hot.jpeg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(110, 'Picollo Latte Ice', ' Picollo Latte Dingin', 'Picollo Latte Ice.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(111, 'Mochacino Hot', ' Mochacino Panas', 'Mochacino Hot.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(112, 'Mochacino Ice', ' Mochacino DIngin', 'Mochacino Ice.jpeg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(113, 'Sanger Hot', ' Sanger Panas', 'Sanger Hot.png', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(114, 'Sanger Ice', ' Sanger Dingin', 'Sanger Ice.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(115, 'Sanger Aren Hot', ' Sanger Aren Panas', 'Sanger Aren Hot.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(116, 'Sanger Aren Ice', ' Sanger Aren Dingin', 'Sanger Aren Ice.jpeg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(117, 'Tubruk Hot', ' Tubruk Panas', 'Tubruk Hot.jpg', '13000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(118, 'Vietnam Drip Hot', ' Vietnam Drip Panas', 'Vietnam Drip Hot.jpeg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(119, 'V60 Hot', ' V60 Panas', 'V60 Hot.jpeg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(120, 'Tubruk Ice', ' Tubruk Dingin', 'Tubruk Ice.jpeg', '15000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(121, 'Vietnam Drip Ice', ' Vietnam Drip Dingin', 'Vietnam Drip Ice.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(122, 'V60 Ice', ' V60 Dingin', 'V60 Hot.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(123, 'Caramel', ' Minuman dengan Caramel', 'Caramel.jpeg', '30000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(124, 'Chocolate', ' Minuman coklat', 'Chocolate.jpg', '28000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(125, 'Cookies n Cream', ' Minuman dengan tambahan cookies dan cream', 'Cookies n Cream.jpg', '30000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(126, 'Java Chip Frapuccino', ' Minuman Java Chip Frapuccino', 'Java Chip Frapuccino.png', '35000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(127, 'Matcha', ' Minuman Matcha', 'Matcha.jpeg', '32000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(128, 'Mocha Frapuccino', ' Minuman Mocha Frapuccino', 'Mocha Frapuccino.jpeg', '35000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(129, 'Red Velvet ', ' Minuman Red Velvet', 'Red Velvet.jpeg', '30000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(130, 'Taro', ' Minuman Taro', 'Taro.jpg', '28000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(131, 'Avocado Banana Smoothies', ' Jus alpukat dengan pisang yang lembut', 'Avocado Banana Smoothies.jpeg', '25000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(132, 'Banana Smoothies', ' Jus pisang yang lembut', 'Banana Smoothies.jpg', '25000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(133, 'Dragonfruit Banana Smoothies', ' Jus buah naga dengan pisang yang lembut', 'Dragonfruit Banana Smoothies.jpg', '25000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(134, 'Strawberry Banana Smoothies', ' Jus strawberry dengan pisang yang lembut', 'Strawberry Banana Smoothies.jpeg', '25000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(135, 'Caramel Latte Hot', ' Minuman tanpa kandungan kopi ', 'Caramel Latte Hot.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(136, 'Caramel Latte Ice', ' Minuman tanpa kandungan kopi ', 'Caramel Latte Ice.jpeg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(137, 'Greentea Latte Hot', ' Minuman tanpa kandungan kopi ', 'Greentea Latte Hot.jpeg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(138, 'Greentea Latte Ice', ' Minuman tanpa kandungan kopi ', 'Greentea Latte Ice.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(139, 'Hazelnut Latte Hot', ' Minuman tanpa kandungan kopi ', 'Hazelnut Latte Hot.jpg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(140, 'Hazelnut Latte Ice', ' Minuman tanpa kandungan kopi ', 'Hazelnut Latte Ice.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(141, 'Matcha Latte Hot', ' Minuman tanpa kandungan kopi ', 'Matcha Latte Hot.jpg', '23000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(142, 'Matcha Latte Ice', ' Minuman tanpa kandungan kopi ', 'Matcha Latte Ice.jpeg', '25000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(143, 'Red Velvet Latte Hot', ' Minuman tanpa kandungan kopi ', 'Red Velvet Latte Hot.jpeg', '23000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(144, 'Red Velvet Latte Ice', ' Minuman tanpa kandungan kopi ', 'Red Velvet Latte Ice.jpeg', '25000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(145, 'Signature Chocolate Hot', ' Minuman tanpa kandungan kopi ', 'Signature Chocolate Hot.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(146, 'Signature Chocolate Ice', ' Minuman tanpa kandungan kopi ', 'Signature Chocolate Ice.jpeg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(147, 'Taro Latte Hot', ' Minuman tanpa kandungan kopi ', 'Taro Latte Hot.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(148, 'Taro Latte Ice', ' Minuman tanpa kandungan kopi ', 'Taro Latte Ice.jpeg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(149, 'Vanilla Milk Hot', ' Minuman tanpa kandungan kopi ', 'Vanilla Milk Hot.jpg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(150, 'Vanilla Milk Ice', ' Minuman tanpa kandungan kopi ', 'Vanilla Milk Ice.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(151, 'Blue Ocean', ' Minuman blue ocean jenis mocktail ', 'Blue Ocean.jpg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(152, 'Hawaiian', ' Minuman hawaiian mocktail', 'Hawaiian.jpg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(153, 'Mango Float', ' Minuman Float mocktail', 'Mango Float.jpeg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(154, 'Mango Yakult', ' Minuman Yakult mocktail', 'Mango Yakult.jpg', '25000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(155, 'Mojito Kiwi', ' Minuman mojito kiwi mocktail', 'Mojito Kiwi.jpg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(156, 'Mojito Lemon Squash', ' Minuman mojito lemon squash mocktail', 'Mojito Lemon Squash.jpg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(157, 'Rainbow', ' Minuman Rainbow mocktail', 'Rainbow.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(158, 'Strawberry Float', ' Minuman Strawberry Float mocktail', 'Strawberry Float.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(159, 'Sunrise', ' MInuman Sunrise mocktail', 'Sunrise.jpeg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(160, 'Sunset', ' MInuman Sunset mocktail', 'Sunset.jpeg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(161, 'Bandrek Jahe Merah Hot', ' Bandrek dengan jahe merah yang panas', 'Bandrek Jahe Merah Hot.jpeg', '15000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(162, 'Bandrek Jahe Merah Ice', ' Bandrek dengan jahe merah yang dingin', 'Bandrek Jahe Merah ice.png', '15000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(163, 'Herb Tea Hot', ' Herb tea panas', 'Herb Tea Hot.jpeg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(164, 'Herb Tea Ice', ' Herb tea dingin', 'Herb Tea Ice.jpeg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(165, 'Lechy Tea Hot', ' Lechy Tea panas', 'Lechy Tea Hot.jpg', '18000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(166, 'Lechy Tea Ice', ' Lechy Tea dingin', 'Lechy Tea Ice.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(167, 'Lemon Tea Hot', ' Lemont Tea panas', 'Lemon Tea Hot.jpg', '15000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(168, 'Lemon Tea Ice', ' Lemon tea dingin', 'Lemon Tea ice.jpg', '17000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(169, 'Longan Tea Hot', ' Longan tea panas', 'Longan Tea Hot.jpg', '15000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(170, 'Longan Tea Ice', ' Longan tea dingin', 'Longan Tea ice.jpg', '17000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(171, 'Teh Manis Hot', ' Teh manis panas', 'Teh Manis Hot.jpeg', '8000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(172, 'Teh Manis Ice', ' Teh manis dingin', 'Teh Manis ice.jpeg', '10000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(173, 'Teh Tarik Hot', ' Teh tarik panas', 'Teh Tarik Hot.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(174, 'Teh Tarik Ice', ' Teh tarik dingin', 'Teh Tarik ice.jpg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(175, 'Teh Tawar Hot', ' Teh tawar panas', 'Teh Tawar Hot.jpg', '5000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(176, 'Teh Tawar Ice', ' Teh tawar dingin', 'Teh Tawar Ice.jpg', '7000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(177, 'Teh Serai Madu Hot', ' Teh serai madu panas', 'Teh Serai Madu Hot.jpeg', '15000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(178, 'Teh Serai Madu Ice', ' Teh serai madu dingin', 'Teh Serai Madu Ice.jpg', '17000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(179, 'Thai Tea Milk Hot', ' Thai tea milk panas', 'Thai Tea Milk Hot.jpg', '20000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(180, 'Thai Tea Milk Ice', ' Thai tea milk dingin', 'Thai Tea Milk ice.jpg', '22000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(181, 'Air Mineral', ' Air mineral kemasan', 'Air Mineral.jpg', '5000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(182, 'Coca Cola', ' Coca cola kemasan', 'Coca Cola.jpeg', '12000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(183, 'Sprite', ' Sprite kemasan', 'Sprite.jpeg', '12000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(184, 'Teh Botol', ' Teh botol kemasan', 'Teh Botol.jpg', '12000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(185, 'Kelapa Thai', ' Kelapa Thai kemasan', 'Kelapa Thai.jpg', '27000', '2022-06-11 10:55:07', 1, 'Minuman', 'Tersedia'),
(190, 'Mie Goreng', ' enak sekali', 'bri.png', '100000', '2022-06-12 14:23:08', NULL, 'Makanan', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kapasitas_meja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id`, `harga`, `created_at`, `kapasitas_meja`) VALUES
(1, '50000', '2022-06-12 05:07:51', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(250) DEFAULT NULL,
  `jenis_pembayaran` varchar(250) DEFAULT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `nama_pengirim` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `total_harga`, `id_pemesanan`, `create_at`, `status`, `jenis_pembayaran`, `gambar`, `nama_pengirim`) VALUES
(7, 98400, 19, '2022-06-12 15:03:31', 'Pesanan di Konfirmasi', 'DANA', 'download (2).png', 'Akdes Simon Simamora');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_meja`
--

CREATE TABLE `pemesanan_meja` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `total_meja` int(11) DEFAULT NULL,
  `no_handphone` varchar(250) DEFAULT NULL,
  `total_pengunjung` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_meja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan_meja`
--

INSERT INTO `pemesanan_meja` (`id`, `nama`, `total_meja`, `no_handphone`, `total_pengunjung`, `create_at`, `tanggal`, `jam`, `id_users`, `id_meja`) VALUES
(19, 'Akdes Simon Simamora', 1, '081377169497', 1, '2022-06-12 15:00:26', '2022-06-13', '19:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_meja_hidangan`
--

CREATE TABLE `pemesanan_meja_hidangan` (
  `id` int(11) NOT NULL,
  `id_meja` int(11) DEFAULT NULL,
  `id_hidangan` int(11) DEFAULT NULL,
  `jumlah_hidangan` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan_meja_hidangan`
--

INSERT INTO `pemesanan_meja_hidangan` (`id`, `id_meja`, `id_hidangan`, `jumlah_hidangan`, `create_at`) VALUES
(14, 19, 1, 2, '2022-06-12 15:01:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `guard_name` varchar(250) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `guard_name` varchar(250) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `create_at`) VALUES
(1, 'Pelanggan', 'Customers', '2022-06-06 15:48:03'),
(2, 'Admin', 'Pengurus Website', '2022-06-06 15:48:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles_has_permission`
--

CREATE TABLE `roles_has_permission` (
  `id` int(11) NOT NULL,
  `id_roles` int(11) DEFAULT NULL,
  `id_permission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `komentar` text DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `komentar`, `create_at`, `id_users`) VALUES
(1, 'coba ayam mass enak loh', '2022-06-07 04:42:41', 3),
(3, 'wow', '2022-06-11 03:37:17', 2),
(4, 'mantap jiwa', '2022-06-11 12:20:43', 2),
(5, 'sdfdsfds', '2022-06-12 15:17:08', 2),
(6, 'service is good\r\n', '2022-06-12 15:18:05', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `no_handphone` varchar(20) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `alamat`, `no_handphone`, `username`, `email`, `password`, `name`, `create_at`, `id_role`) VALUES
(1, 'Jl.Pemandian no.1 , Desa Lumban Silintong.BaligeKabupaten Toba,Sumatera Utara', '081370917173', 'cafebistro', 'cafebistro@gmail.com', '$2y$10$zlBgailrLdOpB8Vkxvu0YuAzj.G2bPdOPZo7TUaWPqBnJPQARIIDa', 'Cafe Bistro', '2022-06-06 15:57:24', 2),
(2, 'Laguboti', '081377169497', 'akdes', 'amlosiorh1@gmail.coom', '$2y$10$UotEfWFMN7uhlYE06h5e4.2.wXitAthEK49X48V7mBM5FPN2heCfe', 'Akdes Simon Simamora', '2022-06-06 15:52:58', 1),
(3, 'Laguboti', '081377169492', 'amlosiorh', 'Simbrader3112@gmail.com', '$2y$10$2BR9dhMrXDJEjd9mYYbP3uaeX1LC9Wo9VQ1LDc7FG2j9C4CzQRfv.', 'Akdes Simon Simamora', '2022-06-07 04:29:37', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hidangan`
--
ALTER TABLE `hidangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indeks untuk tabel `pemesanan_meja`
--
ALTER TABLE `pemesanan_meja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indeks untuk tabel `pemesanan_meja_hidangan`
--
ALTER TABLE `pemesanan_meja_hidangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_meja` (`id_meja`),
  ADD KEY `id_hidangan` (`id_hidangan`);

--
-- Indeks untuk tabel `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles_has_permission`
--
ALTER TABLE `roles_has_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_roles` (`id_roles`),
  ADD KEY `id_permission` (`id_permission`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hidangan`
--
ALTER TABLE `hidangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_meja`
--
ALTER TABLE `pemesanan_meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_meja_hidangan`
--
ALTER TABLE `pemesanan_meja_hidangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roles_has_permission`
--
ALTER TABLE `roles_has_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hidangan`
--
ALTER TABLE `hidangan`
  ADD CONSTRAINT `hidangan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan_meja` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan_meja`
--
ALTER TABLE `pemesanan_meja`
  ADD CONSTRAINT `pemesanan_meja_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_meja_ibfk_2` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan_meja_hidangan`
--
ALTER TABLE `pemesanan_meja_hidangan`
  ADD CONSTRAINT `pemesanan_meja_hidangan_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `pemesanan_meja` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_meja_hidangan_ibfk_2` FOREIGN KEY (`id_hidangan`) REFERENCES `hidangan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `roles_has_permission`
--
ALTER TABLE `roles_has_permission`
  ADD CONSTRAINT `roles_has_permission_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_has_permission_ibfk_2` FOREIGN KEY (`id_permission`) REFERENCES `permission` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
