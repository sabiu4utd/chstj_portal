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
use App\Models\Auth_model;

use Ramsey\Uuid\Uuid;

class Student extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $settingmodel = new Settings_model();
        $active_session = $settingmodel->where('status', 'active')->where('setting', 'SESSION')->first();
        $active_semester = $settingmodel->where('status', 'active')->where('setting', 'SEMESTER')->first();
        $this->session->set('current_session', $active_session['value']);
        $this->session->set('current_semester', $active_semester['value']);

        $data = [
            'title' => 'Student Dashboard',
            'additional_css' => [],
            'additional_js' => []
        ];

        return view_with_mobile_support('student/dashboard', $data);
    }
    public function info()
    {
        $data = [
            'title' => 'My Information',
            'additional_css' => [],
            'additional_js' => []
        ];
        return view_with_mobile_support('student/information', $data);
    }

    public function payments()
    {
         $secrete_key = $this->secrete_key; 
        $stateid = $this->session->get('stateid');
        $payment_history = new Payment_model();
        $history = $payment_history->where('user_id', $this->session->get('userid'))->findAll();

        $paymentmodel = new Payment_Schedule_Model();
        $amount = $paymentmodel
            ->where('session', $this->session->get('current_session'))
            ->where('level', $this->session->get('current_level'))
            ->where('programid', 1)
            ->orWhere('programid', $this->session->get('programid'))
            ->findAll();
        if ($stateid == 21) {
            if ($this->session->get('current_level') > 100) {
                $tution_fees = array_sum(array_column($amount, 'amount')) - 25000;
            } else {
                $tution_fees = array_sum(array_column($amount, 'amount')) - 50000;
            }
        } else {
            $tution_fees = array_sum(array_column($amount, 'amount'));
        }
        // echo $this->session->get('programid');
        // exit;
        // $peculiar = $paymentmodel
        //     ->where('session', $this->session->get('current_session'))
        //     ->where('level', $this->session->get('current_level'))
        //     ->where('programid', $this->session->get('programid'))
        //     ->findAll();
        // $peculiar_fees = array_sum(array_column($peculiar, 'amount'));


        $acceptance_fee = $payment_history
            ->where('user_id', $this->session->get('userid'))
            ->where('type', 'Acceptance')
            ->first();

        $session_payment = $payment_history
            ->where('user_id', $this->session->get('userid'))
            ->where('type', 'School Fees')
            ->where('session', $this->session->get('current_session'))
            ->first();

        $data = [
            'title' => 'My Payments',
            'additional_css' => [],
            'additional_js' => [base_url('assets/js/payment.js')],
            'tution_fees' => $tution_fees,
            'secrete_key' => $secrete_key,
            // 'peculiar_fees' => $peculiar_fees,
            'amount' => $amount,
            'history' => $history,
            'acceptance_fee' => $acceptance_fee,
            'session_payment' => $session_payment
        ];

        return view_with_mobile_support('student/payments', $data);
    }
    public function courses()
    {
        $sessionmodel = new Settings_model();
        $session = $sessionmodel->where('status', 'active')->where('setting', 'SESSION')->first();
        $programid = $this->session->get('programid');
        $level = $this->session->get('current_level');

        $courses_registered_sql = "SELECT DISTINCT level FROM course_registration WHERE studentid = ? order by level";
        $db = \Config\Database::connect();
        $query = $db->query($courses_registered_sql, $_SESSION['userid']);
        $courses_registered = $query->getResultArray();

        $course_registration_model = new Course_registration_model();
        $current_coureReg = $course_registration_model
            ->where('studentid', $_SESSION['userid'])
            ->where('level', $level)->first();

        $coursemodel = new Course_model();
        $courses = $coursemodel->where('session', $session['id'])->where('deptid', $programid)->where('level', $level)->findAll();

        $data = [
            'title' => 'My Courses',
            'additional_css' => [],
            'additional_js' => [base_url('assets/js/courses.js')],
            'courses' => $courses,
            'courses_registered' => $courses_registered,
            'current_coureReg' => $current_coureReg
        ];

        return view_with_mobile_support('student/courses', $data);
    }
    public function results()
    {
        $data = [
            'title' => 'My Results',
            'additional_css' => [],
            'additional_js' => []
        ];
        return view_with_mobile_support('student/results', $data);
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

        //Reservation history
        $reservation_model = new Reservation_model();
        $reservation_history = $reservation_model
            ->join('hostels', 'reservations.hostelid = hostels.hostelid')
            ->join('rooms', 'reservations.roomid = rooms.id')
            ->join('bedspaces', 'reservations.bedspaceid = bedspaces.id')
            ->where('userid', $_SESSION['userid'])
            ->findAll();

        $gender = $this->session->get('gender');
        $hostel_model = new Hostel_model();
        $hostels = $hostel_model->where('hostel_gender', $gender)->findAll();

        $data = [
            'title' => 'Accommodation',
            'additional_css' => [],
            'additional_js' => [base_url('assets/js/accommodation.js')],
            'hostels' => $hostels,
            'current_reservation' => $current_reservation,
            'reservation_history' => $reservation_history
        ];

        return view_with_mobile_support('student/accomodations', $data);
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
        if (!$insert) {

            $acce = new Payment_model();
            $acceptance = $acce
                ->where('user_id', $this->session->get('userid'))
                ->where('type', 'Acceptance')
                ->first();
            //var_dump($acceptance);exit;
            if ($acceptance) {
                echo $_SESSION['acceptance_payment_status'] = 'paid';
            }

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
        $sql = "select distinct hostel from bed_spaces";
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

    public function changepassword()
    {
        $currentPassword = $this->request->getPost('currentPassword');
        $newPassword = $this->request->getPost('newPassword');
        $confirmPassword = $this->request->getPost('confirmPassword');
        $userid = $this->session->get('userid');
        $user_model = new Auth_model();
        $user = $user_model->where('userid', $userid)->first();
        if ($user['password'] == hash('sha512', $currentPassword)) {
            if ($newPassword == $confirmPassword) {
                $user_model->update($userid, ['password' => hash('sha512', $newPassword)]);
                return redirect('student')->with('msg', 'Password changed successfully.');
            } else {
                return redirect('student')->with('msg', 'New password does not match.');
            }
        } else {
            return redirect('student')->with('msg', 'Current password is incorrect.');
        }
    }
}
