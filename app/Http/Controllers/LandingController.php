<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Agenda;
use App\Models\ApaSiapa;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil tanggal hari ini
        $today = \Carbon\Carbon::now()->locale('id');

        // Warta Tampil (title, tgl_publish, text)
        $wartaTampil = Articles::with('media')->where('status_articles', 'publish')
            ->where('status_tampil', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        // Warta Terpopuler (10 hari terakhir, title, tgl_publish)
        $wartaTerpopuler = Articles::with('media')
            ->where('status_articles', 'publish')
            ->where('spesial_kategori', 'terpopuler')
            ->whereBetween('tgl_publish', [$today->copy()->subDays(10), $today])
            ->orderBy('tgl_publish', 'desc')
            ->get();

        // Jika tidak ada data dalam 10 hari terakhir, ambil data terbaru tanpa batasan tanggal
        if ($wartaTerpopuler->isEmpty()) {
            $wartaTerpopuler = Articles::with('media')
                ->where('status_articles', 'publish')
                ->where('spesial_kategori', 'terpopuler')
                ->orderBy('tgl_publish', 'desc')
                ->get();
        }

        // Warta Terkini (4 hari terakhir, title, tgl_publish)
        $wartaTerkini = Articles::with('media')
            ->where('status_articles', 'publish')
            ->where('spesial_kategori', 'terkini')
            ->whereBetween('tgl_publish', [$today->copy()->subDays(4), $today])
            ->orderBy('tgl_publish', 'desc')
            ->get(); // <-- Hapus select() agar media bisa diakses

        // Jika tidak ada data dalam 4 hari terakhir, ambil data terbaru yang ada (tanpa batasan tanggal)
        if ($wartaTerkini->isEmpty()) {
            $wartaTerkini = Articles::with('media')->where('status_articles', 'publish')
                ->where('spesial_kategori', 'terkini')
                ->orderBy('tgl_publish', 'desc')
                ->select('title', 'tgl_publish')
                ->get();
        }

        // Warta (status_tampil = 0, hanya title)
        $warta = Articles::where('status_articles', 'publish')
            ->where('status_tampil', 0)
            ->orderBy('created_at', 'desc')
            ->select('title')
            ->get();

        $agenda = Agenda::orderBy('tanggal_kegiatan', 'asc')
            ->select('tanggal_kegiatan')
            ->get();

        $apaSiapa = ApaSiapa::orderBy('tanggal_kegiatan_mulai', 'asc')
            ->select('tanggal_kegiatan_mulai')
            ->get();

        return view('welcome', compact('wartaTampil', 'wartaTerpopuler', 'wartaTerkini', 'warta', 'agenda', 'apaSiapa'));
    }



    public function profil($slug)
    {
        $article = Articles::where('slug', $slug)->firstOrFail();

        return view('landing.profil.profil', compact('article'));
    }

    public function showWarta($slug)
    {
        // dd($slug); // Debugging: Cek apakah slug diterima dengan benar
        $article = Articles::where('slug', $slug)->firstOrFail();
        // dd($article);
        return view('landing.warta.show', compact('article'));
    }
}
