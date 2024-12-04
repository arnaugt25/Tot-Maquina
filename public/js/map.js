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

    machines.forEach(function(machine) {
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
                            <div class="p-4 min-w-[200px]">
                                <h3 class="text-[#214969] font-bold text-lg mb-3 border-b border-gray-200 pb-2">
                                    ${machine.model}
                                </h3>
                                
                                <div class="space-y-2">
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-barcode w-6 text-[#5DA6C3]"></i>
                                        <span class="ml-2">Serie: ${machine.serial_number}</span>
                                    </div>
                                    
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-industry w-6 text-[#5DA6C3]"></i>
                                        <span class="ml-2">Fabricante: ${machine.created_by}</span>
                                    </div>
                                </div>
                                
                                <div class="mt-4 pt-2 border-t border-gray-200">
                                    <a href="/id?machine_id=${machine.machine_id}" 
                                       class="block text-center bg-[#214969] text-white py-2 px-4 rounded-lg hover:bg-[#5DA6C3] transition-all duration-300">
                                        <i class="fas fa-info-circle mr-2"></i>Ver detalles
                                    </a>
                                </div>
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

  function abrirMapaModal() {
    const modal = document.getElementById('mapaModal');
    modal.classList.remove('hidden');
    // Reinicializar el mapa cuando se abre el modal
    setTimeout(() => {
      map.invalidateSize();
      loadMarkers(machines);
    }, 100);
  }

  function cerrarMapaModal() {
    const modal = document.getElementById('mapaModal');
    modal.classList.add('hidden');
  }

  // Cerrar modal con la tecla Escape
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
      cerrarMapaModal();
    }
  });

  // Cerrar modal al hacer clic fuera del contenido
  document.getElementById('mapaModal').addEventListener('click', function(event) {
    if (event.target === this) {
      cerrarMapaModal();
    }
  });
