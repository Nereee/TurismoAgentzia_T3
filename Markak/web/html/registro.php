<?php
    // Datu-basearekin konektatzeko konfigurazioa
    // Hemen, zerbitzari eta datu-basearekin konektatzeko beharrezko datuak zehazten dira.
    $host = 'localhost:3307';
    $username = 'root';
    $password = '';
    $database = 'db_bidaia_gestoreafroga';

    try {
        // PDO erabiliz datu-basearekin konektatzen da.
        $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);

        // POST metodoa erabiliz formulario bat bidali den ala ez egiaztatzen da.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Formularioaren datuak jasotzen dira.
            $langilekop1 = $_POST["langilekop"];
            $logoa1 = $_POST["logoa"];
            $kolorea1 = $_POST["kolorea"];
            $izena1 = $_POST["izena"];
            $agentziamota1 = $_POST["agentziamota"];
            $pasahitza1 = $_POST["pasahitza"];

            // Datuak dagokion taulan sartzeko SQL kontsulta prestatzen da.
            $sql = "INSERT INTO agentzia (Langile_Kopuru_Kodea, LOGOA, MARKAREN_KOLOREA, izena, agentzia_m_kodea, pasahitza) 
                    VALUES (:langilekop, :logoa, :kolorea, :izena, :agentziamota, :pasahitza)";
            
            // Kontsulta seguru exekutatzeko prestatu egiten da, SQL injekzioaren aurka babesteko.
            $stmt = $con->prepare($sql);

            // Formularioaren balioak kontsultako parametroekin lotzen dira.
            $stmt->bindParam(':langilekop', $langilekop1);
            $stmt->bindParam(':logoa', $logoa1);
            $stmt->bindParam(':kolorea', $kolorea1);
            $stmt->bindParam(':izena', $izena1);
            $stmt->bindParam(':agentziamota', $agentziamota1);
            $stmt->bindParam(':pasahitza', $pasahitza1);

            // Kontsulta exekutatzen saiatzen da. On egin bada, erabiltzailea beste orri batera bideratzen da.
            if ($stmt->execute()) {
                header("Location: ../index.html");
            } else {
                // Exekuzioan errore bat egon bada, errore-mezu bat erakusten da.
                echo "ERROR";
            }
        }
    } catch (PDOException $e) {
        // Konektatzean edo exekuzioan errore bat gertatzen bada, salbuespena harrapatzen da eta errore-mezua erakusten da.
        die('Konektatzeko errorea: ' . $e->getMessage());
    }
?>
