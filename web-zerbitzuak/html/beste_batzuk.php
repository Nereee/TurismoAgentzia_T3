<?php
// Comprobamos si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mostramos los datos recibidos a través de POST (esto se puede eliminar una vez probado)
    var_dump($_POST);

    // Datos de conexión a la base de datos
    $host = 'localhost:3307';
    $username = 'root';
    $password = '';
    $database = 'db_bidaia_gestoreafroga';

    try {
        // Establecer conexión con la base de datos
        $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        // Configurar para que las excepciones se manejen automáticamente
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recibir los datos del formulario
        $bidai_mota1 = $_POST["bidai_mota"];
        $eguna1 = $_POST["eguna"];
        $deskribapena1 = $_POST["deskribapena"];
        $prezioa1 = $_POST["prezioa"];

        // Consulta SQL para insertar los datos en la base de datos
        $sql = "INSERT INTO beste_batzuk(Zerbitzu_kodea, Egun, Deskribapena, Prezioa) 
                VALUES (:bidai_mota, :eguna, :deskribapena, :prezioa)";

        // Preparar la consulta SQL
        $stmt = $con->prepare($sql);
        // Asociar los parámetros de la consulta con los valores recibidos
        $stmt->bindParam(':bidai_mota', $bidai_mota1);
        $stmt->bindParam(':eguna', $eguna1);
        $stmt->bindParam(':deskribapena', $deskribapena1);
        $stmt->bindParam(':prezioa', $prezioa1);

        // Ejecutar la consulta y redirigir si tiene éxito
        if ($stmt->execute()) {
            // Si la inserción fue exitosa, redirigir a la página de inicio
            header("Location: ../index.html");
            exit(); // Asegurarse de que el script se detenga aquí
        } else {
            // Si hubo un error en la inserción, mostrar un mensaje de error
            echo "ERROR al insertar los datos.";
        }
    } catch (PDOException $e) {
    // Capturar el error específico de clave primaria duplicada
    if ($e->getCode() == 23000) {
        $error = "Error: El valor de la clave primaria ya existe en la base de datos. Por favor, ingresa un valor único.";
    } else {
        // Otros errores
        $error = "Ha ocurrido un error: " . $e->getMessage();
    }
        // Capturar cualquier error de conexión y mostrar el mensaje
        die('Error de conexión: ' . $e->getMessage());
    }
}
?>

