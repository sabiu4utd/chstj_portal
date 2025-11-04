<?php

if (!function_exists('view_with_mobile_support')) {
    function view_with_mobile_support($view_path, $data = [], $show_sidebar = true) {
        $data['show_sidebar'] = $show_sidebar;
        
        // Add common header
        echo view('common/header', $data);
        
        // Add main content
        echo view($view_path, $data);
        
        // Add footer
        echo view('common/footer', $data);
    }
}