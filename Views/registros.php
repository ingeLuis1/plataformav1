<?php

//include '../Control/sesiones.php';
//validar_acceso(['admin']);
include '../Control/conexionBD.php';
$pdo=conectarBD();



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" href="../Assets/venados.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ruta correcta para vincular el archivo CSS -->
    <link href="../CSS/sis.css" rel="stylesheet" />
    <title></title>
</head>

<body>
    <!-- Modal de error 1-->
    <div id="modalOverlay" class="modal-overlay">
        <div class="modal">
            <span class="close-button" onclick="closeModal()">×</span>
            <p>Correo electrónico o contraseña incorrectos. Inténtalo de nuevo.</p>
        </div>
    </div>
    <div id="modalOverlay2" class="modal-overlay">
        <div class="modal">
            <span class="close-button" onclick="closeModal2()">×</span>
            <p>Usuario no encontrado.</p>
        </div>
    </div>
    <!-- Modal de login -->
    <div id="modalOverlayLogin" class="modal-overlay">
        <div class="modal">
            <span class="close-button" onclick="closeModalLogin()">×</span>
            <p>INICIO EXITOSO</p>
        </div>

    </div>
    <header>
        <nav>
            <div class="logo-container">
                <img src="../Assets/venados.png" alt="TESSFP Logo" class="logo-img">
                <span class="logo-text">TESSFP Ingeniería informática</span>
            </div>
            <div class="menu">
                <a href="../index.html">Inicio</a>
                <a href="#">Bolsa de Trabajo</a>
                <a href="#">Mesas de trabajo</a>
            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <!-- Modal de error -->
    <div id="modalOverlay" class="modal-overlay">
        <div class="modal">
            <span class="close-button" onclick="closeModal()">X</span>
            <p>Usuario</p>
        </div>
    </div>

    <div class="container">
        <div class="info">
            <h1><em>Inicio de Sesión</em></h1><span>Academia Ingeniería Informática</i>
            </span>
        </div>
    </div>
    <div class="form fade-in">

        <table class="styled-table">
            <thead>
                <tr>Fecha</tr>
                <tr>Tipo</tr>
                <tr>Descripcion</tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    </main>
    <script src="../JS/index.js"></script>
    <script src="../JS/modales.js"></script>




</body>

</html>