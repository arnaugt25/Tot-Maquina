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
              <a href="/logout" class="bg-[#b30f0f] hover:bg-[#8b0000] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
                <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
              </a>
            <?php else: ?>
              <a href="/login" 
                 class="bg-[#165f7c] hover:bg-[#478249] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl"
                 role="button"
                 aria-label="Iniciar Sesión">
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
                <i class="fas fa-cog mr-2"></i>Admin panel
              </a>
            <?php endif; ?>
            <a href="/logout" class="block px-3 py-2 bg-[#b30f0f] text-white hover:bg-[#8b0000] rounded-md transition-colors duration-300">
              <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
            </a>
          <?php else: ?>
            <a href="/login" 
               class="bg-[#165f7c] hover:bg-[#478249] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl"
               role="button"
               aria-label="Iniciar Sesión">
              <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
            </a>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </header>
  <!-- Target -->
  <div class="container mx-auto px-4 py-8 max-w-7xl">
      <!-- Search and import button / Buscador y botón de importación -->
    <div class="mb-8 max-w-4xl mx-auto">
        <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4">
            <!-- Search / Buscador -->
            <div class="relative flex-1">
                <label for="searchMachine" class="sr-only">Buscar máquina</label>
                <input type="text" id="searchMachine" name="searchMachine" 
                    class="w-full pl-12 pr-6 py-3 md:py-4 bg-white rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-[#5DA6C3] text-base md:text-lg"
                    placeholder="Buscar máquina..." aria-label="Buscar máquina">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400 transition-colors duration-300 group-hover:text-[#5DA6C3] text-lg md:text-xl"></i>
                </div>
            </div>
            <!-- Group of buttons / Grupo de botones -->
            <div class="flex flex-wrap gap-2 sm:flex-nowrap">
                <a href="/forminci" 
                   class="flex-1 sm:flex-none flex items-center justify-center px-4 py-3 bg-[#214969] hover:bg-[#1a3850] text-white rounded-lg cursor-pointer transition-colors duration-300 shadow-md text-sm md:text-base">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span>Añadir Incidencia</span>
                </a>
                <button onclick="showCSVModal()" 
                        class="flex-1 sm:flex-none flex items-center justify-center px-4 py-3 bg-[#2a652c] hover:bg-[#3d6e3f] text-white rounded-lg cursor-pointer transition-colors duration-300 shadow-md text-sm md:text-base">
                    <i class="fas fa-file-csv mr-2"></i>
                    <span>Importar CSV</span>
                </button>
                <a href="/addtech" 
                   class="flex-1 sm:flex-none flex items-center justify-center px-4 py-3 bg-[#214969] hover:bg-[#1a3850] text-white rounded-lg cursor-pointer transition-colors duration-300 shadow-md text-sm md:text-base">
                    <i class="fas fa-user-plus mr-2"></i>
                    <span>Añadir Técnico</span>
                </a>
                <a href="/listinci" 
                   class="flex-1 sm:flex-none flex items-center justify-center px-4 py-3 bg-[#214969] hover:bg-[#1a3850] text-white rounded-lg cursor-pointer transition-colors duration-300 shadow-md text-sm md:text-base">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span>Ver Incidencias</span>
                </a>
            </div>
        </div>
    </div>
      <!-- Grid of cards / Grid de tarjetas -->
    <div class="container mx-auto px-4 py-8 max-w-7xl">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 md:gap-8">
        <?php foreach ($machines as $machine): ?>
          <div class="bg-gradient-to-br from-[#214969] to-[#1a3850] rounded-xl overflow-hidden shadow-xl">
            <!-- Machine image / Imagen de la máquina -->
            <div class="relative group">
              <img class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
                src="<?= ($machine['image']) ?>" 
                alt="Imagen de <?= ($machine['model']) ?>"
                onerror="this.src='/uploads/default-machine.png'">
              <div class="absolute top-0 right-0 bg-gradient-to-r from-[#478249] to-[#3d7040] text-white px-4 py-1.5 m-3 rounded-full text-sm font-medium shadow-lg flex items-center space-x-2">
                <span class="w-2 h-2 bg-green-300 rounded-full animate-pulse"></span>
                <span>Activa</span>
              </div>
            </div>
            <!-- Card content / Contenido de la tarjeta -->
            <div class="p-6">
              <h1 class="text-[#5DA6C3] font-bold text-xl mb-3 flex items-center space-x-2">
                <i class="fas fa-desktop text-lg"></i>
                <span><?= ($machine['model']) ?></span>
              </h1>
              <!-- Machine details / Detalles de la máquina -->
              <div class="space-y-3 text-[#C1D1D8] mb-6">
                <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                  <i class="fas fa-barcode text-[#5DA6C3]"></i>
                  <span>SN: <?= ($machine['serial_number']) ?></span>
                </div>
                <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                  <i class="fas fa-calendar text-[#5DA6C3]"></i>
                  <span>Instalada: <?= ($machine['installation_date']) ?></span>
                </div>
                <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                  <i class="fas fa-tools text-[#5DA6C3]"></i>
                  <span>Fabricante: <?= ($machine['created_by']) ?></span>
                </div>
              </div>
              <!-- Action buttons / Botones de acción -->
              <div class="flex justify-between items-center pt-2 border-t border-[#2a5475]/30">
                <a href="/maquina_id?machine_id=<?= ($machine['machine_id']) ?>"
                  class="flex items-center justify-center p-2.5 bg-gradient-to-r from-[#577788] to-[#4a6573] text-white rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 shadow-md hover:shadow-xl group"
                  title="Ver detalles">
                  <i class="fas fa-info-circle text-lg group-hover:rotate-12 transition-transform"></i>
                  <span class="hidden sm:inline sm:ml-2">Detalles</span>
                </a>

                <a href="/editmachine?machine_id=<?= ($machine['machine_id']) ?>"
                  class="flex items-center justify-center p-2.5 bg-gradient-to-r from-[#577788] to-[#4a6573] text-white rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 shadow-md hover:shadow-xl group"
                  title="Editar máquina">
                  <i class="fa-solid fa-pen-to-square text-lg"></i>
                  <span class="hidden sm:inline sm:ml-2">Editar</span>
                </a>

                <button onclick="confirmDeleteMachine(<?= $machine['machine_id'] ?>, '<?= htmlspecialchars($machine['model'], ENT_QUOTES) ?>')"
                  class="flex items-center justify-center p-2.5 bg-gradient-to-r from-[#577788] to-[#4a6573] text-white rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 shadow-md hover:shadow-xl group"
                  title="Eliminar máquina">
                  <i class="fas fa-trash text-lg"></i>
                  <span class="hidden sm:inline sm:ml-2">Eliminar</span>
                </button>

                <button onclick="showMachineQRCode(<?= $machine['machine_id'] ?>)"
                  class="flex items-center justify-center p-2.5 bg-gradient-to-r from-[#577788] to-[#4a6573] text-white rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 shadow-md hover:shadow-xl group"
                  title="Generar QR">
                  <i class="fas fa-qrcode text-lg"></i>
                  <span class="hidden sm:inline sm:ml-2">QR</span>
                </button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- CSV import modal / Modal de importación CSV -->
  <div id="csvModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="fixed inset-0 flex items-center justify-center p-4">
      <div class="bg-[#214969] rounded-lg max-w-md w-full p-6 shadow-xl">
        <h1 class="text-xl font-bold text-white mb-4">
          <i class="fas fa-file-csv mr-2 text-[#5DA6C3]"></i>
          Importar Máquinas
        </h1>
        <div class="mb-4">
          <input type="file" id="csvFileInput" accept=".csv" class="hidden" onchange="handleFileSelection(this)">
          <label for="csvFileInput" class="flex items-center px-4 py-3 bg-[#132048] text-white rounded-lg cursor-pointer hover:bg-[#1a3850] transition-all">
            <i class="fas fa-upload mr-2"></i>
            <span id="fileName">Seleccionar archivo CSV</span>
          </label>
        </div>
        <div id="fileInfo" class="mb-4 text-[#A8C5D6] hidden">
          <p>Archivo seleccionado: <span id="selectedFileName" class="font-semibold"></span></p>
          <p class="text-sm">¿Deseas proceder con la importación?</p>
        </div>
        <div class="flex justify-end space-x-3">
          <button onclick="closeCSVModal()" class="px-4 py-2 text-[#A8C5D6] hover:text-white transition-colors">
            Cancelar
          </button>
          <button id="importButton" class="bg-[#478249] hover:bg-[#3d6e3f] text-white px-4 py-2 rounded-lg hidden">
            Importar
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts - Movidos dentro del body -->
  <script>
    function confirmDeleteMachine(machine_id, model) {
      if (confirm(`¿Estás seguro que deseas eliminar al usuario ${model}? Esta acción no se puede deshacer.`)) {
        window.location.href = `/delete/${machine_id}`;
      }
    }
    
    function showMachineQRCode(machineId) {
      window.location.href = `/generate_machine_qr/${machineId}`;
    }
    
    function closePopup() {
      // Función para cerrar el popup
      map.closePopup();
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/js/bundle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>