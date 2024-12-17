<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Notificaciones - Tot Maquina</title>
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
    <!-- Enlaces de navegación -->
    <div class="hidden md:block">
        <div class="flex items-center space-x-8">
            <a href="/" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
                <i class="fa-solid fa-house"></i> Inicio
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
            </a>
        </div>
    </div>
    <!-- Menú móvil -->
    <div class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 text-[#C1D1D8] hover:text-white hover:bg-[#214969] rounded-md transition-colors duration-300">
                <i class="fa-solid fa-house"></i> Inicio
            </a>
        </div>
    </div>
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
                    Lista de Notificaciones
                </h1>
                <p class="text-[#A8C5D6]">Gestiona todas las notificaciones del sistema</p>
            </div>
            <!-- Tabla -->
            <div class="bg-[#132048] rounded-lg shadow-lg overflow-hidden">
                <table class="min-w-full divide-y divide-[#214969]">
                    <head class="bg-[#0C0C04]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                            Nº Notificación
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                            Nº Incidencia
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                            ID Máquina
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                            Técnico
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                            Frecuencia
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                            Next Mantenimiento
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-[#5DA6C3] uppercase tracking-wider">
                            Estado
                        </th>

                    </tr>


                    </head>
                    <?php foreach ($notifications as $notification) {
                        ?>
                        <tr class="hover:bg-[#2C5F88] transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                <?= htmlspecialchars($notification["notification_id"]) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                <?= htmlspecialchars($notification["maintenance_id"]) ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-white">
                                <?= htmlspecialchars($notification["machine_id"]) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                <?= htmlspecialchars($notification["user_id"]) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-m leading-5 font-semibold rounded-full text-white">
                                    <?= htmlspecialchars($notification["frequency"]) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                <?= htmlspecialchars($notification["next_maintenance"]) ?>
                            </td>

                            <td style="padding: 8px;">
                                <select style="width: 100%; padding: 6px; border-radius: 4px; border: 1px solid #ddd;">
                                    <option value="">Hecho</option>
                                    <option value="">No Hecho</option>
                                </select>
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
</html>
