<?php
session_start();

$session_expiration_time = 1800; //en segundos
// Establecer el tiempo máximo de vida de la sesión (en segundos) desde el servidor
ini_set('session.gc_maxlifetime', $session_expiration_time);
// Comprobar si la sesin ha expirado por inactividad (más de 30 minutos)
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $session_expiration_time) {
    // Si ha pasado más de 30 minutos desde la última actividad, destruir la sesión
    session_unset();     // Elimina todas las variables de sesión
    session_destroy();   // Destruye la sesión
    header("Location: ../Views/login.html"); // Redirige al login
    exit();
}
// Actualizar la última actividad para que se pueda comprobar la inactividad
$_SESSION['LAST_ACTIVITY'] = time();

// Recuperar la sesión iniciada
if (!isset($_SESSION["rol"])) {
    // Redirige a la página de login si el usuario no tiene una sesión activa
    header("Location: ../Views/login.html");
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
        if ($user_type == 'empleador') {
            header("Location:  ../Views/empleador.php");
        } else if ($user_type == 'egresado') {
            header("Location:  ../Views/egresado.php");
        }
        exit();
    }
}
?>
