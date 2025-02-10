{{-- <!-- Hamburger Button -->
<button id="hamburger" class="md:hidden focus:outline-none">
    <span class="block w-6 h-1 bg-white mb-1"></span>
    <span class="block w-6 h-1 bg-white mb-1"></span>
    <span class="block w-6 h-1 bg-white"></span>
</button>

<!-- Desktop Menu -->
<nav id="menu" class="hidden md:flex md:space-x-6">
    <ul class="flex flex-col md:flex-row md:space-x-4">
        <li><a href="index.html" class="hover:underline">BERANDA</a></li>
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
            <li><a href="index.html" class="hover:underline">BERANDA</a></li>
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
                    <li><a href="#" class="hover:underline">Partai Keadilan Sejahtera</a></li>
                    <li><a href="#" class="hover:underline">Partai Solidaritas Indonesia</a></li>
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
</div> --}}
