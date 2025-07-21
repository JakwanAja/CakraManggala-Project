<?php
// File: app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function activities()
    {
        return view('activities');
    }

    public function join()
    {
        return view('join');
    }

    public function storePendaftaran(Request $request)
    {
        // Validasi form
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nim' => 'required|string|unique:pendaftaran,nim|max:20',
            'jurusan' => 'required|in:Teknik,Akuntansi,Administrasi Bisnis',
            'program_studi' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Perempuan,Laki-laki',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|before:today',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'organisasi_yang_pernah_diikuti' => 'nullable|string',
            'alasan_bergabung' => 'required|string|min:20',
            'foto_diri' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'nim.required' => 'NIM wajib diisi',
            'nim.unique' => 'NIM sudah terdaftar',
            'jurusan.required' => 'Jurusan wajib dipilih',
            'tanggal_lahir.before' => 'Tanggal lahir tidak valid',
            'alasan_bergabung.min' => 'Alasan bergabung minimal 20 karakter',
            'foto_diri.required' => 'Foto diri wajib diunggah',
            'foto_diri.image' => 'File harus berupa gambar',
            'foto_diri.max' => 'Ukuran foto maksimal 2MB',
        ]);

        // Upload foto
        if ($request->hasFile('foto_diri')) {
            $fileName = time() . '_' . $request->file('foto_diri')->getClientOriginalName();
            $filePath = $request->file('foto_diri')->storeAs('pendaftaran', $fileName, 'public');
            $validated['foto_diri'] = $filePath;
        }

        // Simpan ke database
        $pendaftaran = Pendaftaran::create($validated);

        // Redirect ke halaman sukses
        return redirect()->route('join.success', ['id' => $pendaftaran->id])
                        ->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function joinSuccess($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('join-success', compact('pendaftaran'));
    }

    public function contact()
    {
        return view('contact');
    }
}