<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Incidencia - Tot Maquina</title>
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
                    <i class="fa-solid fa-wrench mr-4 text-[#5DA6C3]"></i>
                    Nueva Incidencia
                </h1>
                <p class="text-[#A8C5D6]">Registra una nueva incidencia en el sistema</p>
            </div>

            <form action="/incidencias/crear" method="POST" class="bg-gradient-to-br from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8">
                <!-- Machine -->
                <div class="mb-6">
                    <label class="block text-[#A8C5D6] font-medium mb-2" for="machine">
                        <i class="fas fa-desktop text-[#5DA6C3] mr-2"></i>
                        Máquina
                    </label>
                    <select class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                            id="machine"
                            name="machine"
                            required>
                        <option value="">Seleccione la máquina</option>
                        <?php foreach ($machines as $machine): ?>
                            <option value="<?php echo $machine['machine_id']; ?>"><?php echo $machine['model']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Descripción -->
                <div class="mb-6">
                    <label class="block text-[#A8C5D6] font-medium mb-2" for="description">
                        <i class="fa-solid fa-pen text-[#5DA6C3] mr-2"></i>
                        Descripción
                    </label>
                    <textarea class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                          id="description"
                          name="description"
                          rows="4"
                          placeholder="Describe el problema"
                          required></textarea>
                </div>

                <!-- Técnico -->
                <div class="mb-6">
                    <label class="block text-[#A8C5D6] font-medium mb-2" for="user_id">
                        <i class="fas fa-user text-[#5DA6C3] mr-2"></i>
                        Técnico
                    </label>
                    <select class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                            id="user_id"
                            name="user_id"
                            required>
                        <option value="">Seleccione el técnico</option>
                        <?php foreach ($Users as $user): ?>
                            <option value="<?php echo $user['user_id']; ?>"><?php echo $user['username']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Fecha -->
                <div class="mb-6">
                    <label class="block text-[#A8C5D6] font-medium mb-2" for="assigned_date">
                        <i class="fas fa-calendar-alt text-[#5DA6C3] mr-2"></i>
                        Fecha
                    </label>
                    <input type="date"
                           class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                           id="assigned_date"
                           name="assigned_date"
                           required>
                </div>

                <!-- Prioridad -->
                <div class="mb-6">
                    <label class="block text-[#A8C5D6] font-medium mb-2" for="priority">
                        <i class="fas fa-exclamation-circle text-[#5DA6C3] mr-2"></i>
                        Prioridad
                    </label>
                    <select class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                            id="priority"
                            name="priority"
                            required>
                        <option value="">Seleccione la prioridad</option>
                        <option value="baja">Baja</option>
                        <option value="mediana">Mediana</option>
                        <option value="Urgente">Urgente</option>
                    </select>
                </div>

                <!-- Tipo -->
                <div class="mb-6">
                    <label class="block text-[#A8C5D6] font-medium mb-2" for="type">
                        <i class="fas fa-tools text-[#5DA6C3] mr-2"></i>
                        Tipo
                    </label>
                    <select class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                            id="type"
                            name="type"
                            required>
                        <option value="">Seleccione el tipo</option>
                        <option value="preventivo">Preventivo</option>
                        <option value="correctivo">Correctivo</option>
                    </select>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-4 mt-8">
                    <a href="/admin" class="bg-[#478249] hover:bg-[#054525] text-white font-bold py-2 px-6 rounded-lg transition-colors duration-300">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-[#5DA6C3] hover:bg-[#4A8599] text-white font-bold py-2 px-6 rounded-lg transition-colors duration-300">
                        Crear Incidencia
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>