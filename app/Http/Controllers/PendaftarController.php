<?php
// File: app/Http/Controllers/PendaftarController.php

namespace App\Http\Controllers;

use App\Exports\PendaftarExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PendaftarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $jurusan = $request->get('jurusan');
        $perPage = $request->get('per_page', 10);
        
        $query = DB::table('pendaftaran')->orderBy('created_at', 'desc');
        
        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_lengkap', 'LIKE', "%{$search}%")
                  ->orWhere('nim', 'LIKE', "%{$search}%")
                  ->orWhere('program_studi', 'LIKE', "%{$search}%");
            });
        }
        
        // Apply jurusan filter
        if ($jurusan) {
            $query->where('jurusan', $jurusan);
        }
        
        $pendaftar = $query->paginate($perPage);
        
        // Get statistics
        $stats = [
            'total' => DB::table('pendaftaran')->count(),
            'teknik' => DB::table('pendaftaran')->where('jurusan', 'Teknik')->count(),
            'akuntansi' => DB::table('pendaftaran')->where('jurusan', 'Akuntansi')->count(),
            'administrasi' => DB::table('pendaftaran')->where('jurusan', 'Administrasi Bisnis')->count(),
            'bulan_ini' => DB::table('pendaftaran')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count()
        ];
        
        return view('dashboard.pendaftar.index', compact('pendaftar', 'stats', 'search', 'jurusan', 'perPage'));
    }
    
    public function show($id)
    {
        $pendaftar = DB::table('pendaftaran')->where('id', $id)->first();
        
        if (!$pendaftar) {
            return redirect()->route('dashboard.pendaftar')
                ->with('error', 'Data pendaftar tidak ditemukan.');
        }
        
        return view('dashboard.pendaftar.show', compact('pendaftar'));
    }
    
    public function destroy($id)
    {
        $pendaftar = DB::table('pendaftaran')->where('id', $id)->first();
        
        if (!$pendaftar) {
            return redirect()->route('dashboard.pendaftar')
                ->with('error', 'Data pendaftar tidak ditemukan.');
        }
        
        // Delete photo if exists
        if ($pendaftar->foto_diri && Storage::disk('public')->exists($pendaftar->foto_diri)) {
            Storage::disk('public')->delete($pendaftar->foto_diri);
        }
        
        // Delete record
        DB::table('pendaftaran')->where('id', $id)->delete();
        
        return redirect()->route('dashboard.pendaftar')
            ->with('success', 'Data pendaftar berhasil dihapus.');
    }

    public function export(Request $request)
    {
        try {
            $search = $request->get('search');
            $jurusan = $request->get('jurusan');
            
            // Debug: cek apakah ada data
            $query = DB::table('pendaftaran');
            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('nama_lengkap', 'LIKE', "%{$search}%")
                      ->orWhere('nim', 'LIKE', "%{$search}%")
                      ->orWhere('program_studi', 'LIKE', "%{$search}%");
                });
            }
            if ($jurusan) {
                $query->where('jurusan', $jurusan);
            }
            
            $dataCount = $query->count();
            
            if ($dataCount == 0) {
                return redirect()->route('dashboard.pendaftar')
                    ->with('error', 'Tidak ada data untuk diexport dengan filter yang dipilih.');
            }
            
            $filename = 'data-pendaftar-' . date('Y-m-d-H-i-s') . '.xlsx';
            
            return Excel::download(new PendaftarExport($search, $jurusan), $filename);
            
        } catch (\Exception $e) {
            return redirect()->route('dashboard.pendaftar')
                ->with('error', 'Terjadi kesalahan saat export data: ' . $e->getMessage());
        }
    }
}