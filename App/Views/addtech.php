<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Metadatos básicos y configuración de la página (Basic metadata and page setup) -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Máquinas y Técnicos (Machine and Technician List)</title>
    <!-- Recursos externos: Tailwind CSS y Font Awesome (External resources: Tailwind CSS and Font Awesome) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-[#C1D1D8] text-gray-800">
    <!-- Cabecera y Navegación (Header and Navigation) -->
    <header class="bg-[#0C0C04] text-white">
        <!-- Barra de navegación principal (Main navigation bar) -->
        <nav class="container mx-auto px-6">
            <!-- Contenedor de navegación flexible (Flexible navigation container) -->
            <div class="flex items-center justify-between h-20">
                <!-- Logo y nombre de la empresa (Logo and company name) -->
                <div class="flex items-center space-x-4">
                    <img src="/uploads/logototmaquina.png"" alt="Logo" class="h-20 transition-transform hover:scale-105">
                    <span class="text-xl font-bold text-[#5DA6C3]">Tot Maquina</span>
                </div>
                
                <!-- Enlaces de navegación para escritorio (Desktop navigation links) -->
                <div class="hidden md:block">
                    <div class="flex items-center space-x-8">
                        <a href="/" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-house"></i> Inicio
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                        </a>
                        <a href="/addlist" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-desktop"></i> Máquinas
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
                          <a href="/login" class="bg-[#165f7c] hover:bg-[#478249] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl" role="button" aria-label="Iniciar Sesión">
                            <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                          </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Botón de menú móvil (Mobile menu button) -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" type="button" 
                            class="text-gray-300 hover:text-white focus:outline-none focus:text-white"
                            aria-label="Abrir menú"
                            aria-expanded="false"
                            aria-controls="mobile-menu">

                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menú móvil desplegable (Mobile dropdown menu) -->
            <div id="mobile-menu" class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
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
                                Admin panel
                            </a>
                        <?php endif; ?>
                        <a href="/logout" class="block px-3 py-2 bg-[#d32f2f] text-white hover:bg-[#b71c1c] rounded-md transition-colors duration-300">
                            <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                        </a>
                    <?php else: ?>
                        <a href="/login" class="block px-3 py-2 bg-[#165f7c] text-white hover:bg-[#478249] rounded-md transition-colors duration-300" role="button" aria-label="Iniciar Sesión">
                            <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenido Principal (Main Content) -->
    <main class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Lista de Máquinas (Machine List) -->
            <div class="bg-[#214969] rounded-xl shadow-xl p-6">
                <!-- Título de la sección de máquinas (Machine section title) -->
                <h2 class="text-2xl font-bold text-[#5DA6C3] mb-6 flex items-center">
                    <i class="fas fa-desktop mr-3"></i>
                    Lista de Máquinas (Machine List)
                </h2>

                <!-- Contenedor de lista de máquinas (Machine list container) -->
                <div class="space-y-4">
                    <?php if (isset($machines) && !empty($machines)): ?>
                        <!-- Iteración sobre cada máquina (Iteration over each machine) -->
                        <?php foreach ($machines as $machine): ?>
                            <!-- Tarjeta de máquina individual (Individual machine card) -->
                            <div class="bg-[#132048] rounded-lg p-4 hover:bg-[#1a3850] transition-colors">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-[#5DA6C3] rounded-full flex items-center justify-center">
                                            <i class="fas fa-desktop text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-white font-medium"><?= ($machine['model']) ?></h3>
                                            <p class="text-[#A8C5D6] text-sm">SN: <?= ($machine['serial_number']) ?></p>
                                        </div>
                                    </div>
                                    <div class="bg-[#214969] px-3 py-1 rounded-full droppable" 
                                         data-machine-id="<?= ($machine['machine_id']) ?>"
                                         ondrop="drop(event)" 
                                         ondragover="allowDrop(event)">
                                        <span class="text-[#5DA6C3] text-sm font-medium">
                                            ID Técnico: <?= ($machine['user_id'] ?? 'Sin asignar') ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Mensaje cuando no hay máquinas (Message when no machines are available) -->
                        <p class="text-white">No hay máquinas disponibles. (No machines available.)</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Lista de Técnicos (Technician List) -->
            <div class="bg-[#214969] rounded-xl shadow-xl p-6">
                <!-- Título de la sección de técnicos (Technician section title) -->
                <h2 class="text-2xl font-bold text-[#5DA6C3] mb-6 flex items-center">
                    <i class="fas fa-users mr-3"></i>
                    Lista de Técnicos (Technician List)
                </h2>

                <!-- Contenedor de lista de técnicos (Technician list container) -->
                <div class="space-y-4">
                    <?php if (isset($technicians) && !empty($technicians)): ?>
                        <!-- Iteración sobre cada técnico (Iteration over each technician) -->
                        <?php foreach ($technicians as $technician): ?>
                            <!-- Tarjeta de técnico individual (Individual technician card) -->
                            <div class="bg-[#132048] rounded-lg p-4 hover:bg-[#1a3850] transition-colors">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-[#5DA6C3] rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-white font-medium"><?= ($technician['username']) ?></h3>
                                            <p class="text-[#A8C5D6] text-sm"><?= ($technician['name'] . ' ' . $technician['surname']) ?></p>
                                        </div>
                                    </div>
                                    <div class="bg-[#214969] px-3 py-1 rounded-full draggable" 
                                         draggable="true"
                                         ondragstart="drag(event)"
                                         data-technician-id="<?= ($technician['user_id']) ?>">
                                        <span class="text-[#5DA6C3] text-sm font-medium">
                                            ID: <?= ($technician['user_id']) ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Mensaje cuando no hay técnicos (Message when no technicians are available) -->
                        <p class="text-white">No hay técnicos disponibles. (No technicians available.)</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="/js/bundle.js"></script>
</body>
</html>