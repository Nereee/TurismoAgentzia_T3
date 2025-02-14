<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);  // Muestra los datos recibidos

    $host = 'localhost:3307';
    $username = 'root';
    $password = '';
    $database = 'db_bidaia_gestoreafroga';

    try {
        $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recibir los datos del formulario
        $bidai_mota1 = $_POST["bidai_mota"];
        $izena1 = $_POST["izena"];
        $sarreraeguna1 = $_POST["sarreraeguna"];
        $prezioa1 = $_POST["prezioa"];
        $irtera1 = $_POST["irtera"];
        $logela1 = $_POST["logela"];
        $hiria1 = $_POST["hiria"];

        // Asegúrate de que la consulta SQL tenga los parámetros correctos
        $sql = "INSERT INTO ostatua (Zerbitzu_kodea, Prezioa, Sarrera_eguna, Irtera_eguna, hiria, izena, logela_m_kodea ) 
        VALUES (:bidai_mota, :prezioa, :sarreraeguna, :irtera, :hiria, :izena, :logela)";

        // Preparar y ejecutar la consulta
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':bidai_mota', $bidai_mota1);
        $stmt->bindParam(':izena', $izena1);
        $stmt->bindParam(':sarreraeguna', $sarreraeguna1);
        $stmt->bindParam(':prezioa', $prezioa1);
        $stmt->bindParam(':irtera', $irtera1);
        $stmt->bindParam(':logela', $logela1);
        $stmt->bindParam(':hiria', $hiria1);

        // Ejecutar la consulta y redirigir si tiene éxito
        if ($stmt->execute()) {
            header("Location: ../index.html");
            exit();
        } else {
            echo "ERROR al insertar los datos.";
        }
    } catch (PDOException $e) {
        die('Error de conexión: ' . $e->getMessage());
    }
}
?>
