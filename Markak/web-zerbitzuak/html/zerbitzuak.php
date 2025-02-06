<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);  // Muestra los datos recibidos

    $host = 'localhost:3307';
    $username = 'root';
    $password = 'elorrieta';
    $database = 'db_bidaia_gestoreafroga';
    
    try {
        $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recibir los datos del formulario
        $aireportua11 = $_POST["aireportua1"];
        $aireportua21 = $_POST["aireportua2"];
        $hegaldi_kode1 = isset($_POST['hegaldi_kode']) ? $_POST['hegaldi_kode'] : null;
        $iraupena1 = $_POST["iraupena"];
        $prezioa1 = $_POST["prezioa"];
        $irtera1 = $_POST["irtera"];
        $ordua1 = $_POST["ordua"];
        $airelinea1 = $_POST["airelinea"];
        $zerbitzu_kodea = $_POST["zerbitzu_kodea"]; // Aquí recogemos el valor de Zerbitzu_kodea

        // Paso 1: Insertar en la tabla zerbitzuak (si no existe un servicio)
        $sql_check_zerbitzu = "SELECT * FROM zerbitzuak WHERE Kodea = :zerbitzu_kodea";
        $stmt_check = $con->prepare($sql_check_zerbitzu);
        $stmt_check->bindParam(':zerbitzu_kodea', $zerbitzu_kodea);
        $stmt_check->execute();

        if ($stmt_check->rowCount() == 0) {
            // Si no existe, insertamos un nuevo registro en zerbitzuak
            $sql_insert_zerbitzu = "INSERT INTO zerbitzuak (Bidaiaren_kodea) VALUES (:zerbitzu_kodea)";
            $stmt_insert = $con->prepare($sql_insert_zerbitzu);
            $stmt_insert->bindParam(':zerbitzu_kodea', $zerbitzu_kodea);
            $stmt_insert->execute();
        }

        // Paso 2: Insertar en la tabla hegaldia
        // Aquí el Zerbitzu_kodea será el código del servicio insertado previamente
        $sql = "INSERT INTO hegaldia 
                (Zerbitzu_kodea, Jatorrizko_aireportua, Helmugako_aireportua, Hegaldi_kodea, Bidaiaren_iraupena, Prezioa, Irteera_data, Irteera_ordutegia, Aireportua) 
                VALUES (:zerbitzu_kodea, :aireportua1, :aireportua2, :hegaldi_kode, :iraupena, :prezioa, :irtera, :ordua, :airelinea)";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':zerbitzu_kodea', $zerbitzu_kodea);
        $stmt->bindParam(':aireportua1', $aireportua11);
        $stmt->bindParam(':aireportua2', $aireportua21);
        $stmt->bindParam(':hegaldi_kode', $hegaldi_kode1);
        $stmt->bindParam(':iraupena', $iraupena1);
        $stmt->bindParam(':prezioa', $prezioa1);
        $stmt->bindParam(':irtera', $irtera1);
        $stmt->bindParam(':ordua', $ordua1);
        $stmt->bindParam(':airelinea', $airelinea1);

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
