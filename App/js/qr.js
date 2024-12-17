
document.addEventListener('DOMContentLoaded', function() {
    // Obtiene la URL actual (Gets the current URL)
    const urlParams = new URLSearchParams(window.location.search);
    // Extrae 'machine_id' de la URL (Extract 'machine_id' from URL)
    const machineId = urlParams.get('machine_id');
    
    if (machineId) {
        // Busca el elemento contenedor para el código QR (Find the container element for the QR code)
        const qrContainer = document.getElementById('qrContainer');
        if (qrContainer) {
            // Construye una URL para generar el código QR (Construye una URL para generar el código QR)
            const qrUrl = `/generate_machine_qr/${machineId}`;
            // Inserta la imagen del código QR (Insert the QR code image)
            qrContainer.innerHTML = `<img src="${qrUrl}" alt="QR Code" class="mx-auto">`;
        }
    }

    // Función global para mostrar el código QR de una máquina (Global function to display the QR code of a machine)
    window.showMachineQRCode = function(machineId) {
        console.log("Generando QR para la máquina ID:", machineId);
        // Redirige a la página de generación del QR (Redirects to the QR generation page)
        window.location.href = `/generate_machine_qr/${machineId}`;
    };
});