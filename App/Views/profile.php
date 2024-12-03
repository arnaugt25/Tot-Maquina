<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Tot Maquina</title>
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-[#C1D1D8] min-h-screen">
  <!-- Header y Nav mejorados -->
  <header class="bg-[#0C0C04] text-white">
    <!-- Barra de navegación principal -->
    <nav class="container mx-auto px-6">
      <div class="flex items-center justify-between h-20">
        <!-- Logo y nombre -->
        <div class="flex items-center space-x-4">
          <img src="/uploads/images/logototmaquina.png" alt="Logo" class="h-20 transition-transform hover:scale-105">
          <span class="text-xl font-bold text-[#5DA6C3]">Tot Maquina</span>
        </div>

        <!-- Enlaces de navegación -->
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
        <!-- Botón menú móvil -->
        <div class="md:hidden">
          <button type="button" class="text-gray-300 hover:text-white focus:outline-none focus:text-white">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
          </button>
        </div>
      </div>

      <!-- Menú móvil -->
      <div class="hidden md:hidden">
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

    <!-- Contenido Principal -->
    <main class="container mx-auto px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Cabecera del Perfil -->
            <div class="bg-[#214969] rounded-xl shadow-lg p-8 mb-8">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <div class="w-32 h-32 rounded-full overflow-hidden bg-[#132048] flex items-center justify-center">
                            <?php if (!empty($user['profile_pic'])): ?>
                                <img src="/uploads/images/<?= ($user['profile_pic']) ?>" 
                                     alt="Foto de perfil" 
                                     class="w-full h-full object-cover">
                            <?php else: ?>
                                <i class="fas fa-user-circle text-6xl text-[#5DA6C3]"></i>
                            <?php endif; ?>
                        </div>
                        <a href="/editprofile" class="absolute bottom-0 right-0 bg-[#478249] p-2 rounded-full text-white hover:bg-[#2D3F58] transition-colors">
                            <i class="fas fa-camera"></i>
                        </a>
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

            <!-- Información del Perfil -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Información Personal -->
                <div class="bg-[#214969] rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-[#C1D1D8] mb-6">Información Personal</h2>
                    <div class="space-y-4">
                        <!-- Email -->
                        <div class="flex items-center space-x-4 text-[#C1D1D8]">
                            <i class="fas fa-envelope w-6"></i>
                            <div class="flex flex-col">
                                <span class="text-sm text-[#577788]">Correo Electrónico</span>
                                <span class="text-[#C1D1D8]"><?= $user['email'] ?? 'No disponible' ?></span>
                            </div>
                        </div>
                        
                        <!-- Nombre Completo -->
                        <div class="flex items-center space-x-4 text-[#C1D1D8]">
                            <i class="fas fa-user w-6"></i>
                            <div class="flex flex-col">
                                <span class="text-sm text-[#577788]">Nombre Completo</span>
                                <span class="text-[#C1D1D8]"><?= ($user['name'] ?? '') . ' ' . ($user['surname'] ?? '') ?></span>
                            </div>
                        </div>

                        <!-- Nombre de Usuario -->
                        <div class="flex items-center space-x-4 text-[#C1D1D8]">
                            <i class="fas fa-user-tag w-6"></i>
                            <div class="flex flex-col">
                                <span class="text-sm text-[#577788]">Nombre de Usuario</span>
                                <span class="text-[#C1D1D8]"><?= $user['username'] ?? 'No disponible' ?></span>
                            </div>
                        </div>

                        <!-- Rol -->
                        <div class="flex items-center space-x-4 text-[#C1D1D8]">
                            <i class="fas fa-user-shield w-6"></i>
                            <div class="flex flex-col">
                                <span class="text-sm text-[#577788]">Rol</span>
                                <span class="text-[#C1D1D8]"><?= $user['role'] ?? 'No disponible' ?></span>
                            </div>
                        </div>

                        
                    </div>
                </div>

                <!-- Estadísticas Mejoradas -->
                <div class="bg-[#214969] rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-[#C1D1D8] mb-8">Estadísticas</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <!-- Máquinas Asignadas -->
                        <div class="bg-[#132048] p-8 rounded-xl text-center hover:bg-[#1A2B3C] transition-colors duration-300 transform hover:scale-105">
                            <div class="flex flex-col items-center justify-center h-full">
                                <i class="fas fa-desktop text-4xl text-[#5DA6C3] mb-4"></i>
                                <div class="text-lg text-[#577788] mb-3">Máquinas Asignadas</div>
                                <div class="text-3xl font-bold text-[#C1D1D8]"><?= $user['machines_count'] ?? '0' ?></div>
                            </div>
                        </div>

                        <!-- Mantenimientos Realizados -->
                        <div class="bg-[#132048] p-8 rounded-xl text-center hover:bg-[#1A2B3C] transition-colors duration-300 transform hover:scale-105">
                            <div class="flex flex-col items-center justify-center h-full">
                                <i class="fas fa-tools text-4xl text-[#5DA6C3] mb-4"></i>
                                <div class="text-lg text-[#577788] mb-3">Mantenimientos Realizados</div>
                                <div class="text-3xl font-bold text-[#C1D1D8]"><?= $user['maintenance_count'] ?? '0' ?></div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="/js/nav.js"></script>
</html>
