<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - KSCHST Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <?php echo view('student/panel/sidebar.php'); ?>

        <!-- Main Content -->
        <div class="flex-grow-1 bg-light main-content">
            <!-- Header -->
            <header class="main-header p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">My Courses</h4>
                        <small class="text-muted">View and manage your courses</small>
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
                <!-- Semester Selection -->


                <!-- Course Registration Status -->
                <?php if (session()->getFlashdata('msg')) { ?>
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('msg'); ?>
                    </div>
                <?php } ?>



                <!-- Available Courses -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Available Courses</h5>

                    </div>
                    <div class="card-body">
                       
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Session</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($courses_registered as $course): ?>
                                    
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $course['level']. " Course Registration"; ?></td>
                                        <td><?php echo $course['level']; ?></td>
                                        <td><span class="badge bg-success">Registered</span></td>
                                        <td>
                                            <a href="<?php echo site_url('student/print_registration/'.$course['level'].'/'.$_SESSION['userid']); ?>" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    
                    
                <?php if($current_coureReg) {} else {?>
                    
                    
                    <div class="table-responsive">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Course Code</th>
                                        <th>Course Title</th>
                                        <th>Credit Units</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <form action="<?php echo site_url('student/register_courses'); ?>" method="post">
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($courses as $course): ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $course['course_code']; ?></td>
                                                <td><?php echo $course['course_title']; ?></td>
                                                <td><?php echo $course['credit_unit']; ?></td>
                                                <td>Core</td>
                                                <td>
                                                    <input type="hidden" name="level" value="<?php echo $_SESSION['current_level']; ?>">
                                                    <input type="hidden" name="programid" value="<?php echo $_SESSION['programid']; ?>">
                                                    <input type="hidden" name="session" value="<?php echo $_SESSION['session_id']; ?>">
                                                    <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
                                                    <input type="checkbox" name="courses[]" value="<?php echo $course['id']; ?>">
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <input type="submit" value="Register Courses" class="btn btn-primary">
                                </form>
                            </table>
                        </div>
                    </div>
                
                    <?php } ?>
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