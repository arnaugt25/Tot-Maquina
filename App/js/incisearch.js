import $ from "jquery";

$(document).ready(function () { //Ejecutar antes html y después js
// Buscador de incidencias
    var identificador = document.getElementById("searchMaintenance");

    if (identificador != null){
        identificador.addEventListener("input", function () {
            const query = this.value.trim();
            const grid = document.querySelector(".grid");

            if (query.length > 0) {
                fetch(`/search-maintenance?query=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        grid.innerHTML = "";

                        // Agregar resultados
                        if (data.length > 0) {
                            //HTML para gregar las incidencias
                            data.forEach(maintenance => {
                                const card = `
                             <tbody class="bg-[#214969] divide-y divide-[#132048]">
                            <?php foreach ($maintenances as $maintenance) { ?>
                                <tr class="hover:bg-[#2C5F88] transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                        <?= htmlspecialchars($maintenance["maintenance_id"]) ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-white">
                                        <?= htmlspecialchars($maintenance["machine_name"]) ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                        <?= htmlspecialchars($maintenance["description"]) ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                        <?= htmlspecialchars($maintenance["technician_name"]) ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                        <?= htmlspecialchars($maintenance["assigned_date"]) ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#478249] text-white">
                                            <?= htmlspecialchars($maintenance["priority"]) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#478249] text-white">
                                            <?= htmlspecialchars($maintenance["type"]) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        `;
                                grid.innerHTML += card; // Añadir la carta

                            });
                        } else {
                            grid.innerHTML = "<p>No se encontraron incidencias</p>";
                        }
                    })
                    .catch(error => {
                        console.error("Error en la búsqueda:", error);
                        grid.innerHTML = "<p>Error en labúsqueda.</p>";
                    });
            } else {
                grid.innerHTML = "";
            }
        });
    }
});
