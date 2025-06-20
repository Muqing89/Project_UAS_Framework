<?php

namespace App\Controllers;

class AdminKemahasiswaan extends BaseController
{
    public function dashboard(): string
    {
        return view('dashboard2');
    }

    public function verifikasikegiatan(): string
    {
        return view('verifikasikegiatan2');
    }

    public function verifikasilaporan(): string
    {
        return view('verifikasilaporan2');
    }
    
    public function verifikasikeuangan(): string
    {
        return view('verifikasikeuangan2');
    }
}
