<?php
    $host ='localhost:3307';
    $username ='root';
    $password = 'elorrieta';
    $database = 'db_bidaia_gestoreafroga';

    try{
        $con =new PDO("mysql:host=$host;dbname=$database" , $username, $password);
      
        if($_SERVER["REQUEST_METHOD"] =="POST") {

        $langilekop1 = $_POST["langilekop"];

        $logoa1 = $_POST["logoa"];

        $kolorea1 = $_POST["kolorea"];

        $izena1 = $_POST["izena"];

        $agentziamota1 = $_POST["agentziamota"];

        $pasahitza1 = $_POST["pasahitza"];


        $sql = "INSERT INTO agentzia (Langile_Kopuru_Kodea, LOGOA , MARKAREN_KOLOREA , izena , agentzia_m_kodea , pasahitza) VALUES (:langilekop, :logoa , :kolorea , :izena , :agentziamota , :pasahitza)";        
    
        $stmt = $con->prepare($sql);
        
        $stmt-> bindParam(':langilekop', $langilekop1);

        $stmt-> bindParam(':logoa', $logoa1);

        $stmt-> bindParam(':kolorea', $kolorea1);
        
        $stmt-> bindParam(':izena', $izena1);
        
        $stmt-> bindParam(':agentziamota', $agentziamota1);
        
        $stmt-> bindParam(':pasahitza', $pasahitza1);
        



            if($stmt ->execute()) {
                header("Location: ../index.html");
            }

            else{
                echo"ERROR ";
            }
        }


    }catch(PDOException $e) {
        die('conexion de error ' . $e->getMessage());
    }
    ?>