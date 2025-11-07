
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details - KSCHST Portal</title>
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
                        <h4 class="mb-0">Student Details</h4>
                        <small class="text-muted">View and manage student information</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-bell text-muted"></i>
                        </div>
                        <img src="https://via.placeholder.com/40" class="rounded-circle profile-image" alt="Profile">
                    </div>
                </div>
            </header>

            <!-- Student Details Content -->
            <div class="p-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card dashboard-card">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-user-graduate me-2"></i>Student Information
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            
                                            <tr>
                                                <th style="width: 30%;">
                                                    <i class="fas fa-user me-2 text-primary"></i>Full Name
                                                </th>
                                                <td><?php echo $student['firstname'] . ' ' . $student['surname'] . ' ' . $student['othername'];  ?></td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%;">
                                                    <i class="fas fa-building me-2 text-primary"></i>Department
                                                </th>
                                                <td><?php echo $student['dept_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-phone me-2 text-success"></i>Phone Number
                                                </th>
                                                <td><?php echo $student['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-envelope me-2 text-info"></i>Email
                                                </th>
                                                <td><?php echo $student['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-graduation-cap me-2 text-warning"></i>Level
                                                </th>
                                                <td><?php echo $student['current_level']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-credit-card me-2 text-danger"></i>Tuition Fee                                                 </th>
                                                <td><?php if($student['status'] == Null){ echo "Not Paid"; }else{ echo "Paid"; } ?></td>
                                            </tr>
                                             <tr>
                                                <th>
                                                    <i class="fas fa-credit-card me-2 text-danger"></i>Acceptance Fee 
                                                </th>
                                                <td><?php if(!$payment){ echo "Not Paid"; }else{ echo "Paid"; } ?></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <?php if ($student['uniqueID'] == 'Unassigned') { ?>
                                    <div class="mt-4">
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            This student has not been assigned an admission number yet.
                                        </div>
                                        <div class="card">
                                            <?php if($student['status'] == "Paid") { ?>
                                           <a href="<?php echo site_url('staff/assign_admission_number/'.$student['programid']).'/'.$student['user_id']; ?>" class="btn btn-primary">Assign Admission Number</a>
                                            <?php }  ?>
                                            
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="mt-4">
                                        <div class="alert alert-success" role="alert">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <strong>Admission Number:</strong> <?php echo $student['pnumber']; ?>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="mt-4">
                                    <a href="<?php echo site_url('staff'); ?>" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                                    </a>
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
</body>
</html>
