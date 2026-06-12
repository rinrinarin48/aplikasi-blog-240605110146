@extends('layouts.pengunjung')

@section('title', 'Beranda - Blog Kami')

@section('content')
<div class="row g-4">
    <!-- Daftar artikel -->
    <div class="col-lg-8">
        @forelse($artikel as $item)
        <div class="card border-0 shadow-sm mb-4">
            <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}"
                style="width:100%; height:240px; object-fit:cover; border-top-left-radius:.375rem; border-top-right-radius:.375rem;">
            <div class="card-body p-4">
                <span class="badge-kategori">{{ $item->kategori->nama_kategori }}</span>
                <h5 class="fw-bold mt-3 mb-2" style="color:#1f2d3d;">{{ $item->judul }}</h5>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img src="{{ asset('storage/foto/' . ($item->penulis->foto ?: 'default.png')) }}"
                        alt="{{ $item->penulis->nama_depan }}" class="avatar-foto">
                    <span style="font-size:12px; color:#555;">
                        {{ $item->penulis->nama_depan }} {{ $item->penulis->nama_belakang }}
                    </span>
                    <span style="font-size:12px; color:#999;">&bull; {{ $item->hari_tanggal }}</span>
                </div>
                <p style="font-size:13px; color:#555; line-height:1.7;">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 180) }}
                </p>
                <a href="{{ route('artikel.detail', $item->id) }}" class="btn-baca">Baca Selengkapnya &rarr;</a>
            </div>
        </div>
        @empty
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center text-muted" style="font-style:italic;">
                Belum ada artikel untuk ditampilkan.
            </div>
        </div>
        @endforelse
    </div>

    <!-- Widget kategori -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-3">
                <h6 class="fw-bold mb-3" style="color:#1f2d3d;">Kategori Artikel</h6>

                <a href="{{ route('beranda') }}" class="widget-item {{ !$kategoriDipilih ? 'active' : '' }}">
                    <span>Semua Artikel</span>
                    <span class="widget-count">{{ $totalArtikel }}</span>
                </a>

                @foreach($kategori as $k)
                <a href="{{ route('beranda', ['kategori' => $k->id]) }}"
                    class="widget-item {{ $kategoriDipilih == $k->id ? 'active' : '' }}">
                    <span>{{ $k->nama_kategori }}</span>
                    <span class="widget-count">{{ $k->artikel_count }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
