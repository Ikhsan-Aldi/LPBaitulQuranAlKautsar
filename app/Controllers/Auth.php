<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        helper(['form', 'url']);
        session();
    }

    public function index()
    {
        // Jika sudah login, langsung ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('auth/login');
    }

    public function submit()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $this->adminModel->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            session()->set([
                'id_admin' => $admin['id_admin'],
                'nama_admin' => $admin['nama_lengkap'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('b0/login')->with('success', 'Anda telah logout.');
    }

}
