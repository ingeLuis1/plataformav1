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