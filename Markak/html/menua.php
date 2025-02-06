<?php
session_start();
require "conexion.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/estiloa.css" />
    <title>Login</title>
  </head>
  <body id="bodylogin">
  <section id="sectionlogin">
      <div class="form-box">
        <div class="form-value">
          <form action="html/menua.php" method="post">
            <h2 id="h2login">Login</h2>

            <div class="inputbox">
              <ion-icon name="people-outline"></ion-icon
              ><!---Ikonoa-->
              <input
                type="text"
                id="erabiltzailea"
                name="erabiltzailea"
                required
              />
              <label for="erabiltzailea">Agentzia izena</label>
            </div>
            <div class="inputbox">
              <ion-icon name="lock-closed-outline"></ion-icon>
              <!---Ikonoa-->
              <input type="password" id="pasahitza" name="pasahitza" required />
              <label for="pasahitza">Pasahitza</label>
            </div>
            <div class="view">
              <label for="ikusiPasahitza">
                <p>
                  <input type="checkbox" id="ikusiPasahitza" /> ikusi pasahitza
                </p>
              </label>
            </div>
            <button id="buttonlogin1" type="submit">Log in</button>
            <div class="register">
              <p>
                Konturik izan ezean, erregistratu app-an
              </p>
            </div>
          </form>
        </div>
      </div>
    </section>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    
  </body>
</html>


<?php
$erabiltzailea = htmlspecialchars(trim($_POST['erabiltzailea']));
$pasahitza = htmlspecialchars(trim($_POST['pasahitza']));

$sql = "SELECT izena, pasahitza FROM agentzia WHERE izena = '$erabiltzailea' and pasahitza = '$pasahitza'";
echo $erabiltzailea;
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

        header("Location: hasiera.html");
        exit();
      
} else {
    echo "<script>
        setTimeout(function(){
        alert('Erabiltzailearen izena ez da existitzen.');
        },25);
        setTimeout(function(){
        window.location.href = '../index.html';
        },26);
        </script>";
    exit();
}
$stmt->close();
?>
