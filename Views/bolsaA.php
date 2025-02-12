<?php
include '../Control/sesiones.php';
validar_acceso(['empleador']);
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
    <link rel="stylesheet" href="../CSS/bolsaAlta.css">
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
                <a href="../Views/empleador.php">Inicio</a>
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

        <div class="container">
            <div class="left">
                <!-- Formulario para agregar un nuevo anuncio -->
                <form id="anuncio-form" class="form-card" enctype="multipart/form-data" onsubmit="uploadPDF(event)">
                    <input type="hidden" value="guardar" name="accion" id="accion">

                    <label for="nombre">Título</label>
                    <input type="text" id="nombre" class="CajaS" name="nombre" placeholder="Ingrese título" required>

                    <label for="pdfInput">PDF:</label><br>
                    <label class="upload-button">
                        Cargar PDF
                        <input type="file" id="pdfInput" name="pdfFile" class="upload-input" accept="application/pdf" required>
                    </label>

                    <button type="submit" class="save-button">Guardar</button>
                </form>
                <p id="status"></p>
            </div>

            <div class="right" id="right">
                <label for="inputAddress">Publicaciones</label>
                <div id="contenido">Cargando contenido...</div>
            </div>
        </div>

    </main>

    <script>
        function uploadPDF(event) {
            event.preventDefault(); // Evita la recarga de la página
            
            let fileInput = document.getElementById("pdfInput");
            let file = fileInput.files[0];
            let nombre = document.getElementById("nombre").value;

            if (!file || !nombre) {
                document.getElementById("status").innerText = "Todos los campos son obligatorios.";
                return;
            }

            let formData = new FormData();
            formData.append("pdfFile", file);
            formData.append("nombre", nombre);

            fetch("../Control/uploadBolsa.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert("Publicación Exitosa..!");
                document.getElementById("status").innerText = data;
                document.getElementById("anuncio-form").reset();
            })
            .catch(error => {
                console.error("Error al subir el archivo:", error);
                document.getElementById("status").innerText = "Error al subir el archivo.";
            });
        }

        function actualizarDiv() {
            fetch("bolsaV.php")
                .then(response => response.text())
                .then(data => {
                    document.getElementById("contenido").innerHTML = data;
                })
                .catch(error => console.error("Error al cargar:", error));
        }

        setInterval(actualizarDiv, 1000);
        actualizarDiv();

        function eliminarTarea(id) {
            console.log(id)
            if (confirm("¿Seguro que deseas eliminar la publicación?")) {
                fetch("../Control/bolsaEliminar.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `id=${id}`
                })
                .then(response => response.text())
                .then(data => {
                    alert("Eliminado correctamente.");
                    actualizarDiv();
                })
                .catch(error => console.error("Error al eliminar:", error));
            }
        }
    </script>

</body>

</html>
