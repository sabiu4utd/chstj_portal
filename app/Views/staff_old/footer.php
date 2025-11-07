    </div> <!-- Close container -->
    <script src="<?= base_url('assets/js/responsive.js') ?>"></script>
    <script>
        // Mobile menu toggle
        (function(){
            var menuToggle = document.querySelector('.menu-toggle');
            var mobileMenu = document.querySelector('.mobile-menu');
            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener('click', function() {
                    mobileMenu.classList.toggle('active');
                });
            }

            // Table responsiveness
            document.querySelectorAll('table').forEach(function(table) {
                if (table && table.parentElement && !table.parentElement.classList.contains('table-responsive')) {
                    var wrapper = document.createElement('div');
                    wrapper.classList.add('table-responsive');
                    table.parentNode.insertBefore(wrapper, table);
                    wrapper.appendChild(table);
                }
            });
        })();
    </script>
</body>
</html>