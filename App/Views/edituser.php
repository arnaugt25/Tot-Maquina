<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="/main.css">
    
    <!-- CDN alternativo para Tailwind -->
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    
    <!-- CDN alternativo para Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
          crossorigin="anonymous" 
          referrerpolicy="no-referrer" />
</head>
<body class="bg-gradient-to-br from-[#C1D1D8] to-[#8FA9B5] min-h-screen">
    <main class="container mx-auto px-6 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-gradient-to-r from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8 mb-8">
                <h1 class="text-3xl font-bold text-white mb-4 flex items-center">
                    <i class="fas fa-user-edit mr-4 text-[#5DA6C3]"></i>
                    Editar Usuario
                </h1>
                <p class="text-[#A8C5D6]">Actualiza la información del usuario seleccionado</p>
            </div>

            <form action="/admin/edituser/<?=($user['user_id']) ?>" method="POST" enctype="multipart/form-data" class="bg-gradient-to-br from-[#214969] to-[#2C5F88] rounded-xl shadow-2xl p-8">
                <input type="hidden" name="user_id" value="<?=($user['user_id']) ?>">
                <div class="mb-6">
                    <label for="name" class="block text-[#A8C5D6] font-medium mb-2">Nombre</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="<?=($user['name']) ?>"
                           class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white" 
                           required>
                </div>

                <div class="mb-6">
                    <label for="surname" class="block text-[#A8C5D6] font-medium mb-2">Apellido</label>
                    <input type="text" 
                           id="surname" 
                           name="surname" 
                           value="<?=($user['surname']) ?>"
                           class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white" 
                           required>
                </div>

                <div class="mb-6">
                    <label for="username" class="block text-[#A8C5D6] font-medium mb-2">Usuario</label>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           value="<?=($user['username']) ?>"
                           class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white" 
                           required>
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-[#A8C5D6] font-medium mb-2">Email</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="<?=($user['email']) ?>"
                           class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white" 
                           required>
                </div>

                <div class="mb-6">
                    <label for="role" class="block text-[#A8C5D6] font-medium mb-2">Rol</label>
                    <select id="role" 
                            name="role" 
                            class="w-full bg-[#132048] border border-[#577788] rounded-lg px-4 py-3 text-white" 
                            required>
                        <option value="admin" <?= ($user['role'] === 'admin') ? 'selected' : '' ?>>Administrador</option>
                        <option value="user" <?= ($user['role'] === 'user') ? 'selected' : '' ?>>Usuario</option>
                        <option value="tecnico" <?= ($user['role'] === 'tecnico') ? 'selected' : '' ?>>Técnico</option>
                        <option value="supervisor" <?= ($user['role'] === 'supervisor') ? 'selected' : '' ?>>Supervisor</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-[#A8C5D6] font-medium mb-4">Imagen de perfil actual</label>
                    <div class="bg-[#132048] p-6 rounded-lg border border-[#577788]">
                        <?php if (!empty($user['profile_pic'])): ?>
                            <div class="flex items-center space-x-4">
                                <div class="w-24 h-24 rounded-full overflow-hidden bg-[#214969] flex items-center justify-center">
                                    <img src="/uploads/images/<?=($user['profile_pic']) ?>" 
                                         alt="Foto de perfil" 
                                         class="w-full h-full object-cover">
                                </div>
                                <div class="text-[#A8C5D6]">
                                    <p class="text-sm"><?=($user['profile_pic']) ?></p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="flex items-center justify-center">
                                <div class="w-24 h-24 rounded-full bg-[#214969] flex items-center justify-center">
                                    <i class="fas fa-user text-4xl text-[#5DA6C3]"></i>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="profile_pic" class="block text-[#A8C5D6] font-medium mb-2">
                        <i class="fas fa-camera mr-2 text-[#5DA6C3]"></i>
                        Nueva imagen de perfil
                    </label>
                    <div class="bg-[#132048] p-6 rounded-lg border border-[#577788] hover:border-[#5DA6C3] transition-colors">
                        <div class="flex items-center justify-center w-full">
                            <label for="profile_pic" class="flex flex-col items-center justify-center w-full cursor-pointer">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-[#5DA6C3] mb-3"></i>
                                    <p class="mb-2 text-sm text-[#A8C5D6]"><span class="font-medium">Click para subir</span> o arrastra y suelta</p>
                                    <p class="text-xs text-[#577788]">PNG, JPG o JPEG (MAX. 800x800px)</p>
                                </div>
                                <input type="file" 
                                       id="profile_pic" 
                                       name="profile_pic" 
                                       accept="image/*"
                                       class="hidden">
                            </label>
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-[#577788]">Deja este campo vacío si no deseas cambiar la imagen actual</p>
                </div>

                <div class="flex space-x-4">
                    <button type="submit"
                            class="flex-1 bg-gradient-to-r from-[#478249] to-[#539959] text-white py-3 px-6 rounded-lg hover:from-[#2D3F58] hover:to-[#3A516D] transition-all duration-300 font-medium flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>
                        Guardar Cambios
                    </button>
                    <a href="/admin"
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