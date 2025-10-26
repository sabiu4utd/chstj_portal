<?php

namespace App\Models;

use CodeIgniter\Model;

class Hostel_model extends Model
{
    protected $table      = 'hostels';
    protected $primaryKey = 'hostelid';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['hostelid', 'hostel_name', 'hostel_gender', 'no_rooms','hostel_location', 'created_at', 'updated_at', 'delete_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Get all bedspace reservations with related information
    public function getBedspaceReservations()
    {
        $builder = $this->db->table('bedspace_reservations');
        $builder->select('
            bedspace_reservations.*,
            students.firstname,
            students.surname,
            students.othername,
            students.pnumber as reg_number,
            hostels.hostel_name,
            rooms.room_number,
            beds.bed_number
        ');
        $builder->join('students', 'students.studentid = bedspace_reservations.student_id');
        $builder->join('hostels', 'hostels.hostelid = bedspace_reservations.hostel_id');
        $builder->join('rooms', 'rooms.roomid = bedspace_reservations.room_id');
        $builder->join('beds', 'beds.bedid = bedspace_reservations.bed_id');
        $builder->orderBy('bedspace_reservations.created_at', 'DESC');

        $query = $builder->get();

        $results = $query->getResult();

        // Format the student names
        foreach ($results as $row) {
            $row->student_name = $row->surname . ' ' . $row->firstname . ' ' . $row->othername;
        }

        return $results;
    }

    // Update reservation status
    public function updateReservationStatus($reservationId, $status)
    {
        $data = [
            'status' => $status,
            'status_updated_at' => date('Y-m-d H:i:s')
        ];

        return $this->db->table('bedspace_reservations')
                       ->where('id', $reservationId)
                       ->update($data);
    }

    // Get detailed reservation information
    public function getReservationDetails($reservationId)
    {
        $builder = $this->db->table('bedspace_reservations');
        $builder->select('
            bedspace_reservations.*,
            students.firstname,
            students.surname,
            students.othername,
            students.pnumber as reg_number,
            hostels.hostel_name,
            rooms.room_number,
            beds.bed_number
        ');
        $builder->join('students', 'students.studentid = bedspace_reservations.student_id');
        $builder->join('hostels', 'hostels.hostelid = bedspace_reservations.hostel_id');
        $builder->join('rooms', 'rooms.roomid = bedspace_reservations.room_id');
        $builder->join('beds', 'beds.bedid = bedspace_reservations.bed_id');
        $builder->where('bedspace_reservations.id', $reservationId);

        $query = $builder->get();
        $result = $query->getRow();

        if ($result) {
            $result->student_name = $result->surname . ' ' . $result->firstname . ' ' . $result->othername;
            $result->created_at = date('d-m-Y H:i:s', strtotime($result->created_at));
            if ($result->status_updated_at) {
                $result->status_updated_at = date('d-m-Y H:i:s', strtotime($result->status_updated_at));
            }
        }

        return $result;
    }

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

