// Buscador de máquinas
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchMachine');
    const searchResults = document.getElementById('searchResults');
    
    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.trim();
        
        // Si está vacío no devuelve nada
        if (searchTerm === '') {
            searchResults.innerHTML = '';
            return;
        }

        
    });
});