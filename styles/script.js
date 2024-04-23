document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');

    sidebarToggle.addEventListener('click', function() {
        if (sidebar.style.right === '-250px') {
            sidebar.style.right = '0';
        } else {
            sidebar.style.right = '-250px';
        }
    });

    document.addEventListener('click', function(event) {
        if (!sidebar.contains(event.target) && event.target !== sidebarToggle) {
            sidebar.style.right = '-250px';
        }
    });
});
