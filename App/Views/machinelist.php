<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista máquinas</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../css/listmachine.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#C1D1D8] text-gray-800">
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
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
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


  <!-- Target -->
  <div class="container mx-auto px-4 py-8 max-w-7xl">
    <!-- Buscador -->
    <div class="mb-8 max-w-2xl mx-auto">
      <div class="relative flex">
        <div class="relative flex-1">
          <input type="text" placeholder="Buscar máquina..." class="w-full px-4 py-2 pl-10 pr-4 rounded-l-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5DA6C3] focus:border-transparent id=" searchMachine">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-search text-gray-400"></i>
          </div>
          <!-- Acordeón de resultados -->
          <div id="searchResults" class="absolute w-full bg-white mt-1 rounded-lg shadow-lg border border-gray-200 hidden z-50">
            <!-- Los resultados se insertarán dinámicamente aquí -->
          </div>
        </div>
        <button class="bg-[#214969] hover:bg-[#5DA6C3] text-white px-6 py-2 rounded-r-lg transition-colors duration-300 flex items-center">
          <span>Buscar</span>
        </button>
      </div>
    </div>
    <!-- Grid de tarjetas -->
    <div class="container mx-auto px-4 py-8 max-w-7xl">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 md:gap-8">
        <?php foreach ($machines as $machine): ?>
          <div class="bg-gradient-to-br from-[#214969] to-[#1a3850] rounded-xl overflow-hidden shadow-xl">
            <!-- Imagen de la máquina -->
            <div class="relative group">
              <img class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
                src=<?= htmlspecialchars($machine['image']) ?> alt="Imagen Máquina">
              <div class="absolute top-0 right-0 bg-gradient-to-r from-[#478249] to-[#3d7040] text-white px-4 py-1.5 m-3 rounded-full text-sm font-medium shadow-lg flex items-center space-x-2">
                <span class="w-2 h-2 bg-green-300 rounded-full animate-pulse"></span>
                <span>Activa</span>
              </div>
            </div>
            <!-- Contenido de la tarjeta -->
            <div class="p-6">
              <h1 class="text-[#5DA6C3] font-bold text-xl mb-3 flex items-center space-x-2">
                <i class="fas fa-desktop text-lg"></i>
                <span><?= htmlspecialchars($machine['model']) ?></span>
              </h1>
              <!-- Detalles de la máquina -->
              <div class="space-y-3 text-[#C1D1D8] mb-6">
                <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                  <i class="fas fa-barcode text-[#5DA6C3]"></i>
                  <span>SN: <?= htmlspecialchars($machine['serial_number']) ?></span>
                </div>
                <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                  <i class="fas fa-calendar text-[#5DA6C3]"></i>
                  <span>Instalada: <?= htmlspecialchars($machine['installation_date']) ?></span>
                </div>
                <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                  <i class="fas fa-tools text-[#5DA6C3]"></i>
                  <span>Fabricante: <?= htmlspecialchars($machine['created_by']) ?></span>
                </div>
              </div>
              <!-- Botones de acción -->
              <div class="flex justify-between items-center pt-2 border-t border-[#2a5475]/30">
                <a href="/maquina_id?machine_id=<?= htmlspecialchars($machine['machine_id']) ?>"
                  class="bg-gradient-to-r from-[#577788] to-[#4a6573] text-white py-2.5 px-5 rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 text-sm font-medium shadow-md hover:shadow-xl flex items-center space-x-2 group">
                  <i class="fas fa-info-circle group-hover:rotate-12 transition-transform"></i>
                  <span>Detalles</span>
                </a>
                <a href="/editmachine?machine_id=<?= htmlspecialchars($machine['machine_id']) ?>"
                  class="bg-gradient-to-r from-[#577788] to-[#4a6573] text-white py-2.5 px-5 rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 text-sm font-medium shadow-md hover:shadow-xl flex items-center space-x-2 group">
                  <i class="fa-solid fa-pen-to-square"></i>
                  <span>Editar</span>
                </a>

                <!-- Eliminar máquina -->
                <button onclick="confirmDeleteMachine(<?= $machine['machine_id'] ?>, '<?= htmlspecialchars($machine['model'], ENT_QUOTES) ?>')"
                  class="bg-gradient-to-r from-[#577788] to-[#4a6573] text-white py-2.5 px-5 rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 text-sm font-medium shadow-md hover:shadow-xl flex items-center space-x-2 group"
                  title="Eliminar máquina">
                  <i class="fas fa-trash"></i>
                  <span>Eliminar</span>
                </button>
                <button
                  class="text-[#5DA6C3] hover:text-white transition-colors duration-300 p-2 hover:bg-[#1a3850]/50 rounded-lg"
                  aria-label="Ver código QR de la máquina"
                  role="button"
                  type="button">
                  <i class="fas fa-qrcode text-2xl hover:scale-110 transition-transform" aria-hidden="true"></i>
                </button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</body>
<script>
  function confirmDeleteMachine(machine_id, model) {
    if (confirm(`¿Estás seguro que deseas eliminar al usuario ${model}? Esta acción no se puede deshacer.`)) {
      window.location.href = `/delete/${machine_id}`;
    }
  }
</script>
<script src="/js/menuButton.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="/js/nav.js"></script>
<script src="/js/search.js"></script>

</html>