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
              <a href="/list" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
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
              <a href="#" class="relative group px-3 py-2 text-[#C1D1D8] hover:text-white transition-colors duration-300">
                <i class="fa-solid fa-envelope"></i> Notificaciones
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
          <button type="button" 
                  aria-label="Abrir menú de navegación"
                  aria-expanded="false"
                  aria-controls="mobile-menu"
                  class="text-gray-300 hover:text-white focus:outline-none focus:text-white">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
          </button>
        </div>
      <!-- Menú móvil -->
      <div class="hidden md:hidden" id="mobile-menu">
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
            <a href="/list" class="bg-[#214969] hover:bg-[#5DA6C3] text-white px-4 py-2 rounded-lg transition-colors duration-300">
                <i class="fa-solid fa-arrow-left mr-2"></i>Volver
            </a>
        </div>

        <!-- Contenido principal -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Información básica -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 border-b border-gray-200">
                <div>
                    <h2 class="text-xl font-semibold text-[#214969] mb-4">Información General</h2>
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Descripción</h3>
                            <p class="mt-1 text-[#214969]">Aquí va la descripción de la máquina.</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Tipo</h3>
                            <p class="mt-1 text-[#214969]">Aquí va el tipo de la máquina.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-[#214969] mb-4">Detalles Técnicos</h2>
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Fecha de Instalación</h3>
                            <p class="mt-1 text-[#214969]">Aquí va la fecha de instalación.</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Técnico Responsable</h3>
                            <p class="mt-1 text-[#214969]">Aquí va el nombre del técnico.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lista de Incidencias -->
            <div class="p-6">
                <h2 class="text-xl font-semibold text-[#214969] mb-4">Historial de Incidencias</h2>
                <div class="space-y-3">
                    <div class="border rounded-lg overflow-hidden">
                        <button class="w-full text-left p-4 bg-gray-50 hover:bg-gray-100 transition-colors duration-300 flex justify-between items-center text-[#214969] font-medium" onclick="toggleAccordion('incidencia1')">
                            <span>Incidencia 1</span>
                            <i class="fa-solid fa-chevron-down transition-transform duration-300"></i>
                        </button>
                        <div id="incidencia1" class="hidden p-4 border-t">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Fecha</h3>
                                    <p class="mt-1 text-[#214969]">01/01/2024</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Estado</h3>
                                    <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">Resuelto</span>
                                </div>
                                <div class="md:col-span-2">
                                    <h3 class="text-sm font-medium text-gray-500">Descripción</h3>
                                    <p class="mt-1 text-[#214969]">Detalles de la incidencia 1.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border rounded-lg overflow-hidden">
                        <button class="w-full text-left p-4 bg-gray-50 hover:bg-gray-100 transition-colors duration-300 flex justify-between items-center text-[#214969] font-medium" onclick="toggleAccordion('incidencia2')">
                            <span>Incidencia 2</span>
                            <i class="fa-solid fa-chevron-down transition-transform duration-300"></i>
                        </button>
                        <div id="incidencia2" class="hidden p-4 border-t">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Fecha</h3>
                                    <p class="mt-1 text-[#214969]">02/01/2024</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Estado</h3>
                                    <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded">En proceso</span>
                                </div>
                                <div class="md:col-span-2">
                                    <h3 class="text-sm font-medium text-gray-500">Descripción</h3>
                                    <p class="mt-1 text-[#214969]">Detalles de la incidencia 2.</p>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>
</html>