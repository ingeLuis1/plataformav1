<?php
require_once 'conexionBD.php';
header("content-type:application/json");
$pdo = conectarBD();
try {
    // Realizar la consulta
    $query = "
        SELECT
            c.id_cuestionario,
            c.tipo,
            p.id_pregunta,
            p.pregunta,
            o.id_opcion,
            o.etiqueta,
            o.opcion,
            COUNT(r.id_respuesta) AS total_respuestas
        FROM
            cuestionarios c
        JOIN
            preguntas p ON p.id_cuestionario = c.id_cuestionario
        JOIN
            respuestas r ON r.id_pregunta = p.id_pregunta
        JOIN
            opciones o ON o.id_opcion = r.id_opcion
        GROUP BY
            c.id_cuestionario, p.id_pregunta, o.id_opcion
        ORDER BY
            c.id_cuestionario, p.id_pregunta, o.id_opcion;
    ";

    $stmt = $pdo->query($query);

    $result = [];

    // Procesar los resultados
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $cuestionarioId = $row['id_cuestionario'];
        $preguntaId = $row['id_pregunta'];

        // Si el cuestionario no existe en el array, crear una estructura vacía para él
        if (!isset($result[$cuestionarioId])) {
            $result[$cuestionarioId] = [
                'id_cuestionario' => $cuestionarioId,
                'tipo' => $row['tipo'],
                'preguntas' => []
            ];
        }

        // Si la pregunta no existe en el cuestionario, agregarla
        if (!isset($result[$cuestionarioId]['preguntas'][$preguntaId])) {
            $result[$cuestionarioId]['preguntas'][$preguntaId] = [
                'id_pregunta' => $preguntaId,
                'pregunta' => $row['pregunta'],
                'respuestas' => []
            ];
        }

        // Agregar la respuesta de la opción seleccionada a la pregunta
        $result[$cuestionarioId]['preguntas'][$preguntaId]['respuestas'][] = [
            'id_opcion' => $row['id_opcion'],
            'etiqueta' => $row['etiqueta'],
            'opcion' => $row['opcion'],
            'total_respuestas' => $row['total_respuestas']
        ];
    }

    // Devolver los resultados como JSON
    echo json_encode($result, JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

