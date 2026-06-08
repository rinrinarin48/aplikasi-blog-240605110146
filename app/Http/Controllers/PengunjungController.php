<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;

class PengunjungController extends Controller
{
    // Halaman utama: 5 artikel terbaru + widget kategori (bisa difilter)
    public function index(Request $request)
    {
        $kategoriDipilih = $request->query('kategori');

        $query = Artikel::with('penulis', 'kategori')->orderBy('id', 'desc');

        if ($kategoriDipilih) {
            $query->where('id_kategori', $kategoriDipilih);
        }

        $artikel = $query->take(5)->get();

        $kategori = KategoriArtikel::withCount('artikel')
            ->orderBy('nama_kategori', 'asc')
            ->get();

        $totalArtikel = Artikel::count();

        return view('pengunjung.index', compact('artikel', 'kategori', 'totalArtikel', 'kategoriDipilih'));
    }

    // Halaman detail artikel + 5 artikel terkait dari kategori yang sama
    public function detail(string $id)
    {
        $artikel = Artikel::with('penulis', 'kategori')->findOrFail($id);

        $artikelTerkait = Artikel::where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('pengunjung.detail', compact('artikel', 'artikelTerkait'));
    }
}
