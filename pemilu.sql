-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2018 at 09:52 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemilu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(50) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_akses` varchar(10) NOT NULL,
  `id_campaign` varchar(10) NOT NULL,
  `status` varchar(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_user`, `id_akses`, `id_campaign`, `status`, `username`, `password`) VALUES
('8888super', '8888', 'super', '', '1', 'super', '1b3231655cebb7a1f783eddf27d254ca'),
('TU102adminhmjti', 'TU102', 'admin', 'hmjti', '1', 'hmti', 'ea6cb0070cf462c3900eada4836256be');

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` varchar(20) NOT NULL,
  `nama_akses` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama_akses`, `bobot`, `status`) VALUES
('admin', 'Admin', 0, 1),
('dos', 'Dosen', 1, 1),
('mahas', 'Mahasiswa', 1, 1),
('super', 'SuperAdmin', 0, 1),
('tu', 'Tata Usaha', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE `calon` (
  `id_calon` varchar(20) NOT NULL,
  `no_urut` varchar(3) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `id_campaign` varchar(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `visimisi` text NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`id_calon`, `no_urut`, `nim`, `id_campaign`, `tahun`, `gambar`, `visimisi`, `status`) VALUES
('201814210241761', '1', '1421024176', 'hmjti', 2018, 'p01.jpg', 'Berkarakter, kreatif, dan berkualitas untuk mewujudkan teknik yang madani', '1'),
('201814212200063', '3', '1421220006', 'hmjti', 2018, 'p03.jpg', 'Membangun kinerja yang lebih baik bersama gerakan mahasiswa aktif guna mewujudkan hmj yang berintegritas tinggi, dinamis, dan berkesinambungan', '1'),
('201814212200084', '4', '1421220008', 'hmjti', 2018, 'p04.jpg', 'Menjadikan himpunan mahasiswa jurusan teknik kimia sebagai organisasi yang menjunjung tinggi nilai kekeluargaan dan kebersamaan', '0'),
('201814212200132', '2', '1421220013', 'hmjti', 2018, 'p02.JPG', 'Mendorong setiap mahasiswa untuk lebih kreatif, inovatif, dan aspiratif dalam berbagai aspek dalam wadah hmj', '1');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id_campaign` varchar(10) NOT NULL,
  `nama_campaign` varchar(30) NOT NULL,
  `keterangan_campaign` text NOT NULL,
  `logo_campaign` varchar(50) NOT NULL,
  `status_campaign` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id_campaign`, `nama_campaign`, `keterangan_campaign`, `logo_campaign`, `status_campaign`) VALUES
('hmjti', 'Himpunan Jurusan TI', 'Himpunan Jurusan Teknologi Informasi', 'HMJ_MI.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dos` varchar(20) NOT NULL,
  `nama_dos` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `tmp_lahir` text NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `agama` varchar(15) NOT NULL,
  `pendidikan_akhir` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `status_pegawai` enum('PNS','GTT') NOT NULL,
  `status_anggota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dos`, `nama_dos`, `email`, `foto`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES
('8888', 'Lusy', '', '', 'Bojonegoro', '03/10/1983', 'L', 'islam', 'S1', 'Bojonegoro', '', 1),
('MI1', 'Drs. H.  YUDI PRAMONO, MM', 'nurkhozin95@gmail.com', '', 'BOJONEGORO', '23/04/1966', 'L', 'ISLAM', 'S1', 'Bojonegoro', 'PNS', 1),
('MI13', 'LUSY KURNIAWATI, S.Pd', '', '', 'BOJONEGORO', '23/04/1970', 'P', 'ISLAM', 'S5', 'Bojonegoro', 'PNS', 1),
('MI5', 'S. AISYAH, S.Pd', 'nurkhozin2304@gmail.com', '', 'BOJONEGORO', '23/04/1967', 'P', 'ISLAM', 'S2', 'Bojonegoro', 'PNS', 1),
('MI6', 'Drs. SUYONO, M.MPd', '', '', 'BOJONEGORO', '23/04/1968', 'L', 'ISLAM', 'S3', 'Bojonegoro', 'PNS', 1),
('MI7', 'ABDUL FATAH S.Pd., M.MPd', '', '', 'BOJONEGORO', '23/04/1969', 'L', 'ISLAM', 'S4', 'Bojonegoro', 'PNS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emailconfig`
--

CREATE TABLE `emailconfig` (
  `email_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `protocol` varchar(10) NOT NULL,
  `smtp_host` varchar(100) NOT NULL,
  `smtp_port` int(7) NOT NULL,
  `smtp_timeout` int(5) NOT NULL,
  `smtp_user` varchar(150) NOT NULL,
  `smtp_pass` varchar(150) NOT NULL,
  `charset` varchar(33) NOT NULL,
  `mailtype` varchar(50) NOT NULL,
  `validation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emailconfig`
--

INSERT INTO `emailconfig` (`email_id`, `name`, `protocol`, `smtp_host`, `smtp_port`, `smtp_timeout`, `smtp_user`, `smtp_pass`, `charset`, `mailtype`, `validation`) VALUES
(1, 'Pemilihan Umum', 'smtp', 'ssl://smtp.gmail.com', 465, 7, 'resfuninfo@gmail.com', '62828f848c5155504a85a36fbda47038', 'utf-8', 'html', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `emailtemplate`
--

CREATE TABLE `emailtemplate` (
  `email_id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_by` int(3) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(3) NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emailtemplate`
--

INSERT INTO `emailtemplate` (`email_id`, `name`, `subject`, `message`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(1, 'lupa_password', 'Lupa Password', '<center style=\"width:100%;table-layout:fixed\">\r\n				<div style=\"max-width:600px\">\r\n					<table style=\"border-spacing:0;font-family:sans-serif;color:#333333;Margin:0 auto;width:100%;max-width:600px; border: 1px solid #BFBFBF; box-shadow: 3px 5px 3px #aaa;\" align=\"center\">\r\n						<tbody>\r\n							<tr>\r\n								<td style=\"background:#42b549\"><br></td>\r\n							</tr>\r\n							<tr>\r\n								<td style=\"background-color:#ffffff;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;width:100%;text-align:left;color:#333333;font-size:14px\">Hai {$name_user},<br><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\">Email ini merupakan email otomatis yang dikirim dari </span><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\">{$name_system} karena Anda mengajukan</span><br style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\"><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\">permohonan untuk membuat </span><span class=\"il\" style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\">password</span><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\"> baru akun Anda.</span><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\"><br></span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\">Untuk membuat </span><span class=\"il\" style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\">password</span><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\"> baru, silakan </span><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\">klik tombol di bawah</span><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\"> dan ikuti petunjuk pada halaman yang akan tampil. <br></span></div>\r\n<br><div style=\"text-align: center;\"><a href=\"{$url_verifikasi}\" target=\"_blank\" style=\"background-color: #4CAF50;\r\n    border: none;\r\n    color: white;\r\n    padding: 15px 32px;\r\n    text-align: center;\r\n    text-decoration: none;\r\n    display: inline-block;\r\n    font-size: 16px;\r\n    margin: 4px 2px;\r\n    cursor: pointer;\" data-original-title=\"\" title=\"\">Ubah Password</a><br></div><br><div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\">Jika tidak ada halaman </span><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px;\">yang tampil, lakukan copy dan paste link tersebut di atas ke kolom alamat pada browser Anda.<br><a href=\"{$url_verifikasi}\" target=\"_blank\">{$url_verifikasi}</a></span></div></div><div><br></div><div>Salam.</div>{$name_system}<br><br><br></div></td>\r\n							</tr>\r\n							<tr>\r\n								<td style=\"background-color: rgb(255, 255, 255); padding: 10px 20px; width: 100%; text-align: center; color: rgb(51, 51, 51); font-size: 12px;\">© 2018 {$name_system}<br></td>\r\n							</tr><tr>\r\n								<td style=\"background:#42b549\"><br></td>\r\n							</tr>\r\n						</tbody>\r\n					</table>\r\n				</div>\r\n			</center>', 1, '2018-06-03 16:54:43', 1, '2018-07-30 14:13:17', 1),
(2, 'kartu', 'Pemilihan Umum', '<center style=\"width: 100%; table-layout: fixed;\">\r\n<div style=\"max-width: 1000px;\">\r\n<table style=\"border-spacing: 0; font-family: sans-serif; color: #333333; margin: 0 auto; width: 100%; max-width: 700px; border: 1px solid #BFBFBF; box-shadow: 3px 5px 3px #aaa;\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"background: #42b549;\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"background-color: #ffffff; width: 100%; text-align: left; color: #333333; font-size: 14px; padding: 10px 20px 10px 20px;\">Hai {name_user},<br />\r\n<div>&nbsp;</div>\r\n<div>Anda telah Terdaftar pada Pemilihan Umun <strong>{campaign}</strong>,</div>\r\n<p>Pesan ini berlaku pada {time},</p>\r\n<p>Di bawah ini merupakan tombol login ke sistem {name_system}, yang dapat anda gunakan untuk Login menggunakan akun anda,<br /><br /></p>\r\n<div style=\"text-align: center;\"><a style=\"background-color: #4caf50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;\" title=\"\" href=\"{url_auto}\" target=\"_blank\" rel=\"noopener\" data-original-title=\"\">Auto Login</a></div>\r\n<div>&nbsp;</div>\r\n<div>Auto login adalah fitur login dengan akun anda melalui Buton \"Auto login\", Jika anda mengalami kesulitan mengklik tombol di atas, salin dan tempelkan URL berikut ini ke browser web Anda :\r\n<p><a href=\"{url_auto}\" target=\"_blank\" rel=\"noopener\">{url_auto}</a></p>\r\n</div>\r\n<p style=\"text-align: center;\">Atau</p>\r\n<div style=\"text-align: center;\"><a style=\"background-color: #4caf50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;\" title=\"\" href=\"{url_page}\" target=\"_blank\" rel=\"noopener\" data-original-title=\"\">Manual Login</a></div>\r\n<div>&nbsp;</div>\r\n<div>Manual Login adalah fitur dimana anda harus memasukkan Kode Pemilih dan pin anda, berikut data anda:</div>\r\n<div>&nbsp;</div>\r\n<div>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>Nama Pemilih</td>\r\n<td>:</td>\r\n<td>{name_user}</td>\r\n</tr>\r\n<tr>\r\n<td>Kode Pemilih</td>\r\n<td>:</td>\r\n<td>{id_pemilih}</td>\r\n</tr>\r\n<tr>\r\n<td>PIN</td>\r\n<td>:</td>\r\n<td>{pin}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div>Jika anda mengalami kesulitan mengklik tombol di atas, salin dan tempelkan URL berikut ini ke browser web Anda :\r\n<p><a href=\"{url_page}\" target=\"_blank\" rel=\"noopener\"> {url_page}</a></p>\r\n</div>\r\n<div>&nbsp;</div>\r\n<div>Anda juga dapat melakukan pemilihan dengan Handphone Android dengan download dan install file pemilihan_umum.apk di android anda dengan <a title=\"Download file pemilihan_umum.apk untuk android\" href=\"{link_download}\" target=\"_blank\" rel=\"noopener\">KLIK DISINI</a>, kemudian gunakan kode pemilih dan pin anda, atau scan barcode dibawah ini untuk mesuk dengan akun anda</div>\r\n<div>&nbsp;</div>\r\n<div style=\"text-align: center;\"><img src=\"cid:{barcode}\" alt=\"Pemilihan umum\" /></div>\r\n<div>&nbsp;</div>\r\n<div>Salam.</div>\r\n{name_system}<br /><br /><br /></td>\r\n</tr>\r\n<tr>\r\n<td style=\"background-color: #ffffff; padding: 10px 20px; width: 100%; text-align: center; color: #333333; font-size: 12px;\">&copy; 2018 {name_system}</td>\r\n</tr>\r\n<tr>\r\n<td style=\"background: #42b549;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</center>', 1, '2018-06-03 18:48:49', 1, '2018-07-30 14:18:38', 1),
(3, 'payment', 'Data Pembayaran', '<center style=\"width: 100%; table-layout: fixed;\">\n<div class=\"ransparentbox\">\n<table style=\"border-spacing: 0; font-family: sans-serif; color: #000; margin: 0 auto; width: 100%; max-width: 600px; border: 3px solid #000FFF; border-style: dashed solid;\" align=\"center\">\n<tbody>\n<tr style=\"width: 100%; text-align: center;\">\n<td style=\"font-size: 16px; width: 100%; padding: 20px;\" colspan=\"3\"><strong>PEMBAYARAN {$name_app}</strong></td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 10px 3px 1px 10px; width: 50%;\" colspan=\"2\">KODE DAFTAR : <strong>{$registerCode}</strong></td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 1px 3px 3px 10px; width: 50%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 1px 1px 1px 10px; width: 50%;\" colspan=\"2\">PIN : {$pin}</td>\n<td style=\"text-align: left; color: #000; font-size: 10px; padding: 1px 1px 1px 10px; width: 50%;\">Tanggal Pendaftaran : {$join_date}</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 1px 1px 30px 10px; width: 50%;\" colspan=\"2\">STATUS : {$statusPembayaran}</td>\n<td style=\"text-align: left; color: #000; font-size: 10px; padding: 1px 1px 30px 10px; width: 50%;\">Terakhir Pembayaran : {$due_date}</td>\n</tr>\n<tr>\n  <td style=\"text-align: center; font-size: 14px; width: 100%; padding: 1px;\" colspan=\"3\"><strong><u>DATA DIRI</u></strong></td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px; width: 30%;\">NAMA</td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px; width: 70%;\" colspan=\"2\">: {$name_user}</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\">Email</td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\" colspan=\"2\">: {$email}</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\">No.Telp / HP</td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\" colspan=\"2\">: {$nohp}</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\">Instansi / Jurusan</td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\" colspan=\"2\">: {$instansi} / {$jurusan}</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 30px 10px;\">ALAMAT</td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 30px 10px;\" colspan=\"2\">: {$address}</td>\n</tr>\n<tr>\n  <td style=\"text-align: center; color: #000; font-size: 12px; padding: 2px 2px 2px 10px; width: 50%;\" colspan=\"2\"><strong><u>REKENING BANK</u></strong></td>\n  <td style=\"color: #000; font-size: 12px; padding: 2px 2px 2px 10px; width: 50%;\"><strong><u>KONTAK INFORMASI</u></strong></td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 10px; padding: 2px 2px 2px 10px; width: 50%;\" colspan=\"2\">{$rekening}</td>\n<td style=\"text-align: left; color: #000; font-size: 10px; padding: 2px 2px 2px 10px; width: 50%;\">{$contact}</td>\n</tr>\n<tr>\n<td style=\"padding: 40px 10px 20px; width: 55%; text-align: center; color: #000; font-size: 9px;\" colspan=\"3\"><font color=\"red\">#NOTE</font> : mohon untuk upload bukti transfer sebelum tanggal {$due_date}, <br>jika tidak anda harus melakukan daftar ulang</td>\n</tr>\n</tbody>\n</table>\n</div>\n</center>', 1, '2018-06-03 18:48:49', 1, '2018-06-20 16:29:20', 1),
(4, 'member', 'Member', '<center style=\"width: 100%; table-layout: fixed;\">\n<div class=\"ransparentbox\">\n<table style=\"border-spacing: 0; font-family: sans-serif; color: #000; margin: 0 auto; width: 100%; max-width: 600px; border: 3px solid #000FFF; border-style: dashed solid;\" align=\"center\">\n<tbody>\n<tr style=\"width: 100%; text-align: center;\">\n<td style=\"font-size: 16px; width: 100%; padding: 20px;\" colspan=\"3\"><strong>KARTU PESERTA {$name_app}</strong></td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 14px; padding: 10px 3px 2px 10px; width: 50%;\" colspan=\"2\">NO PESERTA : <strong>{$noPeserta}</strong></td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 1px 3px 3px 10px; width: 50%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 1px 2px 2px 10px; width: 50%;\" colspan=\"2\">Kode Daftar : {$registerCode}</td>\n<td style=\"text-align: left; color: #000; font-size: 10px; padding: 1px 1px 2px 10px; width: 50%;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 1px 2px 50px 10px; width: 50%;\" colspan=\"2\">PIN : {$pin}</td>\n<td style=\"text-align: left; color: #000; font-size: 10px; padding: 1px 2px 50px 10px; width: 50%;\">Tanggal verifikasi : {$tglVerivikasi}</td>\n</tr>\n<tr>\n  <td style=\"text-align: center; font-size: 14px; width: 100%; padding: 1px;\" colspan=\"3\"><strong><u>DATA DIRI</u></strong></td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px; width: 30%;\">NAMA</td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px; width: 70%;\" colspan=\"2\">: {$name_user}</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\">Email</td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\" colspan=\"2\">: {$email}</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\">No.Telp / HP</td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\" colspan=\"2\">: {$nohp}</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\">Instansi / Jurusan</td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 2px 10px;\" colspan=\"2\">: {$instansi} / {$jurusan}</td>\n</tr>\n<tr>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 80px 10px;\">ALAMAT</td>\n<td style=\"text-align: left; color: #000; font-size: 12px; padding: 2px 2px 80px 10px;\" colspan=\"2\">: {$address}</td>\n</tr>\n<tr>\n<td style=\"padding: 10px 20px; width: 55%; text-align: center; color: #000; font-size: 10px;\" colspan=\"3\"><font color=\"red\">#NOTE</font> : untuk informasi yang kurang jelas harap menghubungi kontak informasi</td>\n</tr>\n</tbody>\n</table>\n</div>\n</center>', 1, '2018-06-03 18:48:49', 1, '2018-06-20 16:29:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jur` varchar(10) NOT NULL,
  `nama_jur` varchar(30) NOT NULL,
  `logo_jur` varchar(50) NOT NULL,
  `status_jur` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jur`, `nama_jur`, `logo_jur`, `status_jur`) VALUES
('ka', 'Komputerisasi Akutansi', 'hmjka.PNG', 1),
('mi', 'Manajemen Infomatika', 'HMJ_MI.png', 1),
('to', 'Teknik Otomotif', 'TO.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jur_mahas`
--

CREATE TABLE `jur_mahas` (
  `nim` varchar(20) NOT NULL,
  `id_jur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jur_mahas`
--

INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES
('1421024172', 'mi'),
('1421024173', 'mi'),
('1421024175', 'mi'),
('1421024176', 'mi'),
('1421024177', 'mi'),
('1421024178', 'mi'),
('1421024179', 'mi'),
('1421024180', 'mi'),
('1421024181', 'mi'),
('1421024182', 'mi'),
('1421220005', 'to'),
('1421220006', 'to'),
('1421220007', 'to'),
('1421220008', 'to'),
('1421220009', 'to'),
('1421220010', 'to'),
('1421220011', 'to'),
('1421220012', 'to'),
('1421220013', 'to'),
('1421220014', 'to'),
('1422510160', 'ka'),
('1422510161', 'ka'),
('1422510162', 'ka'),
('1422510163', 'ka'),
('1422510164', 'ka'),
('1422510165', 'ka'),
('1422510166', 'ka'),
('1422510167', 'ka'),
('1422510168', 'ka'),
('1422510169', 'ka'),
('1866766565', 'mi');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mahas` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `thn_masuk` year(4) DEFAULT NULL,
  `jalan` text,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) NOT NULL,
  `desa` text NOT NULL,
  `kec` text NOT NULL,
  `kota` text NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `provinsi` text NOT NULL,
  `kota_lahir` text NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gol_darah` varchar(3) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `agama` varchar(30) NOT NULL,
  `nama_bpk` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `didik_bpk` varchar(10) NOT NULL,
  `didik_ibu` varchar(10) NOT NULL,
  `kerja_bpk` varchar(40) NOT NULL,
  `kerja_ibu` varchar(40) NOT NULL,
  `hasil_bpk` bigint(15) NOT NULL,
  `hasil_ibu` bigint(15) NOT NULL,
  `anak_ke` varchar(3) NOT NULL,
  `jml_saudara` varchar(3) NOT NULL,
  `jurusan_asal` varchar(30) NOT NULL,
  `asal_sekolah` text NOT NULL,
  `kota_sekolah` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `email`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES
('1421024172', 'ACHMAD MAHFUD', 'achmadmahfud13@gmail.com', '', 2014, 'JL. GAJAH MADA Gg. SAMIADOEN 10 DS. SUKOREJO KEC. BOJONEGORO KAB. BOJONEGORO', ' -', ' -', 'DS. SUKOREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', 'BOJONEGORO', '19/04/1996', '082132446455', '-', 'L', 'ISLAM', 'HERI SISWANTO', 'NUR AROFAH', ' -', ' -', 'PNS', ' -', 3500000, 0, '-', '-', 'TEKNIK KOMPUTER DAN JARINGAN', 'SMK NEGERI 2 BOJONEGORO', 'BOJONEGORO', 1),
('1421024173', 'FAHMI', 'fahmihasan97@gmail.com', '', 2014, 'JL. MAHONI SELATAN 9 NO. 6 PERUMNAS MOJORANU KEC. DANDER KAB. BOJONEGORO', ' -', ' -', 'DS. MOJORANU', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'KUTAI', '09/08/1996', '085607896611', '-', 'P', 'ISLAM', 'SUYONO', 'SUSILOWATI', '-', '-', 'SWASTA', 'WIRAUSAHA', 2000000, 0, '-', '-', 'IPS', 'MA NEGERI 2 BOJONEGORO', 'BOJONEGORO', 1),
('1421024175', 'NUR KHOZIN', 'nurkhozin95@gmail.com', '', 2014, 'DS. MOJOMALANG RT. 04 RW. 03 KEC. PARENGAN KAB. TUBAN', '4', '3', 'DS. MOJOMALANG', 'KEC. PARENGAN', 'KAB. TUBAN', ' -', 'JAWA TIMUR', 'TUBAN', '30/06/1996', '085259953309', '-', 'P', 'ISLAM', 'MAT FAQIH', 'MUNTIASIH', '-', '-', 'WIRASWASTA', 'BURUH', 1500000, 0, '-', '-', 'IPA', 'MA NEGERI 2 BOJONEGORO', 'BOJONEGORO', 1),
('1421024176', 'MUHAMAD ALIF FUDIANTO', 'aliffudianto@gmail.com', '', 2014, 'DK. KARANG ANYAR DS. KASIMAN RT. 01 RW. 05 KEC. KASIMAN KAB. BOJONEGORO', '1', '5', 'DS. KASIMAN', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62164', 'JAWA TIMUR', 'BOJONEGORO', '07/07/1996', '085782883970', '-', 'L', 'ISLAM', 'YUSMONO', 'MARYUNI', '-', '-', 'KARYAWAN SWASTA', 'IBU RUMAH TANGGA', 2000000, 0, '-', '-', 'IPA', 'SMA NEGERI 1 KASIMAN', 'BOJONEGORO', 1),
('1421024177', 'BENY RHAMDANI', '', '', 2014, 'DS. NGUNUT KEC. DANDER KAB. BOJONEGORO', '-', '-', 'DS. NGUNUT', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'BOJONEGORO', '08/02/1997', '081938106060', '-', 'L', 'ISLAM', 'GATOT SUPRAYITNO', 'SUMINI', '-', '-', 'POLISI', 'IBU RUMAH TANGGA', 3500000, 0, '-', '-', 'IPS', 'SMA NEGERI 1 DANDER', 'BOJONEGORO', 1),
('1421024178', 'BETHA YOGA ASMARA ADHY P.', '', '', 2014, 'DS. KEPOH KIDUL RT.02 RW.04 KEC. KEDUNGADEM KAB. BOJONEGORO', '2', '4', 'DS. KEPOH KIDUL', 'KEC. KEDUNG ADEM ', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', 'BOJONEGORO', '22/05/1996', '085730150558', '-', 'L', 'ISLAM', 'SURATNO ', 'SRIMURTI', '-', '-', 'PETANI', 'PETANI ', 2000000, 0, '-', '-', 'IPA', '-', '-', 1),
('1421024179', 'CHOIRUL FATIKHIN', '', '', 2014, 'DS. SUMODIKARAN RT. 02 RW. 02 KEC. DANDER KAB. BOJONEGORO', '2', '2', 'DS. SUMODIKARAN', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'BOJONEGORO', '19/05/1996', '085730018562', '-', 'L', 'ISLAM', 'SUPAAT (ALM)', 'SYARI\' ATIN', '-', '-', '-', 'PETANI', 1000000, 0, '-', '-', 'IPS', 'MA AL-ROSYID', 'BOJONEGORO', 1),
('1421024180', 'DEVI MARLINA SAFITRI', '', '', 2014, 'DK. BANDAR DS. BATOKAN RT. 24 RW. 04 KEC. KASIMAN KAB. BOJONEGORO', '24', '4', 'DS. BATOKAN', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62164', 'JAWA TIMUR', 'BOJONEGORO', '02/03/1996', '08974479686', '-', 'P', 'ISLAM', 'SAMIRAN', 'SUGINEM', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', 1000000, 0, '-', '-', 'AKUNTANSI', 'SMK NEGERI 1 CEPU', 'CEPU', 1),
('1421024181', 'DEWI PUSPITASARI', '', '', 2014, 'DS. SUMUR CINDE RT. 03 RW. 03 KEC. SOKO KAB. TUBAN', '3', '3', 'DS. SUMURCINDE', 'KEC. SOKO', 'KAB. TUBAN', ' -', 'JAWA TIMUR', 'TUBAN', '06/02/1996', '085706613651', '-', 'P', 'ISLAM', 'SUYITNO (ALM)', 'SRIYATUN', '-', '-', ' -', 'IBU RUMAH TANGGA', 1000000, 0, '-', '-', 'IPA', 'SMA NEGERI 4 BOJONEGORO', 'BOJONEGORO', 1),
('1421024182', 'DYAH AYU MUSTIKANINGRUM', '', '', 2014, 'DS. JATIKLABANG KEC. JATIROGO KAB. TUBAN', ' -', ' -', 'DS. JATIKLABANG', 'KEC. JATIROGO', 'KAB. TUBAN', '62362', 'JAWA TIMUR', 'TUBAN', '17/11/1995', '-', '-', 'P', 'ISLAM', 'SUPRIYARKO', 'SULIKAH', '-', '-', 'PNS', ' -', 3500000, 0, '-', '-', 'IPS', 'SMA NEGERI 1 JATIROGO', 'TUBAN', 1),
('1421220005', 'ADIE RIDWAN NURVIANSYAH', '', '', 2014, 'JL. GAJAH MADA Gg. SAMIADOEN 10 DS. SUKOREJO KEC. BOJONEGORO KAB. BOJONEGORO', ' -', ' -', 'DS. SUKOREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', 'BOJONEGORO', '19/04/1996', '082132446455', '-', 'L', 'ISLAM', 'HERI SISWANTO', 'NUR AROFAH', ' -', ' -', 'PNS', ' -', 3500000, 0, '-', '-', 'TEKNIK KOMPUTER DAN JARINGAN', 'SMK NEGERI 2 BOJONEGORO', 'BOJONEGORO', 1),
('1421220006', 'AGUS KRISTANTO', '', '', 2014, 'JL. MAHONI SELATAN 9 NO. 6 PERUMNAS MOJORANU KEC. DANDER KAB. BOJONEGORO', ' -', ' -', 'DS. MOJORANU', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'KUTAI', '09/08/1996', '085607896611', '-', 'P', 'ISLAM', 'SUYONO', 'SUSILOWATI', '-', '-', 'SWASTA', 'WIRAUSAHA', 2000000, 0, '-', '-', 'IPS', 'MA NEGERI 2 BOJONEGORO', 'BOJONEGORO', 1),
('1421220007', 'AGUS SETIAWAN', '', '', 2014, 'DS. MOJOMALANG RT. 04 RW. 03 KEC. PARENGAN KAB. TUBAN', '4', '3', 'DS. MOJOMALANG', 'KEC. PARENGAN', 'KAB. TUBAN', ' -', 'JAWA TIMUR', 'TUBAN', '30/06/1996', '085259953309', '-', 'P', 'ISLAM', 'MAT FAQIH', 'MUNTIASIH', '-', '-', 'WIRASWASTA', 'BURUH', 1500000, 0, '-', '-', 'IPA', 'MA NEGERI 2 BOJONEGORO', 'BOJONEGORO', 1),
('1421220008', 'AHMAD AMIRUDIN', '', '', 2014, 'DK. KARANG ANYAR DS. KASIMAN RT. 01 RW. 05 KEC. KASIMAN KAB. BOJONEGORO', '1', '5', 'DS. KASIMAN', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62164', 'JAWA TIMUR', 'BOJONEGORO', '07/07/1996', '085782883970', '-', 'L', 'ISLAM', 'YUSMONO', 'MARYUNI', '-', '-', 'KARYAWAN SWASTA', 'IBU RUMAH TANGGA', 2000000, 0, '-', '-', 'IPA', 'SMA NEGERI 1 KASIMAN', 'BOJONEGORO', 1),
('1421220009', 'AHMAD FEBRIAN DAROJAT', '', '', 2014, 'DS. NGUNUT KEC. DANDER KAB. BOJONEGORO', '-', '-', 'DS. NGUNUT', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'BOJONEGORO', '08/02/1997', '081938106060', '-', 'L', 'ISLAM', 'GATOT SUPRAYITNO', 'SUMINI', '-', '-', 'POLISI', 'IBU RUMAH TANGGA', 3500000, 0, '-', '-', 'IPS', 'SMA NEGERI 1 DANDER', 'BOJONEGORO', 1),
('1421220010', 'AHMAD MUFRUDI', '', '', 2014, 'DS. KEPOH KIDUL RT.02 RW.04 KEC. KEDUNGADEM KAB. BOJONEGORO', '2', '4', 'DS. KEPOH KIDUL', 'KEC. KEDUNG ADEM ', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', 'BOJONEGORO', '22/05/1996', '085730150558', '-', 'L', 'ISLAM', 'SURATNO ', 'SRIMURTI', '-', '-', 'PETANI', 'PETANI ', 2000000, 0, '-', '-', 'IPA', '-', '-', 1),
('1421220011', 'AHMAD NURHASAN', '', '', 2014, 'DS. SUMODIKARAN RT. 02 RW. 02 KEC. DANDER KAB. BOJONEGORO', '2', '2', 'DS. SUMODIKARAN', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'BOJONEGORO', '19/05/1996', '085730018562', '-', 'L', 'ISLAM', 'SUPAAT (ALM)', 'SYARI\' ATIN', '-', '-', '-', 'PETANI', 1000000, 0, '-', '-', 'IPS', 'MA AL-ROSYID', 'BOJONEGORO', 1),
('1421220012', 'AHMAD QUSNAN', '', '', 2014, 'DK. BANDAR DS. BATOKAN RT. 24 RW. 04 KEC. KASIMAN KAB. BOJONEGORO', '24', '4', 'DS. BATOKAN', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62164', 'JAWA TIMUR', 'BOJONEGORO', '02/03/1996', '08974479686', '-', 'P', 'ISLAM', 'SAMIRAN', 'SUGINEM', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', 1000000, 0, '-', '-', 'AKUNTANSI', 'SMK NEGERI 1 CEPU', 'CEPU', 1),
('1421220013', 'AHMAD SAIQ HADI', '', '', 2014, 'DS. SUMUR CINDE RT. 03 RW. 03 KEC. SOKO KAB. TUBAN', '3', '3', 'DS. SUMURCINDE', 'KEC. SOKO', 'KAB. TUBAN', ' -', 'JAWA TIMUR', 'TUBAN', '06/02/1996', '085706613651', '-', 'P', 'ISLAM', 'SUYITNO (ALM)', 'SRIYATUN', '-', '-', ' -', 'IBU RUMAH TANGGA', 1000000, 0, '-', '-', 'IPA', 'SMA NEGERI 4 BOJONEGORO', 'BOJONEGORO', 1),
('1421220014', 'AHMAD SYAMSUL HADI', '', '', 2014, 'DS. JATIKLABANG KEC. JATIROGO KAB. TUBAN', ' -', ' -', 'DS. JATIKLABANG', 'KEC. JATIROGO', 'KAB. TUBAN', '62362', 'JAWA TIMUR', 'TUBAN', '17/11/1995', '-', '-', 'P', 'ISLAM', 'SUPRIYARKO', 'SULIKAH', '-', '-', 'PNS', ' -', 3500000, 0, '-', '-', 'IPS', 'SMA NEGERI 1 JATIROGO', 'TUBAN', 1),
('1422510160', 'DARA INDAH NUR LAILY', '', '01.jpg', 2014, 'DS. SUGIHWARAS KEC. PARENGAN KAB. TUBAN ', '-', '-', 'DS. SUGIHWARAS', 'KEC. PARENGAN', 'KAB. TUBAN', '62366', 'JAWA TIMUR', 'TUBAN ', '09/04/1996', '085655014344', '-', 'P', 'ISLAM', 'SUNARTO', 'KHOIRIYAH', '-', '-', 'WIRASWASTA', '-', 2500000, 0, '-', '-', 'TEKNIK PERMESINAN ', 'SMK NEGERI 3 BOJONEGORO', 'BOJONEGORO', 1),
('1422510161', 'DEBBY ANATASYA', 'nurkhozin95@gmail.com', '', 2014, 'DS. NGUJUNG KEC. TEMAYANG KAB. BOJONEGORO', '-', '-', 'DS. NGUJUNG', 'KEC. TEMAYANG', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', 'BOJONEGORO', '30/03/1996', '085645595969', '-', 'P', 'ISLAM', 'HADI SUSANTO', 'YASRI LESTARI', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', 1500000, 0, '-', '-', 'IPA', 'SMA NEGERI 1 SUGIHWARAS', 'BOJONEGORO', 1),
('1422510162', 'DYAH PUJI LESTARI', '', '', 2014, 'Dsn. KALIPAN RT. 005RW. 005 DS. DUYUNGAN KEC. SUKOSEWU KAB. BOJONEGORO', '5', '5', 'DS. DUYUNGAN', 'KEC. SUKOSEWU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', 'BOJONEGORO', '05/09/1995', '085704719200', '-', 'P', 'ISLAM', 'MUNTOHIR', 'SITI HERI ASIH', '-', '-', 'WIRASWASTA', 'SWASTA', 0, 0, '-', '-', 'IPS', 'SMA NEGERI 1 KALITIDU', 'BOJONEGORO', 1),
('1422510163', 'IKHSAN EFENDI', 'ikhsanefendi67@gmail.com', '', 2014, 'DS. WEDI RT. 04 RW. 01 KEC. KAPAS KAB. BOJONEGORO', '4', '1', 'DS. WEDI', 'KEC. KAPAS', 'KAB. BOJONEGORO', '62181', 'JAWA TIMUR', 'BOJONEGORO', '19/12/1995', '089677445175', '-', 'P', 'ISLAM', 'M. SAHER', 'SITI MUSYAROFAH', '-', '-', 'TANI', 'WIRASWASTA', 1000000, 0, '-', '-', 'TEI', 'SMK NEGERI 2 BOJONEGORO', 'BOJONEGORO', 1),
('1422510164', 'NUR KHOZIN', 'nurkhozi95@gmail.com', '', 2014, 'DS. GUYANGAN RT. 02 RW. 01 KEC. TRUCUK KAB. BOJONEGORO', '2', '1', 'DS. GUYANGAN', 'KEC. TRUCUK', 'KAB. BOJONEGORO', '62155', 'JAWA TIMUR', 'BOJONEGORO', '05/10/1996', '087856050499', '-', 'P', 'ISLAM', 'MA\'RUF', 'YUNI ASTUTIK', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', 1000000, 0, '-', '-', 'TEKNIK KENDARAAN RINGAN', 'SMK NEGERI 3 BOJONEGORO', 'BOJONEGORO', 1),
('1422510165', 'EKA SRI ATMAWATI', '', '', 2014, 'DS. WORO RT. 04 RW. 02 KEC. KEPOHBARU KAB. BOJONEGORO', '4', '2', 'DS. WORO', 'KEC. KEPOHBARU', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', 'BOJONEGORO', '10/09/1996', '085645167116', '-', 'P', 'ISLAM', 'SUBIYANTO', 'MUFROTIN', '-', '-', 'GURU SWASTA', 'PNS', 1500000, 0, '-', '-', 'ADMINISTRASI PERKANTORAN', 'SMK NEGERI 1 BOJONEGORO', 'BOJONEGORO', 1),
('1422510166', 'FATIYATUR RAHMA SOFIANA', '', '', 2014, 'DK. TAWANG DS. PAYAMAN RT. 14 RW. 4 KEC. NGRAHO KAB. BOJONEGORO', '14', '4', 'DS. PAYAMAN', 'KEC. NGRAHO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', 'BOJONEGORO', '25/10/1997', '085707268540', '-', 'P', 'ISLAM', 'KHOIRUN', 'MARFUAH', '-', '-', 'SWASTA', 'SWASTA', 2000000, 0, '-', '-', 'IPA', 'MA NEGERI PADANGAN', 'BOJONEGORO', 1),
('1422510167', 'FRYSKHA MEIDAYANTI', '', '', 2014, 'DSN. SAWAHAN RT. 03 RW. 01 DS. PRAMBONTERGAYANG KEC. SOKO KAB. TUBAN', '3', '1', 'DS. PRAMBONTERGAYANG', 'KEC. SOKO', 'KAB. TUBAN', '62372', 'JAWA TIMUR', 'TUBAN', '21/05/1996', '085707340092', '-', 'P', 'ISLAM', 'MUHALI', 'SUTI\'AH', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', 1000000, 0, '-', '-', 'IPA', 'SMA NEGERI 1 SOKO', 'TUBAN', 1),
('1422510168', 'INTAN RAMADHANTI', '', '', 2014, 'DK. DONDONG DS. GEDONG ARUM RT 03 RW.01 KEC. KANOR KAB. BOJONEGORO', '3', '1', 'DS. GEDONG ARUM ', 'KEC. KANOR ', 'KAB. BOJONEGORO', '62193', 'JAWA TIMUR', 'BOJONEGORO ', '30/01/1997', '085732081075', '-', 'P', 'ISLAM', 'NOTOREJO', 'BAYATUN', '-', '-', 'TANI', 'IBU RUMAH TANGGA', 1500000, 0, '-', '-', 'IPA', 'SMA NEGERI 1 SUMBERREJO', 'BOJONEGORO', 1),
('1422510169', 'ISMI NUR FADHILLAH', '', '', 2014, 'DS. GLONGGONG RT.06 RW.02 KEC. DANDER KAB. BOJONEGORO ', '6', '2', 'DS. GLONGGONG', 'KEC. DANDER', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', 'BOJONEGORO ', '24/04/1995', '081939834007', '-', 'P', 'ISLAM', 'HADI SUCIPTO', 'UMI SAROH', '-', '-', 'BURUH TANI ', '-', 1000000, 0, '-', '-', 'TEKNIK OTOMOTIF', 'SMK NEGERI DANDER ', 'BOJONEGORO', 1),
('1866766565', 'PAIMIN', 'nurkhozin2304@gmail.com', '02.JPG', 2018, 'uuu', '08', '08', 'trytgyg', 'y', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `password` varchar(6) NOT NULL,
  `id_akses` varchar(20) NOT NULL,
  `id_campaign` varchar(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` int(2) NOT NULL,
  `cetak` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `id_user`, `password`, `id_akses`, `id_campaign`, `tahun`, `status`, `cetak`) VALUES
('2018hmjti1421024172', '1421024172', '320380', 'mahas', 'hmjti', 2018, 0, '9P9IQQ'),
('2018hmjti1421024173', '1421024173', '330287', 'mahas', 'hmjti', 2018, 1, '9P9IQQ'),
('2018hmjti1421024175', '1421024175', '140876', 'mahas', 'hmjti', 2018, 1, '9P9IQQ'),
('2018hmjti1421024176', '1421024176', '357774', 'mahas', 'hmjti', 2018, 1, '9P9IQQ'),
('2018hmjti1422510160', '1422510160', '165502', 'mahas', 'hmjti', 2018, 0, 'glVmtj'),
('2018hmjti1422510161', '1422510161', '006732', 'mahas', 'hmjti', 2018, 0, 'glVmtj'),
('2018hmjti1422510162', '1422510162', '486336', 'mahas', 'hmjti', 2018, 0, ''),
('2018hmjti1422510163', '1422510163', '670813', 'mahas', 'hmjti', 2018, 0, ''),
('2018hmjti1422510164', '1422510164', '555484', 'mahas', 'hmjti', 2018, 1, ''),
('2018hmjti1422510165', '1422510165', '999607', 'mahas', 'hmjti', 2018, 1, ''),
('2018hmjtiMI1', 'MI1', '952179', 'dos', 'hmjti', 2018, 0, 'glVmtj'),
('2018hmjtiMI13', 'MI13', '898423', 'dos', 'hmjti', 2018, 1, ''),
('2018hmjtiMI5', 'MI5', '517717', 'dos', 'hmjti', 2018, 0, ''),
('2018hmjtiTU100', 'TU100', '612360', 'tu', 'hmjti', 2018, 1, ''),
('2018hmjtiTU101', 'TU101', '992608', 'tu', 'hmjti', 2018, 1, ''),
('2018hmjtiTU102', 'TU102', '887455', 'tu', 'hmjti', 2018, 0, 'glVmtj'),
('2018hmjtiTU103', 'TU103', '645710', 'tu', 'hmjti', 2018, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `poling`
--

CREATE TABLE `poling` (
  `id_poling` varchar(50) NOT NULL,
  `id_pemilih` varchar(30) NOT NULL,
  `tahun` year(4) NOT NULL,
  `no_urut` varchar(10) NOT NULL,
  `id_campaign` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL,
  `poin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poling`
--

INSERT INTO `poling` (`id_poling`, `id_pemilih`, `tahun`, `no_urut`, `id_campaign`, `waktu`, `poin`) VALUES
('1421024172-2018-12-10 10:54:10', '1421024172', 2018, '1', 'hmjti', '2018-12-10 10:54:10', 1),
('1422510160-2018-11-22 17:23:59', '1422510160', 2018, '1', 'hmjti', '2018-11-22 17:23:59', 1),
('1422510161-2018-11-23 08:12:48', '1422510161', 2018, '2', 'hmjti', '2018-11-23 08:12:48', 1),
('1422510162-2018-12-02 18:09:37', '1422510162', 2018, '3', 'hmjti', '2018-12-02 18:09:37', 1),
('1422510163-2018-12-10 10:51:30', '1422510163', 2018, '1', 'hmjti', '2018-12-10 10:51:30', 1),
('MI1-2018-11-25 06:44:55', 'MI1', 2018, '1', 'hmjti', '2018-11-25 06:44:55', 1),
('MI5-2018-11-25 09:43:17', 'MI5', 2018, '4', 'hmjti', '2018-11-25 09:43:17', 1),
('TU102-2018-11-22 18:22:52', 'TU102', 2018, '3', 'hmjti', '2018-11-22 18:22:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_pemilihan`
--

CREATE TABLE `tahun_pemilihan` (
  `id_tahun` varchar(15) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_campaign` varchar(10) NOT NULL,
  `mulai` datetime NOT NULL,
  `selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_pemilihan`
--

INSERT INTO `tahun_pemilihan` (`id_tahun`, `tahun`, `id_campaign`, `mulai`, `selesai`) VALUES
('2018hmjti', 2018, 'hmjti', '2018-11-12 00:00:00', '2018-12-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tatausaha`
--

CREATE TABLE `tatausaha` (
  `id_tu` varchar(20) NOT NULL,
  `nama_tu` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `tmp_lahir` text NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `agama` varchar(15) NOT NULL,
  `pendidikan_akhir` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `status_pegawai` enum('PNS','GTT') NOT NULL,
  `status_anggota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tatausaha`
--

INSERT INTO `tatausaha` (`id_tu`, `nama_tu`, `email`, `foto`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES
('TU100', 'Aning Tyas', '', '', 'BOJONEGORO', '23/04/1966', 'P', 'ISLAM', 'S1', 'Bojonegoro', 'PNS', 1),
('TU101', 'Nur Aisyah', '', '', 'BOJONEGORO', '23/04/1967', 'P', 'ISLAM', 'D3', 'Bojonegoro', 'PNS', 1),
('TU102', 'Rudi Setyawan', '', '', 'BOJONEGORO', '23/04/1968', 'L', 'ISLAM', 'D4', 'Bojonegoro', 'PNS', 1),
('TU103', 'indri', '', '', 'BOJONEGORO', '23/04/1969', 'P', 'ISLAM', 'S2', 'Bojonegoro', 'PNS', 1),
('TU104', 'ina', '', '', 'BOJONEGORO', '23/04/1970', 'P', 'ISLAM', 'S1', 'Bojonegoro', 'PNS', 1),
('TU105', 'Aning', '', '', 'BOJONEGORO', '23/04/1971', 'P', 'ISLAM', 'D3', 'Bojonegoro', 'PNS', 1),
('TU106', 'imam', '', '', 'BOJONEGORO', '23/04/1972', 'L', 'ISLAM', 'S1', 'Bojonegoro', 'PNS', 1),
('TU107', 'imam', '', '', 'BOJONEGORO', '23/04/1973', 'L', 'ISLAM', 'D3', 'Bojonegoro', 'PNS', 1),
('TU108', 'abdul', '', '', 'BOJONEGORO', '23/04/1974', 'L', 'ISLAM', 'D4', 'Bojonegoro', 'PNS', 1),
('TU109', 'kholik', '', '', 'BOJONEGORO', '23/04/1975', 'L', 'ISLAM', 'D3', 'Bojonegoro', 'PNS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id_calon`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id_campaign`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dos`);

--
-- Indexes for table `emailconfig`
--
ALTER TABLE `emailconfig`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `emailtemplate`
--
ALTER TABLE `emailtemplate`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jur`);

--
-- Indexes for table `jur_mahas`
--
ALTER TABLE `jur_mahas`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`);

--
-- Indexes for table `poling`
--
ALTER TABLE `poling`
  ADD PRIMARY KEY (`id_poling`);

--
-- Indexes for table `tahun_pemilihan`
--
ALTER TABLE `tahun_pemilihan`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tatausaha`
--
ALTER TABLE `tatausaha`
  ADD PRIMARY KEY (`id_tu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emailconfig`
--
ALTER TABLE `emailconfig`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emailtemplate`
--
ALTER TABLE `emailtemplate`
  MODIFY `email_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
