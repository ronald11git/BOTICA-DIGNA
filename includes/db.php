<?php
$servername = "localhost";
$username = "root"; // Usuario por defecto de XAMPP
$password = ""; // Contraseña por defecto de XAMPP
$dbname = "final"; // Nombre de la base de datos

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
