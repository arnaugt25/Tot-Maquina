<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Incidencias - Tot Maquina</title>
    <meta name="description" content="Listado de incidencias registradas en el sistema Tot Maquina">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-[#C1D1D8] to-[#8FA9B5] min-h-screen">
    <!-- Header con navegación -->
    <header class="bg-[#0C0C04] text-white">
        <nav class="container mx-auto px-6">
            <div class="flex items-center justify-between h-20">
                <!-- Logo y nombre -->
                <div class="flex items-center space-x-4">
                    <img src="/uploads/images/logototmaquina.png" alt="Logo" class="h-20 transition-transform hover:scale-105">
                    <span class="text-xl font-bold text-[#5DA6C3]">Tot Maquina</span>
                </div>
            </div>
        </nav>
        <!-- Navigation Section -->
        <nav class="bg-[#1A1A1A] text-white">
            <ul class="flex space-x-4">
                <li>
                    <a href="/" class="relative group px-3 py-2 text-[#E0E0E0] hover:text-[#FFFFFF] transition-colors duration-300">
                        <i class="fa-solid fa-house"></i> Inicio
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                    </a>
                </li>
                <!-- Add more navigation items as needed -->
            </ul>
        </nav>
    </header>


    <!-- Contenido Principal -->
    <main class="container mx-auto px-6 py-8">
        <div class="max-w-7xl mx-auto">
            <!-- Contenedor principal con gradiente -->
            <div class="bg-gradient-to-br from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8">
                <!-- Cabecera -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-white mb-4 flex items-center">
                        <i class="fas fa-clipboard-list mr-4 text-[#5DA6C3]"></i>
                        Lista de Incidencias
                    </h1>
                    <p class="text-[#A8C5D6]">Gestiona todas las incidencias del sistema</p>
                </div>

                <!-- Filtros y Búsqueda -->
                <div class="bg-[#357e9b] p-6 rounded-lg shadow-lg mb-6">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="relative flex-1">
                            <input type="text" id="searchMaintenance"
                                   aria-label="Buscar incidencia"
                                   class="w-full pl-10 pr-4 py-3 bg-white rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-[#5DA6C3]"
                                   placeholder="Buscar incidencia...">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400 transition-colors duration-300 group-hover:text-[#5DA6C3]"></i>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <label for="prioritySelect" class="sr-only">Seleccionar prioridad</label>
                            <select id="prioritySelect" class="px-4 py-2 border rounded-lg bg-[#357e9b] text-white border-[#577788] focus:outline-none focus:ring-2 focus:ring-[#5DA6C3]">
                                <option value="" selected>Seleccionar prioridad</option>
                                <optgroup label="Prioridades">
                                    <option value="baja">Baja</option>
                                    <option value="media">Media</option>
                                    <option value="urgente">Urgente</option>
                                </optgroup>
                            </select>
                            <label for="typeSelect" class="sr-only">Seleccionar tipo</label>
                            <select id="typeSelect" class="px-4 py-2 border rounded-lg bg-[#357e9b] text-white border-[#577788] focus:outline-none focus:ring-2 focus:ring-[#5DA6C3]">
                                <option value="" selected>Seleccionar tipo</option>
                                <optgroup label="Tipos de Mantenimiento">
                                    <option value="preventivo">Preventivo</option>
                                    <option value="correctivo">Correctivo</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tabla -->
                <div class="bg-[#132048] rounded-lg shadow-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-[#214969]">
                        <caption class="sr-only">Lista de Incidencias</caption>
                        <thead class="bg-[#357e9b]">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">
                                    Nº Incidencia
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">
                                    ID Máquina
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">
                                    Técnico
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">
                                    Fecha
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">
                                    Prioridad
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">
                                    Tipo
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex justify-center space-x-2">
                                            <a href="/admin/editinci/<?= htmlspecialchars($maintenance['maintenance_id']) ?>" 
                                               class="bg-[#5DA6C3] hover:bg-[#478249] text-white px-3 py-1 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
                                                <i class="fas fa-edit mr-1"></i> Editar
                                            </a>
                                            <a href="/maintenances/delete/<?= htmlspecialchars($maintenance['maintenance_id']) ?>"
                                               class="bg-[#d32f2f] hover:bg-[#b71c1c] text-white px-3 py-1 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
                                                <i class="fas fa-trash-alt mr-1"></i> Eliminar
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-6 bg-[#132048] px-6 py-4 rounded-lg shadow-lg">
                    <div class="flex justify-between items-center">
                        <p class="text-white">
                            Mostrando <span class="font-medium">1</span> a <span class="font-medium">10</span> de <span class="font-medium">20</span> resultados
                        </p>
                        <div class="flex space-x-2">
                            <button class="bg-[#214969] hover:bg-[#2C5F88] text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                Anterior
                            </button>
                            <button class="bg-[#214969] hover:bg-[#2C5F88] text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                Siguiente
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
    function confirmDeleteMachine(machine_id, model) {
        if (confirm(`¿Estás seguro que deseas eliminar al usuario ${model}? Esta acción no se puede deshacer.`)) {
            window.location.href = `/delete/${maintenance_id}`;
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</html>