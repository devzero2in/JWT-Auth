// Close the dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdownButton = document.querySelector('[data-dropdown-toggle="dropdown-user"]');
    const dropdown = document.getElementById('dropdown-user');
    if (dropdownButton && dropdown && !dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.add('hidden');
    }
});

// Handle sidebar toggle for all screen sizes
const toggleSidebarButton = document.getElementById('toggleSidebarButton');
const toggleIcon = document.getElementById('toggleIcon');
const sidebar = document.getElementById('logo-sidebar');
const mainContent = document.getElementById('mainContent');

// Store sidebar state in localStorage
let isSidebarOpen = localStorage.getItem('sidebarOpen') === null 
    ? window.innerWidth >= 640 
    : localStorage.getItem('sidebarOpen') === 'true';

function updateSidebarState(isOpen) {
    isSidebarOpen = isOpen;
    localStorage.setItem('sidebarOpen', isOpen);

    if (isOpen) {
        sidebar.classList.remove('-translate-x-full');
        toggleIcon.style.transform = 'rotate(0deg)';
        if (window.innerWidth >= 640) {
            mainContent.classList.add('sm:ml-64');
            mainContent.classList.remove('sm:ml-0');
        }
    } else {
        sidebar.classList.add('-translate-x-full');
        toggleIcon.style.transform = 'rotate(180deg)';
        if (window.innerWidth >= 640) {
            mainContent.classList.remove('sm:ml-64');
            mainContent.classList.add('sm:ml-0');
        }
    }
}

// Initialize sidebar state
function initializeSidebar() {
    if (window.innerWidth < 640) {
        updateSidebarState(false);
    } else {
        updateSidebarState(isSidebarOpen);
    }
}

// Run initialization when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeSidebar);

// Toggle sidebar when button is clicked
toggleSidebarButton.addEventListener('click', function(e) {
    e.stopPropagation();
    updateSidebarState(!isSidebarOpen);
});

// Prevent sidebar from closing when clicking inside it
sidebar.addEventListener('click', function(e) {
    e.stopPropagation();
});

// Handle resize events with debounce
let resizeTimer;
window.addEventListener('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
        if (window.innerWidth < 640) {
            updateSidebarState(false);
        } else {
            updateSidebarState(isSidebarOpen);
        }
    }, 250);
});