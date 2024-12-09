
    document.getElementById("searchMachine").addEventListener("input", function() {
        const query = this.value.trim();

        if (query.length > 0) {
            fetch(`/search-machines?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    const grid = document.querySelector(".grid");
                    grid.innerHTML = ""; // Limpiar resultados anteriores

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
                                </div>
                            </div>
                        `;
                        grid.innerHTML += card;+-
                    });
                })
                .catch(error => console.error("Error:", error));
        } else {
            // Si no hay texto, limpiar el grid
            document.querySelector(".grid").innerHTML = "";
        }
    });

