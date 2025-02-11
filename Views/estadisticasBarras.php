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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
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
<p></p>
<div>
    <h1>Resultados del Cuestionario</h1>
</div>


<div id="contenedor"></div>

<script>
    // URL del endpoint donde se encuentran los datos
    const API_URL = "../Control/verEstadisticas2.php"; // Cambia esta URL

    async function obtenerDatos() {
        try {
            const response = await fetch(API_URL);
            if (!response.ok) {
                throw new Error(`Error en la petición: ${response.status}`);
            }
            const jsonData = await response.json();
            mostrarDatos(jsonData);
        } catch (error) {
            console.error("Error al obtener los datos:", error);
            document.getElementById("contenedor").innerHTML = "<p>Error al cargar los datos.</p>";
        }
    }

    function mostrarDatos(jsonData) {
        const contenedor = document.getElementById("contenedor");

        for (const key in jsonData) {
            const cuestionario = jsonData[key];
            const tipo = cuestionario.tipo;
            const preguntas = cuestionario.preguntas;

            // Crear sección de tipo (Atributos / Objetivos)
            const seccion = document.createElement("div");
            seccion.innerHTML = `<h2>${tipo.toUpperCase()}</h2>`;
            contenedor.appendChild(seccion);

            // Generar preguntas con gráficos
            for (const id in preguntas) {
                const pregunta = preguntas[id];

                // Contenedor de cada pregunta
                const preguntaDiv = document.createElement("div");
                preguntaDiv.innerHTML = `
                        <h1>${pregunta.pregunta}</h1>
                        <canvas id="grafico-${id}" width="300px" height="50"></canvas>
                    `;
                seccion.appendChild(preguntaDiv);

                // Crear gráfico
                setTimeout(() => crearGrafico(`grafico-${id}`, pregunta.respuestas), 100);
            }
        }
    }

    function crearGrafico(idCanvas, respuestas) {
        const ctx = document.getElementById(idCanvas).getContext("2d");

        // Calcular el total de respuestas para obtener el porcentaje
        const totalRespuestas = respuestas.reduce((acc, r) => acc + r.total_respuestas, 0);

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: respuestas.map(r => r.opcion),
                datasets: [{
                    label: "",
                    data: respuestas.map(r => r.total_respuestas),
                    backgroundColor: ["#4CAF50", "#FF9800", "#2196F3", "#E91E63"],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    datalabels: {
                        anchor: 'end', // Posicionar las etiquetas dentro de la barra
                        align: 'end',  // Alineación dentro de la barra
                        formatter: (value, context) => {
                            const porcentaje = ((value / totalRespuestas) * 100).toFixed(2);
                            return `${value} (${porcentaje}%)`; // Muestra el número de respuestas y el porcentaje
                        },
                        font: {
                            size: 24, // Cambia el tamaño de la fuente de las etiquetas
                            weight: 'bold'
                        },
                        color: '#000000' // Color del texto de las etiquetas
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1, // Asegura que solo se muestren números enteros
                            precision: 0 // Evita decimales
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 14 // Cambia el tamaño de la fuente de las etiquetas del eje X
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    }


    // Ejecutar la función para obtener y mostrar los datos
    obtenerDatos();
</script>
</body>
</html>

