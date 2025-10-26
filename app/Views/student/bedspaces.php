<?php
$records="";
foreach ($bedspaces as $hostel) {
    $records .= "<option>" . $hostel['hostel'] . "</option>";
} ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodation - KSCHST Portal</title>
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
        <!-- Sidebar (Same as other pages) -->
        <?php echo view('student/panel/sidebar.php'); ?>

        <!-- Main Content -->
        <div class="flex-grow-1 bg-light">
            <!-- Header -->
            <header class="main-header p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">Accommodation</h4>
                        <small class="text-muted">Manage your hostel accommodation</small>
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
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Reserve Accommodation</h5>
                </div>
                <?php if ($current_reservation && $current_reservation['reservation_status'] == 'Pending') {
                    echo "<div class='alert alert-danger'>You have made a reservation for " . $current_reservation['hostel_name'] . ",  " . $current_reservation['room_name'] . "  [" . $current_reservation['bedspace'] . "] wait for approval within the next 24 hours</div>";
                } elseif ($current_reservation && $current_reservation['reservation_status'] == "Approved") { ?>
                    <div class='alert alert-info'>
                        Your reservation has been approved please click here to pay
                        <form id="paymentForm">
                            <input type="hidden" id="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Enter your email" required />
                            <input type="hidden" id="amount" value="50000" placeholder="Enter amount" required />
                            <button type="button" onclick="payWithPaystack()" class="btn btn-primary">₦50,000</button>
                        </form>

                    </div>
                <?php } else { ?>
                    <div class="card-body">
                        <form method="post" class="row g-3" action="<?php echo site_url('student/make_reservation') ?>">
                            <div class="col-md-12">
                                <label for="hostel" class="form-label">Hostel</label>
                                <select name="hostel" id="hostel" class="form-select" required>
                                    <option value="" selected disabled>Choose Hostel...</option>
                                    <?php echo $records; ?>
                                </select>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-end">
                                <input type="submit" value="Submit" class="btn btn-primary">
                                <!-- <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-1"></i> Submit
                            </button> -->
                            </div>
                        </form>
                    </div>
            </div>
        <?php } ?>

        <!-- Maintenance Requests -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Reservation History</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Hostel</th>
                                <th>Room</th>
                                <th>Bedspace</th>
                                <th>Status</th>
                                <th>Session</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($reservation_history as $reservation) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $reservation['hostel_name']; ?></td>
                                    <td><?php echo $reservation['room_name']; ?></td>
                                    <td><?php echo $reservation['bedspace']; ?></td>
                                    <td><?php echo $reservation['status']; ?></td>
                                    <td><?php echo $reservation['session']; ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="<?php echo base_url() ?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/responsive.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script>
        $.ajax({
            url: '/api/data',
            method: 'GET',
            success: function(data) {
                console.log(data);
            },
            error: function(xhr, status, err) {
                console.error(status, err);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#hostel').change(function() {
                var hostelid = $(this).val();
                //alert(hostelid);
                if (hostelid) {
                    $.ajax({
                        url: '<?= base_url('student/load_rooms') ?>', // Update with your base URL  
                        type: 'POST',
                        data: {
                            hostelid: hostelid
                        },
                        success: function(data) {
                            $('#roomid').empty(); // Clear previous local governments  
                            $('#roomid').append('<option value="">Room</option>'); // Reset to default  
                            $.each(data, function(key, value) {

                                $('#roomid').append('<option value="' + value.id + '">' + value.room_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#roomid').empty().append('<option value="">Rooms</option>');
                }
            });
        });
        $(document).ready(function() {
            $('#roomid').change(function() {
                var roomid = $(this).val();
                //alert(roomid);
                if (roomid) {
                    $.ajax({
                        url: '<?= base_url('student/load_bedspace') ?>', // Update with your base URL  
                        type: 'POST',
                        data: {
                            roomid: roomid
                        },
                        success: function(data) {
                            $('#bedspaceid').empty(); // Clear previous local governments  
                            $('#bedspaceid').append('<option value="">Bedspaces</option>'); // Reset to default  
                            $.each(data, function(key, value) {

                                $('#bedspaceid').append('<option value="' + value.id + '">' + value.bedspace + '</option>');
                            });
                        }
                    });
                } else {
                    $('#bedspaceid').empty().append('<option value="">Bedspaces</option>');
                }
            });
        });
    </script>
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
</body>

</html>