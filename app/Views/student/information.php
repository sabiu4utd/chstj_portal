<!DOCTYPE html>
<html lang="en">

<?php 
$lg ="";
foreach($lgas as $lga):
    $lg .= '<option value="'.$lga['lga_name'].'">'.$lga['lga_name'].'</option>';
endforeach;

$st ="";
foreach($states as $state):
    $st .= '<option value="'.$state['stateid'].'">'.$state['state_name'].'</option>';
endforeach;
?>







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
                <?php echo view('student/panel/sidebar.php'); ?>

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
                                <!-- <img src="<?php echo base_url('assets/passports/' . $student['passport']); ?>" class="rounded-circle profile-image" alt="Profile"> -->
                            </div>
                        </div>
                    </header>

                    <!-- Content -->
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <img src="<?php echo base_url('assets/passports/' . $student['passport']); ?>" class="rounded-circle mb-3 profile-image" alt="Profile Picture" style="width: 150px; height: 150px;">
                                        <h5 class="mb-1"><?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['surname']; ?></h5>
                                        <p class="text-muted mb-3"><?php echo $_SESSION['uniqueID']; ?></p>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#passportUploadModal">Change Photo</button>
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
                                                <form method="POST" action="<?php echo base_url('student/update_info'); ?>">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">First Name</label>
                                                            <input type="text" name="firstname" class="form-control" value="<?php echo $student['firstname']; ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Last Name</label>
                                                            <input type="text" name="surname" class="form-control" value="<?php echo $student['surname']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Other Name</label>
                                                            <input type="text" name="othername" class="form-control" value="<?php echo $student['othername']; ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Gender</label>
                                                            <select name="gender" class="form-select">
                                                                <option value="<?php echo $_SESSION['gender']; ?>"><?php echo $student['gender']; ?></option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Date of Birth</label>
                                                            <input type="date" name="dob" class="form-control" value="<?php echo $student['dob']; ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Nationality</label>
                                                             <select name="nationality" class="form-select">
                                                                <option value="Nigerian">Nigerian</option>
                                                                <option value="foreign">Foreign</option>
                                                               
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="mt-3">
                                                        <button class="btn btn-primary">Save Changes</button>
                                                        <button class="btn btn-outline-secondary ms-2">Cancel</button>
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
                                                            <label class="form-label">Expected Year of Graduation</label>
                                                            <input type="text" class="form-control" value="<?php echo date('Y') + 3; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="mt-3">
                                                        <button class="btn btn-primary">Save Changes</button>
                                                        <button class="btn btn-outline-secondary ms-2">Cancel</button>
                                                    </div> -->
                                                </form>
                                            </div>

                                            <!-- Contact Information -->
                                            <div class="tab-pane fade" id="contact">
                                                <form method="POST" action="<?php echo site_url('student/update_info2'); ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email Address</label>
                                                        <input type="email" name="email" class="form-control" value="<?php echo $student['email']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone Number</label>
                                                        <input type="tel" name="phone" class="form-control" value="<?php echo $student['phone']; ?>">
                                                    </div>
                                                    <!-- <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <textarea class="form-control" rows="3"><?php //echo $student['email']; ?></textarea>
                                                    </div> -->
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">State</label>
                                                        <select name="stateid" id="state" class="form-control">
                                                            
                                                            <option selected value="<?php echo $statename['stateid']; ?>"><?php echo $statename['state_name']; ?></option>
                                                            
                                                            <?php echo $st; ?>
                                                        </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">LGA</label>
                                                            <select name="lgaid" id="lga" class="form-control">
                                                               
                                                                <option selected value="<?php echo $student['lgaid']; ?>"><?php echo $student['lgaid']; ?></option>
                                                                <?php echo $lg; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <button class="btn btn-primary">Save Changes</button>
                                                        <button class="btn btn-outline-secondary ms-2">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Passport Upload Modal -->
            <div class="modal fade" id="passportUploadModal" tabindex="-1" aria-labelledby="passportUploadModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="passportUploadModalLabel">Upload Passport</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo site_url('student/upload_passport'); ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="passport_url" accept="image/*" id="passport" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
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