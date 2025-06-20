<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('loginbaru');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user) {
            // Cek password (asumsi menggunakan password hash)
            if ($password == $user['password']) {
                // if (password_verify($password, $user['password'])) {
                $data = [
                    'id'       => $user['id'],
                    'username' => $user['username'],
                    'role'     => $user['role'],
                    'logged_in' => true
                ];
                $session->set($data);

                // Arahkan sesuai role
                if ($user['role'] == 'admin') {
                    return redirect()->to('dashboardAdminKemahasiswaan');
                } elseif ($user['role'] == 'ormawa') {
                    return redirect()->to('dashboardOrmawa');
                } elseif ($user['role'] == 'wakil_rektor') {
                    return redirect()->to('dashboardWakilRektorII');
                } else {
                    return redirect()->to('/');
                }
            } else {
                $session->setFlashdata('error', 'Password salah');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
