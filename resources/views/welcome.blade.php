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

                            @foreach ($wartaTampil as $item)
                                @php
                                    $media = $item->hasMedia('images')
                                        ? $item->getFirstMediaUrl('images')
                                        : asset('assets/1.jpg');
                                @endphp
                                <div class="bg-white rounded-md flex flex-col p-4 mt-0">
                                    <!-- Bagian Judul & Tanggal -->
                                    <div class="flex flex-col">
                                        <span
                                            class="text-lg font-bold text-black hover:underline hover:text-black font-sans">
                                            {{ $item->title }}
                                        </span>
                                        <span class="text-black text-sm mt-1">
                                            {{ \Carbon\Carbon::parse($item->tgl_publish)->locale('id')->translatedFormat('l, d F Y') }}
                                        </span>
                                    </div>

                                    <!-- Bagian Gambar & Deskripsi -->
                                    <div class="flex flex-col md:flex-row gap-4 mt-2 items-start">
                                        <!-- Gambar -->
                                        <img src="{{ $media }}" alt="Warta DPRD"
                                            class="w-32 h-[102px] object-cover rounded-md" />

                                        <!-- Deskripsi -->
                                        <div class="flex-1 min-w-0">
                                            <p
                                                class="text-gray-700 line-clamp-5 md:line-clamp-5 sm:line-clamp-5 lg:line-clamp-3 text-ellipsis">
                                                {{ Str::limit(strip_tags($item->text), 150, '...') }}
                                            </p>

                                            <!-- Tombol Baca Selengkapnya -->
                                            <a href="#" class="text-blue-600 mt-2 block md:hidden">Baca
                                                Selengkapnya</a>
                                            <a href="#" class="text-blue-600 mt-2 hidden md:block">Baca
                                                Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                                @foreach ($agenda as $item)
                                    <li class="mb-1">Agenda Kegiatan
                                        {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->locale('id')->translatedFormat('l, d F Y') }}
                                    </li>
                                @endforeach
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
                                @foreach ($warta as $item)
                                    <li class="mb-1">{{ $item->title }}</li>
                                @endforeach
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
                                @foreach ($apaSiapa as $item)
                                    <li class="mb-1">Tamu Kunjungan Kerja
                                        {{ \Carbon\Carbon::parse($item->tanggal_kegiatan_mulai)->locale('id')->translatedFormat('l, d F Y') }}
                                    </li>
                                @endforeach
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
                    @foreach ($wartaTerkini as $item)
                        @php
                            $mediaTerkini = $item->hasMedia('images')
                                ? $item->getFirstMediaUrl('images')
                                : asset('assets/1.jpg');
                        @endphp
                        <div class="content space-y-4">
                            <div class="bg-white rounded-md flex py-4">
                                <!-- Gambar di kiri dengan ukuran lebih besar dan jarak -->
                                <img src="{{ $mediaTerkini }}" alt="Warta DPRD"
                                    class="w-36 h-24 object-cover rounded-md mr-4" />

                                <!-- Judul dan Tanggal di kanan -->
                                <div class="flex flex-col justify-between h-24">
                                    <span
                                        class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                        {{ $item->title }}
                                    </span>
                                    <span class="tanggal text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($item->tgl_publish)->locale('id')->translatedFormat('l, d F Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Section: Terpopuler -->
                <div class="terpopuler-section rounded-lg border-b mb-6">
                    <div class="titelmod flex justify-between items-center w-full">
                        <span class="text-lg font-bold text-black">Terpopuler</span>
                        <!-- <span>Selengkapnya</span> -->
                    </div>
                    @foreach ($wartaTerpopuler as $item)
                        @php
                            $mediaTerpopuler = $item->hasMedia('images')
                                ? $item->getFirstMediaUrl('images')
                                : asset('assets/1.jpg');
                        @endphp
                        <div class="content space-y-4">
                            <div class="bg-white rounded-md flex py-4">
                                <!-- Gambar di kiri dengan ukuran lebih besar dan jarak -->
                                <img src="{{ $mediaTerpopuler }}" alt="Warta DPRD"
                                    class="w-36 h-24 object-cover rounded-md mr-4" />

                                <!-- Judul dan Tanggal di kanan -->
                                <div class="flex flex-col justify-between h-24">
                                    <span
                                        class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                        {{ $item->title }}
                                    </span>
                                    <span class="tanggal text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($item->tgl_publish)->locale('id')->translatedFormat('l, d F Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
