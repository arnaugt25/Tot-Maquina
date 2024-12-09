// Buscador de máquinas
document.getElementById('searchMachine').addEventListener('input', function() {
    const query = this.value.trim();
    const machineCards = document.getElementById('searchMachine');

    // Si está vacío no devuelve nada
    if (query === '') {
        machineCards.innerHTML = '';
        return;
    }

      // Petición AJAX para resultados
      fetch(`/search_machines.php?search=${encodeURIComponent(searchTerm)}`)
      .then(response => response.json())
      .then(data => {
      
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

///
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchMachine');
    
    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.trim();  
   
        if (searchTerm === '') {
            searchResults.innerHTML = '';
            return;
        }

        
    });
});