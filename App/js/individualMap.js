// Initialize the map
let map;

function initializeMap(containerId) {
    map = L.map(containerId).setView([39.5696, 2.6502], 12); // Default center at Mallorca

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
}

function loadSingleMachine(machine) {
    if (!machine || !machine.latitude || !machine.longitude) {
        console.error('Machine location data is missing');
        return;
    }

    // Clear any existing markers
    if (map) {
        map.eachLayer((layer) => {
            if (layer instanceof L.Marker) {
                map.removeLayer(layer);
            }
        });
    }

    // Create marker for the machine
    const marker = L.marker([machine.latitude, machine.longitude]).addTo(map);
    
    // Add popup with machine info
    marker.bindPopup(`
        <div class="popup-content">
            <h3 class="font-semibold">${machine.created_by}</h3>
            <p>Serial: ${machine.serial_number}</p>
            <p>Installed: ${machine.installation_date}</p>
        </div>
    `).openPopup();

    // Center map on the marker
    map.setView([machine.latitude, machine.longitude], 15);
}

// Function to handle map initialization and machine loading
function initializeIndividualMap(containerId, machine) {
    initializeMap(containerId);
    loadSingleMachine(machine);
}
