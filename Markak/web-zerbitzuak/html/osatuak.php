<?php
// Conectar a la base de datos
$pdo = new PDO('mysql:host=localhost;dbname=nombre_de_tu_base_de_datos', 'usuario', 'contraseña');

// Recibir los datos del formulario
$izena = $_POST['izena'];
$hiria = $_POST['hiria'];
$prezioa = $_POST['prezioa'];
$sarrera = $_POST['sarrera'];
$irtera = $_POST['irtera'];
$logela = $_POST['logela'];

// Preparar la consulta para insertar los datos en la tabla osatua
$query = "INSERT INTO osatua (Prezioa, Sarrera_eguna, Irtera_eguna, hiria, izena, logela_m_kodea)
          VALUES (:prezioa, :sarrera, :irtera, :hiria, :izena, :logela)";
          
// Ejecutar la consulta
$stmt = $pdo->prepare($query);
$stmt->bindParam(':prezioa', $prezioa);
$stmt->bindParam(':sarrera', $sarrera);
$stmt->bindParam(':irtera', $irtera);
$stmt->bindParam(':hiria', $hiria);
$stmt->bindParam(':izena', $izena);
$stmt->bindParam(':logela', $logela);

if ($stmt->execute()) {
    echo "Los datos han sido insertados correctamente.";
} else {
    echo "Error al insertar los datos.";
}
?>
