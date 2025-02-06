<?php
    $host ='localhost:3307';
    $username ='root';
    $password = 'elorrieta';
    $database = 'db_bidaia_gestoreafroga';

    try{
        $con =new PDO("mysql:host=$host;dbname=$database" , $username, $password);
      
        if($_SERVER["REQUEST_METHOD"] =="POST") {

        $bidaizena1 = $_POST["izena"];

        $bidaimota1 = $_POST["bidaimota"];

        $herrialdeak1 = $_POST["herrialdeak"];

        $deskribapena1 = $_POST["deskribapena"];


        $sql = "INSERT INTO bidaia (Bidaiaren_izena , Deskribapena , Herrialde_kodea , Bidaia_m_kodea) VALUES (:izena, :deskribapena , :herrialdeak , :bidaimota )";        
    
        $stmt = $con->prepare($sql);
        
        $stmt-> bindParam(':izena', $bidaizena1);

        $stmt-> bindParam(':bidaimota', $bidaimota1);

        $stmt-> bindParam(':herrialdeak', $herrialdeak1);
        
        $stmt-> bindParam(':deskribapena', $deskribapena1);
        

        



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