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
        // Connect to database
        $db = db_connect();

        // Query
        $query = $db->query("INSERT INTO pegawai (nim, nama, gender, telp, email, pendidikan) VALUES ('" . $data['nim'] . "', '" . $data['nama'] . "', '" . $data['gender'] . "', '" . $data['telp'] . "', '" . $data['email'] . "', '" . $data['pendidikan'] . "')");

        // Close connection
        $db->close();

        // Return Data
        return $query;
    }

    // Delete Pegawai
    public function deletePegawai($nim)
    {
        // Connect to database
        $db = db_connect();

        // Delete data
        $db->query("DELETE FROM pegawai WHERE nim = '" . $nim . "'");

        // Close connection
        $db->close();

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/pegawai');
    }
}
