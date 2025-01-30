<?php
//Recuperar la session iniciada

// Verifica si el usuario tiene un tipo de rol en la sesión
if (!isset($_SESSION['rol'])) {
    // Redirige a la página de login si el usuario no tiene una sesión activa
    header("Location: ../Views/index.html");
    exit();
}

// Obtiene el tipo de usuario desde la sesión
$user_type = $_SESSION['rol'];

// Función para validar si el usuario tiene acceso basado en su rol
function validar_acceso($roles_permitidos)
{
    global $user_type;
    // Verifica si el rol del usuario está en el arreglo de roles permitidos
    if (!in_array($user_type, $roles_permitidos)) {
        // Redirige a una página de acceso denegado si el usuario no tiene permisos
        if ($user_type == "USER") {
            header("Location:  ../Views/PerfilUser.php");
        } elseif ($user_type == "USER") {
            header("Location:  ../Views/iAdmin.html");
        }
        exit();

    }
}

?>
