<?php
// MySQL datu-basearen konfigurazioa
$host = 'localhost:3307'; // Datu-basearen zerbitzariaren helbidea eta portua
$username = 'root'; // Datu-basearen erabiltzailea
$password = ''; // Datu-basearen pasahitza
$database = 'db_bidaia_gestoreafroga'; // Datu-basearen izena

try {
    // Datu-basearekin konektatzea
    $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Akatsak kudeatzeko modua

    // POST metodoa erabiliz datuak jasotzea
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Formularioan jasotako datuak
        $bidaizena1 = $_POST["izena"];
        $bidaimota1 = $_POST["bidaimota"];
        $herrialdeak1 = $_POST["herrialdeak"];
        $deskribapena1 = $_POST["deskribapena"];
        $hasiera_data1 = $_POST["hasiera_data"];
        $amaiera_data1 = $_POST["amaiera_data"];

        //  Lehenengo bidaia txertatzen dugu
        $sql_insert_bidaia = "INSERT INTO bidaia (Bidaiaren_izena, Deskribapena, bidai_hasiera, bidai_amaiera, Herrialde_kodea, Bidaia_m_kodea) 
                              VALUES (:izena, :deskribapena, :hasiera_data, :amaiera_data, :herrialdeak, :bidaimota)";
        $stmt_insert_bidaia = $con->prepare($sql_insert_bidaia); // SQL kontsulta prestatzen
        $stmt_insert_bidaia->bindParam(':izena', $bidaizena1); // Parametroak lotzen
        $stmt_insert_bidaia->bindParam(':deskribapena', $deskribapena1);
        $stmt_insert_bidaia->bindParam(':hasiera_data', $hasiera_data1);
        $stmt_insert_bidaia->bindParam(':amaiera_data', $amaiera_data1);
        $stmt_insert_bidaia->bindParam(':herrialdeak', $herrialdeak1);
        $stmt_insert_bidaia->bindParam(':bidaimota', $bidaimota1);
        $stmt_insert_bidaia->execute(); // Datuak sartzen

        //  Azken KODEA lortzen
        $lastKodea = $con->lastInsertId(); // Azken txertatutako ID-a jasotzen

        if ($lastKodea) {
            //  Azken KODEA eta IZENA 'zerbitzuak' taulan txertatzen
            $sql_insert_zerbitzuak = "INSERT INTO zerbitzuak (Bidaiaren_kodea, Izena) VALUES (:kodea, :izen)";
            $stmt_insert_zerbitzuak = $con->prepare($sql_insert_zerbitzuak); // SQL kontsulta prestatzen
            $stmt_insert_zerbitzuak->bindParam(':kodea', $lastKodea, PDO::PARAM_INT); // Parametroak lotzen
            $stmt_insert_zerbitzuak->bindParam(':izen', $bidaizena1, PDO::PARAM_STR);
            $stmt_insert_zerbitzuak->execute(); // Datuak sartzen

            // Erabiltzailea hasierako orrira bideratzea
            header("Location: hasiera.html");
        } else {
            echo "ERROR: Bidaia kodea lortzen.";
        }
    }
} catch (PDOException $e) {
    // Datu-basearekin konektatzeko errorea izanez gero, mezua erakusten
    die('Error de conexión: ' . $e->getMessage());
}
?>
