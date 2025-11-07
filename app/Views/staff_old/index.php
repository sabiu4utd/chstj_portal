<?= view('staff/header') ?>

<!-- Main Content -->
<div class="content-wrapper">
    <header class="main-header p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0">Staff Dashboard</h4>
                <small class="text-muted">Welcome back, <?= session()->get('name') ?></small>
            </div>
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <i class="fas fa-bell text-muted"></i>
                </div>
                <img src="https://via.placeholder.com/40" class="rounded-circle profile-image" alt="Profile">
            </div>
        </div>
    </header>

    <div class="dashboard-content p-3">
        <!-- Quick Stats -->
        <div class="stats-grid">
            <div class="stats-card">
                <div class="stats-icon bg-primary">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="stats-info">
                    <h6>Total Students</h6>
                    <h4><?= $_SESSION['total_students'] ?></h4>
                </div>
            </div>

            <div class="stats-card">
                <div class="stats-icon bg-success">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stats-info">
                    <h6>Total Staff</h6>
                    <h4><?= $_SESSION['total_staff'] ?></h4>
                </div>
            </div>

            <div class="stats-card">
                <div class="stats-icon bg-warning">
                    <i class="fas fa-book"></i>
                </div>
                <div class="stats-info">
                    <h6>Courses</h6>
                    <h4><?= $_SESSION['total_courses'] ?></h4>
                </div>
            </div>

            <div class="stats-card">
                <div class="stats-icon bg-danger">
                    <i class="fas fa-building"></i>
                </div>
                <div class="stats-info">
                    <h6>Hostels</h6>
                    <h4><?= $_SESSION['total_hostels'] ?></h4>
                </div>
            </div>
        </div>

        <!-- Central Registration -->
        <div class="registration-section mt-4">
            <?php if(session()->getFlashdata('msg')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('msg') ?>
            </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header text-center">
                    CENTRAL REGISTRATIONS
                </div>
                <div class="card-body">
                    <form action="<?= site_url('staff/fetch_student') ?>" method="post" class="responsive-form">
                        <div class="search-group">
                            <input type="text" 
                                   class="form-control" 
                                   required 
                                   placeholder="Application Number or Admission number" 
                                   name="pnumber" 
                                   id="pnumber">
                            <button class="btn btn-primary" type="submit">
                                Search Student
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Dashboard responsive styles */
    .content-wrapper {
        flex: 1;
        background: #f8f9fa;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .stats-card {
        background: #fff;
        border-radius: 10px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .stats-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }

    .stats-icon i {
        font-size: 1.5rem;
        color: #fff;
    }

    .stats-info h6 {
        margin: 0;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .stats-info h4 {
        margin: 0.25rem 0 0 0;
        font-size: 1.5rem;
    }

    .search-group {
        display: flex;
        gap: 1rem;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }

        .search-group {
            flex-direction: column;
        }

        .search-group .btn {
            width: 100%;
        }

        .stats-card {
            padding: 1rem;
        }

        .stats-icon {
            width: 40px;
            height: 40px;
        }

        .stats-info h4 {
            font-size: 1.25rem;
        }
    }

    @media (max-width: 480px) {
        .main-header {
            padding: 1rem !important;
        }

        .dashboard-content {
            padding: 1rem !important;
        }

        .stats-card {
            padding: 0.75rem;
        }
    }
</style>

<?= view('staff/footer') ?>
