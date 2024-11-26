<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista máquinas</title>
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
  </header>    <!-- Target -->
    <div class="container mx-auto px-4 py-8 max-w-5xl">
        <!-- Grid de tarjetas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Tarjeta de máquina -->
            <div class="bg-gradient-to-br from-[#214969] to-[#1a3850] rounded-xl overflow-hidden shadow-xl">
                <!-- Imagen de la máquina -->
                <div class="relative group">
                    <img class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105" 
                         src="/uploads/ordenador.jpg" alt="Imagen Máquina">
                    <div class="absolute top-0 right-0 bg-gradient-to-r from-[#478249] to-[#3d7040] text-white px-4 py-1.5 m-3 rounded-full text-sm font-medium shadow-lg flex items-center space-x-2">
                        <span class="w-2 h-2 bg-green-300 rounded-full animate-pulse"></span>
                        <span>Activa</span>
                    </div>
                </div>
                
                <!-- Contenido de la tarjeta -->
                <div class="p-6">
                    <h3 class="text-[#5DA6C3] font-bold text-xl mb-3 flex items-center space-x-2">
                        <i class="fas fa-desktop text-lg"></i>
                        <span>Máquina 1</span>
                    </h3>
                    
                    <!-- Detalles de la máquina -->
                    <div class="space-y-3 text-[#C1D1D8] mb-6">
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                            <i class="fas fa-barcode text-[#5DA6C3]"></i>
                            <span>SN: 123456789</span>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                            <i class="fas fa-calendar text-[#5DA6C3]"></i>
                            <span>Instalada: 01/01/2024</span>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                            <i class="fas fa-tools text-[#5DA6C3]"></i>
                            <span>Último mantenimiento: 15/03/2024</span>
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="flex justify-between items-center pt-2 border-t border-[#2a5475]/30">
                        <a href="/maquina.php" 
                           class="bg-gradient-to-r from-[#577788] to-[#4a6573] text-white py-2.5 px-5 rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 text-sm font-medium shadow-md hover:shadow-xl flex items-center space-x-2 group">
                            <i class="fas fa-info-circle group-hover:rotate-12 transition-transform"></i>
                            <span>Detalles</span>
                        </a>
                        <button class="text-[#5DA6C3] hover:text-white transition-colors duration-300 p-2 hover:bg-[#1a3850]/50 rounded-lg">
                            <i class="fas fa-qrcode text-2xl hover:scale-110 transition-transform"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Segunda tarjeta -->
            <div class="bg-gradient-to-br from-[#214969] to-[#1a3850] rounded-xl overflow-hidden shadow-xl">
                <!-- Imagen de la máquina -->
                <div class="relative group">
                    <img class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105" 
                         src="/uploads/ordenador.jpg" alt="Imagen Máquina">
                    <div class="absolute top-0 right-0 bg-gradient-to-r from-[#478249] to-[#3d7040] text-white px-4 py-1.5 m-3 rounded-full text-sm font-medium shadow-lg flex items-center space-x-2">
                        <span class="w-2 h-2 bg-green-300 rounded-full animate-pulse"></span>
                        <span>Activa</span>
                    </div>
                </div>
                
                <!-- Contenido de la tarjeta -->
                <div class="p-6">
                    <h3 class="text-[#5DA6C3] font-bold text-xl mb-3 flex items-center space-x-2">
                        <i class="fas fa-desktop text-lg"></i>
                        <span>Máquina 2</span>
                    </h3>
                    
                    <!-- Detalles de la máquina -->
                    <div class="space-y-3 text-[#C1D1D8] mb-6">
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                            <i class="fas fa-barcode text-[#5DA6C3]"></i>
                            <span>SN: 987654321</span>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                            <i class="fas fa-calendar text-[#5DA6C3]"></i>
                            <span>Instalada: 15/01/2024</span>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-[#1a3850]/50 transition-colors">
                            <i class="fas fa-tools text-[#5DA6C3]"></i>
                            <span>Último mantenimiento: 20/03/2024</span>
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="flex justify-between items-center pt-2 border-t border-[#2a5475]/30">
                        <a href="/maquina.php" 
                           class="bg-gradient-to-r from-[#577788] to-[#4a6573] text-white py-2.5 px-5 rounded-lg hover:from-[#132048] hover:to-[#1c2d5f] transition-all duration-300 text-sm font-medium shadow-md hover:shadow-xl flex items-center space-x-2 group">
                            <i class="fas fa-info-circle group-hover:rotate-12 transition-transform"></i>
                            <span>Detalles</span>
                        </a>
                        <button class="text-[#5DA6C3] hover:text-white transition-colors duration-300 p-2 hover:bg-[#1a3850]/50 rounded-lg">
                            <i class="fas fa-qrcode text-2xl hover:scale-110 transition-transform"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page navigation -->
    <div class="flex justify-center items-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class=" inline-flex">
                <li>
                    <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page" class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="/js/nav.js"></script>
</html>