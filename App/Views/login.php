<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tot Maquina</title>
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-[#C1D1D8] to-[#214969] min-h-screen flex flex-col">
    <!-- Contenido Principal -->
    <main class="flex-grow container mx-auto px-6 py-12 flex items-center justify-center">
        <div class="w-full max-w-md">
            <!-- Card principal -->
            <div class="bg-[#214969] rounded-2xl shadow-2xl p-8 border border-[#577788]">
                <div class="text-center mb-8">
                    <div class="inline-block p-4 rounded-full bg-[#132048] mb-4">
                        <i class="fas fa-user-circle text-6xl text-[#5DA6C3]"></i>
                    </div>
                    <h1 class="text-3xl font-bold mb-2 text-[#C1D1D8]">Bienvenido</h1>
                    <p class="text-[#577788]">Inicia sesión para continuar</p>
                </div>

                <form action="/login" method="POST" class="space-y-6">
                    <!-- Campo Usuario -->
                    <div class="space-y-2">
                        <label for="username" class="block text-sm font-medium text-[#C1D1D8] ml-1">
                            Usuario
                        </label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-[#577788] group-focus-within:text-[#5DA6C3]">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" id="username" name="username" required
                                class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#132048] border border-[#577788] focus:border-[#5DA6C3] focus:outline-none focus:ring-2 focus:ring-[#5DA6C3]/50 text-[#C1D1D8] placeholder-[#577788] transition-all duration-300"
                                placeholder="Introduce tu usuario">
                        </div>
                    </div>

                    <!-- Campo Contraseña -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-[#C1D1D8] ml-1">
                            Contraseña
                        </label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-[#577788] group-focus-within:text-[#5DA6C3]">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" id="password" name="password" required
                                class="w-full pl-10 pr-4 py-3 rounded-xl bg-[#132048] border border-[#577788] focus:border-[#5DA6C3] focus:outline-none focus:ring-2 focus:ring-[#5DA6C3]/50 text-[#C1D1D8] placeholder-[#577788] transition-all duration-300"
                                placeholder="Introduce tu contraseña">
                        </div>
                    </div>

                    <!-- Recordar contraseña y recuperación -->
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="remember" name="remember"
                                class="w-4 h-4 rounded border-[#577788] bg-[#132048] text-[#5DA6C3] focus:ring-[#5DA6C3]/50">
                            <label for="remember" class="text-[#C1D1D8]">
                                Recordarme
                            </label>
                        </div>
                        <a href="#" class="text-[#5DA6C3] hover:text-[#C1D1D8] transition-colors duration-300">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>

                    <!-- Botón de login -->
                    <button type="submit"
                        class="w-full bg-[#051425] hover:bg-[#132048] text-[#C1D1D8] py-3 rounded-xl transition-all duration-300 font-medium text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5" onclick="window.location.href='/'">
                        Iniciar Sesión
                    </button>
                </form>

                <?php if (isset($error) && $error != "") { ?>
                    <div class="mt-4 bg-[#132048] text-[#C1D1D8] p-4 rounded-xl border border-red-500/30">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                            <span><?= $error ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
</body>
</html>