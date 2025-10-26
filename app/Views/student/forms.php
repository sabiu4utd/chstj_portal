<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms - KSCHST Portal</title>
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
                        <h4 class="mb-0">Forms</h4>
                        <small class="text-muted">Access and submit various forms</small>
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
                <!-- Form Categories -->
                <div class="row g-4">
                    <!-- Academic Forms -->
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="mb-0">Academic Forms</h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">Course Add/Drop Form</h6>
                                            <small class="text-muted">For modifying registered courses</small>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary">Download</button>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">Leave of Absence Request</h6>
                                            <small class="text-muted">Request temporary leave from studies</small>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary">Download</button>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">Transcript Request Form</h6>
                                            <small class="text-muted">Request academic transcript</small>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary">Download</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Administrative Forms -->
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="mb-0">Administrative Forms</h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">ID Card Replacement Form</h6>
                                            <small class="text-muted">Request for lost/damaged ID card replacement</small>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary">Download</button>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">Change of Information Form</h6>
                                            <small class="text-muted">Update personal information</small>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary">Download</button>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">Complaint Form</h6>
                                            <small class="text-muted">Submit formal complaints or grievances</small>
                                        </div>
                                        <button class="btn btn-sm btn-outline-primary">Download</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submitted Forms -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Submitted Forms</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Form Type</th>
                                                <th>Submission Date</th>
                                                <th>Reference No.</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Course Add/Drop Form</td>
                                                <td>15/08/2023</td>
                                                <td>FORM-2023-001</td>
                                                <td><span class="badge bg-success">Approved</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Transcript Request</td>
                                                <td>10/08/2023</td>
                                                <td>FORM-2023-002</td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">View</button>
                                                    <button class="btn btn-sm btn-outline-secondary">Download</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Upload -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Submit a Form</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Form Type</label>
                                            <select class="form-select">
                                                <option>Select Form Type</option>
                                                <option>Course Add/Drop Form</option>
                                                <option>Leave of Absence Request</option>
                                                <option>Transcript Request</option>
                                                <option>ID Card Replacement</option>
                                                <option>Change of Information</option>
                                                <option>Complaint Form</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Upload Filled Form</label>
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Additional Comments</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </form>
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
    <script src="../assets/js/responsive.js"></script>
</body>
</html>
