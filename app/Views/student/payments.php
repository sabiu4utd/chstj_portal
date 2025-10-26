<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Payment - KSCHST Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://js.paystack.co/v2/inline.js"></script>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php echo view('student/panel/sidebar.php'); ?>

        <!-- Main Content -->
        <div class="flex-grow-1 bg-light">
            <!-- Header -->
            <header class="main-header p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">My Payment</h4>
                        <small class="text-muted">Manage your payments and fees</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-bell text-muted"></i>
                        </div>
                        <img src="https://via.placeholder.com/40" class="rounded-circle profile-image" alt="Profile">
                    </div>
                </div>
            </header>

            
                <!-- Payment Actions -->
                <div class="row g-4">
                    <div class="col-md-12">

                        <!-- Payment History -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Payment History</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Reference</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($history as $key => $value) { ?>
                                                <tr>
                                                    <td><?php echo $key + 1; ?></td>
                                                    <td><?php echo $value['created_at']; ?></td>
                                                    <td><?php echo $value['type']; ?></td>
                                                    <td><?php echo $value['transaction_reference']; ?></td>
                                                    <td>₦<?php echo number_format($value['amount']); ?></td>
                                                    <td><span class="badge bg-success"><?php echo $value['status']; ?></span></td>
                                                    <td>
                                                        <a href="receipt/<?php echo $value['payment_id'] ?>" class="btn btn-primary btn-sm">Print Receipt</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                    
                                               
                                                    <table>
                                                        <thead>
                                            <?php if (empty($history)) { ?>
                                                <tr>
                                                    <td colspan="6" class="text-center">No payment history found.</td>
                                                </tr>
                                            <?php } ?>

                                            <tr>
                                                <td colspan="3">
                                                    <?php if ($acceptance_fee) { ?>
                                                        <!-- <span class="badge bg-success">Paid</span> -->
                                                    <?php } else { ?>
                                                        <form id="paymentForm">
                                                            <input type="hidden" id="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Enter your email" required />
                                                            <input type="hidden" id="amount" value="2000" placeholder="Enter amount" required />
                                                            <button type="button" onclick="payWithPaystack()" class="btn btn-primary">Click to the sume of ₦2000 for Pay Acceptance</button>
                                                        </form>
                                                    <?php } ?>
                                                </td>
                                                <td colspan="3">
                                                    <?php if ($session_payment) { ?>
                                                        <!-- <span class="badge bg-success">Paid</span> -->
                                                    <?php } else { ?>
                                                        <form id="paymentForm">
                                                            <input type="hidden" id="email1" value="<?php echo $_SESSION['email']; ?>" placeholder="Enter your email" required />
                                                            <input type="hidden" id="amount1" value="<?php echo $tution_fees; ?>" placeholder="Enter amount" required />
                                                            <button type="button" onclick="payWithPaystack1()" class="btn btn-primary">Click to Pay the sum of ₦<?php echo $tution_fees; ?> for School Fees </button>
                                                        </form>
                                                    <?php } ?>
                                                    </td>

                                                
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Fee Breakdown -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Fee Breakdown</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <?php foreach ($amount as  $value) { ?>
                                                <tr>
                                                    <td><?php echo $value['item']; ?></td>
                                                    <td class="text-end">₦<?php echo $value['amount']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr class="table-active fw-bold">
                                                <td>Total</td>
                                                <td class="text-end">₦<?php echo $tution_fees; ?></td>
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

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/responsive.js"></script>
    
    // acceptance fees payment integration
    <script>
        function payWithPaystack() {
            const paystack = new PaystackPop();
            paystack.newTransaction({
                key: 'pk_test_9e27f42ce0c0dbd5fc415b90caaaa75f7babe222', // Replace with your Paystack public key
                email: document.getElementById('email').value,
                amount: document.getElementById('amount').value * 100, // Amount in kobo
                onSuccess: (transaction) => {
                    // alert(`Payment successful! Reference: ${transaction.reference}`);
                    location.href = "process_payments/" + transaction.reference;
                    //location.href = "process_payments";
                },
                onCancel: () => {
                    alert('Payment canceled.');
                }
            });
        }
    </script>


    //school fees payment integration
    <script>
        function payWithPaystack1() {
            const paystack = new PaystackPop();
            paystack.newTransaction({
                key: 'pk_test_9e27f42ce0c0dbd5fc415b90caaaa75f7babe222', // Replace with your Paystack public key
                email: document.getElementById('email1').value,
                amount: document.getElementById('amount1').value * 100, // Amount in kobo
                onSuccess: (transaction) => {
                    // alert(`Payment successful! Reference: ${transaction.reference}`);
                    location.href = "process_fees/" + transaction.reference ;
                    //location.href = "process_payments";
                },
                onCancel: () => {
                    alert('Payment canceled.');
                }
            });
        }
    </script>
</body>

</html>