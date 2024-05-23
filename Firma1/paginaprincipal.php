<?php   
session_start();

if (!isset($_SESSION['Usuario'])) {
    echo '
        <script>
            alert("Por favor, iniciar sesión");
            window.location = "inicio.php";
        </script>
    ';
    session_destroy();
    die();
}
session_destroy();

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma de PDF en línea</title>
<link rel ="stylesheet" href = "assets/css/paginaprincipal.css">
    <link rel="stylesheet" href="assets/css/cuadrofirma.css">

</head>
<body>
    <div class="container">
        <h1>Bienvenido a la firma Electronica!</h1>
        <a href= "php/cerrar_sesion.php">Cerrar sesion<a>
        <p>Bienvenidos a la firma digital aca puedes firmar tus  pdf!</p>
        <form id="uploadForm" enctype="multipart/form-data">
            <input type="file" id="fileInput" accept=".pdf" style="display: none;">
            <label for="fileInput" class="btn">Seleccionar Archivo PDF</label>
        </form>

        <div id="pdfPreview" class="pdf-preview-container">
            <iframe id="pdfViewer" class="pdf-preview" src="" frameborder="0"></iframe>
        </div>
        <button id="signButton" class="btn">Iniciar Firma Digital</button>
        <form class="Formulario-pad-de-firmas" action="#" method="POST">
            <canvas height="100" width="300" class="pad-de-firmas"></canvas>
                    <a href="#" class="boton-limpiar">Limpiar</a>

                <button class="boton-enviar" type="submit">ENVIAR</button>

           
        </form>
    </div>
    <script src="assets/js/pdfs.js"></script>
    <script src="assets/js/cript1.js"></script>
</body>
</html>
