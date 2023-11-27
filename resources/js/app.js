import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    toggleSidebar.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
        sidebar.classList.toggle('expanded');
    });
});


/* document.addEventListener('DOMContentLoaded', function () {
    setupSidebarToggle();
});

function setupSidebarToggle() {
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebarText = document.querySelectorAll('.sidebar-text');
    const raiderSection = document.getElementById('raiderSection');
    const sidebarNav = document.querySelector('.sidebar-nav');
    const sidebarLinks = document.querySelectorAll('.sidebar-link');

    toggleSidebar.addEventListener('click', function () {
        if (sidebar.offsetWidth === 64) {
            expandSidebar(sidebar, sidebarText, raiderSection, sidebarNav, sidebarLinks);
        } else {
            collapseSidebar(sidebar, sidebarText, raiderSection, sidebarNav, sidebarLinks);
        }
    });
}

function expandSidebar(sidebar, sidebarText, raiderSection, sidebarNav, sidebarLinks) {
    sidebar.style.width = '16rem';
    sidebarText.forEach(text => text.style.display = 'inline');
    raiderSection.style.display = 'block';
    sidebarNav.classList.remove('flex', 'flex-col', 'items-center');
    sidebarLinks.forEach(link => link.classList.remove('justify-center'));
}

function collapseSidebar(sidebar, sidebarText, raiderSection, sidebarNav, sidebarLinks) {
    sidebar.style.width = '4rem';
    sidebarText.forEach(text => text.style.display = 'none');
    raiderSection.style.display = 'none';
    sidebarNav.classList.add('flex', 'flex-col', 'items-center');
    sidebarLinks.forEach(link => link.classList.add('justify-center'));
} */
