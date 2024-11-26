<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista máquinas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/listmachine.css">

</head>

<body class="bg-[#C1D1D8] text-gray-800">
    <header class="bg-[#0C0C04] text-white">
        <nav class="container mx-auto px-6">
            <div class="flex items-center justify-between h-20">
                <!-- Logo y nombre -->
                <div class="flex items-center space-x-2">
                    <img src="/public/uploads/images/logototmaquina.png" alt="Logo" class="h-20 ">
                    <span class="text-xl font-bold text-[#5DA6C3]">Tot Maquina</span>
                </div>
                <!-- Enlaces de navegación -->
                <div class="hidden md:block">
                    <div class="flex items-center space-x-8">
                        <a href="#" class="bg-[#214969] hover:bg-[#478249] text-white px-4 py-2 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
                            Inicio
                        </a>
                    </div>
                </div>
        </nav>
    </header>
    <!-- Target -->
    <div class="flex justify-start">
        <div class="mt-20  ml-80 bg-[#2D3F58]  w-80 min-w-[20rem] rounded overflow-hidden shadow-lg">
            <img class="w-full" src="" alt="Imge Maquina">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">TITLE</div>
                <p class="text-gray-700 text-base">
                    LLL
                </p>
            </div>
            <div class="flex justify-center items-center">
                <a href="#" class="bg-[#2D3F58] text-white py-4 px-8 rounded-lg hover:bg-[#132048] transition-colors duration-200 text-lg font-medium shadow-md hover:shadow-xl">
                    Detalles
                </a>
            </div>
        </div>
        <div class="mt-20  ml-40 bg-[#2D3F58]  w-80 min-w-[20rem] rounded overflow-hidden shadow-lg">
            <img class="w-full" src="" alt="Imge Maquina">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">TITLE</div>
                <p class="text-gray-700 text-base">
                    LLL
                </p>
            </div>
            <div class="flex justify-center items-center">
                <a href="#" class="bg-[#2D3F58] text-white py-4 px-8 rounded-lg hover:bg-[#132048] transition-colors duration-200 text-lg font-medium shadow-md hover:shadow-xl">
                    Detalles
                </a>
            </div>
        </div>
    </div>
    <!-- Page navigation -->
    <div class="flex justify-center items-center h-screen">
        <nav aria-label="Page navigation example">
            <ul class=" inline-flex -space-x-px text-base h-10">
                <li>
                    <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page" class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</body>

</html>