<?php
include('../Control/sesiones.php');
validar_acceso(['admin']);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" href="../Assets/venados.png" type="image/x-icon">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/GI.css">
    <link rel="stylesheet" href="../CSS/modal.css">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Grupos de interés</title>
</head>

<body>
    <header>
        <nav>
            <div class="logo-container">
                <img src="../Assets/venados.png" alt="TESSFP Logo" class="logo-img">
                <span class="logo-text">TESSFP</span>
            </div>
            <div class="menu">
                <a href="../index.html">Inicio</a>
                <a href="#">Contacto</a>
                <a href="../Control/cerrarSesion.php">Cerrar Sesión</a>
            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>
    <main>

        <!--MODAL datos subidos -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" id="close">&times;</span>
                <h2>Datos Cargados</h2>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Pregunta</th>
                            <th>Opcion A</th>
                            <th>Opcion B</th>
                            <th>Opcion C</th>
                            <th>Opcion D</th>
                            <th>Opcion E</th>
                            <th>Opcion F</th>
                        </tr>
                    </thead>
                    <tbody id="preguntas">
                    </tbody>

                </table>
            </div>
        </div>
        <!-- FIN MODAL-->

        <h1 class="fade-in">Administrador</h1>


        <div class="gallery fade-in">

            <div class="gallery-item" data-url="#" id="encuestaA" data-type="atributos">
                <!-- Input de tipo file para cargar archivo (oculto) -->
                <input type="file" id="fileInputA" name="encuestaFile" accept=".xlsx" style="display:none;" />
                <img src="https://placehold.co/400x300?text=Cargar\n Encuesta" alt="Logro 1">
                <div class="gallery-item-overlay">
                    <div class="gallery-item-text">
                        <a href="#" class="gallery-item-text">
                            Encuestas atributos</a>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-url="#" id="encuestaO" data-type="objetivos">
                <!-- Input de tipo file para cargar archivo (oculto) -->
                <input type="file" id="fileInputO" name="encuestaFile" accept=".xlsx" style="display:none;" />

                <img src="https://placehold.co/400x300?text=Cargar\n Encuesta" alt="Logro 1">
                <div class="gallery-item-overlay">
                    <div class="gallery-item-text">
                        <a href="#" class="gallery-item-text">
                            Encuestas Objetivos</a>
                    </div>
                </div>
            </div>
            <!--  Encuestas complementarias -->
            <div class="gallery-item" data-url="#" id="egresados" data-type="egresados">
                <!-- Input de tipo file para cargar archivo (oculto) -->
                <input type="file" id="fileInputEgresados" name="encuestaFile" accept=".xlsx" style="display:none;" />
                <img src="https://placehold.co/400x300?text=Cargar\n Encuesta" alt="Logro 1">
                <div class="gallery-item-overlay">
                    <div class="gallery-item-text">
                        <a href="#" class="gallery-item-text">
                            Encuestas egresados más de 5 años</a>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-url="#" id="empleadorN" data-type="empleadorN">
                <!-- Input de tipo file para cargar archivo (oculto) -->
                <input type="file" id="fileInputempleadorN" name="encuestaFile" accept=".xlsx" style="display:none;" />
                <img src="https://placehold.co/400x300?text=Cargar\n Encuesta" alt="Logro 1">
                <div class="gallery-item-overlay">
                    <div class="gallery-item-text">
                        <a href="#" class="gallery-item-text">
                            Empleador sin Contratados</a>
                    </div>
                </div>
            </div>

            <div class="gallery-item" data-url="registros.php">
                <img src="https://placehold.co/400x300?text=Ver registros" alt="Logro 2">
                <div class="gallery-item-overlay">
                    <div class="gallery-item-text">
                        <a href="#" class="gallery-item-text">
                            Registros</a>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-url="#">
                <img src="https://placehold.co/400x300?text=Estadísticas" alt="Logro 3">
                <div class="gallery-item-overlay">
                    <div class="gallery-item-text">
                        <a href="#" class="gallery-item-text">
                            Estadísticas
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </main>
    x
    <script src="../JS/menuHamburguesa.js">    </script>

    <script src="../JS/cargaExcel.js"> </script>
</body>

</html>