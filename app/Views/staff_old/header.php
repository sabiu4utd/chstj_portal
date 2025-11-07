<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHSTJ Staff Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Core CSS -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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