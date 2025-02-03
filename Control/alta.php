<?php
include 'conexionBD.php';
$email = $_POST["correo"];
$contra = $_POST["contra"];
$nombre = $_POST["nombre"];
$apellidop = $_POST["apellidop"];
$apellidom = $_POST["apellidom"];
$num = $_POST["num"];
$rol = $_POST["rol"];
$empresa = $_POST["empresa"];
$cohorte = $_POST["cohorte"];
$contra = password_hash($contra, PASSWORD_BCRYPT);////encripta la contraseña
echo ($rol);
$pdo = conectarBD();
try {
    $sql = "INSERT INTO `usuarios` ( `email`, `contra`, `rol`) VALUES (:email, :contra, :rol)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contra', $contra);
    $stmt->bindParam(':rol', $rol);
    $insert = $stmt->execute();

    $idUsuarioNew = $pdo->lastInsertId();

    if ($insert) {

        $sql = "INSERT INTO `datos` ( `nombre`, `apellidoP`, `apellidoM`, `telefono`, `id_usuario`, `cohorte`, `empresa`)
        VALUES ( :nombre, :ap, :am,:tel, :idU, :cohorte, :empresa)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("nombre", $nombre);
        $stmt->bindParam("ap", $apellidop);
        $stmt->bindParam("am", $apellidom);
        $stmt->bindParam("tel", $num);
        $stmt->bindParam("idU", $idUsuarioNew);
        $stmt->bindParam("cohorte", $cohorte);
        $stmt->bindParam("empresa", $empresa);

        $data = $stmt->execute();

        if ($data) {
            header("location:../Views/alta.html?status=true");

        } else {
            header(header: "location:../Views/alta.html?status=false");

        }

    } else {
        header(header: "location:../Views/alta.html?status=false");

    }
} catch (Exception $e) {

    header("location:../Views/alta.html?status=false");

}

?>