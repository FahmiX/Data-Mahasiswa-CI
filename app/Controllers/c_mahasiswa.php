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

    public function mahasiswa_tampil(){
        $data['title'] = 'MAHASISWA';
        $model = new Mahasiswa();
        $data['mahasiswa'] = $model->getAllMahasiswa();
        return view('v_mahasiswa_display', $data);
    }

    public function mahasiswa_delete($nim){
        $model = new Mahasiswa();
        $model->deleteMahasiswa($nim);
        return redirect()->to('/mahasiswa');
    }

    public function mahasiswa_detail($nim){
        $model = new Mahasiswa();
        $data['mahasiswa'] = $model->getMahasiswa($nim);
        return view('v_mahasiswa_detail', $data);
    }

    public function mahasiswa_create(){
        return view('v_mahasiswa_create');
    }

    public function mahasiswa_store(){
        $model = new Mahasiswa();

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ];

        $model->createMahasiswa($data);

        return redirect()->to('/mahasiswa');
    }

    public function mahasiswa_edit($nim){
        $model = new Mahasiswa();
        $data['mahasiswa'] = $model->getMahasiswa($nim);
        return view('v_mahasiswa_edit', $data);
    }

    public function mahasiswa_update(){
        $model = new Mahasiswa();

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ];

        $model->updateMahasiswa($data);

        return redirect()->to('/mahasiswa');
    }

    public function mahasiswa_search(){
        $model = new Mahasiswa();

        $keyword = $this->request->getPost('keyword');

        $data['mahasiswa'] = $model->searchMahasiswa($keyword);

        return view('v_mahasiswa_display', $data);
    }
}