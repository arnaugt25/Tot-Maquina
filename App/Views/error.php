<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error - Tot Maquina</title>
  
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-[#C1D1D8] min-h-screen flex flex-col">
  <!-- Header -->

  <!-- Contenido Principal -->
  <main class="flex-grow container mx-auto px-6 py-12">
    <div class="max-w-2xl mx-auto bg-[#214969] rounded-xl shadow-lg p-8 text-white">
      <div class="text-center mb-8">
        <i class="fas fa-exclamation-triangle text-6xl text-[#5DA6C3] mb-4"></i>
        <h1 class="text-3xl font-bold mb-4">¡Ups! Algo ha salido mal</h1>
        <!-- Error message display / Visualización de mensaje de error -->
        <?php if (isset($error) && $error != "") { ?>
          <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php } ?>
        <!-- Error message display / Visualización de mensaje de error -->
        <p class="text-[#C1D1D8] mb-8">
          Ha ocurrido un error inesperado. Por favor, inténtalo de nuevo más tarde.
        </p>
        
        <div class="space-y-4">
          <!-- Back to admin panel button / Botón de volver al panel de administración -->
          <a href="/admin" class="inline-block bg-[#478249] hover:bg-[#2D3F58] text-white px-6 py-3 rounded-lg transition-colors duration-300">
            <i class="fas fa-home mr-2"></i> Volver al panel de administración
          </a>
        </div>
      </div>
    </div>
  </main>
          
</body>
</html>