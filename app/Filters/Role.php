<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Role implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $role = session()->get('role');

        // Cek apakah role saat ini sesuai dengan argument
        if ($arguments && !in_array($role, $arguments)) {
            return redirect()->to('/')->with('error', 'Akses tidak diizinkan.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
