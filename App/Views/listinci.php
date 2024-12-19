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
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-20">
                <!-- Logo y nombre -->
                <div class="flex items-center">
                    <img src="/uploads/logototmaquina.png" alt="Logo" class="h-16 sm:h-20 transition-transform hover:scale-105">
                    <span class="text-lg sm:text-xl font-bold text-[#5DA6C3] ml-2 sm:ml-4">Tot Maquina</span>
                </div>

                <!-- Enlaces de navegación para desktop -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="/" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-house"></i> Inicio
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                    </a>
                    <a href="/addlist" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-desktop"></i> Maquinas
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                    </a>
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="/profile" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-address-card"></i> Perfil
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                        </a>
                        <?php if ($_SESSION['user']['role'] == 'admin'): ?>
                            <a href="/admin" class="bg-[#214969] hover:bg-[#478249] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
                                <i class="fas fa-cog mr-2"></i>Admin panel
                            </a>
                        <?php endif; ?>

                        <a href="/logout" class="bg-[#d32f2f] hover:bg-[#b71c1c] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                        </a>
                    <?php else: ?>
                        <a href="/login" class="bg-[#5DA6C3] hover:bg-[#478249] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Botón menú móvil -->
                <div class="lg:hidden">
                    <button id="mobile-menu-button" 
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-[#214969] focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-expanded="false">
                        <span class="sr-only">Abrir menú principal</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menú móvil mejorado -->
            <div id="mobile-menu" class="lg:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="/" class="block px-3 py-2 text-[#C1D1D8] hover:text-white hover:bg-[#214969] rounded-md transition-colors duration-300">
                        <i class="fa-solid fa-house"></i> Inicio
                    </a>
                    <a href="/addlist" class="block px-3 py-2 text-[#C1D1D8] hover:text-white hover:bg-[#214969] rounded-md transition-colors duration-300">
                        <i class="fa-solid fa-desktop"></i> Máquinas
                    </a>
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="/profile" class="block px-3 py-2 text-[#C1D1D8] hover:text-white hover:bg-[#214969] rounded-md transition-colors duration-300">
                            <i class="fa-solid fa-address-card"></i> Perfil
                        </a>
                        <?php if ($_SESSION['user']['role'] == 'admin'): ?>
                            <a href="/admin" class="block px-3 py-2 bg-[#214969] text-white hover:bg-[#478249] rounded-md transition-colors duration-300">
                                <i class="fas fa-cog mr-2"></i>Admin panel
                            </a>
                        <?php endif; ?>
                        <a href="/logout" class="block px-3 py-2 bg-[#d32f2f] text-white hover:bg-[#b71c1c] rounded-md transition-colors duration-300">
                            <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                        </a>
                    <?php else: ?>
                        <a href="/login" class="block px-3 py-2 bg-[#5DA6C3] text-white hover:bg-[#478249] rounded-md transition-colors duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                        </a>
                    <?php endif; ?>
                </div>
            </div>
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
                <div class="bg-[#132048] p-4 sm:p-6 rounded-lg shadow-lg mb-6">
                    <div class="flex flex-col space-y-4 lg:space-y-0 lg:flex-row lg:items-center lg:space-x-4">
                        <div class="flex-1">
                            <input type="text" 
                                placeholder="Buscar incidencia..." 
                                class="w-full px-4 py-2 border rounded-lg bg-[#214969] text-white border-[#577788] focus:outline-none focus:ring-2 focus:ring-[#5DA6C3]">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <select class="px-4 py-2 border rounded-lg bg-[#214969] text-white border-[#577788] focus:outline-none focus:ring-2 focus:ring-[#5DA6C3]">
                                <option value="" selected>Seleccionar prioridad</option>
                                <option value="baja">Baja</option>
                                <option value="media">Media</option>
                                <option value="urgente">Urgente</option>
                            </select>
                            <select class="px-4 py-2 border rounded-lg bg-[#214969] text-white border-[#577788] focus:outline-none focus:ring-2 focus:ring-[#5DA6C3]">
                                <option value="" selected>Seleccionar tipo</option>
                                <option value="preventivo">Preventivo</option>
                                <option value="correctivo">Correctivo</option>
                            </select>
                            <select class="px-4 py-2 border rounded-lg bg-[#214969] text-white border-[#577788] focus:outline-none focus:ring-2 focus:ring-[#5DA6C3]">
                                <option value="" selected>Selecionar Verificacion</option>
                                <option value="preventivo">Verificado</option>
                                <option value="correctivo">No verificado</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tabla -->
                <div class="overflow-x-auto relative">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow-lg rounded-lg">
                            <table class="min-w-full divide-y divide-[#214969]">
                                <thead class="bg-[#0C0C04]">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                                            Nº Incidencia
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                                            ID Máquina
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                                            Descripción
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                                            Técnico
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                                            Prioridad
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                                            Tipo
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                                            Acciones
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider text-center pl-2">
                                        Verificado
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
                                                <?= htmlspecialchars($maintenance["machine_id"]) ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                <?= htmlspecialchars($maintenance["description"]) ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                <?= htmlspecialchars($maintenance["user_id"]) ?>
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
                                            <td class="px-6 py-4 whitespace-nowrap">
                                               <span class="px-4 inline-flex text-lg leading-6 font-semibold rounded-full text-white">
                                                    <input type="checkbox">
                                                </span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Paginación -->
                <div class="mt-6 bg-[#132048] px-4 sm:px-6 py-4 rounded-lg shadow-lg">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                        <p class="text-white text-sm sm:text-base">
                            Mostrando <span class="font-medium">1</span> a <span class="font-medium">10</span> de <span class="font-medium">20</span> resultados
                        </p>
                        <div class="flex space-x-2">
                            <button class="bg-[#214969] hover:bg-[#2C5F88] text-white px-3 sm:px-4 py-2 rounded-lg transition-colors duration-300 text-sm sm:text-base">
                                Anterior
                            </button>
                            <button class="bg-[#214969] hover:bg-[#2C5F88] text-white px-3 sm:px-4 py-2 rounded-lg transition-colors duration-300 text-sm sm:text-base">
                                Siguiente
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="/js/bundle.js"></script>
</body>
</html>