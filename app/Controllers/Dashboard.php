<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Kegiatan extends Controller
{
    public function store()
    {
        $request = \Config\Services::request();

        // Ambil data dari POST
        $data = [
            'nama' => $request->getPost('nama'),
            'kategori' => $request->getPost('kategori'),
            'tema' => $request->getPost('tema'),
            'tanggal' => $request->getPost('tanggal'),
            'waktu' => $request->getPost('waktu'),
            'detail' => $request->getPost('detail'),
        ];

        // Simpan ke database jika sudah ada modelnya
        // $model = new KegiatanModel();
        // $model->insert($data);

        // Redirect ke dashboard dengan pesan sukses
        return redirect()->to('index')->with('success', 'Kegiatan berhasil disimpan!');
    }
}
