function guardarInformacion() {
    // Obtener el estado del botón
    const estado = document.getElementById("estado");

    // Verificar si el valor actual es "Hecho" o "No hecho"
    if (estado.innerText === "No hecho") {
        estado.innerText = "Hecho";
        alert("¡Información guardada como Hecho!");
    } else {
        estado.innerText = "No hecho";
        alert("¡Información guardada como No hecho!");
    }
}