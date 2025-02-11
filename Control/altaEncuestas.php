<?php
include('conexionBD.php');
require '../Library/vendor/autoload.php'; // Usa Composer para cargar PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

header('Content-Type: application/json');
date_default_timezone_set("America/Mexico_City");
// Verificar si se ha enviado un archivo
$tipo = $_POST['tipo'];
if (isset($_FILES['encuestaFile'])) {
    $file = $_FILES['encuestaFile'];
    // Verifica si el archivo fue recibido correctamente
    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileType = mime_content_type($file['tmp_name']);
        // Verifica si el archivo es un Excel antes de cargarlo
        $allowedMimeTypes = [
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
            'application/vnd.ms-excel' // .xls
        ];
        if (!in_array($fileType, $allowedMimeTypes)) {
            echo json_encode([
                'success' => false,
                'message' => 'Formato de archivo no válido. Debe ser un archivo Excel (.xls o .xlsx).'
            ]);
            exit;
        }

        // Cargar el archivo Excel y subir a la BD
        try {
            $spreadsheet = IOFactory::load($file['tmp_name']);
            $worksheet = $spreadsheet->getActiveSheet();

            // Iterar sobre las filas, omitiendo la primera (encabezado)
            $filaInicio = 2;
            $datos = [];///arreglo para guardar los datos
            ///preparamos la consulta y creamos el cuestionario
            $pdo = conectarBD();
            $fecha = date('Y-m-d');
            $sql = "INSERT INTO `cuestionarios` ( `fechaCreacion`, `tipo`) VALUES ( :fecha, :tipo)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam("fecha", $fecha);
            $stmt->bindParam("tipo", $tipo);

            $stmt->execute();

            $idNewEncuesta = $pdo->lastInsertId();///id del ltimo cuestionario creado se asigna a las preguntas
            //creamos nuevo sql para cada pregunta y para las opciones 

            $sql = "INSERT INTO `preguntas` ( `pregunta`, `id_cuestionario`) VALUES ( :pregunta, :idCuestionario)";

            $sqlOpciones = "INSERT INTO `opciones` ( `etiqueta`, `opcion`, `id_pregunta`) VALUES (:etiqueta, :opcion, :idPregunta)";
            foreach ($worksheet->getRowIterator($filaInicio) as $row) {
                $cellIterator = $row->getCellIterator();
                $valores = [];
                foreach ($cellIterator as $cell) {
                    $valores[] = $cell->getValue();
                }
            
                if (!empty(array_filter($valores))) { // Evita filas vacías
                    // Se asegura de que cada índice exista antes de acceder a él
                    $texto = $valores[0] ?? ''; // Pregunta
                    $opcionA = $valores[1] ?? ''; // Opción A
                    $opcionB = $valores[2] ?? ''; // Opción B
                    $opcionC = $valores[3] ?? ''; // Opción C
                    $opcionD = $valores[4] ?? ''; // Opción D
                    $opcionE = $valores[5] ?? ''; // Opción E
                    $opcionF = $valores[6] ?? ''; // Opción F
            
                    $datos[] = [
                        'texto' => $texto,
                        'opcionA' => $opcionA,
                        'opcionB' => $opcionB,
                        'opcionC' => $opcionC,
                        'opcionD' => $opcionD,
                        'opcionE' => $opcionE,
                        'opcionF' => $opcionF,
                        'tipo' => $tipo
                    ];
            
                    // Insertar la pregunta
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam("pregunta", $texto);
                    $stmt->bindParam("idCuestionario", $idNewEncuesta);
                    $stmt->execute();
            
                    $idPregunta = $pdo->lastInsertId();
            
                    // Insertar opciones válidas
                    $stmt = $pdo->prepare($sqlOpciones);
                    $opciones = ['A' => $opcionA, 'B' => $opcionB, 'C' => $opcionC, 'D' => $opcionD, 'E' => $opcionE, 'F' => $opcionF];
            
                    foreach ($opciones as $etiqueta => $opcion) {
                        if (!empty($opcion)) { // Evita insertar opciones vacías
                            $stmt->bindParam("etiqueta", $etiqueta);
                            $stmt->bindParam("opcion", $opcion);
                            $stmt->bindParam("idPregunta", $idPregunta);
                            $stmt->execute();
                        }
                    }
                }
            }
            

            echo json_encode([
                'success' => true,
                'message' => 'Archivo procesado correctamente.',
                'data' => $datos,
                'tipo' => $tipo
            ]);
        } catch (Exception $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Error al procesar el archivo: ' . $e->getMessage()
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error al recibir el archivo.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'No se ha enviado ningún archivo.'
    ]);
}
