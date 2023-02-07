<?php

namespace App\Controllers;
use App\Models\m_mahasiswa as Mahasiswa; 

class c_mahasiswa extends BaseController
{
    public function display()
    {
        $model = new Mahasiswa();

        $data['mahasiswa'] = $model->getAllMahasiswa();

        return view('mahasiswa/v_display', $data);
    }

    public function create()
    {
        return view('mahasiswa/v_create');
    }
    
    public function store()
    {
        $model = new Mahasiswa();

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ];

        $model->createMahasiswa($data);

        return redirect()->to('/mahasiswa');
    }
}