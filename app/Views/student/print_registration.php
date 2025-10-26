<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration - Print</title>
    <style>
        @page { size: A4 portrait; margin: 12mm; }
        body { font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #111; }
        .wrap { max-width: 210mm; margin: 0 auto; }
        h1 { font-size: 18px; text-align: center; margin: 0 0 8px; }
        .meta { display: flex; flex-wrap: wrap; gap: 8px 16px; padding: 8px 0; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; margin-bottom: 10px; }
        .meta div { min-width: 120px; }
        .meta .l { color: #666; font-size: 11px; }
        .meta .v { font-weight: 600; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px 8px; }
        thead th { background: #f6f6f6; text-align: left; }
        .actions { margin-top: 10px; text-align: right; }
        .btn { background: #0d6efd; color: #fff; border: 0; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 12px; }
        @media print { .actions { display: none; } }
    </style>
</head>
<body>
    <div class="wrap">

    <div style="text-align: center;">
            <thead>
        <img src="<?php echo base_url(); ?>assets/img/logo.jpg" alt="Logo" style="width: 100px; height: 100px;">
       <h1>College of health Sciences and Technology, Jega</h1>
    </div>

        <h1>Course Registration</h1>
        <div class="meta">
            <div><div class="l">Student ID</div><div class="v"><?php echo isset($_SESSION['pnumber']) ? htmlspecialchars((string)$_SESSION['pnumber']) : '-'; ?></div></div>
            <div><div class="l">Fullname</div><div class="v"><?php echo isset($_SESSION['firstname']) ? htmlspecialchars((string)$_SESSION['firstname']." ".$_SESSION['surname']." ".$_SESSION['othername']) : '-'; ?></div></div>
            <div><div class="l">Programme</div><div class="v"><?php echo isset($_SESSION['programid']) ? htmlspecialchars((string)$_SESSION['dept_name']) : '-'; ?></div></div>
            <div><div class="l">Level</div><div class="v"><?php echo isset($_SESSION['current_level']) ? htmlspecialchars((string)$_SESSION['current_level']) : '-'; ?></div></div>
            <div><div class="l">Session</div><div class="v"><?php echo isset($_SESSION['current_session']) ? htmlspecialchars((string)$_SESSION['current_session']) : '-'; ?></div></div>
            <div><div class="l">Printed on</div><div class="v"><?php echo date('Y-m-d H:i'); ?></div></div>
        </div>

        <?php $total_units = 0; $sn = 1; ?>
        <table>
            <thead>
                <tr>
                    <th style="width:40px;">SN</th>
                    <th style="width:120px;">Course Code</th>
                    <th>Course Title</th>
                    <th style="width:100px;">Credit Units</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($courses)): ?>
                    <?php foreach ($courses as $course): ?>
                        <?php $u = isset($course['credit_unit']) ? (int)$course['credit_unit'] : 0; $total_units += $u; ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo htmlspecialchars((string)$course['course_code']); ?></td>
                            <td><?php echo htmlspecialchars((string)$course['course_title']); ?></td>
                            <td><?php echo $u; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" style="text-align:center;color:#666;">No registered courses found.</td></tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align:right; font-weight:700;">Total Credit Units</td>
                    <td style="font-weight:700;">&nbsp;<?php echo $total_units; ?></td>
                </tr>
            </tfoot>
        </table>
        <br>
        <br>
        <br>
        
            <table style="border-collapse: collapse; border: none;";">
                <tr style="width:100%;">
                    <td>
                        <br />
                        <br />
                        <br />
                    ___________________________<br />    
                    Student Signature</td>
                    <td>&nbsp;</td>
                    <td>
                        <br />
                        <br />
                        <br />
                    ___________________________<br />
                    Registrar Signature</td>
                    
                </tr>
            </table>
                    <br />
                    <br />
                    <br />
                    <br />
        <div class="qr-section" >
                <img style="text-align: right;"
                    src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode($_SESSION['pnumber']); ?>" 
                    alt="Transaction QR Code" 
                    class="qr-code">
        </div>
        
        <div class="actions">
            <button class="btn" onclick="window.print()">Print</button>
        </div>
    </div>
</body>
</html>