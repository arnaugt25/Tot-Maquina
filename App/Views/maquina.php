<!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máquina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
      /* Estilos para mejorar el contraste de la atribución de Leaflet */
      .leaflet-control-attribution {
        background-color: #ffffff !important;
      }

      .leaflet-control-attribution a {
        color: #0b2239 !important;
        /* Color oscuro para máximo contraste */
        text-decoration: underline;
      }

      .leaflet-control-attribution a:hover {
        color: #000000 !important;
        text-decoration: none;
      }
    </style>
  </head>

  <body class="bg-[#C1D1D8] text-gray-800 min-h-screen flex flex-col">
    <header class="bg-[#0C0C04] text-white">
      <nav class="container mx-auto px-6">
        <div class="flex items-center justify-between h-20">
          <!-- Logo y nombre -->
          <div class="flex items-center space-x-4">
            <img src="/uploads/logototmaquina.png" alt="Logo" class="h-20 transition-transform hover:scale-105">
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

          <!-- Unique mobile menu button / Único botón de menú móvil -->
          <button id="mobile-menu-button" 
                  class="md:hidden text-gray-300 hover:text-white focus:outline-none focus:text-white"
                  aria-label="Abrir menú de navegación"
                  aria-expanded="false"
                  aria-controls="mobile-menu">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>

        <!-- Mobile menu / Menú móvil -->
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
              <a href="/login" class="block px-3 py-2 bg-[#5DA6C3] text-white hover:bg-[#478249] rounded-md transition-colors duration-300">
                <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
              </a>
            <?php endif; ?>
          </div>
        </div>
      </nav>
    </header>

    <main class="flex-1 container mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <!-- Information box / Cuadro de información -->
          <div class="bg-[#214969] p-4 sm:p-6 rounded-lg shadow-lg text-white">
            <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-[#5DA6C3]">Información de la máquina</h2>
            <div class="space-y-4">
              <p><span class="font-medium text-[#5DA6C3]">Nombre: </span><?= htmlspecialchars($machine['model']) ?></p>
              <p><span class="font-medium text-[#5DA6C3]">Fabricante: </span><?= htmlspecialchars($machine['created_by']) ?></p>
              <p><span class="font-medium text-[#5DA6C3]">Fecha de instalación: </span><?= htmlspecialchars($machine['installation_date']) ?></p>
              <p><span class="font-medium text-[#5DA6C3]">Número de serie: </span><?= htmlspecialchars($machine['serial_number']) ?></p>
            </div>
          </div>

          <!-- Machine image / Imagen de la máquina -->
          <div class="relative group">
            <img class="w-full h-48 sm:h-64 object-cover rounded-lg shadow-lg transition-all duration-300 group-hover:scale-105"
              src="<?= !empty($machine['image']) ? htmlspecialchars($machine['image']) : '/uploads/default-machine.jpg' ?>" 
              alt="Máquina <?= htmlspecialchars($machine['model']) ?> - <?= htmlspecialchars($machine['serial_number']) ?>"
              loading="lazy"
            >
          </div>
        </div>

        <!-- View history button / Botón de Ver Historial -->
        <div class="flex justify-center my-8">
          <a href="/history/<?= htmlspecialchars($machine['machine_id']) ?>"
            class="bg-[#478249] hover:bg-[#5DA6C3] text-white font-bold py-3 px-20 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl inline-flex items-center justify-center">
            <i class="fas fa-history mr-2"></i>
            Ver historial
          </a>
        </div>

        <!-- Location map / Mapa de ubicación -->
        <div class="w-full">
          <div class="bg-[#214969] p-4 sm:p-6 rounded-lg shadow-lg text-white">
            <h2 class="text-xl sm:text-2xl font-semibold text-[#5DA6C3] mb-4">Ubicación de la máquina</h2>
            <div id="individualMap" class="w-full h-[300px] sm:h-[400px] rounded-lg overflow-hidden"></div>
          </div>
        </div>
      </div>
    </main>

    <!-- Include Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
            
    <!-- Include bundled JS -->
    <script src="/js/bundle.js"></script>

    <style>
      .custom-div-icon {
        background: none;
        border: none;
      }

      .marker-pin {
        width: 30px;
        height: 42px;
        background-color: #214969;
        border: 2px solid #fff;
        border-radius: 50% 50% 50% 0;
        transform: rotate(-45deg);
        margin: -38px -15px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.3);
      }

      .popup-close-button {
        position: absolute;
        top: 0;
        right: 0;
        padding: 4px 8px;
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        color: #333;
      }
      .popup-close-button:hover {
        color: #000;
      }
    </style>

    <script>
    const machine = <?php echo json_encode($machine); ?>;

    document.addEventListener('DOMContentLoaded', function() {
      const map = L.map('individualMap').setView([39.5696, 2.6502], 12);
      
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19,
        minZoom: 3
      }).addTo(map);

      if (machine && machine.coordinates) {
        const [lat, lng] = machine.coordinates.split(',').map(coord => parseFloat(coord.trim()));
        if (!isNaN(lat) && !isNaN(lng)) {
          const marker = L.marker([lat, lng]).addTo(map);
          marker.bindPopup(`
            <div class="popup-content">
              <h3>${machine.created_by}</h3>
              <p>Serial: ${machine.serial_number}</p>
              <p>Installed: ${machine.installation_date}</p>
            </div>
          `).openPopup();
          map.setView([lat, lng], 15);
        }
      }

      window.addEventListener('resize', () => map.invalidateSize());
    });

    function closePopup() {
      if (typeof map !== 'undefined') {
        map.closePopup();
      }
    }
    </script>
  </body>
  </html>