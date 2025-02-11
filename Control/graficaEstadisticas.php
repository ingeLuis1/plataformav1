<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica de Cuestionario</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        canvas {
            max-width: 800px;
            margin: 20px auto;
        }
        select {
            margin-top: 10px;
            padding: 5px;
        }
    </style>
</head>
<body>
<h2>Resultados del Cuestionario</h2>

<label for="preguntaSelect">Selecciona una pregunta:</label>
<select id="preguntaSelect"></select>

<canvas id="grafica"></canvas>

<script>
    document.addEventListener("DOMContentLoaded", async function() {
        const url = "verEstadisticas.php";  // Aquí puedes poner la URL de tu API
        const response = await fetch(url);
        const data = await response.json();

        const cuestionarios = data;
        const preguntas = Object.values(cuestionarios["1"].preguntas);

        const select = document.getElementById("preguntaSelect");
        const ctx = document.getElementById("grafica").getContext("2d");
        let chart;

        // Cargar opciones en el select
        preguntas.forEach(pregunta => {
            let option = document.createElement("option");
            option.value = pregunta.id_pregunta;
            option.textContent = pregunta.pregunta;
            select.appendChild(option);
        });

        // Función para actualizar la gráfica
        function actualizarGrafica(idPregunta) {
            const pregunta = preguntas.find(p => p.id_pregunta == idPregunta);
            const etiquetas = pregunta.respuestas.map(r => r.opcion);
            const valores = pregunta.respuestas.map(r => r.total_respuestas);

            if (chart) {
                chart.destroy(); // Elimina el gráfico anterior
            }

            chart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: "Total de respuestas",
                        data: valores,
                        backgroundColor: "rgba(54, 162, 235, 0.6)"
                    }]
                }
            });
        }

        // Evento para cambiar la gráfica
        select.addEventListener("change", (event) => {
            actualizarGrafica(event.target.value);
        });

        // Cargar la primera gráfica por defecto
        actualizarGrafica(preguntas[0].id_pregunta);
    });
</script>
</body>
</html>
