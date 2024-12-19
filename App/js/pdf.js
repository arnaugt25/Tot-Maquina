// Importar la biblioteca jsPDF para generar PDFs (Import the jsPDF library to generate PDFs)
import { jsPDF } from "jspdf";
// Importar jQuery para manipulación del DOM (Import jQuery for DOM manipulation)
import $ from "jquery";

// Esperar a que el documento esté listo (Wait for the document to be ready)
$(document).ready(function () {
    // Obtener el botón de descarga del PDF por su ID (Get the PDF download button by its ID)
    var downloadButton = document.getElementById("downloadPdf");

    // Verificar si el botón existe (Check if the button exists)
    if (downloadButton != null) {
        // Añadir un evento de clic al botón (Add a click event to the button)
        downloadButton.addEventListener("click", function () {
            // Obtener el ID de la máquina desde el atributo del botón (Get the machine ID from the button's attribute)
            const machineId = this.getAttribute('data-machine-id');
            console.log("Generando PDF para máquina:", machineId); // Debug

            // Verificar si se encontró el ID de la máquina (Check if the machine ID was found)
            if (!machineId) {
                console.error("No se encontró el ID de la máquina"); // No machine ID found
                alert("Error: No se pudo identificar la máquina"); // Error: Could not identify the machine
                return; // Salir si no hay ID (Exit if there is no ID)
            }
            
            // Hacer una solicitud para obtener los datos del historial de la máquina (Make a request to get the machine's history data)
            fetch(`/pdf/${machineId}`)
            .then(response => {
                // Verificar si la respuesta es correcta (Check if the response is OK)
                if (!response.ok) throw new Error('Error al generar el PDF'); // Error generating PDF
                return response.json(); // Convertir la respuesta a JSON (Convert the response to JSON)
            })
            .then(data => {
                console.log("Datos recibidos:", data); // Debug
                const doc = new jsPDF(); // Crear una nueva instancia de jsPDF (Create a new instance of jsPDF)

                // Agregar título al PDF (Add title to the PDF)
                doc.setFontSize(20);
                doc.text('Historial de la Máquina', 10, 10);

                // Agregar contenido del historial de mantenimiento (Add maintenance history content)
                let y = 20; // Posición vertical inicial (Initial vertical position)
                data.historial.forEach((item, index) => {
                    doc.setFontSize(12);
                    doc.text(`Mantenimiento ${index + 1}`, 10, y);
                    doc.text(`Máquina: ${item.model}`, 10, y + 10);
                    doc.text(`Tipo: ${item.type}`, 10, y + 20);
                    doc.text(`Fecha de Instalación: ${item.installation_date}`, 10, y + 30);
                    doc.text(`Técnico Responsable: ${item.name}`, 10, y + 40);
                    y += 50; // Incrementar la posición vertical para el siguiente elemento (Increase vertical position for the next item)
                });

                // Agregar contenido de incidencias (Add incidents content)
                data.incidencias.forEach((item, index) => {
                    doc.setFontSize(12);
                    doc.text(`Incidencia ${index + 1}`, 10, y);
                    doc.text(`Fecha: ${item.assigned_date}`, 10, y + 10);
                    doc.text(`Descripción: ${item.description}`, 10, y + 20);
                    y += 30; // Incrementar la posición vertical para el siguiente elemento (Increase vertical position for the next item)
                });

                // Guardar el archivo PDF con un nombre basado en el ID de la máquina (Save the PDF file with a name based on the machine ID)
                doc.save(`Historial_maquina_${machineId}.pdf`);
                // Redirigir a la página de historial de la máquina (Redirect to the machine's history page)
                window.location.href="/history/"+machineId;
            })
            .catch(error => {
                console.error("Error detallado:", error); // Detailed error
                alert('Error al generar el PDF: ' + error.message); // Show error message
            });
        });
    } //else {
        //console.error("No se encontró el botón de descarga PDF"); // PDF download button not found
    //} // Fin de la verificación del botón (End of button check)
});
