<?php

namespace App\Controllers;

class c_mahasiswa extends BaseController
{
    public function display()
    {
        $model = new \App\Models\m_mahasiswa();

        $data['mahasiswa'] = $model->getAllMahasiswa();

        return view('mahasiswa/display', $data);
    }
}