    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Common Mobile Navigation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const mainContent = document.querySelector('.main-content');
            const overlay = document.querySelector('.sidebar-overlay');

            if (sidebar && sidebarToggle) {
                function toggleSidebar() {
                    sidebar.classList.toggle('show');
                    if (overlay) {
                        overlay.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
                    }
                    if (sidebar.classList.contains('show')) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow = '';
                    }
                }

                // Toggle sidebar on button click
                sidebarToggle.addEventListener('click', toggleSidebar);

                // Close sidebar when clicking overlay
                if (overlay) {
                    overlay.addEventListener('click', toggleSidebar);
                }

                // Handle links in sidebar
                const sidebarLinks = sidebar.querySelectorAll('.nav-link:not([data-bs-toggle])');
                sidebarLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        if (window.innerWidth < 992) {
                            if (!this.hasAttribute('data-bs-toggle')) {
                                setTimeout(() => {
                                    toggleSidebar();
                                }, 150);
                            }
                        }
                    });

                    // Additional touch event handling for mobile
                    if ('ontouchstart' in window) {
                        link.addEventListener('touchend', function(e) {
                            if (window.innerWidth < 992) {
                                if (!this.hasAttribute('data-bs-toggle')) {
                                    setTimeout(() => {
                                        if (this.getAttribute('href') !== '#') {
                                            window.location.href = this.getAttribute('href');
                                        }
                                    }, 100);
                                }
                            }
                        });
                    }
                });

                // Handle resize events
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 992) {
                        sidebar.classList.remove('show');
                        if (overlay) {
                            overlay.style.display = 'none';
                        }
                        document.body.style.overflow = '';
                    }
                });
            }

            // Make tables responsive on mobile
            const tables = document.querySelectorAll('table:not(.table-mobile)');
            tables.forEach(table => {
                // Add responsive classes
                table.classList.add('table-mobile');
                const wrapper = document.createElement('div');
                wrapper.classList.add('table-responsive');
                table.parentNode.insertBefore(wrapper, table);
                wrapper.appendChild(table);

                // Add data labels for mobile view
                const headers = table.querySelectorAll('th');
                const headerTexts = Array.from(headers).map(header => header.textContent);
                
                const rows = table.querySelectorAll('tbody tr');
                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    cells.forEach((cell, index) => {
                        if (headerTexts[index]) {
                            cell.setAttribute('data-label', headerTexts[index]);
                        }
                    });
                });
            });

            // Fix button groups on mobile
            const btnGroups = document.querySelectorAll('.btn-group');
            if (window.innerWidth < 576) {
                btnGroups.forEach(group => {
                    group.classList.add('d-flex', 'flex-column');
                    const buttons = group.querySelectorAll('.btn');
                    buttons.forEach(button => {
                        button.classList.add('w-100', 'mb-2');
                    });
                });
            }
        });
    </script>
    <?php if(isset($additional_js)): ?>
        <?php foreach($additional_js as $js): ?>
            <script src="<?php echo $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>