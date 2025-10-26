<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Result - KSCHST Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
         <?php echo view('student/panel/sidebar.php');?>

        <!-- Main Content -->
        <div class="flex-grow-1 bg-light">
            <!-- Header -->
            <header class="main-header p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">My Result</h4>
                        <small class="text-muted">View your academic performance</small>
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
                <!-- Result Summary -->
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="card-title text-muted mb-3">Current CGPA</h6>
                                <div class="d-flex align-items-baseline">
                                    <h2 class="mb-0 me-2">3.75</h2>
                                    <small class="text-success"><i class="fas fa-arrow-up"></i> 0.15</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="card-title text-muted mb-3">Total Credits Earned</h6>
                                <div class="d-flex align-items-baseline">
                                    <h2 class="mb-0">45</h2>
                                    <small class="text-muted ms-2">/ 120</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="card-title text-muted mb-3">Courses Passed</h6>
                                <div class="d-flex align-items-baseline">
                                    <h2 class="mb-0">15</h2>
                                    <small class="text-muted ms-2">/ 16</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="card-title text-muted mb-3">Current Level</h6>
                                <h2 class="mb-0">200</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Semester Selection -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <select class="form-select">
                                    <option>Second Semester 2023/2024</option>
                                    <option>First Semester 2023/2024</option>
                                    <option>Second Semester 2022/2023</option>
                                    <option>First Semester 2022/2023</option>
                                </select>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-primary">
                                    <i class="fas fa-download me-2"></i>Download Result Sheet
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Result Table -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Second Semester 2023/2024 Results</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Course Code</th>
                                        <th>Course Title</th>
                                        <th>Credit Units</th>
                                        <th>CA Score</th>
                                        <th>Exam Score</th>
                                        <th>Total Score</th>
                                        <th>Grade</th>
                                        <th>Grade Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CHT201</td>
                                        <td>Community Health Practice</td>
                                        <td>3</td>
                                        <td>28</td>
                                        <td>55</td>
                                        <td>83</td>
                                        <td>A</td>
                                        <td>5.0</td>
                                    </tr>
                                    <tr>
                                        <td>CHT202</td>
                                        <td>Primary Health Care</td>
                                        <td>3</td>
                                        <td>25</td>
                                        <td>52</td>
                                        <td>77</td>
                                        <td>B</td>
                                        <td>4.0</td>
                                    </tr>
                                    <tr>
                                        <td>CHT203</td>
                                        <td>Health Education</td>
                                        <td>2</td>
                                        <td>27</td>
                                        <td>50</td>
                                        <td>77</td>
                                        <td>B</td>
                                        <td>4.0</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="table-light">
                                        <td colspan="2"><strong>Semester Summary</strong></td>
                                        <td><strong>8</strong></td>
                                        <td colspan="3"></td>
                                        <td colspan="2">
                                            <strong>GPA: 4.33</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Performance Chart -->
                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="mb-0">GPA Trend</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="gpaChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="mb-0">Grade Distribution</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="gradeChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/responsive.js"></script>
    <script>
        // GPA Trend Chart
        new Chart(document.getElementById('gpaChart'), {
            type: 'line',
            data: {
                labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'],
                datasets: [{
                    label: 'GPA',
                    data: [3.5, 3.7, 3.6, 4.33],
                    borderColor: '#1a4b84',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 0,
                        max: 5
                    }
                }
            }
        });

        // Grade Distribution Chart
        new Chart(document.getElementById('gradeChart'), {
            type: 'doughnut',
            data: {
                labels: ['A', 'B', 'C', 'D', 'E', 'F'],
                datasets: [{
                    data: [5, 8, 3, 1, 0, 0],
                    backgroundColor: [
                        '#28a745',
                        '#17a2b8',
                        '#ffc107',
                        '#fd7e14',
                        '#dc3545',
                        '#6c757d'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>
