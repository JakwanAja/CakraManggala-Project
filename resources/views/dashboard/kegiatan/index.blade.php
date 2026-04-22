@extends('layouts.dashboard')

@section('title', 'Jadwal Kegiatan')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col">
        <h1 class="page-title mb-0">Jadwal Kegiatan</h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('dashboard.kegiatan.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" class="row g-2">
            <div class="col-md-5">
                <input type="text" name="search" class="form-control form-control-sm" value="{{ $search }}" placeholder="Cari kegiatan...">
            </div>
            <div class="col-md-3">
                <select name="tahun" class="form-select form-select-sm">
                    <option value="">Semua Tahun</option>
                    @foreach($availableYears as $year)
                        <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="sifat" class="form-select form-select-sm">
                    <option value="">Sifat</option>
                    <option value="internal" {{ $sifat == 'internal' ? 'selected' : '' }}>Internal</option>
                    <option value="eksternal" {{ $sifat == 'eksternal' ? 'selected' : '' }}>Eksternal</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark btn-sm w-100">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="row g-3">
    @forelse($kegiatans as $kegiatan)
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100 p-3">
                <div class="d-flex justify-content-between mb-3">
                    <span class="badge {{ $kegiatan->sifat === 'internal' ? 'bg-info' : 'bg-success' }} small">
                        {{ ucfirst($kegiatan->sifat) }}
                    </span>
                    <small class="text-muted fw-bold">{{ $kegiatan->tahun }}</small>
                </div>
                <h6 class="fw-bold mb-2">{{ $kegiatan->judul_kegiatan }}</h6>
                <div class="small text-muted mb-3">
                    <div class="mb-1"><i class="bi bi-calendar-event me-2"></i>{{ $kegiatan->formatted_date }}</div>
                    <div class="mb-1"><i class="bi bi-geo-alt me-2"></i>{{ $kegiatan->tempat }}</div>
                    <div><i class="bi bi-person me-2"></i>{{ $kegiatan->kapel_pj }}</div>
                </div>
                <div class="d-flex gap-2 mt-auto">
                    <a href="{{ route('dashboard.kegiatan.edit', $kegiatan) }}" class="btn btn-light btn-sm flex-grow-1 border">Edit</a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $kegiatan->id }}" data-title="{{ $kegiatan->judul_kegiatan }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">Tidak ada jadwal ditemukan</p>
        </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $kegiatans->links() }}
</div>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body text-center p-4">
                <h5 class="fw-bold">Hapus Kegiatan?</h5>
                <p class="text-muted small" id="deleteTitle"></p>
                <div class="d-flex gap-2 mt-4">
                    <button type="button" class="btn btn-light flex-grow-1" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" class="flex-grow-1">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const title = this.dataset.title;
            document.getElementById('deleteTitle').textContent = title;
            document.getElementById('deleteForm').action = `/dashboard/kegiatan/${id}`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        });
    });
});
</script>
@endpush
