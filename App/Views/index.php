<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Máquinas Pro</title>
  
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="manifest" href="/favicon/site.webmanifest">
  <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  
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
      color: #0b2239 !important; /* Color oscuro para máximo contraste */
      text-decoration: underline;
    }

    .leaflet-control-attribution a:hover {
      color: #000000 !important;
      text-decoration: none;
    }
  </style>
</head>
<body class="bg-[#C1D1D8] text-gray-800">
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
  <main class="container mx-auto my-12 px-6 max-w-7xl">
    <!-- Slider -->
    <section class="bg-[#214969] text-white shadow-lg rounded-xl p-6 mb-12">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <!-- Repite este div para cada imagen -->
          <div class="swiper-slide">
            <img src="/uploads/images/slide1.jpg" alt="Imagen 1" class="w-full h-96 object-cover rounded-lg">
          </div>
          <div class="swiper-slide">
            <img src="/uploads/images/slide2.jpg" alt="Imagen 2" class="w-full h-96 object-cover rounded-lg">
          </div>
          <div class="swiper-slide">
            <img src="/uploads/images/slide3.jpg" alt="Imagen 3" class="w-full h-96 object-cover rounded-lg">
          </div>
        </div>
        <!-- Agregar navegación -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- Agregar paginación -->
        <div class="swiper-pagination"></div>
      </div>
    </section>
        <!-- Sección Sobre Nosotros -->
        <section class="mt-16 bg-[#214969] text-white shadow-lg rounded-xl p-8">
      <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Sobre Nosotros</h2>
        
        <div class="grid md:grid-cols-2 gap-8 items-center">
          <!-- Imagen corporativa -->
          <div class="rounded-lg overflow-hidden shadow-xl">
            <img src="/uploads/images/about-us.jpg" alt="Equipo Tot Maquina" class="w-full h-auto object-cover">
          </div>
          
          <!-- Texto informativo -->
          <div class="space-y-4">
            <p class="text-lg">
              Tot Maquina es líder en el sector de gestión y mantenimiento de maquinaria industrial. Con más de 15 años de experiencia, nos dedicamos a proporcionar soluciones integrales para el control y mantenimiento de equipos.
            </p>
            
            <div class="space-y-3">
              <div class="flex items-center space-x-2">
                <i class="fas fa-check-circle text-[#5DA6C3]"></i>
                <span>Servicio técnico especializado 24/7</span>
              </div>
              <div class="flex items-center space-x-2">
                <i class="fas fa-check-circle text-[#5DA6C3]"></i>
                <span>Mantenimiento preventivo y correctivo</span>
              </div>
              <div class="flex items-center space-x-2">
                <i class="fas fa-check-circle text-[#5DA6C3]"></i>
                <span>Sistema de gestión avanzado</span>
              </div>
            </div>
            <a href="#" class="inline-block mt-4 bg-[#2a652c] hover:bg-[#1e4a20] text-white px-6 py-3 rounded-lg transition-colors duration-300">
              Conoce más sobre nosotros
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Sección de Máquinas -->
    <section class="space-y-8">
      <h2 class="text-2xl font-bold text-[#0C0C04] mb-6">Máquinas</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Mapa -->
        <div class="bg-[#214969] text-white shadow-lg rounded-xl p-6 transform transition-all hover:scale-[1.02]">
          <div id="map" class="h-64 rounded-lg"></div>
        </div>

        <!-- Botón Añadir -->
        <div class="flex justify-center items-center">
          <a href="/addmachine" class="bg-[#2D3F58] text-white py-4 px-8 rounded-lg hover:bg-[#132048] transition-colors duration-200 text-lg font-medium shadow-md hover:shadow-xl">
            + Añadir máquina
          </a>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-gradient-to-r from-[#577788] to-[#478249] py-8 mt-12 text-white">
    <div class="container mx-auto px-6 text-center">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
          <h3 class="font-bold text-white mb-4">Contacto</h3>
          <p class="text-[#C1D1D8]">info@maquinaspro.com</p>
        </div>
        <div>
          <h3 class="font-bold text-white mb-4">Enlaces</h3>
          <ul class="space-y-2 text-[#C1D1D8]">
            <li><a href="#" class="hover:text-white">Términos y condiciones</a></li>
            <li><a href="#" class="hover:text-white">Política de privacidad</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-bold text-white mb-4">Síguenos</h3>
          <p class="text-[#C1D1D8]">@maquinaspro</p>
        </div>
      </div>
      <div class="mt-8 text-sm text-[#C1D1D8]">
        © 2024 Máquinas Pro. Todos los derechos reservados.
      </div>
    </div>
  </footer>
  <script src="/js/nav.js"></script>
  <script src="/js/slider.js"></script>
  <script>
    // Inicializar el mapa
    var map = L.map('map').setView([41.3851, 2.1734], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '© <a href="https://www.openstreetmap.org/copyright" class="high-contrast-link">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Crear un marcador accesible personalizado
    L.Marker.AccessibleMarker = L.Marker.extend({
      onAdd: function(map) {
        // Llamar al método original
        L.Marker.prototype.onAdd.call(this, map);
        
        // Obtener el elemento del marcador
        var el = this.getElement();
        
        // Configurar atributos de accesibilidad
        el.setAttribute('aria-label', 'Marcador de Máquina #1 - Haz clic para ver detalles');
        el.setAttribute('role', 'button');
        el.setAttribute('tabindex', '0');
        
        // Añadir manejo de eventos de teclado
        el.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            this.openPopup();
          }
        });

        return this;
      }
    });

    // Crear una instancia del marcador accesible
    var marker = new L.Marker.AccessibleMarker([41.3851, 2.1734], {
      icon: L.icon({
        iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
        shadowSize: [41, 41],
        shadowAnchor: [12, 41]
      }),
      title: 'Máquina #1',
      alt: 'Ubicación de la Máquina #1'
    }).addTo(map);

    // Añadir popup con contenido accesible
    marker.bindPopup(
      '<div role="dialog" aria-label="Información de la máquina">' +
      '<h3>Máquina #1</h3>' +
      '<p>Información detallada sobre la máquina</p>' +
      '</div>'
    );
  </script>
  <div class="popup-wrapper" id="folleto-popup">
    <div class="popup-content">
      <!-- Contenido del popup -->
    </div>
    <button 
      type="button"
      class="boton-cierre-ventana-emergente-folleto" 
      aria-label="Cerrar ventana emergente"
      onclick="cerrarPopupFolleto()">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <script>
    function cerrarPopupFolleto() {
      const popup = document.getElementById('folleto-popup');
      if (popup) {
        popup.style.display = 'none';
      }
    }

    // Función para abrir el popup (si es necesaria)
    function abrirPopupFolleto() {
      const popup = document.getElementById('folleto-popup');
      if (popup) {
        popup.style.display = 'block';
      }
    }
  </script>
</body>
</html>