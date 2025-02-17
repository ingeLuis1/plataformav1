<?php
require_once  '../Control/sesiones.php';
validar_acceso(['egresado']);
require_once  '../Control/conexionBD.php';
$pdo = conectarBD();
$sql = "SELECT * FROM `datos` WHERE id_usuario=:id";
$id = $_SESSION['id_usuario'];
$stmt = $pdo->prepare($sql);
$stmt->bindParam("id", $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$nombre = $user['nombre'] . " " . $user['apellidoP'] . " " . $user['apellidoM'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" href="../Assets/venados.png" type="image/x-icon">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/GI.css">
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
                <a href="#contacto">Contacto</a>
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
        <h1 class="fade-in">Egresados</h1>
        <h3 style="padding-bottom: 20px;">Nombre: <?php echo ($nombre); ?></h3>
        <div>
        <div class="gallery fade-in">
            <div class="gallery-item" data-url="encuestaE.php">
                <img src="https://placehold.co/400x300?text=Encuestas" alt="Logro 1">
                <div class="gallery-item-overlay">
                    <div class="gallery-item-text">
                        <a href="#" class="gallery-item-text">
                            Ae OE</a>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-url="bolsaC.php">
                <img src="https://placehold.co/400x300?text=Bolsa de Trabajo" alt="Logro 2">
                <div class="gallery-item-overlay">
                    <div class="gallery-item-text">
                        <a href="#" class="gallery-item-text">
                            Vacantes</a>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-url="#">
                <img src="https://placehold.co/400x300?text=Mesas de trabajo" alt="Logro 3">
                <div class="gallery-item-overlay">
                    <div class="gallery-item-text">
                        <a href="#" class="gallery-item-text">
                            minutas
                        </a>
                    </div>
                </div>
            </div>
            

        </div>
    </main>
    <script>
        // Menú hamburguesa
        const hamburger = document.querySelector('.hamburger');
        const menu = document.querySelector('.menu');

        hamburger.addEventListener('click', () => {
            menu.classList.toggle('active');
            hamburger.classList.toggle('active');
        });
        // Modal de imagen
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const closeBtn = document.getElementsByClassName('close')[0];

        // Animación de fade-in para elementos con la clase 'fade-in'
        document.addEventListener('DOMContentLoaded', () => {
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach((element, index) => {
                setTimeout(() => {
                    element.style.opacity = '1';
                }, index * 200);
            });
        });


    </script>

    <script>

        document.addEventListener('DOMContentLoaded', () => {
            const galleryItems = document.querySelectorAll('.gallery-item');

            galleryItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const url = item.getAttribute('data-url');
                    if (url) {
                        window.location.href = url; // Redirige a la URL
                    }
                });
            });
        });

    </script>
</body>

</html>