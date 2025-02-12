<?php
include "../Control/conexionBD.php";

$conexion = conectarBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["pdfFile"]) && isset($_POST["nombre"])) {
        $file = $_FILES["pdfFile"];
        $titulo = htmlspecialchars($_POST["nombre"]);

        // Ruta correcta (sube un nivel desde Control/)
        $uploadDir = __DIR__ . "/../uploads/";

        // Crear carpeta si no existe
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Ruta completa para guardar el archivo
        $filePath = $uploadDir . basename($file["name"]);

        // Verificar si es un PDF
        $fileType = mime_content_type($file["tmp_name"]);
        if ($fileType !== "application/pdf") {
            echo "Solo se permiten archivos PDF.";
            exit;
        }

        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($file["tmp_name"], $filePath)) {
            echo "Archivo subido correctamente: " . $filePath;

            // Ruta relativa para guardar en la base de datos
            $ruta = basename($file["name"]);
            $fecha = date("Y-m-d");

            // Sentencia preparada para insertar en la base de datos
            $sql = "INSERT INTO bolsa (titulo, archivo, tipo) VALUES (:titulo, :ruta, :fecha)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':ruta', $ruta);
            $stmt->bindParam(':fecha', $fecha);

            if ($stmt->execute()) {
                echo "Datos insertados correctamente.";
            } else {
                echo "Error al insertar los datos.";
            }
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Faltan datos en la solicitud.";
    }
} else {
    echo "Acceso no permitido.";
}
?>