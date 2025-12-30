document.addEventListener("DOMContentLoaded", function() {
    const sidebarLinks = document.querySelectorAll('.sidebar ul li a');
    const sections = document.querySelectorAll('section');

    function hideAllSections() {
        sections.forEach(section => {
            section.style.display = 'none';
        });
    }

    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Remove 'active' class from all links
            sidebarLinks.forEach(l => l.classList.remove('active'));
            // Add 'active' class to the clicked link
            this.classList.add('active');

            // Hide all sections
            hideAllSections();

            // Show the selected section
            const sectionId = this.getAttribute('data-section');
            document.getElementById(sectionId).style.display = 'block';
        });
    });

    // Initially, hide all sections except the first one (optional)
    hideAllSections();
    document.getElementById('dashboard').style.display = 'block';
});