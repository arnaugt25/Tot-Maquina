// Agrega listeners a los botones que disparan las notificaciones (Add listeners to buttons that trigger notifications)
document.querySelectorAll('.btn').forEach(button => {
    button.addEventListener('click', function() {
        // Obtiene el tipo de notificación (Gets the notification type)
        const tipo = this.getAttribute('data-tipo');
        // Selecciona la plantilla toast 
        const toast = document.querySelector(`.toast.${tipo}`);
        // Obtiener contenedor (Select the toast template)
        const contenedorToast = document.getElementById('contenedor-toast');
        const nuevoToast = toast.cloneNode(true);
        contenedorToast.appendChild(nuevoToast);
        
        // Hace visible el nuevo toast (Makes the new toast visible)
        nuevoToast.style.display = 'block'; 
        
        // Temporizador para eliminar el toast después de 3 segundos (Timer to remove toast after 3 seconds)
        setTimeout(() => {
            nuevoToast.style.display = 'none'; 
            contenedorToast.removeChild(nuevoToast); 
        }, 3000);
    });
});

// Agrega listeners a los botones de cerrar (Add listeners to close buttons)
document.querySelectorAll('.btn-cerrar').forEach(button => {
    button.addEventListener('click', function() {
        // Encuentra el toast (Find the toast)
        const toast = this.closest('.toast');
        // Oculta y elimina el toast cuando se hace clic en botón de cerrar (Hide and remove the toast when the close button is clicked)
        toast.style.display = 'none'; 
        toast.parentNode.removeChild(toast); 
    });
});