<?php

namespace App\Controllers;

class WakilRektorII extends BaseController
{
    public function dashboard(): string
    {
        return view('dashboard3');
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
