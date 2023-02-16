<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\m_pegawai as Pegawai;

class c_pegawai extends BaseController
{
    // Display Data Pegawai
    public function display()
    {
        // Create Object
        $pegawai = new Pegawai();

        // Get Data
        $data['pegawai'] = $pegawai->getAllPegawai();

        // Return View
        return view('v_pegawai_display', $data);
    }

    // Create Data Pegawai
    public function create()
    {
        // Return View
        return view('v_pegawai_create');
    }

    // Store Data Pegawai
    public function store()
    {
        // Create Object
        $pegawai = new Pegawai();

        // Get Data
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'gender' => $this->request->getPost('gender'),
            'telp' => $this->request->getPost('telp'),
            'email' => $this->request->getPost('email'),
            'pendidikan' => $this->request->getPost('pendidikan')
        ];

        // Create Data
        $pegawai->createPegawai($data);

        // // Redirect
        // return redirect()->to('/pegawai');
    }
}
