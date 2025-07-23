<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index()
    {
        // Data pengurus (opsional, bisa juga langsung di view)
        $pengurus = [
            'ketua' => [
                'nama' => 'Satria Dwi Saputra',
                'jabatan' => 'Ketua Umum',
                'jurusan' => 'Teknik Listrik \'23',
                'quote' => 'Tidak perlu kata-kata yang penting bukti nyata',
                'foto' => 'images/pengurus/ketua.jpg'
            ],
            'inti' => [
                [
                    'nama' => 'Naufal Rohmanul Muhaimin',
                    'jabatan' => 'Sekretaris',
                    'jurusan' => 'Teknik Komputer Kontrol \'23',
                    'foto' => 'images/pengurus/sekretaris.jpg'
                ],
                [
                    'nama' => 'Alvina Qorik Cahyani',
                    'jabatan' => 'Bendahara',
                    'jurusan' => 'Akuntansi \'23',
                    'foto' => 'images/pengurus/bendahara.jpg'
                ]
            ]
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        return view('struktur-kepengurusan', compact('pengurus'));
    }
}