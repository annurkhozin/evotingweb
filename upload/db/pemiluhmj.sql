#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` varchar(50) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_akses` varchar(10) NOT NULL,
  `id_jur` varchar(15) NOT NULL,
  `status` varchar(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id_admin`, `id_user`, `id_akses`, `id_jur`, `status`, `username`, `password`) VALUES ('1421024199adminmi', '1421024199', 'admin', 'mi', '1', 'mi', '29bfe372865737fe2bfcfd3618b1da7d');
INSERT INTO `admin` (`id_admin`, `id_user`, `id_akses`, `id_jur`, `status`, `username`, `password`) VALUES ('1422510160adminka', '1422510160', 'admin', 'ka', '1', 'ka', '2c68e1d50809e4ae357bcffe1fc99d2a');
INSERT INTO `admin` (`id_admin`, `id_user`, `id_akses`, `id_jur`, `status`, `username`, `password`) VALUES ('8888super', '8888', 'super', 'super', '1', 'lusy', 'd83c6e8ea90058a70183372c28abf822');


#
# TABLE STRUCTURE FOR: akses
#

DROP TABLE IF EXISTS `akses`;

CREATE TABLE `akses` (
  `id_akses` varchar(20) NOT NULL,
  `nama_akses` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `akses` (`id_akses`, `nama_akses`, `bobot`, `status`) VALUES ('admin', 'Admin', '0', '1');
INSERT INTO `akses` (`id_akses`, `nama_akses`, `bobot`, `status`) VALUES ('dos', 'Dosen', '2', '1');
INSERT INTO `akses` (`id_akses`, `nama_akses`, `bobot`, `status`) VALUES ('mahas', 'Mahasiswa', '1', '1');
INSERT INTO `akses` (`id_akses`, `nama_akses`, `bobot`, `status`) VALUES ('super', 'SuperAdmin', '0', '1');
INSERT INTO `akses` (`id_akses`, `nama_akses`, `bobot`, `status`) VALUES ('tu', 'Tata Usaha', '2', '1');


#
# TABLE STRUCTURE FOR: calon
#

DROP TABLE IF EXISTS `calon`;

CREATE TABLE `calon` (
  `id_calon` varchar(20) NOT NULL,
  `no_urut` varchar(3) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `id_jur` varchar(15) NOT NULL,
  `tahun` year(4) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id_calon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `calon` (`id_calon`, `no_urut`, `nim`, `id_jur`, `tahun`, `gambar`, `status`) VALUES ('2016142102417201', '01', '1421024172', 'mi', '2016', '01.jpg', '1');
INSERT INTO `calon` (`id_calon`, `no_urut`, `nim`, `id_jur`, `tahun`, `gambar`, `status`) VALUES ('2016142102417602', '02', '1421024176', 'mi', '2016', '02.JPG', '1');
INSERT INTO `calon` (`id_calon`, `no_urut`, `nim`, `id_jur`, `tahun`, `gambar`, `status`) VALUES ('2016142102417903', '03', '1421024179', 'mi', '2016', '04.jpg', '1');
INSERT INTO `calon` (`id_calon`, `no_urut`, `nim`, `id_jur`, `tahun`, `gambar`, `status`) VALUES ('2016142102418304', '04', '1421024183', 'mi', '2016', '03.jpg', '0');


#
# TABLE STRUCTURE FOR: dosen
#

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
  `id_dos` varchar(20) NOT NULL,
  `nama_dos` varchar(50) NOT NULL,
  `tmp_lahir` text NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `agama` varchar(15) NOT NULL,
  `pendidikan_akhir` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `status_pegawai` enum('PNS','GTT') NOT NULL,
  `status_anggota` int(2) NOT NULL,
  PRIMARY KEY (`id_dos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dosen` (`id_dos`, `nama_dos`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('8888', 'Lusy', 'Bojonegoro', '03/10/1983', 'L', 'islam', 'S1', 'Bojonegoro', '', '1');
INSERT INTO `dosen` (`id_dos`, `nama_dos`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('MI1', 'Drs. H.  YUDI PRAMONO, MM', 'BOJONEGORO', '06/15/1978', 'L', 'ISLAM', 'S1', 'Bojonegoro', 'PNS', '1');
INSERT INTO `dosen` (`id_dos`, `nama_dos`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('MI13', 'LUSY KURNIAWATI, S.Pd', 'BOJONEGORO', '06/10/1982', 'P', 'ISLAM', 'S5', 'Bojonegoro', 'PNS', '1');
INSERT INTO `dosen` (`id_dos`, `nama_dos`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('MI5', 'S. AISYAH, S.Pd', 'BOJONEGORO', '23/04/1967', 'P', 'ISLAM', 'S2', 'BJN', 'PNS', '0');
INSERT INTO `dosen` (`id_dos`, `nama_dos`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('MI6', 'Drs. SUYONO, M.MPd', 'BOJONEGORO', '23/04/1968', 'L', 'ISLAM', 'S3', 'BJN', 'PNS', '1');
INSERT INTO `dosen` (`id_dos`, `nama_dos`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('MI7', 'ABDUL FATAH S.Pd., M.MPd', 'BOJONEGORO', '23/04/1969', 'L', 'ISLAM', 'S4', 'BJN', 'PNS', '1');


#
# TABLE STRUCTURE FOR: jur_mahas
#

DROP TABLE IF EXISTS `jur_mahas`;

CREATE TABLE `jur_mahas` (
  `nim` varchar(20) NOT NULL,
  `id_jur` varchar(10) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024172', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024173', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024175', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024176', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024177', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024178', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024179', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024180', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024181', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024182', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024183', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024184', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024186', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024187', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024188', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024189', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024190', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024191', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024192', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024193', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024194', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024196', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024198', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024199', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421024200', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421220005', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421220006', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421220007', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421220008', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421220009', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421220010', 'to');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421220011', 'to');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421220012', 'to');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421220013', 'to');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421220014', 'to');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1421220015', 'to');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1422510160', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1422510161', 'ka');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1422510162', 'ka');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1422510163', 'ka');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1422510164', 'ka');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1422510165', 'ka');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1422510166', 'ka');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1422510167', 'ka');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1422510168', 'ka');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1422510169', 'mi');
INSERT INTO `jur_mahas` (`nim`, `id_jur`) VALUES ('1422510170', 'mi');


#
# TABLE STRUCTURE FOR: jurusan
#

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id_jur` varchar(10) NOT NULL,
  `nama_jur` varchar(30) NOT NULL,
  `logo_jur` varchar(50) NOT NULL,
  `status_jur` int(2) NOT NULL,
  PRIMARY KEY (`id_jur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `jurusan` (`id_jur`, `nama_jur`, `logo_jur`, `status_jur`) VALUES ('ka', 'Komputer Akutansi', 'hmjka.PNG', '1');
INSERT INTO `jurusan` (`id_jur`, `nama_jur`, `logo_jur`, `status_jur`) VALUES ('mi', 'Manajemen Informatika', 'HMJ_MI.png', '1');
INSERT INTO `jurusan` (`id_jur`, `nama_jur`, `logo_jur`, `status_jur`) VALUES ('to', 'Teknik Otomotif', 'TO.jpg', '1');


#
# TABLE STRUCTURE FOR: mahasiswa
#

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mahas` varchar(50) DEFAULT NULL,
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
  `status` int(2) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024172', 'ACHMAD FAHRIZAL BUSTOMI', '1421024172.jpg', '2014', 'JL. GAJAH MADA Gg. SAMIADOEN 13', ' -', ' -', 'DS. SUKOREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', 'BOJONEGORO', '19/04/1996', '082132446455', '-', 'L', 'ISLAM', 'HERI SISWANTO', 'NUR AROFAH', ' -', ' -', 'PNS', ' -', '3500000', '0', '-', '-', 'TEKNIK KOMPUTER DAN JARINGAN', 'SMK NEGERI 2 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024173', 'ADINDA NUR FIRDIYANI WATI', '', '2014', 'JL. MAHONI SELATAN 9 NO. 6 PER', ' -', ' -', 'DS. MOJORANU', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'KUTAI', '09/08/1996', '085607896611', '-', 'P', 'ISLAM', 'SUYONO', 'SUSILOWATI', '-', '-', 'SWASTA', 'WIRAUSAHA', '2000000', '0', '-', '-', 'IPS', 'MA NEGERI 2 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024175', 'AKRIMA BUNGA YUNIA RIZKY', '', '2014', 'DS. MOJOMALANG RT. 04 RW. 03 K', '4', '3', 'DS. MOJOMALANG', 'KEC. PARENGAN', 'KAB. TUBAN', ' -', 'JAWA TIMUR', 'TUBAN', '30/06/1996', '085259953309', '-', 'P', 'ISLAM', 'MAT FAQIH', 'MUNTIASIH', '-', '-', 'WIRASWASTA', 'BURUH', '1500000', '0', '-', '-', 'IPA', 'MA NEGERI 2 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024176', 'BAMBANG TRI HANDIKA', '1421024176.jpg', '2014', 'DK. KARANG ANYAR DS. KASIMAN R', '1', '5', 'DS. KASIMAN', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62164', 'JAWA TIMUR', 'BOJONEGORO', '07/07/1996', '085782883970', '-', 'L', 'ISLAM', 'YUSMONO', 'MARYUNI', '-', '-', 'KARYAWAN SWASTA', 'IBU RUMAH TANGGA', '2000000', '0', '-', '-', 'IPA', 'SMA NEGERI 1 KASIMAN', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024177', 'BENY RHAMDANI', '', '2014', 'DS. NGUNUT KEC. DANDER KAB. BO', '-', '-', 'DS. NGUNUT', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'BOJONEGORO', '08/02/1997', '081938106060', '-', 'L', 'ISLAM', 'GATOT SUPRAYITNO', 'SUMINI', '-', '-', 'POLISI', 'IBU RUMAH TANGGA', '3500000', '0', '-', '-', 'IPS', 'SMA NEGERI 1 DANDER', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024178', 'BETHA YOGA ASMARA ADHY P.', '', '2014', 'DS. KEPOH KIDUL RT.02 RW.04 KE', '2', '4', 'DS. KEPOH KIDUL', 'KEC. KEDUNG ADEM ', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', 'BOJONEGORO', '22/05/1996', '085730150558', '-', 'L', 'ISLAM', 'SURATNO ', 'SRIMURTI', '-', '-', 'PETANI', 'PETANI ', '2000000', '0', '-', '-', 'IPA', '-', '-', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024179', 'CHOIRUL FATIKHIN', '1421024179.jpg', '2014', 'DS. SUMODIKARAN RT. 02 RW. 02 ', '2', '2', 'DS. SUMODIKARAN', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'BOJONEGORO', '19/05/1996', '085730018562', '-', 'L', 'ISLAM', 'SUPAAT (ALM)', 'SYARI\' ATIN', '-', '-', '-', 'PETANI', '1000000', '0', '-', '-', 'IPS', 'MA AL-ROSYID', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024180', 'DEVI MARLINA SAFITRI', '', '2014', 'DK. BANDAR DS. BATOKAN RT. 24 ', '24', '4', 'DS. BATOKAN', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62164', 'JAWA TIMUR', 'BOJONEGORO', '02/03/1996', '08974479686', '-', 'P', 'ISLAM', 'SAMIRAN', 'SUGINEM', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', '1000000', '0', '-', '-', 'AKUNTANSI', 'SMK NEGERI 1 CEPU', 'CEPU', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024181', 'DEWI PUSPITASARI', '', '2014', 'DS. SUMUR CINDE RT. 03 RW. 03 ', '3', '3', 'DS. SUMURCINDE', 'KEC. SOKO', 'KAB. TUBAN', ' -', 'JAWA TIMUR', 'TUBAN', '06/02/1996', '085706613651', '-', 'P', 'ISLAM', 'SUYITNO (ALM)', 'SRIYATUN', '-', '-', ' -', 'IBU RUMAH TANGGA', '1000000', '0', '-', '-', 'IPA', 'SMA NEGERI 4 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024182', 'DYAH AYU MUSTIKANINGRUM', '', '2014', 'DS. JATIKLABANG KEC. JATIROGO ', ' -', ' -', 'DS. JATIKLABANG', 'KEC. JATIROGO', 'KAB. TUBAN', '62362', 'JAWA TIMUR', 'TUBAN', '17/11/1995', '-', '-', 'P', 'ISLAM', 'SUPRIYARKO', 'SULIKAH', '-', '-', 'PNS', ' -', '3500000', '0', '-', '-', 'IPS', 'SMA NEGERI 1 JATIROGO', 'TUBAN', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024183', 'EKO IRIANTO', '1421024183.jpg', '2014', 'DS. MOJORANU RT. 16 RW. 05 KEC', '16', '5', 'DS. MOJORANU', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'SENTANI', '27/04/1992', '085790483988', '-', 'L', 'ISLAM', 'JAMARI', 'ERNI SETYANINGSIH', '-', '-', 'TNI ', 'IBU RUMAH TANGGA', '3500000', '0', '-', '-', 'IPS', 'SMA NEGERI 3 JOMBANG', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024184', 'EKO PRASETYO KURNIAWAN', '', '2014', 'JL. SERMA ABDULLAH 115 RT.06 R', '6', '1', 'DS. PACUL ', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62114', 'JAWA TIMUR', 'BOJONEGORO', '23/04/1996', '085259682307', '-', 'L', 'ISLAM', 'BAMBANG PURNOMO', 'SITI KOESTINI', '-', '-', 'PENSIUNAN PNS', 'GURU/PNS', '2000000', '0', '-', '-', 'TKJ', 'SMK PGRI 1 BOJONEGORO ', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024186', 'HADI ISMA SURYADI', '', '2014', 'DSn. KEDUNG PANDAN DS. KESONGO', ' -', ' -', 'DS. KESONGO', 'KEC. KEDUNGADEM', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', 'BOJONEGORO', '13/03/1996', '085731591391', '-', 'L', 'ISLAM', 'SARNO', 'PATEMI', '-', '-', 'PETANI', 'PETANI', '1500000', '0', '-', '-', 'IPA', 'SMA NEGERI 1 KEDUNGADEM ', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024187', 'INGGRIT ARIMBI SAPUTRI', '', '2014', 'JL. MONGINSIDI DS. PACUL RT. 1', '16', '3', 'DS. PACUL', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62114', 'JAWA TIMUR', 'SORONG', '26/04/1996', '085730458479', '-', 'P', 'ISLAM', 'SUDARTO', 'SITI FATONAH', '-', '-', 'TNI-AD', 'IBU RUMAH TANGGA', '3500000', '0', '-', '-', 'IPS', 'MA NEGERI 1 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024188', 'IRFAN ANDIK ANDRIANTO', '', '2014', 'DS. SUGIHWARAS KEC. PARENGAN K', '-', '-', 'DS. SUGIHWARAS', 'KEC. PARENGAN', 'KAB. TUBAN', '62366', 'JAWA TIMUR', 'TUBAN ', '09/04/1996', '085655014344', '-', 'L', 'ISLAM', 'SUNARTO', 'KHOIRIYAH', '-', '-', 'WIRASWASTA', '-', '2500000', '0', '-', '-', 'TEKNIK PERMESINAN ', 'SMK NEGERI 3 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024189', 'JEPRI DWI PRASETYO', '', '2014', 'DS. NGUJUNG KEC. TEMAYANG KAB.', '-', '-', 'DS. NGUJUNG', 'KEC. TEMAYANG', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', 'BOJONEGORO', '30/03/1996', '085645595969', '-', 'L', 'ISLAM', 'HADI SUSANTO', 'YASRI LESTARI', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', '1500000', '0', '-', '-', 'IPA', 'SMA NEGERI 1 SUGIHWARAS', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024190', 'M. DUWI AGUS HERMAWAN', '', '2014', 'Dsn. KALIPAN RT. 005RW. 005 DS', '5', '5', 'DS. DUYUNGAN', 'KEC. SUKOSEWU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', 'BOJONEGORO', '05/09/1995', '085704719200', '-', 'L', 'ISLAM', 'MUNTOHIR', 'SITI HERI ASIH', '-', '-', 'WIRASWASTA', 'SWASTA', '0', '0', '-', '-', 'IPS', 'SMA NEGERI 1 KALITIDU', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024191', 'M. SYAIFUL AZIZ B.', '', '2014', 'DS. WEDI RT. 04 RW. 01 KEC. KA', '4', '1', 'DS. WEDI', 'KEC. KAPAS', 'KAB. BOJONEGORO', '62181', 'JAWA TIMUR', 'BOJONEGORO', '19/12/1995', '089677445175', '-', 'L', 'ISLAM', 'M. SAHER', 'SITI MUSYAROFAH', '-', '-', 'TANI', 'WIRASWASTA', '1000000', '0', '-', '-', 'TEI', 'SMK NEGERI 2 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024192', 'MAFNI SILA AKTORI', '', '2014', 'DS. GUYANGAN RT. 02 RW. 01 KEC', '2', '1', 'DS. GUYANGAN', 'KEC. TRUCUK', 'KAB. BOJONEGORO', '62155', 'JAWA TIMUR', 'BOJONEGORO', '05/10/1996', '087856050499', '-', 'L', 'ISLAM', 'MA\'RUF', 'YUNI ASTUTIK', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', '1000000', '0', '-', '-', 'TEKNIK KENDARAAN RINGAN', 'SMK NEGERI 3 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024193', 'MA\'RUFI SUADIAH', '', '2014', 'DS. WORO RT. 04 RW. 02 KEC. KE', '4', '2', 'DS. WORO', 'KEC. KEPOHBARU', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', 'BOJONEGORO', '10/09/1996', '085645167116', '-', 'P', 'ISLAM', 'SUBIYANTO', 'MUFROTIN', '-', '-', 'GURU SWASTA', 'PNS', '1500000', '0', '-', '-', 'ADMINISTRASI PERKANTORAN', 'SMK NEGERI 1 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024194', 'MAUIDLOTUL MUDRIKAH', '', '2014', 'DK. TAWANG DS. PAYAMAN RT. 14 ', '14', '4', 'DS. PAYAMAN', 'KEC. NGRAHO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', 'BOJONEGORO', '25/10/1997', '085707268540', '-', 'P', 'ISLAM', 'KHOIRUN', 'MARFUAH', '-', '-', 'SWASTA', 'SWASTA', '2000000', '0', '-', '-', 'IPA', 'MA NEGERI PADANGAN', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024196', 'NIHAYATUL KHUSNA', '', '2014', 'DSN. SAWAHAN RT. 03 RW. 01 DS.', '3', '1', 'DS. PRAMBONTERGAYANG', 'KEC. SOKO', 'KAB. TUBAN', '62372', 'JAWA TIMUR', 'TUBAN', '21/05/1996', '085707340092', '-', 'P', 'ISLAM', 'MUHALI', 'SUTI\'AH', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', '1000000', '0', '-', '-', 'IPA', 'SMA NEGERI 1 SOKO', 'TUBAN', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024198', 'NUR HARIYATI', '', '2014', 'DK. DONDONG DS. GEDONG ARUM RT', '3', '1', 'DS. GEDONG ARUM ', 'KEC. KANOR ', 'KAB. BOJONEGORO', '62193', 'JAWA TIMUR', 'BOJONEGORO ', '30/01/1997', '085732081075', '-', 'P', 'ISLAM', 'NOTOREJO', 'BAYATUN', '-', '-', 'TANI', 'IBU RUMAH TANGGA', '1500000', '0', '-', '-', 'IPA', 'SMA NEGERI 1 SUMBERREJO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024199', 'NUR KHOZIN ', '', '2014', 'DS. GLONGGONG RT.06 RW.02 KEC.', '6', '2', 'DS. GLONGGONG', 'KEC. DANDER', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', 'BOJONEGORO ', '24/04/1995', '081939834007', '-', 'L', 'ISLAM', 'HADI SUCIPTO', 'UMI SAROH', '-', '-', 'BURUH TANI ', '-', '1000000', '0', '-', '-', 'TEKNIK OTOMOTIF', 'SMK NEGERI DANDER ', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421024200', 'TRI SANTIKO ANDI YAHYA', '', '2014', 'JL. KAPTEN RAMELI NO. 252 DS. ', '2', '3', 'DS. LEDOK KULON', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62112', 'JAWA TIMUR', 'BOJONEGORO', '18/10/1995', '089663477032', '-', 'L', 'ISLAM', 'WAGONO', 'JUMIATI', '-', '-', 'KARYAWAN PT. KAI', 'IBU RUMAH TANGGA', '3500000', '0', '-', '-', 'TEI', 'SMK NEGERI 2 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421220005', 'ADIE RIDWAN NURVIANSYAH', '', '2014', 'JL. GAJAH MADA Gg. SAMIADOEN 1', ' -', ' -', 'DS. SUKOREJO', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62115', 'JAWA TIMUR', 'BOJONEGORO', '19/04/1996', '082132446455', '-', 'L', 'ISLAM', 'HERI SISWANTO', 'NUR AROFAH', ' -', ' -', 'PNS', ' -', '3500000', '0', '-', '-', 'TEKNIK KOMPUTER DAN JARINGAN', 'SMK NEGERI 2 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421220006', 'AGUS KRISTANTO', '', '2014', 'JL. MAHONI SELATAN 9 NO. 6 PER', ' -', ' -', 'DS. MOJORANU', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'KUTAI', '09/08/1996', '085607896611', '-', 'P', 'ISLAM', 'SUYONO', 'SUSILOWATI', '-', '-', 'SWASTA', 'WIRAUSAHA', '2000000', '0', '-', '-', 'IPS', 'MA NEGERI 2 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421220007', 'AGUS SETIAWAN', '', '2014', 'DS. MOJOMALANG RT. 04 RW. 03 K', '4', '3', 'DS. MOJOMALANG', 'KEC. PARENGAN', 'KAB. TUBAN', ' -', 'JAWA TIMUR', 'TUBAN', '30/06/1996', '085259953309', '-', 'P', 'ISLAM', 'MAT FAQIH', 'MUNTIASIH', '-', '-', 'WIRASWASTA', 'BURUH', '1500000', '0', '-', '-', 'IPA', 'MA NEGERI 2 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421220008', 'AHMAD AMIRUDIN', '', '2014', 'DK. KARANG ANYAR DS. KASIMAN R', '1', '5', 'DS. KASIMAN', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62164', 'JAWA TIMUR', 'BOJONEGORO', '07/07/1996', '085782883970', '-', 'L', 'ISLAM', 'YUSMONO', 'MARYUNI', '-', '-', 'KARYAWAN SWASTA', 'IBU RUMAH TANGGA', '2000000', '0', '-', '-', 'IPA', 'SMA NEGERI 1 KASIMAN', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421220009', 'AHMAD FEBRIAN DAROJAT', '', '2014', 'DS. NGUNUT KEC. DANDER KAB. BO', '-', '-', 'DS. NGUNUT', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'BOJONEGORO', '08/02/1997', '081938106060', '-', 'L', 'ISLAM', 'GATOT SUPRAYITNO', 'SUMINI', '-', '-', 'POLISI', 'IBU RUMAH TANGGA', '3500000', '0', '-', '-', 'IPS', 'SMA NEGERI 1 DANDER', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421220010', 'AHMAD MUFRUDI', '', '2014', 'DS. KEPOH KIDUL RT.02 RW.04 KE', '2', '4', 'DS. KEPOH KIDUL', 'KEC. KEDUNG ADEM ', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', 'BOJONEGORO', '22/05/1996', '085730150558', '-', 'L', 'ISLAM', 'SURATNO ', 'SRIMURTI', '-', '-', 'PETANI', 'PETANI ', '2000000', '0', '-', '-', 'IPA', '-', '-', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421220011', 'AHMAD NURHASAN', '', '2014', 'DS. SUMODIKARAN RT. 02 RW. 02 ', '2', '2', 'DS. SUMODIKARAN', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'BOJONEGORO', '19/05/1996', '085730018562', '-', 'L', 'ISLAM', 'SUPAAT (ALM)', 'SYARI\' ATIN', '-', '-', '-', 'PETANI', '1000000', '0', '-', '-', 'IPS', 'MA AL-ROSYID', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421220012', 'AHMAD QUSNAN', '', '2014', 'DK. BANDAR DS. BATOKAN RT. 24 ', '24', '4', 'DS. BATOKAN', 'KEC. KASIMAN', 'KAB. BOJONEGORO', '62164', 'JAWA TIMUR', 'BOJONEGORO', '02/03/1996', '08974479686', '-', 'P', 'ISLAM', 'SAMIRAN', 'SUGINEM', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', '1000000', '0', '-', '-', 'AKUNTANSI', 'SMK NEGERI 1 CEPU', 'CEPU', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421220013', 'AHMAD SAIQ HADI', '', '2014', 'DS. SUMUR CINDE RT. 03 RW. 03 ', '3', '3', 'DS. SUMURCINDE', 'KEC. SOKO', 'KAB. TUBAN', ' -', 'JAWA TIMUR', 'TUBAN', '06/02/1996', '085706613651', '-', 'P', 'ISLAM', 'SUYITNO (ALM)', 'SRIYATUN', '-', '-', ' -', 'IBU RUMAH TANGGA', '1000000', '0', '-', '-', 'IPA', 'SMA NEGERI 4 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421220014', 'AHMAD SYAMSUL HADI', '', '2014', 'DS. JATIKLABANG KEC. JATIROGO ', ' -', ' -', 'DS. JATIKLABANG', 'KEC. JATIROGO', 'KAB. TUBAN', '62362', 'JAWA TIMUR', 'TUBAN', '17/11/1995', '-', '-', 'P', 'ISLAM', 'SUPRIYARKO', 'SULIKAH', '-', '-', 'PNS', ' -', '3500000', '0', '-', '-', 'IPS', 'SMA NEGERI 1 JATIROGO', 'TUBAN', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1421220015', 'AKBAR SRI SETIYO P.', '', '2014', 'DS. MOJORANU RT. 16 RW. 05 KEC', '16', '5', 'DS. MOJORANU', 'KEC. DANDER', 'KAB. BOJONEGORO', '62171', 'JAWA TIMUR', 'SENTANI', '27/04/1992', '085790483988', '-', 'L', 'ISLAM', 'JAMARI', 'ERNI SETYANINGSIH', '-', '-', 'TNI ', 'IBU RUMAH TANGGA', '3500000', '0', '-', '-', 'IPS', 'SMA NEGERI 3 JOMBANG', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1422510160', 'DARA INDAH NUR LAILY', '', '2014', 'DS. SUGIHWARAS KEC. PARENGAN K', '-', '-', 'DS. SUGIHWARAS', 'KEC. PARENGAN', 'KAB. TUBAN', '62366', 'JAWA TIMUR', 'TUBAN ', '09/04/1996', '085655014344', '-', 'P', 'ISLAM', 'SUNARTO', 'KHOIRIYAH', '-', '-', 'WIRASWASTA', '-', '2500000', '0', '-', '-', 'TEKNIK PERMESINAN ', 'SMK NEGERI 3 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1422510161', 'DEBBY ANATASYA', '', '2014', 'DS. NGUJUNG KEC. TEMAYANG KAB.', '-', '-', 'DS. NGUJUNG', 'KEC. TEMAYANG', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', 'BOJONEGORO', '30/03/1996', '085645595969', '-', 'P', 'ISLAM', 'HADI SUSANTO', 'YASRI LESTARI', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', '1500000', '0', '-', '-', 'IPA', 'SMA NEGERI 1 SUGIHWARAS', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1422510162', 'DYAH PUJI LESTARI', '', '2014', 'Dsn. KALIPAN RT. 005RW. 005 DS', '5', '5', 'DS. DUYUNGAN', 'KEC. SUKOSEWU', 'KAB. BOJONEGORO', '62152', 'JAWA TIMUR', 'BOJONEGORO', '05/09/1995', '085704719200', '-', 'P', 'ISLAM', 'MUNTOHIR', 'SITI HERI ASIH', '-', '-', 'WIRASWASTA', 'SWASTA', '0', '0', '-', '-', 'IPS', 'SMA NEGERI 1 KALITIDU', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1422510163', 'EKA DANY WICAKSANA', '', '2014', 'DS. WEDI RT. 04 RW. 01 KEC. KA', '4', '1', 'DS. WEDI', 'KEC. KAPAS', 'KAB. BOJONEGORO', '62181', 'JAWA TIMUR', 'BOJONEGORO', '19/12/1995', '089677445175', '-', 'P', 'ISLAM', 'M. SAHER', 'SITI MUSYAROFAH', '-', '-', 'TANI', 'WIRASWASTA', '1000000', '0', '-', '-', 'TEI', 'SMK NEGERI 2 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1422510164', 'EKA PUTRI APRILIA', '', '2014', 'DS. GUYANGAN RT. 02 RW. 01 KEC', '2', '1', 'DS. GUYANGAN', 'KEC. TRUCUK', 'KAB. BOJONEGORO', '62155', 'JAWA TIMUR', 'BOJONEGORO', '05/10/1996', '087856050499', '-', 'P', 'ISLAM', 'MA\'RUF', 'YUNI ASTUTIK', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', '1000000', '0', '-', '-', 'TEKNIK KENDARAAN RINGAN', 'SMK NEGERI 3 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1422510165', 'EKA SRI ATMAWATI', '', '2014', 'DS. WORO RT. 04 RW. 02 KEC. KE', '4', '2', 'DS. WORO', 'KEC. KEPOHBARU', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', 'BOJONEGORO', '10/09/1996', '085645167116', '-', 'P', 'ISLAM', 'SUBIYANTO', 'MUFROTIN', '-', '-', 'GURU SWASTA', 'PNS', '1500000', '0', '-', '-', 'ADMINISTRASI PERKANTORAN', 'SMK NEGERI 1 BOJONEGORO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1422510166', 'FATIYATUR RAHMA SOFIANA', '', '2014', 'DK. TAWANG DS. PAYAMAN RT. 14 ', '14', '4', 'DS. PAYAMAN', 'KEC. NGRAHO', 'KAB. BOJONEGORO', ' -', 'JAWA TIMUR', 'BOJONEGORO', '25/10/1997', '085707268540', '-', 'P', 'ISLAM', 'KHOIRUN', 'MARFUAH', '-', '-', 'SWASTA', 'SWASTA', '2000000', '0', '-', '-', 'IPA', 'MA NEGERI PADANGAN', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1422510167', 'FRYSKHA MEIDAYANTI', '', '2014', 'DSN. SAWAHAN RT. 03 RW. 01 DS.', '3', '1', 'DS. PRAMBONTERGAYANG', 'KEC. SOKO', 'KAB. TUBAN', '62372', 'JAWA TIMUR', 'TUBAN', '21/05/1996', '085707340092', '-', 'P', 'ISLAM', 'MUHALI', 'SUTI\'AH', '-', '-', 'WIRASWASTA', 'IBU RUMAH TANGGA', '1000000', '0', '-', '-', 'IPA', 'SMA NEGERI 1 SOKO', 'TUBAN', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1422510168', 'INTAN RAMADHANTI', '', '2014', 'DK. DONDONG DS. GEDONG ARUM RT', '3', '1', 'DS. GEDONG ARUM ', 'KEC. KANOR ', 'KAB. BOJONEGORO', '62193', 'JAWA TIMUR', 'BOJONEGORO ', '30/01/1997', '085732081075', '-', 'P', 'ISLAM', 'NOTOREJO', 'BAYATUN', '-', '-', 'TANI', 'IBU RUMAH TANGGA', '1500000', '0', '-', '-', 'IPA', 'SMA NEGERI 1 SUMBERREJO', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1422510169', 'ISMI NUR FADHILLAH', '', '2014', 'DS. GLONGGONG RT.06 RW.02 KEC.', '6', '2', 'DS. GLONGGONG', 'KEC. DANDER', 'KAB. BOJONEGORO', '-', 'JAWA TIMUR', 'BOJONEGORO ', '24/04/1995', '081939834007', '-', 'P', 'ISLAM', 'HADI SUCIPTO', 'UMI SAROH', '-', '-', 'BURUH TANI ', '-', '1000000', '0', '-', '-', 'TEKNIK OTOMOTIF', 'SMK NEGERI DANDER ', 'BOJONEGORO', '1');
INSERT INTO `mahasiswa` (`nim`, `nama_mahas`, `foto`, `thn_masuk`, `jalan`, `rt`, `rw`, `desa`, `kec`, `kota`, `kode_pos`, `provinsi`, `kota_lahir`, `tgl_lahir`, `phone`, `gol_darah`, `jk`, `agama`, `nama_bpk`, `nama_ibu`, `didik_bpk`, `didik_ibu`, `kerja_bpk`, `kerja_ibu`, `hasil_bpk`, `hasil_ibu`, `anak_ke`, `jml_saudara`, `jurusan_asal`, `asal_sekolah`, `kota_sekolah`, `status`) VALUES ('1422510170', 'LISA NUR FAUZI', '', '2014', 'JL. KAPTEN RAMELI NO. 252 DS. ', '2', '3', 'DS. LEDOK KULON', 'KEC. BOJONEGORO', 'KAB. BOJONEGORO', '62112', 'JAWA TIMUR', 'BOJONEGORO', '18/10/1995', '089663477032', '-', 'P', 'ISLAM', 'WAGONO', 'JUMIATI', '-', '-', 'KARYAWAN PT. KAI', 'IBU RUMAH TANGGA', '3500000', '0', '-', '-', 'TEI', 'SMK NEGERI 2 BOJONEGORO', 'BOJONEGORO', '1');


#
# TABLE STRUCTURE FOR: pemilih
#

DROP TABLE IF EXISTS `pemilih`;

CREATE TABLE `pemilih` (
  `id_pemilih` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `password` varchar(6) NOT NULL,
  `id_akses` varchar(20) NOT NULL,
  `id_jur` varchar(15) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` int(2) NOT NULL,
  `cetak` varchar(6) NOT NULL,
  PRIMARY KEY (`id_pemilih`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pemilih` (`id_pemilih`, `id_user`, `password`, `id_akses`, `id_jur`, `tahun`, `status`, `cetak`) VALUES ('2016mi1421024172', '1421024172', '132340', 'mahas', 'mi', '2016', '1', '8ZH2tP');
INSERT INTO `pemilih` (`id_pemilih`, `id_user`, `password`, `id_akses`, `id_jur`, `tahun`, `status`, `cetak`) VALUES ('2016mi1421024173', '1421024173', '651548', 'mahas', 'mi', '2016', '1', '8ZH2tP');
INSERT INTO `pemilih` (`id_pemilih`, `id_user`, `password`, `id_akses`, `id_jur`, `tahun`, `status`, `cetak`) VALUES ('2016mi1421024175', '1421024175', '636463', 'mahas', 'mi', '2016', '1', '8ZH2tP');
INSERT INTO `pemilih` (`id_pemilih`, `id_user`, `password`, `id_akses`, `id_jur`, `tahun`, `status`, `cetak`) VALUES ('2016mi1421024176', '1421024176', '814121', 'mahas', 'mi', '2016', '1', '8ZH2tP');


#
# TABLE STRUCTURE FOR: poling
#

DROP TABLE IF EXISTS `poling`;

CREATE TABLE `poling` (
  `id_poling` varchar(50) NOT NULL,
  `id_pemilih` varchar(30) NOT NULL,
  `tahun` year(4) NOT NULL,
  `no_urut` varchar(10) NOT NULL,
  `id_jur` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL,
  `poin` int(3) NOT NULL,
  PRIMARY KEY (`id_poling`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: tahun_pemilihan
#

DROP TABLE IF EXISTS `tahun_pemilihan`;

CREATE TABLE `tahun_pemilihan` (
  `id_tahun` varchar(15) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_jur` varchar(10) NOT NULL,
  `mulai` datetime NOT NULL,
  `selesai` datetime NOT NULL,
  PRIMARY KEY (`id_tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tahun_pemilihan` (`id_tahun`, `tahun`, `id_jur`, `mulai`, `selesai`) VALUES ('2014ka', '2014', 'ka', '2016-05-09 19:00:00', '2016-05-10 18:35:00');
INSERT INTO `tahun_pemilihan` (`id_tahun`, `tahun`, `id_jur`, `mulai`, `selesai`) VALUES ('2015mi', '2015', 'mi', '2016-05-10 07:32:00', '2016-05-11 16:30:00');
INSERT INTO `tahun_pemilihan` (`id_tahun`, `tahun`, `id_jur`, `mulai`, `selesai`) VALUES ('2016ka', '2016', 'ka', '2016-05-27 19:00:00', '2016-05-29 19:00:00');
INSERT INTO `tahun_pemilihan` (`id_tahun`, `tahun`, `id_jur`, `mulai`, `selesai`) VALUES ('2016mi', '2016', 'mi', '2016-05-27 19:00:00', '2016-06-22 19:00:00');
INSERT INTO `tahun_pemilihan` (`id_tahun`, `tahun`, `id_jur`, `mulai`, `selesai`) VALUES ('2016to', '2016', 'to', '2016-05-26 15:00:00', '2016-05-28 17:00:00');


#
# TABLE STRUCTURE FOR: tatausaha
#

DROP TABLE IF EXISTS `tatausaha`;

CREATE TABLE `tatausaha` (
  `id_tu` varchar(20) NOT NULL,
  `nama_tu` varchar(50) NOT NULL,
  `tmp_lahir` text NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `agama` varchar(15) NOT NULL,
  `pendidikan_akhir` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `status_pegawai` enum('PNS','GTT') NOT NULL,
  `status_anggota` int(2) NOT NULL,
  PRIMARY KEY (`id_tu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tatausaha` (`id_tu`, `nama_tu`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('TU100', 'Aning Tyas', 'BOJONEGORO', '23/04/1966', 'P', 'ISLAM', 'S1', 'Bojonegoro', 'PNS', '1');
INSERT INTO `tatausaha` (`id_tu`, `nama_tu`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('TU101', 'Nur Aisyah', 'BOJONEGORO', '23/04/1967', 'P', 'ISLAM', 'D3', 'Bojonegoro', 'PNS', '1');
INSERT INTO `tatausaha` (`id_tu`, `nama_tu`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('TU102', 'Rudi Setyawan', 'BOJONEGORO', '23/04/1968', 'L', 'ISLAM', 'D4', 'Bojonegoro', 'PNS', '1');
INSERT INTO `tatausaha` (`id_tu`, `nama_tu`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('TU103', 'indri', 'BOJONEGORO', '23/04/1969', 'P', 'ISLAM', 'S2', 'Bojonegoro', 'PNS', '1');
INSERT INTO `tatausaha` (`id_tu`, `nama_tu`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('TU104', 'ina', 'BOJONEGORO', '23/04/1970', 'P', 'ISLAM', 'S1', 'Bojonegoro', 'PNS', '1');
INSERT INTO `tatausaha` (`id_tu`, `nama_tu`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('TU105', 'Aning', 'BOJONEGORO', '23/04/1971', 'P', 'ISLAM', 'D3', 'Bojonegoro', 'PNS', '1');
INSERT INTO `tatausaha` (`id_tu`, `nama_tu`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('TU106', 'imam', 'BOJONEGORO', '23/04/1972', 'L', 'ISLAM', 'S1', 'Bojonegoro', 'PNS', '1');
INSERT INTO `tatausaha` (`id_tu`, `nama_tu`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `pendidikan_akhir`, `alamat`, `status_pegawai`, `status_anggota`) VALUES ('TU107', 'jhoni', 'BOJONEGORO', '23/04/1973', 'L', 'ISLAM', 'D3', 'Bojonegoro', 'PNS', '1');


