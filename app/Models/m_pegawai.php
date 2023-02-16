<?php

namespace App\Models;

use CodeIgniter\Model;

class m_pegawai extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'nim';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Function
    // Get All Pegawai
    public function getAllPegawai()
    {
        // Connect to database
        $db = db_connect();

        // Query
        $query = $db->query("SELECT * FROM pegawai order by nim asc");

        // Close connection
        $db->close();

        // Return Data
        return $query->getResultArray();
    }

    // Create Pegawai
    public function createPegawai($data)
    {
        $validasiData = $this->validatePegawai($data);

        if ($validasiData) {
            // Connect to database
            $db = db_connect();

            // Query
            $query = $db->query("INSERT INTO pegawai (nim, nama, gender, telp, email, pendidikan) VALUES ('" . $data['nim'] . "', '" . $data['nama'] . "', '" . $data['gender'] . "', '" . $data['telp'] . "', '" . $data['email'] . "', '" . $data['pendidikan'] . "')");

            // Close connection
            $db->close();

            // Return True
            return $query;
        } else {
            return redirect()->to('/pegawai/create');
        }
    }

    // Validasi Pegawai
    public function validatePegawai($data)
    {
        $valid = true;

        // Connect to database
        $db = db_connect();

        // CEK NIM
        // Mengecek apakah NIM kosong
        if (empty($data['nim'])) {
            session()->setFlashdata('nim_error', 'NIM tidak boleh kosong');
            $valid = false;
        }

        // Mengecek apakah NIM sudah terdaftar
        $query = $db->query("SELECT * FROM pegawai WHERE nim = '" . $data['nim'] . "'");
        if ($query->getNumRows() > 0) {
            session()->setFlashdata('nim_error', 'NIM sudah terdaftar');
            $valid = false;
        }

        // Mengecek apakah NIM memiliki 9 karakter
        if (strlen($data['nim']) != 9) {
            session()->setFlashdata('nim_error', 'NIM harus memiliki 9 karakter');
            $valid = false;
        }

        // Mengecek apakah NIM hanya mengandung angka
        if (!ctype_digit($data['nim'])) {
            session()->setFlashdata('nim_error', 'NIM hanya boleh mengandung angka');
            $valid = false;
        }

        // CEK NAMA
        // Mengecek apakah nama kosong
        if (empty($data['nama'])) {
            session()->setFlashdata('nama_error', 'Nama tidak boleh kosong');
            $valid = false;
        }

        // Mengecek apakah nama melebihi 50 karakter
        if (strlen($data['nama']) > 50) {
            session()->setFlashdata('nama_error', 'Nama tidak boleh melebihi 50 karakter');
            $valid = false;
        }

        // Mengecek apakah terdapat tanda baca pada nama
        if (preg_match('/[^\p{L}\s]/u', $data['nama'])) {
            session()->setFlashdata('nama_error', 'Nama tidak boleh mengandung tanda baca');
            $valid = false;
        }

        // Mengecek apakah terdapat angka pada nama
        if (preg_match('/[0-9]/', $data['nama'])) {
            session()->setFlashdata('nama_error', 'Nama tidak boleh mengandung angka');
            $valid = false;
        }

         // CEK JENIS KELAMIN
        // Mengecek apakah jenis kelamin kosong
        if (empty($data['gender'])) {
            session()->setFlashdata('gender_error', 'Jenis Kelamin tidak boleh kosong');
            $valid = false;
        }

        // Mengecek apakah jenis kelamin 'Pria' atau 'Wanita'
        if ($data['gender'] != 'Pria' && $data['gender'] != 'Wanita') {
            session()->setFlashdata('gender_error', 'Jenis Kelamin hanya boleh Pria atau Wanita');
            $valid = false;
        }

        // CEK TELEPON
        // Mengecek apakah telepon sudah terdaftar
        $query = $db->query("SELECT * FROM pegawai WHERE telp = '" . $data['telp'] . "'");
        if ($query->getNumRows() > 0) {
            session()->setFlashdata('telp_error', 'Telepon sudah terdaftar');
            $valid = false;
        }

        // Mengecek apakah telepon kosong
        if (empty($data['telp'])) {
            session()->setFlashdata('telp_error', 'Telepon tidak boleh kosong');
            $valid = false;
        }

        // Mengecek apakah telepon memiliki minimal 10 karakter dan maksimal 13 karakter
        if (strlen($data['telp']) < 10 || strlen($data['telp']) > 13) {
            session()->setFlashdata('telp_error', 'Telepon harus memiliki minimal 10 karakter dan maksimal 13 karakter');
            $valid = false;
        }

        // Mengecek apakah telepon hanya mengandung angka
        if (!ctype_digit($data['telp'])) {
            session()->setFlashdata('telp_error', 'Telepon hanya boleh mengandung angka');
            $valid = false;
        }

        // CEK EMAIL
        // Mengecek apakah email kosong
        if (empty($data['email'])) {
            session()->setFlashdata('email_error', 'Email tidak boleh kosong');
            $valid = false;
        }

        // Mengecek apakah email sudah terdaftar
        $query = $db->query("SELECT * FROM pegawai WHERE email = '" . $data['email'] . "'");
        if ($query->getNumRows() > 0) {
            session()->setFlashdata('email_error', 'Email sudah terdaftar');
            $valid = false;
        }

        // Mengecek apakah email memiliki format yang benar
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            session()->setFlashdata('email_error', 'Email tidak memiliki format yang benar');
            $valid = false;
        }

        // Mengecek apakah email memiliki maksimal 50 karakter
        if (strlen($data['email']) > 50) {
            session()->setFlashdata('email_error', 'Email tidak boleh melebihi 50 karakter');
            $valid = false;
        }

        // CEK PENDIDIKAN
        // Mengecek apakah pendidikan kosong
        if (empty($data['pendidikan'])) {
            session()->setFlashdata('pendidikan_error', 'Pendidikan tidak boleh kosong');
            $valid = false;
        }

        // Mengecek apakah pendidikan SD, SMP, atau SMA
        if ($data['pendidikan'] != 'SD' && $data['pendidikan'] != 'SMP' && $data['pendidikan'] != 'SMA') {
            session()->setFlashdata('pendidikan_error', 'Pendidikan hanya boleh SD, SMP, atau SMA');
            $valid = false;
        }

        // Close connection
        $db->close();

        if ($valid) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return true;
        } else {
            return redirect()->to('/pegawai/create')->withInput();
        }
    }
}
