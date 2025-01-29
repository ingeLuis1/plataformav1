<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $username = $_POST['user']; // Nombre de usuario
    $password = $_POST['pass']; // Contraseña
    if ($username == "admin" && $password == "admin") {

        header("Location: ../Views/sistema.html");
    } else {
        header("Location: ../Views/login.html?error=1");
    }

}
?>