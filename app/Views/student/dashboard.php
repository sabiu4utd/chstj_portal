<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - KSCHST</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @media (max-width: 991.98px) {
            .sidebar {
                position: fixed;
                left: -280px;
                top: 0;
                bottom: 0;
                z-index: 1040;
                transition: all 0.3s ease;
            }
            
            .sidebar.show {
                left: 0;
            }
            
            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
            }
            
            .main-header {
                padding-left: 4rem !important;
            }
        }
        
        @media (min-width: 992px) {
            .main-content {
                margin-left: 280px;
                width: calc(100% - 280px);
            }
        }
        
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1030;
        }
        
        #sidebarToggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1050;
            background: #2c3e50;
            border: none;
            color: white;
            padding: 0.5rem;
            border-radius: 0.375rem;
        }
        
        @media (max-width: 991.98px) {
            #sidebarToggle {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="btn d-lg-none">
        <i class="fas fa-bars"></i>
    </button>
    <div class="d-flex position-relative">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - KSCHST Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php echo view('student/panel/sidebar.php');?>

        <!-- Main Content -->
        <div class="flex-grow-1 bg-light main-content">
            <!-- Header -->
            <header class="main-header p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">Welcome, <?php echo $_SESSION['firstname']." ".$_SESSION['surname']." ".$_SESSION['othername']; ?></h4>
                        <small class="text-muted">Student ID: <?php echo $_SESSION['pnumber']; ?></small>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-bell text-muted"></i>
                        </div>
                        <img src="https://via.placeholder.com/40" class="rounded-circle profile-image" alt="Profile">
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="p-4">
                <!-- Quick Stats -->
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="card dashboard-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-graduation-cap text-primary fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Current CGPA</h6>
                                        <h4 class="mb-0">0.0</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card dashboard-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-success bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-book text-success fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Courses</h6>
                                        <h4 class="mb-0">0</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card dashboard-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-warning bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-clock text-warning fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Attendance</h6>
                                        <h4 class="mb-0">0%</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card dashboard-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-danger bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-calendar text-danger fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Semester</h6>
                                        <h4 class="mb-0">1st</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('msg'); ?>
                    </div>
                <?php endif; ?>
                <!-- Upcoming Events & Announcements -->
                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Upcoming Events</h5>
                                <button class="btn btn-sm btn-outline-primary">View All</button>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">1st Semester Lecture</h6>
                                            <small class="text-muted">Comming soon </small>
                                        </div>
                                        <p class="mb-1">Preparation for mid-semester examination starts</p>
                                        <small class="text-muted">January 1, 2025</small>
                                    </div>
                                    <!-- <div class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Course Registration Deadline</h6>
                                            <small class="text-muted">1 week</small>
                                        </div>
                                        <p class="mb-1">Last date for course registration</p>
                                        <small class="text-muted">September 5, 2025</small>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="mb-0">Announcements</h5>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-custom mb-3">
                                    <h6 class="mb-1"> Notice Lecture</h6>
                                    <p class="mb-0 small">College will be on lecture on January 3rd.</p>
                                </div>
                                <!-- <div class="alert alert-custom mb-3">
                                    <h6 class="mb-1">Library Hours Extended</h6>
                                    <p class="mb-0 small">Library will remain open until 10 PM during examination period.</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/script.js"></script>
    <script>
        // Mobile sidebar toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mainContent = document.querySelector('.main-content');
            const overlay = document.createElement('div');
            overlay.classList.add('sidebar-overlay');
            document.body.appendChild(overlay);

            function toggleSidebar() {
                sidebar.classList.toggle('show');
                overlay.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
                if (sidebar.classList.contains('show')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            }

            sidebarToggle.addEventListener('click', toggleSidebar);
            overlay.addEventListener('click', toggleSidebar);

            // Close sidebar when clicking a nav link on mobile
            const navLinks = document.querySelectorAll('.sidebar .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        toggleSidebar();
                    }
                });
            });

            // Handle resize events
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 992) {
                    sidebar.classList.remove('show');
                    overlay.style.display = 'none';
                    document.body.style.overflow = '';
                }
            });
        });
    </script>
</body>
</html>
