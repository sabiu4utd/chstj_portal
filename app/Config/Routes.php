<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Authentications and Logout 
$routes->get('/', 'Auth::Login');
$routes->post('authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');


//Student Routes
$routes->get('student', 'Student::index');
$routes->get('student/info', 'Student::info');
$routes->get('student/payments', 'Student::payments');
$routes->get('student/courses', 'Student::courses');
$routes->get('student/accomodations', 'Student::accomodations');
$routes->get('student/results', 'Student::results');
$routes->get('student/ecards', 'Student::ecards');
$routes->get('student/forms', 'Student::forms');
$routes->get('student/process_payments/(:segment)', 'Student::process_payments/$1');
$routes->get('student/process_fees/(:segment)', 'Student::process_fees/$1');
$routes->get('student/receipt/(:segment)', 'Student::receipt/$1');
$routes->post('student/register_courses', 'Student::register_courses');
$routes->get('student/print_registration/(:segment)/(:segment)', 'Student::print_registration/$1/$2');
$routes->get('provisional_offer', 'Student::provisional_offer');
$routes->post('student/load_rooms', 'Student::load_rooms');
$routes->post('student/load_bedspace', 'Student::load_bedspace');
$routes->post('student/make_reservation', 'Student::make_reservation');
$routes->get('student/hostel', 'Student::hostel');
$routes->post('student/get_bedsapces', 'Student::get_bedsapces');
$routes->get('student/hostel_payments/(:segment)', 'Student::hostel_payments/$1');





//Staff Routes 
$routes->get('staff', 'Staff::index');
$routes->get('staff/info', 'Staff::info');
$routes->get('staff/staff-manager', 'Staff::staffManager');
$routes->get('staff/student-manager', 'Staff::studentManager');
$routes->get('staff/course-manager', 'Staff::courseManager');
$routes->get('staff/hostel-manager', 'Staff::hostelManager');
$routes->get('staff/bursary-manager', 'Staff::bursaryManager');
$routes->get('staff/result-manager', 'Staff::resultManager');
$routes->get('staff/settings', 'Staff::settings');
$routes->post('add-staff', 'Staff::add_staff');
$routes->get('get-lgas/(:num)', 'Staff::getLgasByState/$1');
$routes->post('staff/register_new_student', 'Staff::register_new_student');
$routes->post('staff/student_bulk_upload', 'Staff::student_bulk_upload');
$routes->post('staff/fetch_student', 'Staff::fetch_student');
$routes->get('staff/get_student/(:segment)', 'Staff::get_student/$1');
$routes->get('staff/assign_admission_number/(:segment)/(:segment)', 'Staff::assign_admission_number/$1/$2');
$routes->get('staff/print_admission_letter/(:segment)', 'Staff::print_admission_letter/$1');
$routes->post('staff/add_course', 'Staff::add_course');
$routes->get('staff/view_rooms/(:segment)', 'Staff::view_rooms/$1');
$routes->get('staff/view_bedspaces/(:segment)', 'Staff::view_bedspaces/$1');
$routes->get('staff/pending_applicants/(:segment)', 'Staff::pending_applicants/$1');
$routes->get('staff/approved_applicants/(:segment)', 'Staff::approved_applicants/$1');
//$routes->get('staff/declined_applicants/(:segment)', 'Staff::declined_applicants/$1');
$routes->get('staff/approve-reservation/(:segment)', 'Staff::approve_reservation/$1');
$routes->get('staff/reject-reservation/(:segment)', 'Staff::reject_reservation/$1');
$routes->post('staff/add_fee', 'Staff::add_fee');
$routes->post('staff/verifyPayments', 'Staff::verifyPayments');
$routes->post('staff/generateReport', 'Staff::generateReport');
$routes->post('staff/view_fees_schedule', 'Staff::view_fees_schedule');
$routes->get('staff/delete_fee/(:segment)', 'Staff::delete_fee/$1');


// Admin Routes for Bedspace Management
$routes->get('admin/bedspaces', 'Admin::viewBedspaces');
$routes->post('admin/update-bedspace-status', 'Admin::updateBedspaceStatus');
$routes->get('admin/get-bedspace-details/(:num)', 'Admin::getBedspaceDetails/$1');
