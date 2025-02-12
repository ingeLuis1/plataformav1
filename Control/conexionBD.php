<?php
//CONEXION A BD
//Datos de conexion a Mysql
$host = "localhost";
$db = "u386652371_academia";
$user = "u386652371_root";
$pass = "123academiaII";

$db = "academia";
$user = "root";
$pass = "sasa";

$cdb = "mysql:host=$host;dbname=$db;charset=utf8mb4";///Conexion
///Crear PDO accesso a base de datos, seguro
function conectarBD()
{
    global $cdb;
    global $user;
    global $pass;
    try {
        $pdo = new PDO($cdb, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error en la conexion" . $e->getMessage());
    }
    // echo("conexion Exitosa");
    return $pdo;
}

?>
