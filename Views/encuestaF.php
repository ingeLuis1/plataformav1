<?php
include '../Control/sesiones.php';
validar_acceso(['egresado', 'empleador']);


echo ($_SESSION['id_usuario'])
    ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" href="../Assets/venados.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/encuesta.css" rel="stylesheet" />
    <title></title>
</head>

<body>
    <header>
        <nav>
            <label hidden id="id"><?php echo ($_SESSION['id_usuario']) ?></label>
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
            <form id="form-encuesta">


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
                    /////
                    //
                    // Asignar una clase para identificar fácilmente las opciones
                    input.classList.add('opcion-pregunta');
                    ///
                    // Crear un campo hidden para el id de la pregunta
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'id_pregunta_' + pregunta.id_pregunta;  // Nombre único para cada id_pregunta
                    hiddenInput.value = pregunta.id_pregunta;


                    label.appendChild(hiddenInput);
                    label.appendChild(input); // Añadir el input al label
                    fieldset.appendChild(label); // Añadir el label al fieldset
                    fieldset.appendChild(document.createElement('br')); // Salto de línea entre opciones
                });

                formBody.appendChild(fieldset);
            });
            const button = document.createElement('button');
            button.textContent = "Enviar"; // Usa textContent para definir el texto del botón
            button.className = "btn"
            button.addEventListener('click', enviarForm);
            formBody.appendChild(button); // Añades el botón al formulario


        })
        .catch(error => console.error('Error:', error));

    function enviarForm(e) {
        e.preventDefault();
        console.log("si")
        const respuestas = [];

        // Obtener todas las opciones seleccionadas
        const opcionesSeleccionadas = document.querySelectorAll('input[type="radio"]:checked');

        const idUsuario = document.getElementById('id').textContent;
        console.log(idUsuario)
        opcionesSeleccionadas.forEach(input => {
            // Obtener el id de la pregunta desde el input oculto
            const idPregunta = input.previousElementSibling.value; // El hidden input contiene el id_pregunta

            // Crear un objeto con la información de la respuesta
            respuestas.push({
                id_usuario: idUsuario,
                id_pregunta: idPregunta,
                id_opcion: input.value // id_opcion de la opción seleccionada
            });
        });
        fetch('../Control/respuestas.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ respuestas: respuestas })
        })
            .then(response => response.json())
            .then(data => {
                console.log('Respuestas enviadas correctamente', data);
                if (data.success) {
                    alert("Registro exitoso, Gracias por su retroalimentación");
                    window.location.href("../")
                } else {
                    alert("Respuestas no registradas, intentelo nuevamente")
                }
            })
            .catch(error => {
                console.error('Error al enviar las respuestas:', error);
            });

        console.log(respuestas)
    }

</script>

</html>