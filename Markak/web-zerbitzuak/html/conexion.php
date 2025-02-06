<?php

$host = "localhost:3307"; // o 127.0.0.1
$username = "root"; // Nombre de usuario predeterminado en XAMPP
$password = "elorrieta"; // Contraseña predeterminada de XAMPP es vacía
$database = "db_bidaia_gestoreafroga"; // Asegúrate de usar el nombre correcto de tu base de datos

$conn = new mysqli($host, $username, $password, $database);

// Konexioa egiaztatu
if ($conn->connect_error) {
    die("Fallo en la conexión: " . $conn->connect_error);
}
?>5