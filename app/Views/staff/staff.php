<?php
    $prog = "";
    foreach($departments as $dept){
       $prog .="<option value=".$dept['deptid']." >" . $dept['dept_name'] . "</option>";
    }
    $role = "";
    foreach($roles as $rol){
       $role .="<option value=".$rol['id']." >" . $rol['role_type'] . "</option>";
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Manager - Admin Portal - KSCHST</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
        .mandatory {
            color: red;
        }
    </style>
</head>
<body>
    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="btn d-lg-none">
        <i class="fas fa-bars"></i>
    </button>
    <div class="d-flex position-relative">
        <!-- Sidebar -->
        <?php echo view("staff/panel/sidebar.php"); ?>

        <!-- Main Content -->
        <div class="flex-grow-1 bg-light main-content">
            <!-- Header -->
            <header class="main-header p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">Staff Manager</h4>
                        <small class="text-muted">Manage staff records and information</small>
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
            <div class="p-4" >
                <!-- Dashboard Cards -->
                 <?php if(session()->getFlashdata('msg')){?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('msg'); ?>
                    </div>
                <?php } ?>
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-users text-primary fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Total Staff</h6>
                                        <h4 class="mb-0"><?php echo count($totalstaff); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-success bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-user-tie text-success fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Academic Staff</h6>
                                        <h4 class="mb-0"><?php echo count($academicstaff); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-info bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-user-cog text-info fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Non-Academic</h6>
                                        <h4 class="mb-0"><?php echo count($nonacademicstaff); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-warning bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-user-clock text-warning fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">New This Month</h6>
                                        <h4 class="mb-0">5</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!-- Staff List -->
                <div class="card">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Staff List</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStaffModal">
                                <i class="fas fa-plus me-2"></i>Add New Staff
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="staffTable">
                                <thead>
                                    <tr>
                                        <th>Staff NO</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Phone No</th>
                                        <th>Email</th>
                                        <th>Staff Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($totalstaff as $staff){ ?>
                                    <tr>
                                        <td><?php echo $staff['staff_no']; ?></td>
                                        <td><?php echo $staff['surname']." ".$staff['firstname']." ".$staff['othername']; ?></td>
                                        <td><?php echo $staff['dept_name']; ?></td>
                                        <td><?php echo $staff['phone']; ?></td>
                                        <td><?php echo $staff['email']; ?></td>
                                        <td><?php echo $staff['staff_type']; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Staff Modal -->
    <div class="modal fade" id="addStaffModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('add-staff'); ?>"> 
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Staff No<span class="mandatory">(*)</span></label>
                                <input type="text" name="staff_no" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Surname<span class="mandatory">(*)</span></label></label>
                                <input type="text" name="surname" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name<span class="mandatory">(*)</span></label></label>
                                <input type="text" name="firstname" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Middle Name</label>
                                <input type="text" name="othername" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Gender<span class="mandatory">(*)</span></label></label>
                                <select name="gender" id="" class="form-control" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth<span class="mandatory">(*)</span></label></label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Date of 1st App</label>
                                <input type="date" name="dofa"  class="form-control" id="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Staff Role.</label>
                                <select name="roleid" class="form-select">
                                    <?php echo $role; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Staff Type<span class="mandatory">(*)</span></label></label>
                                <select name="staff_type" class="form-select" required>
                                    <option value="">Select Staff Category</option>
                                    <option>Academic</option>
                                    <option>Non-Academic</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email<span class="mandatory">(*)</span></label></label>
                               <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Department<span class="mandatory">(*)</span></label></label>
                                <select name="deptid" class="form-select" required>
                                    <option value="">Select Department</option>
                                    <?php echo $prog; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number<span class="mandatory">(*)</span></label></label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add Staff">
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Staff</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/responsive.js"></script>
    <script>
        $(document).ready(function() {
            $('#staffTable').DataTable({
                pageLength: 10,
                order: [[0, 'asc']]
            });
        });
    </script>
</body>
</html>
