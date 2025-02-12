<?php
require_once '../Control/sesiones.php';
validar_acceso(['egresado']);
require_once '../Control/conexionBD.php';

$conexion = conectarBD();
$consultaSQL_bolsaA = "SELECT * FROM bolsa ORDER BY idBolsa DESC";
$stmt = $conexion->prepare($consultaSQL_bolsaA);
$stmt->execute();
$ejecutarConsulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                <a href="../Views/egresado.php">Inicio</a>
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
        <h1 class="fade-in">Vacantes</h1>
        <div class="gallery fade-in">
            <?php foreach ($ejecutarConsulta as $fila) { ?>
                <div class="gallery-item">
                    <img src="https://placehold.co/400x300?text=<?php
                    echo ($fila['titulo']);
                    ?>" alt="Vacante">
                    <div class="gallery-item-overlay">
                        <div class="gallery-item-text">
                            <a href="uploads/<?php echo $fila['archivo']; ?>" target="_blank" class="gallery-item-text">
                                <?php echo $fila['titulo']; ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <script>
        // Menú hamburguesa
        document.querySelector('.hamburger').addEventListener('click', () => {
            document.querySelector('.menu').classList.toggle('active');
            document.querySelector('.hamburger').classList.toggle('active');
        });

        // Animación de fade-in
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.fade-in').forEach((element, index) => {
                setTimeout(() => { element.style.opacity = '1'; }, index * 200);
            });
        });

        // Redirección al hacer clic en la vacante
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('click', (e) => {
                e.stopPropagation();
                const url = item.querySelector('a').href;
                if (url) window.location.href = url;
            });
        });
    </script>

</body>

</html>