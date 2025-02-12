<?php
require_once  '../Control/sesiones.php';
validar_acceso(['egresado']);
require_once  '../Control/conexionBD.php';

$conexion=new mysqli($host,$user,$pass,$db) or die ("Error al conectarse con la base de datos".$mysqli->error);
$consultaSQL_bolsaA="Select * from bolsa ORDER BY idBolsa DESC";
 //ejecutamos la consulta 
 $ejecutarConsulta=$conexion->query($consultaSQL_bolsaA); 


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
    <style>
    </style>
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
                <a href="#">----</a>
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
        <?php while ($fila=$ejecutarConsulta->fetch_array()){ ?>
            <div class="gallery-item" data-url="#">
            
                <img src="https://placehold.co/400x300?text=<?php 
                
                $fecha= date("d/m/Y");
                    if($fecha == $fila[3]){
              
                        echo "Vacante Nuevo";
                }else{
                        echo "".$fila[1];
                      //  echo $fila[1];
                    }
                ?>" alt="Logro 2">
                <div class="gallery-item-overlay">
                    <div class="gallery-item-text">
                        <a href="uploads/<?php echo $fila[2];?>" class="gallery-item-text" target="_blank">
                        <?php  echo "".$fila[1];?> </a>
                    </div>
                </div> </div><?php } ?> 
          
         

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