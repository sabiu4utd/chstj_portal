<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Letter - <?= $student['pnumber'] ?></title>
    <style>
        @media print {
            body { margin: 0; padding: 0; }
            .no-print { display: none; }
            @page { size: A4; margin: 15mm; }
        }
        
        body {
            font-family: 'Times New Roman', serif;
            line-height: 1.3;
            margin: 0;
            padding: 8px;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            font-size: 13px;
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            background-image: url('<?= base_url('assets/img/logo.jpg') ?>');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.05;
            z-index: -1;
            pointer-events: none;
        }
        
        .letterhead {
            text-align: center;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #2c5aa0 0%, #1e3d6f 100%);
            color: white;
            padding: 10px;
            border-radius: 6px;
            box-shadow: 0 3px 6px rgba(44, 90, 160, 0.2);
        }
        
        .logo {
            width: 60px;
            height: 60px;
            margin: 0 auto 6px;
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        
        .school-name {
            font-size: 16px;
            font-weight: bold;
            color: white;
            margin: 6px 0;
            text-transform: uppercase;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }
        
        .school-address {
            font-size: 10px;
            color: rgba(255,255,255,0.9);
            margin: 1px 0;
        }
        
        .letter-content {
            max-width: 100%;
            margin: 0 auto;
            padding: 5px;
        }
        
        .applicant-info {
            background: linear-gradient(135deg, #e3f2fd 0%, #f8f9fa 100%);
            padding: 8px;
            border-left: 3px solid #2c5aa0;
            border-radius: 4px;
            margin: 8px 0;
            font-size: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .admission-title {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #2c5aa0;
            margin: 12px 0;
            padding: 6px;
            background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 100%);
            border-radius: 4px;
            border: 2px solid #2c5aa0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .letter-body {
            text-align: justify;
            margin: 8px 0;
            font-size: 12px;
            background: rgba(248, 249, 250, 0.5);
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #e9ecef;
        }
        
        .letter-body ol {
            padding-left: 16px;
        }
        
        .letter-body li {
            margin: 6px 0;
            padding: 3px 0;
            border-bottom: 1px dotted #dee2e6;
        }
        
        .letter-body li:last-child {
            border-bottom: none;
        }
        
        .signature-section {
            margin-top: 15px;
            text-align: right;
            font-size: 12px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 10px;
            border-radius: 4px;
            border-left: 3px solid #2c5aa0;
        }
        
        .qr-section {
            text-align: center;
            margin-top: 10px;
            padding: 8px;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 6px;
            border: 2px dashed #2c5aa0;
        }
        
        .qr-code {
            width: 60px;
            height: 60px;
            border: 2px solid #2c5aa0;
            border-radius: 4px;
            box-shadow: 0 2px 6px rgba(44, 90, 160, 0.2);
        }
        
        .print-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #2c5aa0;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        
        .print-btn:hover {
            background: #1e3d6f;
        }
        
        .date-section {
            text-align: right;
            margin: 6px 0;
            font-weight: bold;
            font-size: 12px;
        }
        
        .date-box {
            background: linear-gradient(135deg, #fff3e0 0%, #ffffff 100%);
            padding: 6px 10px;
            border-radius: 15px;
            border: 1px solid #ffcc80;
            display: inline-block;
        }
    </style>
</head>
<body>
    <button class="print-btn no-print" onclick="window.print()">🖨️ Print Letter</button>
    
    <div class="letter-content">
        <!-- Letterhead -->
        <div class="letterhead">
            <img src="<?= base_url('assets/img/logo.jpg') ?>" alt="School Logo" class="logo">
            <div class="school-name">College of Health Sciences and Technology Jega</div>
            <div class="school-address">P.M.B 1015, Jega, Kebbi State, Nigeria</div>
            <div class="school-address">Tel: +234-XXX-XXXX-XXX | Email: info@chstjega.edu.ng</div>
        </div>
        
        
        <!-- Applicant Information -->
        <div class="applicant-info">
            <strong>Name of Applicant:</strong> <?= strtoupper($student['surname'] . ' ' . $student['firstname'] . ' ' . $student['othername']) ?><br>
            <strong>ADMISSION No:</strong> <?= $student['pnumber'] ?><br>
        </div>
        
        <div class="date-section">
            <span class="date-box">Date: <?= date('d/m/Y') ?></span>
        </div>
        
        <!-- Letter Title -->
        <div class="admission-title">
            CONFIRMATION OF ADMISSION <?= date('Y') ?>/<?= date('Y') + 1 ?> ACADEMIC SESSION
        </div>
        
        <!-- Letter Body -->
        <div class="letter-body">
            <ol>
                <li>
                    I am pleased to inform you that your provisional admission has been confirmed into the 
                    <strong>Department of <?= strtoupper($student['dept_name']) ?></strong> to pursue a three (3) year program 
                    leading to the award of <strong>Diploma in <?= strtoupper($student['dept_name']) ?></strong> 
                    with admission number <strong><?= $student['pnumber'] ?></strong>
                </li>
                
                <li>
                    You are required to possess at least the minimum entry qualification and other admission 
                    requirements to enable you register for this program.
                </li>
                
                <li>
                    If at any time during your study, it is discovered that you provided false information 
                    to obtain this admission during the registration you will be required to withdraw from the college.
                </li>
                
                <li>
                    Information relating to schedule of registration fees and acceptance of this provisional 
                    admission is enclosed herewith.
                </li>
                
                <li>
                    Please accept my congratulations.
                </li>
            </ol>
        </div>
        
        <!-- Signature Section -->
        <div class="signature-section">
            <div style="margin-top: 30px;">
                <strong>Bilyaminu Danjuma</strong><br>
                Ag. Registrar<br>
                College of Health Sciences and Technology Jega
            </div>
        </div>
        
        <!-- QR Code Section -->
        <div class="qr-section">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=60x60&data=<?= urlencode($student['pnumber']) ?>" 
                 alt="QR Code" class="qr-code">
            <div style="font-size: 8px; margin-top: 2px;">Admission QR: <?= $student['pnumber'] ?></div>
        </div>
        
        <!-- Footer -->
        <div style="margin-top: 8px; text-align: center; font-size: 9px; color: #666; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 6px; border-radius: 4px; border-top: 2px solid #2c5aa0;">
            <p style="margin: 1px 0;"><em>✓ This is an official document of College of Health Sciences and Technology Jega</em></p>
            <p style="margin: 1px 0;">📅 Generated on <?= date('d/m/Y H:i:s') ?></p>
        </div>
    </div>
    
    <script>
        // Auto-focus for printing
        window.onload = function() {
            // Optional: Auto-print when page loads (uncomment if needed)
            // window.print();
        }
    </script>
</body>
</html>