<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags / Metatags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Notificaciones Toast</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/App/css/estilos.css" />
    <script src="index.js" defer></script>
</head>
<body>
    <!-- Container for alerts / Contenedor para alertas -->
<div class="contenedor">
    <div class="hero">
        <!-- Title of the alerts / Título de las alertas -->
        <h1 class="titulo">Notificaciones</h1>
        <!-- Buttons container / Contenedor de botones -->
        <div class="contenedor-botones" id="contenedor-botones">
            <!-- Success button / Botón de éxito -->
            <button class="btn exito" data-tipo="exito">Exito</button>
            <!-- Error button / Botón de error -->
            <button class="btn error" data-tipo="error">Error</button>
            <!-- Info button / Botón de información -->
            <button class="btn info" data-tipo="info">Info</button>
            <!-- Warning button / Botón de advertencia -->
            <button class="btn warning" data-tipo="warning">Warning</button>
        </div>
    </div>
    <!-- Toast container / Contenedor de toast -->
    <div class="contenedor-toast" id="contenedor-toast">
        <!-- Success toast / Toast de éxito -->
        <div class="toast exito" id="1">
            <div class="contenido">
                <div class="icono">
                    <!-- Success icon / Icono de éxito -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"
                        />
                    </svg>
                </div>
                <div class="texto">
                    <!-- Success title / Título de éxito -->
                    <p class="titulo">Exito!</p>
                    <!-- Success description / Descripción de éxito -->
                    <p class="descripcion">La operación fue exitosa.</p>
                </div>
            </div>
            <button class="btn-cerrar">
                <div class="icono">
                    <!-- Close icon / Icono de cierre -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                        />
                    </svg>
                </div>
            </button>
        </div>
        <div class="toast error" id="2">
            <div class="contenido">
                <div class="icono">
                    <!-- Error icon / Icono de error -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                        />
                    </svg>
                </div>
                <div class="texto">
                    <!-- Error title / Título de error -->
                    <p class="titulo">Error!</p>
                    <!-- Error description / Descripción de error -->
                    <p class="descripcion">Hubo un error al intentar procesar la operación.</p>
                </div>
            </div>
            <button class="btn-cerrar">
                <div class="icono">
                    <!-- Close icon / Icono de cierre -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                        />
                    </svg>
                </div>
            </button>
        </div>
        <div class="toast info" id="3">
            <div class="contenido">
                <div class="icono">
                    <!-- Info icon / Icono de información -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                        />
                    </svg>
                </div>
                <div class="texto">
                    <!-- Info title / Título de información -->
                    <p class="titulo">Info</p>
                    <!-- Info description / Descripción de información -->
                    <p class="descripcion">Esta es una notificacion informativa.</p>
                </div>
            </div>
            <button class="btn-cerrar">
                <div class="icono">
                    <!-- Close icon / Icono de cierre -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                        />
                    </svg>
                </div>
            </button>
        </div>
        <div class="toast warning" id="4">
            <div class="contenido">
                <div class="icono">
                    <!-- Warning icon / Icono de advertencia -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                        />
                    </svg>
                </div>
                <div class="texto">
                    <!-- Warning title / Título de advertencia -->
                    <p class="titulo">Advertencia</p>
                    <!-- Warning description / Descripción de advertencia -->
                    <p class="descripcion">Esta notificación es para advertirte sobre algo.</p>
                </div>
            </div>
            <button class="btn-cerrar">
                <div class="icono">
                    <!-- Close icon / Icono de cierre -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                        />
                    </svg>
                </div>
            </button>
        </div>
    </div>
</div>
<script src="/js/bundle.js"></script>
</body>
</html>