@extends('layouts.pengunjung')

@section('title', $artikel->judul . ' - Blog Kami')

@section('content')
<!-- Breadcrumb -->
<div class="mb-3" style="font-size:13px;">
    <a href="{{ route('beranda') }}" style="color:#1d4ed8; text-decoration:none;">Beranda</a>
    <span style="color:#aaa;"> / </span>
    <a href="{{ route('beranda', ['kategori' => $artikel->id_kategori]) }}" style="color:#1d4ed8; text-decoration:none;">
        {{ $artikel->kategori->nama_kategori }}
    </a>
    <span style="color:#aaa;"> / </span>
    <span style="color:#888;">{{ \Illuminate\Support\Str::limit($artikel->judul, 40) }}</span>
</div>

<div class="row g-4">
    <!-- Isi artikel -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
                style="width:100%; height:320px; object-fit:cover; border-top-left-radius:.375rem; border-top-right-radius:.375rem;">
            <div class="card-body p-4">
                <span class="badge-kategori">{{ $artikel->kategori->nama_kategori }}</span>
                <h3 class="fw-bold mt-3 mb-3" style="color:#1f2d3d;">{{ $artikel->judul }}</h3>

                <div class="d-flex align-items-center gap-2 mb-4">
                    <img src="{{ asset('storage/foto/' . ($artikel->penulis->foto ?: 'default.png')) }}"
                        alt="{{ $artikel->penulis->nama_depan }}" class="avatar-foto">
                    <div>
                        <div style="font-size:13px; font-weight:600; color:#1f2d3d;">
                            {{ $artikel->penulis->nama_depan }} {{ $artikel->penulis->nama_belakang }}
                        </div>
                        <div style="font-size:12px; color:#999;">{{ $artikel->hari_tanggal }}</div>
                    </div>
                </div>

                <div style="font-size:14px; color:#333; line-height:1.9;">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>

                <hr class="my-4">
                <a href="{{ route('beranda') }}" style="color:#1d4ed8; text-decoration:none; font-size:13px;">
                    &larr; Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <!-- Artikel terkait -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-3">
                <h6 class="fw-bold mb-3" style="color:#1f2d3d;">Artikel Terkait</h6>

                @forelse($artikelTerkait as $t)
                <a href="{{ route('artikel.detail', $t->id) }}"
                    class="d-flex gap-2 mb-3 text-decoration-none" style="color:inherit;">
                    <img src="{{ asset('storage/gambar/' . $t->gambar) }}" alt="{{ $t->judul }}"
                        style="width:64px; height:48px; object-fit:cover; border-radius:6px; flex-shrink:0; border:1px solid #e9ecef;">
                    <div>
                        <div style="font-size:13px; font-weight:600; color:#1f2d3d; line-height:1.3;">
                            {{ \Illuminate\Support\Str::limit($t->judul, 50) }}
                        </div>
                        <div style="font-size:11px; color:#999;">{{ $t->hari_tanggal }}</div>
                    </div>
                </a>
                @empty
                <p style="font-size:13px; color:#999; font-style:italic;">Belum ada artikel terkait.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
