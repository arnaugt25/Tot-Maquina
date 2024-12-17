<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Máquina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-[#C1D1D8] to-[#8FA9B5] min-h-screen">

    <!-- Contenido Principal -->
    <main class="container mx-auto px-6 py-8">
        <div class="max-w-2xl mx-auto">
            <!-- Cabecera del formulario -->
            <div class="bg-gradient-to-r from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8 mb-8">
                <h1 class="text-3xl font-bold text-white mb-4 flex items-center">
                    <i class="fas fa-cog mr-4 text-[#5DA6C3]"></i>
                    Añadir Nueva Máquina
                </h1>
                <p class="text-[#A8C5D6]">Introduce la información de la nueva máquina</p>
            </div>

            <!-- Formulario -->
            <form class="bg-gradient-to-br from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8" method="POST" action="/addmachine1" enctype="multipart/form-data">
                <!-- Modelo -->
                <div class="relative z-0 w-full mb-6 group">
                    <label for="model" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-cube mr-2 text-[#5DA6C3]"></i>
                        Modelo
                    </label>
                    <input type="text" name="model" id="model"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                        placeholder="Ingrese el modelo" required />
                </div>

                <!-- Fabricante y Fecha de instalación -->
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="created_by" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-industry mr-2 text-[#5DA6C3]"></i>
                            Fabricante
                        </label>
                        <input type="text" name="created_by" id="created_by"
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                            placeholder="Ingrese el fabricante" required />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="installation_date" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-calendar mr-2 text-[#5DA6C3]"></i>
                            Fecha instalación
                        </label>
                        <input type="date" name="installation_date" id="installation_date"
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                            required />
                    </div>
                </div>

                <!-- Número de serie -->
                <div class="relative z-0 w-full mb-6 group">
                    <label for="serial_number" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-barcode mr-2 text-[#5DA6C3]"></i>
                        Número serie
                    </label>
                    <input type="text" name="serial_number" id="serial_number"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                        placeholder="Ingrese el número de serie" required />
                </div>

                <!-- Coordenadas -->
                <div class="relative z-0 w-full mb-6 group">
                    <label for="coordinates" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-map-marker-alt mr-2 text-[#5DA6C3]"></i>
                        Coordenadas
                    </label>
                    <input type="text" name="coordinates" id="coordinates"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                        placeholder="Ejemplo: 41.3851,2.1734"
                        pattern="^\s*-?\d+(\.\d+)?\s*,\s*-?\d+(\.\d+)?\s*$"
                        title="Ingrese las coordenadas en formato: latitud,longitud (ejemplo: 41.3851,2.1734)" />
                    <p class="mt-1 text-sm text-[#A8C5D6]">Formato: latitud,longitud (ejemplo: 41.3851,2.1734)</p>
                </div>

                <!-- Imagen -->
                <div class="relative z-0 w-full mb-8 group">
                    <label for="image" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-image mr-2 text-[#5DA6C3]"></i>
                        Imagen
                    </label>
                    <input type="file" name="image" id="image"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#5DA6C3] file:text-white hover:file:bg-[#4A8A9F]" />
                </div>

                <!-- Botones -->
                <div class="flex space-x-4">
                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-[#478249] to-[#539959] text-white py-3 px-6 rounded-lg hover:from-[#2D3F58] hover:to-[#3A516D] transition-all duration-300 font-medium flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>
                        Guardar Máquina
                    </button>
                    <a href="/list"
                        class="flex-1 bg-gradient-to-r from-[#132048] to-[#1D2F6F] text-white py-3 px-6 rounded-lg hover:from-[#1a2a5e] hover:to-[#243a8a] transition-all duration-300 font-medium flex items-center justify-center">
                        <i class="fas fa-times mr-2"></i>
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </main>
    <script src="/js/bundle.js"></script>
</body>

</html>