document.addEventListener('DOMContentLoaded', function() { 
    const urlParams = new URLSearchParams(window.location.search);
    const machineId = urlParams.get('machine_id');
    
    if (machineId) {
        const qrContainer = document.getElementById('qrContainer');
        if (qrContainer) {
            const qrUrl = `/generate_machine_qr/${machineId}`;
            qrContainer.innerHTML = `<img src="${qrUrl}" alt="QR Code" class="mx-auto">`;
        }
    }
    window.showMachineQRCode = function(machineId) {
    console.log("Generando QR para la máquina ID:", machineId);
    window.location.href = `/generate_machine_qr/${machineId}`;
};
});
