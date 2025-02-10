<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset --}}

        <!-- Page Content -->
        {{-- <main>
                {{ $slot }}
            </main> --}}

        <header id="header"
            class="bg-[rgba(17,51,85,0.9)] text-white py-4 fixed w-full bg-opacity-80 z-50 transition-all duration-300">
            <div class="container mx-auto px-4 sm:px-16">
                <!-- Baris Atas -->
                <div class="flex justify-between items-center mb-2">
                    <!-- Informasi Kiri -->
                    <p class="text-sm">Jumat, 17 Januari 2025 | DPRD.BogorKab.go.id</p>
                    <!-- Informasi Kanan -->
                    <div>
                        <a href="#" class="text-sm hover:underline">Tentang Kami</a> |
                        <a href="#" class="text-sm hover:underline">Kontak Kami</a>
                    </div>
                </div>

                <!-- Logo dan Navbar -->
                <div class="flex justify-between items-center">
                    <!-- Logo dan Judul -->
                    <div class="flex items-center">
                        <img src="assets/Logo_DPRD.webp" alt="Logo DPRD" class="w-20 mr-4" />
                        <h1 class="text-2xl font-bold">
                            DEWAN PERWAKILAN RAKYAT DAERAH<br />
                            <span class="text-green-400">KABUPATEN BOGOR</span>
                        </h1>
                    </div>

                    <!-- Hamburger Button -->
                    <button id="hamburger" class="md:hidden focus:outline-none">
                        <span class="block w-6 h-1 bg-white mb-1"></span>
                        <span class="block w-6 h-1 bg-white mb-1"></span>
                        <span class="block w-6 h-1 bg-white"></span>
                    </button>

                    <!-- Desktop Menu -->
                    <nav id="menu" class="hidden md:flex md:space-x-6">
                        <ul class="flex flex-col md:flex-row md:space-x-4">
                            <li><a href="#" class="hover:underline">BERANDA</a></li>
                            <li><a href="#" class="hover:underline">AGENDA</a></li>
                            <li><a href="index-warta.html" class="hover:underline">WARTA</a></li>
                            <li>
                                <a href="#" class="hover:underline">PROFIL
                                    <span class="dropdown-icon">▼</span>
                                </a>

                                <ul>
                                    <li><a href="#">Apa & Siapa</a></li>
                                    <li><a href="#">Daftar Anggota DPRD</a></li>
                                    <li><a href="#">Sejarah DPRD</a></li>
                                    <li><a href="#">Tupoksi</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">AKD
                                    <span class="dropdown-icon">▼</span>
                                </a>
                                <ul>
                                    <li><a href="#">Pimpinan</a></li>
                                    <li><a href="#">Badan Musyawarah</a></li>
                                    <li><a href="#">Badan Anggaran</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">FRAKSI
                                    <span class="dropdown-icon">▼</span>
                                </a>
                                <ul>
                                    <li><a href="#">Partai Golongan Karya</a></li>
                                    <li><a href="#">Partai Keadilan Sejahtera</a></li>
                                    <li><a href="#">Partai Solidaritas Indonesia</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="hover:underline">SEKRETARIAT
                                    <span class="dropdown-icon">▼</span>
                                </a>
                                <ul>
                                    <li><a href="#">Sejarah Lembaga</a></li>
                                    <li><a href="#">Tugas Pokok Fungsi</a></li>
                                    <li><a href="#">Visi Misi</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="hover:underline">JDIH</a></li>
                            <li><a href="#" class="hover:underline">GALERI
                                    <span class="dropdown-icon">▼</span>
                                </a>
                                <ul>
                                    <li><a href="#">Foto</a></li>
                                    <li><a href="#">Video</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="hover:underline">CARI</a></li>
                        </ul>
                    </nav>

                    <!-- Mobile Menu -->
                    <div id="sidebar"
                        class="fixed left-0 top-0 w-64 h-full bg-[rgba(17,51,85,0.9)] text-white transform -translate-x-full transition-transform">
                        <div class="p-6">
                            <button id="closeSidebar" class="text-white mb-4 focus:outline-none">
                                ✕
                            </button>
                            <ul class="space-y-4">
                                <li><a href="#" class="hover:underline">BERANDA</a></li>
                                <li><a href="#" class="hover:underline">AGENDA</a></li>
                                <li><a href="index-warta.html" class="hover:underline">WARTA</a></li>
                                <li>
                                    <button
                                        class="w-full text-left flex justify-between items-center hover:underline submenu-toggle focus:outline-none">
                                        PROFIL
                                        <span class="submenu-icon">▼</span>
                                    </button>
                                    <ul class="pl-4 mt-2 space-y-2 hidden submenu">
                                        <li><a href="#" class="hover:underline">Apa & Siapa</a></li>
                                        <li><a href="#" class="hover:underline">Daftar Anggota DPRD</a></li>
                                        <li><a href="#" class="hover:underline">Sejarah DPRD</a></li>
                                        <li><a href="#" class="hover:underline">Tupoksi</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <button
                                        class="w-full text-left flex justify-between items-center hover:underline submenu-toggle focus:outline-none">
                                        AKD
                                        <span class="submenu-icon">▼</span>
                                    </button>
                                    <ul class="pl-4 mt-2 space-y-2 hidden submenu">
                                        <li><a href="#" class="hover:underline">Pimpinan</a></li>
                                        <li><a href="#" class="hover:underline">Badan Musyawarah</a></li>
                                        <li><a href="#" class="hover:underline">Badan Anggaran</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <button
                                        class="w-full text-left flex justify-between items-center hover:underline submenu-toggle focus:outline-none">
                                        FRAKSI
                                        <span class="submenu-icon">▼</span>
                                    </button>
                                    <ul class="pl-4 mt-2 space-y-2 hidden submenu">
                                        <li><a href="#" class="hover:underline">Partai Golongan Karya</a></li>
                                        <li><a href="#" class="hover:underline">Partai Keadilan Sejahtera</a>
                                        </li>
                                        <li><a href="#" class="hover:underline">Partai Solidaritas Indonesia</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <button
                                        class="w-full text-left flex justify-between items-center hover:underline submenu-toggle focus:outline-none">
                                        SEKRETARIAT
                                        <span class="submenu-icon">▼</span>
                                    </button>
                                    <ul class="pl-4 mt-2 space-y-2 hidden submenu">
                                        <li><a href="#" class="hover:underline">Sejarah Lembaga</a></li>
                                        <li><a href="#" class="hover:underline">Tugas Pokok Fungsi</a></li>
                                        <li><a href="#" class="hover:underline">Visi Misi</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="hover:underline">JDIH</a></li>
                                <li>
                                    <button
                                        class="w-full text-left flex justify-between items-center hover:underline submenu-toggle focus:outline-none">
                                        GALERI
                                        <span class="submenu-icon">▼</span>
                                    </button>
                                    <ul class="pl-4 mt-2 space-y-2 hidden submenu">
                                        <li><a href="#" class="hover:underline">Foto</a></li>
                                        <li><a href="#" class="hover:underline">Video</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="hover:underline">CARI</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="bg-gray-800 text-white py-4">
            <div class="container mx-auto">
                <!-- Footer 1 -->
                <div id="footer1" style="padding: 20px;">
                    <div class="wrapall">
                        <div class="vspace">
                            <div class="wrapper">
                                <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px;">
                                    <!-- Profil DPRD -->
                                    <div class="tl-6" style="flex: 1; min-width: 250px;">
                                        <div class="cell">
                                            <ul class="ul1" style="list-style-type: disc; padding-left: 20px;">
                                                <a href="https://dprd.bogorkab.go.id/profil"
                                                    style="font-weight: bold;">Profil DPRD</a>
                                                <ul class="ul2" style="list-style-type: circle;">
                                                    <li><a href="https://dprd.bogorkab.go.id/apa-siapa">Apa &amp;
                                                            Siapa</a>
                                                    </li>
                                                    <li><a href="https://dprd.bogorkab.go.id/profil/daftar-anggota">Daftar
                                                            Anggota DPRD</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/profil/sejarah-dprd-kota-bandung">Sejarah
                                                            DPRD</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/profil/kedudukan-tugas-pokok-serta-hak-dan-kewajiban">Tupoksi</a>
                                                    </li>
                                                    <li><a href="https://dprd.bogorkab.go.id/profil/tata-tertib-dewan">Tata
                                                            Tertib Dewan</a></li>
                                                </ul>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Alat Kelengkapan Dewan -->
                                    <div class="tl-6" style="flex: 1; min-width: 250px;">
                                        <div class="cell">
                                            <ul class="ul1" style="list-style-type: disc; padding-left: 20px;">
                                                <a href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan"
                                                    style="font-weight: bold;">Alat Kelengkapan Dewan</a>
                                                <ul class="ul2" style="list-style-type: circle;">
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/pimpinan-dprd">Pimpinan</a>
                                                    </li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/badan-musyawarah">Badan
                                                            Musyawarah</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/badan-anggaran">Badan
                                                            Anggaran</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/badan-kehormatan">Badan
                                                            Kehormatan</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/badan-pembentukan-perda">Badan
                                                            Pembentukan Perda</a></li>
                                                </ul>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Komisi-Komisi -->
                                    <div class="tl-5" style="flex: 1; min-width: 250px;">
                                        <div class="cell">
                                            <ul class="ul1" style="list-style-type: disc; padding-left: 20px;">
                                                <a href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/komisi"
                                                    style="font-weight: bold;">Komisi-Komisi</a>
                                                <ul class="ul2" style="list-style-type: circle;">
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/komisi-1">Komisi
                                                            I</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/komisi-2">Komisi
                                                            II</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/komisi-3">Komisi
                                                            III</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/alat-kelengkapan-dewan/komisi-4">Komisi
                                                            IV</a></li>
                                                </ul>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Fraksi-Fraksi -->
                                    <div class="tl-7" style="flex: 1; min-width: 250px;">
                                        <div class="cell">
                                            <ul class="ul1" style="list-style-type: disc; padding-left: 20px;">
                                                <a href="https://dprd.bogorkab.go.id/fraksi"
                                                    style="font-weight: bold;">Fraksi-Fraksi</a>
                                                <ul class="ul2" style="list-style-type: circle;">
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/fraksi/partai-keadilan-sejahtera">Partai
                                                            Keadilan Sejahtera</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/fraksi/partai-gerakan-indonesia-raya">Partai
                                                            Gerakan Indonesia Raya</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/fraksi/partai-golongan-karya">Partai
                                                            Golongan Karya</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/fraksi/partai-demokrasi-indonesia-perjuangan">Partai
                                                            Demokrasi Indonesia Perjuangan</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/fraksi/partai-nasional-demokrat">Partai
                                                            Nasional Demokrat</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/fraksi/partai-kebangkitan-bangsa">Partai
                                                            Kebangkitan Bangsa</a></li>
                                                    <li><a
                                                            href="https://dprd.bogorkab.go.id/fraksi/partai-solidaritas-indonesia">Partai
                                                            Solidaritas Indonesia</a></li>
                                                </ul>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer 2 -->
                <section class="section-before-footer bg-[rgba(17,51,85,0.9)] text-white mt-12 px-20">
                    <div class="container mx-auto py-10">
                        <div class="flex flex-col md:flex-row items-start justify-between space-y-8 md:space-y-0">
                            <!-- Bagian Kiri dengan Logo dan Informasi Situs Web -->
                            <div class="flex flex-col items-start space-y-4 md:w-1/3">
                                <!-- Logo -->
                                <div class="flex items-center space-x-4">
                                    <img src="assets/Logo_DPRD.webp" alt="Logo DPRD" class="h-12" />
                                    <div>
                                        <h3 class="text-lg font-semibold text-white">
                                            DEWAN PERWAKILAN RAKYAT DAERAH KABUPATEN BOGOR
                                        </h3>
                                    </div>
                                </div>
                                <!-- Informasi Situs Web -->
                                <div class="text-sm">
                                    <p>
                                        <strong>Situs web resmi Dewan Perwakilan Rakyat Daerah Kabupaten Bogor</strong>,
                                        menyajikan informasi seputar aktifitas Dewan, Profil, Fraksi
                                        Partai, Komisi, Badan DPRD.
                                    </p>
                                    <p>Jl. Segar, Tengah, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16914</p>
                                    <p>(022) 87243095 (Humas)</p>
                                </div>
                            </div>

                            <!-- Bagian Informasi Lainnya dan Portal Informasi -->
                            <div class="info-container flex flex-wrap gap-8">
                                <!-- Informasi Lainnya -->
                                <div class="informasi-lainnya">
                                    <h5 class="font-semibold mt-4">Informasi Lainnya:</h5>
                                    <ul class="list-disc pl-5">
                                        <li><a href="#">Sejarah Lembaga</a></li>
                                        <li><a href="#">Tugas Pokok & Fungsi</a></li>
                                        <li><a href="#">Visi Misi</a></li>
                                        <li><a href="#">Struktur Organisasi</a></li>
                                        <li><a href="#">Pejabat Struktural</a></li>
                                    </ul>
                                </div>

                                <!-- Portal Informasi -->
                                <div class="portal-informasi">
                                    <h5 class="font-semibold mt-4">Portal Informasi:</h5>
                                    <ul class="list-disc pl-5">
                                        <li><a href="#">Presiden Republik Indonesia</a></li>
                                        <li>
                                            <a href="#">Dewan Perwakilan Rakyat Republik Indonesia</a>
                                        </li>
                                        <li>
                                            <a href="#">Kementrian Dalam Negeri Republik Indonesia</a>
                                        </li>
                                        <li><a href="#">Pemerintah Provinsi Jawa Barat</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Bagian Statistik Pengunjung -->
                            <div class="text-sm md:w-1/6">
                                <h4 class="font-semibold mb-4">Statistik Pengunjung</h4>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span>Online:</span>
                                        <span class="font-medium">40</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Hari ini:</span>
                                        <span class="font-medium">364</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Kemarin:</span>
                                        <span class="font-medium">377</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Minggu ini:</span>
                                        <span class="font-medium">3.190</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Bulan ini:</span>
                                        <span class="font-medium">4.981</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Total:</span>
                                        <span class="font-medium">57.151</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container mx-auto text-center">
                    <p>
                        Copyright © 2025 DPRD Kabupaten Bogor Hak Cipta Dilindungi
                        Undang-Undang
                    </p>
                </div>
            </div>
        </footer>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

@isset($script)
    {{ $script }}
@endisset

</html>
