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
        

        <!-- Content -->
        <div class="p-4">
            <!-- Quick Stats -->
            <!-- <div class="row g-4 mb-4">
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
            </div> -->

            <!-- Hostel Overview -->
            <!-- <div class="row g-4"> -->
            <!-- Hostel List -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center py-3">
                        <h5 class="mb-0">Pending Applicants for <?php if ($reservations) echo $reservations[0]['hostel_name']; ?></h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHostelModal">
                            <i class="fas fa-plus me-2"></i>Add New Hostel
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Student Name</th>
                                        <th>Hostel Name</th>
                                        <th>Room Name</th>
                                        <th>Bedspace Name</th>
                                        <th>Gender</th>
                                        <th>Phone Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Fetch pending reservations from the database -->
                                    <?php foreach ($reservations as $index => $reservation): ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $reservation['surname'] . ' ' . $reservation['firstname']; ?></td>
                                            <td><?php echo $reservation['hostel_name']; ?></td>
                                            <td><?php echo $reservation['room_name']; ?></td>
                                            <td><?php echo $reservation['bedspace']; ?></td>
                                            <td><?php echo $reservation['gender']; ?></td>
                                            <td><?php echo $reservation['phone']; ?></td>
                                            <td><?php echo $reservation['status']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('staff/approve-reservation/' . $reservation['reservation_id']); ?>" class="btn btn-success">Approve</a>
                                                <a href="<?php echo base_url('staff/reject-reservation/' . $reservation['reservation_id']); ?>" class="btn btn-danger">Reject</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <!-- </div> -->
        </div>
    </div>
    </div>

</body>

</html>