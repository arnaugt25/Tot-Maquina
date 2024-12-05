<?php if (isset($_SESSION['user']['role']) == 'admin'):  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Usuario - Tot Maquina</title>
    
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
        <nav class="container mx-auto px-6">
            <div class="flex items-center justify-between h-20">
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
                    <i class="fas fa-user-plus mr-4 text-[#5DA6C3]"></i>
                    Añadir Nuevo Usuario
                </h1>
                <p class="text-[#A8C5D6]">Introduce la información del nuevo usuario</p>
            </div>

            <!-- Formulario -->
            <form action="/admin/adduser" method="POST" enctype="multipart/form-data" class="bg-gradient-to-br from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8">
                <!-- Nombre y Apellido -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="name" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-user mr-2 text-[#5DA6C3]"></i>
                            Nombre
                        </label>
                        <input type="text" id="name" name="name" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                    </div>
                    <div>
                        <label for="surname" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-user mr-2 text-[#5DA6C3]"></i>
                            Apellido
                        </label>
                        <input type="text" id="surname" name="surname" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                    </div>
                </div>

                <!-- Username y Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="username" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-user-tag mr-2 text-[#5DA6C3]"></i>
                            Nombre de Usuario
                        </label>
                        <input type="text" id="username" name="username" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                    </div>
                    <div>
                        <label for="email" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-envelope mr-2 text-[#5DA6C3]"></i>
                            Email
                        </label>
                        <input type="email" id="email" name="email" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                    </div>
                </div>

                <!-- Contraseña y Rol -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="password" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-lock mr-2 text-[#5DA6C3]"></i>
                            Contraseña
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                    </div>
                    <div>
                        <label for="role" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-user-shield mr-2 text-[#5DA6C3]"></i>
                            Rol
                        </label>
                        <select id="role" name="role" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                            <option value="user">Usuario</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                </div>

                <!-- Foto de Perfil -->
                <div class="mb-8">
                    <label for="profile_pic" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-image mr-2 text-[#5DA6C3]"></i>
                        Foto de Perfil
                    </label>
                    <input type="file" id="profile_pic" name="profile_pic" accept="image/*"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                </div>

                <!-- Botones -->
                <div class="flex space-x-4">
                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-[#478249] to-[#539959] text-white py-3 px-6 rounded-lg hover:from-[#2D3F58] hover:to-[#3A516D] transition-all duration-300 font-medium flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>
                        Guardar Usuario
                    </button>
                    <a href="/admin"
                        class="flex-1 bg-gradient-to-r from-[#132048] to-[#1D2F6F] text-white py-3 px-6 rounded-lg hover:from-[#1a2a5e] hover:to-[#243a8a] transition-all duration-300 font-medium flex items-center justify-center">
                        <i class="fas fa-times mr-2"></i>
                        Cancelar
                    </a>
                </div>
            </form>

            <!-- Mensajes de alerta -->
            <?php if (isset($success) && $success != "") { ?>
                <div class="mt-6 bg-green-500/10 border border-green-500/30 rounded-lg p-4 animate-fade-in">
                    <div class="flex items-center text-green-500">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span><?= htmlspecialchars($success) ?></span>
                    </div>
                </div>
            <?php } ?>

            <?php if (isset($error) && $error != "") { ?>
                <div class="mt-6 bg-red-500/10 border border-red-500/30 rounded-lg p-4 animate-fade-in">
                    <div class="flex items-center text-red-500">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span><?= htmlspecialchars($error) ?></span>
                    </div>
                </div>
            <?php } ?>

            <!-- Añadir estilos de animación -->
            <style>
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(-10px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                .animate-fade-in {
                    animation: fadeIn 0.3s ease-in-out;
                }
            </style>
        </div>
    </main>
</body>
</html> 
<?php endif; ?>