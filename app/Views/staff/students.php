<?php 
//var_dump($departments);exit;
     $prog = "";
    foreach($departments as $dept){
       $prog .="<option value=".$dept['deptid']." >" . $dept['dept_name']. "</option>";
    }
    $states = "";
    foreach($state as $st){
       $states .="<option value=".$st['stateid']." >" . $st['state_name'] . "</option>";
    }
    $program= "";
    foreach($programmes as $progs){
       $program .="<option value=".$progs['program_id']." >" . $progs['program'] . "</option>";
    }
?>


<!DOCTYPE html>
<html lang="en">    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Manager - Admin Portal - KSCHST</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <style>
        .mandatory {
            color: red;
        }
    </style>
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
                        <h4 class="mb-0">Student Manager</h4>
                        <small class="text-muted">Manage student records and information</small>
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
                                        <i class="fas fa-user-graduate text-primary fa-2x"></i>
                                    </div>
                                    <div class="ms-4">
                                        <h6 class="mb-1">Total Students</h6>
                                        <h4 class="mb-0"><?php echo count($totalstudents); ?></h4>
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
                                        <i class="fas fa-user-plus text-success fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">New Admissions</h6>
                                        <h4 class="mb-0"><?php echo count($newstudents); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-warning bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-graduation-cap text-warning fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Graduating</h6>
                                        <h4 class="mb-0"><?php echo count($graduatingstudents); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-info bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-users text-info fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Active Students</h6>
                                        <h4 class="mb-0">1,145</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!-- Actions Bar -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                        <i class="fas fa-plus me-2"></i>Add Student
                                    </button>
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#bulkUpload">
                                        <i class="fas fa-upload me-2"></i>Bulk Upload
                                    </button>
                                    <button class="btn btn-outline-primary">
                                        <i class="fas fa-download me-2"></i>Export Data
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select">
                                    <option>All Departments</option>
                                    <option>Community Health</option>
                                    <option>Nursing</option>
                                    <option>Public Health</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Student List -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="studentTable">
                                <thead>
                                    <tr>
                                        <th>Reg. Number</th>
                                        <th>Student Name</th>
                                        <th>Department</th>
                                        <th>Level</th>
                                        <th>CGPA</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>STD/2023/001</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="">
                                                <div>
                                                    John Doe
                                                    <small class="d-block text-muted">john.doe@example.com</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Community Health</td>
                                        <td>200</td>
                                        <td>3.75</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>View Details</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="fas fa-print me-2"></i>Print Profile</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Add more student rows here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo site_url('staff/register_new_student'); ?>">
                        <!-- Personal Information -->
                        <h6 class="mb-3">Personal Information</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name<span class="mandatory">(*)</span></label>
                                <input type="text" name="firstname" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Surname<span class="mandatory">(*)</span></label>
                                <input type="text" name="surname" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Othername</label>
                                <input type="text" name="othername" class="form-control" >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth<span class="mandatory">(*)</span></label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Application Number<span class="mandatory">(*)</span></label>
                                <input type="text" name="pnumber" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">NIN</label>
                                <input type="text" name="nin" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-md-6">
                                <label class="form-label">Department<span class="mandatory">(*)</span></label>
                                <select name="dept_id" class="form-select" required>
                                    <option value="">Select Department</option>
                                    <?php echo $prog; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Programe<span class="mandatory">(*)</span></label>
                                <select name="programid" class="form-select" required>
                                    <option value="">Select Programmme</option>
                                     <?php echo $program; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-md-6">
                                <label class="form-label">Level<span class="mandatory">(*)</span></label>
                                <select name="current_level" class="form-select" required>
                                    <option value="">Select Level</option>
                                    <option>100</option>
                                    <option>200</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gender<span class="mandatory">(*)</span></label>
                                <select name="gender" class="form-select" required>
                                    <option value="">Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <!-- Contact Information -->
                        <h6 class="mb-3 mt-4">Contact Information</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email<span class="mandatory">(*)</span></label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number<span class="mandatory">(*)</span></label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>
                        </div>
                         <div class="row mb-3">
                           <div class="col-md-6">
                                <label class="form-label">State<span class="mandatory">(*)</span></label>
                                <select id="stateid" name="stateid" class="form-select" required>
                                    <option value="">Select State</option>
                                    <?php echo $states; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">LGA<span class="mandatory">(*)</span></label>
                                <select id="lgaid" name="lgaid" class="form-select" required>
                                    <option value="">Select LGA</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-md-6">
                                <label class="form-label">Session Admitted<span class="mandatory">(*)</span></label>
                                <select name="session_admitted" class="form-select" required>
                                    <option value="">Session Admitted</option>
                                    <option>2024/2025</option>
                                    <option>2025/2026</option>
                                    <option>2026/2027</option>
                                    <option>2027/2028</option>
                                    <option>2028/2029</option>
                                    <option>2029/2030</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" value="Add Student" class="btn btn-primary block">
                            </div>
                        </div>
                       

                       
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Student</button> -->
                </div>
            </div>
        </div>
    </div>
     <div class="modal fade" id="bulkUpload" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload New Students</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo site_url('staff/student_bulk_upload'); ?>" enctype="multipart/form-data">
                        <!-- Personal Information -->
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="file" name="csvfile" class="form-control" required>
                            </div>
                        </div>
                       <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="submit" value="Add Student" class="btn btn-primary block">
                            </div>
                        </div>

                       
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url(); ?>assets/template/bulk_upload_template.csv"  class="btn btn-secondary" target="_blank" >Download Template</a>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- Custom JS -->
    <script src="<?php echo base_url() ?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/responsive.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#studentTable').DataTable({
                pageLength: 10,
                order: [[0, 'asc']]
            });

            // Handle state change event
            $('#stateid').change(function() {
                var stateId = $(this).val();
                var lgaSelect = $('#lgaid');
                
                // Clear current options
                lgaSelect.empty().append('<option value="">Select LGA</option>');
                
                if(!stateId) return;
                
                // Show loading state
                lgaSelect.prop('disabled', true);
                
                $.ajax({
                    url: '<?php echo site_url("get-lgas"); ?>/' + stateId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if(response) {
                            $.each(response, function(index, lga) {
                                lgaSelect.append($('<option>', {
                                    value: lga.lgaid,
                                    text: lga.lga_name
                                    //text: lga.lgaid
                                }));
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        console.log('Status:', status);
                        console.log('Response:', xhr.responseText);
                    },
                    complete: function() {
                        lgaSelect.prop('disabled', false);
                    }
                });
            });
        });
    </script>
</body>

</html>