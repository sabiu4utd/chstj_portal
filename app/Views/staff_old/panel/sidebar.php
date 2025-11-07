<div class="sidebar px-3 py-4" style="width: 280px;">
            <div class="text-center mb-4">
                <img src="<?php echo base_url() ?>assets/img/logo.jpg" alt="KSCHST Logo" class="img-fluid mb-3" style="max-height: 80px;">
                <h6 class="mb-0 text-white">Admin Portal</h6>
            </div>
            
            <nav class="nav flex-column">
                <a class="nav-link active" href="<?php echo site_url('staff'); ?>">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
                <a class="nav-link" href="<?php echo site_url('staff/info'); ?>">
                    <i class="fas fa-user me-2"></i> My Information
                </a>
                <a class="nav-link" href="<?php echo site_url('staff/staff-manager'); ?>">
                    <i class="fas fa-users me-2"></i> Staff Manager
                </a>
                <a class="nav-link" href="<?php echo site_url('staff/student-manager'); ?>">
                    <i class="fas fa-user-graduate me-2"></i> Student Manager
                </a>
                <a class="nav-link" href="<?php echo site_url('staff/course-manager'); ?>">
                    <i class="fas fa-book me-2"></i> Course Manager
                </a>
                <a class="nav-link" href="<?php echo site_url('staff/hostel-manager'); ?>">
                    <i class="fas fa-building me-2"></i> Hostel Manager
                </a>
                <a class="nav-link" href="<?php echo site_url('staff/bursary-manager'); ?>">
                    <i class="fas fa-money-bill me-2"></i> Bursary Manager
                </a>
                <a class="nav-link" href="<?php echo site_url('staff/result-manager'); ?>">
                    <i class="fas fa-chart-bar me-2"></i> Result Manager
                </a>
                <a class="nav-link" href="<?php echo site_url('staff/settings'); ?>">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
                <a class="nav-link mt-4 text-danger" href="<?php echo site_url('logout'); ?>">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </nav>
        </div>