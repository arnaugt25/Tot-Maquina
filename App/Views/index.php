<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TotMàquina</title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .logo {
            width: 50px;
            height: 50px;
        }

        .search-bar {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 20px;
        }

        /* Carrusel */
        .carousel {
            position: relative;
            margin: 20px 0;
        }

        .carousel-image {
            width: 100%;
            height: 200px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-arrows {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        /* Sección de máquinas */
        .machines-section {
            padding: 20px;
        }

        .machines-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .machines-map {
            width: 100%;
            height: 200px;
            background-color: #f0f0f0;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .view-map-btn {
            background-color: #000;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        /* Footer */
        .footer {
            background-color: #a7c5d6;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <img src="/uploads/images/logototmaquina.png" alt="Logo" class="logo">
        <input type="search" placeholder="Buscar máquina" class="search-bar">
    </header>

    <!-- Carrusel -->
    <div class="carousel">
        <div class="carousel-image">
            Texto e imagen
        </div>
        <div class="carousel-arrows">
            <span>←</span>
            <span>→</span>
        </div>
    </div>

    <!-- Sección de máquinas -->
    <section class="machines-section">
        <h2 class="machines-title">Máquinas 🔧</h2>
        <div class="machines-map">
            Mapa con ubicación de máquinas
        </div>
        <button class="view-map-btn">+ Abrir mapa</button>
    </section>

    <!-- Footer -->
    <footer class="footer">
        Footer
    </footer>
</body>
</html>