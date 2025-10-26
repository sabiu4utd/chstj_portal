// Sidebar Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar');
    const content = document.querySelector('.flex-grow-1');
    const overlay = document.createElement('div');
    overlay.className = 'sidebar-overlay';
    document.body.appendChild(overlay);

    // Create toggle button if it doesn't exist
    if (!document.getElementById('sidebarToggle')) {
        const toggleBtn = document.createElement('button');
        toggleBtn.id = 'sidebarToggle';
        toggleBtn.className = 'btn d-lg-none';
        toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
        document.body.appendChild(toggleBtn);
    }

    // Toggle sidebar
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        sidebar.style.left = sidebar.style.left === '0px' ? '-280px' : '0px';
        overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
        content.style.marginLeft = content.style.marginLeft === '280px' ? '0' : '280px';
    });

    // Close sidebar when clicking overlay
    overlay.addEventListener('click', function() {
        sidebar.style.left = '-280px';
        overlay.style.display = 'none';
        content.style.marginLeft = '0';
    });

    // Close sidebar when window is resized to larger screen
    window.addEventListener('resize', function() {
        if (window.innerWidth > 991.98) {
            sidebar.style.left = '0';
            overlay.style.display = 'none';
            content.style.marginLeft = '280px';
        } else {
            sidebar.style.left = '-280px';
            content.style.marginLeft = '0';
        }
    });
});
