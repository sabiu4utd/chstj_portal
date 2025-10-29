<?php

namespace App\Controllers;

use App\Models\Staff_model;
use App\Models\Student_model;
use App\Models\Program_model;
use App\Models\State_model;
use App\Models\Lgas_model;
use App\Models\Department_model;
use App\Models\Role_model;
use App\Models\Auth_model;
use App\Models\Payment_model;
use App\Models\Course_model;
use App\Models\Settings_model;
use App\Models\Programmes_model;
use App\Models\Hostel_model;
use App\Models\Room_model;
use App\Models\Bedspace_model;
use App\Models\Reservation_model;
use App\Models\Payment_Schedule_Model;

use Ramsey\Uuid\Uuid;


class Staff extends BaseController
{
    public function index(): string
    {
        return view('staff/index');
    }
    public function info(): string
    {
        return view('staff/information');
    }
    public function staffManager(): string
    {
        $departmentModel = new Department_model();
        $data['departments'] = $departmentModel->findAll();
        $roleModel = new Role_model();
        $data['roles'] = $roleModel->findAll();
        $staffModel = new Staff_model();
        $data['totalstaff'] = $staffModel->join('departments', 'departments.deptid = staff.dept_id')->findAll();
        $data['academicstaff'] = $staffModel->where('staff_type', 'Academic')->findAll();
        $data['nonacademicstaff'] = $staffModel->where('staff_type', 'Non-Academic')->findAll();


        // var_dump($data); exit;
        return view('staff/staff', $data);
    }
    public function studentManager(): string
    {
        $departmentModel = new Department_model();
        $data['departments'] = $departmentModel->findAll();
        $data['programmes'] = (new Programmes_model())->findAll();
        $data['state'] = (new State_model())->findAll();
        $data['totalstudents'] = (new Student_model())->findAll();
        $data['newstudents'] = (new Student_model())->where('current_level', 100)->findAll();
        $data['graduatingstudents'] = (new Student_model())->where('current_level', 200)->findAll();

        return view('staff/students', $data);
    }
    public function courseManager()
    {
        $settingsmodel = new Settings_model();
        $currentsession = $settingsmodel
            ->where('setting', 'SESSION')
            ->where('status', 'active')
            ->first();


        $semesters = $settingsmodel
            ->where('setting', 'SEMESTER')
            ->where('session', $currentsession['session'])
            ->findAll();

        $departmentModel  = new Department_model();
        $departments = $departmentModel->findAll();
        $programmodel = new Programmes_model();
        $programs = $programmodel->findAll();


        return view('staff/courses', ['semester' => $semesters, 'active_session' => $currentsession, 'departments' => $departments, 'programs' => $programs]);
    }
    public function hostelManager(): string
    {
        $hostelmodel = new Hostel_model();
        $data['hostels'] = $hostelmodel->findAll();
        return view('staff/accomodations', $data);
    }
    public function bursaryManager(): string
    {
        $paymentmodel = new Payment_model();
        $data['payments'] = $paymentmodel
        ->join('students', 'students.user_id = payments.user_id')
        ->orderBy('payments.created_at', 'DESC')
        ->limit(100)
        ->findAll();
        $data['programmes'] = (new Programmes_model())->findAll();
        return view('staff/bursary', $data);
    }
    public function resultManager(): string
    {
        return view('staff/results');
    }
    public function settings(): string
    {
        return view('staff/settings');
    }
    public function add_staff()
    {
        $staffModel = new Staff_model();
        $authmodel = new Auth_model();
        $userid = Uuid::uuid4()->toString();

        $authmodel->where('username', $this->request->getPost('email'));
        $check =  $authmodel->first();
        if ($check) {
            session()->setFlashdata('msg', 'User with ' . $this->request->getPost('email') . ' already exist, Please try diffrent email address');
            return redirect()->to(base_url('staff/staff-manager'));
        }

        $user = [
            'userid' => $userid,
            'username' => $this->request->getPost('email'),
            'uniqueID' => $this->request->getPost('staff_no'),
            'password' => hash("SHA512", "12345678"),
            'status' => 'Active',
            'usertype' => 'Staff',
            'roleid' => $this->request->getPost('roleid'),
        ];

        $authmodel->insert($user);
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'user_id' => $userid,
            'surname' => $this->request->getPost('surname'),
            'firstname' => $this->request->getPost('firstname'),
            'othername' => $this->request->getPost('othername'),
            'staff_no' => $this->request->getPost('staff_no'),
            'gender' => $this->request->getPost('gender'),
            'dob' => $this->request->getPost('dob'),
            'dofa' => $this->request->getPost('dofa'),
            'roleid' => $this->request->getPost('roleid'),
            'staff_type' => $this->request->getPost('staff_type'),
            'email' => $this->request->getPost('email'),
            'dept_id' => $this->request->getPost('deptid'),
            'phone' => $this->request->getPost('phone')
        ];
        $flag = $staffModel->insert($data);
        if ($flag) {
            session()->setFlashdata('msg', 'Staff added successfully');
            return redirect()->to(site_url('staff/staff-manager'));
        } else {
            session()->setFlashdata('msg', 'Failed to add staff');
            return redirect()->to(site_url('staff/staff-manager'));
        }
    }

    public function getLgasByState($stateId)
    {
        try {
            log_message('info', 'Getting LGAs for state ID: ' . $stateId);

            $lgaModel = new Lgas_model();
            $lgas = $lgaModel->where('stateid', $stateId)->findAll();

            log_message('info', 'Found ' . count($lgas) . ' LGAs');

            // Return direct array for simpler processing
            return $this->response->setJSON($lgas);
        } catch (\Exception $e) {
            log_message('error', 'Error in getLgasByState: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());

            return $this->response->setStatusCode(500)
                ->setJSON([
                    'error' => true,
                    'message' => 'Failed to fetch LGAs: ' . $e->getMessage()
                ]);
        }
    }
    public function register_new_student()
    {
        $firstname = $this->request->getPost('firstname');
        $surname = $this->request->getPost('surname');
        $othername = $this->request->getPost('othername');
        $dob = $this->request->getPost('dob');
        $pnumber = $this->request->getPost('pnumber');
        $nin = $this->request->getPost('nin');
        $deptid = $this->request->getPost('dept_id');
        $programid = $this->request->getPost('programid');
        $current_level = $this->request->getPost('current_level');
        $ender = $this->request->getPost('gender');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $stateid = $this->request->getPost('stateid');
        $lgaid = $this->request->getPost('lgaid');
        $session_admitted = $this->request->getPost('session_admitted');




        $studentmodel = new Student_model();
        $authmodel = new Auth_model();
        $userid = Uuid::uuid4()->toString();

        $authmodel->where('username', $this->request->getPost('pnumber'));
        $check =  $authmodel->first();
        if ($check) {
            session()->setFlashdata('msg', 'User with ' . $this->request->getPost('pnumber') . ' already exist, Please check the application number');
            return redirect()->to(base_url('staff/staff-manager'));
        }

        $user = [
            'userid' => $userid,
            'username' => $this->request->getPost('pnumber'),
            'uniqueID' => $this->request->getPost('pnumber'),
            'password' => hash("SHA512", $pnumber),
            'status' => 'active',
            'usertype' => 'student',
            'roleid' => 1,
        ];

        $authmodel->insert($user);
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'user_id' => $userid,
            'surname' => $this->request->getPost('surname'),
            'firstname' => $this->request->getPost('firstname'),
            'othername' => $this->request->getPost('othername'),
            'dob' => $this->request->getPost('dob'),
            'pnumber' => $this->request->getPost('pnumber'),
            'deptid' => $deptid = $this->request->getPost('dept_id'),
            'programid' => $this->request->getPost('programid'),
            'nin' => $this->request->getPost('nin'),
            'current_level' => $this->request->getPost('current_level'),
            'gender' => $this->request->getPost('gender'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'stateid' => $this->request->getPost('stateid'),
            'lgaid' => $this->request->getPost('lgaid'),
            'session_admitted' => $this->request->getPost('session_admitted')

        ];
        $flag = $studentmodel->insert($data);
        if ($flag) {
            session()->setFlashdata('msg', 'Staff added successfully');
            return redirect()->to(site_url('staff/staff-manager'));
        } else {
            session()->setFlashdata('msg', 'Failed to add staff');
            return redirect()->to(site_url('staff/staff-manager'));
        }
    }
    public function student_bulk_upload()
    {
        $file = $this->request->getFile('csvfile');
        $userModel = new Student_model();


        if ($file && $file->isValid() && $file->getExtension() === 'csv') {
            $filePath = $file->getTempName();

            // Open CSV
            if (($handle = fopen($filePath, 'r')) !== FALSE) {
                $authmodel = new Auth_model();

                // Skip header row
                fgetcsv($handle);
                $i = 0;
                while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {

                    $studentmodel = new Student_model();
                    $authmodel = new Auth_model();
                    $userid = Uuid::uuid4()->toString();


                    $user = [
                        'userid' => $userid,
                        'username' => $row[5],
                        'uniqueID' => $row[5],
                        'password' => hash("SHA512", $row[5]),
                        'status' => 'active',
                        'usertype' => 'student',
                        'roleid' => 1,
                    ];

                    $authmodel->insert($user);
                    $data = [
                        'id' => Uuid::uuid4()->toString(),
                        'user_id' => $userid,
                        'surname' => $row[1],
                        'firstname' => $row[2],
                        'othername' => $row[3],
                        'dob' => $row[4],
                        'pnumber' => $row[5],
                        'deptid' => $row[7],
                        'programid' => $row[8],
                        'nin' => $row[6],
                        'current_level' => $row[9],
                        'gender' => $row[10],
                        'email' => $row[12],
                        'phone' => $row[11],
                        'stateid' => $row[13],
                        'lgaid' => $row[14],
                        'session_admitted' => $row[15]

                    ];
                    $flag = $studentmodel->insert($data);
                    $i++;
                }
                fclose($handle);
            }

            session()->setFlashdata('msg', $i . ' Records uploaded successfully');
            return redirect()->to(site_url('staff/student-manager'));
        } else {
            session()->setFlashdata('msg', 'Invalid File Format, Please upload a valid CSV file');
            return redirect()->to(site_url('staff/student-manager'));
        }
    }
    public function fetch_student()
    {

        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM students WHERE pnumber =  "' . trim($_POST["pnumber"]) . '"');
        //echo $db->getLastQuery();exit;
        $record = $query->getRowArray();
        //var_dump($record);exit;
        $user_id = $record['user_id'];

        $paymentmodel = new Payment_model();
        $payment = $paymentmodel
            ->where('user_id', $user_id)
            ->where('type', 'Acceptance')
            ->first();

        $data['payment'] = $payment;

        $studentmodel = new Student_model();
        $data['student'] = $studentmodel
            ->join('logins', 'logins.userid = students.user_id')
            ->join('departments', 'departments.deptid = students.deptid')
            //->join('programmes', 'programmes.program_id = students.programid')
            ->join('payments', 'payments.user_id = students.user_id', 'left')
            ->join('states', 'states.stateid = students.stateid')
            ->where('pnumber', trim($this->request->getPost('pnumber')))
            ->groupStart()
            ->where('payments.type', 'School Fees')
            ->orWhere('payments.type IS NULL')
            ->groupEnd()
            ->first();
        

       // var_dump($data);exit;


        return view('staff/fetch_student', $data);
    }
    public function get_student($userid)
    {

        $studentmodel = new Student_model();
        $record = $studentmodel->where('user_id', $userid)->first();
        //$user_id = $record['user_id'];

        $paymentmodel = new Payment_model();
        $payment = $paymentmodel
            ->where('user_id', $userid)
            ->where('type', 'Acceptance')
            ->first();

        $data['payment'] = $payment;


        $data['student'] = $studentmodel
            ->join('logins', 'logins.userid = students.user_id')
            ->join('departments', 'departments.deptid = students.deptid')
            //->join('programmes', 'programmes.program_id = students.programid')
            ->join('payments', 'payments.user_id = students.user_id', 'left')
            ->join('states', 'states.stateid = students.stateid')
            ->where('students.user_id', $userid)
            ->groupStart()
            ->where('payments.type', 'School Fees')
            ->orWhere('payments.type IS NULL')
            ->groupEnd()
            ->first();

        // var_dump($data);exit;


        return view('staff/get_student', $data);
    }
    public function assign_admission_number($programid, $userid)
    {
        $year = date('y');
        $programmodel = new Programmes_model();
        $program = $programmodel->where('program_id', $programid)->first();
        $code = $program['prog_abbr'];
        $admission_number = 'CHSTJ/' . $year . '/' . $code . '/';
        $studentmodel = new Student_model();
        $record = $studentmodel
            ->join('logins', 'logins.userid = students.user_id')
            ->where('uniqueID !=', 'Unassigned')
            ->where('programid', $programid)
            ->where('session_admitted', $_SESSION['current_session'])
            ->orderBy('pnumber', 'desc')
            ->limit(1)
            ->first();

        //  var_dump($record);exit;
        if (!$record) {
            session()->setFlashdata('msg', 'No student found for this program');
            $admission_number .= '001';
            $studentmodel
                ->set('pnumber', $admission_number)
                ->where('user_id', $userid)
                ->update();
            $authmodel = new Auth_model();
            $authmodel
                ->set('username', $admission_number)
                ->set('uniqueID', $admission_number)
                ->set('password', hash("SHA512", $admission_number))
                ->where('userid', $userid)
                ->update();

            session()->setFlashdata('msg', $admission_number . ' Admission number has been assigned successfully');
        } else {
            $lastno = $record['pnumber'];
            $parts = explode('/', $lastno);
            if ($parts[3] < 10) {
                $admission_number .= '00' . $parts[3] + 1;
            } elseif ($parts[3] < 100) {
                $admission_number .= '0' . $parts[3] + 1;
            } else {
                $admission_number .= $parts[3] + 1;
            }

            $studentmodel
                ->set('pnumber', $admission_number)
                ->where('user_id', $userid)
                ->update();
            $authmodel = new Auth_model();
            $authmodel
                ->set('username', $admission_number)
                ->set('uniqueID', $admission_number)
                ->set('password', hash("SHA512", $admission_number))
                ->where('userid', $userid)
                ->update();
        }



        return redirect()->to(site_url('staff/get_student/' . $userid));
    }
    public function print_admission_letter($userid)
    {
        $studentmodel = new Student_model();
        $record = $studentmodel
            ->join('departments', 'departments.deptid = students.deptid')
            ->where('user_id', $userid)->first();
        $data['student'] = $record;
        return view('staff/print_admission_letter', $data);
    }
    public function add_course()
    {
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'course_code' => $this->request->getPost('course_code'),
            'course_title' => $this->request->getPost('course_title'),
            'session' => $this->request->getPost('session'),
            'deptid' => $this->request->getPost('deptid'),
            'credit_unit' => $this->request->getPost('credit_unit'),
            'level' => $this->request->getPost('level'),
            'semester' => $this->request->getPost('semester'),

        ];
        $coursemodel = new Course_model();
        $record = $coursemodel
            ->where('course_code', $this->request->getPost('course_code'))
            ->where('session', $this->request->getPost('session'))
            ->first();
        if ($record) {
            session()->setFlashdata('msg', 'Course already exists');
            return redirect()->to(site_url('staff/course-manager'));
        }

        $insert = $coursemodel->insert($data);

        if (!$insert) {
            session()->setFlashdata('msg', 'Course added successfully');
            return redirect()->to(site_url('staff/course-manager'));
        }
    }
    public function view_rooms($hostelid)
    {
        // echo "1"; exit;
        $roommodel = new Room_model();
        $record = $roommodel->where('hostelid', $hostelid)->findAll();
        //var_dump($record);exit;
        $data['rooms'] = $record;
        return view('staff/view_rooms', $data);
    }
    public function view_bedspaces($roomid)
    {
        $bedspacemodel = new Bedspace_model();
        $record = $bedspacemodel->where('roomid', $roomid)->findAll();
       // var_dump($record);exit;
        $data['bedspaces'] = $record;
        return view('staff/view_bedspaces', $data);
    }
    public function pending_applicants($hostelid)
    {
        $reservationmodel = new Reservation_model();
        $record = $reservationmodel
        ->join('students', 'students.user_id = reservations.userid')
        ->join('hostels', 'hostels.hostelid = reservations.hostelid')
        ->join('rooms', 'rooms.id = reservations.roomid')
        ->join('bedspaces', 'bedspaces.id = reservations.bedspaceid')
        ->where('reservations.hostelid', $hostelid)
        ->where('reservations.reservation_status', 'Pending')
        ->findAll();
      // var_dump($record);exit;
        $data['reservations'] = $record;
        return view('staff/pending_applicants', $data);
    }
    public function approved_applicants($hostelid)
    {
        $reservationmodel = new Reservation_model();
        $record = $reservationmodel
        ->join('students', 'students.user_id = reservations.userid')
        ->join('hostels', 'hostels.hostelid = reservations.hostelid')
        ->join('rooms', 'rooms.id = reservations.roomid')
        ->join('bedspaces', 'bedspaces.id = reservations.bedspaceid')
        ->where('reservations.hostelid', $hostelid)
        ->where('reservations.reservation_status', 'Approved')
        ->findAll();
       // var_dump($record);exit;
        $data['bedspaces'] = $record;
        return view('staff/view_bedspaces', $data);
    }
    public function declined_applicants($hostelid)
    {
        $reservationmodel = new Reservation_model();
        $record = $reservationmodel
       ->join('students', 'students.user_id = reservations.userid')
        ->join('hostels', 'hostels.hostelid = reservations.hostelid')
        ->join('rooms', 'rooms.id = reservations.roomid')
        ->join('bedspaces', 'bedspaces.id = reservations.bedspaceid')
        ->where('reservations.hostelid', $hostelid)
        ->where('reservations.reservation_status', 'Declined')
        ->findAll();
       // var_dump($record);exit;
        $data['bedspaces'] = $record;
        return view('staff/view_bedspaces', $data);
    }
    public function approve_reservation($reservationid)
    {
        $reservationmodel = new Reservation_model();
        $record = $reservationmodel->where('reservation_id', $reservationid)->first();
        $reservationmodel->set('reservation_status', 'Approved')->where('reservation_id', $reservationid)->update();
        session()->setFlashdata('msg', 'Reservation approved successfully');
        return redirect()->to(site_url('staff/pending_applicants/' . $record['hostelid']));
    }
    public function reject_reservation($reservationid)
    {
        $reservationmodel = new Reservation_model();
        $record = $reservationmodel->where('reservation_id', $reservationid)->first();
        $reservationmodel->set('reservation_status', 'Declined')->where('reservation_id', $reservationid)->update();
        session()->setFlashdata('msg', 'Reservation rejected successfully');
        return redirect()->to(site_url('staff/pending_applicants/' . $record['hostelid']));
    }
    public function add_fee()
    {
        $data = [
            'programid' => $this->request->getPost('programid'),
            'item' => $this->request->getPost('item'),
            'amount' => $this->request->getPost('amount'),
            'level' => $this->request->getPost('level'),
            'session' => $this->request->getPost('session'),
        ];
        $feemodel = new Payment_Schedule_Model();
        $record = $feemodel
            ->where('programid', $this->request->getPost('programid'))
            ->where('item', $this->request->getPost('item'))
            ->where('level', $this->request->getPost('level'))
            ->where('session', $this->request->getPost('session'))
            ->first();
        if ($record) {
            session()->setFlashdata('msg', 'Fee already exists');
            return redirect()->to(site_url('staff/bursary-manager'));
        }
        $insert = $feemodel->insert($data);
        if ($insert) {
            session()->setFlashdata('msg', 'Fee added successfully');
            return redirect()->to(site_url('staff/bursary-manager'));
        }
    }
    public function verifyPayments()
    {
        $studentmodel = new Student_model();
        $record = $studentmodel->where('pnumber', $this->request->getPost('pnumber'))->first();
        if (!$record) {
            session()->setFlashdata('msg', 'Student not found');
            return redirect()->to(site_url('staff/bursary-manager'));
        }
        $paymentmodel = new Payment_Model();
        $paymentrecord = $paymentmodel
        ->where('user_id', $record['user_id'])
        ->findAll();
        $data['student'] = $record;     
        $data['payments'] = $paymentrecord;
        return view('staff/student_payments', $data);
    }
}
