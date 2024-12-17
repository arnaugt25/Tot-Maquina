<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historial</title>
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
          <ul class="flex items-center space-x-8">
            <li>
              <a href="/" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
                <i class="fa-solid fa-house"></i> Inicio
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
              </a>
            </li>
            <li>
              <a href="/addlist" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
                <i class="fa-solid fa-desktop"></i> Maquinas
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
              </a>
            </li>
            <li>
              <a href="/profile" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
                <i class="fa-solid fa-address-card"></i> Perfil
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
              </a>
            </li>
            <li>
              <a href="" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
                <i class="fa-solid fa-envelope"></i> Notificaciones
                <input type="button" id="viewAlerta" value="">
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
              </a>
            </li>
            <li>
              <a href="#" class="bg-[#214969] hover:bg-[#478249] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
                Admin panel
              </a>
            </li>
          </ul>
        </div>
        <!-- Botón menú móvil -->
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
        <!-- Menú móvil -->
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

  <main class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
      <!-- Breadcrumb -->
      <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="/" class="text-[#214969] hover:text-[#5DA6C3] transition-colors">
              <i class="fa-solid fa-house"></i>
              <span class="ml-1 text-sm font-medium">Inicio</span>
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <i class="fa-solid fa-chevron-right text-gray-400 mx-2"></i>
              <span class="text-sm font-medium text-gray-500">Historial</span>
            </div>
          </li>
        </ol>
      </nav>

      <!-- Título y botón de acción -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-[#214969]">Historial de la Máquina</h1>
        <div class="flex space-x-4">
          <!-- Botón para descargar PDF -->
          <a id="downloadPdf"
            href="/pdf/<?= ($machine['machine_id'] ?? '') ?>"
            data-machine-id="<?= ($machine['machine_id'] ?? '') ?>"
            class="bg-[#478249] hover:bg-[#5DA6C3] text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl flex items-center">
            <i class="fas fa-file-pdf mr-2"></i> Descargar PDF
          </a>

        </div>
        <!-- Botón Volver -->
        <a href="/addlist" class="bg-[#214969] hover:bg-[#5DA6C3] text-white px-4 py-2 rounded-lg transition-colors duration-300">
          <i class="fa-solid fa-arrow-left mr-2"></i>Volver
        </a>
      </div>
    </div>

    <!-- Contenido principal -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
      <!-- Información básica -->
      <?php if (isset($historialbd) && !empty($historialbd)): ?>
        <?php $contador = 1; // Inicializar contador 
        ?>
        <?php foreach ($historialbd as $historial): ?>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 border-b border-gray-200">
            <div>
              <h2 class="text-xl font-semibold text-[#214969] mb-4">Mantenimiento <?= $contador++ ?></h2>
              <div class="space-y-4">
                <div>
                  <h3 class="text-sm font-medium text-gray-500">Máquina</h3>
                  <p class="mt-1 text-[#214969]">
                    <?= htmlspecialchars($historial['model']) ?>
                  </p>
                </div>
                <div>
                  <h3 class="text-sm font-medium text-gray-500">Tipo</h3>
                  <p class="mt-1 text-[#214969]">
                    <?= htmlspecialchars($historial['type']) ?>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <h2 class="text-xl font-semibold text-[#214969] mb-4">Detalles</h2>
              <div class="space-y-4">
                <div>
                  <h3 class="text-sm font-medium text-gray-500">Fecha de Instalación</h3>
                  <p class="mt-1 text-[#214969]">
                    <?= htmlspecialchars($historial['installation_date']) ?>
                  </p>
                </div>
                <div>
                  <h3 class="text-sm font-medium text-gray-500">Técnico Responsable</h3>
                  <p class="mt-1 text-[#214969]">
                    <?= htmlspecialchars($historial['name']) ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
      <?php endif; ?>

      <!-- Lista de Incidencias -->
      <div class="p-6">
        <h2 class="text-xl font-semibold text-[#214969] mb-4">Historial de Incidencias</h2>
        <div class="space-y-3">
          <?php if (isset($infomaintenance) && !empty($infomaintenance)): ?>
            <?php $contador2 = 1; // Inicializar contador ?>
            <?php foreach ($infomaintenance as $incidence): ?>
                <div class="border rounded-lg overflow-hidden">
                    <button class="w-full text-left p-4 bg-gray-50 hover:bg-gray-100 transition-colors duration-300 flex justify-between items-center text-[#214969] font-medium" onclick="toggleAccordion('incidencia<?= $contador2 ?>')">
                        <span>Incidencia <?= $contador2 ?></span>
                        <i class="fa-solid fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div id="incidencia<?= $contador2 ?>" class="hidden p-4 border-t">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Fecha</h3>
                                <p class="mt-1 text-[#214969]"><?= htmlspecialchars($incidence['assigned_date']); ?></p>
                            </div>
                            <div class="md:col-span-2">
                                <h3 class="text-sm font-medium text-gray-500">Descripción</h3>
                                <p class="mt-1 text-[#214969]"><?= htmlspecialchars($incidence['description']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $contador2++; // Incrementar contador ?>
            <?php endforeach; ?>
          <?php else: ?>
            <p>No hay incidencias disponibles.</p>
          <?php endif; ?>
        </div>
      </div>

    </div>
    </div>
  </main>

  <script>
    function toggleAccordion(id) {
      const element = document.getElementById(id);
      const button = element.previousElementSibling;
      const icon = button.querySelector('i');

      element.classList.toggle('hidden');
      icon.style.transform = element.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    }
  </script>
  <script src="/js/bundle.js"></script>
</body>

</html>