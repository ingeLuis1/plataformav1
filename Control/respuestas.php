<?php
include 'conexionBD.php';
// Asegúrate de leer correctamente el cuerpo de la petición POST
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$pdo = conectarBD();
$sql = "INSERT INTO `respuestas` ( `id_usuario`, `id_pregunta`, `id_opcion`) VALUES ( :idU, :idP, :idO)";
$stmt = $pdo->prepare($sql);
// Verificar si los datos fueron enviados correctamente
try{
    if ($input && isset($input['respuestas'])) {
        foreach ($input['respuestas'] as $respuesta) {
            $id_pregunta = $respuesta['id_pregunta'];
            $id_opcion = $respuesta['id_opcion'];
            $id_usuario = $respuesta['id_usuario'];
    
            $stmt->bindParam('idU', $id_usuario);
            $stmt->bindParam('idP', $id_pregunta);
            $stmt->bindParam('idO', $id_opcion);
            $stmt->execute();
    
            // Aquí puedes guardar los datos en la base de datos o procesarlos como desees
           
        }
        echo json_encode([
            'success' => true,
            'message' => 'Correcto.'
        ]);
    } else {
        echo "No se recibieron respuestas válidas.";
    }
}
catch(Exception $e){
echo($e->getMessage());
}
?>