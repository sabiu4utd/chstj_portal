<?php

namespace App\Models;

use CodeIgniter\Model;

class Reservation_model extends Model
{
    protected $table      = 'reservations';
    protected $primaryKey = 'reservation_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'reservation_id',
        'userid',
        'hostelid',
        'roomid',
        'bedspaceid',
        'datereserved',
        'session',
        'reservation_status',
        'updateby',
        'approval_date',
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

