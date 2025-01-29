<?php
include 'dbConection.php';
$nombre = $_POST["nombre"];
$apellidop = $_POST["apellidop"];
$apellidom = $_POST["apellidom"];
$matricula = $_POST["matricula"];
$credencial = $_POST["credencial"];
$grupo = $_POST["grupo"];


$pdo = conectarBD();

$sql = "INSERT INTO `alumnos` (`id`, `apellidom`, `apellidop`, `grupo`, `matricula`, `ncredencial`, `nombre`) 
VALUES (NULL, :apellidom, :apellidop, :grupo, :matricula, :credencial, :nombre)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':apellidom', $apellidom);
$stmt->bindParam(':apellidop', $apellidop);
$stmt->bindParam(':grupo', $grupo);
$stmt->bindParam(':matricula', $matricula);
$stmt->bindParam(':credencial', $credencial);
$stmt->bindParam(':nombre', $nombre);

$insert = $stmt->execute();

if ($insert) {

    header("location:../Views/altaAlumno.html?status=true");
} else {
    header("location:../Views/altaAlumno.html?status=false");

}

?>