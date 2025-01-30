<?php
include '../Control/dbConection.php';
$pdo = conectarBD();


// Establecer el encabezado para JSON
header('Content-Type: application/json');

// Obtener las asistencias por fecha
if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];

    // Si el filtro es "todos", obtener todos los registros
    if ($filter === 'todos') {
        $stmt = $pdo->query('
            SELECT a.*, al.ncredencial, al.nombre, al.apellidoP, al.apellidoM, al.matricula
            FROM asistencias a
            INNER JOIN alumnos al ON a.alumno_id = al.id');
    } else {
        // Convertir la fecha en formato dd-MM-yyyy a Y-m-d
        $date = DateTime::createFromFormat('d-m-Y', $filter);

        // Filtrar por fecha y obtener detalles del alumno
        $stmt = $pdo->prepare('
            SELECT a.*, al.ncredencial, al.nombre, al.apellidoP, al.apellidoM
            FROM asistencias a
            INNER JOIN alumnos al ON a.alumno_id = al.id
            WHERE a.fecha = :fecha');
        $stmt->execute(['fecha' => $date->format('Y-m-d')]);
    }

    // Obtener los resultados
    $asistencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($asistencias); // Devolver los datos como JSON
}
?>