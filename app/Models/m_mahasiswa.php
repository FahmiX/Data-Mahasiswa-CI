<?php

namespace App\Models;

use CodeIgniter\Model;

class m_mahasiswa extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'nim';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'umur'];

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
    // Get All Mahasiswa
    public function getAllMahasiswa()
    {
        // Connect to database
        $db = db_connect();

        // Query
        $query = $db->query("SELECT * FROM mahasiswa order by nim asc");

        // Close connection
        $db->close();

        // Return Data
        return $query->getResultArray();
    }

    // Create Mahasiswa
    public function createMahasiswa($data)
    {
        // Connect to database
        $db = db_connect();

        // Query
        $db->query("INSERT INTO mahasiswa (nim, nama, umur) VALUES ('" . $data['nim'] . "', '" . $data['nama'] . "', '" . $data['umur'] . "')");

        // Close connection
        $db->close();
    }

    // Delete Mahasiswa
    public function deleteMahasiswa($nim)
    {
        // Connect to database
        $db = db_connect();

        // Query
        $db->query("DELETE FROM mahasiswa WHERE nim = '" . $nim . "'");

        // Close connection
        $db->close();
    }

    // Get Mahasiswa by NIM
    public function getMahasiswa($nim)
    {
        // Connect to database
        $db = db_connect();

        // Query
        $query = $db->query("SELECT * FROM mahasiswa WHERE nim = '" . $nim . "'");

        // Close connection
        $db->close();

        // Return Data
        return $query->getResultArray();
    }
}
