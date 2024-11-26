<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Máquina</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/main.css">
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
            <a href="/list" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
            <i class="fa-solid fa-desktop"></i> Maquinas
              <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
            </a>
            <a href="/profile" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
            <i class="fa-solid fa-address-card"></i> Perfil
              <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#5DA6C3] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
            </a>
            <a href="#" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
            <i class="fa-solid fa-envelope"></i> Notificaciones
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

      <!-- Menú móvil -->
      <div class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
          <a href="/" class="block px-3 py-2 text-[#C1D1D8] hover:text-white hover:bg-[#214969] rounded-md transition-colors duration-300">
            <i class="fa-solid fa-house"></i> Inicio
          </a>
          <a href="/list" class="block px-3 py-2 text-[#C1D1D8] hover:text-white hover:bg-[#214969] rounded-md transition-colors duration-300">
            <i class="fa-solid fa-desktop"></i> Máquinas
          </a>
          <a href="/profile" class="block px-3 py-2 text-[#C1D1D8] hover:text-white hover:bg-[#214969] rounded-md transition-colors duration-300">
            <i class="fa-solid fa-address-card"></i> Perfil
          </a>
          <a href="#" class="block px-3 py-2 text-[#C1D1D8] hover:text-white hover:bg-[#214969] rounded-md transition-colors duration-300">
            <i class="fa-solid fa-envelope"></i> Notificaciones
          </a>
          <a href="#" class="block px-3 py-2 bg-[#214969] text-white hover:bg-[#478249] rounded-md transition-colors duration-300">
            Admin panel
          </a>
        </div>
      </div>
    </nav>
  </header>
  <header class="bg-[#214969] shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-white">Nombre máquina</h1>
    </div>
  </header>

  <main class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Cuadro de información -->
      <div class="bg-[#214969] p-6 rounded-lg shadow-lg text-white">
        <h2 class="text-2xl font-semibold mb-4 text-[#5DA6C3]">Información de la máquina</h2>
        <div class="space-y-4">
          <p><span class="font-medium text-[#5DA6C3]">Modelo:</span> [Modelo de la máquina]</p>
          <p><span class="font-medium text-[#5DA6C3]">Año:</span> [Año]</p>
          <p><span class="font-medium text-[#5DA6C3]">Estado:</span> [Estado]</p>
          <p><span class="font-medium text-[#5DA6C3]">Descripción:</span> [Descripción detallada de la máquina]</p>
        </div>
      </div>

      <!-- Imagen de la máquina -->
      <div class="bg-[#214969] p-4 rounded-lg shadow-lg">
        <img src="/uploads/images/maquina-placeholder.jpg" alt="Imagen de la máquina" 
             class="w-full h-auto rounded-lg object-cover transition-transform hover:scale-105">
      </div>
    </div>

    <!-- Mapa de ubicación -->
    <div class="mt-8 bg-[#214969] p-4 rounded-lg shadow-lg">
      <h2 class="text-2xl font-semibold mb-4 text-[#5DA6C3]">Ubicación de la máquina</h2>
      <div class="w-full h-96 bg-white/10 rounded-lg">
        <!-- Aquí puedes integrar tu mapa (Google Maps, Leaflet, etc.) -->
        <p class="text-center py-40 text-white/70">Integrar mapa aquí</p>
      </div>
    </div>
  </main>
</body>
</html>