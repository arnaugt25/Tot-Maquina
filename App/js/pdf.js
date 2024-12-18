import { jsPDF } from "jspdf";
import $ from "jquery";

$(document).ready(function () {
    var downloadButton = document.getElementById("downloadPdf");

    if (downloadButton != null) {
        downloadButton.addEventListener("click", function () {
            const machineId = this.getAttribute('data-machine-id');
            console.log("Generando PDF para máquina:", machineId); // Debug

            if (!machineId) {
                console.error("No se encontró el ID de la máquina");
                alert("Error: No se pudo identificar la máquina");
                return;
            }
            
            fetch(`/pdf/${machineId}`)
            .then(response => {
                if (!response.ok) throw new Error('Error al generar el PDF');
                return response.json();
            })
            .then(data => {
                console.log("Datos recibidos:", data); // Debug
                const doc = new jsPDF();

                // Agregar título
                doc.setFontSize(20);
                doc.text('Historial de la Máquina', 10, 10);

                // Agregar contenido
                let y = 20;
                data.historial.forEach((item, index) => {
                    doc.setFontSize(12);
                    doc.text(`Mantenimiento ${index + 1}`, 10, y);
                    doc.text(`Máquina: ${item.model}`, 10, y + 10);
                    doc.text(`Tipo: ${item.type}`, 10, y + 20);
                    doc.text(`Fecha de Instalación: ${item.installation_date}`, 10, y + 30);
                    doc.text(`Técnico Responsable: ${item.name}`, 10, y + 40);
                    y += 50;
                });

                data.incidencias.forEach((item, index) => {
                    doc.setFontSize(12);
                    doc.text(`Incidencia ${index + 1}`, 10, y);
                    doc.text(`Fecha: ${item.assigned_date}`, 10, y + 10);
                    doc.text(`Descripción: ${item.description}`, 10, y + 20);
                    y += 30;
                });

                // Guardar el archivo PDF
                doc.save(`Historial_maquina_${machineId}.pdf`);
                window.location.href="/history/"+machineId;
            })
            .catch(error => {
                console.error("Error detallado:", error);
                alert('Error al generar el PDF: ' + error.message); // Mostrar el mensaje de error

            });
        });
    } //else {
        //console.error("No se encontró el botón de descarga PDF");
    //}
});
