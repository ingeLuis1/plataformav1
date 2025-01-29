<?php
include '../Control/constancias.php';
generarConstancias();
?>

<!DOCTYPE html>
<html lang="en" th:xlmsn="www.thymeleaf.org">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../static/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../static/assets/css/sistema.css">
    <link rel="stylesheet" href="../static/assets/css/logo.css">

    <title>CONIINT</title>
</head>

<body>
    <header class="main-header clearfix" role="header">
        <div class="logo">
            <div class="header-logo">
                <a href="#"><em>CONAIINT</em> 2024</a>
                <img src="../static/assets/Logo/fondo.png" alt="Logo" class="logo-small">
            </div>
        </div>

        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <li><a href="#">Constancias</a></li>
                <li class="has-submenu">
                <li><a href="sistema.html" class="filter-btn" data-filter="26-11-2024">ASISTENCIAS</a></li>
                </li>
            </ul>
        </nav>
    </header>
    <div class="titulo">
        <h1><em>ASISTENCIAS</em>
        </h1>
        <span>Segundo Congreso Nacional de Ingeniería Informática<i class="fa fa-heart"></i></span>
    </div>
    <div class="container-fluid">
        <object class="pdfView" data="../static/Constancia/constancias_finales.pdf" width="100%" height="600"></object>
        </object>

    </div>
</body>
<script>
    // Alternar la visibilidad del menú en pantallas pequeñas
    document.querySelector('.menu-link').addEventListener('click', function () {
        document.querySelector('.main-menu').classList.toggle('open');
    });
</script>
<script>

</script>

</html>