<?php

namespace App\Controllers;

use App\Models\Payment_Schedule_Model;
use App\Models\Settings_model;
use App\Models\Auth_model;
use App\Models\Student_model;
use App\Models\Staff_model;
use App\Models\Department_model;
use App\Models\Hostel_model;

class Auth extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    public function Login(): string
    {
        return view('login');
    }
    public function authenticate()
    {
        $model = new Auth_model();

        $type = $model->where('username', $this->request->getPost('username'))->first();

        if (!$type) {
            return redirect()->back()->with('msg', 'Invalid username or password.');
        }
        $type = $type['usertype'];
        $email = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $type == "student" ? $model->join('students', 'students.user_id = logins.userid') : $model->join('staff', 'staff.user_id = logins.userid');
        $model->where('username', $email);
        $model->where('password', hash('sha512', $password));
        $user = $model->first();
        // var_dump($user); exit;
        if (!$user) {
            return redirect()->back()->with('msg', 'Invalid username or password.');
        }
        $settingmodel = new Settings_model();
        $current_setting = $settingmodel
            ->where('status', 'active')
            ->where('setting', 'session')
            ->first();
        // $_SESSION['current_session'] = $settingmodel->value;

        if ($user['usertype'] == 'student') {
            $departmentModel = new Department_model();
            $department = $departmentModel->where('deptid', $user['deptid'])->first();
            $_SESSION['dept_name'] = $department['dept_name'];
        }







        if ($user) {
            $sessionData = [
                'userid' => $user['userid'],
                'username' => $user['username'],
                'usertype' => $user['usertype'],
                'uniqueID' => $user['uniqueID'],
                'pnumber' => $user['pnumber'] ?? '',
                'status' => $user['status'],
                'gender' => $user['gender'],
                'current_level' => $user['current_level'] ?? '',
                'programid' => $user['programid'] ?? '',
                'roleid' => $user['roleid'] ?? '',
                'logged_in' => true,
                'type' => $type,
                'firstname' => $user['firstname'] ?? '',
                'surname' => $user['surname'] ?? '',
                'othername' => $user['othername'] ?? '',
                'email' => $user['email'] ?? '',
                'current_session' => $current_setting['value'],
                'session_id' => $current_setting['id'],
                'session_admitted' => $user['session_admitted'] ?? ''

            ];
            $this->session->set($sessionData);
            if ($user['usertype'] == 'staff') {
                $studentModel = new Student_model();
                $staffModel = new Staff_model();
                $departmentModel = new Department_model();
                $hostelmodel = new Hostel_model();
                $_SESSION['total_students'] = count($studentModel->findAll());
                $_SESSION['total_staff'] = count($staffModel->findAll());
                $_SESSION['total_courses'] = count($departmentModel->findAll());
                $_SESSION['total_hostels'] = count($hostelmodel->findAll());
                return redirect('staff');
                //return redirect()->to(base_url('staff'));
            } elseif ($user['usertype'] == 'student') {


                return redirect('student'); //->to(base_url('student'));
            } else {
                return redirect('admin'); //->to(base_url('admin'));
            }
        }
    }
    public function logout()
    {
        return redirect("/")->with('error', 'Invalid username or password.');
    }
}
