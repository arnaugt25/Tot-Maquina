// Función para ecceptar los elementos arrastrados (Function to accept dragged items)
window.allowDrop = function(ev) {
    if (!ev) return;
    ev.preventDefault();
}

// Función que se ejecuta cuando se comienza a arrastrar un elemento (Function that is executed when you start dragging an element)
window.drag = function(ev) {
    if (!ev || !ev.target) return;
    // Busca el elemento padre más cercano con la clase 'draggable' (Finds the nearest parent element with class 'draggable')
    const draggableElement = ev.target.closest('.draggable');
    if (!draggableElement) return;
    
    // Obtiene el ID del técnico (Gets the technician ID)
    const technicianId = draggableElement.dataset.technicianId;
    // Almacena el ID del técnico (Stores the technician ID)
    ev.dataTransfer.setData("technicianId", technicianId);
}

// Función que se ejecuta cuando se suelta un elemento arrastrado (Function that is executed when a dragged item is dropped)
window.drop = function(ev) {
    if (!ev) return;
    ev.preventDefault();
    const droppableElement = ev.target.closest('.droppable');
    const technicianId = ev.dataTransfer.getData("technicianId");
    const machineId = droppableElement.dataset.machineId;
    const loadingSpan = droppableElement.querySelector('span');
    const originalText = loadingSpan.textContent;
    loadingSpan.textContent = 'Asignando...';

    // Realiza una petición al servidor para asignar el técnico a la máquina (Makes a request to the server to assign the technician to the machine)
    fetch('/assign-technician', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            technician_id: technicianId,
            machine_id: machineId
        })
    })
    .then(response => {
        if (response.ok) {
            window.location.reload();
        } else {
            // Si hubo un error, restaura el texto de error (If there was an error, restore the error text)
            loadingSpan.textContent = originalText;
            throw new Error('Error en la asignación de técnico');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        loadingSpan.textContent = originalText;
    });
}