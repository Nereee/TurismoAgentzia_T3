
<?php
    $server ='localhost:3307';
    $username ='root';
    $password = '';
    $database = 'prueba';

    try{
        $con =new PDO("mysql:host=$server;dbname=$database" , $username, $password);
      
        if($_SERVER["REQUEST_METHOD"] =="POST") {

        $nombre1 = $_POST["nombre"];

        $pwd1 = $_POST["pwd"];

        $sql = "INSERT INTO prueba2 (name, password) VALUES (:nombre, :pwd)";        
    
        $stmt = $con->prepare($sql);
        
        $stmt-> bindParam(':nombre', $nombre1);

        $stmt->bindParam(':pwd', $pwd1);

            if($stmt ->execute()) {
                echo"datos almacenados correctamente";
            }

            else{
                echo"ERROR hijoeperra";
            }
        }


    }catch(PDOException $e) {
        die('conexion de error ' . $e->getMessage());
    }
    ?>