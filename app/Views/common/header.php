<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo isset($title) ? $title . ' - ' : ''; ?>KSCHST Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <?php if(isset($additional_css)): ?>
        <?php foreach($additional_css as $css): ?>
            <link href="<?php echo $css; ?>" rel="stylesheet">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
<?php if(isset($show_sidebar) && $show_sidebar): ?>
    <!-- Sidebar Toggle Button for Mobile -->
    <button id="sidebarToggle" class="btn d-lg-none">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay"></div>
<?php endif; ?>