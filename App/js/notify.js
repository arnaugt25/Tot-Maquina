document.querySelectorAll('.btn').forEach(button => {
    button.addEventListener('click', function() {
        const tipo = this.getAttribute('data-tipo');
        const toast = document.querySelector(`.toast.${tipo}`);
        const contenedorToast = document.getElementById('contenedor-toast');
        
        // Clona el toast y lo agrega al contenedor
        const nuevoToast = toast.cloneNode(true);
        contenedorToast.appendChild(nuevoToast);
        
        // Muestra el nuevo toast
        nuevoToast.style.display = 'block'; 
        
        // Oculta el toast después de 3 segundos
        setTimeout(() => {
            nuevoToast.style.display = 'none'; 
            contenedorToast.removeChild(nuevoToast); // Elimina el toast del DOM
        }, 3000);
    });
});

document.querySelectorAll('.btn-cerrar').forEach(button => {
    button.addEventListener('click', function() {
        const toast = this.closest('.toast');
        toast.style.display = 'none'; // Oculta el toast al hacer clic en cerrar
        toast.parentNode.removeChild(toast); // Elimina el toast del DOM
    });
});
