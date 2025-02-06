<?php

require_once 'conexionBD.php';
session_start();
///regresa info en json
header("content-type:application/json");
$pdo = conectarBD();
$sql = "SELECT    u.rol,    d.cohorte,d.id_usuario,    d.empresa FROM usuarios u INNER JOIN datos d ON u.id_usuario = :id";
$id = $_SESSION['id_usuario'];
$stmt = $pdo->prepare($sql);
$stmt->bindParam("id", $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
///Verificar si tiene mas de 5 años de egresado para aplicar ambos cuestionarios de lo contrario aplicar el de AE unicamente
$AnioActual = date("Y");
$cohorte = explode("-", $user["cohorte"]);
$cohorte = $cohorte[1];
$aniosCohorte = intval(trim($cohorte));

if (($AnioActual - $aniosCohorte) > 5) {
    obtenerEncuestaOEyAE($pdo);
} else {

    obtenerEncuestaAE($pdo);
}



function obtenerEncuestaAE($pdo)
{
    $tipoE = "atributos";
    $sql = "SELECT `id_cuestionario` FROM `cuestionarios`  WHERE tipo = :tipo ORDER BY id_cuestionario DESC LIMIT 1 ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("tipo", $tipoE);
    $stmt->execute();
    $id_cuestionario = $stmt->fetch(PDO::FETCH_ASSOC);
    ///obtener las preguntas
    $sql = "SELECT     p.id_pregunta,     p.pregunta,     o.id_opcion,  o.opcion, o.etiqueta FROM preguntas p LEFT JOIN opciones o ON p.id_pregunta = o.id_pregunta 
    WHERE p.id_cuestionario = :id ORDER BY p.id_pregunta, o.id_opcion";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("id", $id_cuestionario["id_cuestionario"]);
    $stmt->execute();
    $encuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Inicializamos un array para almacenar las preguntas con sus opciones
    $preguntas = [];

    foreach ($encuesta as $pregunta) {
        // Si la pregunta aún no existe en el array, la inicializamos
        if (!isset($preguntas[$pregunta['id_pregunta']])) {
            $preguntas[$pregunta['id_pregunta']] = [
                'id_pregunta' => $pregunta['id_pregunta'],
                'pregunta' => $pregunta['pregunta'],
                'respuestas' => []
            ];
        }
        // Agregamos la opción a las respuestas de la pregunta correspondiente si se encuetra el id en el array asociativo
        $preguntas[$pregunta['id_pregunta']]['respuestas'][] = [
            'etiqueta'=>$pregunta['etiqueta'],
            'id_opcion' => $pregunta['id_opcion'], // Agregar el id de la opción
            'opcion' => $pregunta['opcion']
        ];

    }
    echo json_encode(array_values($preguntas), JSON_PRETTY_PRINT);
}

function obtenerEncuestaOEyAE($pdo)
{
    $tipoE = "atributos";
    $tipoO = "objetivos";
    $sql = "SELECT * FROM `cuestionarios`  WHERE tipo = :tipo ORDER BY id_cuestionario DESC LIMIT 1 ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("tipo", $tipoE);

}

?>