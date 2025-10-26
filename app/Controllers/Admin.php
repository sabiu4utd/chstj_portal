<?php

namespace App\Controllers;

use App\Models\Hostel_model;
use CodeIgniter\Controller;

class Admin extends BaseController
{
    protected $hostelModel;

    public function __construct()
    {
        $this->hostelModel = new Hostel_model();
    }

    public function viewBedspaces()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        // Get all bedspace reservations with student and hostel details
        $reservations = $this->hostelModel->getBedspaceReservations();

        return view('admin/view_bedspaces', [
            'reservations' => $reservations
        ]);
    }

    public function updateBedspaceStatus()
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Unauthorized access'
            ]);
        }

        $reservationId = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        try {
            $success = $this->hostelModel->updateReservationStatus($reservationId, $status);

            if ($success) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Status updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to update status'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    public function getBedspaceDetails($id)
    {
        // Check if user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Unauthorized access'
            ]);
        }

        try {
            $details = $this->hostelModel->getReservationDetails($id);

            if ($details) {
                return $this->response->setJSON([
                    'success' => true,
                    'data' => $details
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Reservation not found'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }
}