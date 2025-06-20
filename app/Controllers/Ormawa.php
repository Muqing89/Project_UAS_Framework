<?php

namespace App\Controllers;

class Ormawa extends BaseController
{
    public function dashboard(): string
    {
        return view('dashboard1');
    }

    public function inputkegiatan(): string
    {
        return view('inputkegiatan');
    }

    public function inputlaporan(): string
    {
        return view('inputlaporan');
    }

    public function inputkeuangan(): string
    {
        return view('inputkeuangan');
    }

    public function kegiatan(): string
    {
        return view('kegiatan');
    }

    public function laporan(): string
    {
        return view('laporan');
    }
    public function keuangan(): string
    {
        return view('keuangan');
    }
}
