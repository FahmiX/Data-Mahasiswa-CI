<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\m_user as User;

class c_login extends BaseController
{
    public function index()
    {
        return view('v_login_form');
    }

    public function login()
    {
        $model = new User();

        // username and password from form
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // get user data from database
        $user = $model->where('username', $username)->first();

        // check if user exists
        if ($user) {
            // check if password is correct
            if (password_verify($password, $user['password'])) {
                // set session
                $data = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'isLoggedIn' => true
                ];
                session()->set($data);
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('error', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
