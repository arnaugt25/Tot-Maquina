document.addEventListener('DOMContentLoaded', function() {
    // Seleccionar los elementos necesarios (Select the necessary elements)
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        // Añadir evento click al botón (Add click event to button)
        mobileMenuButton.addEventListener('click', function() {
            // Toggle la clase hidden del menú móvil (Toggle la clase hidden del menú móvil )
            mobileMenu.classList.toggle('hidden');
            // Actualizar aria-expanded (Update aria-expanded)
            const isExpanded = !mobileMenu.classList.contains('hidden');
            this.setAttribute('aria-expanded', isExpanded);
        });

        // Cerrar menú al hacer click fuera (Close menu when clicking outside)
        document.addEventListener('click', function(event) {
            if (!mobileMenuButton.contains(event.target) && 
                !mobileMenu.contains(event.target) && 
                !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
            }
        });
        // Cerrar menú al redimensionar la ventana (Close menu when resizing window)
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768 && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
            }
        });
    }
});