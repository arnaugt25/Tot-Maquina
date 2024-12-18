<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Máquina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-[#C1D1D8] to-[#8FA9B5] min-h-screen">
    <!-- Main content / Contenido principal -->
    <main class="container mx-auto px-6 py-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header of the form / Cabecera del formulario -->
            <div class="bg-gradient-to-r from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8 mb-8">
                <h1 class="text-3xl font-bold text-white mb-4 flex items-center">
                    <i class="fas fa-cog mr-4 text-[#5DA6C3]"></i>
                    Editar Máquina
                </h1>
                <p class="text-[#A8C5D6]">Introduce la información de la nueva máquina</p>
            </div>

            <!-- Form to update the machine information / Formulario para actualizar la información de la máquina -->
            <form class="bg-gradient-to-br from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8" method="POST" action="/updatemachine?machine_id=<?= htmlspecialchars($machine['machine_id']) ?>" enctype="multipart/form-data">
                <!-- Model input / Campo de modelo -->
                <div class="relative z-0 w-full mb-6 group">
                    <label for="model" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-cube mr-2 text-[#5DA6C3]"></i>
                        Modelo
                    </label>
                    <input type="text" name="model" id="model"
                        value="<?= htmlspecialchars($machine['model']) ?>"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                        placeholder="Ingrese la maquina" required />
                </div>

                <!-- Manufacturer and installation date -->
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="created_by" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-industry mr-2 text-[#5DA6C3]"></i>
                            Fabricante
                        </label>
                        <input type="text" name="created_by" id="created_by"
                            value="<?= htmlspecialchars($machine['created_by']) ?>"
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                            placeholder="Ingrese el fabricante" required />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="installation_date" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-calendar mr-2 text-[#5DA6C3]"></i>
                            Fecha instalación
                        </label>
                        <input type="date" name="installation_date" id="installation_date"
                            value="<?= htmlspecialchars($machine['installation_date']) ?>"
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                            required />
                    </div>
                </div>

                <!-- Serial number -->
                <div class="relative z-0 w-full mb-6 group">
                    <label for="serial_number" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-barcode mr-2 text-[#5DA6C3]"></i>
                        Número serie
                    </label>
                    <input type="text" name="serial_number" id="serial_number"
                        value="<?= htmlspecialchars($machine['serial_number']) ?>"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                        placeholder="Ingrese el número de serie" required />
                </div>

                <!-- Coordinates -->
                <div class="relative z-0 w-full mb-6 group">
                    <label for="coordinates" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-barcode mr-2 text-[#5DA6C3]"></i>
                        Cordenadas
                    </label>
                    <input type="text" name="coordinates" id="coordinates"
                        value="<?= htmlspecialchars($machine['coordinates']) ?>"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                        placeholder="Ingrese las coordenadas" required />
                </div>


                <!-- Image -->
                <div class="relative z-0 w-full mb-8 group">
                    <label for="image" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-image mr-2 text-[#5DA6C3]"></i>
                        Imagen
                    </label>
                    <input type="file" name="image" id="image"
                        value="<?= htmlspecialchars($machine['image']) ?>"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#5DA6C3] file:text-white hover:file:bg-[#4A8A9F]" />
                </div>

                <!-- Buttons -->
                <div class="flex space-x-4">
                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-[#478249] to-[#539959] text-white py-3 px-6 rounded-lg hover:from-[#2D3F58] hover:to-[#3A516D] transition-all duration-300 font-medium flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>
                        Guardar Máquina
                    </button>
                    <a href="/addlist"
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