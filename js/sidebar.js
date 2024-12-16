const menuButton = document.querySelector('.menu-button');
        const sidebar = document.querySelector('.sidebar');
        const sidebarOverlay = document.querySelector('.sidebar-overlay');

        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('active'); // Toggle the sidebar visibility
            sidebarOverlay.classList.toggle('active'); // Show overlay
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        });
