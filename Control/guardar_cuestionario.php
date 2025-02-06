<?php
include 'conexionBD.php';
$conn = conectarBD();

// Obtener datos del formulario
$id_cuestionario = $_POST['id_cuestionario'];
$fechaCreacion = $_POST['fechaCreacion'];
$tipo = $_POST['tipo'];

try {
    // Insertar en la base de datos con PDO
    $sql = "INSERT INTO cuestionarios (id_cuestionario, fechaCreacion, tipo) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_cuestionario, $fechaCreacion, $tipo]);

    echo "Cuestionario agregado correctamente.";
} catch (PDOException $e) {
    echo "Error al agregar cuestionario: " . $e->getMessage();
}

// Cerrar conexión (PDO cierra automáticamente, pero se puede hacer explícito)
$conn = null;
?>
