<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Incidencias</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-6 text-center text-white">Formulario de Incidencias</h1>
        
        <form action="/incidencias/crear" method="POST" class="bg-blue-200 shadow-md rounded px-8 pt-6 pb-8 mb-4">

            <!-- Machine -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="responsable">
                    Maquina
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="maquina"
                        name="maquina"
                        required>
                    <option value="">Seleccione la maquina</option>
                        <?php foreach ($machines as $machine){?>
                        <option value=""><?php echo $machine["model"];?></option>
                        <?php }?>
                </select>
            </div>
            <!-- Descripción -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                    Descripción
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                          id="descripcion"
                          name="descripcion"
                          rows="4"
                          placeholder="Describe el problema"
                          required></textarea>
            </div>
            <!-- Tecnic -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="responsable">
                    Tecnico
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="responsable" 
                    name="responsable" 
                    required>
                    <option value="">Seleccione el tecnico</option>
                    <?php foreach ($technicians as $technician){?>
                        <option value=""><?php echo $technician["username"];?></option>
                    <?php }?>
                </select>
            </div>
            <!-- Fecha -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha">
                    Fecha
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="fecha"
                       name="fecha"
                       type="date"
                       required>
            </div>

            <!-- Prioridad -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prioridad">
                    Prioridad
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="prioridad" 
                    name="prioridad" 
                    required>
                    <option value="">Seleccione la prioridad</option>
                    <option value="baja">Baja</option>
                    <option value="mediana">Mediana</option>
                    <option value="critica">Urgente</option>
                </select>
            </div>
            <!-- Tipo -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prioridad">
                    Tipo
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="tipo"
                        name="tipo"
                        required>
                    <option value="">Seleccione el tipo</option>
                    <option value="baja">Preventivo</option>
                    <option value="mediana">Correctivo</option>
                </select>
            </div>
            <!-- Botón de envío -->
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 text-sm bg-[#0a2b5e] text-white rounded-md hover:bg-[#081d40] focus:outline-none focus:ring-2 focus:ring-[#0a2b5e] focus:ring-opacity-50 transition duration-150 ease-in-out">
                    Enviar
                </button>
            </div>
        </form>
    </div>

    <style>
        select:focus, input:focus, textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }
        
        select, input[type="date"], textarea {
            transition: all 0.3s ease-in-out;
        }

        select:hover, input:hover, textarea:hover {
            border-color: #3b82f6;
        }

        .bg-blue-200 {
            background: linear-gradient(to bottom right, #bfdbfe, #93c5fd);
        }
    </style>
</body>
</html>