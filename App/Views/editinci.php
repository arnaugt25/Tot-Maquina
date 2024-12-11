<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Incidencias - Tot Maquina</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-[#C1D1D8] to-[#8FA9B5] min-h-screen">
<!-- Header -->
<header class="bg-[#0C0C04] text-white">
    <!-- Barra de navegación principal -->
    <nav class="container mx-auto px-6">
        <div class="flex items-center justify-between h-20">
            <!-- Logo y nombre -->
            <div class="flex items-center space-x-4">
                <img src="/uploads/images/logototmaquina.png" alt="Logo" class="h-20 transition-transform hover:scale-105">
                <span class="text-xl font-bold text-[#5DA6C3]">Tot Maquina</span>
            </div>
        </div>
    </nav>
</header>

<!-- Contenido Principal -->
<main class="container mx-auto px-6 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Cabecera del formulario -->
        <div class="bg-gradient-to-r from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8 mb-8">
            <h1 class="text-3xl font-bold text-white mb-4 flex items-center">
                <i class="fa-solid fa-pen-to-square text-[#5DA6C3]"></i>
                Editar Incidencia
            </h1>
            <p class="text-[#A8C5D6]">Actualiza la informacion de la incidencia</p>
        </div>
        <?php print_r($maintenance);
        ?>
        <form action="/maintenances/update/<?=$maintenance['maintenance_id']?>" method="POST" class="bg-gradient-to-br from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8">
            <!-- <input type="hidden" name="maintenance_id" value="<?=$maintenance['maintenance_id']?>">            Machine -->
            <div class="mb-6">
                <label for="machine_id" class="block text-[#A8C5D6] font-medium mb-2">
                    <i class="fa-solid fa-desktop text-[#5DA6C3]"></i>
                    Maquina
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="machine_id"
                        name="machine_id">

                    <option value="<?= htmlspecialchars($maintenance['machine_id'] ?? '') ?>"><?= htmlspecialchars($maintenance['machine_name'] ?? '') ?></option>
                    <?php foreach ($machine as $machin){?>
                        <option value="<?php echo $machin['machine_id']; ?>" ><?php echo $machin['model']; ?></option>
                    <?php } ?>
                </select>

            </div>

            <!-- Description-->
            <div class="mb-6">
                <label for="description" class="block text-[#A8C5D6] font-medium mb-2">
                    <i class="fa-solid fa-pen text-[#5DA6C3]"></i>
                    Descripcion
                </label>
                <input type="text" id="description" name="description"
                       value="<?= htmlspecialchars($maintenance['description'] ?? '') ?>"
                       class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                       placeholder="Ingrese la descripcion">
            </div>

            <!-- Tecnic -->
            <div class="mb-6">
                <label for="surname" class="block text-[#A8C5D6] font-medium mb-2">
                    <i class="fas fa-user mr-2 text-[#5DA6C3]"></i>
                    Tecnico
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="user_id"
                        name="user_id">
                    <option value="<?= htmlspecialchars($maintenance['user_id'] ?? '') ?>"><?= htmlspecialchars($maintenance['technician_name'] ?? '') ?></option>
                    <?php foreach ($Users as $user){?>
                        <option value="<?php echo $user['user_id'];  ?>"> <?php echo $user['username']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Date -->
            <div class="mb-8">
                <label for="assigned_date" class="block text-[#A8C5D6] font-medium mb-2">
                    <i class="fa-solid fa-calendar-days text-[#5DA6C3]"></i>
                    Fecha
                </label>
                <input type="date" id="assigned_date" name="assigned_date"
                       value="<?= htmlspecialchars($maintenance['assigned_date'] ?? '') ?>"
                       class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all"
                       placeholder="Ingrese la fecha"/>
            </div>

            <!-- Priority -->
            <div class="mb-8">
                <label for="new_password" class="block text-[#A8C5D6] font-medium mb-2">
                    <i class="fa-sharp-duotone fa-regular fa-list text-[#5DA6C3]"></i>
                    Prioridad
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="priority"
                        name="priority">
                    <option><?= htmlspecialchars($maintenance['priority'] ?? '') ?></option>
                    <option value="baja">Baja</option>
                    <option value="media">Media</option>
                    <option value="urgente">Urgente</option>
                </select>
            </div>

            <!-- Type -->
            <div class="mb-8">
                <label for="new_password" class="block text-[#A8C5D6] font-medium mb-2">
                    <i class="fa-sharp-duotone fa-regular fa-list text-[#5DA6C3]"></i>
                    Tipo
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="type"
                        name="type"
                        required>
                    <option><?= htmlspecialchars($maintenance['type'] ?? '') ?></option>
                    <option value="preventivo">Preventivo</option>
                    <option value="correctivo">Correctivo</option>
                    </optgroup>
                </select>
            </div>
            <!-- Save Changes  -->
            <div class="flex space-x-4">
                <button type="submit"
                        class="flex-1 bg-gradient-to-r from-[#478249] to-[#539959] text-white py-3 px-6 rounded-lg hover:from-[#2D3F58] hover:to-[#3A516D] transition-all duration-300 font-medium flex items-center justify-center">
                    <i class="fas fa-save mr-2"></i>
                    Guardar Cambios
                </button>
                <a href="/listinci"
                   class="flex-1 bg-gradient-to-r from-[#132048] to-[#1D2F6F] text-white py-3 px-6 rounded-lg hover:from-[#1a2a5e] hover:to-[#243a8a] transition-all duration-300 font-medium flex items-center justify-center">
                    <i class="fas fa-times mr-2"></i>
                    Cancelar
                </a>
            </div>
        </form>

        <!-- Mensajes de error -->
        <?php if (isset($error) && $error != "") { ?>
            <div class="mt-6 bg-red-500/10 border border-red-500/30 rounded-lg p-4">
                <div class="flex items-center text-red-500">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span><?= htmlspecialchars($error) ?></span>
                </div>
            </div>
        <?php } ?>
    </div>
</main>
</body>
</html>