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

        // Petición AJAX para resultados
        fetch(`/search_machines.php?search=${encodeURIComponent(searchTerm)}`)
            .then(response => response.json())
            .then(data => {
                // Limpiar resultados anteriores
                searchResults.innerHTML = '';
                
                // Mostrar los resultados
                data.forEach(machine => {
                    const div = document.createElement('div');
                    div.className = 'search-result';
                    div.innerHTML = `
                        <h3>${machine.name}</h3>
                        <p>${machine.description}</p>
                    `;
                    searchResults.appendChild(div);
                });
            })
            .catch(error => {
                console.error('Error en la búsqueda:', error);
            });
    });
});