document.getElementById('mobile-menu-button').addEventListener('click', function() {
    const mobileMenu = document.getElementById('mobile-menu');
    const button = this;
    
    // Toggle menu
    mobileMenu.classList.toggle('hidden');
    
    // Update aria-expanded
    const isExpanded = !mobileMenu.classList.contains('hidden');
    button.setAttribute('aria-expanded', isExpanded);
});

// Cerrar menú al hacer clic fuera
document.addEventListener('click', function(event) {
    const mobileMenu = document.getElementById('mobile-menu');
    const menuButton = document.getElementById('mobile-menu-button');
    
    if (!mobileMenu.contains(event.target) && !menuButton.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.add('hidden');
        menuButton.setAttribute('aria-expanded', 'false');
    }
});

// Cerrar menú al redimensionar la ventana
window.addEventListener('resize', function() {
    const mobileMenu = document.getElementById('mobile-menu');
    const menuButton = document.getElementById('mobile-menu-button');
    
    if (window.innerWidth >= 1024 && !mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.add('hidden');
        menuButton.setAttribute('aria-expanded', 'false');
    }
});