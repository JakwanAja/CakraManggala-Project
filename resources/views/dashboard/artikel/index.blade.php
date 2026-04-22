@extends('layouts.dashboard')

@section('title', 'Artikel')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col">
        <h1 class="page-title mb-0">Artikel</h1>
    </div>
    <div class="col-auto">
        <a href="{{ route('dashboard.artikel.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Buat Baru
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" class="row g-2">
            <div class="col-md-7">
                <input type="text" name="search" class="form-control form-control-sm" value="{{ $search }}" placeholder="Cari judul...">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select form-select-sm">
                    <option value="">Semua Status</option>
                    <option value="published" {{ $status == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ $status == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark btn-sm w-100">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="row g-3">
    @forelse($artikels as $artikel)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm overflow-hidden">
                @if($artikel->gambar_utama)
                    <img src="{{ asset($artikel->gambar_utama) }}" class="card-img-top" style="height: 160px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 160px;">
                        <i class="bi bi-image text-muted h1"></i>
                    </div>
                @endif
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="badge {{ $artikel->status === 'published' ? 'bg-success' : 'bg-warning' }} small">
                            {{ ucfirst($artikel->status) }}
                        </span>
                        <small class="text-muted"><i class="bi bi-eye me-1"></i>{{ $artikel->views }}</small>
                    </div>
                    <h6 class="fw-bold mb-1">{{ Str::limit($artikel->judul, 50) }}</h6>
                    <p class="text-muted small mb-3">{{ $artikel->created_at->format('d M Y') }}</p>
                    
                    <div class="d-flex gap-2">
                        <a href="{{ route('dashboard.artikel.edit', $artikel) }}" class="btn btn-outline-warning btn-sm flex-grow-1">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('dashboard.artikel.toggle-status', $artikel) }}" method="POST" class="flex-grow-1">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn btn-outline-secondary btn-sm w-100">
                                <i class="bi bi-arrow-repeat"></i> Status
                            </button>
                        </form>
                        <button type="button" class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $artikel->id }}" data-title="{{ $artikel->judul }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-newspaper h1 text-muted"></i>
            <p class="text-muted mt-2">Belum ada artikel ditemukan</p>
        </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $artikels->links() }}
</div>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body text-center p-4">
                <i class="bi bi-exclamation-circle text-danger h1"></i>
                <h5 class="fw-bold mt-3">Hapus Artikel?</h5>
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
            document.getElementById('deleteForm').action = `/dashboard/artikel/${id}`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        });
    });
});
</script>
@endpush
