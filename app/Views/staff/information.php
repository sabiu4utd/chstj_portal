<?= view('staff/common/header') ?>
<!-- Main Content -->
<div class="content-wrapper">
    <header class="main-header p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0">My Information</h4>
                <small class="text-muted">View and update your profile information</small>
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
    <div class="profile-wrapper">
        <div class="grid-layout">
            <!-- Profile Summary -->
            <div class="profile-sidebar">
                <div class="profile-card">
                    <div class="profile-image-container">
                        <img src="https://via.placeholder.com/150" alt="Admin Profile Picture">
                    </div>
                    <h5 class="text-center mb-1">Admin Name</h5>
                    <p class="text-muted text-center mb-3">System Administrator</p>
                    <button class="btn btn-primary btn-sm w-100">Change Photo</button>
                </div>

                <!-- Account Status -->
                <div class="profile-card">
                    <h6 class="mb-3">Account Status</h6>
                    <div class="mb-2">
                        <small class="text-muted">Account Type:</small>
                        <p class="mb-0">Super Admin</p>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted">Last Login:</small>
                        <p class="mb-0">August 24, 2025, 09:30 AM</p>
                    </div>
                    <div>
                        <small class="text-muted">Status:</small>
                        <p class="mb-0"><span class="badge bg-success">Active</span></p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="profile-card">
                    <h6 class="mb-3">Quick Links</h6>
                    <div class="quick-links">
                        <button class="btn btn-outline-primary btn-sm w-100 mb-2">
                            <i class="fas fa-key me-2"></i>Change Password
                        </button>
                        <button class="btn btn-outline-primary btn-sm w-100 mb-2">
                            <i class="fas fa-shield-alt me-2"></i>Security Settings
                        </button>
                        <button class="btn btn-outline-primary btn-sm w-100">
                            <i class="fas fa-history me-2"></i>Activity Log
                        </button>
                    </div>
                </div>
            </div>

            <!-- Profile Details -->
            <div class="profile-content">
                <div class="profile-card">
                    <div class="tab-nav" role="tablist">
                        <button class="active" data-bs-toggle="tab" data-bs-target="#personal">
                            <i class="fas fa-user me-2"></i>Personal Info
                        </button>
                        <button data-bs-toggle="tab" data-bs-target="#security">
                            <i class="fas fa-shield-alt me-2"></i>Security
                        </button>
                        <button data-bs-toggle="tab" data-bs-target="#activities">
                            <i class="fas fa-history me-2"></i>Activities
                        </button>
                    </div>

                    <div class="tab-content pt-4">
                        <!-- Personal Information -->
                        <div class="tab-pane fade show active" id="personal">
                            <form class="form-grid">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="John">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="Doe">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="admin@kschst.edu.ng">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" class="form-control" value="+234 800 000 0000">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Department</label>
                                    <input type="text" class="form-control" value="Administration">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <input type="text" class="form-control" value="System Administrator" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" rows="3">123 Admin Block, KSCHST Campus, Jega, Kebbi State</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                            </form>
                        </div>

                        <!-- Security Settings -->
                        <div class="tab-pane fade" id="security">
                            <form class="form-grid">
                                <div class="mb-3">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <h6>Two-Factor Authentication</h6>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="twoFactor" checked>
                                        <label class="form-check-label" for="twoFactor">Enable Two-Factor Authentication</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Update Security Settings</button>
                            </form>
                        </div>

                        <!-- Activity Log -->
                        <div class="tab-pane fade" id="activities">
                            <div class="table-responsive">
                                <table class="activity-table">
                                    <thead>
                                        <tr>
                                            <th>Activity</th>
                                            <th>Time</th>
                                            <th>IP Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>System Login</td>
                                            <td>24/08/2025 09:30 AM</td>
                                            <td>192.168.1.1</td>
                                            <td><span class="badge bg-success">Successful</span></td>
                                        </tr>
                                        <tr>
                                            <td>Password Change</td>
                                            <td>23/08/2025 03:45 PM</td>
                                            <td>192.168.1.1</td>
                                            <td><span class="badge bg-success">Successful</span></td>
                                        </tr>
                                        <tr>
                                            <td>Profile Update</td>
                                            <td>22/08/2025 11:20 AM</td>
                                            <td>192.168.1.1</td>
                                            <td><span class="badge bg-success">Successful</span></td>
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
</div>

<style>
    /* Responsive Profile Styles */
    .profile-wrapper {
        padding: 1.5rem;
    }

    .profile-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 1.5rem;
    }

    .profile-image-container {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto 1rem;
    }

    .profile-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .tab-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .tab-nav button {
        flex: 1;
        min-width: 120px;
        padding: 0.5rem;
        border: none;
        background: none;
        color: #6c757d;
        border-bottom: 2px solid transparent;
    }

    .tab-nav button.active {
        color: #0d6efd;
        border-bottom-color: #0d6efd;
    }

    .form-grid {
        display: grid;
        gap: 1rem;
    }

    .activity-table {
        width: 100%;
    }

    .activity-table td {
        padding: 0.75rem;
        border-bottom: 1px solid #dee2e6;
    }

    @media (max-width: 768px) {
        .profile-wrapper {
            padding: 1rem;
        }

        .profile-image-container {
            width: 120px;
            height: 120px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .activity-table {
            font-size: 0.875rem;
        }

        .activity-table td {
            padding: 0.5rem;
        }

        .quick-links button {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .profile-image-container {
            width: 100px;
            height: 100px;
        }

        .tab-nav {
            flex-direction: column;
        }

        .tab-nav button {
            width: 100%;
            text-align: left;
            padding: 0.75rem;
            border-left: 2px solid transparent;
            border-bottom: none;
        }

        .tab-nav button.active {
            border-left-color: #0d6efd;
            border-bottom: none;
            background: rgba(13, 110, 253, 0.1);
        }
    }
</style>

<?= view('staff/common/footer') ?>
