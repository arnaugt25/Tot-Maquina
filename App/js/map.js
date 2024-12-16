import L from "leaflet";

import 'leaflet/dist/leaflet.css';

let map; // Variable global para el mapa
const customIcon = L.divIcon({
    html: '<i class="fa-solid fa-location-dot" style="color: #214969;"></i>',
    iconSize: [20, 20],
    className: 'custom-div-icon',
    iconAnchor: [10, 20],
    popupAnchor: [0, -20]
});

document.addEventListener('DOMContentLoaded', function() {
    const mapElement = document.getElementById("map");
    if (!mapElement) {
        return;
    }
    
    map = L.map('map', {
        zoomControl: false
    }).setView([39.5696, 2.6502], 12);

    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19
    }).addTo(map);

    L.control.zoom({
        position: 'bottomright'
    }).addTo(map);

    if (typeof machines !== 'undefined' && machines && machines.length > 0) {
        loadMarkers(machines);
    }
});

// Función para cargar los marcadores
window.loadMarkers = function(machines) {
    if (!machines || machines.length === 0) {
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

                        const marker = L.marker([lat, lng], {
                            icon: customIcon,
                            title: machine.model,
                            riseOnHover: true
                        }).addTo(markersLayer);

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
                                <div class="mt-4 text-center">
                                    <a href="/maquina_id?machine_id=${machine.machine_id}" 
                                       class="inline-flex items-center justify-center px-4 py-2 bg-[#214969] hover:bg-[#1a3850] text-white rounded-lg transition-colors duration-300 text-sm">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Más detalles
                                    </a>
                                </div>
                            </div>
                        `);
                    }
                }
            } catch (error) {}
        }
    });

    if (bounds.length > 0) {
        map.fitBounds(bounds, {
            padding: [50, 50],
            maxZoom: 15
        });
    }
};

// Funciones del modal
window.abrirMapaModal = function() {
    const modal = document.getElementById('mapaModal');
    if (modal) {
        modal.classList.remove('hidden');
        setTimeout(() => {
            map.invalidateSize();
            if (typeof machines !== 'undefined') {
                loadMarkers(machines);
            }
        }, 100);
    }
};

window.cerrarMapaModal = function() {
    const modal = document.getElementById('mapaModal');
    if (modal) {
        modal.classList.add('hidden');
    }
};

// Event Listeners
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        cerrarMapaModal();
    }
});

if (document.getElementById('mapaModal')) {
    document.getElementById('mapaModal').addEventListener('click', function(event) {
        if (event.target === this) {
            cerrarMapaModal();
        }
    });
}