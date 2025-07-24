<?php
// File: app/Http/Controllers/PendaftarController.php (Improved Version)

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Exports\PendaftarExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PendaftarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $jurusan = $request->get('jurusan');
        $perPage = $request->get('per_page', 10);
        
        $query = Pendaftaran::query()->orderBy('created_at', 'desc');
        
        // Apply search filter
        if ($search) {
            $query->search($search);
        }
        
        // Apply jurusan filter
        if ($jurusan) {
            $query->byJurusan($jurusan);
        }
        
        $pendaftar = $query->paginate($perPage);
        
        // Get statistics
        $stats = [
            'total' => Pendaftaran::count(),
            'teknik' => Pendaftaran::byJurusan('Teknik')->count(),
            'akuntansi' => Pendaftaran::byJurusan('Akuntansi')->count(),
            'administrasi' => Pendaftaran::byJurusan('Administrasi Bisnis')->count(),
            'bulan_ini' => Pendaftaran::thisMonth()->count()
        ];
        
        return view('dashboard.pendaftar.index', compact('pendaftar', 'stats', 'search', 'jurusan', 'perPage'));
    }
    
    public function show($id)
    {
        $pendaftar = Pendaftaran::find($id);
        
        if (!$pendaftar) {
            return redirect()->route('dashboard.pendaftar')
                ->with('error', 'Data pendaftar tidak ditemukan.');
        }
        
        return view('dashboard.pendaftar.show', compact('pendaftar'));
    }
    
    public function destroy($id)
    {
        $pendaftar = Pendaftaran::find($id);
        
        if (!$pendaftar) {
            return redirect()->route('dashboard.pendaftar')
                ->with('error', 'Data pendaftar tidak ditemukan.');
        }
        
        // Delete photo if exists
        if ($pendaftar->foto_diri && Storage::disk('public')->exists($pendaftar->foto_diri)) {
            Storage::disk('public')->delete($pendaftar->foto_diri);
        }
        
        // Delete record
        $pendaftar->delete();
        
        return redirect()->route('dashboard.pendaftar')
            ->with('success', 'Data pendaftar berhasil dihapus.');
    }

    public function export(Request $request)
    {
        $search = $request->get('search');
        $jurusan = $request->get('jurusan');
        
        $filename = 'data-pendaftar-' . date('Y-m-d-H-i-s') . '.xlsx';
        
        return Excel::download(new PendaftarExport($search, $jurusan), $filename);
    }
}