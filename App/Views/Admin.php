<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador Tot Maquina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-[#C1D1D8]">

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
            <a href="/admin" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
            <?php if ($_SESSION['user']['role'] == 'admin'): ?>
                <a href="#" class="bg-[#214969] hover:bg-[#478249] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
                    Admin panel
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
          <a href="#" class="block px-3 py-2 bg-[#214969] text-white hover:bg-[#478249] rounded-md transition-colors duration-300">
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


  <div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold text-[#214969] mb-8">Panel de Administración</h1>
    
    <!-- Tarjetas de Gestión -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      
      <!-- Sección Usuarios -->
      <div class="space-y-6">
        <!-- Tarjeta de botones -->
        <div class="bg-[#214969] rounded-lg shadow-xl hover:shadow-2xl transition-all p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-[#5DA6C3]">Gestión Usuarios</h3>
            <div class="bg-[#5DA6C3]/10 p-3 rounded-full">
              <i class="fas fa-users text-[#5DA6C3] text-xl"></i>
            </div>
          </div>
          <button onclick="window.location.href='/admin/adduser'" 
                  class="w-full bg-[#478249] text-white py-2 rounded-lg hover:bg-[#054525] transition-all">
            Añadir Usuario
          </button>
        </div>
        
        <!-- Lista de Usuarios -->
        <div class="bg-[#132048] rounded-lg p-4 shadow-lg">
            <h4 class="text-[#5DA6C3] font-semibold mb-3">Usuarios Recientes</h4>
            <div class="space-y-2 text-white">
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <div class="flex items-center justify-between p-2 hover:bg-[#214969] rounded transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-full bg-[#214969] flex items-center justify-center">
                                    <i class="fas fa-user text-[#5DA6C3]"></i>
                                </div>
                                <div>
                                    <span class="font-medium"><?= htmlspecialchars($user['name'] . ' ' . $user['surname']) ?></span>
                                    <span class="text-sm text-[#5DA6C3] block"><?= htmlspecialchars($user['role']) ?></span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <button onclick="window.location.href='/editprofile'" 
                                        class="text-yellow-400 hover:text-yellow-300 transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="if(confirm('¿Estás seguro de que deseas eliminar este usuario?')) window.location.href='/admin/deleteUser/<?= $user['id'] ?>'" 
                                        class="text-red-400 hover:text-red-300 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-white">No hay usuarios disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
      </div>

      <!-- Sección Máquinas -->
      <div class="space-y-6">
        <!-- Tarjeta de botones -->
        <div class="bg-[#214969] rounded-lg shadow-xl hover:shadow-2xl transition-all p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-[#5DA6C3]">Gestión Máquinas</h3>
            <div class="bg-[#5DA6C3]/10 p-3 rounded-full">
              <i class="fas fa-desktop text-[#5DA6C3] text-xl"></i>
            </div>
          </div>
          <div class="space-y-3">
            <button class="w-full bg-[#478249] text-white py-2 rounded-lg hover:bg-[#054525] transition-all" onclick="window.location.href='/admin/addmachine'">
              Añadir Máquina
            </button>
          </div>
        </div>

        <!-- Lista de Máquinas -->
        <div class="bg-[#132048] rounded-lg p-4 shadow-lg">
            <h4 class="text-[#5DA6C3] font-semibold mb-3">Máquinas Recientes</h4>
            <div class="space-y-2 text-white">
                <?php if (!empty($machines)): ?>
                    <?php foreach ($machines as $machine): ?>
                        <div class="flex items-center justify-between p-2 hover:bg-[#214969] rounded transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-full bg-[#214969] flex items-center justify-center">
                                    <i class="fas fa-desktop text-[#5DA6C3]"></i>
                                </div>
                                <div>
                                    <span class="font-medium"><?= htmlspecialchars($machine['model']) ?></span>
                                    <span class="text-sm text-green-400 block">SN: <?= htmlspecialchars($machine['serial_number']) ?></span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <button onclick="window.location.href='/admin/editMachine/<?= $machine['machine_id'] ?>'" 
                                        class="text-yellow-400 hover:text-yellow-300 transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="if(confirm('¿Estás seguro de que deseas eliminar esta máquina?')) window.location.href='/admin/deleteMachine/<?= $machine['machine_id'] ?>'" 
                                        class="text-red-400 hover:text-red-300 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-white">No hay máquinas disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
      </div>

      <!-- Sección Incidencias -->
      <div class="space-y-6">
        <!-- Tarjeta de botones -->
        <div class="bg-[#214969] rounded-lg shadow-xl hover:shadow-2xl transition-all p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-[#5DA6C3]">Gestión Incidencias</h3>
            <div class="bg-[#5DA6C3]/10 p-3 rounded-full">
              <i class="fas fa-exclamation-circle text-[#5DA6C3] text-xl"></i>
            </div>
          </div>
          <div class="space-y-3">
            <button class="w-full bg-[#478249] text-white py-2 rounded-lg hover:bg-[#054525] transition-all">
              Nueva Incidencia
            </button>
          </div>
        </div>

        <!-- Lista de Incidencias -->
        <div class="bg-[#132048] rounded-lg p-4 shadow-lg">
            <h4 class="text-[#5DA6C3] font-semibold mb-3">Incidencias Recientes</h4>
            <div class="space-y-2 text-white">
                <div class="flex items-center justify-between p-2 hover:bg-[#214969] rounded transition-colors">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 rounded-full bg-[#214969] flex items-center justify-center">
                            <i class="fas fa-exclamation-circle text-[#5DA6C3]"></i>
                        </div>
                        <div>
                            <span class="font-medium">Error Sistema</span>
                            <span class="text-sm text-red-400 block">Urgente</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button onclick="window.location.href='/admin/editIncidence/1'" 
                                class="text-yellow-400 hover:text-yellow-300 transition-colors">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="if(confirm('¿Estás seguro de que deseas eliminar esta incidencia?')) window.location.href='/admin/deleteIncidence/1'" 
                                class="text-red-400 hover:text-red-300 transition-colors">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<script src="/js/nav.js"></script>
</body>
</html>
  