<div class="sidebar px-3 py-4" style="width: 280px;">
            <div class="text-center mb-4">
                <img src="<?php echo base_url() ?>assets/img/logo.jpg" alt="KSCHST Logo" class="img-fluid mb-3" style="max-height: 80px;">
                <h6 class="mb-0 text-white">Student Portal</h6>
            </div>
            
            <nav class="nav flex-column">
                <a class="nav-link active" href="<?php echo site_url('student'); ?>">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
                <a class="nav-link" href="<?php echo site_url('student/info'); ?>">
                    <i class="fas fa-user me-2"></i> My Information
                </a>
                <a class="nav-link" href="<?php echo site_url('student/payments'); ?>">
                    <i class="fas fa-credit-card me-2"></i> My Payment
                </a>
                <a class="nav-link" href="<?php echo site_url('student/courses'); ?>">
                    <i class="fas fa-book me-2"></i> My Courses
                </a>
                <!-- <a class="nav-link" href="<?php echo site_url('student/hostel'); ?>">
                    <i class="fas fa-building me-2"></i> Accommodation -->
                 </a> <a class="nav-link" href="<?php echo site_url('student/accomodations'); ?>">
                    <i class="fas fa-building me-2"></i> Accommodation
                </a> 
                <a class="nav-link" href="<?php echo site_url('student/results'); ?>">
                    <i class="fas fa-chart-bar me-2"></i> My Result
                </a>
                <a class="nav-link" href="<?php echo site_url('student/ecards'); ?>">
                    <i class="fas fa-id-card me-2"></i> Exam Card
                </a>
                <a class="nav-link" href="<?php echo site_url('student/forms'); ?>">
                    <i class="fas fa-file-alt me-2"></i> Forms
                </a>
                <?php if ($_SESSION['uniqueID'] == 'Unassigned' ) { ?>
                <a class="nav-link" href="<?php echo site_url('provisional_offer'); ?>">
                    <i class="fas fa-file-alt me-2"></i> Provisional Offer
                </a>
                <?php } ?>
                <a class="nav-link mt-4 text-danger" href="<?php echo site_url('logout'); ?>">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </nav>
        </div>i