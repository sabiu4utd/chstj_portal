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
        <a class="nav-link" href="<?php echo site_url('student/accomodations'); ?>">
            <i class="fas fa-building me-2"></i> Accommodation
        </a>
        <a class="nav-link" href="#<?php echo site_url('student/results'); ?>">
            <i class="fas fa-chart-bar me-2"></i> My Result
        </a>
        <a class="nav-link" href="#<?php echo site_url('student/ecards'); ?>">
            <i class="fas fa-id-card me-2"></i> Exam Card
        </a>
        <a class="nav-link" href="#<?php echo site_url('student/forms'); ?>">
            <i class="fas fa-file-alt me-2"></i> Forms
        </a>
        <?php if ($_SESSION['uniqueID'] == 'Unassigned' && isset($_SESSION['acceptance_payment_status'])) { ?>
            <a class="nav-link" href="<?php echo site_url('provisional_offer'); ?>">
                <i class="fas fa-file-alt me-2"></i> Provisional Offer
            </a>
        <?php } ?>
        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
            <i class="fas fa-key me-2"></i> Change Password
        </a>
        <a class="nav-link mt-4 text-danger" href="<?php echo site_url('logout'); ?>">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
    </nav>
</div>


<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('student/changepassword'); ?>">
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <div id="passwordChangeMessage" class="alert" style="display: none;"></div>
                    <input type="submit" name="submit" value="Change" class="btn btn-primary">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" onclick="changePassword()">Save Changes</button> -->
            </div>
        </div>
    </div>
</div>

<script>
    // Improved mobile navigation handling
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.sidebar');
        const sidebarLinks = sidebar.querySelectorAll('.nav-link:not([data-bs-toggle])');
        const overlay = document.querySelector('.sidebar-overlay');

        function closeSidebar() {
            if (window.innerWidth < 992) {
                sidebar.classList.remove('show');
                if (overlay) {
                    overlay.style.display = 'none';
                }
                document.body.style.overflow = '';
            }
        }

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                if (window.innerWidth < 992) {
                    // Only handle non-modal links
                    if (!this.hasAttribute('data-bs-toggle')) {
                        closeSidebar();
                        if (this.getAttribute('href') === '#') {
                            e.preventDefault();
                        }
                    }
                }
            });
        });

        // Ensure links work properly when transitioning from mobile to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                sidebar.style.removeProperty('left');
                if (overlay) {
                    overlay.style.display = 'none';
                }
            }
        });

        // Fix for touch events on mobile
        if ('ontouchstart' in window) {
            sidebarLinks.forEach(link => {
                link.addEventListener('touchend', function(e) {
                    if (window.innerWidth < 992) {
                        // Add a small delay to ensure the click event processes properly
                        setTimeout(() => {
                            if (this.getAttribute('href') !== '#' && !this.hasAttribute('data-bs-toggle')) {
                                window.location.href = this.getAttribute('href');
                            }
                        }, 100);
                    }
                });
            });
        }
    });
</script>