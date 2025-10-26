<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Manager - Admin Portal - KSCHST</title>
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
        <!-- <div class="flex-grow-1 bg-light main-content">
            <!-- Header -->
        -->

        <!-- Content -->
        <div class="p-4">
            <!-- Quick Stats -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-building text-primary fa-2x"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1">Total Hostels</h6>
                                    <h4 class="mb-0">12</h4>
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
                                    <i class="fas fa-bed text-success fa-2x"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1">Total Rooms</h6>
                                    <h4 class="mb-0">240</h4>
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
                                    <i class="fas fa-users text-warning fa-2x"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1">Occupants</h6>
                                    <h4 class="mb-0">450</h4>
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
                                    <i class="fas fa-tools text-info fa-2x"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-1">Maintenance</h6>
                                    <h4 class="mb-0">5</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hostel Overview -->
            <!-- <div class="row g-4"> -->
            <!-- Hostel List -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center py-3">
                        <h5 class="mb-0">Hostel List</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHostelModal">
                            <i class="fas fa-plus me-2"></i>Add New Hostel
                        </button>
                    </div>
                    <div class="card-body">
                    <?php foreach($bedspaces as $bedspace): ?>

                      
                       <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <!-- Passport Placeholder -->
                                    <div class="mb-3 text-center">
                                        <img src="<?php echo base_url(); ?>assets/img/image.webp" alt="Passport Photo" class="rounded-circle" width="80" height="80">
                                    </div>
                                    <h5 class="card-title">Student Name ID: Sabiu Lawal</h5>
                                    <p class="card-text"><strong>Bed Number:</strong> <?= $bedspace['bedspace']; ?></p>
                                    <p class="card-text"><strong>Room Name:</strong> <?= $bedspace['status']; ?></p>
                                    <p class="card-text"><strong>Hostel Name:</strong> <?= $bedspace['status']; ?></p>
                                    
                                    <div class="mt-3">
                                        <button class="btn btn-success me-2"><i class="fas fa-check me-1"></i>Accept</button>
                                        <button class="btn btn-danger"><i class="fas fa-times me-1"></i>Decline</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <?php endforeach; ?>
                    
                    </div>
                </div>
            </div>



            <!-- </div> -->
        </div>
    </div>
    </div>

    <!-- Add Hostel Modal -->
    <div class="modal fade" id="addHostelModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Hostel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Hostel Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Hostel Type</label>
                                <select class="form-select" required>
                                    <option value="">Select Type</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Number of Rooms</label>
                                <input type="number" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Room Capacity</label>
                                <input type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Fee per Year</label>
                                <input type="number" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select" required>
                                    <option>Active</option>
                                    <option>Maintenance</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Facilities</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wifi">
                                <label class="form-check-label" for="wifi">Wi-Fi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="water">
                                <label class="form-check-label" for="water">24/7 Water Supply</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="security">
                                <label class="form-check-label" for="security">Security</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Hostel</button>
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
    <!-- Custom JS -->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/responsive.js"></script>
    <script>
        $(document).ready(function() {
            $('#hostelTable').DataTable({
                pageLength: 10,
                order: [
                    [0, 'asc']
                ]
            });
        });
    </script>
</body>

</html>