@extends('layouts.app-dprd')
@section('content')
    <section class="bg-cover bg-center h-[500px]"
        style="
        background-image: url('assets/Gedung-DPRD-Kabupaten-Bogor-2878005838.webp');
      ">
        <div class="bg-black bg-opacity-50 h-full flex items-center justify-center">
            <div class="text-center text-white px-4">
                <h1 class="text-4xl font-bold">DPRD Kabupaten Bogor</h1>
            </div>
        </div>
    </section>

    <br />

    <section class="px-16 mb-8">
        <div class="grid grid-cols-1">
            <img class="w-full h-full object-cover rounded" src="assets/cropped-IMG_2602.webp" alt="siaplur" />

        </div>
    </section>

    <section class="container mx-auto px-16 py-4 bg-white sm:px-4 md:px-4 lg:px-16">
        <div class="grid grid-cols-12 gap-6">
            <!-- Bagian 1: Slider Section (5 kolom) -->
            <div class="lg:col-span-9 col-span-12">
                <div class="relative">
                    <div class="overflow-hidden rounded-lg border-b">
                        <div id="slider" class="slider-items flex transition-transform duration-300">
                            <img src="assets/1.jpg" alt="Slide 2" class="w-full flex-shrink-0" />
                            <img src="assets/2.jpg" alt="Slide 2" class="w-full flex-shrink-0" />
                            <img src="assets/3.jpg" alt="Slide 2" class="w-full flex-shrink-0" />
                            <img src="assets/4.jpg" alt="Slide 2" class="w-full flex-shrink-0" />
                        </div>
                    </div>
                    <!-- Navigation buttons -->
                    <button id="prev"
                        class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        ◁
                    </button>
                    <button id="next"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                        ▷
                    </button>
                </div>
                <!-- Grid Layout -->
                <div class="grid lg:grid-cols-2 md:grid-cols-1 gap-6 bg-white mt-12">
                    <!-- Kolom Kiri -->
                    <div class="flex flex-col gap-6">
                        <div class="space-y-0">
                            <!-- Artikel 1 -->

                            <div class="bg-white rounded-md flex flex-col p-4 mt-0">
                                <!-- Bagian Judul & Tanggal -->
                                <div class="flex flex-col">
                                    <span
                                        class="text-lg font-bold text-black hover:underline hover:text-black font-sans">Bapemperda
                                        DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda</span>
                                    <span class="text-black text-sm mt-1">Jumat, 24 Januari 2025</span>
                                </div>

                                <!-- Bagian Gambar & Deskripsi -->
                                <div class="flex flex-col md:flex-row gap-4 mt-2 items-start">
                                    <!-- Gambar tetap di kiri & ukurannya pas -->
                                    <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                        alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                        class="w-32 h-[102px] object-cover rounded-md" />

                                    <!-- Deskripsi tetap di kanan dan memiliki ruang cukup -->
                                    <div class="flex-1 min-w-0">
                                        <!-- Deskripsi dengan batasan baris -->
                                        <p
                                            class="text-gray-700 line-clamp-5 md:line-clamp-5 sm:line-clamp-5 lg:line-clamp-3 text-ellipsis">
                                            HumasDPRD – Pansus Raperda 4 DPRD Kabupaten Bogor meninjau dua lokasi rencana
                                            calon Kantor Badan Penanggulangan Bencana Daerah (BPBD) Kabupaten Bogor, di
                                            Jalan Serang dan Jalan Banten, Bandung, Kamis, 23 Januari 2025. Peninjauan itu
                                            dihadiri oleh berbagai pihak terkait, dan membahas rencana pengembangan kantor
                                            BPBD untuk meningkatkan kesiapsiagaan terhadap bencana di wilayah tersebut.
                                            Peninjauan ini menunjukkan komitmen pemerintah Kabupaten Bogor dalam memperkuat
                                            infrastruktur penanggulangan bencana.
                                        </p>

                                        <!-- Tombol Baca Selengkapnya -->
                                        <a href="#" class="text-blue-600 mt-2 block md:hidden">Baca Selengkapnya</a>
                                        <a href="#" class="text-blue-600 mt-2 hidden md:block">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Artikel 2 -->
                            <div class="bg-white rounded-md flex flex-col p-4 border-t border-gray-300 my-0">
                                <!-- Bagian Judul & Tanggal -->
                                <div class="flex flex-col">
                                    <span
                                        class="text-lg font-bold text-black hover:underline hover:text-black font-sans">Bapemperda
                                        DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda</span>
                                    <span class="text-black text-sm mt-1">Jumat, 24 Januari 2025</span>
                                </div>

                                <!-- Bagian Gambar & Deskripsi -->
                                <div class="flex flex-col md:flex-row gap-4 mt-2 items-start">
                                    <!-- Gambar tetap di kiri & ukurannya pas -->
                                    <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/BP.-2.jpeg?resize=251%2C250&amp;ssl=1"
                                        alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                        class="w-32 h-[102px] object-cover rounded-md" />

                                    <!-- Deskripsi tetap di kanan dan memiliki ruang cukup -->
                                    <div class="flex-1 min-w-0">
                                        <!-- Deskripsi dengan batasan baris -->
                                        <p
                                            class="text-gray-700 line-clamp-5 md:line-clamp-5 sm:line-clamp-5 lg:line-clamp-3 text-ellipsis">
                                            HumasDPRD – Cibinong – Badan Pembentukan Peraturan Daerah (BAPEMPERDA) DPRD
                                            Kabupaten Bogor telah menggelar rapat kerja bersama Alat Kelengkapan DPRD (AKD)
                                            Pengusul. Peninjauan itu dihadiri oleh berbagai pihak terkait, dan membahas
                                            rencana pengembangan kantor BPBD untuk meningkatkan kesiapsiagaan terhadap
                                            bencana di wilayah tersebut. Peninjauan ini menunjukkan komitmen pemerintah
                                            Kabupaten Bogor dalam memperkuat infrastruktur penanggulangan bencana.
                                        </p>

                                        <!-- Tombol Baca Selengkapnya -->
                                        <a href="#" class="text-blue-600 mt-2 block md:hidden">Baca Selengkapnya</a>
                                        <a href="#" class="text-blue-600 mt-2 hidden md:block">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-md flex flex-col p-4 border-t border-gray-300 my-0">
                                <!-- Bagian Judul & Tanggal -->
                                <div class="flex flex-col">
                                    <span
                                        class="text-lg font-bold text-black hover:underline hover:text-black font-sans">Rapat
                                        Paripurna DPRD Kabupaten Bogor, 13 Januari 2025</span>
                                    <span class="text-black text-sm mt-1">Selasa, 14 Januari 2025</span>
                                </div>

                                <!-- Bagian Gambar & Deskripsi -->
                                <div class="flex flex-col md:flex-row gap-4 mt-2 items-start">
                                    <!-- Gambar tetap di kiri & ukurannya pas -->
                                    <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/dapil-5.jpeg?resize=150%2C150&amp;ssl=1 150w"
                                        alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                        class="w-32 h-[102px] object-cover rounded-md" />

                                    <!-- Deskripsi tetap di kanan dan memiliki ruang cukup -->
                                    <div class="flex-1 min-w-0">
                                        <!-- Deskripsi dengan batasan baris -->
                                        <p
                                            class="text-gray-700 line-clamp-5 md:line-clamp-5 sm:line-clamp-5 lg:line-clamp-3 text-ellipsis">
                                            Cibinong- DPRD Kabupaten Bogor pada hari Senin, 13 januari 2025 melaksanakan
                                            Rapat Paripurna DPRD dalam rangka:1. Pembacaan Struktur Fraksi Partai Peninjauan
                                            itu dihadiri oleh berbagai pihak terkait, dan membahas rencana pengembangan
                                            kantor BPBD untuk meningkatkan kesiapsiagaan terhadap bencana di wilayah
                                            tersebut. Peninjauan ini menunjukkan komitmen pemerintah Kabupaten Bogor dalam
                                            memperkuat infrastruktur penanggulangan bencana.
                                        </p>

                                        <!-- Tombol Baca Selengkapnya -->
                                        <a href="#" class="text-blue-600 mt-2 block md:hidden">Baca Selengkapnya</a>
                                        <a href="#" class="text-blue-600 mt-2 hidden md:block">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-md flex flex-col p-4 border-t border-gray-300 my-0">
                                <!-- Bagian Judul & Tanggal -->
                                <div class="flex flex-col">
                                    <span
                                        class="text-lg font-bold text-black hover:underline hover:text-black font-sans">Pembangunan
                                        Infrastruktur Jalan Kabupaten Bogor, 5 Maret 2025</span>
                                    <span class="text-black text-sm mt-1">Kamis, 6 Maret 2025</span>
                                </div>

                                <!-- Bagian Gambar & Deskripsi -->
                                <div class="flex flex-col md:flex-row gap-4 mt-2 items-start">
                                    <!-- Gambar tetap di kiri & ukurannya pas -->
                                    <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2022/03/demo-3-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                        alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                        class="w-32 h-[102px] object-cover rounded-md" />

                                    <!-- Deskripsi tetap di kanan dan memiliki ruang cukup -->
                                    <div class="flex-1 min-w-0">
                                        <!-- Deskripsi dengan batasan baris -->
                                        <p
                                            class="text-gray-700 line-clamp-5 md:line-clamp-5 sm:line-clamp-5 lg:line-clamp-3 text-ellipsis">
                                            Cibinong- Pemerintah Kabupaten Bogor memulai pembangunan jalan di beberapa
                                            daerah yang sebelumnya sulit dijangkau. Proyek ini bertujuan untuk memperlancar
                                            akses transportasi antar kecamatan dan meningkatkan perekonomian lokal.
                                            Diharapkan proyek ini selesai tepat waktu dan memberikan manfaat jangka panjang
                                            bagi masyarakat.
                                        </p>

                                        <!-- Tombol Baca Selengkapnya -->
                                        <a href="#" class="text-blue-600 mt-2 block md:hidden">Baca Selengkapnya</a>
                                        <a href="#" class="text-blue-600 mt-2 hidden md:block">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-md flex flex-col p-4 border-t border-gray-300 my-0">
                                <!-- Bagian Judul & Tanggal -->
                                <div class="flex flex-col">
                                    <span
                                        class="text-lg font-bold text-black hover:underline hover:text-black font-sans">Festival
                                        Seni Budaya Kabupaten Bogor, 20 Februari 2025</span>
                                    <span class="text-black text-sm mt-1">Rabu, 21 Februari 2025</span>
                                </div>

                                <!-- Bagian Gambar & Deskripsi -->
                                <div class="flex flex-col md:flex-row gap-4 mt-2 items-start">
                                    <!-- Gambar tetap di kiri & ukurannya pas -->
                                    <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/dapil-5.jpeg?resize=150%2C150&amp;ssl=1 150w"
                                        alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                        class="w-32 h-[102px] object-cover rounded-md" />

                                    <!-- Deskripsi tetap di kanan dan memiliki ruang cukup -->
                                    <div class="flex-1 min-w-0">
                                        <!-- Deskripsi dengan batasan baris -->
                                        <p
                                            class="text-gray-700 line-clamp-5 md:line-clamp-5 sm:line-clamp-5 lg:line-clamp-3 text-ellipsis">
                                            Cibinong- Festival Seni Budaya Kabupaten Bogor kembali diadakan pada 20 Februari
                                            2025. Acara ini menampilkan berbagai pertunjukan seni tradisional, mulai dari
                                            tari-tarian daerah hingga pameran kerajinan tangan, yang menonjolkan kekayaan
                                            budaya Kabupaten Bogor. Event ini dihadiri oleh masyarakat luas dan menjadi
                                            ajang promosi budaya lokal.
                                        </p>

                                        <!-- Tombol Baca Selengkapnya -->
                                        <a href="#" class="text-blue-600 mt-2 block md:hidden">Baca Selengkapnya</a>
                                        <a href="#" class="text-blue-600 mt-2 hidden md:block">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="flex flex-col gap-8 px-4 mt-4">
                        <!-- Agenda Section -->
                        <div class="bg-white border-b rounded-md">
                            <div
                                class="bg-blue-100 text-black font-bold py-2 px-4 rounded-md modtitel border-b-2 pb-2 inline-block">
                                <span class="modtitel">Agenda</span>
                                <i class="fa-regular fa-calendar-days ml-1"></i>
                            </div>
                            <!-- <div class="modtitel border-b-2 border-gray-400 pb-2 inline-block">
                          <span class="teks text-2xl font-bold">Agenda</span>
                          <i class="fa-regular fa-calendar-days ml-1"></i>
                        </div>                               -->
                            <ul class="mt-2 text-black">
                                <li><a href="https://dprd.bogorkab.go.id/agenda/agenda-kegiatan-kamis-16-januari-2025"
                                        class="hover:underline">Agenda Kegiatan Kamis 16 Januari 2025</a></li>
                                <li class="mt-2"><a
                                        href="https://dprd.bogorkab.go.id/agenda/agenda-kegiatan-jumat-17-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Agenda Kegiatan Jumat 17
                                        Januari 2025</a></li>
                                <li class="mt-2"><a
                                        href="https://dprd.bogorkab.go.id/agenda/agenda-kegiatan-senin-20-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Agenda Kegiatan Senin 20
                                        Januari 2025</a></li>
                                <li class="mt-2"><a
                                        href="https://dprd.bogorkab.go.id/agenda/agenda-kegiatan-selasa-22-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Agenda Kegiatan Selasa 22
                                        Januari 2025</a></li>
                                <li class="mt-2"><a
                                        href="https://dprd.bogorkab.go.id/agenda/agenda-kegiatan-rabu-23-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Agenda Kegiatan Rabu 23
                                        Januari 2025</a></li>
                                <li class="mt-2"><a
                                        href="https://dprd.bogorkab.go.id/agenda/agenda-kegiatan-kamis-24-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Agenda Kegiatan Kamis 24
                                        Januari 2025</a></li>
                                <li class="mt-2"><a
                                        href="https://dprd.bogorkab.go.id/agenda/agenda-kegiatan-jumat-25-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Agenda Kegiatan Jumat 25
                                        Januari 2025</a></li>
                                <li class="mt-2"><a
                                        href="https://dprd.bogorkab.go.id/agenda/agenda-kegiatan-senin-27-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Agenda Kegiatan Senin 27
                                        Januari 2025</a></li>
                                <li class="mt-2"><a
                                        href="https://dprd.bogorkab.go.id/agenda/agenda-kegiatan-selasa-28-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Agenda Kegiatan Selasa 28
                                        Januari 2025</a></li>
                                <li class="mt-2"><a
                                        href="https://dprd.bogorkab.go.id/agenda/agenda-kegiatan-rabu-29-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Agenda Kegiatan Rabu 29
                                        Januari 2025</a></li>
                            </ul>
                        </div>

                        <!-- Warta Section -->
                        <div class="bg-white border-b rounded-md">
                            <!-- <div class="titelmod"><span>Warta</span></div> -->
                            <div
                                class="bg-blue-100 text-black font-bold py-2 px-4 rounded-md modtitel border-b-2 pb-2 inline-block">
                                <span class="modtitel">Warta</span>
                                <i class="fa-solid fa-circle-info ml-1 text-xs"></i>
                            </div>
                            <ul class="mt-2 text-black">
                                <li><a href="https://dprd.bogorkab.go.id/berita/berita-16-januari-2025"
                                        class="hover:underline">Penyampaian Laporan Tahunan</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-17-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Pelantikan Anggota Baru</a>
                                </li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-18-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Evaluasi Proyek
                                        Infrastruktur</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-19-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Diskusi Ekonomi Lokal</a>
                                </li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-20-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Kerjasama dengan Pemerintah
                                        Pusat</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-21-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Program Pendidikan Baru</a>
                                </li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-22-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Rencana Pembangunan
                                        Kawasan</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-23-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Pembukaan Lomba Kesenian</a>
                                </li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-24-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Peningkatan Infrastruktur
                                        Jalan</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-25-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Forum Diskusi Masyarakat</a>
                                </li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-26-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Evaluasi Proyek Kesehatan</a>
                                </li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-27-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Kerjasama Antar Daerah</a>
                                </li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-28-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Laporan Keuangan
                                        Pemerintah</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/berita/berita-29-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0">Pertemuan dengan Organisasi
                                        Masyarakat</a></li>
                            </ul>
                        </div>

                        <!-- Apa & Siapa Section -->
                        <div class="bg-white border-b rounded-md">
                            <div
                                class="bg-blue-100 text-black font-bold py-2 px-4 rounded-md modtitel border-b-2 pb-2 inline-block">
                                <span class="modtitel">Apa & Siapa</span>
                                <i class="fa-solid fa-circle-info ml-1 text-xs"></i>
                            </div>
                            <ul class="mt-2 text-black">
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/siapa/siapa-17-januari-2025"
                                        class="hover:underline">Dialog dengan Komisi III DPR RI</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/siapa/siapa-18-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0sss">Pertemuan dengan Dinas
                                        Kesehatan</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/siapa/siapa-20-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0sss">Seminar Peningkatan
                                        Infrastruktur</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/siapa/siapa-21-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0sss">Pemberian Penghargaan
                                        kepada Pejabat Publik</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/siapa/siapa-22-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0sss">Pendidikan Karakter untuk
                                        Pemuda</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/siapa/siapa-23-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0sss">Partisipasi dalam Pameran
                                        Ekonomi</a></li>
                                <li class="mt-2"><a href="https://dprd.bogorkab.go.id/siapa/siapa-24-januari-2025"
                                        class="hover:underline border-t border-gray-300 my-0sss">Rapat Kerja dengan
                                        Kementerian Pekerjaan Umum</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian 2: Terkini (4 kolom) -->
            <div class="lg:col-span-3 col-span-12">
                <!-- Section: Terkini -->
                <div class="terkini-section rounded-lg border-b mb-6">
                    <div class="titelmod flex justify-between items-center w-full">
                        <span class="text-lg font-bold text-black">Terkini</span>
                        <!-- <span>Selengkapnya</span> -->
                    </div>
                    <div class="content space-y-4">
                        <div class="bg-white rounded-md flex py-4">
                            <!-- Gambar di kiri dengan ukuran lebih besar dan jarak -->
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <!-- Judul dan Tanggal di kanan -->
                            <div class="flex flex-col justify-between h-24">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500">05 December 2024</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md flex py-4 items-start border-t border-gray-300">
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <div class="flex flex-col justify-between h-24">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500">05 December 2024</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md flex py-4 items-start border-t border-gray-300">
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <div class="flex flex-col justify-between h-24">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500">05 December 2024</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md flex py-4 items-start border-t border-gray-300">
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <div class="flex flex-col justify-between h-24">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500">05 December 2024</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Terpopuler -->
                <div class="terpopuler-section rounded-lg border-b mb-6">
                    <div class="titelmod flex justify-between items-center w-full">
                        <span class="text-lg font-bold text-black">Terpopuler</span>
                        <!-- <span>Selengkapnya</span> -->
                    </div>
                    <div class="content space-y-4">
                        <div class="bg-white rounded-md flex py-4">
                            <!-- Gambar di kiri dengan ukuran lebih besar dan jarak -->
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <!-- Judul dan Tanggal di kanan -->
                            <div class="flex flex-col justify-between h-24">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500">05 December 2024</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md flex py-4 items-start border-t border-gray-300">
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <div class="flex flex-col justify-between h-24">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500">05 December 2024</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md flex py-4 items-start border-t border-gray-300">
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <div class="flex flex-col justify-between h-24">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500">05 December 2024</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Widget Kominfo -->
                <div class="widget-kominfo-section w-full rounded-lg border-b mb-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="flex-grow border-t border-gray-700"></div>
                        <span class="px-4 text-lg font-bold text-black">Artikel</span>
                        <div class="flex-grow border-t border-gray-700"></div>
                    </div>
                    <script src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
                    <ul id="gpr-kominfo-widget-list" class="content space-y-4">
                        <li class="item border-b pb-3">
                            <div class="flex justify-between text-sm"></div>
                        </li>
                        <!-- Add more items as needed -->
                    </ul>
                </div>

                <!-- Section: Images -->
                <div class="images-section grid grid-cols-1 gap-4">
                    <img class="w-full rounded" src="assets/banner-bogorkabupaten.png" alt="siaplur" />
                    <img class="w-full rounded" src="assets/banner-pengaduan.png" alt="podcast" />
                </div>
            </div>
        </div>
    </section>

    <!-- Container utama dengan latar putih -->
    <div class="container mx-auto bg-white p-6">
        <!-- Foto Section -->
        <section class="foto-section px-16 mb-8">
            <div class="flex items-center justify-center mb-4">
                <div class="flex-grow border-t border-gray-700"></div>
                <span class="px-4 text-lg font-bold text-black">Foto</span>
                <div class="flex-grow border-t border-gray-700"></div>
            </div>
            <div class="wrapper">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <a title="Klik untuk selengkapnya"
                        href="https://dprd.bogorkab.go.id/foto/pelepasan-atlet-kota-bandung-ke-popda-xiii-dan-fornas-vii">
                        <img alt="img-20230704-090911-153.jpg"
                            src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/dapil-5.jpeg?resize=150%2C150&amp;ssl=1 150w"
                            class="w-full h-40 object-cover" />
                        <span
                            class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">Pelepasan
                            Atlet Kabupaten Bogor ke POPDA XIII dan FORNAS VII</span>
                        <span class="tanggal block text-left">Jumat, 24 Januari 2025</span>
                    </a>
                    <a title="Klik untuk selengkapnya"
                        href="https://dprd.bogorkab.go.id/foto/wakil-ketua-ii-dprd-kota-bandung-hadiri-haul-bung-karno-ke-53">
                        <img alt="img-20230704-092518-248.jpg"
                            src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2022/03/demo-3-scaled.jpg?resize=251%2C250&amp;ssl=1"
                            class="w-full h-40 object-cover" />
                        <span
                            class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">Cibinong-
                            Pemerintah Kabupaten Bogor memulai pembangunan jalan di beberapa daerah yang sebelumnya sulit
                            dijangkau.</span>
                        <span class="tanggal block text-left">Selasa, 14 Januari 2025</span>
                    </a>
                    <a title="Klik untuk selengkapnya"
                        href="https://dprd.bogorkab.go.id/foto/ketua-dprd-kota-bandung-khatib-salat-idul-adha-di-masjid-al-kautsar">
                        <img alt="img-20230704-085534-153.jpg"
                            src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/dapil-5.jpeg?resize=150%2C150&amp;ssl=1 150w"
                            class="w-full h-40 object-cover" />
                        <span
                            class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">Rapat
                            Paripurna DPRD Kabupaten Bogor, 13 Januari 2025</span>
                        <span class="tanggal block text-left">Kamis, 6 Maret 2025</span>
                    </a>
                    <a title="Klik untuk selengkapnya"
                        href="https://dprd.bogorkab.go.id/foto/ketua-dprd-kota-bandung-hadiri-silaturahmi-himpaudi-kecamatan-rancasari">
                        <img alt="img-20230523-111227-198.jpg"
                            src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2022/03/demo-3-scaled.jpg?resize=251%2C250&amp;ssl=1"
                            class="w-full h-40 object-cover" />
                        <span
                            class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">Ketua
                            DPRD Kabupaten Bogor Hadiri Silaturahmi HIMPAUDI Kecamatan Rancasari</span>
                        <span class="tanggal block text-left">Rabu, 21 Februari 2025</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- Video Section -->
        <section class="video-section px-16 mb-8">
            <div class="flex items-center justify-center mb-4">
                <div class="flex-grow border-t border-gray-700"></div>
                <span class="px-4 text-lg font-bold text-black">Video</span>
                <div class="flex-grow border-t border-gray-700"></div>
            </div>
            <div class="wrapper">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                    <a title="Klik untuk selengkapnya"
                        href="https://dprd.bogorkab.go.id/video/launching-pendistribusian-subsidi-kebutuhan-pokok">
                        <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2021/06/WhatsApp-Image-2021-06-21-at-12.35.07.jpeg?resize=251%2C250&amp;ssl=1"
                            alt="youtube" class="w-full h-auto" />
                        <span
                            class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">Cibinong
                            – DPRD Kabupaten Bogor menyampaikan tanggapan sekaligus rekomendasi terhadap Laporan Pertanggung
                            Jawaban (LKPJ)</span>
                        <span class="tanggal block text-left">Kamis, 29 April 2020</span>
                    </a>
                    <a title="Klik untuk selengkapnya"
                        href="https://dprd.bogorkab.go.id/video/tedy-rusmawan-buka-prosesi-awal-renovasi-masjid-nurul-iman-pandanwangi-cijaura">
                        <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2021/05/WhatsApp-Image-2021-05-01-at-07.38.47.jpeg?resize=500%2C500&amp;ssl=1 500w, https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2021/05/WhatsApp-Image-2021-05-01-at-07.38.47.jpeg?resize=400%2C400&amp;ssl=1"
                            alt="youtube" class="w-full h-auto" />
                        <span
                            class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">Rekomendasi
                            DPRD Terhadap LKPJ Bupati Bogor Tahun Anggaran 2020</span>
                        <span class="tanggal block text-left">Jumat, 5 Maret 2020</span>
                    </a>
                    <a title="Klik untuk selengkapnya"
                        href="https://dprd.bogorkab.go.id/video/ketua-dprd-kota-bandung-tedy-rusmawan-mengunjungi-kawasan-sekemala-integrated-farming-sein-farm">
                        <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2021/06/WhatsApp-Image-2021-06-04-at-03.42.15-2.jpeg?resize=500%2C500&amp;ssl=1"
                            class="attachment-metro-magazine-three-row size-metro-magazine-three-row wp-post-image"
                            alt="youtube" class="w-full h-auto" />
                        <span
                            class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">Ketua
                            DPRD Kabupaten Bogor : Ajak Semua Elemen Meningkatkan Semangat Solidaritas, Gotong Royong dan
                            Mengedepankan Kearifan Budaya Lokal di Hari Jadi Bogor ke 539</span>
                        <span class="tanggal block text-left">Kamis, 25 Februari 2021</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Alat Kelengkapan Dewan Section -->
        <section class="alat-kelengkapan-dewan-section px-16 mb-8">
            <div class="flex items-center justify-center mb-4">
                <div class="flex-grow border-t border-gray-700"></div>
                <span class="px-4 text-lg font-bold text-black">Alat Kelengkapan Dewan</span>
                <div class="flex-grow border-t border-gray-700"></div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7 gap-2 justify-center mt-4">
                <div class="cell text-center">
                    <a href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/pimpinan-dprd">
                        <img class="imej w-28 h-auto mx-auto" src="assets/Logo_DPRD.webp" alt="pimpinan-dprd" />
                        <span class="judul block text-center mt-2 text-sm text-gray-700">Pimpinan DPRD</span>
                    </a>
                </div>

                <div class="cell text-center">
                    <a href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/badan-musyawarah">
                        <img class="imej w-28 h-auto mx-auto" src="assets/Logo_DPRD.webp" alt="badan-musyawarah" />
                        <span class="judul block text-center mt-2 text-sm text-gray-700">Badan Musyawarah</span>
                    </a>
                </div>

                <div class="cell text-center">
                    <a href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/badan-anggaran">
                        <img class="imej w-28 h-auto mx-auto" src="assets/Logo_DPRD.webp" alt="badan-anggaran" />
                        <span class="judul block text-center mt-2 text-sm text-gray-700">Badan Anggaran</span>
                    </a>
                </div>

                <div class="cell text-center">
                    <a href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/badan-kehormatan">
                        <img class="imej w-28 h-auto mx-auto" src="assets/Logo_DPRD.webp" alt="badan-kehormatan" />
                        <span class="judul block text-center mt-2 text-sm text-gray-700">Badan Kehormatan</span>
                    </a>
                </div>

                <div class="cell text-center">
                    <a href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/badan-pembentukan-perda">
                        <img class="imej w-28 h-auto mx-auto" src="assets/Logo_DPRD.webp"
                            alt="badan-pembentukan-perda" />
                        <span class="judul block text-center mt-2 text-sm text-gray-700">Badan Pembentukan Peraturan
                            Daerah</span>
                    </a>
                </div>

                <div class="cell text-center">
                    <a href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/komisi">
                        <img class="imej w-28 h-auto mx-auto" src="assets/Logo_DPRD.webp" alt="komisi" />
                        <span class="judul block text-center mt-2 text-sm text-gray-700">Komisi</span>
                    </a>
                </div>
            </div>
        </section>

        <section class="fraks-fraksi-section px-16 mb-8">
            <div class="flex items-center justify-center mb-4">
                <div class="flex-grow border-t border-gray-700"></div>
                <span class="px-4 text-lg font-bold text-black">Fraksi-Fraksi</span>
                <div class="flex-grow border-t border-gray-700"></div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7 gap-2 justify-center mt-4">
                <div class="cell">
                    <a href="https://dprd.bandung.go.id/fraksi/partai-keadilan-sejahtera">
                        <img class="imej w-20 h-auto mx-auto border border-gray-300"
                            src="https://dprd.bandung.go.id/img/fraksi/pks-logo.jpg" alt="Partai Keadilan Sejahtera" />
                    </a>
                </div>
                <div class="cell">
                    <a href="https://dprd.bandung.go.id/fraksi/partai-gerakan-indonesia-raya">
                        <img class="imej w-20 h-auto mx-auto border border-gray-300"
                            src="https://dprd.bandung.go.id/img/fraksi/gerindra-logo.jpg"
                            alt="Partai Gerakan Indonesia Raya" />
                    </a>
                </div>
                <div class="cell">
                    <a href="https://dprd.bandung.go.id/fraksi/partai-golongan-karya">
                        <img class="imej w-20 h-auto mx-auto border border-gray-300"
                            src="https://dprd.bandung.go.id/img/fraksi/partai-golkar-logo.jpg"
                            alt="Partai Golongan Karya" />
                    </a>
                </div>
                <div class="cell">
                    <a href="https://dprd.bandung.go.id/fraksi/partai-demokrasi-indonesia-perjuangan">
                        <img class="imej w-20 h-auto mx-auto border border-gray-300"
                            src="https://dprd.bandung.go.id/img/fraksi/pdip-logo.jpg"
                            alt="Partai Demokrasi Indonesia Perjuangan" />
                    </a>
                </div>
                <div class="cell">
                    <a href="https://dprd.bandung.go.id/fraksi/partai-nasional-demokrat">
                        <img class="imej w-20 h-auto mx-auto border border-gray-300"
                            src="https://dprd.bandung.go.id/img/fraksi/nasdemdemokrat.jpg"
                            alt="Partai Nasional Demokrat" />
                    </a>
                </div>
                <div class="cell">
                    <a href="https://dprd.bandung.go.id/fraksi/partai-kebangkitan-bangsa">
                        <img class="imej w-20 h-auto mx-auto border border-gray-300"
                            src="https://dprd.bandung.go.id/img/fraksi/pkb-logo.jpg" alt="Partai Kebangkitan Bangsa" />
                    </a>
                </div>
                <div class="cell">
                    <a href="https://dprd.bandung.go.id/fraksi/partai-solidaritas-indonesia">
                        <img class="imej w-20 h-auto mx-auto border border-gray-300"
                            src="https://dprd.bandung.go.id/img/fraksi/psi-gede-logo.jpg"
                            alt="Partai Solidaritas Indonesia" />
                    </a>
                </div>
            </div>
        </section>
    @endsection
