-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 12:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms-dprd`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `tanggal_kegiatan`, `created_at`, `updated_at`) VALUES
(4, '2025-02-13', '2025-02-12 19:08:53', '2025-02-12 19:08:53'),
(6, '2025-02-14', '2025-02-12 20:38:52', '2025-02-12 20:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `apa_siapa`
--

CREATE TABLE `apa_siapa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_kegiatan_mulai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_kegiatan_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apa_siapa`
--

INSERT INTO `apa_siapa` (`id`, `tanggal_kegiatan_mulai`, `created_at`, `updated_at`, `tanggal_kegiatan_selesai`) VALUES
(6, '2025-02-13', '2025-02-13 00:57:29', '2025-02-13 00:57:29', NULL),
(10, '2025-02-14', '2025-02-14 00:20:53', '2025-02-14 00:20:53', NULL),
(11, '2025-02-14', '2025-02-14 00:49:08', '2025-02-14 00:49:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apa_siapa_tamu`
--

CREATE TABLE `apa_siapa_tamu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `apa_siapa_id` bigint(20) UNSIGNED NOT NULL,
  `badan` varchar(255) NOT NULL,
  `agenda` text NOT NULL,
  `akd_terkait` varchar(255) DEFAULT NULL,
  `bagian_terkait` varchar(255) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_tamu_mulai` date DEFAULT NULL,
  `tanggal_tamu_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apa_siapa_tamu`
--

INSERT INTO `apa_siapa_tamu` (`id`, `apa_siapa_id`, `badan`, `agenda`, `akd_terkait`, `bagian_terkait`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`, `tanggal_tamu_mulai`, `tanggal_tamu_selesai`) VALUES
(8, 6, 'DPRD update', 'agendaaaaupdate', 'AKDdupdate', 'bagiandadaupdate', '16:57:00', '18:57:00', '2025-02-13 00:57:29', '2025-02-13 01:32:15', '2025-02-12', '2025-02-27'),
(9, 6, 'id 6 tambah', 'id 6 tambah', 'id 6 tambah', 'id 6 tambah', '15:43:00', '15:43:00', '2025-02-13 01:43:17', '2025-02-13 01:43:17', '2025-02-13', '2025-02-13'),
(11, 10, 'tamu', 'datang tamu', 'tamu dari AKD', 'tamu dari bagian', '14:20:00', NULL, '2025-02-14 00:20:53', '2025-02-14 00:20:53', '2025-02-14', NULL),
(12, 11, 'tamu', 'datang tamu', 'tamu dari AKD', 'tamu dari bagian', '14:48:00', '14:49:00', '2025-02-14 00:49:08', '2025-02-14 00:49:08', '2025-02-14', '2025-02-14'),
(13, 11, 'tamu 2', 'datang tamu 2', 'tamu dari AKD 2', 'tamu dari bagian 2', '16:51:00', '16:51:00', '2025-02-14 00:51:55', '2025-02-14 00:51:55', '2025-02-14', '2025-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `text` longtext DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tags_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `fotografer` varchar(255) DEFAULT NULL,
  `status_articles` varchar(255) DEFAULT NULL,
  `status_tampil` int(11) DEFAULT 0,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tags`)),
  `tgl_publish` date DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `super_article` longtext DEFAULT NULL,
  `tata_tertib` longtext DEFAULT NULL,
  `spesial_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `text`, `author`, `created_at`, `updated_at`, `tags_id`, `file`, `summary`, `caption`, `fotografer`, `status_articles`, `status_tampil`, `tags`, `tgl_publish`, `kategori`, `super_article`, `tata_tertib`, `spesial_kategori`) VALUES
(62, 'DPRD Kabupaten Bogor Menindaklanjuti Hasil Penetapan Calon Bupati dan Wakil Bupati Terpilih Periode 2025 – 2030', 'dprd-kabupaten-bogor-menindaklanjuti-hasil-penetapan-calon-bupati-dan-wakil-bupati-terpilih-periode-2025-2030', '<p>Cibinong – Dewan Perwakilan Rakyat Daerah (DPRD) Kabupaten Bogor resmi umumkan hasil penetapan pasangan calon Bupati dan Wakil Bupati Bogor terpilih periode 2025-2030 di ruang rapat Paripurna DPRD, Rabu, 5 Februari 2025.</p><p>Rudy Susmanto yang berpasangan dengan Ade Ruhandi atau yang lebih akrab disapa Jaro Ade berhasil meraup suara sebanyak 1.559.328 pada Pilkada 2024 mengungguli pesaingnya Bayu Syahjohan – Musyafur Rahman yang meraih suara sebanyak 599.453.</p><p>Pasca ditetapkannya Bupati dan Wakil Bupati Bogor terpilih oleh Komisi Pemilihan Umum (KPU) Kabupaten Bogor, DPRD Kabupaten Bogor segera menggelar rapat Paripurna untuk menindaklanjuti penetapan yang telah dilakukan oleh KPU Kabupaten Bogor sesuai ketentuan Perundang-undangan yang berlaku. Hal tersebut bertujuan untuk mengumumkan keputusan yang telah ditetapkan oleh KPU.</p><p>“Kami mengumumkan secara resmi hasil penetapan pasangan Calon Bupati dan Wakil Bupati Bogor terpilih untuk periode 2025-2030, sebagaimana ditetapkan oleh KPU Kabupaten Bogor,” kata Ketua DPRD Kabupaten Bogor, Sastra Winara. Sastra mengatakan, Rapat paripurna DPRD Kabupaten Bogor hari ini, merupakan bagian dari tahapan resmi pasca Pemilihan Kepala Daerah (Pilkada) serentak tahun 2024. Menurutnya dengan diumumkannya hasil penetapan ini, proses pemerintahan daerah memasuki tahap transisi menuju kepemimpinan baru.</p><p>“Pengumuman ini menandai langkah awal bagi kepemimpinan baru Kabupaten Bogor dalam merealisasikan Visi dan Misi yang telah disampaikan kepada masyarakat,” ujar Sastra. Adapun tahapan selanjutnya terkait pelantikan Bupati dan Wakil Bupati Bogor. “Setelah rapat paripurna ini, tahapan berikutnya adalah pengajuan nama Bupati dan Wakil Bupati Bogor terpilih ke Kementerian Dalam Negeri untuk kemudian dijadwalkan pelantikan oleh Gubernur Jawa Barat atas nama Presiden RI,” ungkap Sastra.</p><p>Dengan adanya kepemimpinan yang baru, Sastra berharap Kabupaten Bogor dapat terus berkembang dan memberikan pelayanan terbaik bagi masyarakat Kabupaten Bogor.</p>', 'SETWANBOGORKAB', '2025-02-24 19:15:23', '2025-02-25 02:25:17', NULL, NULL, NULL, 'Sastra mengatakan, Rapat paripurna DPRD Kabupaten Bogor hari ini, merupakan bagian dari tahapan resmi pasca Pemilihan Kepala Daerah (Pilkada) serentak tahun 2024.', 'Media Center Sekretariat DPRD Kabupaten Bogor', 'publish', 1, '[\"DPRD\",\"Kabupaten\",\"Bogor\",\"Menindaklanjuti\",\"Hasil\",\"Penetapan\",\"Calon\",\"Bupati\",\"Wakil\",\"Terpilih\",\"Periode\",\"2025\",\"2030\"]', '2025-02-25', 'warta', NULL, NULL, 'terkini'),
(72, 'Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda', 'bapemperda-dprd-kabupaten-bogor-gelar-rapat-penyusunan-naskah-akademik-raperda', '<p><strong>Cibinong </strong>– Badan Pembentukan Peraturan Daerah (BAPEMPERDA) DPRD Kabupaten Bogor telah menggelar rapat kerja bersama Alat Kelengkapan DPRD (AKD) Pengusul Rancangan Peraturan Daerah dan Tenaga Ahli di Ruang Rapat Mayor R. Oking Djaja Atmaja (Ruang Serbaguna) DPRD Kabupaten Bogor, Senin, 20/1/2025.</p><p>Adapun maksud serta tujuan diselenggarakannya rapat kerja tersebut dalam rangka persiapan penyusunan naskah akademik Rancangan Peraturan Daerah (RAPERDA) Inisiatif DPRD. RAPERDA inisiatif DPRD tersebut meliputi antara lain :</p><ol><li>Rancangan Peraturan Daerah (RAPERDA) tentang pelaksanaan penghormatan, perlindungan dan pemenuhan hak penyandang Disabilitas.</li><li>Rancangan Peraturan Daerah (RAPERDA) tentang Perlindungan dan Pengelolaan Sumber Daya Air, dan</li><li>Rancangan Peraturan Daerah (RAPERDA) tentang Perubahan atas Peraturan Daerah Kabupaten Bogor Nomor 2 Tahun 2014 tentang Pengelolaan Sampah.</li></ol><p>Dalam rapat tersebut disepakati agar Tenaga Ahli segera menyusun naskah akademik masing-masing Raperda, untuk selanjutnya akan menjadi dasar penyusunan Raperda.</p>', 'SETWANBOGORKAB', '2025-02-24 19:39:46', '2025-02-25 02:24:10', NULL, NULL, NULL, 'Cibinong – Badan Pembentukan Peraturan Daerah (BAPEMPERDA) DPRD Kabupaten Bogor telah menggelar rapat kerja bersama Alat Kelengkapan DPRD (AKD) Pengusul Rancangan Peraturan Daerah dan Tenaga Ahli', 'Media Center Sekretariat DPRD Kabupaten Bogor', 'validasi', 0, '[\"Bapemperda\",\"DPRD\",\"Kabupaten\",\"Bogor\",\"Gelar\",\"Rapat\",\"Penyusunan\",\"Naskah\",\"Akademik\",\"Raperda\"]', '2025-02-25', 'warta', NULL, NULL, 'terkini'),
(74, 'RESES DPRD Kabupaten Bogor Masa Sidang I Tahun 2024-2025 Daerah Pemilihan BOGOR VI', 'reses-dprd-kabupaten-bogor-masa-sidang-i-tahun-2024-2025-daerah-pemilihan-bogor-vi', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\"><strong>Cibinong</strong>- Dalam rangka memenuhi salah satu tugas dan kewajiban sesuai dengan Peraturan Pemerintah Nomor 12 Tahun 2018, DPRD Kabupaten Bogor kembali melaksanakan Reses Masa Sidang I Tahun 2024-2025. Sesuai ketentuan, DPRD melaksanakan reses untuk menyerap aspirasi masyarakat di masing-masing daerah pemilihan anggota DPRD.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Untuk kegiatan Reses di daerah Pemilihan Bogor VI dilaksanakan pada tanggal 2-4 Desember 2024, dengan rincian sebagai berikut:</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">1. Kecamatan Gunung Sindur</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari senin, 2 Desember 2024 di Aula Kantor Kecamatan Gunung Sindur. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor VI, Unsur Forkopimcam, Kepala Desa, BPD, Kepala UPT, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: Pembuatan irigasi di Desa Jampang, dan Desa Cibinong, Betonisasi Desa Jampang, Desa Pabuaran (lanjutan jalan Kabupaten), dan Desa Rawakalong (lanjutan jalan cendana pamulang), Penerangan jalan umum di Desa Gunungsindur, dan Desa Curug, Peningkatan jalanan Kabupaten di Desa Pengasinan, dan Desa Cibadung (lanjutan jalan Kabupaten), Pelebaran jalan di Desa Padurenan, Jalan di Desa Cidokom menjadi jalan Kabupaten, Permasalahan kemacetan di perempatan pasar Parung, jalur tambang yang belum terealisasi untuk kepentingan masyarakat Desa Gunung Sindur, Mengkaji kembali PPDB sekolah kuota zonasi, Teknis pelaksanaan program makan siang gratis di sekolah, Tunjangan tambahan dari Pemerintah Kabupaten Bogor untuk Kepala Sekolah Pelatihan dan permodalan untuk wirausaha baru, Usulan pelatihan pada Tingkat Kecamatan, Pencemaran sumur warga Desa Pengasinan</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">2. Kecamatan Ciseeng</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari Selasa, 3 Desember 2024 di Aula Kecamatan Ciseeng. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor VI, Unsur Forkopimcam, Kepala Desa, BPD, Kepala UPT, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: Perbaikan pada ruang kelas dan sekolah di SDN Kuripan 2, SDN Ciseeng 2, SDN Parigi Mekar, dan SDN Babakan, Memperbaiki sarana kesehatan di Puskesmas Ciseeng dan Puskesmas Cibeuteung Udik yaitu Puskesmas yang belum representatif, Puskesmas non perawatan belum buka 24 jam, dan jarak tempuh masyarakat ke sarana pelayanan kesehatan cukup jauh. Masih adanya dampak dari Covid yaitu penambahan jumlah warga miskin, sehingga bertambahnya Rumah Tidak Layak Huni (RTLH) 735 rumah, tersebar di 10 Desa, Kecamatan Ciseeeng sebagai kawasan minapolitan, Kekurangan indukan ikan yang berkualitas, Jaringan irigasi yang tidak optimal karena ditumbuhi gulma dan sampah yang menyebabkan aliran air tidak lancer, Kelompok tani di Kecamatan Ciseeng kesulitan dalam mendapatkan subsidi pupuk urea dan NPK, dikarenakan dalam aturan hanya terdapat Sembilan macam jenis tanaman yang dibolehkan menggunakan pupuk bersubsidi, Potensi bencana yang perlu adanya penanggulangan, Belum tersedianya kantor Polisi Sektor (POLSEK) Ciseeng, Belum tersedianya kantor Koramil Ciseeng.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">3. Kecamatan Parung</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari Rabu, 4 Desember 2024 di Aula Kecamatan Parung. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor VI, Unsur Forkopimcam, Kepala Desa/Lurah, BPD, Kepala UPT, LPM, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: Banjir diarea Pohon Jubleg dan Simpang Parung, pembuatan resapan air sekitar lahan warteg Desa Parung, dibuat drainase sepanjang jalan H. Mawi Desa Waru, pembelian lahan bagi saluran pembuangan di atas tanah milik Bambang, Banjir Sungai Rengas, agar dibuat turap, dan pembuatan area resapan baru untuk mengurangi air ke Sungai, banjir di jalan Bojong Sempu-Iwul Kp. Iwul RT 04/RW 04, agar membuat resapan air dan drainase pembuangan yang menuju ke badan air (Sungai) di sekitar Lokasi, Kurangnya fasilitas atau sarana kesehatan khuisusnya ruang rawat inap dan unit gawat darurat (UGD), Perlu ditambahkan sekolah Tingkat pertama (SMP) di Desa Cogreg</span></p>', 'SETWANBOGORKAB', '2025-02-24 19:44:54', '2025-02-25 02:23:03', NULL, NULL, NULL, 'Dalam rangka memenuhi salah satu tugas dan kewajiban sesuai dengan Peraturan Pemerintah Nomor 12 Tahun 2018, DPRD Kabupaten Bogor kembali melaksanakan Reses Masa Sidang I Tahun 2024-2025.', 'Media Center Sekretariat DPRD Kabupaten Bogor', 'publish', 1, '[\"RESES\",\"DPRD\",\"Kabupaten\",\"Bogor\",\"Masa\",\"Sidang\",\"Tahun\",\"2024-2025\",\"Daerah\",\"Pemilihan\",\"BOGOR\",\"VI\"]', '2025-02-25', 'warta', NULL, NULL, 'terpopuler'),
(75, 'RESES DPRD Kabupaten Bogor Masa Sidang I Tahun 2024-2025 Daerah Pemilihan BOGOR V', 'reses-dprd-kabupaten-bogor-masa-sidang-i-tahun-2024-2025-daerah-pemilihan-bogor-v', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\"><strong>Cibinong</strong>- Dalam rangka memenuhi salah satu tugas dan kewajiban sesuai dengan Peraturan Pemerintah Nomor 12 Tahun 2018, DPRD Kabupaten Bogor kembali melaksanakan Reses Masa Sidang I Tahun 2024-2025. Sesuai ketentuan, DPRD melaksanakan reses untuk menyerap aspirasi masyarakat di masing-masing daerah pemilihan anggota DPRD.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Untuk kegiatan Reses di daerah Pemilihan Bogor V dilaksanakan pada tanggal 2-4 Desember 2024, dengan rincian sebagai berikut:</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">1. Kecamatan Cigudeg</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari senin, 2 Desember 2024 di Aula Kantor Kecamatan Cigudeg. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor V, Unsur Forkopimcam, Kepala Desa, BPD, Kepala UPT, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: Pendidikan, Kesehatan, Infrastruktur, Perekonomian, Peningkatan Kwalitas, Kwantitas Dan Aksesibilitas Bidang Pendidikan Dan Kesehatan, Peningkatan Pembangunan Infrastruktur Yang Terintegrasi Untuk Kemudahan Pergerakan Orang, Barang Dan Jasa, Peningkatan Produktifitas Industri Kecil dan Menengah, Agrowisata, Pertanian serta Pengembangan Produk Unggulan Lainnya dalam Mendongkrak Perekonomian Masyarakat, Peningkatan Pelayanan Masyarakat Baik Dibidang Keamanan dan Ketertiban, Penanganan Bencana Alam Dan Urusan Lainnya Sesuai Dengan Pelimpahan Kewenangan</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">2. Kecamatan Leuwisadeng</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari Selasa, 3 Desember 2024 di Aula Kecamatan Leuwisadeng. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor V, Unsur Forkopimcam, Kepala Desa, BPD, Kepala UPT, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: Perluasan Lahan Puskesmas Sadeng Pasar, Permasalahan Pariwisata, Permasalahan Pertanian, Permasalahan UMKM, Bencana Alam, Pembangunan Jalan, Pembangunan TPT,</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">3. Kecamatan Leuwiliang</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari Rabu, 4 Desember 2024 di Aula Kecamatan Leuwiliang. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor V, Unsur Forkopimcam, Kepala Desa/Lurah, BPD, Kepala UPT, LPM, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: Infrastruktur dan Aksesibilitas, Pengelolaan Sumber Daya Alam, Sosial dan Ekonomi, Bencana Alam, Tata Kelola Pemerintahan, Isu Strategis untuk Pengembangan,</span></p>', 'SETWANBOGORKAB', '2025-02-24 19:46:40', '2025-02-24 21:51:07', NULL, NULL, NULL, 'alam rangka memenuhi salah satu tugas dan kewajiban sesuai dengan Peraturan Pemerintah Nomor 12 Tahun 2018, DPRD Kabupaten Bogor kembali melaksanakan Reses Masa Sidang I Tahun 2024-2025.', 'Media Center Sekretariat DPRD Kabupaten Bogor', 'publish', 1, '[\"RESES\",\"DPRD\",\"Kabupaten\",\"Bogor\",\"Masa\",\"Sidang\",\"Tahun\",\"2024-2025\",\"Daerah\",\"Pemilihan\",\"BOGOR\",\"V\"]', '2025-02-25', 'warta', NULL, NULL, 'terpopuler'),
(77, 'RESES DPRD Kabupaten Bogor Masa Sidang I Tahun 2024-2025 Daerah Pemilihan BOGOR III', 'reses-dprd-kabupaten-bogor-masa-sidang-i-tahun-2024-2025-daerah-pemilihan-bogor-iii', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\"><strong>Cibinong</strong>- Dalam rangka memenuhi salah satu tugas dan kewajiban sesuai dengan Peraturan Pemerintah Nomor 12 Tahun 2018, DPRD Kabupaten Bogor kembali melaksanakan Reses Masa Sidang I Tahun 2024-2025. Sesuai ketentuan, DPRD melaksanakan reses untuk menyerap aspirasi masyarakat di masing-masing daerah pemilihan anggota DPRD.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Untuk kegiatan Reses di daerah Pemilihan Bogor III dilaksanakan pada tanggal 2-4 Desember 2024, dengan rincian sebagai berikut:</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">1. Kecamatan Ciomas</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari senin, 2 Desember 2024 di Aula Kantor Kecamatan Ciomas. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor III, Unsur Forkopimcam, Kepala Desa, BPD, Kepala UPT, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: pendidikan, infrastruktur, bidang Kesehatan, percepatan penurunan stunting, permasalahan sampah.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">2. Kecamatan Cigombong</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari Selasa, 3 Desember 2024 di Aula Masjid Al-Azhim Kecamatan Cigombong. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor III, Unsur Forkopimcam, Kepala Desa, BPD, Kepala UPT, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: pendidikan, infrastruktur, bidang Kesehatan, percepatan penurunan stunting, permasalahan sampah.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">3. Kecamatan Caringin</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari Rabu, 4 Desember 2024 di Aula Kecamatan Caringin. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor III, Unsur Forkopimcam, Kepala Desa/Lurah, BPD, Kepala UPT, LPM, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: pendidikan, infrastruktur, bidang Kesehatan, percepatan penurunan stunting, permasalahan sampah.</span></p>', 'SETWANBOGORKAB', '2025-02-25 02:33:57', '2025-02-25 02:38:16', NULL, NULL, NULL, 'RESES DPRD Kabupaten Bogor Masa Sidang I Tahun 2024-2025 Daerah Pemilihan BOGOR III', 'Media Center Sekretariat DPRD Kabupaten Bogor', 'publish', 1, '[\"RESES\",\"DPRD\",\"Kabupaten\",\"Bogor\",\"Masa\",\"Sidang\",\"I\",\"Tahun\",\"2024-2025\",\"Daerah\",\"Pemilihan\",\"BOGOR\",\"III\"]', '2025-02-25', 'warta', NULL, NULL, 'terkini'),
(78, 'RESES DPRD Kabupaten Bogor Masa Sidang I Tahun 2024-2025 Daerah Pemilihan BOGOR II', 'reses-dprd-kabupaten-bogor-masa-sidang-i-tahun-2024-2025-daerah-pemilihan-bogor-ii', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\"><strong>Cibinong</strong>- Dalam rangka memenuhi salah satu tugas dan kewajiban sesuai dengan Peraturan Pemerintah Nomor 12 Tahun 2018, DPRD Kabupaten Bogor kembali melaksanakan Reses Masa Sidang I Tahun 2024-2025. Sesuai ketentuan, DPRD melaksanakan reses untuk menyerap aspirasi masyarakat di masing-masing daerah pemilihan anggota DPRD.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Untuk kegiatan Reses di daerah Pemilihan Bogor II dilaksanakan pada tanggal 2-4 Desember 2024, dengan rincian sebagai berikut:</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">1. Kecamatan Klapanunggal</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari senin, 2 Desember 2024 di Aula Kantor PGRI Kecamatan Klapanunggal. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor II, Unsur Forkopimcam, Kepala Desa, BPD, Kepala UPT, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: pendidikan, infrastruktur, bidang Kesehatan, percepatan penurunan stunting, permasalahan sampah, permasalahan kemacetan di simpang coco garden-grand kahuripan</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">2. Kecamatan Cileungsi</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari Selasa, 3 Desember 2024 di Kecamatan Cileungsi. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor II, Unsur Forkopimcam, Kepala Desa, BPD, Kepala UPT, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: kemacetan, sampah liar, banjir, Pelebaran Box Cover Crossing Jalan Provinsi, Pencemaran Lingkungan, stunting, sarana pendidikan, Relokasi Puskesmas, Relokasi Kantor Desa Gandoang, GEDUNG BLK, Penataan Fly Over, Pembangunan Taman Tematik sarana kesehatan,</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">3. Kecamatan Cariu</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari Rabu, 4 Desember 2024 di Aula Kecamatan Cariu. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor II, Unsur Forkopimcam, Kepala Desa/Lurah, BPD, Kepala UPT, LPM, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: Kependudukan, Warga terdampak bendungan masih belum ada kepastian mengenai pengalihan mata pencaharian warga, Relokasi warga terdampak belum terkoordinir secara maksimal, Belum adanya Fisibilitas study dari dampak bendungan, penanganan stunting</span><br>&nbsp;</p>', 'SETWANBOGORKAB', '2025-02-25 02:35:59', '2025-02-25 02:38:15', NULL, NULL, NULL, 'Cibinong- Dalam rangka memenuhi salah satu tugas dan kewajiban sesuai dengan Peraturan Pemerintah Nomor 12 Tahun 2018, DPRD Kabupaten Bogor kembali melaksanakan Reses Masa Sidang I Tahun 2024-2025.', 'Media Center Sekretariat DPRD Kabupaten Bogor', 'publish', 1, '[\"RESES\",\"DPRD\",\"Kabupaten\",\"Bogor\",\"Masa\",\"Sidang\",\"I\",\"Tahun\",\"2024-2025\",\"Daerah\",\"Pemilihan\",\"BOGOR\",\"II\"]', '2025-02-23', 'warta', NULL, NULL, 'terpopuler'),
(79, 'RESES DPRD Kabupaten Bogor Masa Sidang I Tahun 2024-2025 Daerah Pemilihan BOGOR I', 'reses-dprd-kabupaten-bogor-masa-sidang-i-tahun-2024-2025-daerah-pemilihan-bogor-i', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\"><strong>Cibinong</strong>- Dalam rangka memenuhi salah satu tugas dan kewajiban sesuai dengan Peraturan Pemerintah Nomor 12 Tahun 2018, DPRD Kabupaten Bogor kembali melaksanakan Reses Masa Sidang I Tahun 2024-2025. Sesuai ketentuan, DPRD melaksanakan reses untuk menyerap aspirasi masyarakat di masing-masing daerah pemilihaan anggota DPRD.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Untuk kegiatan Reses di daerah Pemilihan Bogor I dilaksanakan pada tanggal 2-4 Desember 2024, dengan rincian sebagai berikut:</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">1. Kecamatan Citeureup</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari senin, 2 Desember 2024 di Aula RM Saung Kang Otong, Desa Tangkil Kecamatan Citeureup. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor I, Unsur Forkopimcam, Kepala Desa/Lurah, BPD, Kepala UPT, LPM, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: industri dan lingkungan, infrastruktur, pertumbuhan penduduk dan urbanisasi, sarana pendidikan, sarana kesehatan, program untuk mengatasi banjir, pengembangan ekonomi lokal dan ketenagakerjaan, tata ruang dan pengendalian pembangunan, Kerjasama dan Sinergi antara Stakeholder dengan masyarakat.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">2. Kecamatan Babakan Madang</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari Selasa, 3 Desember 2024 di Kecamatan babakan Madang. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor II, Unsur Forkopimcam, Kepala Desa, BPD, Kepala UPT, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: potensi wilayah, infrastruktur, sarana pendidikan, sarana kesehatan, program untuk mengatasi bencana, penyerapan tenaga kerja, tata ruang dan pengendalian pembangunan, Pengelolaan dan Pembuangan Sampah, Kerjasama dan Sinergi antara Stakeholder dengan masyarakat.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">3. Kecamatan Cibinong</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Dilaksanakan pada hari Rabu, 4 Desember 2024 di Rumah Sahabat Keluarga Perum Visar Pratama Kelurahan Kecamatan Cibinong. Adapun kegiatan tersebut diikuti oleh Anggota DPRD Kabupaten Bogor Dapil Bogor I, Unsur Forkopimcam, Kepala Desa/Lurah, BPD, Kepala UPT, LPM, Pengurus parpol tingkat Kecamatan, Tokoh agama, Tokoh masyarakat, Tokoh pemuda, tokoh perempuan dan unsur masyarakat lainnya. beberapa isu strategis yang menjadi topik dalam kegiatan reses tersebut adalah: Pertumbuhan Kota dan Urbanisasi, infrastruktur, Kemacetan Lalu Lintas dan Transportasi, Bencana Banjir, Penanganan Sampah, sarana pendidikan, sarana kesehatan, Pengembangan Ekonomi dan Bisnis, Kerjasama dan Sinergi antara Stakeholder dengan masyarakat.</span></p>', 'SETWANBOGORKAB', '2025-02-25 02:40:24', '2025-02-25 02:41:57', NULL, NULL, NULL, 'Cibinong- Dalam rangka memenuhi salah satu tugas dan kewajiban sesuai dengan Peraturan Pemerintah Nomor 12 Tahun 2018, DPRD Kabupaten Bogor kembali melaksanakan Reses Masa Sidang I Tahun 2024-2025.', 'Media Center Sekretariat DPRD Kabupaten Bogor', 'publish', 0, '[\"RESES\",\"DPRD\",\"Kabupaten\",\"Bogor\",\"Masa\",\"Sidang\",\"I\",\"Tahun\",\"2024-2025\",\"Daerah\",\"Pemilihan\",\"BOGOR\"]', '2025-02-21', 'warta', NULL, NULL, 'terkini'),
(80, 'Rapat Paripurna DPRD Kabupaten Bogor Penetapan Persetujuan bersama DPRD dengan Bupati terhadap Raperda APBD Tahun Anggaran 2025', 'rapat-paripurna-dprd-kabupaten-bogor-penetapan-persetujuan-bersama-dprd-dengan-bupati-terhadap-raperda-apbd-tahun-anggaran-2025', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\"><strong>Cibinong</strong>-DPRD Kabupaten Bogor melaksanakan Rapat Paripurna Penetapan Persetujuan bersama DPRD dengan Bupati Bogor terhadap Raperda APBD Tahun Anggaran 2025 pada hari Sabtu, 30 November 2024. Rapat Paripurna dipimpin oleh Ketua DPRD Kabupaten Bogor, Sastra Winara didampingi para Wakil Ketua DPRD serta Pj Bupati Bogor. Rapat Paripurna juga dihadiri Anggota DPRD, unsur Forkopimda, Sekretaris Daerah, Para Kepala Perangkat Daerah, Direksi BUMD, serta undangan lainnya.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">Rapat Paripurna ini terselenggara setelah DPRD bersama Pemerintah Kabupaten Bogor telah melaksanakan rangkaian pembahsan Raperda APBD 2025 melalui Rapat-rapat Komisi dan Badan Anggaran.</span><br><span style=\"background-color:rgb(255,255,255);color:rgb(145,145,145);\">DPRD Kabupaten Bogor berharap dengan disetujuinya APBD 2025 ini dapat berkontribusi positif terhadap pembangunan kabupaten Bogor serta mensejahterakan masyarakat Kabupaten Bogor. DPRD juga berharap dalam pelaksanaan APBD Tahun 2025 nanti Pemerintah Kabupaten Bogor dapat melaksanakannya sesuai ketentuan peraturan perundang-undangan.</span></p>', 'SETWANBOGORKAB', '2025-02-25 02:41:38', '2025-02-25 02:41:46', NULL, NULL, NULL, 'Cibinong-DPRD Kabupaten Bogor melaksanakan Rapat Paripurna Penetapan Persetujuan bersama DPRD dengan Bupati Bogor terhadap Raperda APBD Tahun Anggaran 2025 pada hari Sabtu, 30 November 2024.', 'Media Center Sekretariat DPRD Kabupaten Bogor', 'publish', 0, '[\"Rapat\",\"Paripurna\",\"DPRD\",\"Kabupaten\",\"Bogor\",\"Penetapan\",\"Persetujuan\",\"bersama\",\"dengan\",\"Bupati\",\"terhadap\",\"Raperda\",\"APBD\",\"Tahun\",\"Anggaran\",\"2025\"]', '2025-02-24', 'warta', NULL, NULL, 'terkini');

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

CREATE TABLE `article_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `articles_id` bigint(20) UNSIGNED NOT NULL,
  `tags_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:44:{i:0;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:18:\"create permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:1;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:16:\"read permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:2;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:18:\"update permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:3;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:18:\"delete permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:4;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:12:\"create users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:5;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:10:\"read users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:6;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:12:\"update users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:7;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:12:\"delete users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:8;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:12:\"create roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:9;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:10:\"read roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:10;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:12:\"update roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:11;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:12:\"delete roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:12;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:15:\"create articles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:8;}}i:13;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:13:\"read articles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:8;}}i:14;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:15:\"update articles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:8;}}i:15;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:15:\"delete articles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:8;}}i:16;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:11:\"create tags\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:17;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:9:\"read tags\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:18;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:11:\"update tags\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:19;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:11:\"delete tags\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:20;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:13:\"create agenda\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:21;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:11:\"read agenda\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:22;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:13:\"update agenda\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:23;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:13:\"delete agenda\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:24;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:15:\"create kegiatan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:25;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:13:\"read kegiatan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:26;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:15:\"update kegiatan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:27;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:15:\"delete kegiatan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:28;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:13:\"create profil\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:29;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:11:\"read profil\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:30;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:16:\"create apa siapa\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:31;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:14:\"read apa siapa\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:32;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:16:\"update apa siapa\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:33;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:16:\"delete apa siapa\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:34;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:13:\"update profil\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:35;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:13:\"delete profil\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:36;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:13:\"create galeri\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:37;a:4:{s:1:\"a\";i:89;s:1:\"b\";s:11:\"read galeri\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:38;a:4:{s:1:\"a\";i:90;s:1:\"b\";s:13:\"update galeri\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:39;a:4:{s:1:\"a\";i:91;s:1:\"b\";s:13:\"delete galeri\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:40;a:4:{s:1:\"a\";i:92;s:1:\"b\";s:10:\"create akd\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:41;a:4:{s:1:\"a\";i:93;s:1:\"b\";s:8:\"read akd\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:42;a:4:{s:1:\"a\";i:94;s:1:\"b\";s:10:\"update akd\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}i:43;a:4:{s:1:\"a\";i:95;s:1:\"b\";s:10:\"delete akd\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:8;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"superadmin2\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:8;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1740562207);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dapil`
--

CREATE TABLE `dapil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `desa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dapil`
--

INSERT INTO `dapil` (`id`, `nama`, `kecamatan_id`, `desa_id`, `created_at`, `updated_at`) VALUES
(1, 'Dapil 1', NULL, NULL, '2025-02-23 02:43:59', '2025-02-23 02:43:59'),
(2, 'Dapil 2', NULL, NULL, '2025-02-23 02:55:16', '2025-02-23 02:55:16'),
(3, 'Dapil 3', NULL, NULL, '2025-02-23 20:05:20', '2025-02-23 20:05:20'),
(4, 'Dapil 4', NULL, NULL, '2025-02-23 20:14:23', '2025-02-23 20:14:23'),
(5, 'Dapil 5', NULL, NULL, '2025-02-23 20:21:08', '2025-02-23 20:21:08'),
(6, 'Dapil 6', NULL, NULL, '2025-02-23 20:26:46', '2025-02-23 20:26:46'),
(7, 'Dapil 100', NULL, NULL, '2025-02-23 20:45:49', '2025-02-23 20:45:49'),
(8, 'Dapil 11', NULL, NULL, '2025-02-23 20:47:01', '2025-02-23 20:47:01'),
(9, 'Dapil 12', NULL, NULL, '2025-02-23 20:48:33', '2025-02-23 20:48:33'),
(10, 'Dapil 13 UPDATE', NULL, NULL, '2025-02-23 20:51:41', '2025-02-23 20:58:23'),
(11, 'Dapil 14', NULL, NULL, '2025-02-23 21:01:51', '2025-02-23 21:01:51'),
(12, 'Dapil 15', NULL, NULL, '2025-02-23 21:05:37', '2025-02-23 21:05:37'),
(13, 'Dapil 101', NULL, NULL, '2025-02-23 21:33:33', '2025-02-23 21:33:33'),
(14, 'dapil ciomas', NULL, NULL, '2025-02-23 21:34:18', '2025-02-23 21:34:18'),
(15, 'beda', NULL, NULL, '2025-02-23 21:53:32', '2025-02-23 21:53:32'),
(16, 'sama', NULL, NULL, '2025-02-23 21:53:51', '2025-02-23 21:53:51'),
(17, 'sama 2', NULL, NULL, '2025-02-23 21:54:06', '2025-02-23 21:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `dapil_desa`
--

CREATE TABLE `dapil_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dapil_id` bigint(20) UNSIGNED NOT NULL,
  `desa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dapil_desa`
--

INSERT INTO `dapil_desa` (`id`, `dapil_id`, `desa_id`, `created_at`, `updated_at`) VALUES
(1, 1, 160, NULL, NULL),
(2, 2, 374, NULL, NULL),
(3, 2, 178, NULL, NULL),
(4, 3, 374, NULL, NULL),
(5, 4, 140, NULL, NULL),
(6, 5, 43, NULL, NULL),
(7, 6, 140, NULL, NULL),
(8, 6, 101, NULL, NULL),
(9, 7, 79, NULL, NULL),
(10, 7, 102, NULL, NULL),
(11, 8, 90, NULL, NULL),
(12, 8, 107, NULL, NULL),
(13, 9, 64, NULL, NULL),
(14, 9, 127, NULL, NULL),
(18, 10, 276, NULL, NULL),
(19, 10, 339, NULL, NULL),
(20, 11, 160, NULL, NULL),
(21, 11, 140, NULL, NULL),
(24, 12, 160, NULL, NULL),
(25, 12, 166, NULL, NULL),
(26, 13, 322, NULL, NULL),
(27, 13, 160, NULL, NULL),
(28, 14, 322, NULL, NULL),
(29, 14, 82, NULL, NULL),
(30, 15, 90, NULL, NULL),
(31, 15, 64, NULL, NULL),
(32, 16, 79, NULL, NULL),
(33, 17, 79, NULL, NULL),
(34, 17, 102, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dapil_kecamatan`
--

CREATE TABLE `dapil_kecamatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dapil_id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dapil_kecamatan`
--

INSERT INTO `dapil_kecamatan` (`id`, `dapil_id`, `kecamatan_id`, `created_at`, `updated_at`) VALUES
(1, 1, 18, NULL, NULL),
(2, 2, 18, NULL, NULL),
(3, 2, 11, NULL, NULL),
(4, 3, 18, NULL, NULL),
(5, 4, 18, NULL, NULL),
(6, 5, 7, NULL, NULL),
(7, 5, 6, NULL, NULL),
(8, 5, 2, NULL, NULL),
(9, 6, 18, NULL, NULL),
(10, 6, 17, NULL, NULL),
(11, 7, 1, NULL, NULL),
(12, 8, 2, NULL, NULL),
(13, 9, 3, NULL, NULL),
(14, 9, 4, NULL, NULL),
(15, 10, 8, NULL, NULL),
(16, 10, 1, NULL, NULL),
(17, 11, 18, NULL, NULL),
(20, 12, 18, NULL, NULL),
(21, 12, 18, NULL, NULL),
(22, 13, 13, NULL, NULL),
(23, 13, 18, NULL, NULL),
(24, 14, 13, NULL, NULL),
(25, 14, 13, NULL, NULL),
(26, 15, 2, NULL, NULL),
(27, 15, 3, NULL, NULL),
(28, 16, 1, NULL, NULL),
(29, 17, 1, NULL, NULL),
(30, 17, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fraksi`
--

CREATE TABLE `fraksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tags`)),
  `tanggal_unggah` date DEFAULT NULL,
  `tanggal_publish_mulai` date DEFAULT NULL,
  `tanggal_publis_selesai` date DEFAULT NULL,
  `status_file` int(11) DEFAULT NULL,
  `status_tampil` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `slug`, `deskripsi`, `url`, `tags`, `tanggal_unggah`, `tanggal_publish_mulai`, `tanggal_publis_selesai`, `status_file`, `status_tampil`, `created_at`, `updated_at`, `file`, `status_foto`) VALUES
(3, 'foto 2 update', 'foto-2-update', '<p><span style=\"color:#ce9178;\">updatestatus_publishstatus_publish</span></p>', NULL, '[\"foto\",\"2\",\"update\"]', '2025-02-19', '2025-02-19', '2025-02-21', 1, 1, '2025-02-19 05:16:35', '2025-02-25 03:08:44', NULL, 'publish'),
(4, 'test galeri make foto baru', 'test-galeri-make-foto-baru', '<p>test galeri make foto baru test galeri make foto baru&nbsp;</p>', NULL, '[\"test\",\"galeri\",\"make\",\"foto\",\"baru\"]', '2025-02-19', '2025-02-22', '2025-02-23', 1, 1, '2025-02-19 08:34:38', '2025-02-25 03:35:44', NULL, 'publish'),
(5, 'test galeri make foto baru perlu validasi', 'test-galeri-make-foto-baru-perlu-validasi', '<p>test galeri make foto baru perlu validasi test galeri make foto baru perlu validasi test galeri make foto baru perlu validasi</p>', NULL, '[\"test\",\"galeri\",\"make\",\"foto\",\"baru\",\"perlu\",\"validasi\"]', '2025-02-19', '2025-02-20', '2025-02-22', 1, 1, '2025-02-19 08:42:48', '2025-02-25 03:08:41', NULL, 'publish'),
(7, 'video youtube update 2', 'video-youtube-update-2', '<p>UPDATE 2 video youtube video youtube video youtube</p>', 'https://www.youtube.com/watch?v=vfg6NF8NKp8&ab_channel=DISKOMINFOKAB.BOGOR', '[\"video\",\"youtube\",\"update\",\"2\"]', '2025-02-20', '2025-02-20', '2025-02-21', 2, 1, '2025-02-19 16:40:08', '2025-02-25 03:52:36', NULL, 'publish'),
(8, 'video baruuuuuu', 'video-baruuuuuu', '<p>video baruuuuuu video baruuuuuu video baruuuuuu</p>', 'https://www.youtube.com/watch?v=M_xqXBsgCDw&list=RDoS_sd5aFX_A&index=12&ab_channel=TheChangcuters%7CWowmaTV', '[\"video\",\"baruuuuuu\"]', '2025-02-20', '2025-02-20', '2025-02-21', 2, 1, '2025-02-19 16:49:58', '2025-02-25 03:58:30', NULL, 'publish'),
(9, 'Ini Dia Deretan Keistimewaan Kabupaten Bogor yang Wajib Kamu Tahu! #InJabar5', 'ini-dia-deretan-keistimewaan-kabupaten-bogor-yang-wajib-kamu-tahu-injabar5', '<p><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\">Si Alan beli batagor buat si Ayu, Kenalan sama Kabupaten Bogor yuk! Ini dia deretan keistimewaan Kabupaten Bogor yang wajib kamu tahu, Semuanya terangkum dalam InJabar 5! Lima yang yang perlu kamu tahu. ____________________________________________________________________________________________ Follow us on social media INJABAR UNPAD : Instagram : </span><a href=\"https://www.youtube.com/redirect?event=video_description&amp;redir_token=QUFFLUhqa1FHUGVFaEtaMks1eGJsN2ZoN2w0bzZSV3kzUXxBQ3Jtc0tuUVRnbl96UEtUb2ROMUdhMk44a0s5SjZ6ZWhIdlJEMEhZWTkwSHZsMTZJdGk2eXRvUTNONV9INUFweG1XSk1kdWRxaTAzSVBtbjhSN2xoenJfX2tQU2RlMWs4RnkzU0R2akNzbWtjTUpuZE9vQjMzMA&amp;q=https%3A%2F%2Fwww.instagram.com%2Finjabarunpad%2F%3Fhl%3Den&amp;v=jQI6V0nZBt4\"><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(6,95,212);\">https://www.instagram.com/injabarunpa...</span></a></p><p style=\"margin-left:0px;\">&nbsp;</p><p><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\">&nbsp;Facebook :&nbsp;</span><a href=\"https://www.youtube.com/redirect?event=video_description&amp;redir_token=QUFFLUhqa0p0QVF2aTZCMHZQZEI4MUJLU1VYZ0dLYVh6d3xBQ3Jtc0trZDNJU2Y3S0hJRXQwclVBclF6X2RIRnY0emZUVWM3U0x4aUxmRTlfLXJRWElIZVFvS2xOaXR3M05lMHJpdFJmb1lXZ1Z1UjZ4U25fXzNjWnBPU2VWVmNiN0FCci04bFRzV0VDMmpuSGprTzFVTHZpVQ&amp;q=https%3A%2F%2Fwww.facebook.com%2Finjabarunpad%2F&amp;v=jQI6V0nZBt4\"><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\"> </span><span style=\"background-color:transparent;color:rgb(19,19,19);\"><img src=\"https://www.gstatic.com/youtube/img/watch/social_media/facebook_1x.png\" alt=\"\" width=\"14\" height=\"14\"></span><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\"> /&nbsp;injabarunpad&nbsp;&nbsp;</span></a></p><p style=\"margin-left:0px;\">&nbsp;</p><p><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\">&nbsp;Twitter :&nbsp;</span><a href=\"https://www.youtube.com/redirect?event=video_description&amp;redir_token=QUFFLUhqbURWaDhMNjR2dmUxWEJNeTgwYkZnU28ydHFIQXxBQ3Jtc0ttcktJWjAxaGZtc2tzUVU0dGdiYVo4NjQtQ3NBZWdpMW5ReFo0TzdOZ1NZbzFDWmMxMWhNbDVFc3RNRmNSQ3RHLVBKcXFIdGwxZkptUkdSZnJwNVVmX3VHTE5ybGhDMHVXMTJFeWJSX2hYLXk1dmM5WQ&amp;q=https%3A%2F%2Ftwitter.com%2Finjabarunpad&amp;v=jQI6V0nZBt4\"><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\"> </span><span style=\"background-color:transparent;color:rgb(19,19,19);\"><img src=\"https://www.gstatic.com/youtube/img/watch/social_media/twitter_1x_v2.png\" alt=\"\" width=\"14\" height=\"14\"></span><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\"> /&nbsp;injabarunpad&nbsp;&nbsp;</span></a></p><p style=\"margin-left:0px;\">&nbsp;</p><p><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\">&nbsp;TkTok :&nbsp;</span><a href=\"https://www.youtube.com/redirect?event=video_description&amp;redir_token=QUFFLUhqbDhzVjJkU1ZFandZczQ5RVE4V3FFdFFvM3Nnd3xBQ3Jtc0tuRkJGbjY5dDlKZzZvYmJoU3FLTWhJSE84NTZybHVJMWplRnk2d1lMVnFhTTNkN1BLMjZXRVZEVGRBNFUxeWJEQ1cyUEVBa2hDM1pHNk0yVnUybDI5T01WMzZuVFcyNEdTSVZ5SlEtM01jbXRSS3JIQQ&amp;q=https%3A%2F%2Fwww.tiktok.com%2F%40injabarunpad&amp;v=jQI6V0nZBt4\"><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\"> </span><span style=\"background-color:transparent;color:rgb(19,19,19);\"><img src=\"https://www.gstatic.com/youtube/img/watch/social_media/tiktok_1x.png\" alt=\"\" width=\"14\" height=\"14\"></span><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\"> /&nbsp;injabarunpad&nbsp;&nbsp;</span></a></p><p style=\"margin-left:0px;\">&nbsp;</p><p><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\">&nbsp;Website : </span><a href=\"https://www.youtube.com/redirect?event=video_description&amp;redir_token=QUFFLUhqbFYzbGtYNF9ZT1ZuZTVicG5Fb183VGtPSGgzZ3xBQ3Jtc0ttazRjbGJfWEs0QzZSUS03UmNmT09RQTZ0UVZsX1lLN0Z3TUZpYWpEUFZHZmRKVXlfMm04NmpNZkxVOGd2cUdEYTl5VlFoYUgxQ0hLWHc0V0hFMWZwdUJjUGFacWZob2dyT19iN0NvS0R0Y01JXzNiRQ&amp;q=https%3A%2F%2Finjabar.unpad.ac.id%2F&amp;v=jQI6V0nZBt4\"><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(6,95,212);\">https://injabar.unpad.ac.id/</span></a></p><p style=\"margin-left:0px;\">&nbsp;</p><p><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\">&nbsp;</span><a href=\"https://www.youtube.com/hashtag/injabar5\"><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(6,95,212);\">#injabar5</span></a><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\"> </span><a href=\"https://www.youtube.com/hashtag/jawabarat\"><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(6,95,212);\">#jawabarat</span></a><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\"> </span><a href=\"https://www.youtube.com/hashtag/unpad\"><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(6,95,212);\">#unpad</span></a><span style=\"background-color:rgba(0,0,0,0.05);color:rgb(19,19,19);\"> Terima kasih kepada Pemerintah Provinsi Jawa Barat&nbsp;@jabarprovgoid&nbsp;dan Pemerintah Kabupaten Bogor.</span></p>', 'https://www.youtube.com/watch?v=jQI6V0nZBt4&ab_channel=INJABARTV', '[\"Ini\",\"Dia\",\"Deretan\",\"Keistimewaan\",\"Kabupaten\",\"Bogor\",\"yang\",\"Wajib\",\"Kamu\",\"Tahu!\",\"#InJabar5\"]', '2025-02-20', '2025-02-21', '2025-02-21', 2, 0, '2025-02-19 17:30:49', '2025-02-25 04:06:11', NULL, 'publish'),
(10, 'Profil Kabupaten Bogor', 'profil-kabupaten-bogor', '<h2 style=\"margin-left:0px;\"><strong>Profil Kabupaten BogorProfil Kabupaten BogorProfil Kabupaten BogorProfil Kabupaten Bogor</strong></h2>', 'https://www.youtube.com/watch?v=3lPQqBYmNdg&ab_channel=bagusGis', '[\"Profil\",\"Kabupaten\",\"Bogor\"]', '2025-02-20', '2025-02-20', '2025-02-22', 2, 1, '2025-02-19 18:42:23', '2025-02-25 04:05:30', NULL, 'publish'),
(11, 'cekbox', 'cekbox', '<p>cekbox cekbox cekbox cekbox cekbox</p>', NULL, '[\"cekbox\"]', '2025-02-25', '2025-02-25', '2025-02-27', 1, 1, '2025-02-25 03:54:15', '2025-02-25 03:54:34', NULL, 'publish'),
(12, 'cekbox again', 'cekbox-again', '<p>cekbox again cekbox again cekbox again</p>', NULL, '[\"cekbox\",\"again\"]', '2025-02-25', '2025-02-25', '2025-02-25', 1, 0, '2025-02-25 03:55:02', '2025-02-25 04:06:47', NULL, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agenda_id` bigint(20) UNSIGNED NOT NULL,
  `waktu_kegiatan` time NOT NULL,
  `judul_kegiatan` varchar(255) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `agenda_id`, `waktu_kegiatan`, `judul_kegiatan`, `deskripsi_kegiatan`, `created_at`, `updated_at`) VALUES
(3, 4, '08:00:00', 'Musrenbang Tingkat Kecamatan Mandalajati Tahun 2025 untuk RKPD Kota Bandung Tahun 2026 di Lapangan Futsal Kecamatan Mandalajati, Jl. Pasir Impun No. 33A.', 'Dihadiri Anggota DPRD drg. Susi Sulastri; Asep Robin, SH., MH., Iqbal Mohamad Usman, S.IP., SH. Rendiana Awangga; H. Aries Supriyatna, SH., MH.; Ahmad Rahmat Purnama, A.Md.; Aswan Asep Wawan dan AA Abdul Rozak, S.Pd.I., M.Ag.;', '2025-02-12 19:08:53', '2025-02-12 19:16:43'),
(4, 4, '09:00:00', 'Menerima Audiensi dari LSM Taman Hati di Auditorium Paripurna.', 'Dihadiri Anggota DPRD Kota Bandung, Susanto Triyogo Adiputro, S.ST.;', '2025-02-12 19:08:53', '2025-02-12 19:16:43'),
(5, 4, '10:00:00', 'Menerima Kunjungan Anggota DPRD dari Fraksi PKS se Sumatera Utara di Ruang Rapat Paripurna.', 'Dihadiri Pimpinan dan Anggota Fraksi PKS DPRD Kota Bandung.', '2025-02-12 19:08:53', '2025-02-12 19:16:43'),
(6, 4, '07:30:00', 'Apel Pagi', 'Dihadiri oleh seluruh perangkat DPRD', '2025-02-12 19:16:43', '2025-02-12 19:16:43'),
(8, 6, '10:38:00', 'aa', 'aa', '2025-02-12 20:38:52', '2025-02-12 20:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\Articles', 30, '1041c4ff-2a7c-483d-b4bf-eae7c89a4c57', 'images', 'Foto Bebas - Raihan Fadhlurahman', 'Foto-Bebas---Raihan-Fadhlurahman.jpg', 'image/jpeg', 'public', 'public', 1419871, '[]', '[]', '[]', '[]', 2, '2025-02-11 03:15:34', '2025-02-11 03:15:34'),
(3, 'App\\Models\\Articles', 35, '0a608726-eb31-46d0-91d7-3e63353d769f', 'images', 'OIP', 'OIP.jpeg', 'image/jpeg', 'public', 'public', 18045, '[]', '[]', '[]', '[]', 1, '2025-02-11 17:37:58', '2025-02-11 17:37:58'),
(4, 'App\\Models\\Articles', 38, '56de1202-3b2a-4595-8879-b9f4a8b1e103', 'images', 'Ketua-DPRD-Kabupaten-Bogor-Rudy-Susmanto-rapat-paripurna', 'Ketua-DPRD-Kabupaten-Bogor-Rudy-Susmanto-rapat-paripurna.jpg', 'image/jpeg', 'public', 'public', 56393, '[]', '[]', '[]', '[]', 1, '2025-02-12 12:00:36', '2025-02-12 12:00:36'),
(5, 'App\\Models\\Articles', 41, '48b2e239-5029-4081-8105-0913db3bb04c', 'images', 'inter1', 'inter1.png', 'image/png', 'public', 'public', 83424, '[]', '[]', '[]', '[]', 1, '2025-02-13 20:25:28', '2025-02-13 20:25:28'),
(7, 'App\\Models\\Articles', 43, '5009e3c3-9b48-4b2b-aa39-985536848d6b', 'images', '3', '3.jpg', 'image/jpeg', 'public', 'public', 205371, '[]', '[]', '[]', '[]', 1, '2025-02-13 20:50:26', '2025-02-13 20:50:26'),
(8, 'App\\Models\\Articles', 47, 'f1778a8f-84af-451e-afce-9382b2aab88a', 'images', 'OIP', 'OIP.jpeg', 'image/jpeg', 'public', 'public', 18045, '[]', '[]', '[]', '[]', 1, '2025-02-17 00:23:13', '2025-02-17 00:23:13'),
(10, 'App\\Models\\Galeri', 1, '386e6438-f797-4a3b-9f0e-d7353b158cf5', 'images', 'Ketua-DPRD-Kabupaten-Bogor-Rudy-Susmanto-rapat-paripurna', 'Ketua-DPRD-Kabupaten-Bogor-Rudy-Susmanto-rapat-paripurna.jpg', 'image/jpeg', 'public', 'public', 56393, '[]', '[]', '[]', '[]', 1, '2025-02-19 04:54:21', '2025-02-19 04:54:21'),
(11, 'App\\Models\\Galeri', 3, '1e6afed2-2d56-4a8c-b5a3-762f979ac5f6', 'images', '5ba6cr5v', '5ba6cr5v.png', 'image/png', 'public', 'public', 1088087, '[]', '[]', '[]', '[]', 1, '2025-02-19 05:16:35', '2025-02-19 05:16:35'),
(12, 'App\\Models\\Galeri', 4, '25456fac-cb51-4c32-8c1d-94f8e62ca4ee', 'images', 'Ketua-DPRD-Kabupaten-Bogor-Rudy-Susmanto-rapat-paripurna', 'Ketua-DPRD-Kabupaten-Bogor-Rudy-Susmanto-rapat-paripurna.jpg', 'image/jpeg', 'public', 'public', 56393, '[]', '[]', '[]', '[]', 1, '2025-02-19 08:34:38', '2025-02-19 08:34:38'),
(14, 'App\\Models\\Articles', 60, '900c8efe-11c3-4674-943a-b766348c4923', 'images', 'OIP', 'OIP.jpeg', 'image/jpeg', 'public', 'public', 18045, '[]', '[]', '[]', '[]', 1, '2025-02-24 04:11:14', '2025-02-24 04:11:14'),
(15, 'App\\Models\\Galeri', 5, 'd87c8a27-9f57-4ea8-ba4e-0489c41dffcc', 'images', '4', '4.jpg', 'image/jpeg', 'public', 'public', 276770, '[]', '[]', '[]', '[]', 1, '2025-02-24 04:15:17', '2025-02-24 04:15:17'),
(17, 'App\\Models\\Articles', 61, '6c59a0ca-2c0d-4240-82e6-2f3bacad4615', 'images', 'inter1', 'inter1.png', 'image/png', 'public', 'public', 83424, '[]', '[]', '[]', '[]', 1, '2025-02-24 04:48:42', '2025-02-24 04:48:42'),
(18, 'App\\Models\\Articles', 56, 'ae01d8a7-5390-48d9-9abf-2d73392494e1', 'images', '3', '3.jpg', 'image/jpeg', 'public', 'public', 205371, '[]', '[]', '[]', '[]', 1, '2025-02-24 05:43:27', '2025-02-24 05:43:27'),
(20, 'App\\Models\\Articles', 72, '2f8b1bec-1c0b-4e04-9a66-8b78ce6d5b3a', 'images', 'BP.-2', 'BP.-2.webp', 'image/webp', 'public', 'public', 37360, '[]', '[]', '[]', '[]', 1, '2025-02-24 19:39:46', '2025-02-24 19:39:46'),
(22, 'App\\Models\\Articles', 74, '7c8b3e81-513b-4c67-9fdc-cc998f33b0f4', 'images', 'dapil-6', 'dapil-6.webp', 'image/webp', 'public', 'public', 49920, '[]', '[]', '[]', '[]', 1, '2025-02-24 19:44:54', '2025-02-24 19:44:54'),
(23, 'App\\Models\\Articles', 75, '29cfec01-f7c5-4d83-bcf8-69a83aeb2fcd', 'images', 'dapil-5', 'dapil-5.webp', 'image/webp', 'public', 'public', 60104, '[]', '[]', '[]', '[]', 1, '2025-02-24 19:46:40', '2025-02-24 19:46:40'),
(24, 'App\\Models\\Articles', 62, 'a8f56d16-64d5-4af8-8a8e-94a560c8734e', 'images', 'DSC06823 (1)', 'DSC06823-(1).webp', 'image/webp', 'public', 'public', 116662, '[]', '[]', '[]', '[]', 1, '2025-02-25 02:04:38', '2025-02-25 02:04:38'),
(26, 'App\\Models\\Articles', 77, '1f9c23ba-6e12-44cb-8076-a9af289171a4', 'images', 'dapil-3', 'dapil-3.webp', 'image/webp', 'public', 'public', 43792, '[]', '[]', '[]', '[]', 1, '2025-02-25 02:33:57', '2025-02-25 02:33:57'),
(27, 'App\\Models\\Articles', 78, 'ea7c1471-cdab-42e4-9cb4-3840fbf02659', 'images', 'dapil-2', 'dapil-2.webp', 'image/webp', 'public', 'public', 46738, '[]', '[]', '[]', '[]', 1, '2025-02-25 02:35:59', '2025-02-25 02:35:59'),
(28, 'App\\Models\\Articles', 79, 'a95f042e-0868-44cc-b870-9560ccdd6ac2', 'images', 'dapil-1-1', 'dapil-1-1.webp', 'image/webp', 'public', 'public', 117222, '[]', '[]', '[]', '[]', 1, '2025-02-25 02:40:24', '2025-02-25 02:40:24'),
(29, 'App\\Models\\Articles', 80, '480648dc-d7f5-4ada-9042-e404db6485dd', 'images', 'WhatsApp-Image-2024-12-02-at-17.12.18-1-min-scaled', 'WhatsApp-Image-2024-12-02-at-17.12.18-1-min-scaled.webp', 'image/webp', 'public', 'public', 73376, '[]', '[]', '[]', '[]', 1, '2025-02-25 02:41:38', '2025-02-25 02:41:38'),
(30, 'App\\Models\\Galeri', 11, 'd5ac9154-25d5-4daa-a7db-d3520d32a04b', 'images', 'WhatsApp-Image-2024-12-02-at-17.12.18-1-min-scaled', 'WhatsApp-Image-2024-12-02-at-17.12.18-1-min-scaled.webp', 'image/webp', 'public', 'public', 73376, '[]', '[]', '[]', '[]', 1, '2025-02-25 03:54:15', '2025-02-25 03:54:15'),
(31, 'App\\Models\\Galeri', 12, 'b77379db-b885-4387-8efe-2c9e79fbcb43', 'images', 'dapil-1-1', 'dapil-1-1.webp', 'image/webp', 'public', 'public', 117222, '[]', '[]', '[]', '[]', 1, '2025-02-25 03:55:02', '2025-02-25 03:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_07_044230_create_user_role', 2),
(6, '2025_02_07_080506_create_permission_tables', 4),
(7, '2025_02_09_123914_create_articles_table', 5),
(8, '2025_02_10_031224_create_tags_table', 6),
(9, '2025_02_10_042759_add_tags_id_and_file_to_articles_table', 7),
(11, '2025_02_10_064752_create_article_tag_table', 8),
(12, '2025_02_11_131419_add_columns_to_articles_table', 9),
(13, '2025_02_11_131821_add_columns_status_articles_to_articles_table', 10),
(16, '2025_02_12_015946_create_agenda_table', 11),
(17, '2025_02_12_015952_create_kegiatan_table', 12),
(18, '2025_02_12_032334_add_tags_column_to_articles_table', 13),
(19, '2025_02_13_010415_add_column_tgl_publish_to_articles_table', 14),
(20, '2025_02_11_163929_create_media_table', 15),
(21, '2025_02_13_034549_create_apa_siapa_table', 15),
(22, '2025_02_13_035200_create_apa_siapa_tamu_table', 15),
(23, '2025_02_13_053231_update_apa_siapa_table', 16),
(24, '2025_02_13_054912_update_apa_siapa_tamu_table', 17),
(25, '2025_02_13_090749_create_tupoksi_table', 18),
(26, '2025_02_14_041950_create_tata_tertib_table', 19),
(30, '2025_02_14_091807_add_any_aolumn_to_articles_table', 20),
(31, '2025_02_14_101639_add_column_special_kategori_to_articles_table', 21),
(32, '2025_02_18_084955_add_slug_to_articles_table', 22),
(34, '2025_02_19_094323_create_new_table_foto', 23),
(35, '2025_02_19_102454_add_file_in_galeri', 24),
(37, '2025_02_19_121400_add_status_publish_in_galeri', 25),
(38, '2025_02_23_072317_create_mst_kecamatan_table', 26),
(40, '2025_02_23_072802_create_mst_desa_table', 27),
(41, '2025_02_23_081223_create_dapil_table', 28),
(43, '2025_02_23_081358_create_dapil_desa_table', 29),
(44, '2025_02_23_081357_create_dapil_kecamatan_table', 30),
(45, '2025_02_23_093828_add_kecamatan_desa_to_dapil_table', 31),
(46, '2025_02_24_062932_create_fraksi_table', 32),
(47, '2025_02_24_065056_add_column_file_to_fraksi', 33),
(48, '2025_02_25_021805_update_slug_unique_in_articles_table', 34),
(49, '2025_02_25_035037_add_status_tampil_to_articles', 35);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 3),
(8, 'App\\Models\\User', 4),
(8, 'App\\Models\\User', 7),
(8, 'App\\Models\\User', 9),
(9, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mst_desa`
--

CREATE TABLE `mst_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_desa`
--

INSERT INTO `mst_desa` (`id`, `id_kecamatan`, `nama`, `latitude`, `longitude`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 28, 'Cibunian', -6.690367477, 106.6302464, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(2, 28, 'Gunungsari', -6.693772193, 106.677056, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(3, 28, 'Gunungpicung', -6.675937709, 106.6777509, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(4, 40, 'Tapos I', -6.674502638, 106.7048533, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(5, 27, 'Malasari', -6.700310006, 106.5284127, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(6, 25, 'Wangunjaya', -6.596188975, 106.5761074, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(7, 40, 'Tapos II', -6.635335507, 106.6927052, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(8, 40, 'Gunungmalang', -6.681714323, 106.7215441, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(9, 24, 'Karyasari', -6.632717681, 106.6205401, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(10, 40, 'Cibitungtengah', -6.615569611, 106.6958405, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(11, 25, 'Sadeng', -6.554139908, 106.5817704, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(12, 8, 'Sukamaju', -6.586968141, 106.6512944, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(13, 33, 'Kiarapandak', -6.625145046, 106.4888521, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(14, 10, 'Sukaraksa', -6.587118736, 106.5237157, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(15, 25, 'Babakansadeng', -6.574950394, 106.580551, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(16, 8, 'Situilir', -6.601019845, 106.6533213, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(17, 27, 'Pangkaljaya', -6.602559314, 106.5493592, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(18, 33, 'Sukajaya', -6.590240995, 106.5084175, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(19, 24, 'Pabangbon', -6.624698192, 106.5938706, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(20, 40, 'Cinangneng', -6.602443282, 106.705929, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(21, 27, 'Sukaluyu', -6.598223198, 106.5657495, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(22, 26, 'Cipayunggirang', -6.646544589, 106.9066977, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(23, 27, 'Kalongliud', -6.578623789, 106.5533301, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(24, 37, 'Sukamantri', -6.649581544, 106.7702032, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(25, 27, 'Hambaro', -6.582819857, 106.5633891, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(26, 27, 'Parakanmuncang', -6.595208025, 106.5349766, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(27, 8, 'Galuga', -6.564849942, 106.6439682, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(28, 25, 'Kalong I', -6.556990635, 106.5586964, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(29, 25, 'Leuwisadeng', -6.580682708, 106.602805, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(30, 6, 'Banjarwangi', -6.681780192, 106.8603124, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(31, 25, 'Sibanteng', -6.554795572, 106.6020836, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(32, 24, 'Leuwiliang', -6.566928163, 106.6320494, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(33, 5, 'Cibanteng', -6.555536293, 106.7095512, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(34, 33, 'Jayaraharja', -6.596096746, 106.4944934, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(35, 25, 'Kalong II', -6.54965778, 106.567697, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(36, 33, 'Urug', -6.628350469, 106.5029758, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(37, 20, 'Jugalaya', -6.537906327, 106.4566184, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(38, 32, 'Cidokom', -6.518799413, 106.6745981, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(39, 20, 'Kalongsawah', -6.501010718, 106.4942986, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(40, 20, 'Pangradin', -6.524089871, 106.4540153, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(41, 20, 'Setu', -6.468593371, 106.4722467, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(42, 10, 'Banyuasih', -6.483841111, 106.5904699, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(43, 7, 'Cirimekar', -6.472761738, 106.8556471, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(44, 10, 'Tegallega', -6.45515329, 106.5970805, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(45, 10, 'Bangunjaya', -6.449895926, 106.5355058, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(46, 20, 'Bagoang', -6.428925708, 106.4597085, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(47, 20, 'Barangkok', -6.429797758, 106.4892857, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(48, 15, 'Parigimekar', -6.447235878, 106.6962334, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(49, 39, 'Tenjo', -6.329885223, 106.4539274, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(50, 5, 'Cibadak', -6.562714603, 106.688891, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(51, 32, 'Mekarsari', -6.374474612, 106.6016147, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(52, 39, 'Bojong', -6.382966229, 106.442284, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(53, 30, 'Lumpang', -6.363426347, 106.5443806, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(54, 30, 'Gintungcilejet', -6.365560119, 106.5258561, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(55, 24, 'Cibeber II', -6.599462698, 106.6140112, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(56, 30, 'Jagabita', -6.334955703, 106.5330224, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(57, 24, 'Purasari', -6.698769663, 106.6020689, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(58, 28, 'Ciasihan', -6.706769691, 106.6790309, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(59, 27, 'Bantarkaret', -6.704031784, 106.5659987, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(60, 14, 'Citeko', -6.702451775, 106.9357979, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(61, 6, 'Telukpinang', -6.681009719, 106.8524772, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(62, 28, 'Gunungbunder I', -6.646207828, 106.6807029, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(63, 28, 'Gunungbunder II', -6.690854841, 106.6978382, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(64, 3, 'Pasirbuncir', -6.754440409, 106.8425, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(65, 9, 'Srogol', -6.761574001, 106.8287536, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(66, 3, 'Tangkil', -6.75673331, 106.8926684, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(67, 3, 'Cinagara', -6.746690084, 106.8501068, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(68, 9, 'Tugujaya', -6.737128602, 106.7723578, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(69, 3, 'Caringin', -6.710215421, 106.8270964, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(70, 3, 'Cimande', -6.742189828, 106.8895141, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(71, 3, 'Lemahduhur', -6.721491903, 106.8391106, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(72, 3, 'Pancawati', -6.739498164, 106.9020957, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(73, 6, 'Cileungsi', -6.722592628, 106.8922513, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(74, 11, 'Palasari', -6.660862171, 106.7964764, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(75, 37, 'Tamansari', -6.679880062, 106.7408779, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(76, 37, 'Sukajadi', -6.654476001, 106.7300466, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(77, 26, 'Sukamaju', -6.680138633, 106.8865877, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(78, 17, 'Neglasari', -6.58511038, 106.725114, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(79, 1, 'Sumurbatu', -6.575133866, 106.8817735, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(80, 13, 'Parakan', -6.620247358, 106.7711271, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(81, 6, 'Citapen', -6.702464848, 106.8764109, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(82, 13, 'Ciomas', -6.609852803, 106.7687545, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(83, 14, 'Cibeureum', -6.722966266, 106.9513924, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(84, 14, 'Tugu Selatan', -6.727387284, 106.9734836, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(85, 35, 'Sukatani', -6.608828259, 106.8420372, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(86, 11, 'Cipelang', -6.694620998, 106.7825257, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(87, 26, 'Sukamanah', -6.688078763, 106.8945226, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(88, 11, 'Tajurhalang', -6.681718295, 106.7747352, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(89, 6, 'Banjarwaru', -6.669204541, 106.8558691, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(90, 2, 'Kedungwaringin', -6.496194037, 106.7948959, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(91, 16, 'Karangasem Barat', -6.489946181, 106.8653377, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(92, 11, 'Cipicung', -6.672237051, 106.8067643, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(93, 26, 'Gadog', -6.661061761, 106.8752836, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(94, 14, 'Kopo', -6.668367771, 106.9106034, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(95, 13, 'Kotabatu', -6.629713378, 106.7821624, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(96, 2, 'Bojonggede', -6.486193612, 106.7989885, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(97, 13, 'Sukaharja', -6.614126789, 106.7430339, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(98, 16, 'Tangkil', -6.53181623, 106.8728562, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(99, 35, 'Cikeas', -6.592363988, 106.8452755, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(100, 13, 'Padasuka', -6.594113135, 106.7592196, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(101, 17, 'Sinarsari', -6.582535868, 106.7365447, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(102, 1, 'Cipambuan', -6.559436016, 106.8453043, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(103, 22, 'Semplak Barat', -6.542770711, 106.7471504, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(104, 22, 'Atang Sanjaya', -6.540783771, 106.7588925, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(105, 31, 'Bantarjaya', -6.53425778, 106.7335983, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(106, 16, 'Hambalang', -6.544418224, 106.9000224, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(107, 2, 'Waringinjaya', -6.508441412, 106.7922436, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(108, 16, 'Leuwinutug', -6.509693173, 106.8612832, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(109, 16, 'Sanja', -6.504945326, 106.8690826, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(110, 16, 'Tajur', -6.542306299, 106.9278576, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(111, 16, 'Puspasari', -6.47718058, 106.8735893, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(112, 2, 'Bojong Baru', -6.477663357, 106.8091716, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(113, 29, 'Pamegarsari', -6.44279631, 106.7314218, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(114, 2, 'Rawapanjang', -6.458605625, 106.8107023, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(115, 7, 'Pondokrajeg', -6.454875227, 106.8185004, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(116, 29, 'Iwul', -6.455284887, 106.7139975, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(117, 7, 'Harapanjaya', -6.461051962, 106.8348711, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(118, 2, 'Ragajaya', -6.446199888, 106.7823471, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(119, 7, 'Pabuaran', -6.464696396, 106.8502347, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(120, 16, 'Tarikolot', -6.494615133, 106.8904586, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(121, 16, 'Gunungsari', -6.494201626, 106.9025378, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(122, 16, 'Pasirmukti', -6.510796012, 106.8989364, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(123, 29, 'Bojongindah', -6.433117268, 106.7011642, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(124, 29, 'Bojongsempu', -6.444572293, 106.7032, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(125, 7, 'Pabuaran Mekar', -6.444602437, 106.8487723, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(126, 34, 'Pabuaran', -6.545629592, 106.9599779, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(127, 4, 'Cikutamahi', -6.546151682, 107.1675567, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(128, 16, 'Puspanegara', -6.486254186, 106.8789574, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(129, 23, 'Lulut', -6.491699061, 106.9155449, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(130, 21, 'Cibodas', -6.49817879, 107.033738, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(131, 26, 'Kuta', -6.698366281, 106.9250996, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(132, 4, 'Babakanraden', -6.482130677, 107.1391945, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(133, 23, 'Bantarjati', -6.468469009, 106.9011449, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(134, 35, 'Cijujung', -6.532151896, 106.8368079, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(135, 34, 'Sukawangi', -6.648034545, 107.043544, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(136, 38, 'Cibadak', -6.622979978, 107.1025845, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(137, 38, 'Buanajaya', -6.618561163, 107.1903034, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(138, 34, 'Wargajaya', -6.623898002, 107.0168334, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(139, 12, 'Cileungsi', -6.399773025, 106.9634999, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(140, 18, 'Cikeas Udik', -6.402399449, 106.927278, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(141, 38, 'Sukarasa', -6.609614597, 107.0814485, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(142, 34, 'Cibadak', -6.581950584, 106.9589452, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(143, 34, 'Sukaharja', -6.594230139, 107.0533429, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(144, 34, 'Sukamakmur', -6.583099724, 106.9812388, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(145, 4, 'Mekarwangi', -6.523183326, 107.112475, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(146, 34, 'Sukadamai', -6.55844492, 107.0463591, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(147, 23, 'Leuwikaret', -6.515399886, 106.9342749, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(148, 21, 'Bendungan', -6.493012222, 107.0833553, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(149, 21, 'Sukasirna', -6.493711779, 107.058822, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(150, 21, 'Jonggol', -6.46389074, 107.0731129, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(151, 21, 'Singasari', -6.486400714, 107.0141745, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(152, 21, 'Sukamaju', -6.450889903, 107.0527196, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(153, 23, 'Kembangkuning', -6.446813308, 106.9380905, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(154, 21, 'Sukamanah', -6.442225399, 107.0665092, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(155, 12, 'Situsari', -6.43276163, 107.0229375, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(156, 35, 'Gununggeulis', -6.631038828, 106.8789922, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(157, 1, 'Bojongkoneng', -6.607925646, 106.9074885, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(158, 1, 'Cijayanti', -6.604125642, 106.8741608, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(159, 1, 'Karangtengah', -6.601535887, 106.9385664, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(160, 18, 'Bojongnangka', -6.43029233, 106.9021775, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(161, 12, 'Cipeucang', -6.422121601, 107.0398722, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(162, 12, 'Gandoang', -6.410437537, 107.0177347, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(163, 16, 'Sukahati', -6.514872313, 106.8878414, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(164, 31, 'Candali', -6.505923863, 106.7027271, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(165, 12, 'Jatisari', -6.415413751, 107.048153, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(166, 18, 'Nagrak', -6.384660081, 106.943996, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(167, 18, 'Ciangsana', -6.353526722, 106.9601811, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(168, 18, 'Bojongkulur', -6.318962258, 106.9693304, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(169, 23, 'Bojong', -6.462091917, 106.9915028, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(170, 31, 'Pasirgaok', -6.536144938, 106.7196554, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(171, 19, 'Pabuaran', -6.369504406, 106.6678125, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(172, 19, 'Rawakalong', -6.372153774, 106.7094956, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(173, 21, 'Weninggalih', -6.46004966, 107.0969833, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(174, 9, 'Pasirjaya', -6.723395887, 106.7663203, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(175, 26, 'Megamendung', -6.649415793, 106.9535014, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(176, 38, 'Sirnarasa', -6.631326435, 107.1618805, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(177, 21, 'Sirnagalih', -6.474168725, 107.1079652, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(178, 11, 'Sukaharja', -6.67316296, 106.7673135, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(179, 26, 'Cipayung', -6.653160384, 106.884466, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(180, 27, 'Batutulis', -6.570768833, 106.5518832, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(181, 32, 'Mekarjaya', -6.530990792, 106.6680265, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(182, 28, 'Purwabakti', -6.735614915, 106.6170218, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(183, 28, 'Cibitungkulon', -6.662769889, 106.6397016, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(184, 28, 'Cibitungwetan', -6.648728981, 106.6386838, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(185, 5, 'Ciampea Udik', -6.614876124, 106.6823445, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(186, 33, 'Kiarasari', -6.670219349, 106.5027433, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(187, 28, 'Pamijahan', -6.644649737, 106.651607, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(188, 28, 'Pasarean', -6.63806165, 106.6594597, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(189, 8, 'Cemplang', -6.578447605, 106.649196, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(190, 27, 'Cisarua', -6.650850484, 106.5518225, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(191, 28, 'Cibening', -6.63357989, 106.6784429, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(192, 28, 'Gunungmenyan', -6.633622859, 106.6666525, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(193, 8, 'Situ Udik', -6.618064366, 106.6527757, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(194, 24, 'Karacak', -6.620651627, 106.6258448, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(195, 40, 'Situdaun', -6.617427706, 106.7067331, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(196, 27, 'Nanggung', -6.631508923, 106.5236301, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(197, 28, 'Cimayang', -6.608603169, 106.6653206, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(198, 33, 'Harkatjaya', -6.604681073, 106.5012108, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(199, 5, 'Cibuntu', -6.594572455, 106.6864365, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(200, 24, 'Barengkok', -6.599201891, 106.6321212, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(201, 5, 'Cinangka', -6.59251379, 106.6994293, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(202, 8, 'Cibatok I', -6.583247891, 106.6670545, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(203, 5, 'Cihideunghilir', -6.570869812, 106.7238862, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(204, 10, 'Cigudeg', -6.554751122, 106.5376145, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(205, 24, 'Leuwimekar', -6.584349972, 106.6325414, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(206, 25, 'Sadengkolot', -6.589471503, 106.5889733, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(207, 10, 'Wargajaya', -6.527398669, 106.5340161, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(208, 5, 'Cicadas', -6.575851931, 106.6870419, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(209, 8, 'Dukuh', -6.567125873, 106.6539859, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(210, 8, 'Cimanggu II', -6.567079143, 106.6609092, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(211, 33, 'Sukamulih', -6.576443321, 106.4794989, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(212, 10, 'Mekarjaya', -6.511520528, 106.5135047, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(213, 5, 'Bojongjengkol', -6.574268607, 106.7093779, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(214, 33, 'Sipayung', -6.573390625, 106.5031207, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(215, 20, 'Sipak', -6.486949875, 106.4841862, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(216, 33, 'Pasirmadang', -6.593374181, 106.4679883, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(217, 3, 'Muarajaya', -6.721759502, 106.8180762, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(218, 8, 'Cimanggu I', -6.562975269, 106.6665294, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(219, 33, 'Cileuksa', -6.594522216, 106.4424573, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(220, 24, 'Karehkel', -6.549008626, 106.6382981, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(221, 10, 'Bunar', -6.528874, 106.5093265, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(222, 8, 'Girimulya', -6.572351266, 106.675465, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(223, 10, 'Sukamaju', -6.555877947, 106.5182407, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(224, 32, 'Leuwibatu', -6.535647363, 106.6217207, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(225, 10, 'Banyuresmi', -6.518377049, 106.5867785, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(226, 20, 'Pamagersari', -6.487542874, 106.4643809, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(227, 10, 'Banyuwangi', -6.505273666, 106.5557933, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(228, 32, 'Rumpin', -6.439650627, 106.6456517, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(229, 32, 'Cibodas', -6.489389125, 106.6634103, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(230, 10, 'Cintamanik', -6.490380229, 106.525188, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(231, 20, 'Jasinga', -6.48668444, 106.4481746, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(232, 20, 'Tegalwangi', -6.466186206, 106.4213153, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(233, 10, 'Argapura', -6.470598106, 106.5038688, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(234, 32, 'Kampungsawah', -6.456116228, 106.630038, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(235, 20, 'Neglasari', -6.450825717, 106.4508465, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(236, 20, 'Cikopomayak', -6.44527827, 106.4702103, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(237, 32, 'Cipinang', -6.446976045, 106.6158695, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(238, 10, 'Batujajar', -6.437406711, 106.583007, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(239, 10, 'Rengasjajar', -6.446553918, 106.5632041, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(240, 32, 'Sukasari', -6.41653659, 106.622277, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(241, 39, 'Ciomas', -6.421571655, 106.5283009, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(242, 30, 'Dago', -6.404103909, 106.5840179, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(243, 36, 'Sukmajaya', -6.482990626, 106.78002, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(244, 32, 'Tamansari', -6.396012275, 106.6312421, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(245, 20, 'Pangaur', -6.398151924, 106.4601402, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(246, 39, 'Tapos', -6.399905215, 106.4946245, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(247, 30, 'Jagabaya', -6.394448684, 106.5300796, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(248, 32, 'Kertajaya', -6.392346031, 106.606797, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(249, 30, 'Gorowong', -6.393659802, 106.5574711, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(250, 30, 'Pingku', -6.380606742, 106.5672997, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(251, 30, 'Cikuda', -6.377037861, 106.5842254, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(252, 32, 'Sukamulya', -6.369811118, 106.6309323, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(253, 30, 'Kabasiran', -6.353177469, 106.5789262, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(254, 16, 'Citeureup', -6.479604672, 106.8919021, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(255, 39, 'Babakan', -6.36266852, 106.4723603, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(256, 39, 'Singabraja', -6.351131478, 106.4402304, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(257, 39, 'Cilaku', -6.336602048, 106.4752086, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(258, 39, 'Singabangsa', -6.314019909, 106.4677026, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(259, 32, 'Rabak', -6.484363636, 106.630544, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(260, 8, 'Cibatok II', -6.592595206, 106.6666758, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(261, 32, 'Gobang', -6.516339789, 106.6325893, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(262, 8, 'Ciaruteunilir', -6.53813601, 106.6711334, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(263, 8, 'Cijujung', -6.54985234, 106.6570571, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(264, 5, 'Benteng', -6.546693824, 106.7030444, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(265, 8, 'Leuweungkolot', -6.559349673, 106.6761807, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(266, 5, 'Ciampea', -6.54118038, 106.6895534, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(267, 5, 'Bojongrangkas', -6.557856739, 106.6953283, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(268, 24, 'Puraseda', -6.670967288, 106.5963686, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(269, 28, 'Ciasmara', -6.71066597, 106.6567287, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(270, 30, 'Cibunar', -6.342611784, 106.5509634, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(271, 30, 'Parungpanjang', -6.350077675, 106.5659236, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(272, 27, 'Curugbitung', -6.632042825, 106.5680889, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(273, 9, 'Watesjaya', -6.755107953, 106.8109955, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(274, 20, 'Koleang', -6.46604892, 106.4422422, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(275, 6, 'Bantarsari', -6.684597168, 106.8680836, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(276, 8, 'Ciaruteun Udik', -6.604242048, 106.6736434, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(277, 5, 'Cihideung Uudik', -6.581591709, 106.7198049, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(278, 9, 'Cigombong', -6.74649225, 106.7997154, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(279, 9, 'Cisalada', -6.736188583, 106.7937128, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(280, 9, 'Ciburuy', -6.733687867, 106.8107863, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(281, 3, 'Pasirmuncang', -6.721805857, 106.8273972, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(282, 9, 'Ciburayut', -6.718233302, 106.7849889, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(283, 9, 'Ciadeg', -6.717734583, 106.8113107, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(284, 11, 'Cijeruk', -6.708786922, 106.7693398, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(285, 6, 'Pandansari', -6.648165389, 106.8539874, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(286, 26, 'Pasirangin', -6.642646315, 106.8769125, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(287, 37, 'Pasireurih', -6.638842422, 106.7619167, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(288, 13, 'Ciapus', -6.59945167, 106.7498668, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(289, 37, 'Sirnagalih', -6.633499953, 106.7729601, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(290, 15, 'Putatnutug', -6.466352944, 106.6694897, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(291, 37, 'Sukaluyu', -6.640553746, 106.7438444, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(292, 37, 'Sukajaya', -6.628994747, 106.7402808, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(293, 15, 'Cihoe', -6.432322994, 106.6819187, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(294, 11, 'Warungmenteng', -6.703800467, 106.8081391, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(295, 6, 'Cibedug', -6.710168608, 106.8937359, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(296, 3, 'Ciderum', -6.698249551, 106.8489966, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(297, 13, 'Laladon', -6.583156503, 106.7566378, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(298, 26, 'Sukaresmi', -6.701734599, 106.9072898, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(299, 3, 'Cimandehilir', -6.697587158, 106.8237223, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(300, 6, 'Jambuluwuk', -6.699084497, 106.8913375, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(301, 26, 'Sukagalih', -6.698808597, 106.9143039, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(302, 3, 'Ciherangpondok', -6.686391683, 106.8294834, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(303, 11, 'Cibalung', -6.681797308, 106.8117673, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(304, 11, 'Tanjungsari', -6.677942193, 106.7911311, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(305, 14, 'Cisarua', -6.67577656, 106.9357123, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(306, 14, 'Jogjogan', -6.664274322, 106.9382183, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(307, 26, 'Sukamahi', -6.669901472, 106.8727628, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(308, 6, 'Bendungan', -6.666724941, 106.864451, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(309, 26, 'Sukakarya', -6.671088576, 106.8933069, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(310, 14, 'Leuwimalang', -6.664986349, 106.924337, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(311, 6, 'Ciawi', -6.660111663, 106.8480434, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(312, 14, 'Cilember', -6.653423865, 106.9226629, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(313, 37, 'Sukaresmi', -6.634671413, 106.7531682, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(314, 35, 'Cibanon', -6.6301426, 106.8459409, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(315, 17, 'Sukadamai', -6.619565718, 106.7291656, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(316, 13, 'Mekarjaya', -6.611432677, 106.778325, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(317, 13, 'Sukamakmur', -6.613087557, 106.751616, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(318, 29, 'Waru', -6.422879488, 106.7221964, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(319, 13, 'Pagelaran', -6.612220868, 106.7611376, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(320, 35, 'Nagrak', -6.614743024, 106.8507891, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(321, 17, 'Sukawening', -6.602931064, 106.7364602, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(322, 13, 'Ciomasrahayu', -6.59409223, 106.7653161, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(323, 35, 'Sukaraja', -6.599221443, 106.8351918, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(324, 17, 'Dramaga', -6.574755477, 106.7356369, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(325, 35, 'Cadasngampar', -6.573297182, 106.8416105, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(326, 1, 'Citaringgul', -6.567771101, 106.8537551, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(327, 1, 'Kadumanggu', -6.544262766, 106.8531852, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(328, 1, 'Babakanmadang', -6.566836814, 106.8643128, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(329, 35, 'Cilebut Timur', -6.530197178, 106.8021686, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(330, 17, 'Cikarawang', -6.546941712, 106.7290794, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(331, 35, 'Pasirlaja', -6.550288175, 106.8363338, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(332, 31, 'Rancabungur', -6.532361253, 106.7030636, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(333, 22, 'Bojong', -6.527198753, 106.7519633, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(334, 35, 'Cimandala', -6.530897652, 106.8240426, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(335, 31, 'Bantarsari', -6.523375891, 106.7323463, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(336, 35, 'Cilebut Barat', -6.531561969, 106.7967219, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(337, 22, 'Parakanjaya', -6.52026419, 106.7609203, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(338, 31, 'Mekarsari', -6.51255545, 106.6890613, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(339, 1, 'Sentul', -6.517410406, 106.849217, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(340, 7, 'Karadenan', -6.514648257, 106.8094468, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(341, 22, 'Pabuaran', -6.505471077, 106.7254225, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(342, 22, 'Kemang', -6.506022898, 106.7487428, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(343, 2, 'Cimanggis', -6.502456048, 106.7773785, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(344, 22, 'Pondok Udik', -6.49087889, 106.7388999, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(345, 7, 'Cibinong', -6.486281198, 106.8521952, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(346, 36, 'Tonjong', -6.489988411, 106.7546579, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(347, 15, 'Karihkil', -6.489741931, 106.6803541, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(348, 22, 'Tegal', -6.483739184, 106.7086319, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(349, 7, 'Pakansari', -6.487011967, 106.8357421, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(350, 15, 'Cibeuteung Udik', -6.483663576, 106.6886405, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(351, 7, 'Sukahati', -6.485388587, 106.8169387, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(352, 7, 'Tengah', -6.477416816, 106.8267795, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(353, 22, 'Jampang', -6.474503269, 106.7225634, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(354, 36, 'Tajurhalang', -6.476838054, 106.7617439, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(355, 36, 'Kalisuren', -6.470628542, 106.7397333, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(356, 7, 'Ciriung', -6.468311535, 106.8663218, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(357, 15, 'Babakan', -6.466295657, 106.6979458, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(358, 2, 'Susukan', -6.471203298, 106.7916786, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(359, 36, 'Nanggerang', -6.46581886, 106.7786108, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(360, 2, 'Pabuaran', -6.463296602, 106.7982343, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(361, 36, 'Sasakpanjang', -6.460462319, 106.7643699, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(362, 36, 'Citayam', -6.444024943, 106.7527452, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(363, 29, 'Jabonmekar', -6.45196833, 106.7247017, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(364, 15, 'Cibeuteungmuara', -6.442884532, 106.6624122, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(365, 29, 'Parung', -6.427299882, 106.7284833, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(366, 29, 'Warujaya', -6.429115776, 106.712402, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(367, 29, 'Cogreg', -6.422204294, 106.6956054, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(368, 15, 'Ciseeng', -6.453127774, 106.6870721, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(369, 15, 'Kuripan', -6.423643248, 106.6653499, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(370, 19, 'Cidokom', -6.405811637, 106.7071632, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(371, 19, 'Cibadung', -6.39902423, 106.6742708, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(372, 19, 'Jampang', -6.397261454, 106.6565225, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(373, 19, 'Padurenan', -6.389616556, 106.7034679, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(374, 18, 'Gunungputri', -6.4632149, 106.8918638, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(375, 19, 'Gunungsindur', -6.38541651, 106.6716562, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(376, 19, 'Pengasinan', -6.370170946, 106.6913878, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(377, 17, 'Petir', -6.606286809, 106.7222923, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(378, 6, 'Bojongmurni', -6.741446037, 106.936054, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(379, 15, 'Cibentang', -6.439837476, 106.6750689, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(380, 7, 'Nanggewermekar', -6.502761882, 106.8402705, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(381, 7, 'Nanggewer', -6.510689729, 106.8316965, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(382, 38, 'Tanjungsari', -6.623965649, 107.1416213, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(383, 38, 'Sirnasari', -6.625499196, 107.1556118, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(384, 38, 'Pasirtanjung', -6.600727267, 107.1455294, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(385, 34, 'Sirnajaya', -6.617366614, 106.9941329, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(386, 38, 'Antajaya', -6.586384444, 107.1775301, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(387, 34, 'Sukamulya', -6.588072952, 107.0033581, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(388, 38, 'Tanjungrasa', -6.577484194, 107.1288537, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(389, 38, 'Selawangi', -6.580552077, 107.08658, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(390, 4, 'Bantarkuning', -6.559976711, 107.1406261, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(391, 18, 'Tlajung Udik', -6.445638492, 106.9142711, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(392, 4, 'Karyamekar', -6.549132871, 107.1027622, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(393, 4, 'Cibatutiga', -6.538851497, 107.1385515, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(394, 21, 'Sukajaya', -6.554381673, 107.0171523, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(395, 21, 'Sukanegara', -6.525690293, 107.0235044, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(396, 34, 'Sukaresmi', -6.530403227, 107.0528581, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(397, 4, 'Kutamekar', -6.513312566, 107.1505902, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(398, 21, 'Balekambang', -6.509265107, 107.0883226, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(399, 4, 'Cariu', -6.509157787, 107.1316863, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(400, 12, 'Dayeuh', -6.431576583, 106.9672761, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(401, 4, 'Tegalpanjang', -6.498430319, 107.1151736, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(402, 4, 'Sukajadi', -6.490084897, 107.1626118, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(403, 23, 'Nambo', -6.476505644, 106.9320636, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(404, 21, 'Singajaya', -6.472961021, 107.0491151, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(405, 23, 'Klapanunggal', -6.467215455, 106.9576942, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(406, 23, 'Cikahuripan', -6.456763714, 106.9753148, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(407, 14, 'Batulayang', -6.675758984, 106.9493069, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(408, 16, 'Karangasem Timur', -6.500860964, 106.8838581, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(409, 12, 'Mampir', -6.430679415, 106.9972055, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(410, 18, 'Cicadas', -6.429695478, 106.9263746, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(411, 18, 'Wanaherang', -6.41692909, 106.9413292, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(412, 12, 'Cileungsi Kidul', -6.410846725, 106.9686413, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(413, 12, 'Mekarsari', -6.405952251, 106.9961762, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(414, 12, 'Cipenjo', -6.387775706, 106.9949653, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(415, 12, 'Pasirangin', -6.378898148, 106.9835982, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(416, 12, 'Limusnunggal', -6.372473653, 106.9704109, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(417, 23, 'Ligarmukti', -6.502183635, 106.9735364, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(418, 17, 'Purwasari', -6.620307822, 106.7175228, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(419, 24, 'Cibeber I', -6.571589512, 106.6157994, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(420, 14, 'Tugu Utara', -6.68239036, 106.9745827, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(421, 5, 'Tegalwaru', -6.570913073, 106.7000282, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(422, 18, 'Karanggan', -6.456049218, 106.8855488, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(423, 19, 'Cibinong', -6.395628641, 106.6896526, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(424, 21, 'Sukagalih', -6.490277393, 107.1025045, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(425, 20, 'Curug', -6.507121533, 106.4285932, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(426, 20, 'Wirajaya', -6.524092495, 106.4187888, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(427, 31, 'Cimulang', -6.522529329, 106.7127692, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(428, 39, 'Batok', -6.36510559, 106.5063549, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(429, 17, 'Babakan', -6.55555031, 106.7255556, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(430, 17, 'Ciherang', -6.583711701, 106.7439984, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(431, 6, 'Bitungsari', -6.682891773, 106.841531, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(432, 35, 'Pasirjambu', -6.536944259, 106.8107399, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(433, 40, 'Gunung Mulya', -6.641421956, 106.7071154, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(434, 33, 'Cisarua', -6.68627375, 106.4620969, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(435, 19, 'Curug', -6.398130789, 106.7216976, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL),
(436, 6, 'Banjarsari', NULL, NULL, '2025-02-23 08:03:28', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_kecamatan`
--

CREATE TABLE `mst_kecamatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_kecamatan`
--

INSERT INTO `mst_kecamatan` (`id`, `nama`, `latitude`, `longitude`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Babakan Madang', -6.571154174, 106.8695454, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(2, 'Bojong Gede', -6.477156841, 106.7991247, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(3, 'Caringin', -6.730039055, 106.8546, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(4, 'Cariu', -6.519772772, 107.135436, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(5, 'Ciampea', -6.578944896, 106.7019724, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(6, 'Ciawi', -6.701756095, 106.8819489, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(7, 'Cibinong', -6.482436464, 106.8383272, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(8, 'Cibungbulang', -6.57685851, 106.6566211, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(9, 'Cigombong', -6.747128239, 106.795828, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(10, 'Cigudeg', -6.509322743, 106.5564835, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(11, 'Cijeruk', -6.681489833, 106.7856695, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(12, 'Cileungsi', -6.398162032, 106.9818978, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(13, 'Ciomas', -6.608905964, 106.7597987, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(14, 'Cisarua', -6.70841256, 106.962275, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(15, 'Ciseeng', -6.45910014, 106.6793089, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(16, 'Citeureup', -6.520958169, 106.8872969, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(17, 'Dramaga', -6.586460232, 106.7348777, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(18, 'Gunung Putri', -6.388649099, 106.9377983, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(19, 'Gunung Sindur', -6.386377618, 106.6835726, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(20, 'Jasinga', -6.4695343, 106.4473287, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(21, 'Jonggol', -6.508173916, 107.0282682, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(22, 'Kemang', -6.507119018, 106.7372581, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(23, 'Klapanunggal', -6.483306278, 106.9525772, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(24, 'Leuwiliang', -6.645276474, 106.6077755, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(25, 'Leuwisadeng', -6.574267341, 106.589731, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(26, 'Megamendung', -6.675826922, 106.8947793, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(27, 'Nanggung', -6.661338533, 106.5440489, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(28, 'Pamijahan', -6.677206749, 106.656327, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(29, 'Parung', -6.440336688, 106.7171389, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(30, 'Parung Panjang', -6.373200099, 106.5539654, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(31, 'Ranca Bungur', -6.520005141, 106.7162116, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(32, 'Rumpin', -6.451117094, 106.6285044, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(33, 'Sukajaya', -6.647602381, 106.4662203, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(34, 'Sukamakmur', -6.586319372, 106.9904, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(35, 'Sukaraja', -6.576923212, 106.8411207, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(36, 'Tajurhalang', -6.472847319, 106.7590827, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(37, 'Tamansari', -6.667422416, 106.7429133, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(38, 'Tanjungsari', -6.615179024, 107.1373918, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(39, 'Tenjo', -6.372892209, 106.4716877, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL),
(40, 'Tenjolaya', -6.65311745, 106.7063658, '2025-02-23 00:59:49', '2025-02-23 00:59:49', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('superadmin@gmail.com', '$2y$12$RiV9Xgp7.1IbeuJ0o.O18eTkxg7/AoNonedRbjLr8XTauXOhGskB.', '2025-02-08 05:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(24, 'create permissions', 'web', '2025-02-09 18:32:39', '2025-02-09 18:32:39'),
(25, 'read permissions', 'web', '2025-02-09 18:32:50', '2025-02-09 18:32:50'),
(26, 'update permissions', 'web', '2025-02-09 18:33:10', '2025-02-09 18:33:10'),
(27, 'delete permissions', 'web', '2025-02-09 18:33:18', '2025-02-09 18:33:18'),
(28, 'create users', 'web', '2025-02-09 18:33:44', '2025-02-09 18:33:44'),
(29, 'read users', 'web', '2025-02-09 18:33:52', '2025-02-09 18:33:52'),
(30, 'update users', 'web', '2025-02-09 18:34:06', '2025-02-09 18:34:06'),
(31, 'delete users', 'web', '2025-02-09 18:34:39', '2025-02-09 18:34:39'),
(32, 'create roles', 'web', '2025-02-09 18:34:56', '2025-02-09 18:34:56'),
(33, 'read roles', 'web', '2025-02-09 18:35:03', '2025-02-09 18:35:03'),
(34, 'update roles', 'web', '2025-02-09 18:35:10', '2025-02-09 18:35:10'),
(35, 'delete roles', 'web', '2025-02-09 18:35:18', '2025-02-09 18:35:18'),
(36, 'create articles', 'web', '2025-02-09 18:35:50', '2025-02-09 18:35:50'),
(37, 'read articles', 'web', '2025-02-09 18:35:58', '2025-02-09 18:35:58'),
(38, 'update articles', 'web', '2025-02-09 18:36:08', '2025-02-09 18:36:08'),
(39, 'delete articles', 'web', '2025-02-09 18:36:14', '2025-02-09 18:36:14'),
(40, 'create tags', 'web', '2025-02-09 20:29:05', '2025-02-09 20:29:05'),
(41, 'read tags', 'web', '2025-02-09 20:29:12', '2025-02-09 20:29:12'),
(42, 'update tags', 'web', '2025-02-09 20:29:19', '2025-02-09 20:29:19'),
(43, 'delete tags', 'web', '2025-02-09 20:29:30', '2025-02-09 20:29:30'),
(68, 'create agenda', 'web', '2025-02-11 19:23:37', '2025-02-11 19:23:37'),
(69, 'read agenda', 'web', '2025-02-11 19:23:37', '2025-02-11 19:23:37'),
(70, 'update agenda', 'web', '2025-02-11 19:23:37', '2025-02-11 19:23:37'),
(71, 'delete agenda', 'web', '2025-02-11 19:23:37', '2025-02-11 19:23:37'),
(72, 'create kegiatan', 'web', '2025-02-11 19:23:49', '2025-02-11 19:23:49'),
(73, 'read kegiatan', 'web', '2025-02-11 19:23:49', '2025-02-11 19:23:49'),
(74, 'update kegiatan', 'web', '2025-02-11 19:23:49', '2025-02-11 19:23:49'),
(75, 'delete kegiatan', 'web', '2025-02-11 19:23:49', '2025-02-11 19:23:49'),
(76, 'create profil', 'web', '2025-02-11 19:33:50', '2025-02-11 19:33:50'),
(77, 'read profil', 'web', '2025-02-11 19:33:50', '2025-02-11 19:33:50'),
(82, 'create apa siapa', 'web', '2025-02-12 21:13:27', '2025-02-12 21:13:27'),
(83, 'read apa siapa', 'web', '2025-02-12 21:13:28', '2025-02-12 21:13:28'),
(84, 'update apa siapa', 'web', '2025-02-12 21:13:28', '2025-02-12 21:13:28'),
(85, 'delete apa siapa', 'web', '2025-02-12 21:13:28', '2025-02-12 21:13:28'),
(86, 'update profil', 'web', '2025-02-12 21:19:04', '2025-02-12 21:19:04'),
(87, 'delete profil', 'web', '2025-02-12 21:19:04', '2025-02-12 21:19:04'),
(88, 'create galeri', 'web', '2025-02-19 03:15:33', '2025-02-19 03:15:33'),
(89, 'read galeri', 'web', '2025-02-19 03:15:33', '2025-02-19 03:15:33'),
(90, 'update galeri', 'web', '2025-02-19 03:15:33', '2025-02-19 03:15:33'),
(91, 'delete galeri', 'web', '2025-02-19 03:15:33', '2025-02-19 03:15:33'),
(92, 'create akd', 'web', '2025-02-23 01:22:10', '2025-02-23 01:22:10'),
(93, 'read akd', 'web', '2025-02-23 01:22:10', '2025-02-23 01:22:10'),
(94, 'update akd', 'web', '2025-02-23 01:22:10', '2025-02-23 01:22:10'),
(95, 'delete akd', 'web', '2025-02-23 01:22:10', '2025-02-23 01:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'superadmin2', 'web', '2025-02-09 01:28:40', '2025-02-09 19:31:44'),
(8, 'admin', 'web', '2025-02-09 18:59:01', '2025-02-09 18:59:01'),
(9, 'superadmin', 'web', '2025-02-09 19:32:01', '2025-02-09 19:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(36, 8),
(37, 3),
(37, 8),
(38, 3),
(38, 8),
(39, 3),
(39, 8),
(40, 8),
(41, 8),
(42, 8),
(43, 8),
(68, 8),
(69, 8),
(70, 8),
(71, 8),
(72, 8),
(73, 8),
(74, 8),
(75, 8),
(76, 8),
(77, 8),
(82, 8),
(83, 8),
(84, 8),
(85, 8),
(86, 8),
(87, 8),
(88, 8),
(89, 8),
(90, 8),
(91, 8),
(92, 8),
(93, 8),
(94, 8),
(95, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5H2A1eiXYH7Q6A3Bl86ayoOqrQX4AcgyE8mXflUx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWxvdVhFSXp0OGJDaTFtNjhNZ1pFbGNpdVdScHJpaHhwMXh6YU02VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kcHJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740483156),
('naWwPcwcKATNIAHKfBRYMoj6iYH3sMmM6IbXDpEy', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNnB0VGo4ZDZibDlFcnFDS2x5aFNscFZlOURicG94VnBpUjh0R004cSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC92aWRlbyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1740483449);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Politik', '2025-02-09 20:45:46', '2025-02-09 20:55:02'),
(2, 'Agama', '2025-02-09 20:46:37', '2025-02-09 20:46:37'),
(4, 'Olahraga', '2025-02-09 23:54:42', '2025-02-09 23:54:42'),
(5, 'Bahasa asing', '2025-02-09 23:54:53', '2025-02-09 23:54:53'),
(6, 'Kejahatan', '2025-02-09 23:55:03', '2025-02-09 23:55:03'),
(7, 'Pencapaian', '2025-02-09 23:55:10', '2025-02-09 23:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `tata_tertib`
--

CREATE TABLE `tata_tertib` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tata_tertib`
--

INSERT INTO `tata_tertib` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, '<div class=\"card-header py-3  bg-white\" style=\"margin-bottom: 0px; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255); border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color); --bs-bg-opacity: 1; border-radius: var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) 0 0; font-family: Lato, sans-serif; font-size: 16px; padding-top: 1rem !important; padding-bottom: 1rem !important;\"><div class=\"row\" style=\"--bs-gutter-y: 0; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col\" style=\"flex: 1 0 0%; width: 648px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y);\"><h4 class=\"m-0 font-weight-bold text-dark\" style=\"font-weight: 600; line-height: 1.5; font-size: 18px; font-family: Poppins, sans-serif; --bs-text-opacity: 1; color: rgba(var(--bs-dark-rgb), var(--bs-text-opacity)) !important;\"><span style=\"font-weight: bolder;\">Detail Produk Hukum</span></h4></div><div class=\"col\" style=\"flex: 1 0 0%; width: 648px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); text-align: right;\">Dilihat : 268 Diunduh : 905</div></div></div><div class=\"card-body\" style=\"flex: 1 1 auto; padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x); color: rgb(85, 85, 85); font-family: Lato, sans-serif; font-size: 16px;\"><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Tipe Dokumen</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: Peraturan Perundang-undangan</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Judul</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: Peraturan DPRD Kabupaten Bogor Nomor 1 Tahun 2019 Tentang Perubahan Atas Peraturan DPRD Kabupaten Bogor Nomor 1 Tahun 2018 Tentang Tata Tertib</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">T.E.U. Badan</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: Bogor (Kabupaten)</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Nomor Peraturan</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: 1</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Tahun</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: 2019</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Jenis</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: Peraturan DPRD</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Singkatan jenis</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: -</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Tempat Penetapan</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: Cibinong</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Tanggal Penetapan</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: 23 November 2018</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Sumber</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: BD Kabupaten Bogor Tahun 2018 Nomor 86</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Subjek</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: HUKUM</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Status Peraturan</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: Berlaku</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Keterangan Status</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: Berlaku</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Bahasa</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: Indonesia</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Lokasi</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: Bagian Perundang-undangan Kab. Bogor</div></div><div class=\"row g-3 \" style=\"--bs-gutter-x: 1rem; --bs-gutter-y: 1rem; margin-top: calc(-1 * var(--bs-gutter-y)); margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x));\"><div class=\"col-sm-3 fw-bold\" style=\"flex: 0 0 auto; width: 322px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); font-weight: bold; position: relative;\">Bidang hukum</div><div class=\"col-sm-9\" style=\"flex: 0 0 auto; width: 966px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y); position: relative;\">: Hukum Tata Negara</div></div></div>', '2025-02-13 21:39:50', '2025-02-13 21:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `tupoksi`
--

CREATE TABLE `tupoksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tupoksi`
--

INSERT INTO `tupoksi` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, '<header class=\"entry-header\" style=\"box-sizing: inherit; padding-bottom: 0px; margin-bottom: 0px; color: rgb(145, 145, 145); font-family: Ubuntu, sans-serif; font-size: 16px;\"><h1 class=\"entry-title\" style=\"text-align: center; box-sizing: inherit; font-size: 30px; margin-bottom: 0.67em; clear: both; line-height: 36px; font-family: &quot;Playfair Display&quot;, serif; color: rgb(51, 51, 51);\"><b><span style=\"font-size: 36px;\">TUPOKSI</span></b></h1></header><div class=\"entry-content\" style=\"box-sizing: inherit; counter-reset: footnotes 0; margin: 0px; color: rgb(145, 145, 145); font-family: Ubuntu, sans-serif; font-size: 16px;\"><div class=\"at-above-post-page addthis_tool\" data-url=\"https://setwan.bogorkab.go.id/tupoksi/\" style=\"box-sizing: inherit;\"></div><p style=\"box-sizing: inherit; margin-bottom: 1.5em; text-align: center;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Tugas Pokok dan Fungsi serta Susunan Organisasi SEKRETARIAT DPRD KABUPATEN BOGOR</strong></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Kedudukan dan Tugas Pokok :</strong></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\">Sekretariat DPRD mempunyai tugas pokok membantu Bupati dalam menyelenggarakan administrasi kesekretariatan, administrasi keuangan, mendukung pelaksanaan tugas dan fungsi DPRD dan menyediakan serta mengkoordinasikan tenaga ahli yang diperlukan oleh DPRD.</p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Fungsi:</strong></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\">Berdasarkan Peraturan Daerah Kabupaten Bogor Nomor. 10 tahun 2010, Sekretariat DPRD mempunyai tugas dan fungsi sebagai berikut :</p><ol style=\"margin-bottom: 1.5em; list-style-type: decimal; padding-left: 22px;\"><li style=\"box-sizing: inherit;\">penyelenggaraan administrasi kesekretariatan DPRD</li><li style=\"box-sizing: inherit;\">penyelenggaraan administrasi keuangan DPRD</li><li style=\"box-sizing: inherit;\">penyelenggaraan dukungan tugas dan fungsi DPRD</li><li style=\"box-sizing: inherit;\">penyediaan dan pengoordinasian tenaga ahli yang diperlukan oleh DPRD</li><li style=\"box-sizing: inherit;\">pelaksanaan monitoring, evaluasi, dan pelaporan kesekretariatan DPRD, dan</li><li style=\"box-sizing: inherit;\">pelaksanaan tugas lain yang diberikan oleh Bupati sesuai dengan tugas dan fungsinya.</li></ol><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Susunan Organisasi Sekretariat DPRD, terdiri atas:</strong></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Sekretaris DPRD</strong></p><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Bagian Umum</strong></p><ul style=\"margin-bottom: 1.5em; list-style-type: square; padding-left: 22px;\"><li style=\"box-sizing: inherit;\">Sub Bagian Tata Usaha Kepegawaian</li><li style=\"box-sizing: inherit;\">Sub Bagian Umum</li></ul><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Bagian Program dan Keuangan</strong></p><ul style=\"margin-bottom: 1.5em; list-style-type: square; padding-left: 22px;\"><li style=\"box-sizing: inherit;\">Sub Bagian Program dan Pelaporan</li><li style=\"box-sizing: inherit;\">Sub Bagian Keuangan</li></ul><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Bagian Persidangan dan Perundang-undangan</strong></p><ul style=\"margin-bottom: 1.5em; list-style-type: square; padding-left: 22px;\"><li style=\"box-sizing: inherit;\">Sub Koordinator Kajian Perundang-undangan</li><li style=\"box-sizing: inherit;\">Sub Koordinator Persidangan dan Risalah</li><li style=\"box-sizing: inherit;\">Sub Koordinator Humas, Protokol dan Publikasi</li></ul><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Bagian Fasilitasi Penganggaran dan Pengawasan</strong></p><ul style=\"margin-bottom: 1.5em; list-style-type: square; padding-left: 22px;\"><li style=\"box-sizing: inherit;\">Sub Koordinator Fasilitasi Penganggaran</li><li style=\"box-sizing: inherit;\">Sub Koordinator Fasilitasi Pengawasan</li><li style=\"box-sizing: inherit;\">Sub Koordinator Kerjasama dan Aspirasi</li></ul><p style=\"box-sizing: inherit; margin-bottom: 1.5em;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Kelompok Jabatan Fungsional</strong>, terdiri atas sejumlah tenaga dalam jenjang Jabatan Fungsional yang terbagi dalam berbagai kelompok sesuai dengan bidang keahlian lainnya.</p></div>', '2025-02-13 03:24:22', '2025-02-13 21:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Superadmin', 'superadmin@gmail.com', NULL, '$2y$12$WUbRYMGdpPuqVRC8cmQBw.BlTY0OTNWOc6Dni1hOGMyTntWfyJKbK', 'LpQ94JLjBANpff5MWDkMHhDaZUb0GXAlqIPN7QrjviXCMiLgh2YGjgS18gye', '2025-02-08 04:19:05', '2025-02-09 18:10:50'),
(4, NULL, 'admin_dprd', 'admin_dprd@gmail.com', NULL, '$2y$12$WUbRYMGdpPuqVRC8cmQBw.BlTY0OTNWOc6Dni1hOGMyTntWfyJKbK', NULL, '2025-02-09 18:48:46', '2025-02-09 18:48:46'),
(6, NULL, 'superadmin', 'superadmin1@gmail.com', NULL, '$2y$12$WUbRYMGdpPuqVRC8cmQBw.BlTY0OTNWOc6Dni1hOGMyTntWfyJKbK', 'blRKfj663irHVCE3JZu0J8s8Oj81xOSOzQfiSlL2lGoCKH5n0SLVPhFBDf89', '2025-02-09 19:29:55', '2025-02-09 19:29:55'),
(7, NULL, 'Raihan Fadhlurahman', 'raihan@gmail.com', NULL, '$2y$12$WUbRYMGdpPuqVRC8cmQBw.BlTY0OTNWOc6Dni1hOGMyTntWfyJKbK', 'LaiIHPPH2TYeHrcGFZZpSbl5fgLlDN04B9dQBtpqXRi6voD3AJj4TbexHV76', '2025-02-09 20:02:55', '2025-02-09 20:02:55'),
(9, NULL, 'admin23', 'admin2@gmail.com', NULL, '$2y$12$WUbRYMGdpPuqVRC8cmQBw.BlTY0OTNWOc6Dni1hOGMyTntWfyJKbK', NULL, '2025-02-11 05:13:10', '2025-02-11 06:06:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apa_siapa`
--
ALTER TABLE `apa_siapa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apa_siapa_tamu`
--
ALTER TABLE `apa_siapa_tamu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apa_siapa_tamu_apa_siapa_id_foreign` (`apa_siapa_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_tags_id_foreign` (`tags_id`);

--
-- Indexes for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_tag_articles_id_foreign` (`articles_id`),
  ADD KEY `article_tag_tags_id_foreign` (`tags_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dapil`
--
ALTER TABLE `dapil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dapil_kecamatan_id_foreign` (`kecamatan_id`),
  ADD KEY `dapil_desa_id_foreign` (`desa_id`);

--
-- Indexes for table `dapil_desa`
--
ALTER TABLE `dapil_desa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dapil_desa_dapil_id_foreign` (`dapil_id`),
  ADD KEY `dapil_desa_desa_id_foreign` (`desa_id`);

--
-- Indexes for table `dapil_kecamatan`
--
ALTER TABLE `dapil_kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dapil_kecamatan_dapil_id_foreign` (`dapil_id`),
  ADD KEY `dapil_kecamatan_kecamatan_id_foreign` (`kecamatan_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fraksi`
--
ALTER TABLE `fraksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_agenda_id_foreign` (`agenda_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mst_desa`
--
ALTER TABLE `mst_desa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mst_desa_id_kecamatan_foreign` (`id_kecamatan`);

--
-- Indexes for table `mst_kecamatan`
--
ALTER TABLE `mst_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tata_tertib`
--
ALTER TABLE `tata_tertib`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tupoksi`
--
ALTER TABLE `tupoksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `apa_siapa`
--
ALTER TABLE `apa_siapa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `apa_siapa_tamu`
--
ALTER TABLE `apa_siapa_tamu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `dapil`
--
ALTER TABLE `dapil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dapil_desa`
--
ALTER TABLE `dapil_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `dapil_kecamatan`
--
ALTER TABLE `dapil_kecamatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fraksi`
--
ALTER TABLE `fraksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `mst_desa`
--
ALTER TABLE `mst_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- AUTO_INCREMENT for table `mst_kecamatan`
--
ALTER TABLE `mst_kecamatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tata_tertib`
--
ALTER TABLE `tata_tertib`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tupoksi`
--
ALTER TABLE `tupoksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apa_siapa_tamu`
--
ALTER TABLE `apa_siapa_tamu`
  ADD CONSTRAINT `apa_siapa_tamu_apa_siapa_id_foreign` FOREIGN KEY (`apa_siapa_id`) REFERENCES `apa_siapa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `article_tag_articles_id_foreign` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_tag_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dapil`
--
ALTER TABLE `dapil`
  ADD CONSTRAINT `dapil_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `mst_desa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dapil_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `mst_kecamatan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dapil_desa`
--
ALTER TABLE `dapil_desa`
  ADD CONSTRAINT `dapil_desa_dapil_id_foreign` FOREIGN KEY (`dapil_id`) REFERENCES `dapil` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dapil_desa_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `mst_desa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dapil_kecamatan`
--
ALTER TABLE `dapil_kecamatan`
  ADD CONSTRAINT `dapil_kecamatan_dapil_id_foreign` FOREIGN KEY (`dapil_id`) REFERENCES `dapil` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dapil_kecamatan_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `mst_kecamatan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_agenda_id_foreign` FOREIGN KEY (`agenda_id`) REFERENCES `agenda` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mst_desa`
--
ALTER TABLE `mst_desa`
  ADD CONSTRAINT `mst_desa_id_kecamatan_foreign` FOREIGN KEY (`id_kecamatan`) REFERENCES `mst_kecamatan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_role_id_foreign` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
