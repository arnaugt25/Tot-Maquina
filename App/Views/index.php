<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Máquinas Pro</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/main.css">
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
            <a href="#" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
              Inicio
              <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
            </a>
            <a href="#" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
              Maquinas
              <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
            </a>
            <a href="#" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
              Mapa
              <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
            </a>
            <a href="#" class="bg-[#214969] hover:bg-[#478249] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
              Admin panel
            </a>
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
          <a href="#" class="block px-3 py-2 text-[#C1D1D8] hover:text-white hover:bg-[#214969] rounded-md transition-colors duration-300">
            Inicio
          </a>
          <a href="#" class="block px-3 py-2 text-[#C1D1D8] hover:text-white hover:bg-[#214969] rounded-md transition-colors duration-300">
            Máquinas
          </a>
          <a href="#" class="block px-3 py-2 text-[#C1D1D8] hover:text-white hover:bg-[#214969] rounded-md transition-colors duration-300">
            Mapa
          </a>
          <a href="#" class="block px-3 py-2 bg-[#214969] text-white hover:bg-[#478249] rounded-md transition-colors duration-300">
            + Añadir máquina
          </a>
        </div>
      </div>
    </nav>
  </header>

  <!-- Contenido Principal -->
  <main class="container mx-auto my-12 px-6 max-w-7xl">
    <!-- Slider -->
    <section class="bg-[#214969] text-white shadow-lg rounded-xl p-6 mb-12">
      <div class="h-96 bg-gradient-to-r from-[#2D3F58] to-[#132048] rounded-lg flex items-center justify-center">
        <p class="text-white text-xl">Tus imágenes</p>
      </div>
    </section>

    <!-- Sección de Máquinas -->
    <section class="space-y-8">
      <h2 class="text-2xl font-bold text-[#0C0C04] mb-6">Máquinas</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Mapa -->
        <div class="bg-[#214969] text-white shadow-lg rounded-xl p-6 transform transition-all hover:scale-[1.02]">
          <div class="h-64 bg-gradient-to-r from-[#132048] to-[#0C0C04] rounded-lg flex items-center justify-center">
            <p class="text-white text-lg">Mapa con ubicación de máquinas</p>
          </div>
        </div>

        <!-- Botón Añadir -->
        <div class="flex justify-center items-center">
          <a href="#" class="bg-[#2D3F58] text-white py-4 px-8 rounded-lg hover:bg-[#132048] transition-colors duration-200 text-lg font-medium shadow-md hover:shadow-xl">
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
</body>
</html>