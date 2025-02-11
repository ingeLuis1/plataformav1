<?php
session_start();  // Asegurar que la sesión está iniciada
include 'conexionBD.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$pdo = conectarBD();
$id = $_SESSION['id_usuario'] ?? null;
$status = 1;

if (!$id) {
    echo json_encode(['success' => false, 'message' => 'ID de usuario no encontrado en la sesión.']);
    exit;
}

try {
    if ($input && isset($input['respuestas'])) {
        $pdo->beginTransaction();  // Iniciar transacción

        // Preparar la consulta para insertar respuestas
        $sql = "INSERT INTO `respuestas` (`id_usuario`, `id_pregunta`, `id_opcion`) VALUES (:idU, :idP, :idO)";
        $stmt = $pdo->prepare($sql);

        foreach ($input['respuestas'] as $respuesta) {
            $id_pregunta = $respuesta['id_pregunta'];
            $id_opcion = $respuesta['id_opcion'];
            $id_usuario = $respuesta['id_usuario'];

            $stmt->bindParam(':idU', $id_usuario);
            $stmt->bindParam(':idP', $id_pregunta);
            $stmt->bindParam(':idO', $id_opcion);
            $stmt->execute();
        }

        // Insertar en controlrespuestas
        $sql = "INSERT INTO `controlrespuestas` (`id_usuario`, `status`) VALUES (:idU, :stat)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idU', $id);
        $stmt->bindParam(':stat', $status);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $pdo->commit();  // Confirmar cambios
            echo json_encode(['success' => true, 'message' => 'Correcto.']);
        } else {
            $pdo->rollBack();  // Revertir cambios en caso de error
            echo json_encode(['success' => false, 'message' => 'Error ya tiene una encuesta resuelta.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: datos no cargados.']);
    }
} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
