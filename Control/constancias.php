<?php

require_once '../Libs/fpdf/fpdf.php';
require_once '../Libs/FPDI-2.6.1/src/autoload.php';
include '../Control/dbConection.php';

use setasign\Fpdi\Fpdi;

$pdo = conectarBD();

// Función para obtener las asistencias
function obtenerAsistencias()
{
    $sql = "
    SELECT al.matricula, al.nombre, al.apellidop, al.apellidom, COUNT(a.id) AS total_asistencias
    FROM alumnos al
    LEFT JOIN asistencias a ON a.alumno_id = al.id
    GROUP BY al.matricula, al.nombre, al.apellidop, al.apellidom
    HAVING total_asistencias >= 1
";
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para generar todas las constancias en un solo PDF
function generarConstancias()
{
    $alumnos = obtenerAsistencias();

    // Crear el objeto FPDI
    $pdf = new Fpdi();

    // Ruta de la plantilla PDF
    $templatePDF = '../static/Constancia/formato.pdf';

    // Verificar si la plantilla PDF existe
    if (!file_exists($templatePDF)) {
        echo "Error: La plantilla PDF no se encuentra en la ruta especificada: $templatePDF<br>";
        return;
    }

    // Recorre todos los alumnos y genera una página para cada uno
    foreach ($alumnos as $alumno) {
        // Agregar una nueva página para cada alumno
        $pdf->AddPage('L', 'Letter');  // 'L' es para horizontal y 'A4' es el tamaño estándar

        // Importar la plantilla PDF
        $pdf->setSourceFile($templatePDF);
        $template = $pdf->importPage(1);
        $pdf->useTemplate($template);

        // Configurar fuente y tamaño
        $pdf->SetFont('Helvetica', 'B', 18);

        // Concatenar el nombre completo del alumno
        $nombreCompleto = $alumno['nombre'] . ' ' . $alumno['apellidop'] . ' ' . $alumno['apellidom'];

        // Calcular el ancho del texto
        $textWidth = $pdf->GetStringWidth($nombreCompleto);

        // Calcular la posición X para centrar el texto
        $pageWidth = $pdf->GetPageWidth();
        $x = ($pageWidth - $textWidth) / 2;

        // Posicionar y escribir el nombre del estudiante
        $pdf->SetXY($x, 95);  // Ajusta la posición en X calculada y en Y fija
        $pdf->Write(5, $nombreCompleto);
    }

    // Guardar el archivo PDF final
    $outputPath = '../static/Constancia/constancias_finales.pdf';
    $pdf->Output($outputPath, 'F');  // Guardar el PDF en el servidor

    echo "PDF con las constancias generadas correctamente.<br>";
}


?>