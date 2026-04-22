@extends('layouts.dashboard')

@section('title', 'Pesan Masuk')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col">
        <h1 class="page-title mb-0">Pesan Masuk</h1>
    </div>
</div>

<div class="row g-3">
    @forelse($pesans as $pesan)
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100 p-3 {{ !$pesan->is_read ? 'border-start border-warning border-4' : '' }}">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <h6 class="fw-bold mb-0 text-primary">{{ $pesan->nama }}</h6>
                        <small class="text-muted">{{ $pesan->email }}</small>
                    </div>
                    <small class="text-muted">{{ $pesan->created_at->format('d/m/Y') }}</small>
                </div>
                
                <div class="bg-light p-2 rounded mb-3">
                    <div class="fw-bold small mb-1">{{ $pesan->subjek }}</div>
                    <p class="text-muted small mb-0">{{ Str::limit($pesan->pesan, 100) }}</p>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('dashboard.pesan.show', $pesan->id) }}" class="btn btn-primary btn-sm flex-grow-1">Baca</a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $pesan->id }}" data-name="{{ $pesan->subjek }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">Tidak ada pesan masuk</p>
        </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $pesans->links() }}
</div>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body text-center p-4">
                <h5 class="fw-bold">Hapus Pesan?</h5>
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
            document.getElementById('deleteForm').action = `/dashboard/pesan/${id}`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        });
    });
});
</script>
@endpush
