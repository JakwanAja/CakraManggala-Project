@extends('layouts.dashboard')

@section('title', 'Data Pendaftar')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col">
        <h1 class="page-title mb-0">Pendaftar</h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('dashboard.pendaftar.export', request()->query()) }}" class="btn btn-success btn-sm">
            <i class="bi bi-download me-1"></i> Excel
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" class="row g-2">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control form-control-sm" value="{{ $search }}" placeholder="Nama / NIM ...">
            </div>
            <div class="col-md-4">
                <select name="jurusan" class="form-select form-select-sm">
                    <option value="">Semua Jurusan</option>
                    <option value="Teknik" {{ $jurusan == 'Teknik' ? 'selected' : '' }}>Teknik</option>
                    <option value="Akuntansi" {{ $jurusan == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                    <option value="Administrasi Bisnis" {{ $jurusan == 'Administrasi Bisnis' ? 'selected' : '' }}>Administrasi Bisnis</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark btn-sm w-100">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="row g-3">
    @forelse($pendaftar as $item)
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100 p-3">
                <div class="d-flex align-items-center mb-3">
                    @if($item->foto_diri)
                        <img src="{{ asset($item->foto_diri) }}" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="bi bi-person text-muted"></i>
                        </div>
                    @endif
                    <div>
                        <h6 class="fw-bold mb-0">{{ $item->nama_lengkap }}</h6>
                        <small class="text-muted">{{ $item->nim }}</small>
                    </div>
                    <div class="ms-auto">
                        <span class="badge bg-light text-dark border small">{{ $item->jurusan }}</span>
                    </div>
                </div>
                
                <div class="small mb-3">
                    <div class="text-muted mb-1"><i class="bi bi-mortarboard me-2"></i>{{ $item->program_studi }}</div>
                    <div class="text-muted mb-1"><i class="bi bi-whatsapp me-2"></i>{{ $item->no_hp }}</div>
                    <div class="text-muted"><i class="bi bi-calendar-check me-2"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('dashboard.pendaftar.show', $item->id) }}" class="btn btn-primary btn-sm flex-grow-1">Detail</a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $item->id }}" data-name="{{ $item->nama_lengkap }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">Tidak ada data pendaftar</p>
        </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $pendaftar->links() }}
</div>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-body text-center p-4">
                <h5 class="fw-bold">Hapus Pendaftar?</h5>
                <p class="text-muted small" id="deleteName"></p>
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
            const name = this.dataset.name;
            document.getElementById('deleteName').textContent = name;
            document.getElementById('deleteForm').action = `/dashboard/pendaftar/${id}`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        });
    });
});
</script>
@endpush
