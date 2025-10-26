<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Manager - Admin Portal - KSCHST</title>
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
                        <h4 class="mb-0">Result Manager</h4>
                        <small class="text-muted">Manage student results and academic records</small>
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
                <!-- Quick Stats -->
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-graduation-cap text-primary fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Total Students</h6>
                                        <h4 class="mb-0">650</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-success bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-check-circle text-success fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Pass Rate</h6>
                                        <h4 class="mb-0">85%</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-warning bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-exclamation-circle text-warning fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Pending Results</h6>
                                        <h4 class="mb-0">45</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-info bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-award text-info fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">First Class</h6>
                                        <h4 class="mb-0">52</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Result Management -->
                <div class="row g-4">
                    <!-- Result Upload -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Upload Results</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Department</label>
                                        <select class="form-select" required>
                                            <option value="">Select Department</option>
                                            <option>Health Information Management</option>
                                            <option>Community Health</option>
                                            <option>Environmental Health</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Level</label>
                                        <select class="form-select" required>
                                            <option value="">Select Level</option>
                                            <option>100</option>
                                            <option>200</option>
                                            <option>300</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Semester</label>
                                        <select class="form-select" required>
                                            <option value="">Select Semester</option>
                                            <option>First Semester</option>
                                            <option>Second Semester</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course</label>
                                        <select class="form-select" required>
                                            <option value="">Select Course</option>
                                            <option>Anatomy</option>
                                            <option>Physiology</option>
                                            <option>Public Health</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Result File (Excel)</label>
                                        <input type="file" class="form-control" accept=".xlsx,.xls" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-upload me-2"></i>Upload Results
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Result List -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Result Records</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="resultTable">
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                                <th>Level</th>
                                                <th>Semester</th>
                                                <th>Students</th>
                                                <th>Pass Rate</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ANT101</td>
                                                <td>Basic Anatomy</td>
                                                <td>100</td>
                                                <td>First</td>
                                                <td>120</td>
                                                <td>88%</td>
                                                <td><span class="badge bg-success">Published</span></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-info">
                                                            <i class="fas fa-download"></i>
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

                    <!-- Performance Analytics -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Performance Analytics</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <canvas id="gradeDistributionChart"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <canvas id="departmentPerformanceChart"></canvas>
                                    </div>
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/responsive.js"></script>
    <script>
        $(document).ready(function() {
            $('#resultTable').DataTable({
                pageLength: 10,
                order: [[2, 'asc'], [3, 'asc']]
            });

            // Grade Distribution Chart
            const gradeCtx = document.getElementById('gradeDistributionChart').getContext('2d');
            new Chart(gradeCtx, {
                type: 'bar',
                data: {
                    labels: ['A', 'B', 'C', 'D', 'E', 'F'],
                    datasets: [{
                        label: 'Grade Distribution',
                        data: [52, 120, 180, 150, 100, 48],
                        backgroundColor: [
                            '#198754',
                            '#0d6efd',
                            '#6610f2',
                            '#ffc107',
                            '#fd7e14',
                            '#dc3545'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Overall Grade Distribution'
                        }
                    }
                }
            });

            // Department Performance Chart
            const deptCtx = document.getElementById('departmentPerformanceChart').getContext('2d');
            new Chart(deptCtx, {
                type: 'line',
                data: {
                    labels: ['2020', '2021', '2022', '2023'],
                    datasets: [{
                        label: 'Health Information',
                        data: [75, 78, 82, 85],
                        borderColor: '#0d6efd',
                        tension: 0.1
                    },
                    {
                        label: 'Community Health',
                        data: [72, 76, 80, 83],
                        borderColor: '#198754',
                        tension: 0.1
                    },
                    {
                        label: 'Environmental Health',
                        data: [70, 74, 77, 80],
                        borderColor: '#6610f2',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Department Performance Trends'
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
