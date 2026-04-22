@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col">
        <h1 class="page-title mb-0">Dashboard</h1>
    </div>
    <div class="col-auto">
        <span class="badge bg-white text-dark border p-2">
            <i class="bi bi-calendar3 me-2"></i>{{ now()->format('d M Y') }}
        </span>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="text-muted small">Pendaftar</div>
            <div class="h3 fw-bold mb-0">{{ $stats['total_pendaftar'] }}</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="text-muted small">Artikel</div>
            <div class="h3 fw-bold mb-0">{{ $stats['artikel_bulan_ini'] }}</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="text-muted small">Kegiatan</div>
            <div class="h3 fw-bold mb-0">{{ $stats['kegiatan_aktif'] }}</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm p-3">
            <div class="text-muted small">Admin</div>
            <div class="h3 fw-bold mb-0">{{ $stats['anggota_aktif'] }}</div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <a href="{{ route('dashboard.pendaftar') }}" class="card border-0 shadow-sm text-decoration-none p-4 h-100 action-card">
            <i class="bi bi-person-plus h1 text-primary"></i>
            <h5 class="fw-bold mt-2">Data Pendaftar</h5>
            <p class="text-muted small mb-0">Kelola pendaftaran masuk</p>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('dashboard.artikel.index') }}" class="card border-0 shadow-sm text-decoration-none p-4 h-100 action-card">
            <i class="bi bi-journal-text h1 text-success"></i>
            <h5 class="fw-bold mt-2">Kelola Artikel</h5>
            <p class="text-muted small mb-0">Update konten dan berita</p>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('dashboard.kegiatan.index') }}" class="card border-0 shadow-sm text-decoration-none p-4 h-100 action-card">
            <i class="bi bi-calendar-event h1 text-warning"></i>
            <h5 class="fw-bold mt-2">Jadwal Kegiatan</h5>
            <p class="text-muted small mb-0">Atur agenda lapangan</p>
        </a>
    </div>
</div>

<style>
    .action-card {
        transition: 0.3s;
    }
    .action-card:hover {
        transform: translateY(-5px);
        background: #f8f9fa;
    }
</style>
@endsection
