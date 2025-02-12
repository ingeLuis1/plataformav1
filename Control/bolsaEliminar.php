<?php
include "conexionBD.php";
$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Error al conectarse con la base de datos: " . $conexion->connect_error);
}

if (isset($_POST["id"])) {
    $id = intval($_POST["id"]); // Asegurar que es un número entero

    // Consultar la publicación en la base de datos
    $sql = "SELECT archivo FROM bolsa WHERE idBolsa = ? LIMIT 1";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        $archivo = __DIR__ . "/../uploads/" . $fila["archivo"]; // Ruta completa del archivo

        if (file_exists($archivo)) {
            if (unlink($archivo)) { // Eliminar el archivo del servidor
                // Eliminar el registro de la base de datos
                $deleteSQL = "DELETE FROM bolsa WHERE idBolsa = ?";
                $stmtDelete = $conexion->prepare($deleteSQL);
                $stmtDelete->bind_param("i", $id);
                $stmtDelete->execute();
                
                if ($stmtDelete->affected_rows > 0) {
                    echo "Publicación eliminada correctamente.";
                } else {
                    echo "Error al eliminar el registro de la base de datos.";
                }
            } else {
                echo "Error al eliminar el archivo del servidor.";
            }
        } else {
            echo "El archivo no existe en el servidor.";
        }
    } else {
        echo "No se encontró la publicación.";
    }

    // Cerrar conexiones
    $stmt->close();
    $conexion->close();
} else {
    echo "Error: No se proporcionó un ID válido.";
}
?>
