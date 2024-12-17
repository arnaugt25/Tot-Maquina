
import $ from "jquery";

$(document).ready(function () {
    // Obtener referencia al elemento de búsqueda (Get reference to the search item)
    var identificador = document.getElementById("searchMachine");

    if (identificador != null) {
        // Añadir evento para detectar cambios durante la busqueda (Add event to detect changes during search)
        identificador.addEventListener("input", function () {
            // Obtener el valor de búsqueda (Get the search value)
            const query = this.value.trim();
            const grid = document.querySelector(".grid");

            if (query.length > 0) {
                // Realizar petición al servidor con el término de búsqueda (Make a request to the server with the search term)
                fetch(`/search-machines?query=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        // Limpiar el contenedor de resultados (Clear the results container)
                        grid.innerHTML = "";
                        if (data.length > 0) {
                            // Iterar sobre cada máquina encontrada (Iterate over each machine found)
                            data.forEach(machine => {
                                // Crear tarjeta HTML para cada máquina (Create HTML card for each machine)
                                const card = `
                                    // ... estructura de la tarjeta ...
                                `;
                                // Añadir la tarjeta al contenedor (Add the card to the container)
                                grid.innerHTML += card;
                            });
                        } else {
                            grid.innerHTML = "<p>No se encontraron máquinas</p>";
                        }
                    })
                    .catch(error => {
                        console.error("Error en la búsqueda:", error);
                        grid.innerHTML = "<p>Error en la búsqueda.</p>";
                    });
            } else {
                // Limpiar resultados si el campo de búsqueda está vacío (Clear results if search field is empty)
                grid.innerHTML = "";
            }
        });
    }
});