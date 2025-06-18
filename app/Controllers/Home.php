<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('dashboard');
    }
    
    public function login(): string
    {
        return view('login');
    }

    public function register(): string
    {
        return view('register');
    }

    public function tables(): string
    {
        return view('tables');
    }

    public function kegiatan(): string
    {
        return view('kegiatan');
    }

    public function keuangan(): string
    {
        return view('keuangan');
    }

    public function laporan(): string
    {
        return view('laporan');
    }

    public function forgotpassword(): string
    {
        return view('forgotpassword');
    }

    public function inputkegiatan(): string
    {
        return view('inputkegiatan');
    }

    public function inputlaporan(): string
    {
        return view('inputlaporan');
    }

    
    
}