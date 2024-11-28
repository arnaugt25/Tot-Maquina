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
            <!-- Título -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                    Título
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="titulo" 
                    name="titulo" 
                    required>
                    <option value="">Seleccione un tipo de incidencia</option>
                    <option value="error_arranque">Error de arranque</option>
                    <option value="ruido_anormal">Ruido anormal</option>
                    <option value="sobrecalentamiento">Sobrecalentamiento</option>
                    <option value="vibracion_excesiva">Vibración excesiva</option>
                    <option value="fuga_aceite">Fuga de aceite</option>
                    <option value="falla_electrica">Falla eléctrica</option>
                    <option value="error_sensor">Error en sensores</option>
                    <option value="desgaste_piezas">Desgaste de piezas</option>
                    <option value="bajo_rendimiento">Bajo rendimiento</option>
                    <option value="parada_emergencia">Parada de emergencia</option>
                    <option value="otros">Otros</option>
                </select>
            </div>

            <!-- Campo adicional para "Otros" -->
            <div class="mb-4 hidden" id="otroTitulo">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo_otro">
                    Especifique el título
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="titulo_otro" 
                    name="titulo_otro" 
                    type="text" 
                    placeholder="Especifique el título de la incidencia">
            </div>

            <!-- Responsable -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="responsable">
                    Responsable
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="responsable" 
                    name="responsable" 
                    required>
                    <option value="">Seleccione un técnico</option>
                    <?php foreach($tecnicos as $tecnico): ?>
                        <option value="<?= $tecnico['id'] ?>"><?= $tecnico['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
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
                    <option value="critica">Crítica</option>
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

            <!-- Estado -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="estado">
                    Estado de la Incidencia
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="estado" 
                    name="estado" 
                    required>
                    <option value="">Seleccione un estado</option>
                    <option value="abierta">Abierta</option>
                    <option value="en_tramite">En trámite</option>
                    <option value="cerrada">Cerrada</option>
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

           
            <!-- Botón de envío -->
            <div class="flex justify-end">
                <button class="px-4 py-2 text-sm bg-[#0a2b5e] text-white rounded-md hover:bg-[#081d40] focus:outline-none focus:ring-2 focus:ring-[#0a2b5e] focus:ring-opacity-50 transition duration-150 ease-in-out">
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