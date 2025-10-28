<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Information - Student Portal - KSCHST</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
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
    <title>My Information - KSCHST Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
                        <h4 class="mb-0">My Information</h4>
                        <small class="text-muted">View and update your personal information</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-bell text-muted"></i>
                        </div>
                        <img src="https://via.placeholder.com/40" class="rounded-circle profile-image" alt="Profile">
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="p-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="https://via.placeholder.com/150" class="rounded-circle mb-3 profile-image" alt="Profile Picture" style="width: 150px; height: 150px;">
                                <h5 class="mb-1"><?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['surname']; ?></h5>
                                <p class="text-muted mb-3"><?php echo $_SESSION['uniqueID']; ?></p>
                                <button class="btn btn-primary btn-sm">Change Photo</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#personal" type="button">Personal Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#academic" type="button">Academic Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#contact" type="button">Contact Info</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-4" id="myTabContent">
                                    <!-- Personal Information -->
                                    <div class="tab-pane fade show active" id="personal">
                                        <form>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['firstname']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['surname']; ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Date of Birth</label>
                                                    <input type="date" class="form-control" value="<?php echo $_SESSION['dob']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Gender</label>
                                                    <select class="form-select">
                                                        <option value="<?php echo $_SESSION['gender']; ?>"><?php echo $_SESSION['gender']; ?></option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nationality</label>
                                                <input type="text" class="form-control" value="Nigerian">
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <!-- Academic Information -->
                                    <div class="tab-pane fade" id="academic">
                                        <form>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Department</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['dept_name']; ?>" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Program</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['program']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Level</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['current_level']; ?>" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Registration Number</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['uniqueID']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Entry Year</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['session_admitted']; ?>" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Expected Graduation</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['session_admitted']; ?>" readonly>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <!-- Contact Information -->
                                    <div class="tab-pane fade" id="contact">
                                        <form>
                                            <div class="mb-3">
                                                <label class="form-label">Email Address</label>
                                                <input type="email" class="form-control" value="<?php echo $_SESSION['email']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Phone Number</label>
                                                <input type="tel" class="form-control" value="<?php echo $_SESSION['phone']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control" rows="3"><?php echo $_SESSION['email']; ?></textarea>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">State</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['state_name']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">LGA</label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['lgaid']; ?>">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <!-- <button class="btn btn-primary">Save Changes</button> -->
                                    <button class="btn btn-outline-secondary ms-2">Cancel</button>
                                </div>
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
    <script src="../assets/js/responsive.js"></script>
</body>
</html>
