<?php
// Datos de conexión a la base de datos
$host = 'localhost:3307';
$username = 'root';
$password = 'elorrieta';
$database = 'db_bidaia_gestoreafroga'; // Cambia esto con tu base de datos

// Crear la conexión
try {
    $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta a la tabla 'bidaia_motak' para obtener los tipos de viaje
    $sql = "SELECT KODEA, DESKRIBAPENA FROM bidaia_motak";  // Ajusta los nombres de las columnas si es necesario
    $stmt = $con->prepare($sql);
    $stmt->execute();

    // Obtener los resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retornar los datos en formato JSON
    echo json_encode($resultados);

} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}
?>
