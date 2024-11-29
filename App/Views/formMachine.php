<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Máquina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/listmachine.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <header class="bg-[#214969] shadow w-full">
        <div class="w-full px-4 py-2 flex items-center space-x-4">
            <img src="/uploads/images/logototmaquina.png" alt="Logo" class="h-12 transition-transform hover:scale-105">
            <h1 class="text-2xl font-bold tracking-tight text-white">Añadir Máquina</h1>
        </div>
    </header>
    <div class="min-h-screen bg-[#C1D1D8] py-12">
        <form class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg" method="POST" action="/addmachine1" enctype="multipart/form-data">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="model" id="model" 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#214969] peer" 
                    placeholder=" " required />
                <label for="model" 
                    class="absolute text-sm text-gray-600 font-medium duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#214969] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Modelo
                </label>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="created_by" id="created_by" 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#214969] peer" 
                        placeholder=" " required />
                    <label for="created_by" 
                        class="absolute text-sm text-gray-600 font-medium duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#214969] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Fabricante
                    </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="date" name="installation_date" id="installation_date" 
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#214969] peer" 
                        required />
                    <label for="installation_date" 
                        class="absolute text-sm text-gray-600 font-medium duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#214969] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Fecha instalación
                    </label>
                </div>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="serial_number" id="serial_number" 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#214969] peer" 
                    placeholder=" " required />
                <label for="serial_number" 
                    class="absolute text-sm text-gray-600 font-medium duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#214969] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Número serie
                </label>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="file" name="image" id="image" 
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#214969] peer" 
                     />
                <label for="image" 
                    class="absolute text-sm text-gray-600 font-medium duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#214969] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Imagen
                </label>
            </div>
            <button type="submit" 
                class="w-full text-white bg-[#214969] hover:bg-[#5DA6C3] focus:ring-4 focus:outline-none focus:ring-[#C1D1D8] font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out transform hover:scale-105">
                + Añadir
            </button>
        </form>
    </div>
</body>

</html>