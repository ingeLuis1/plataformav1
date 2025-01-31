<?php
include('conexionBD.php');
session_start(); ///Forma de almacenar informacion del usuario en el servidor 

$pdo = conectarBD();

$sql = "SELECT * FROM `usuarios` WHERE e_mail=:mail and contraseña=:contra";
$sql = $pdo->prepare($sql);
$sql->bindParam("mail", $username);
$sql->bindParam("contra", $password);
$sql->execute();
///Obtener los datos de la consulta
$usuario = $sql->fetch(PDO::FETCH_ASSOC);
///Trabajar con los datos de la consulta
if ($usuario) {
    ///Guardar datos de session
    $_SESSION["rol"] = $usuario["rol"];
    $_SESSION["id_usuario"] = $usuario["id_usuario"];
    

    ///redirigir a la pagina adecuada por cada rol
    ///
    if ($usuario["rol"] == "USER") {
        ///vista de usuario
        header("Location: ../Views/index.html?success=user");

    } else if ($usuario["rol"] == "ADMIN") {
        /////Vista de administrador
        header("Location: ../Views/index.html?success=admin");

    } else if ($usuario["rol"] == "ACADEMICO") {
        ///Vista de Academico
        header("Location: ../Views/index.html?success=academico");
    }else if ($usuario["rol"] == "JEFE DE DIVISION") {
        ///Vista de Academico
        header("Location: ../Views/index.html?success=jefe de division");

} else {
    ///Regresar al Login
    header("Location:../Views/index.html?error=1");
}}
?>