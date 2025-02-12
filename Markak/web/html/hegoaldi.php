<?php
// POST metodoaren bidez jasotzen diren datuak kudeatzea
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);  // Jasotako datuak erakusten ditu (debugging helburuetarako)

    // Datu-basearen konfigurazioa
    $host = 'localhost:3307';
    $username = 'root';
    $password = '';
    $database = 'db_bidaia_gestoreafroga';

    try {
        // Datu-basearekin konexioa establestea PDO erabiliz
        $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        // PDO akatsak tratatzeko ezarpenak
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Formularioaren datuak jasotzea
        $bidai_mota1 = $_POST["bidai_mota"];
        $aireportua11 = $_POST["aireportua1"];
        $aireportua21 = $_POST["aireportua2"];
        $iraupena1 = $_POST["iraupena"];
        $prezioa1 = $_POST["prezioa"];
        $irtera1 = $_POST["irtera"];
        $ordua1 = $_POST["ordua"];
        $airelinea1 = $_POST["airelinea"];

        // SQL kontsulta prestatu eta parametrotan datuak lotzea
        $sql = "INSERT INTO hegaldia (Zerbitzu_kodea, Irteera_data, Irteera_ordutegia, Bidaiaren_iraupena, Prezioa, Jatorrizko_aireportua, Helmugako_aireportua, AIRELINEA_KODEA) 
        VALUES (:bidai_mota, :irtera, :ordua, :iraupena, :prezioa, :aireportua1, :aireportua2, :airelinea)";

        // SQL kontsulta prestatzea
        $stmt = $con->prepare($sql);
        // Formularioaren datuak SQL kontsultako parametroekin lotzea
        $stmt->bindParam(':bidai_mota', $bidai_mota1);
        $stmt->bindParam(':irtera', $irtera1);
        $stmt->bindParam(':ordua', $ordua1);
        $stmt->bindParam(':iraupena', $iraupena1);
        $stmt->bindParam(':prezioa', $prezioa1);
        $stmt->bindParam(':aireportua1', $aireportua11);
        $stmt->bindParam(':aireportua2', $aireportua21);
        $stmt->bindParam(':airelinea', $airelinea1);

        // Kontsulta exekutatu eta, ondo atera bada, beste orri batera bideratzea
        if ($stmt->execute()) {
            header("Location: ../index.html");
            exit();
        } else {
            // Errorea gertatzen bada, mezu bat erakusten da
            echo "ERROR al insertar los datos.";
        }
    } catch (PDOException $e) {
        // Konexio akatsa gertatzen bada, akats mezua erakustea
        die('Error de conexión: ' . $e->getMessage());
    }
}
?>
