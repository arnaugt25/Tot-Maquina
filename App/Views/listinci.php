<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Incidencias - Tot Maquina</title>
    <meta name="description" content="Listado de incidencias registradas en el sistema Tot Maquina">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0C0C04] text-[#FFFFFF]">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl md:text-3xl font-bold text-[#FFFFFF] mb-6 text-center bg-[#0C0C04] py-4 rounded-lg">Lista de Incidencias</h1>

        <!-- Filtros y Búsqueda -->
        <div class="bg-[#2C2C2C] p-4 rounded-lg shadow mb-6">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" 
                           placeholder="Buscar incidencia..." 
                           class="w-full px-4 py-2 border rounded-lg bg-[#1B4B5F] text-[#FFFFFF]"
                           aria-label="Buscar incidencia">
                </div>
                <div class="flex flex-wrap gap-2">
                    <select class="px-4 py-2 border rounded-lg bg-[#1B4B5F] text-[#FFFFFF]" aria-label="Filtrar por prioridad">
                        <optgroup label="Nivel de prioridad">
                            <option value="" selected>Seleccionar prioridad</option>
                            <option value="baja">Baja</option>
                            <option value="media">Media</option>
                            <option value="urgente">Urgente</option>
                        </optgroup>
                    </select>
                    <select class="px-4 py-2 border rounded-lg bg-[#1B4B5F] text-[#FFFFFF]" aria-label="Filtrar por tipo">
                        <optgroup label="tipo de incidencia">
                            <option value="" selected>Seleccionar tipo</option>
                            <option value="preventivo">Preventivo</option>
                            <option value="correctivo">Correctivo</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tabla de Incidencias -->
        <div class="overflow-x-auto bg-[#1B4B5F] rounded-lg shadow">
            <table class="min-w-full text-center" aria-label="Lista de incidencias">
                <caption class="px-4 py-2 bg-[#2C2C2C] text-[#FFFFFF] text-center">
                    <span class="absolute w-1 h-1 p-0 -m-1 overflow-hidden clip-path-[inset(50%)] whitespace-nowrap border-0 bg-[#2C2C2C] text-[#FFFFFF]">
                        Listado de incidencias registradas en el sistema
                    </span>
                </caption>
                <thead class="bg-[#2C2C2C]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-center text-[#FFFFFF] uppercase tracking-wider">
                            Nº Incidencia
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-center text-[#FFFFFF] uppercase tracking-wider">
                            ID Máquina
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-center text-[#FFFFFF] uppercase tracking-wider">
                            Descripción
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-center text-[#FFFFFF] uppercase tracking-wider">
                            Técnico
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-center text-[#FFFFFF] uppercase tracking-wider">
                            Fecha
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-center text-[#FFFFFF] uppercase tracking-wider">
                            Prioridad
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-center text-[#FFFFFF] uppercase tracking-wider">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-center text-[#FFFFFF] uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-[#0A2A3A] divide-y divide-gray-700">
                    <!-- Ejemplo de una fila -->
                    <?php foreach ($maintenances as $maintenance){
                       ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-[#FFFFFF]">
                                <?= htmlspecialchars($maintenance["maintenance_id"]) ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-center text-[#FFFFFF]">
                                <?= htmlspecialchars($maintenance["machine_name"]) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-[#FFFFFF]">
                                <?= htmlspecialchars($maintenance["description"]) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-[#FFFFFF]">
                                <?= htmlspecialchars($maintenance["technician_name"]) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-[#FFFFFF]">
                                 <?= htmlspecialchars($maintenance["assigned_date"]) ?>
                            </span>
                            </td>
                            <td  class="px-6 py-3 text-xs font-medium text-center text-[#FFFFFF] uppercase tracking-wider">
                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#B60000] text-[#FFFFFF]">
                                 <?= htmlspecialchars($maintenance["priority"]) ?>
                            </span>
                            </td>
                            <td  class="px-6 py-3 text-xs font-medium text-center text-[#FFFFFF] uppercase tracking-wider">
                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#B60000] text-[#FFFFFF]">
                                 <?= htmlspecialchars($maintenance["type"]) ?>
                            </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex justify-center space-x-2">
                                    <button class="text-[#00B4FF] hover:text-[#FFFFFF] bg-[#022232] px-2 py-1 rounded" aria-label="Editar incidencia #001">
                                        <a href="/admin/editinci" >Editar</a>
                                    </button>
                                    <button class="text-[#FFFDFD] hover:text-[#FFFFFF] bg-[#002030] px-2 py-1 rounded" aria-label="Eliminar incidencia #001">
                                        Eliminar
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php }?>

                    <!-- Fin ejemplo de fila -->
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="bg-[#2C2C2C] px-4 py-3 flex items-center justify-between border-t border-gray-700 sm:px-6 mt-4 rounded-lg shadow">
            <div class="flex-1 flex justify-between sm:hidden">
                <button class="relative inline-flex items-center px-4 py-2 border border-gray-700 text-sm font-medium rounded-md text-[#FFFFFF] bg-[#1B4B5F] hover:bg-[#0A2A3A]">
                    Anterior
                </button>
                <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-700 text-sm font-medium rounded-md text-[#FFFFFF] bg-[#1B4B5F] hover:bg-[#0A2A3A]">
                    Siguiente
                </button>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-[#FFFFFF]">
                        Mostrando <span class="font-medium">1</span> a <span class="font-medium">10</span> de <span class="font-medium">20</span> resultados
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Paginación">
                        <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-700 bg-[#1B4B5F] text-sm font-medium text-[#FFFFFF] hover:bg-[#0A2A3A]">
                            Anterior
                        </button>
                        <button class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-[#1B4B5F] text-sm font-medium text-[#FFFFFF] hover:bg-[#0A2A3A]">
                            1
                        </button>
                        <button class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-[#1B4B5F] text-sm font-medium text-[#FFFFFF] hover:bg-[#0A2A3A]">
                            2
                        </button>
                        <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-700 bg-[#1B4B5F] text-sm font-medium text-[#FFFFFF] hover:bg-[#0A2A3A]">
                            Siguiente
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
