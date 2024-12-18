import $ from "jquery";

$(document).ready(function () {
    var identificador = document.getElementById("searchMachine"); // El contenido de "identificador" recoge info del id de la vista 
                                                                 // (The "identificador" content collects info about the view id)
    if (identificador != null) {
        identificador.addEventListener("input", function () {
            const query = this.value.trim();
            const grid = document.querySelector(".grid"); 

            if (query.length > 0) {
                fetch(`/search-machines?query=${encodeURIComponent(query)}`) 
                    .then(response => response.json()) // Respuesta formato json (Response json format)
                    .then(data => {
                        grid.innerHTML = "";

                        if (data.length > 0) { //HTML card con la información de la máquina (HTML card with machine information)
                            data.forEach(machine => {
                                const card = `
                                    <div class="bg-gradient-to-br from-[#214969] to-[#1a3850] rounded-xl overflow-hidden shadow-xl">
                                        <div class="relative group">
                                            <img class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
                                                src="${machine.image}" alt="Imagen Máquina">
                                            <div class="absolute top-0 right-0 bg-gradient-to-r from-[#478249] to-[#3d7040] text-white px-4 py-1.5 m-3 rounded-full text-sm font-medium shadow-lg flex items-center space-x-2">
                                                <span class="w-2 h-2 bg-green-300 rounded-full animate-pulse"></span>
                                                <span>Activa</span>
                                            </div>
                                        </div>
                                        <div class="p-6">
                                            <h1 class="text-[#5DA6C3] font-bold text-xl mb-3 flex items-center space-x-2">
                                                <i class="fas fa-desktop text-lg"></i>
                                                <span>${machine.model}</span>
                                            </h1>
                                            <div class="space-y-3 text-[#C1D1D8] mb-6">
                                                <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                                                    <i class="fas fa-barcode text-[#5DA6C3]"></i>
                                                    <span>SN: ${machine.serial_number}</span>
                                                </div>
                                                <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                                                    <i class="fas fa-calendar text-[#5DA6C3]"></i>
                                                    <span>Instalada: ${machine.installation_date}</span>
                                                </div>
                                                <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                                                    <i class="fas fa-tools text-[#5DA6C3]"></i>
                                                    <span>Fabricante: ${machine.created_by}</span>
                                                </div>
                                            </div>
                                            <div class="flex justify-between items-center pt-2 border-t border-[#2a5475]/30">
                                                <a href="/maquina_id?machine_id=${machine.machine_id}"
                                                    class="bg-gradient-to-r from-[#577788] to-[#4a6573] text-white py-2.5 px-5 rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 text-sm font-medium shadow-md hover:shadow-xl flex items-center space-x-2 group">
                                                    <i class="fas fa-info-circle group-hover:rotate-12 transition-transform"></i>
                                                    <span>Detalles</span>
                                                </a>
                                                <a href="/editmachine?machine_id=${machine.machine_id}"
                                                    class="bg-gradient-to-r from-[#577788] to-[#4a6573] text-white py-2.5 px-5 rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 text-sm font-medium shadow-md hover:shadow-xl flex items-center space-x-2 group">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Editar</span>
                                                </a>
                                                <button onclick="confirmDeleteMachine(${machine.machine_id}, '${machine.model}')"
                                                    class="bg-gradient-to-r from-[#577788] to-[#4a6573] text-white py-2.5 px-5 rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 text-sm font-medium shadow-md hover:shadow-xl flex items-center space-x-2 group">
                                                    <i class="fas fa-trash"></i>
                                                    <span>Eliminar</span>
                                                </button>
                                                <button onclick="showMachineQRCode(${machine.machine_id})"
                                                    class="bg-gradient-to-r from-[#577788] to-[#4a6573] text-white py-2.5 px-5 rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 text-sm font-medium shadow-md hover:shadow-xl flex items-center space-x-2 group">
                                                    <i class="fas fa-qrcode"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                grid.innerHTML += card;
                            });
                        } else { // Mensaje al no encontrar máquina (Message when machine not found)
                            grid.innerHTML = "<p>No se encontraron máquinas</p>";
                        }
                    }) // Error en la búsqueda (Search error)
                    .catch(error => {
                        console.error("Error en la búsqueda:", error);
                        grid.innerHTML = "<p>Error en la búsqueda.</p>";
                    });
            }
        });
    }
});