<!DOCTYPE html>
<html lang="en">
<?php //var_dump($payments); 
?>

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


                <!-- Fee Structure and Payment History -->

                <div class="row g-4">
                    <!-- Fee Structure -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center py-3">
                                <h5 class="mb-0">Verify Payments</h5>

                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th>SN</th>
                                        <th>Matric No</th>
                                        <th>Full Name</th>
                                        <th>Receipt No</th>
                                        <th>Payment Type</th>
                                        <th>Level</th>
                                        <th>Session</th>
                                        <th>Amount</th>
                                        <th>Payment Date</th>
                                        <th>Payment Status</th>
                                    </tr>
                                    <?php if (empty($payments)) { ?>
                                        <tr>
                                            <td colspan="8" class="text-center">No payments found</td>
                                        </tr>
                                    <?php } else { ?>
                                        <?php $sn = 1;
                                        foreach ($payments as $payment) { ?>
                                            <tr>
                                                <td><?php echo $sn++; ?></td>
                                                <td><?php echo $payment['pnumber']; ?></td>
                                                <td><?php echo $payment['firstname'] . ' ' . $payment['surname'] . ' ' . $payment['othername']; ?></td>
                                                <td><?php echo $payment['transaction_reference']; ?></td>
                                                <td><?php echo $payment['type']; ?></td>
                                                <td><?php echo $payment['level']; ?></td>
                                                <td><?php echo $payment['session']; ?></td>
                                                <td><?php echo $payment['amount']; ?></td>
                                                <td><?php echo $payment['created_at']; ?></td>
                                                <td><?php echo $payment['status']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Payment History -->


                    <!-- Payment Analytics -->

                </div>
            </div>
        </div>
    </div>

    <!-- Add Fee Modal -->


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