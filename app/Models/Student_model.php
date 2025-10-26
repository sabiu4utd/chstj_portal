<?php

namespace App\Models;

use CodeIgniter\Model;

class Student_model extends Model
{
    protected $table      = 'students';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'id',
        'user_id',
        'surname',
        'firstname',
        'othername',
        'dob',
        'pnumber',
        'deptid',
        'programid',
        'current_level',
        'gender',
        'phone',
        'email',
        'nin',
        'sponsor_name',
        'sponsor_phone',
        'kin_name',
        'kin_phone',
        'passport',
        'confirm_status',
        'confirm_date',
        'confirm_by',
        'stateid',
        'lgaid',
        'session_admitted',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

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
}
