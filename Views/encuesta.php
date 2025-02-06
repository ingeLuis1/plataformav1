<?php
include_once '../Control/sesiones.php';

validar_acceso(['egresado', 'empleador']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" href="../Assets/venados.png" type="image/x-icon">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ruta correcta para vincular el archivo CSS -->
    <link href="../CSS/encuesta.css" rel="stylesheet" />

    <title></title>
</head>

<body>
    <header>
        <nav>
            <div class="logo-container">

            </div>
            <div class="menu">

            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>
    <main>
        <h1 class="fade-in">Plataforma de seguimiento a grupos de interés</h1>

        <div class="content fade-in">
            <form id="form-encuesta" action="../Control/respuestas.php" method="post">


            </form>
        </div>
    </main>
    <script src="../JS/index.js">
    </script>
</body>


<script>

    fetch('../Control/encuesta.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            ///renderizar form para mostrar las preguntas del back
            const formBody = document.getElementById('form-encuesta');

            data.forEach(pregunta => {
                const fieldset = document.createElement('fieldset');
                const legend = document.createElement('legend');
                legend.textContent = pregunta.pregunta;
                fieldset.appendChild(legend);

                //añadir las opciones
                const opciones = pregunta.respuestas;
                opciones.forEach(opcion => {
                    const label = document.createElement('label');
                    label.textContent = opcion.etiqueta + ") " + opcion.opcion

                    const input = document.createElement('input');
                    input.type = 'radio';
                    input.name = pregunta.pregunta;  // Asegurar que el nombre sea único para cada pregunta
                    input.value = opcion.id_opcion// Asignar el valor de la opción

                    label.appendChild(input); // Añadir el input al label
                    fieldset.appendChild(label); // Añadir el label al fieldset
                    fieldset.appendChild(document.createElement('br')); // Salto de línea entre opciones
                });

                formBody.appendChild(fieldset);


            });
            const button = document.createElement('button');
            button.type = 'submit'; // Define el tipo del botón como submit
            button.textContent = "Enviar"; // Usa textContent para definir el texto del botón
            button.className = "btn"
            formBody.appendChild(button); // Añades el botón al formulario


        })
        .catch(error => console.error('Error:', error));



</script>

</html>