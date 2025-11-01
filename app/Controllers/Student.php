<?php

namespace App\Controllers;

use App\Models\Student_model;
use App\Models\Payment_model;
use App\Models\Settings_model;
use App\Models\Payment_Schedule_Model;
use App\Models\Course_model;
use App\Models\Course_registration_model;
use App\Models\Hostel_model;
use App\Models\Room_model;
use App\Models\Bedspace_model;
use App\Models\Reservation_model;
use App\Models\Bed_spaces_model;

use Ramsey\Uuid\Uuid;

class Student extends BaseController
{
    public function index()
    {

        $settingmodel = new Settings_model();
        $active_session = $settingmodel->where('status', 'active')->where('setting', 'SESSION')->first();
        $active_semester = $settingmodel->where('status', 'active')->where('setting', 'SEMESTER')->first();
        $this->session->set('current_session', $active_session['value']);
        $this->session->set('current_semester', $active_semester['value']);

        return view('student/dashboard');
    }
    public function info()
    {
        return view('student/information');
    }
    public function payments()
    {
        $payment_history = new Payment_model();
        $history = $payment_history->where('user_id', $this->session->get('userid'))->findAll();

        $paymentmodel = new Payment_Schedule_Model();
        $amount = $paymentmodel
            ->where('session', $this->session->get('current_session'))
            ->where('level', $this->session->get('current_level'))
            ->where('programid', $this->session->get('programid'))
            ->findAll();
        $tution_fees = array_sum(array_column($amount, 'amount'));


        $acceptance_fee = $payment_history
            ->where('user_id', $this->session->get('userid'))
            ->where('type', 'Acceptance')
            ->first();

        $session_payment = $payment_history
            ->where('user_id', $this->session->get('userid'))
            ->where('type', 'School Fees')
            ->where('session', $this->session->get('current_session'))
            ->first();
        // var_dump($this->session->get('email'));exit;
        return view('student/payments', ['tution_fees' => $tution_fees, 'amount' => $amount, 'history' => $history, 'acceptance_fee' => $acceptance_fee, 'session_payment' => $session_payment]);
    }
    public function courses()
    {
        $sessionmodel = new Settings_model();
        $session = $sessionmodel->where('status', 'active')->where('setting', 'SESSION')->first();
        $programid = $this->session->get('programid');
        $level = $this->session->get('current_level');


        //$level = $this->session->get('current_level');

        $courses_registered_sql = "SELECT DISTINCT level FROM course_registration WHERE studentid = ? order by level";
        $db = \Config\Database::connect();
        $query = $db->query($courses_registered_sql, $_SESSION['userid']);
        $courses_registered = $query->getResultArray();
        //var_dump($courses_registered);exit;

        $course_registration_model = new Course_registration_model();
        $current_coureReg = $course_registration_model
            ->where('studentid', $_SESSION['userid'])
            ->where('level', $level)->first();
        //var_dump($current_coureReg);exit;

        $coursemodel = new Course_model();
        $courses = $coursemodel->where('session', $session['id'])->where('deptid', $programid)->where('level', $level)->findAll();
        return view('student/courses', ['courses' => $courses, 'courses_registered' => $courses_registered, 'current_coureReg' => $current_coureReg]);
    }
    public function results()
    {
        return view('student/results');
    }
    public function accomodations()
    {

        //current reservation
        $reservation_model = new Reservation_model();
        $current_reservation = $reservation_model
        ->join('hostels', 'reservations.hostelid = hostels.hostelid')
        ->join('rooms', 'reservations.roomid = rooms.id')
        ->join('bedspaces', 'reservations.bedspaceid = bedspaces.id')
        ->where('userid', $_SESSION['userid'])
        ->where('session', $_SESSION['current_session'])
        ->first();
//       
        //Reservation history
        
        $reservation_model = new Reservation_model();
        $reservation_history = $reservation_model
        ->join('hostels', 'reservations.hostelid = hostels.hostelid')
        ->join('rooms', 'reservations.roomid = rooms.id')
        ->join('bedspaces', 'reservations.bedspaceid = bedspaces.id')
        ->where('userid', $_SESSION['userid'])
        ->findAll();
       // var_dump($reservation_history);exit;


        $gender = $this->session->get('gender');
        $hostel_model = new Hostel_model();
        $hostels = $hostel_model->where('hostel_gender', $gender)->findAll();
        return view('student/accomodations', ['hostels' => $hostels, 'current_reservation' => $current_reservation, 'reservation_history' => $reservation_history]);
    }
    public function ecards()
    {
        return view('student/ecards');
    }
    public function forms()
    {
        return view('student/forms');
    }

    public function process_payments($transaction_reference)
    {
        // echo $transaction_reference; EXIT;
        $paymentModel = new Payment_model();
        $insert =  $paymentModel->insert([
            'payment_id' => Uuid::uuid4()->toString(),
            'user_id' => $this->session->get('userid'),
            'level' => $this->session->get('current_level'),
            'transaction_reference' => $transaction_reference,
            'amount' => 2000,
            'type' => 'Acceptance',
            'session' => $this->session->get('current_session'),
            'status' => 'Paid',
        ]);
        if ($insert) {
            echo "Payment recorded successfully.";
        } else {
            echo "Failed to record payment.";
        }
        return redirect('student/payments')->with('success', 'Payment processed successfully.');
        //return view('student/process_payments');
    }
 public function hostel_payments($transaction_reference)
    {
        // echo $transaction_reference; EXIT;
        $paymentModel = new Payment_model();
        $insert =  $paymentModel->insert([
            'payment_id' => Uuid::uuid4()->toString(),
            'user_id' => $this->session->get('userid'),
            'level' => $this->session->get('current_level'),
            'transaction_reference' => $transaction_reference,
            'amount' => 50000,
            'type' => 'Accomodation',
            'session' => $this->session->get('current_session'),
            'status' => 'Paid',
        ]);
        if ($insert) {
            echo "Payment recorded successfully.";
        } else {
            echo "Failed to record payment.";
        }
        return redirect('student/payments')->with('success', 'Payment processed successfully.');
        //return view('student/process_payments');
    }




    public function process_fees($transaction_reference)
    {

        $paymentmodel = new Payment_Schedule_Model();
        $total_amount = $paymentmodel
            ->where('session', $this->session->get('current_session'))
            ->where('level', $this->session->get('current_level'))
            ->where('programid', $this->session->get('programid'))
            ->selectSum('amount')
            ->get()
            ->getRow()
            ->amount;
        // echo $total_amount; exit;


        // $amount = $this->request->getGet('amount');
        $paymentModel = new Payment_model();
        $insert =  $paymentModel->insert([
            'payment_id' => Uuid::uuid4()->toString(),
            'user_id' => $this->session->get('userid'),
            'level' => $this->session->get('current_level'),
            'transaction_reference' => $transaction_reference,
            'amount' => $total_amount,
            'type' => 'School Fees',
            'session' => $this->session->get('current_session'),
            'status' => 'Paid',
        ]);
        if ($insert) {
            echo "Payment recorded successfully.";
        } else {
            echo "Failed to record payment.";
        }
        return redirect('student/payments')->with('success', 'Payment processed successfully.');
        //return view('student/process_payments');
    }
    public function receipt($payment_id)
    {
        $paymentModel = new Payment_model();
        $history = $paymentModel->where('payment_id', $payment_id)->first();
        return view('student/receipt', ['history' => $history]);
    }
    public function register_courses()
    {

        if ($this->request->getPost('courses') == null) {
            return redirect('student/courses')->with('msg', 'Please select courses.');
        }
        $course_registration_model = new Course_registration_model();
        foreach ($this->request->getPost('courses') as $course) {
            $insert = $course_registration_model->insert([
                'id' => Uuid::uuid4()->toString(),
                'studentid' => $_SESSION['userid'],
                'csid' => $course,
                'programid' => $_SESSION['programid'],
                'level' => $_SESSION['current_level'],
                'sessionid' => $_SESSION['session_id'],
            ]);
        }
        //var_dump($insert); exit;
        if (!$insert) {
            return redirect('student/courses')->with('msg', 'Course registered successfully.');
        } else {
            return redirect('student/courses')->with('msg', 'Failed');
        }
    }
    public function print_registration($level, $session)
    {
        $course_registration_model = new Course_registration_model();
        $courses = $course_registration_model
                ->join('courses', 'courses.id = course_registration.csid')
                ->where('studentid', $_SESSION['userid'])
                ->where('course_registration.level', $level)
                ->findAll();
        //var_dump($courses);exit;
        return view('student/print_registration', ['courses' => $courses]);
    }
    public function provisional_offer()
    {
        
        return view('student/provisional_offer');
    }
    public function load_rooms()
    {
        $hostelid = $this->request->getPost('hostelid');
        $model = new room_model();
        $rooms = $model->where('hostelid', $hostelid)->findAll(); 
        // Return the result as JSON  
        return $this->response->setJSON($rooms);
    }
    public function load_bedspace()
    {
        $roomid = $this->request->getPost('roomid');
        $model = new Bedspace_model();
        $bedspaces = $model
        ->where('roomid', $roomid)
        ->where('status', 'available')
        ->findAll(); 
        // Return the result as JSON  
        return $this->response->setJSON($bedspaces);
    }
    public function make_reservation()
    {
        $hostelid = $this->request->getPost('hostel');
        $roomid = $this->request->getPost('roomid');
        $bedspaceid = $this->request->getPost('bedspaceid');
        $userid = $this->session->get('userid');
        $session = $this->session->get('current_session');
        $level = $this->session->get('current_level');
       
        
        
        $model = new Reservation_model();
        $insert = $model->insert([
            //'id' => Uuid::uuid4()->toString(),
            'hostelid' => $hostelid,
            'roomid' => $roomid,
            'bedspaceid' => $bedspaceid,
            'userid' => $userid,
            'session' => $session,
            'level' => $level,
        ]);
        if ($insert) {
            $model = new Bedspace_model();
            $model->update($bedspaceid, ['status' => 'Reserved']);

            return redirect('student/accomodations')->with('msg', 'Reservation made successfully.');
        } else {
            return redirect('student/accomodations')->with('msg', 'Failed to make reservation.');
        }
      
    }
    public function hostel()
    {
        $reservation_model = new Reservation_model();
        $current_reservation = $reservation_model
        ->join('hostels', 'reservations.hostelid = hostels.hostelid')
        ->join('rooms', 'reservations.roomid = rooms.id')
        ->join('bedspaces', 'reservations.bedspaceid = bedspaces.id')
        ->where('userid', $_SESSION['userid'])
        ->where('session', $_SESSION['current_session'])
        ->first();
//       
        //Reservation history
        
        $reservation_model = new Reservation_model();
        $reservation_history = $reservation_model
        ->join('hostels', 'reservations.hostelid = hostels.hostelid')
        ->join('rooms', 'reservations.roomid = rooms.id')
        ->join('bedspaces', 'reservations.bedspaceid = bedspaces.id')
        ->where('userid', $_SESSION['userid'])
        ->findAll();

       $bedspace_model = new Bed_spaces_model();
        $sql ="select distinct hostel from bed_spaces";
        $bedspaces = $bedspace_model->query($sql)->getResultArray();
        //var_dump($bedspaces);exit;
        return view('student/hostel', ['bedspaces' => $bedspaces, 'current_reservation' => $current_reservation, 'reservation_history' => $reservation_history]);
    }
    public function get_bedsapces()
    {
        $db = \Config\Database::connect();
        $hostel = $this->request->getPost('hostel');
       $sql = "select * from bed_spaces where hostel = $hostel";
      
        $bedspaces = $db->query($sql)->getResultArray();
        return view('student/hostel', ['bedspaces' => $bedspaces]);
    }
   
}
