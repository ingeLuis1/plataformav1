<?php
include('conexionBD.php');
session_start(); ///Forma de almacenar informacion del usuario en el servidor 

$pdo = conectarBD();
$sql = "SELECT * FROM `usuarios` WHERE email=:mail and contra=:contra";
$sql = $pdo->prepare($sql);
$sql->bindParam("mail", $username);
$sql->bindParam("contra", $password);
$sql->execute();
echo("ddd");
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
        header("Location: ../index.html?success=user");

    } else if ($usuario["rol"] == "ADMIN") {
        /////Vista de administrador
        header("Location: ../index.html?success=admin");

    } else if ($usuario["rol"] == "ACADEMICO") {
        ///Vista de Academico
        header("Location: ../index.html?success=academico");
    }else if ($usuario["rol"] == "JEFE DE DIVISION") {
        ///Vista de Academico
        header("Location: ../index.html?success=jefe de division");

} else {
    ///Regresar al Login con los codigos de eerror para mostrar el error
    header("Location:../Views/login.html?error=1");
}
}
else {
    ///Regresar al Login
    header("Location:../Views/login.html?error=1");
}
?>