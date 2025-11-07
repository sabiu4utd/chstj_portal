<?php //var_dump($programmes); exit;
$prg = "";
foreach ($programmes as $programme) {
    $prg .= "<option value='" . $programme['program_id'] . "'>" . $programme['program'] . "</option><br />";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bursary Manager - Admin Portal - KSCHST</title>
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
                        <h4 class="mb-0">Bursary Manager</h4>
                        <small class="text-muted">Manage student payments and fees</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-bell text-muted"></i>
                        </div>
                        <img src="https://via.placeholder.com/40" class="rounded-circle profile-image" alt="Profile">
                    </div>
                </div>
            </header>
            <?php if (session()->getFlashdata('msg')) { ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('msg'); ?>
                </div>
            <?php } ?>
            <!-- Content -->
            <div class="p-4">
                <!-- Quick Stats -->
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-success bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-money-bill-wave text-success fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Total Revenue</h6>
                                        <h4 class="mb-0">₦25.5M</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">

                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-user-graduate text-primary fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Paid Students</h6>
                                        <h4 class="mb-0">1788</h4>
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
                                        <i class="fas fa-clock text-warning fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Pending</h6>
                                        <h4 class="mb-0">150</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 bg-danger bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-exclamation-triangle text-danger fa-2x"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1">Defaulters</h6>
                                        <h4 class="mb-0">50</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fee Structure and Payment History -->
                <div class="row g-4">
                    <!-- Fee Structure -->


                    <!-- Payment History -->
                    <div class="col-md-3">
                        <div class="card">
                            <a href="" data-bs-toggle="modal" data-bs-target="#addFeeModal" class="btn btn-primary">Add Fee Item</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <a href="" data-bs-toggle="modal" data-bs-target="#reportModal" class="btn btn-primary">Generate Report</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <a href="" data-bs-toggle="modal" data-bs-target="#paymentscheduleModal" class="btn btn-primary">Payment Schedule</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <a href="" data-bs-toggle="modal" data-bs-target="#paymentHistoryModal" class="btn btn-primary">Payment History</a>
                        </div>
                    </div>

                    <!-- Payment Analytics -->

                </div>
                <hr>



                <div class="row g-4">
                    <!-- Fee Structure -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center py-3">
                                <h5 class="mb-0">Verify Payments</h5>

                            </div>
                            <div class="card-body">
                                <form action="<?php echo site_url('staff/verifyPayments'); ?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Matric Number</label>
                                            <input type="text" name="pnumber" placeholder="Enter Matric Number" required class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" value="Load Student Payments" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Payment History -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Recent Payments</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="paymentsTable">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Receipt No.</th>
                                                <th>Student Name</th>
                                                <th>Registration No.</th>
                                                <th>Amount</th>
                                                <th>Payment Type</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sn = 1;
                                            foreach ($payments as $payment) { ?>
                                                <tr>
                                                    <td><?php echo $sn++; ?></td>
                                                    <td><?php echo $payment['transaction_reference']; ?></td>
                                                    <td><?php echo $payment['firstname'] . ' ' . $payment['surname'] . ' ' . $payment['othername']; ?></td>
                                                    <td><?php echo $payment['pnumber']; ?></td>
                                                    <td><?php echo $payment['amount']; ?></td>
                                                    <td><?php echo $payment['type']; ?></td>
                                                    <td><?php echo $payment['created_at']; ?></td>
                                                    <td><?php echo $payment['status']; ?></td>
                                                    <td><span class="badge bg-success">Verified</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-print"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Analytics -->

                </div>
            </div>
        </div>
    </div>

    <!-- Add Fee Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Generate Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('staff/generateReport'); ?>">
                        <div class="mb-3">
                            <label class="form-label">Programme</label>
                            <select name="programid" class="form-select" required>
                                <option value="">Select Programme</option>

                                <?php echo $prg; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Type</label>
                            <select name="type" class="form-select" required>
                                <option value="">Select Payment Type</option>

                                <option value="Accomodation">Accomodation</option>
                                <option value="School Fees">School Fees</option>
                                <option value="Acceptance">Acceptance</option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <select name="level" class="form-select" required>
                                <option value="">Select Level</option>

                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Academic Session</label>
                            <select name="session" class="form-select" required>
                                <option value="">Select Session</option>

                                <option value="2025/2026">2025/2026</option>
                                <option value="2026/2027">2026/2027</option>
                                <option value="2027/2028">2027/2028</option>
                                <option value="2028/2029">2028/2029</option>
                                <option value="2029/2030">2029/2030</option>
                                <option value="2030/2031">2030/2031</option>
                                <option value="2031/2032">2031/2032</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Generate Report" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <!-- <button type="button" class="btn btn-primary">Add Fee</button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addFeeModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Fee Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('staff/add_fee'); ?>">
                        <div class="mb-3">
                            <label class="form-label">Programme</label>
                            <select name="programid" class="form-select" required>
                                <option value="">Select Programme</option>
                                <option value="1">All Programmes</option>
                                <?php echo $prg; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fee Name</label>
                            <input type="text" name="item" class="form-control" placeholder="e.g Tuition Fee" required>
                        </div>
                        <div class="mb-3">`
                            <label class="form-label">Amount (₦)</label>
                            <input type="number" name="amount" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <select name="level" class="form-select" required>
                                <option value="">Select Level</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Academic Session</label>
                            <select name="session" class="form-select" required>
                                <option value="">Select Session</option>
                                <option value="2025/2026">2025/2026</option>
                                <option value="2026/2027">2026/2027</option>
                                <option value="2027/2028">2027/2028</option>
                                <option value="2028/2029">2028/2029</option>
                                <option value="2029/2030">2029/2030</option>
                                <option value="2030/2031">2030/2031</option>
                                <option value="2031/2032">2031/2032</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Add Fee" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <!-- <button type="button" class="btn btn-primary">Add Fee</button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="paymentscheduleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Fees Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('staff/view_fees_schedule'); ?>">
                        <div class="mb-3">
                            <label class="form-label">Programme</label>
                            <select name="programid" class="form-select" required>
                                <option value="">Select Programme</option>
                                <?php echo $prg; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <select name="level" class="form-select" required>
                                <option value="">Select Level</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Academic Session</label>
                            <select name="session" class="form-select" required>
                                <option value="">Select Session</option>
                                <option value="2025/2026">2025/2026</option>
                                <option value="2026/2027">2026/2027</option>
                                <option value="2027/2028">2027/2028</option>
                                <option value="2028/2029">2028/2029</option>
                                <option value="2029/2030">2029/2030</option>
                                <option value="2030/2031">2030/2031</option>
                                <option value="2031/2032">2031/2032</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="View Fees Schedule" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <!-- <button type="button" class="btn btn-primary">Add Fee</button> -->
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
            $('#paymentsTable').DataTable({
                pageLength: 10,
                order: [
                    [5, 'desc']
                ]
            });

            // Payment Distribution Chart
            const paymentCtx = document.getElementById('paymentChart').getContext('2d');
            new Chart(paymentCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Tuition', 'Hostel', 'Library', 'Others'],
                    datasets: [{
                        data: [65, 20, 10, 5],
                        backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#6c757d']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Payment Distribution'
                        }
                    }
                }
            });

            // Payment Trend Chart
            const trendCtx = document.getElementById('trendChart').getContext('2d');
            new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Monthly Revenue',
                        data: [3.5, 4.2, 5.1, 4.8, 5.5, 4.9],
                        borderColor: '#0d6efd',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Revenue Trend (Millions ₦)'
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>