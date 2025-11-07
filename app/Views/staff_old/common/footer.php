<!-- Common footer for staff views -->
    </div> <!-- Close container -->
    <script src="<?= base_url('assets/js/responsive.js') ?>"></script>
    <script>
        // Mobile menu toggle (guarded)
        (function(){
            var menuToggle = document.querySelector('.menu-toggle');
            var mobileMenu = document.querySelector('.mobile-menu');
            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener('click', function() {
                    mobileMenu.classList.toggle('active');
                });
            }

            // Table responsiveness (safe)
            document.querySelectorAll('table').forEach(function(table) {
                if (table && table.parentElement && !table.parentElement.classList.contains('table-responsive')) {
                    var wrapper = document.createElement('div');
                    wrapper.classList.add('table-responsive');
                    table.parentNode.insertBefore(wrapper, table);
                    wrapper.appendChild(table);
                }
            });

            // Form responsiveness (safe)
            document.querySelectorAll('form').forEach(function(form) {
                if (form && form.classList) form.classList.add('responsive-form');
            });
        })();
    </script>
</body>
</html>