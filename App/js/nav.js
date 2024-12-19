document.addEventListener('DOMContentLoaded', function() {
    // Seleccionar elementos necesarios (Select required items)
    const mobileMenuButton = document.querySelector('button');
    const mobileMenu = document.querySelector('.md\\:hidden.hidden');

    // Añadir evento click al botón (Add click event to button)
    mobileMenuButton.addEventListener('click', function() {
        // Toggle la clase hidden del menú móvil (Toggle la clase hidden del menú móvil)
        mobileMenu.classList.toggle('hidden');
    });

    // Cerrar menú al hacer click fuera (Close menu when clicking outside)
    document.addEventListener('click', function(event) {
        if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
});
