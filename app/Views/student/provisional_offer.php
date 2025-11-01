 
 <!DOCTYPE html>
 <html lang="en">
 <?php
    //var_dump($student);
    ?>

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Payment Receipt - KSCHST</title>
     <style>
         /* Reset CSS */
         * {
             margin: 0;
             padding: 0;
             box-sizing: border-box;
         }

         /* General Styles */
         body {
             font-family: 'Arial', sans-serif;
             line-height: 1.6;
             color: #333;
             background: #f5f5f5;
         }

         /* Receipt Container */
         .receipt-container {
             width: 210mm;
             /* A4 width */
             min-height: 297mm;
             /* A4 height */
             margin: 0 auto;
             background: white;
             padding: 20mm;
             position: relative;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         }

         /* Header Styles */
         .receipt-header {
             text-align: center;
             margin-bottom: 10px;
             border-bottom: 2px solid #1a237e;
             padding-bottom: 20px;
         }

         .school-logo {
             width: 120px;
             height: auto;
             margin-bottom: 10px;
         }

         .school-name {
             font-size: 25px;
             color: #1a237e;
             margin-bottom: 5px;
             font-weight: bold;
         }

         .school-address {
             font-size: 14px;
             color: #666;
             margin-bottom: 5px;
         }

         /* Receipt Content */
         .receipt-body {
             padding: 20px;
             margin-bottom: 30px;
         }

         .receipt-title {
             font-size: 20px;
             color: #1a237e;
             margin-bottom: 20px;
             text-align: center;
             text-transform: uppercase;
             letter-spacing: 2px;
         }

         .receipt-info {
             display: grid;
             grid-template-columns: 1fr 1fr;
             gap: 20px;
             margin-bottom: 30px;
         }

         .info-group {
             margin-bottom: 15px;
         }

         .info-label {
             font-weight: bold;
             color: #666;
             font-size: 14px;
         }

         .info-value {
             font-size: 16px;
             color: #333;
             margin-top: 5px;
         }

         .amount-section {
             text-align: center;
             margin: 30px 0;
             padding: 20px;
             background: #f8f9fa;
             border-radius: 8px;
         }

         .amount {
             font-size: 24px;
             color: #1a237e;
             font-weight: bold;
         }

         /* QR Code Section */
         .qr-section {
             text-align: center;
             margin-top: 30px;
         }

         .qr-code {
             width: 150px;
             height: 150px;
             margin: 0 auto;
         }

         .reference {
             margin-top: 10px;
             font-size: 12px;
             color: #666;
         }

         /* Footer */
         .receipt-footer {
             text-align: center;
             margin-top: 5x;
             padding-top: 20px;
             border-top: 1px solid #ddd;
             color: #666;
             font-size: 14px;
         }

         /* Print Styles */
         @media print {
             body {
                 background: white;
             }

             .receipt-container {
                 box-shadow: none;
                 padding: 15mm;
             }

             @page {
                 size: A4;
                 margin: 0;
             }
         }

         /* No Break Inside Elements */
         .receipt-header,
         .receipt-body,
         .receipt-footer {
             break-inside: avoid;
         }

         /* Print Button */
         .print-button {
             position: fixed;
             bottom: 20px;
             right: 20px;
             padding: 10px 20px;
             background: #1a237e;
             color: white;
             border: none;
             border-radius: 5px;
             cursor: pointer;
             display: none;
         }

         @media screen {
             .print-button {
                 display: block;
             }
         }
     </style>
 </head>

 <body>
     <div class="receipt-container">
         <div class="receipt-header">
             <img src="<?php echo base_url('assets/img/logo.jpg'); ?>" alt="KSCHST Logo" class="school-logo">
             <h4 style="text-align: center;">KEBBI STATE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY, JEGA</h4>
             <h4 style="text-align: center;">OFFICE OF THE REGISTRA, ADMISSIONS UNIT</h4>
             <div>
                 <p>P.M.B. 2028 Jega, Kebbi State, Nigeria</p>
                 <p>Email: info@chstj.edu.ng | Website: www.chstj.edu.ng</p>
             </div>

         </div>


         <div class="receipt-body">
             <table style="font-weight: bold;">
                 <tr>
                     <td>Student Name:</td>
                     <td><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['surname'] . ' ' . $_SESSION['othername']; ?></td>
                 </tr>
                 <tr>
                     <td>Application No:</td>
                     <td><?php echo $_SESSION['pnumber']; ?></td>
                 </tr>
             </table>

             <br />
             <h4 style="text-align:center">PROVISIONAL OFFER OF ADMISSION <?php echo $_SESSION['session_admitted']; ?> ACADEMIC SESSION</h4> <br />
             <p style="text-align:justify">
                 I am pleased to inform you that you have been offered provisional admission into the Department of <?php echo $_SESSION['dept_name']; ?> to pursue a three (3) year program leading to the award of a Diploma in <?php echo $_SESSION['program']; ?>.<BR />
                 1. Information relating to the schedule of registration fees and procedures for acceptance of this provisional admission is enclosed herewith.<BR />
                 3. You are required to possess at least the minimum entry qualifications and meet all other admission requirements before registration for this program.<BR />
                 4. If at any time during your study it is discovered that you provided false or misleading information to obtain this admission, you will be required to withdraw from the College.<BR />
                 5. Please accept my congratulations on your successful admission.

             </p>




             <div class="qr-section">
                 <img
                     src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode($_SESSION['firstname']); ?>"
                     alt="Transaction QR Code"
                     class="qr-code" style="width: 50px; height: 50px;">
                 <div class="reference">
                     <br />
                     <br />
                     <p style="font-size:15pt">

                         Bilyaminu Danjuma <br />
                         Registrar
                         .</p>
                     <!-- <p>For any queries, please contact the Bursary Department.</p>  -->
                     <!-- <p>&copy; <?php echo date('Y'); ?> KSCHST. All rights reserved.</p> -->
                 </div>
             </div>

             <!-- <div class="receipt-footer" style="margin-top: -10px;">
            <p>This is a computer-generated receipt and requires no signature.</p>
            <p>For any queries, please contact the Bursary Department.</p>
            <p>&copy; <?php echo date('Y'); ?> KSCHST. All rights reserved.</p>
        </div> -->
         </div>

         <button onclick="window.print()" class="print-button">
             Print Admission Letter
         </button>
 </body>

 </html>