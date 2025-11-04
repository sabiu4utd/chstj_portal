    <style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin: 1.5rem;
    }

    .stats-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .stats-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
    }

    .stats-icon i {
        font-size: 1.25rem;
        color: white;
    }

    .stats-info h6 {
        color: #6c757d;
        margin-bottom: 0.25rem;
        font-size: 0.875rem;
    }

    .stats-info h4 {
        color: #212529;
        margin: 0;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            margin: 1rem;
        }

        .stats-card {
            padding: 1rem;
        }

        .stats-icon {
            width: 40px;
            height: 40px;
        }
    }

    @media (max-width: 480px) {
        .stats-card {
            flex-direction: column;
            text-align: center;
            padding: 1rem 0.75rem;
        }

        .stats-info h6 {
            font-size: 0.75rem;
        }

        .stats-info h4 {
            font-size: 1.25rem;
        }
    }
    </style>
</head>
<?php //var_dump($programmes); exit;
$prg = "";
foreach ($programmes as $programme) {
    $prg .= "<option value='" . $programme['program_id'] . "'>" . $programme['program'] . "</option>";
}
    /* Bursary specific styles */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin: 1.5rem;
    }

    .stats-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .stats-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
    }

    .stats-icon i {
        font-size: 1.25rem;
        color: white;
    }

    .stats-info h6 {
        color: #6c757d;
        margin-bottom: 0.25rem;
        font-size: 0.875rem;
    }

    .stats-info h4 {
        color: #212529;
        margin: 0;
        font-weight: 600;
    }

    .verification-section {
        margin: 1.5rem;
    }

    .search-group {
        display: flex;
        gap: 1rem;
        margin-top: 0.5rem;
    }

    .payments-section {
        margin: 1.5rem;
    }

    .table-wrapper {
        background: white;
        border-radius: 10px;
        padding: 1rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            margin: 1rem;
        }

        .stats-card {
            padding: 1rem;
        }

        .stats-icon {
            width: 40px;
            height: 40px;
        }

        .verification-section,
        .payments-section {
            margin: 1rem;
        }

        .search-group {
            flex-direction: column;
        }

        .search-group .btn {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .table-responsive {
            margin: 0 -1rem;
        }

        .table td {
            white-space: nowrap;
        }

        .action-buttons {
            flex-wrap: wrap;
        }

        .action-buttons .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
    }

    @media (max-width: 480px) {
        .stats-card {
            flex-direction: column;
            text-align: center;
            padding: 1rem 0.75rem;
        }

        .stats-info h6 {
            font-size: 0.75rem;
        }

        .stats-info h4 {
            font-size: 1.25rem;
        }
    }




?>
<?php 
$prg = "";
foreach ($programmes as $programme) {
    $prg .= "<option value='" . $programme['program_id'] . "'>" . $programme['program'] . "</option>";
}
?>

<?= view('staff/common/header') ?>
    <!-- Bursary Specific Styles -->
    <link rel="stylesheet" href="../assets/css/bursary.css">

<!-- Main Content -->
<div class="content-wrapper bg-light">
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
            <div class="stats-grid">
                <div class="stats-card">
                    <div class="stats-icon bg-success">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="stats-info">
                        <h6>Total Revenue</h6>
                        <h4>₦25.5M</h4>
                    </div>
                </div>

                <div class="stats-card">
                    <div class="stats-icon bg-primary">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="stats-info">
                        <h6>Paid Students</h6>
                        <h4>1788</h4>
                    </div>
                </div>

                <div class="stats-card">
                    <div class="stats-icon bg-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stats-info">
                        <h6>Pending</h6>
                        <h4>150</h4>
                    </div>
                </div>

                <div class="stats-card">
                    <div class="stats-icon bg-danger">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stats-info">
                        <h6>Defaulters</h6>
                        <h4>50</h4>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions-grid mt-4">
                <button class="action-button" data-bs-toggle="modal" data-bs-target="#addFeeModal">
                    <i class="fas fa-plus"></i>
                    <span>Add Fee Item</span>
                </button>
                
                <button class="action-button" data-bs-toggle="modal" data-bs-target="#reportModal">
                    <i class="fas fa-file-alt"></i>
                    <span>Generate Report</span>
                </button>
                
                <button class="action-button" data-bs-toggle="modal" data-bs-target="#paymentscheduleModal">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Payment Schedule</span>
                </button>
                
                <button class="action-button" data-bs-toggle="modal" data-bs-target="#paymentHistoryModal">
                    <i class="fas fa-history"></i>
                    <span>Payment History</span>
                </button>
            </div>

            <!-- Payment Verification -->
            <div class="verification-section mt-4">
                <div class="profile-card">
                    <div class="card-header">
                        <h5 class="mb-0">Verify Payments</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('staff/verifyPayments') ?>" method="POST" class="verification-form">
                            <div class="form-group">
                                <label class="form-label">Matric Number</label>
                                <div class="search-group">
                                    <input type="text" 
                                           name="pnumber" 
                                           placeholder="Enter Matric Number" 
                                           required 
                                           class="form-control">
                                    <button type="submit" class="btn btn-primary">
                                        Load Student Payments
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Recent Payments -->
            <div class="payments-section mt-4">
                <div class="profile-card">
                    <div class="card-header">
                        <h5 class="mb-0">Recent Payments</h5>
                    </div>
                    <div class="table-wrapper">
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
                                    foreach ($payments as $payment): ?>
                                    <tr>
                                        <td data-label="SN"><?= $sn++ ?></td>
                                        <td data-label="Receipt"><?= $payment['transaction_reference'] ?></td>
                                        <td data-label="Name"><?= $payment['firstname'] . ' ' . $payment['surname'] . ' ' . $payment['othername'] ?></td>
                                        <td data-label="Reg No."><?= $payment['pnumber'] ?></td>
                                        <td data-label="Amount"><?= $payment['amount'] ?></td>
                                        <td data-label="Type"><?= $payment['type'] ?></td>
                                        <td data-label="Date"><?= $payment['created_at'] ?></td>
                                        <td data-label="Status"><span class="badge bg-success">Verified</span></td>
                                        <td data-label="Actions">
                                            <div class="action-buttons">
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-print"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Report Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Generate Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('staff/generateReport') ?>" class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Programme</label>
                            <select name="programid" class="form-select" required>
                                <option value="">Select Programme</option>
                                <?= $prg ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Payment Type</label>
                            <select name="type" class="form-select" required>
                                <option value="">Select Payment Type</option>
                                <option value="Accomodation">Accomodation</option>
                                <option value="School Fees">School Fees</option>
                                <option value="Acceptance">Acceptance</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Level</label>
                            <select name="level" class="form-select" required>
                                <option value="">Select Level</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Academic Session</label>
                            <select name="session" class="form-select" required>
                                <option value="">Select Session</option>
                                <?php for ($year = 2025; $year <= 2031; $year++): ?>
                                    <option value="<?= $year ?>/<?= $year + 1 ?>"><?= $year ?>/<?= $year + 1 ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Generate Report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addFeeModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Fee Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('staff/add_fee') ?>" class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Programme</label>
                            <select name="programid" class="form-select" required>
                                <option value="">Select Programme</option>
                                <?= $prg ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Fee Name</label>
                            <input type="text" name="item" class="form-control" placeholder="e.g Tuition Fee" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Amount (₦)</label>
                            <input type="number" name="amount" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Level</label>
                            <select name="level" class="form-select" required>
                                <option value="">Select Level</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Academic Session</label>
                            <select name="session" class="form-select" required>
                                <option value="">Select Session</option>
                                <?php for ($year = 2025; $year <= 2031; $year++): ?>
                                    <option value="<?= $year ?>/<?= $year + 1 ?>"><?= $year ?>/<?= $year + 1 ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Fee</button>
                        </div>
                    </form>
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