<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Detail Warta
            </h2>
            <a href="{{ route('articles.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
        </div>
    </x-slot>

    <section class="container mx-auto px-16 py-8">
        <div class="grid grid-cols-12 gap-6">
            <!-- Bagian 1: Slider Section (5 kolom) -->
            <div class="lg:col-span-12 col-span-12">
                <!-- Grid Layout -->
                <div class="bg-white p-6">
                    <!-- Kolom Kiri -->
                    <div class="flex flex-col gap-6">
                        <div class="bc border-b border-[#8ac] pb-2">
                            <span class="tabel">
                                <span class="trow">
                                    <span class="mr-2">
                                        <a href="{{ route('landing.index') }}" title="Beranda">
                                            <i class="fa-solid fa-house"></i>
                                        </a>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                    <span>
                                        <a href="{{ route('landing.index') }}">
                                            <span class="teks">Warta</span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>
                        <!-- Header -->
                        <h1
                            class="text-center font-bold text-gray-900 text-2xl lg:text-3xl lg:line-clamp-5 md:line-clamp-4 sm:line-clamp-4">
                            {{ $article->title }}
                        </h1>

                        <!-- Isi Warta -->
                        <div class="flex flex-col gap-6">

                            <!-- Warta 1 -->
                            <div class="space-y-6">
                                <!-- Header Warta -->
                                <div class="flex items-start space-x-3 mt-4">
                                    <!-- Logo -->
                                    <img src="{{ asset('assets/Logo_DPRD.webp') }}" alt="logo dprd" class="w-12 h-12" />

                                    <!-- Editor dan Tanggal -->
                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold text-black">{{ $article->author }}</span>
                                        <div class="border-t border-gray-400 my-1"></div>
                                        <!-- Jarak garis diperkecil -->
                                        <span class="text-sm text-gray-600">
                                            {{ \Carbon\Carbon::parse($article->tgl_publish)->translatedFormat('l, d F Y') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Foto Warta -->
                                <div class="relative flex justify-center mt-4">
                                    @if ($article->getMedia('images')->isNotEmpty())
                                        @foreach ($article->getMedia('images') as $image)
                                            <div class="relative">
                                                <img src="{{ $image->getFullUrl() }}" alt="Warta DPRD"
                                                    class="w-[640px] h-[360px] object-cover rounded-md shadow-md">
                                                <div
                                                    class="absolute bottom-2 right-2 text-white px-2 py-1 text-xs font-medium italic rounded">
                                                    {{-- class="absolute bottom-2 right-2 bg-black bg-opacity-50 text-white px-2 py-1 text-xs font-medium italic rounded"> --}}
                                                    {{ $article->fotografer }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-gray-500">Belum ada gambar yang diunggah.</p>
                                    @endif
                                </div>

                                <!-- Caption Foto -->
                                <div>
                                    <p class="text-base text-black text-justify">
                                        {{ $article->caption }}
                                    </p>
                                </div>

                                <!-- Garis Pembatas -->
                                <div class="border-t-2 border-gray-600 my-4"></div>

                                <!-- Isi Warta -->
                                <div>
                                    <p class="text-lg text-black leading-[150%] mb-6 text-justify">
                                        {!! nl2br($article->text) !!}
                                    </p>
                                </div>

                                <!-- Tags -->
                                @if (!empty($article->tags))
                                    <div class="mt-4">
                                        <h3 class="font-semibold text-gray-700 mb-2">Tags:</h3>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach (json_decode($article->tags) as $tag)
                                                <a href="{{ route('articles.byTag', ['tags' => $tag]) }}"
                                                    class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md text-sm hover:bg-gray-300 transition">
                                                    #{{ $tag }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                            </div>

                            <!-- Bagian SHARE dan KOMENTAR -->
                            {{-- <div class="mt-0">
                                <!-- Bagikan ke Media Sosial -->
                                <div class="sermod text-left font-bold">
                                    BAGIKAN
                                </div>
                                <span class="tabel tglser">
                                    <span class="trow">
                                        <span class="tcell bokser">
                                            <div class="addthis_inline_share_toolbox"></div>
                                        </span>
                                    </span>
                                </span>
                                <div class="sermod text-left font-bold mt-4">
                                    BERI KOMENTAR
                                </div>
                                <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop"
                                    data-href="https://dprd.bandung.go.id/warta/pemkot-revitalisasi-kantor-kewilayahan-kang-asmul-titip-agar-layanan-makin-optimal"
                                    data-width="100%" data-numposts="5" style="width: 100%;" fb-xfbml-state="rendered"
                                    fb-iframe-plugin-query="app_id=&amp;container_width=795&amp;height=100&amp;href=https%3A%2F%2Fdprd.bandung.go.id%2Fwarta%2Fpemkot-revitalisasi-kantor-kewilayahan-kang-asmul-titip-agar-layanan-makin-optimal&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v2.11&amp;width=">
                                    <span style="vertical-align: bottom; width: 100%; height: 209px;">
                                        <iframe name="f1210a8bb696acfe3" width="1000px" height="100px"
                                            data-testid="fb:comments Facebook Social Plugin"
                                            title="fb:comments Facebook Social Plugin" frameborder="0"
                                            allowtransparency="true" allowfullscreen="true" scrolling="no"
                                            allow="encrypted-media"
                                            src="https://www.facebook.com/v2.11/plugins/comments.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Dff2ab9b39e0b71fdb%26domain%3Ddprd.bandung.go.id%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fdprd.bandung.go.id%252Ffa081fe098b919c34%26relation%3Dparent.parent&amp;container_width=795&amp;height=100&amp;href=https%3A%2F%2Fdprd.bandung.go.id%2Fwarta%2Fpemkot-revitalisasi-kantor-kewilayahan-kang-asmul-titip-agar-layanan-makin-optimal&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v2.11&amp;width="
                                            style="border: none; visibility: visible; width: 100%; height: 209px;"
                                            class=""></iframe>
                                    </span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian 2: Terkini (4 kolom) -->
            {{-- <div class="lg:col-span-3 col-span-12">
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
                            <div class="flex flex-col">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500 mt-1">05 December 2024</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md flex py-4 border-t border-gray-300 my-0">
                            <!-- Gambar di kiri dengan ukuran lebih besar dan jarak -->
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <!-- Judul dan Tanggal di kanan -->
                            <div class="flex flex-col">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500 mt-1">05 December 2024</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md flex py-4 border-t border-gray-300 my-0">
                            <!-- Gambar di kiri dengan ukuran lebih besar dan jarak -->
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <!-- Judul dan Tanggal di kanan -->
                            <div class="flex flex-col">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500 mt-1">05 December 2024</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md flex py-4 items-start border-t border-gray-300 my-0">
                            <!-- Gambar di kiri dengan ukuran lebih besar dan jarak -->
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <!-- Judul dan Tanggal di kanan -->
                            <div class="flex flex-col">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500 mt-1">05 December 2024</span>
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
                            <div class="flex flex-col">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500 mt-1">05 December 2024</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md flex py-4 border-t border-gray-300 my-0">
                            <!-- Gambar di kiri dengan ukuran lebih besar dan jarak -->
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <!-- Judul dan Tanggal di kanan -->
                            <div class="flex flex-col">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500 mt-1">05 December 2024</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md flex py-4 items-start border-t border-gray-300 my-0">
                            <!-- Gambar di kiri dengan ukuran lebih besar dan jarak -->
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <!-- Judul dan Tanggal di kanan -->
                            <div class="flex flex-col">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500 mt-1">05 December 2024</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-md flex py-4 items-start border-t border-gray-300 my-0">
                            <!-- Gambar di kiri dengan ukuran lebih besar dan jarak -->
                            <img src="https://i0.wp.com/setwan.bogorkab.go.id/wp-content/uploads/2025/01/paripurna-13-jan-25-1-scaled.jpg?resize=251%2C250&amp;ssl=1"
                                alt="Ketua DPRD Kabupaten Bogor, H. Asep Mulyadi, S.H., dan Pj Wali Kabupaten Bogor A. Koswara menerima kunjungan kerja dari 16 orang anggota Public Accounts Committee (PAC) Malaysia, pada Kamis, 16 Januari 2025, di Gedung DPRD Kabupaten Bogor."
                                class="w-36 h-24 object-cover rounded-md mr-4" />

                            <!-- Judul dan Tanggal di kanan -->
                            <div class="flex flex-col">
                                <span
                                    class="text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2">
                                    Bapemperda DPRD Kabupaten Bogor Gelar Rapat Penyusunan Naskah Akademik Raperda
                                </span>
                                <span class="tanggal text-sm text-gray-500 mt-1">05 December 2024</span>
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
            </div> --}}
        </div>
    </section>

</x-app-layout>
