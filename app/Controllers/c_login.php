<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\m_user as User;

class c_login extends BaseController
{
    public function display()
    {
        $data['title'] = 'LOGIN';
        return view('v_login_form', $data);
    }

    public function login()
    {
        $model = new User();

        // username and password from form
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // get user data from database
        $user = $model->checkUser($username, $password);

        print_r($user);

        // check user data
        if ($user) {
            // set session
            $data = [
                'username' => $user['username'],
                'email' => $user['email'],
                'isLoggedIn' => TRUE
            ];
            session()->set($data);
            // flashdata
            session()->setFlashdata('success', 'Login berhasil');
            return redirect()->to('/');
        } else {
            // set session
            session()->setFlashdata('error', 'Username atau Password salah');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        // remove session
        session()->destroy();
        // flashdata
        session()->setFlashdata('success', 'Logout berhasil');
        return redirect()->to('/');
    }
}
