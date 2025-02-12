<?php
include('conexionBD.php');
session_start(); ///Forma de almacenar informacion del usuario en el servidor 

<<<<<<< HEAD
$email = $_POST["user"];
$contra = $_POST["pass"];


$pdo = conectarBD();


$sql = "SELECT * FROM `usuarios` WHERE email=:mail ";
$sql = $pdo->prepare($sql);
$sql->bindParam("mail", $email);
=======
$pdo = conectarBD();

$sql = "SELECT * FROM `usuarios` WHERE e_mail=:mail and contraseña=:contra";
$sql = $pdo->prepare($sql);
$sql->bindParam("mail", $username);
$sql->bindParam("contra", $password);
>>>>>>> rama_jlgm
$sql->execute();
///Obtener los datos de la consulta
$usuario = $sql->fetch(PDO::FETCH_ASSOC);
///Trabajar con los datos de la consulta
if ($usuario) {
<<<<<<< HEAD
    $contrabd = $usuario["contra"];///obtiene la contra del usuario en laBD

    if (password_verify($contra, $contrabd)) {
        ///Verifica que la contra sea igual a la de la BD
        ///Guardar datos de session
        $_SESSION["rol"] = $usuario["rol"];
        $_SESSION["id_usuario"] = $usuario["id_usuario"];
        ///redirigir a la pagina adecuada por cada rol
        ///
        if ($usuario["rol"] == "egresado") {
            ///vista de usuario
            header("Location: ../Views/login.html?success=egresado");

        } else if ($usuario["rol"] == "empleador") {
            /////Vista de administrador
            header("Location: ../Views/login.html?success=empleador");

        } else if ($usuario["rol"] == "admin") {
            /////Vista de administrador
            header("Location: ../Views/login.html?success=admin");

        } 
        else {
            ///Regresar al Login con los codigos de eerror para mostrar el error datos incorrectos
            header("Location:../Views/login.html?error=1");
        }
    } else {
        ///Regresar al Login con los codigos de eerror para mostrar el error datos incorrectos
        header("Location:../Views/login.html?error=1");
    }

} else {
    ///Regresar al Login
    header("Location:../Views/login.html?error=2");///error usuario no existe
}
=======
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
>>>>>>> rama_jlgm
?>