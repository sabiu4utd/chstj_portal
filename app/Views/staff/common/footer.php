<!-- Common footer for staff views -->
    </div> <!-- Close container -->
    <script src="<?= base_url('assets/js/responsive.js') ?>"></script>
    <script>
        // Mobile menu toggle
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.mobile-menu').classList.toggle('active');
        });

        // Table responsiveness
        document.querySelectorAll('table').forEach(function(table) {
            if (!table.parentElement.classList.contains('table-responsive')) {
                var wrapper = document.createElement('div');
                wrapper.classList.add('table-responsive');
                table.parentNode.insertBefore(wrapper, table);
                wrapper.appendChild(table);
            }
        });

        // Form responsiveness
        document.querySelectorAll('form').forEach(function(form) {
            form.classList.add('responsive-form');
        });
    </script>
</body>
</html>