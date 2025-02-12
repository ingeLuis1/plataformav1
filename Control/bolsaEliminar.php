<<<<<<< HEAD
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
=======
<?php
include "conexionBD.php";
$conexion=new mysqli($host,$user,$pass,$db) or die ("Error al conectarse con la base de datos".$mysqli->error);



if (isset($_POST["id"])) {
    $id = intval($_POST["id"]);
    $variable= $id;
   // 
   // echo "Tarea eliminada correctamente.";

    $sql = "SELECT * FROM bolsa WHERE idBolsa = $variable LIMIT 1";
     $resultado = $conexion->query($sql);
    if ($fila = $resultado->fetch_assoc()) {
       // echo "<p><strong>ID:</strong> " . $fila["archivo"] . "</p>";
        $archivo = "../Views/uploads/".$fila["archivo"]; // Ruta del archivo a eliminar
      
        if (file_exists($archivo)) {
            if (unlink($archivo)) {
                echo "Publicación eliminada";
                $conexion->query("DELETE FROM bolsa WHERE idBolsa  = $id");
            } else {
                echo "Error al eliminar";
            }
        } else {
            echo "Publicación no existe.";
        }
    } else {
      echo "<p>No se encontró publicación.</p>";
       
    }
} else {
    echo "Error al eliminar la publicación.";
}








?>
>>>>>>> 732d09d688c31e0f5d9b3cf0b09089ca7055ad01
