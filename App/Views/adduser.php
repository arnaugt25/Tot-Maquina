<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Usuario - Tot Maquina</title>
    
    <!-- Favicon links for different devices / Enlaces de favicon para diferentes dispositivos -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    
    <!-- External CSS and JavaScript resources / Recursos externos CSS y JavaScript -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<!-- Main body with gradient background / Cuerpo principal con fondo degradado -->
<body class="bg-gradient-to-br from-[#C1D1D8] to-[#8FA9B5] min-h-screen">
    <!-- Header section with logo / Sección de encabezado con logo -->
    <header class="bg-[#0C0C04] text-white">
        <nav class="container mx-auto px-6">
            <!-- Navigation container / Contenedor de navegación -->
            <div class="flex items-center justify-between h-20">
                <!-- Logo and brand name / Logo y nombre de la marca -->
                <div class="flex items-center space-x-4">
                    <img src="/uploads/logototmaquina.png" alt="Logo" class="h-20 transition-transform hover:scale-105">
                    <span class="text-xl font-bold text-[#5DA6C3]">Tot Maquina</span>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main content section / Sección de contenido principal -->
    <main class="container mx-auto px-6 py-8">
        <div class="max-w-2xl mx-auto">
            <!-- Form header with title / Encabezado del formulario con título -->
            <div class="bg-gradient-to-r from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8 mb-8">
                <h1 class="text-3xl font-bold text-white mb-4 flex items-center">
                    <i class="fas fa-user-plus mr-4 text-[#5DA6C3]"></i>
                    Añadir Nuevo Usuario
                </h1>
                <p class="text-[#A8C5D6]">Introduce la información del nuevo usuario</p>
            </div>

            <!-- User registration form / Formulario de registro de usuario -->
            <form action="/admin/adduser" method="POST" enctype="multipart/form-data" class="bg-gradient-to-br from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8">
                <!-- Name and surname fields / Campos de nombre y apellido -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- First name input / Campo de nombre -->
                    <div>
                        <label for="name" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-user mr-2 text-[#5DA6C3]"></i>
                            Nombre
                        </label>
                        <input type="text" id="name" name="name" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                    </div>
                    <!-- Surname input / Campo de apellido -->
                    <div>
                        <label for="surname" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-user mr-2 text-[#5DA6C3]"></i>
                            Apellido
                        </label>
                        <input type="text" id="surname" name="surname" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                    </div>
                </div>

                <!-- Username and email fields / Campos de nombre de usuario y correo -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Username input / Campo de nombre de usuario -->
                    <div>
                        <label for="username" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-user-tag mr-2 text-[#5DA6C3]"></i>
                            Nombre de Usuario
                        </label>
                        <input type="text" id="username" name="username" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                    </div>
                    <!-- Email input / Campo de correo electrónico -->
                    <div>
                        <label for="email" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-envelope mr-2 text-[#5DA6C3]"></i>
                            Email
                        </label>
                        <input type="email" id="email" name="email" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                    </div>
                </div>

                <!-- Password and role fields / Campos de contraseña y rol -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Password input / Campo de contraseña -->
                    <div>
                        <label for="password" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-lock mr-2 text-[#5DA6C3]"></i>
                            Contraseña
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                    </div>
                    <!-- Role selection / Selección de rol -->
                    <div>
                        <label for="role" class="block text-[#A8C5D6] font-medium mb-2">
                            <i class="fas fa-user-shield mr-2 text-[#5DA6C3]"></i>
                            Rol
                        </label>
                        <select id="role" name="role" required
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                            <option value="user">Usuario</option>
                            <option value="admin">Administrador</option>
                            <option value="tecnico">Técnico</option>
                            <option value="supervisor">Supervisor</option>
                        </select>
                    </div>
                </div>

                <!-- Profile picture upload / Carga de foto de perfil -->
                <div class="mb-8">
                    <label for="profile_pic" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-image mr-2 text-[#5DA6C3]"></i>
                        Foto de Perfil
                    </label>
                    <input type="file" id="profile_pic" name="profile_pic" accept="image/*"
                        class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white placeholder-[#577788] focus:outline-none focus:border-[#5DA6C3] focus:ring-2 focus:ring-[#5DA6C3]/50 transition-all">
                </div>

                <!-- Form action buttons / Botones de acción del formulario -->
                <div class="flex space-x-4">
                    <!-- Save button / Botón de guardar -->
                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-[#478249] to-[#539959] text-white py-3 px-6 rounded-lg hover:from-[#2D3F58] hover:to-[#3A516D] transition-all duration-300 font-medium flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>
                        Guardar Usuario
                    </button>
                    <!-- Cancel button / Botón de cancelar -->
                    <a href="/admin"
                        class="flex-1 bg-gradient-to-r from-[#132048] to-[#1D2F6F] text-white py-3 px-6 rounded-lg hover:from-[#1a2a5e] hover:to-[#243a8a] transition-all duration-300 font-medium flex items-center justify-center">
                        <i class="fas fa-times mr-2"></i>
                        Cancelar
                    </a>
                </div>
            </form>

            <!-- Success message display / Visualización de mensaje de éxito -->
            <?php if (isset($success) && $success != "") { ?>
                <div class="mt-6 bg-green-500/10 border border-green-500/30 rounded-lg p-4 animate-fade-in">
                    <div class="flex items-center text-green-500">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span><?= htmlspecialchars($success) ?></span>
                    </div>
                </div>
            <?php } ?>

            <!-- Error message display / Visualización de mensaje de error -->
            <?php if (isset($error) && $error != "") { ?>
                <div class="mt-6 bg-red-500/10 border border-red-500/30 rounded-lg p-4 animate-fade-in">
                    <div class="flex items-center text-red-500">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span><?= htmlspecialchars($error) ?></span>
                    </div>
                </div>
            <?php } ?>

            <!-- Animation styles for alerts / Estilos de animación para las alertas -->
            <style>
                /* Fade in animation / Animación de aparición gradual */
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
    
    <!-- JavaScript bundle inclusion / Inclusión del paquete JavaScript -->
    <script src="/js/bundle.js"></script>
</body>
</html> 
