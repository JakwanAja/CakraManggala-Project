@extends('layouts.dashboard')

@section('title', 'Detail Pesan')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <a href="{{ route('dashboard.pesan') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <form action="{{ route('dashboard.pesan.destroy', $pesan->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-trash"></i> Hapus
        </button>
    </form>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3">{{ $pesan->subjek }}</h5>
                <div class="p-3 bg-light rounded" style="white-space: pre-wrap;">{{ $pesan->pesan }}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-4">
            <h6 class="fw-bold mb-3">Info Pengirim</h6>
            <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                    {{ strtoupper(substr($pesan->nama, 0, 1)) }}
                </div>
                <div>
                    <div class="fw-bold">{{ $pesan->nama }}</div>
                    <div class="small text-muted">{{ $pesan->email }}</div>
                </div>
            </div>
            <div class="small text-muted mb-4">
                <i class="bi bi-calendar3 me-2"></i>{{ $pesan->created_at->format('d M Y, H:i') }}
            </div>
            <a href="mailto:{{ $pesan->email }}?subject=Re: {{ $pesan->subjek }}" class="btn btn-primary w-100">
                <i class="bi bi-reply me-1"></i> Balas Email
            </a>
        </div>
    </div>
</div>
@endsection
