<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/">
</head>

<header class="bg-[#0C0C04] text-white">
    <!-- Barra de navegación principal -->
    <nav class="container mx-auto px-6">
        <div class="flex items-center justify-between h-20">

            <div class="flex items-center space-x-4">
                <img src="/uploads/images/logototmaquina.png" alt="Logo" class="h-20 transition-transform hover:scale-105">
                <span class="text-xl font-bold text-[#5DA6C3]">Tot Maquina</span>
            </div>
                <h1 class="text-xl font-bold text-[#5DA6C3] items-center justify-center">Panel de Administracion</h1>
            <div class="flex justify-end space-x-4">
                <img
                        src="/uploads/images/config.png"
                        class="w-10 h-10 rounded-full"
                        alt="Configuración"
                />
                <img
                        src="/uploads/images/app.png"
                        class="w-10 h-10 rounded-full"
                        alt="Aplicación"
                />
                <img
                        src="/uploads/images/profile.png"
                        class="w-10 h-10 rounded-full"
                        alt="Perfil"
                />
                <img
                        src="/uploads/images/house.png"
                        class="w-10 h-10 rounded-full"
                        alt="Casa"
                />
            </div>
    </nav>
    <div class="h-screen flex flex-col bg-gray-100">

            <div class="px-6 py-4 bg-neutral-600">
                <nav class="flex flex-col space-y-4">

                    <div class="flex items-center justify-between">
                        <a href="#" class="text-white font-semibold hover:text-blue-500">Usuarios</a>
                        <div class="flex space-x-2">
                            <button class="px-4 py-2 bg-green-500 text-white font-semibold rounded hover:bg-green-600">
                                Añadir
                            </button>
                            <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
                                Editar
                            </button>
                            <button class="px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600">
                                Borrar
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                    <a href="#" class="text-white font-semibold hover:text-blue-500">Máquinas</a>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-green-500 text-white font-semibold rounded hover:bg-green-600">
                            Añadir
                        </button>
                        <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
                            Editar
                        </button>
                        <button class="px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600">
                            Borrar
                        </button>
                    </div>
                    </div>

                    <div class="flex items-center justify-between">
                    <a href="#" class="text-white font-semibold hover:text-blue-500">Incidencias</a>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-green-500 text-white font-semibold rounded hover:bg-green-600">
                            Añadir
                        </button>
                        <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
                            Editar
                        </button>
                        <button class="px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600">
                            Borrar
                        </button>
                    </div>
                    </div>
                </nav>
            </div>



    <main class="flex-1 overflow-y-auto p-6">
            <!-- Tarjetas -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <div class="p-4 bg-[#5DA6C3]  border rounded-lg shadow text-center ">
                    <h2 class="text-lg font-semibold text-white">Total Usuarios</h2>
                    <p class="mt-2 text-3xl font-bold text-gray-600">150</p>
                </div>
                <div class="p-4 bg-[#5DA6C3] border rounded-lg shadow text-center">
                    <h2 class="text-lg font-semibold text-white">Máquinas Activas</h2>
                    <p class="mt-2 text-3xl font-bold text-gray-600">35</p>
                </div>
                <div class="p-4 bg-[#5DA6C3] border rounded-lg shadow text-center">
                    <h2 class="text-lg font-semibold text-white">Incidencias</h2>
                    <p class="mt-2 text-3xl font-bold text-gray-600">8</p>



</header>
<body>
<script src="/js/nav.js"></script>
</body>
</html>
