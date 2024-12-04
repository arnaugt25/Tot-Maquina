// Inicializar el mapa
var map = L.map('map').setView([41.3851, 2.1734], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Función para cargar los marcadores
function loadMarkers(machines) {
    if (!machines || machines.length === 0) {
        console.log('No hay máquinas para mostrar');
        return;
    }

    const bounds = [];

    machines.forEach(function (machine) {
        if (machine.coordinates) {
            try {
                const coords = machine.coordinates.split(',');
                if (coords.length === 2) {
                    const lat = parseFloat(coords[0].trim());
                    const lng = parseFloat(coords[1].trim());

                    if (!isNaN(lat) && !isNaN(lng)) {
                        // Añadir coordenadas a los límites
                        bounds.push([lat, lng]);

                        // Crear marcador
                        const marker = L.marker([lat, lng], {
                            title: machine.model
                        }).addTo(map);

                        // Añadir popup con información
                        marker.bindPopup(`
                            <div class="p-2">
                                <h3 class="font-bold text-lg mb-2">${machine.model}</h3>
                                <p class="mb-1"><strong>Serie:</strong> ${machine.serial_number}</p>
                                <p class="mb-1"><strong>Fabricante:</strong> ${machine.created_by}</p>
                                <a href="/id?machine_id=${machine.machine_id}" 
                                   class="text-blue-500 hover:text-blue-700">
                                   Ver detalles
                                </a>
                            </div>
                        `);
                    }
                }
            } catch (error) {
                console.error('Error al procesar coordenadas:', error);
            }
        }
    });

    // Ajustar el mapa para mostrar todos los marcadores
    if (bounds.length > 0) {
        map.fitBounds(bounds);
    }

}
function loadSingleMarker(machine) {
    if (!machine.coordinates) {
        console.log('No hay coordenadas para esta máquina');
        return;
    }

    try {
        const coords = machine.coordinates.split(',');
        if (coords.length === 2) {
            const lat = parseFloat(coords[0].trim());
            const lng = parseFloat(coords[1].trim());

            if (!isNaN(lat) && !isNaN(lng)) {
                // Actualizar la vista del mapa existente
                map.setView([lat, lng], 15);

                // Limpiar marcadores existentes
                map.eachLayer((layer) => {
                    if (layer instanceof L.Marker) {
                        map.removeLayer(layer);
                    }
                });

                // Crear nuevo marcador
                const marker = L.marker([lat, lng], {
                    title: machine.model
                }).addTo(map);

                
            }
        }
    } catch (error) {
        console.error('Error al procesar coordenadas:', error);
    }
}