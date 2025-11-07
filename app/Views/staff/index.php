<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - KSCHST Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php echo view("staff/panel/sidebar.php"); ?>

        <!-- Main Content -->
        <div class="flex-grow-1 bg-light">
            <!-- Header -->
            <header class="main-header p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">Admin Dashboard</h4>
                        <small class="text-muted">Welcome back, Admin</small>
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
                                        <i class="fas fa-user-graduate text-primary fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Total Students</h6>
                                        <h4 class="mb-0"><?php echo $_SESSION['total_students'] ?></h4>
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
                                        <i class="fas fa-users text-success fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Total Staff</h6>
                                        <h4 class="mb-0"><?php echo $_SESSION['total_staff'] ?></h4>
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
                                        <i class="fas fa-book text-warning fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Courses</h6>
                                        <h4 class="mb-0"><?php echo $_SESSION['total_courses'] ?></h4>
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
                                        <i class="fas fa-building text-danger fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Hostels</h6>
                                        <h4 class="mb-0"><?php echo $_SESSION['total_hostels'] ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities & Quick Actions -->
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card h-100">
                            <div class="card-header" style="text-align: center;">
                                CENTRAL REGISTRATIONS
                            </div>
                            <div class="card-body">
                               <form action="<?php echo site_url('staff/fetch_student') ?>" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required placeholder="Application Number or Admission number" name="pnumber" id="pnumber" aria-label="Search student by name or admission number" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Fetch Student Record</button>
                                </div>
                               </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="mb-0">Quick Actions</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-primary">
                                        <i class="fas fa-user-plus me-2"></i>Add New Student
                                    </button>
                                    <button class="btn btn-outline-primary">
                                        <i class="fas fa-user-tie me-2"></i>Add New Staff
                                    </button>
                                    <button class="btn btn-outline-primary">
                                        <i class="fas fa-book-medical me-2"></i>Create Course
                                    </button>
                                    <button class="btn btn-outline-primary">
                                        <i class="fas fa-file-alt me-2"></i>Generate Reports
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/script.js"></script>
</body>
</html>
