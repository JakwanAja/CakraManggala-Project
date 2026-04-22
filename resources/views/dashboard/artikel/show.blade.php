@extends('layouts.dashboard')

@section('title', 'Detail Artikel')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <a href="{{ route('dashboard.artikel.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <div class="d-flex gap-2">
        <a href="{{ route('dashboard.artikel.edit', $artikel) }}" class="btn btn-warning btn-sm">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <form action="{{ route('dashboard.artikel.destroy', $artikel) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-trash"></i> Hapus
            </button>
        </form>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm overflow-hidden">
            @if($artikel->gambar_utama)
                <img src="{{ asset($artikel->gambar_utama) }}" class="card-img-top" style="max-height: 400px; object-fit: cover;">
            @endif
            <div class="card-body p-4">
                <div class="mb-3">
                    <span class="badge {{ $artikel->status == 'published' ? 'bg-success' : 'bg-warning' }}">
                        {{ ucfirst($artikel->status) }}
                    </span>
                    <small class="text-muted ms-2">{{ $artikel->created_at->format('d M Y') }}</small>
                </div>
                <h1 class="fw-bold mb-4">{{ $artikel->judul }}</h1>
                <div class="article-body" style="white-space: pre-wrap; line-height: 1.8;">{!! nl2br(e($artikel->konten)) !!}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-4 mb-4">
            <h6 class="fw-bold mb-3">Statistik & Info</h6>
            <div class="small">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Views:</span>
                    <span class="fw-bold">{{ number_format($artikel->views) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Penulis:</span>
                    <span class="fw-bold">{{ $artikel->user->name }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Slug:</span>
                    <span class="fw-bold">{{ $artikel->slug }}</span>
                </div>
            </div>
            @if($artikel->status == 'published')
                <hr>
                <a href="{{ route('artikel.show', $artikel->slug) }}" target="_blank" class="btn btn-outline-primary btn-sm w-100">
                    <i class="bi bi-eye"></i> Lihat di Website
                </a>
            @endif
        </div>
    </div>
</div>
@endsection