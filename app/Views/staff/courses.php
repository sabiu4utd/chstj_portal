<?php 


$sem ="";
foreach($semester as $row){
$sem .= "<option value='".$row['id']."'>".$row['value']." Semester </option>";
 } 


$session = "<option value='".$active_session['id']."'>".$active_session['session']."</option>";

$depts = "";
foreach($departments as $dp){
    $depts .="<option value=".$dp['deptid'].">".$dp['dept_name']."</option>";
}

$program = "";
foreach($programs as $pg){
    $program .="<option value=".$pg['program_id'].">".$pg['program']."</option>";
}
 ?>


<?php 
$sem ="";
foreach($semester as $row){
    $sem .= "<option value='".$row['id']."'>".$row['value']." Semester </option>";
} 

$session = "<option value='".$active_session['id']."'>".$active_session['session']."</option>";

$depts = "";
foreach($departments as $dp){
    $depts .="<option value=".$dp['deptid'].">".$dp['dept_name']."</option>";
}

$program = "";
foreach($programs as $pg){
    $program .="<option value=".$pg['program_id'].">".$pg['program']."</option>";
}
?>

<?= view('staff/common/header') ?>

<!-- Main Content -->
<div class="content-wrapper bg-light">
            <!-- Header -->
            <header class="main-header p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">Course Manager</h4>
                        <small class="text-muted">Manage courses and curriculum</small>
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


                <!-- Quick Stats -->
            <div class="stats-grid">
                <div class="stats-card">
                    <div class="stats-icon bg-primary">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stats-info">
                        <h6>Total Courses</h6>
                        <h4>45</h4>
                    </div>
                </div>

                <div class="stats-card">
                    <div class="stats-icon bg-success">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="stats-info">
                        <h6>Active Courses</h6>
                        <h4>38</h4>
                    </div>
                </div>

                <div class="stats-card">
                    <div class="stats-icon bg-info">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stats-info">
                        <h6>Departments</h6>
                        <h4>3</h4>
                    </div>
                </div>

                <div class="stats-card">
                    <div class="stats-icon bg-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stats-info">
                        <h6>Current Semester</h6>
                        <h4>2nd</h4>
                    </div>
                </div>
            </div>

            <!-- Course Management -->
            <div class="courses-section mt-4">
                <div class="profile-card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2 py-3">
                        <h5 class="mb-0">Course List</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                            <i class="fas fa-plus me-2"></i>Add New Course
                        </button>
                    </div>
                    <div class="table-wrapper">
                        <div class="table-responsive">
                            <table class="table table-hover" id="courseTable">
                                <thead>
                                    <tr>
                                        <th>Course Code</th>
                                        <th>Course Title</th>
                                        <th>Department</th>
                                        <th>Credit Units</th>
                                        <th>Level</th>
                                        <th>Lecturer</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Code">CHT201</td>
                                        <td data-label="Title">Community Health Practice</td>
                                        <td data-label="Dept">Community Health</td>
                                        <td data-label="Credits">3</td>
                                        <td data-label="Level">200</td>
                                        <td data-label="Lecturer">Dr. Ahmed Ibrahim</td>
                                        <td data-label="Status"><span class="badge bg-success">Active</span></td>
                                        <td data-label="Actions">
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-label="Code">CHT202</td>
                                        <td data-label="Title">Primary Health Care</td>
                                        <td data-label="Dept">Community Health</td>
                                        <td data-label="Credits">3</td>
                                        <td data-label="Level">200</td>
                                        <td data-label="Lecturer">Dr. Sarah James</td>
                                        <td data-label="Status"><span class="badge bg-success">Active</span></td>
                                        <td data-label="Actions">
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Add Course Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('staff/add_course') ?>" class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Course Code</label>
                            <input type="text" name="course_code" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Course Title</label>
                            <input type="text" name="course_title" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Department</label>
                            <select name="deptid" class="form-select" required>
                                <option value="">Select Programme</option>
                                <?= $program ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Level</label>
                            <select name="level" class="form-select" required>
                                <option value="">Select Level</option>
                                <option>100</option>
                                <option>200</option>
                                <option>300</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Session</label>
                            <select name="session" class="form-select" required>
                                <option value="">Select Session</option>
                                <?= $session ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Semester</label>
                            <select name="semester" class="form-select" required>
                                <option value="">Select Semester</option>
                                <?= $sem ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Credit Units</label>
                            <input type="number" name="credit_unit" class="form-control" required>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<style>
    /* Additional Responsive Styles for Courses */
    .courses-section {
        margin: 1.5rem;
    }

    .table-wrapper {
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        justify-content: flex-start;
    }

    @media (max-width: 992px) {
        .courses-section {
            margin: 1rem;
        }

        .table-wrapper {
            border-radius: 8px;
        }

        #courseTable {
            display: block;
        }

        #courseTable thead {
            display: none;
        }

        #courseTable tbody tr {
            display: block;
            margin-bottom: 1rem;
            border-bottom: 2px solid #dee2e6;
        }

        #courseTable td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem;
            border: none;
        }

        #courseTable td::before {
            content: attr(data-label);
            font-weight: bold;
            margin-right: 1rem;
        }

        .action-buttons {
            justify-content: flex-end;
            margin-top: 0.5rem;
        }
    }

    @media (max-width: 576px) {
        .courses-section {
            margin: 0.5rem;
        }

        .card-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .card-header h5 {
            width: 100%;
        }

        .card-header .btn {
            width: 100%;
        }
    }

    /* Modal Form Styles */
    .form-grid {
        display: grid;
        gap: 1rem;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    @media (max-width: 768px) {
        .form-actions {
            flex-direction: column-reverse;
        }

        .form-actions .btn {
            width: 100%;
        }
    }
</style>

<?= view('staff/common/footer') ?>
