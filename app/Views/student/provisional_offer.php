<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provisional Offer of Admission</title>
    <style>
        @media print { .no-print { display: none; } @page { size: A4; margin: 20mm; } }
        body { background: #ffffff; color: #000; font-family: 'Times New Roman', serif; font-size: 16px; line-height: 1.5; margin: 0; padding: 16px; }
        .page { max-width: 800px; margin: 0 auto; }
        h1 { font-size: 18px; text-align: center; margin: 0 0 8px; }
        h2 { font-size: 16px; text-align: center; margin: 0 0 16px; }
        .muted { color: #000; font-size: 12px; text-align: center; margin-bottom: 16px; }
        .info { margin: 16px 0; }
        .date { text-align: right; margin: 8px 0 16px; }
        ol { margin: 8px 0 0 18px; }
        .signature { margin-top: 28px; text-align: right; }
        .qr { text-align: center; margin-top: 16px; }
        .qr img { width: 70px; height: 70px; }
        .print-btn { margin-bottom: 12px; }
        a { color: #000; text-decoration: underline; }
        hr { border: none; border-top: 1px solid #000; margin: 12px 0; }
    </style>
</head>
<body>
<?php
    $firstname   = $_SESSION['firstname'] ?? '';
    $surname     = $_SESSION['surname'] ?? '';
    $othername   = $_SESSION['othername'] ?? '';
    $deptName    = $_SESSION['dept_name'] ?? '';
    $pnumber     = (!empty($_SESSION['pnumber'])) ? $_SESSION['pnumber'] : 'Pending';
    $uniqueID    = $_SESSION['uniqueID'] ?? '';
    $sessionText = $_SESSION['current_session'] ?? (date('Y') . '/' . (date('Y') + 1));
    $fullName    = trim($surname . ' ' . $firstname . ' ' . $othername);
    $qrData      = ($pnumber !== 'Pending') ? $pnumber : $uniqueID;
?>
<div class="page">
    <div class="no-print print-btn">
        <button onclick="window.print()">Print</button>
        &nbsp;|&nbsp;
        <a href="<?= site_url('student/payments') ?>">Go to Payments</a>
    </div>
    <div class="header-logo" style="text-align:center">
        <img src="<?= base_url('assets/img/logo.jpg') ?>" alt="School Logo">
    </div>
    <h1>College of Health Sciences and Technology Jega</h1>
    <div class="muted">P.M.B 1015, Jega, Kebbi State , Nigeria • Email: info@chstjega.edu.ng</div>
    <hr>

    <h2>Provisional Offer of Admission (<?= htmlspecialchars($sessionText) ?> Academic Session)</h2>

    <div class="info">
        <div><strong>Name of Applicant:</strong> <?= strtoupper(htmlspecialchars($fullName)) ?></div>
        <div><strong>Admission No:</strong> <?= htmlspecialchars($pnumber) ?></div>
        <div><strong>Department:</strong> <?= strtoupper(htmlspecialchars($deptName)) ?></div>
    </div>

    <div class="date">
        Date: <?= date('d/m/Y') ?>
    </div>

    <p>
        We are pleased to offer you provisional admission into the
        <strong><?= strtoupper(htmlspecialchars($deptName)) ?></strong> to pursue a program at the College,
        subject to the fulfillment of the conditions below.
    </p>

    <ol>
        <li>Present the minimum entry qualifications and other admission requirements during screening and registration.</li>
        <li>Pay the Acceptance Fee and other prescribed fees within the stipulated period to confirm this offer.</li>
        <li>Provide originals and photocopies of credentials for verification (O'Level results, Birth Certificate/Declaration of Age, State/LGA of Origin, etc.).</li>
        <li>This offer may be withdrawn if false information is discovered or if registration is not completed within the given timeline.</li>
        <li>Please accept our congratulations and best wishes for your academic journey at the College.</li>
    </ol>

    <div class="signature">
        <div style="margin-top: 32px;">
            <strong>Bilyaminu Danjuma</strong><br>
            Ag. Registrar<br>
            College of Health Sciences and Technology Jega
        </div>
    </div>

    <div class="qr">
        <?php if (!empty($qrData)) { ?>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=70x70&data=<?= urlencode($qrData) ?>" alt="QR Code">
            <div style="font-size: 11px;">Reference: <?= htmlspecialchars($qrData) ?></div>
        <?php } ?>
    </div>
</div>

</body>
</html>