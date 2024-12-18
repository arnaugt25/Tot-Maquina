<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Tot Maquina</title>
    
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
                    <img src="/uploads/logototmaquina.png"" alt="Logo" class="h-20 transition-transform hover:scale-105">
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
                    <i class="fas fa-user-edit mr-4 text-[#5DA6C3]"></i>
                    Editar Perfil
                </h1>
                <p class="text-[#A8C5D6]">Actualiza tu información personal</p>
            </div>

            <!-- Formulario -->
            <form action="/profile/update" method="POST" enctype="multipart/form-data" class="bg-gradient-to-br from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8">
                <!-- Nombre -->
                <div class="mb-6">
                    <label for="name" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-user mr-2 text-[#5DA6C3]"></i>
                        Nombre
                    </label>
                    <input type="text" id="name" name="name" 
                        value="<?= htmlspecialchars($user['name'] ?? '') ?>"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                </div>

                <!-- Apellido -->
                <div class="mb-6">
                    <label for="surname" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-user mr-2 text-[#5DA6C3]"></i>
                        Apellido
                    </label>
                    <input type="text" id="surname" name="surname" 
                        value="<?= htmlspecialchars($user['surname'] ?? '') ?>"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-envelope mr-2 text-[#5DA6C3]"></i>
                        Correo Electrónico
                    </label>
                    <input type="email" id="email" name="email" 
                        value="<?= $user['email'] ?? '' ?>"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                </div>

                <!-- Foto de Perfil Combinado -->
                <div class="mb-8">
                    <label class="block text-[#A8C5D6] font-medium mb-4">
                        <i class="fas fa-camera mr-2 text-[#5DA6C3]"></i>
                        Imagen de Perfil
                    </label>
                    <div class="bg-[#132048] p-6 rounded-lg border border-[#577788]">
                        <!-- Imagen Actual -->
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-24 h-24 rounded-full overflow-hidden bg-[#214969] flex items-center justify-center">
                                <?php if (!empty($user['profile_pic'])): ?>
                                    <img src="/uploads/images/<?= htmlspecialchars($user['profile_pic']) ?>" 
                                         alt="Foto de perfil" 
                                         class="w-full h-full object-cover">
                                <?php else: ?>
                                    <i class="fas fa-user text-4xl text-[#5DA6C3]"></i>
                                <?php endif; ?>
                            </div>
                            <div class="text-[#A8C5D6]">
                                <p class="text-sm mb-2">
                                    <?php if (!empty($user['profile_pic'])): ?>
                                        Archivo actual: <?= htmlspecialchars($user['profile_pic']) ?>
                                    <?php else: ?>
                                        No hay imagen de perfil
                                    <?php endif; ?>
                                </p>
                                <!-- Input para Nueva Imagen -->
                                <input type="file" id="profile_pic" name="profile_pic" accept="image/*"
                                    class="w-full bg-[#1A2B3C] border border-[#577788] rounded-lg px-3 py-2 text-white text-sm placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-1 focus:ring-[#5DA6C3]/50 transition-all">
                                <p class="mt-2 text-xs text-[#577788]">Formatos permitidos: PNG, JPG o JPEG</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contraseña -->
                <div class="mb-8">
                    <label for="new_password" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-lock mr-2 text-[#5DA6C3]"></i>
                        Nueva Contraseña
                    </label>
                    <input type="password" id="new_password" name="new_password" 
                        placeholder="Dejar en blanco para mantener la actual"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                </div>

                <!-- Botones -->
                <div class="flex space-x-4">
                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-[#478249] to-[#539959] text-white py-3 px-6 rounded-lg hover:from-[#2D3F58] hover:to-[#3A516D] transition-all duration-300 font-medium flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>
                        Guardar Cambios
                    </button>
                    <a href="/profile"
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
    <script src="/js/bundle.js"></script>
</body>
</html> 