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
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-RMHRSVKM8L"></script>
  
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

<script>
  var swiper = new Swiper(".mySwiper", {
    // Configuración básica
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    
    // Agregar paginación
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    
    // Agregar navegación
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    
    // Autoplay (opcional)
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
  });
</script>


</head>

<body class="bg-[#C1D1D8] text-gray-800">
  <!--Header and Nav -->
  <header class="bg-[#0C0C04] text-white">
    <!--Barra de navegación principal (Main navigation bar)-->
    <nav class="container mx-auto px-6">
      <div class="flex items-center justify-between h-20">
        <!-- Logo and name -->
        <div class="flex items-center space-x-4">
          <img src="/uploads/logototmaquina.png" alt="Logo" class="h-20 transition-transform hover:scale-105">
          <span class="text-xl font-bold text-[#5DA6C3]">Tot Maquina</span>
        </div>
        <!--Enlaces de navegación (Navigation links) -->
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
              <a href="/login" class="bg-[#165f7c] hover:bg-[#478249] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl" role="button" aria-label="Iniciar Sesión">
                <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
              </a>
            <?php endif; ?>
          </div>
        </div>
        <!--Botón menú móvil (Mobile menu button) -->
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
      <!-- Menú móvil -->
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
  
  <main class="container mx-auto my-12 px-6 max-w-7xl">
    <!-- Slider -->
    <section class="bg-[#214969] text-white shadow-lg rounded-xl p-6 mb-12">
      <!-- Swiper -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="/uploads/slider1.jpg" alt="Imagen 1" class="w-full h-96 object-cover rounded-lg">
          </div>
          <div class="swiper-slide">
            <img src="/uploads/slider2.png" alt="Imagen 2" class="w-full h-96 object-cover rounded-lg">
          </div>
          <div class="swiper-slide">
            <img src="/uploads/slider3.webp" alt="Imagen 3" class="w-full h-96 object-cover rounded-lg">
          </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </section>
    <!--Sección Sobre Nosotros (About Us Section)-->
    <section class="mt-16 bg-[#214969] text-white shadow-lg rounded-xl p-8">
      <div class="max-w-4xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">Sobre Nosotros </h2>

          <div class="grid md:grid-cols-2 gap-8 items-center">
            <div class="rounded-lg overflow-hidden shadow-xl md:-ml-28">
              <img src="/uploads/us.avif" alt="Equipo Tot Maquina" class="w-full h-auto object-cover">
            </div>
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
            </div>
          </div>
      </div>
    </section>
    <!--Sección de Panel de Control (Sección de Panel de Control )-->
    <section class="mt-16 bg-[#1b4363] text-white shadow-lg rounded-xl p-8">
      <div class="max-w-6xl mx-auto">
        <!-- Encabezado (Header)-->
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold mb-4">Panel de Control</h2>
          <p class="text-[#ffffff] text-lg max-w-2xl mx-auto">Gestiona y monitorea todas tus máquinas desde un solo lugar</p>
        </div>
        <!-- Grid de botones principales (Grid of main buttons)-->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
          <!-- Botón del Mapa (Map Button)-->
          <div class="bg-[#0a1f2e] backdrop-blur-md rounded-xl shadow-lg overflow-hidden hover:transform hover:scale-105 transition-all duration-300 border border-white/20 flex flex-col h-full">
            <div class="flex flex-col items-center text-center p-8 h-full justify-between">
              <div class="w-20 h-20 bg-[#165f7c] rounded-full flex items-center justify-center mb-6 shadow-lg">
                <i class="fas fa-map-marked-alt text-3xl text-white"></i>
              </div>
              <h3 class="text-2xl font-semibold text-[#f8f9fa] mb-4">Mapa de Máquinas</h3>
              <p class="text-[#e9ecef] mb-8">Visualiza la ubicación de todas las máquinas en tiempo real</p>
              <button onclick="abrirMapaModal()"
                class="w-full bg-[#165f7c] text-[#fdfeff] py-4 px-6 rounded-lg hover:bg-[#0d4257] transition-all duration-300 flex items-center justify-center space-x-3 group"
                aria-label="Abrir mapa de máquinas">
                <i class="fas fa-map-marker-alt text-lg"></i>
                <span class="font-medium">Ver Mapa</span>
                <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
              </button>
            </div>
          </div>
          <!-- Botón de Añadir Máquina (Add Machine Button)-->
          <div class="bg-[#0a1f2e] backdrop-blur-md rounded-xl shadow-lg overflow-hidden hover:transform hover:scale-105 transition-all duration-300 border border-white/20 flex flex-col h-full">
            <div class="flex flex-col items-center text-center p-8 h-full justify-between">
              <div class="w-20 h-20 bg-[#2a652c] rounded-full flex items-center justify-center mb-6 shadow-lg">
                <i class="fas fa-plus text-3xl text-white"></i>
              </div>
              <h3 class="text-2xl font-semibold text-[#f8f9fa] mb-4">Nueva Máquina</h3>
              <p class="text-[#e9ecef] mb-8">Registra una nueva máquina en el sistema</p>
              <a href="/addmachine"
                class="w-full bg-[#2a652c] text-[#fff] py-4 px-6 rounded-lg hover:bg-[#1e4a20] transition-all duration-300 flex items-center justify-center space-x-3 group"
                role="button"
                aria-label="Añadir nueva máquina">
                <i class="fas fa-plus text-lg"></i>
                <span class="font-medium">Añadir Máquina</span>
                <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
              </a>
            </div>
          </div>
          <!-- Botón de Lista de Máquinas (Machine List Button)-->
          <div class="bg-[#0a1f2e] backdrop-blur-md rounded-xl shadow-lg overflow-hidden hover:transform hover:scale-105 transition-all duration-300 border border-white/20 flex flex-col h-full">
            <div class="flex flex-col items-center text-center p-8 h-full justify-between">
              <div class="w-20 h-20 bg-[#165f7c] rounded-full flex items-center justify-center mb-6 shadow-lg">
                <i class="fas fa-list text-3xl text-white"></i>
              </div>
              <h3 class="text-2xl font-semibold text-[#f8f9fa] mb-4">Lista de Máquinas</h3>
              <p class="text-[#e9ecef] mb-8">Accede al listado completo de máquinas</p>
              <a href="/addlist"
                class="w-full bg-[#165f7c] text-[#fdfeff] py-4 px-6 rounded-lg hover:bg-[#0d4257] transition-all duration-300 flex items-center justify-center space-x-3 group"
                role="button"
                aria-label="Ver lista de máquinas">
                <i class="fas fa-list text-lg"></i>
                <span class="font-medium">Ver Lista</span>
                <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Modal del Mapa (Map Modal)-->
    <div id="mapaModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
      <div class="fixed inset-0 p-4 flex items-center justify-center">
        <div class="bg-white rounded-lg w-full h-full md:h-[90vh] max-w-7xl relative">
          <div class="bg-[#214969] text-white p-4 rounded-t-lg flex justify-between items-center">
            <h3 class="text-xl font-bold">Mapa de Máquinas</h3>
            <button 
              onclick="cerrarMapaModal()" 
              class="text-white hover:text-gray-300 transition-colors"
              aria-label="Cerrar mapa">
              <i class="fas fa-times text-2xl"></i>
            </button>
          </div>
          <div id="map" class="w-full h-[calc(100%-4rem)]"></div>
        </div>
      </div>
    </div>
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
  <script src="/js/bundle.js"></script>
  <script>
    let machines = [];
    machines = <?php echo json_encode($machines ?? [], JSON_THROW_ON_ERROR); ?>;
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var swiper = new Swiper(".mySwiper", {
        // Configuración básica
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        
        // Agregar paginación
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        
        // Agregar navegación
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        
        // Autoplay (opcional)
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
      });
    });
  </script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-RMHRSVKM8L');
  </script>
</body>
</html>