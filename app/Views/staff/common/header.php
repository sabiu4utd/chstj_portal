<!-- Common staff header with responsive meta tags and CSS -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHSTJ Staff Portal</title>
    <!-- Core CSS -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- Responsive styles -->
    <style>
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .nav-mobile {
                display: block;
            }
            .nav-desktop {
                display: none;
            }
            .form-group {
                margin-bottom: 15px;
            }
            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="nav-mobile">
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="mobile-menu">
                <a href="<?= site_url('staff') ?>">Dashboard</a>
                <a href="<?= site_url('staff/info') ?>">My Info</a>
                <a href="<?= site_url('staff/student-manager') ?>">Students</a>
                <a href="<?= site_url('staff/course-manager') ?>">Courses</a>
                <a href="<?= site_url('staff/hostel-manager') ?>">Hostel</a>
                <a href="<?= site_url('staff/bursary-manager') ?>">Bursary</a>
                <a href="<?= site_url('staff/result-manager') ?>">Results</a>
                <a href="<?= site_url('staff/settings') ?>">Settings</a>
            </div>
        </nav>