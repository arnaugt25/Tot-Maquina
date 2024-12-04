// Inicializar el mapa con un estilo más moderno
var map = L.map('map', {
    zoomControl: false  // Desactivamos el control de zoom predeterminado
}).setView([41.3851, 2.1734], 13);

// Añadir un estilo de mapa más moderno
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: '© OpenStreetMap contributors',
    maxZoom: 19
}).addTo(map);

// Añadir control de zoom en una posición personalizada
L.control.zoom({
    position: 'bottomright'
}).addTo(map);

// Definir el icono personalizado
const customIcon = L.divIcon({
    html: '<i class="fa-solid fa-location-dot" style="color: #214969;"></i>',
    iconSize: [20, 20],
    className: 'custom-div-icon',
    iconAnchor: [10, 20],
    popupAnchor: [0, -20]
});

// Función para cargar los marcadores
function loadMarkers(machines) {
    if (!machines || machines.length === 0) {
        console.log('No hay máquinas para mostrar');
        return;
    }

    const bounds = [];
    const markersLayer = L.featureGroup().addTo(map);

    machines.forEach(function(machine) {
        if (machine.coordinates) {
            try {
                const coords = machine.coordinates.split(',');
                if (coords.length === 2) {
                    const lat = parseFloat(coords[0].trim());
                    const lng = parseFloat(coords[1].trim());
                    
                    if (!isNaN(lat) && !isNaN(lng)) {
                        bounds.push([lat, lng]);

                        // Crear marcador con animación de rebote
                        const marker = L.marker([lat, lng], {
                            icon: customIcon,                              // Usar el icono personalizado
                            title: machine.model,
                            riseOnHover: true,
                            bounceOnAdd: true
                        }).addTo(markersLayer);

                        // Añadir popup con diseño mejorado
                        marker.bindPopup(`
                            <div class="p-4 min-w-[250px]">
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
                        `, {
                            maxWidth: 400,
                            closeButton: true,
                            className: 'custom-popup'
                        });

                        // Añadir efecto hover al marcador
                        marker.on('mouseover', function() {
                            this.openPopup();
                        });
                    }
                }
            } catch (error) {
                console.error('Error al procesar coordenadas:', error);
            }
        }
    });

    // Ajustar el mapa para mostrar todos los marcadores con padding
    if (bounds.length > 0) {
        map.fitBounds(bounds, {
            padding: [50, 50],
            maxZoom: 15
        });
    }
}

// Funciones para el modal
function abrirMapaModal() {
    const modal = document.getElementById('mapaModal');
    document.body.classList.add('modal-open');
    modal.classList.remove('hidden');
    
    // Reinicializar el mapa cuando se abre el modal
    setTimeout(() => {
        map.invalidateSize();
        loadMarkers(machines);
    }, 100);
}

function cerrarMapaModal() {
    const modal = document.getElementById('mapaModal');
    document.body.classList.remove('modal-open');
    modal.classList.add('hidden');
}

// Event Listeners
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        cerrarMapaModal();
    }
});

document.getElementById('mapaModal').addEventListener('click', function(event) {
    if (event.target === this) {
        cerrarMapaModal();
    }
});

// Manejar el resize de la ventana
window.addEventListener('resize', function() {
    map.invalidateSize();
});
