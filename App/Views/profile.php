<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Tot Maquina</title>
    
    <!-- Favicons / Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-[#C1D1D8] min-h-screen">
    <!-- Improved header and Nav / Header y Nav mejorados -->
    <header class="bg-[#0C0C04] text-white">
        <!-- Main navigation bar / Barra de navegación principal -->
        <nav class="container mx-auto px-6">
            <div class="flex items-center justify-between h-20">
                <!-- Logo and name / Logo y nombre -->
                <div class="flex items-center space-x-4">
                    <img src="/uploads/logototmaquina.png"" alt="Logo" class="h-20 transition-transform hover:scale-105">
                    <span class="text-xl font-bold text-[#5DA6C3]">Tot Maquina</span>
                </div>

                <!-- Navigation links / Enlaces de navegación -->
                <div class="hidden md:block">
                    <div class="flex items-center space-x-8">
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
                </div>
                
                <!-- Mobile menu button / Botón menú móvil -->
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

            <!-- Mobile menu / Menú móvil -->
            <div id="mobile-menu" class="hidden md:hidden transition-all duration-300 ease-in-out">
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
                        <a href="/login" class="block px-3 py-2 bg-[#5DA6C3] text-white hover:bg-[#478249] rounded-md transition-colors duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main content / Contenido Principal -->
    <main class="container mx-auto px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Profile header / Cabecera del Perfil -->
            <div class="bg-[#214969] rounded-xl shadow-lg p-8 mb-8">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <div class="w-32 h-32 rounded-full overflow-hidden bg-[#132048] flex items-center justify-center">
                            <?php if (!empty($user['profile_pic'])): ?>
                                <img src="/uploads/images/<?= ($user['profile_pic']) ?>" 
                                     alt="Foto de perfil" 
                                     class="w-full h-full object-cover profile-image">
                            <?php else: ?>
                                <i class="fas fa-user-circle text-6xl text-[#5DA6C3]"></i>
                            <?php endif; ?>
                        </div>
                        <button 
                            id="camera-button" 
                            class="absolute bottom-0 right-0 bg-[#478249] p-2 rounded-full text-white hover:bg-[#2D3F58] transition-colors"
                            aria-label="Activar cámara"
                            type="button">
                            <i class="fas fa-camera"></i>
                        </button>
                    </div>
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-[#C1D1D8] mb-2">
                            <?= ($user['name'] . ' ' . ($user['surname'] ?? '')) ?>
                        </h1>
                        <p class="text-[#577788]"><?= ($user['role'] ?? 'Usuario') ?></p>
                    </div>
                    <button class="bg-[#478249] text-white px-6 py-3 rounded-lg hover:bg-[#2D3F58] transition-colors" onclick="window.location.href='/editprofile'">
                        <i class="fas fa-edit mr-2"></i>Editar Perfil
                    </button>
                </div>
            </div>

            <!-- Camera modal / Modal de la Cámara -->
            <div id="camera-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
                <div class="bg-[#214969] max-w-lg mx-auto mt-20 rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-white">Tomar Foto</h3>
                        <button id="close-modal" class="text-white hover:text-[#5DA6C3]">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="relative">
                        <video id="camera-feed" autoplay playsinline class="w-full rounded-lg"></video>
                        <canvas id="canvas" class="hidden"></canvas>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button id="capture-button" class="bg-[#478249] text-white px-6 py-3 rounded-lg hover:bg-[#2D3F58] transition-colors">
                            <i class="fas fa-camera mr-2"></i>Capturar Foto
                        </button>
                    </div>
                </div>
            </div>

            <!-- Profile information / Información del Perfil -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Personal information / Información Personal -->
                <div class="bg-[#214969] rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-[#C1D1D8] mb-6">Información Personal</h2>
                    <div class="space-y-4">
                        <!-- Email / Correo electrónico -->
                        <div class="flex items-center space-x-4 text-[#C1D1D8]">
                            <i class="fas fa-envelope w-6"></i>
                            <div class="flex flex-col">
                                <span class="text-sm text-[#577788]">Correo Electrónico</span>
                                <span class="text-[#C1D1D8]"><?= $user['email'] ?? 'No disponible' ?></span>
                            </div>
                        </div>
                        
                        <!-- Full name / Nombre Completo -->
                        <div class="flex items-center space-x-4 text-[#C1D1D8]">
                            <i class="fas fa-user w-6"></i>
                            <div class="flex flex-col">
                                <span class="text-sm text-[#577788]">Nombre Completo</span>
                                <span class="text-[#C1D1D8]"><?= ($user['name'] ?? '') . ' ' . ($user['surname'] ?? '') ?></span>
                            </div>
                        </div>

                        <!-- Username / Nombre de Usuario -->
                        <div class="flex items-center space-x-4 text-[#C1D1D8]">
                            <i class="fas fa-user-tag w-6"></i>
                            <div class="flex flex-col">
                                <span class="text-sm text-[#577788]">Nombre de Usuario</span>
                                <span class="text-[#C1D1D8]"><?= $user['username'] ?? 'No disponible' ?></span>
                            </div>
                        </div>

                        <!-- Role / Rol -->
                        <div class="flex items-center space-x-4 text-[#C1D1D8]">
                            <i class="fas fa-user-shield w-6"></i>
                            <div class="flex flex-col">
                                <span class="text-sm text-[#577788]">Rol</span>
                                <span class="text-[#C1D1D8]"><?= $user['role'] ?? 'No disponible' ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Improved statistics / Estadísticas Mejoradas -->
                <div class="bg-[#214969] rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-[#C1D1D8] mb-8">Estadísticas</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <!-- Assigned machines / Máquinas Asignadas -->
                        <div class="bg-[#132048] p-8 rounded-xl text-center hover:bg-[#1A2B3C] transition-colors duration-300 transform hover:scale-105">
                            <div class="flex flex-col items-center justify-center h-full">
                                <i class="fas fa-desktop text-4xl text-[#5DA6C3] mb-4"></i>
                                <div class="text-lg text-[#577788] mb-3">Máquinas Asignadas</div>
                                <div class="text-3xl font-bold text-[#C1D1D8]"><?= $machineCount ?? '0' ?></div>
                            </div>
                        </div>

                        <!-- Maintenance performed / Mantenimientos Realizados -->
                        <div class="bg-[#132048] p-8 rounded-xl text-center hover:bg-[#1A2B3C] transition-colors duration-300 transform hover:scale-105">
                            <div class="flex flex-col items-center justify-center h-full">
                                <i class="fas fa-tools text-4xl text-[#5DA6C3] mb-4"></i>
                                <div class="text-lg text-[#577788] mb-3">Mantenimientos Realizados</div>
                                <div class="text-3xl font-bold text-[#C1D1D8]"><?= $user['maintenance_count'] ?? '0' ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notifications / Notificaciones -->
                <div class="md:col-span-2 bg-[#214969] rounded-xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-[#C1D1D8] mb-6 flex items-center">
        <i class="fas fa-bell mr-3"></i>
        Notificaciones
    </h2>
    
    <table class="min-w-full">
        <thead>
            <tr class="bg-[#132048] text-[#C1D1D8]">
                <th class="px-6 py-4">ID Notificación</th>
                <th class="px-6 py-4">ID Mantenimiento</th>
                <th class="px-6 py-4">Modelo</th>
                <th class="px-6 py-4">Usuario</th>
                <th class="px-6 py-4">Frecuencia</th>
                <th class="px-6 py-4">Próximo Mantenimiento</th>
            </tr>
            </thead>
                <tbody>
                 <?php foreach($notifications as $notification):?>
                        <tr class="hover:bg-[#2C5F88] transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                <?= htmlspecialchars($notification["notification_id"]) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                <?= htmlspecialchars($notification["maintenance_id"]) ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-white">
                                <?= htmlspecialchars($notification["model"]) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                <?= htmlspecialchars($notification["username"]) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-m leading-5 font-semibold rounded-full text-white">
                                    <?= htmlspecialchars($notification["frequency"]) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                <?= htmlspecialchars($notification["next_maintenance"]) ?>
                            </td>
                            <?php endforeach; ?>
                        </tr
                     </tr>
                 </tbody>
                 </thead>
            
        </div>
    </main>
</body>
<script src="/js/bundle.js"></script>
</html>
