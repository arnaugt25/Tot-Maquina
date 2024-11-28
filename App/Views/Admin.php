<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador Tot Maquina - Gestión de Usuarios, Máquinas e Incidencias</title>
    <meta name="description" content="Panel de administración de Tot Maquina para la gestión de usuarios, máquinas e incidencias del sistema">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/">
</head>

<header class="bg-[#0C0C04] text-white">
    <nav class="container mx-auto px-2" aria-label="Navegación principal">
        <div class="flex flex-col md:flex-row items-center justify-between h-auto md:h-20 py-4 md:py-0">
            <div class="flex items-center space-x-2 -ml-2 mb-4 md:mb-0">
                <a href="/" aria-label="Inicio - Logo Tot Maquina" class="inline-block">
                    <img src="/uploads/images/logototmaquina.png" 
                         alt="Logo de Tot Maquina: engranaje azul con las letras TM" 
                         class="h-16 md:h-20 transition-transform hover:scale-105"
                         aria-label="Logo corporativo de Tot Maquina"
                         longdesc="/descripciones/logo-totmaquina.html">
                </a>
                <span class="text-xl md:text-2xl font-bold text-[#FFFFFF]">Tot Maquina</span>
            </div>
            
            <h1 class="text-xl md:text-2xl font-bold text-[#FFFFFF] mb-4 md:mb-0">Panel de Administracion</h1>
            
            <nav role="navigation" aria-label="Menú de acciones rápidas">
                <ul class="flex justify-center md:justify-end space-x-4 list-none">
                    <li>
                        <a href="/configuracion" class="inline-block" aria-label="Ir a configuración del sistema">
                            <img src="/uploads/images/config.png" class="w-8 h-8 md:w-10 md:h-10 rounded-full" 
                                 alt="Icono de engranaje para configuración"/>
                        </a>
                    </li>
                    <li>
                        <a href="/aplicacion" class="inline-block" aria-label="Ir a la aplicación principal">
                            <img src="/uploads/images/app.png" class="w-8 h-8 md:w-10 md:h-10 rounded-full" 
                                 alt="Icono de aplicación: cuadrado con flecha"/>
                        </a>
                    </li>
                    <li>
                        <a href="/perfil" class="inline-block" aria-label="Ir a tu perfil de usuario">
                            <img src="/uploads/images/profile.png" class="w-8 h-8 md:w-10 md:h-10 rounded-full" 
                                 alt="Icono de perfil: silueta de persona"/>
                        </a>
                    </li>
                    <li>
                        <a href="/" class="inline-block" aria-label="Volver a la página principal">
                            <img src="/uploads/images/house.png" class="w-8 h-8 md:w-10 md:h-10 rounded-full" 
                                 alt="Icono de casa para página de inicio"/>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
    <div class="px-2 md:px-6 py-4 bg-[#2C2C2C]">
        <nav class="flex flex-col space-y-4">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                <a href="#" class="text-[#FFFFFF] font-semibold hover:text-[#9FDDFA] mb-2 md:mb-0">Usuarios</a>
                <div class="flex flex-wrap gap-2">
                    <button class="px-3 md:px-4 py-2 bg-[#03671b] text-white text-sm md:text-base font-semibold rounded hover:bg-[#024d14]">
                        Añadir
                    </button>
                    <button class="px-3 md:px-4 py-2 bg-[#0a4b8c] text-white text-sm md:text-base font-semibold rounded hover:bg-[#083a6d]">
                        Editar
                    </button>
                    <button class="px-3 md:px-4 py-2 bg-[#8c1515] text-white text-sm md:text-base font-semibold rounded hover:bg-[#6d1010]">
                        Borrar
                    </button>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                <a href="#" class="text-[#FFFFFF] font-semibold hover:text-[#9FDDFA] mb-2 md:mb-0">Máquinas</a>
                <div class="flex flex-wrap gap-2">
                    <button class="px-3 md:px-4 py-2 bg-[#03671b] text-white text-sm md:text-base font-semibold rounded hover:bg-[#024d14]">
                        Añadir
                    </button>
                    <button class="px-3 md:px-4 py-2 bg-[#0a4b8c] text-white text-sm md:text-base font-semibold rounded hover:bg-[#083a6d]">
                        Editar
                    </button>
                    <button class="px-3 md:px-4 py-2 bg-[#8c1515] text-white text-sm md:text-base font-semibold rounded hover:bg-[#6d1010]">
                        Borrar
                    </button>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                <a href="#" class="text-[#FFFFFF] font-semibold hover:text-[#9FDDFA] mb-2 md:mb-0">Incidencias</a>
                <div class="flex flex-wrap gap-2">
                    <button class="px-3 md:px-4 py-2 bg-[#03671b] text-white text-sm md:text-base font-semibold rounded hover:bg-[#024d14]">
                        Añadir
                    </button>
                    <button class="px-3 md:px-4 py-2 bg-[#0a4b8c] text-white text-sm md:text-base font-semibold rounded hover:bg-[#083a6d]">
                        Editar
                    </button>
                    <button class="px-3 md:px-4 py-2 bg-[#8c1515] text-white text-sm md:text-base font-semibold rounded hover:bg-[#6d1010]">
                        Borrar
                    </button>
                </div>
            </div>
        </nav>
    </div>

    <main class="flex-1 overflow-y-auto p-2 md:p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="p-4 bg-[#1B4B5F] border rounded-lg shadow text-center">
                <h2 class="text-base md:text-lg font-semibold text-[#FFFFFF]">Total Usuarios</h2>
                <p class="mt-2 text-2xl md:text-3xl font-bold text-[#FFFFFF]">150</p>
            </div>
            <div class="p-4 bg-[#1B4B5F] border rounded-lg shadow text-center">
                <h2 class="text-base md:text-lg font-semibold text-[#FFFFFF]">Máquinas Activas</h2>
                <p class="mt-2 text-2xl md:text-3xl font-bold text-[#FFFFFF]">35</p>
            </div>
            <div class="p-4 bg-[#1B4B5F] border rounded-lg shadow text-center">
                <h2 class="text-base md:text-lg font-semibold text-[#FFFFFF]">Incidencias</h2>
                <p class="mt-2 text-2xl md:text-3xl font-bold text-[#FFFFFF]">8</p>
            </div>
        </div>
    </main>
</header>
<body>
<script src="/js/nav.js"></script>
</body>
</html>
