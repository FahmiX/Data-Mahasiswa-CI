<?php

namespace App\Models;

use CodeIgniter\Model;

class m_user extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'username';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password'];

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

    // Check Username
    public function checkUser(string $username, string $password)
    {
        // connect to database
        $db = db_connect();

        // check username
        $query = $db->query("SELECT * FROM users WHERE username = '$username'");

        if ($query->getNumRows() > 0) {
            // get user data
            $user = $query->getRowArray();

            // check password
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }   
    }
}
