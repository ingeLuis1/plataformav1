<?php
include "../Control/conexionBD.php";
$conexion=new mysqli($host,$user,$pass,$db) or die ("Error al conectarse con la base de datos".$mysqli->error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["pdfFile"]) && isset($_POST["nombre"])) {
        
        $file = $_FILES["pdfFile"];
        $nombre = htmlspecialchars($_POST["nombre"]);

        // Directorio donde se guardará el archivo
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filePath = $uploadDir . basename($file["name"]);

        // Verificar si es un PDF
        $fileType = mime_content_type($file["tmp_name"]);
        if ($fileType !== "application/pdf") {
            echo "Solo se permiten archivos PDF.";
            exit;
        }

        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($file["tmp_name"], $filePath)) {
            echo "Archivo subido correctamente.\n";
            echo "Nombre: $nombre\n";
        $ruta=$file["name"];
        $fecha= date("d/m/Y");
            $sql="insert into bolsa values (0,'$nombre','$ruta','$fecha')"; 
            $ejecutarSQL=$conexion->query($sql) or die ("Error al insertar".$conexion->error); 
            //comprobar la ejecuciOn 
            
               
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