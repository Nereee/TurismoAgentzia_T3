<?php
// Sesioak hasi eta konexioa barneko "conexion.php" fitxategiaren bidez
session_start();
require "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
  <!-- Orrialdearen hizkuntza ingelesa da -->
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <title>Login</title>
    <!-- Orrialdearen izenburua -->
  </head>
  <body id="bodylogin">
    <!-- Orrialdearen gorputza -->
    <section id="sectionlogin">
      <!-- Saioa hasteko sekzio nagusia -->
      <div class="form-box">
        <!-- Formularioaren edukia -->
        <div class="form-value">
          <form id="indexform" action="html/menua.php" method="post">
            <h2 id="h2login">Login</h2>
            <!-- Formularioaren izenburua -->
            <div class="inputbox">
              <ion-icon name="people-outline"></ion-icon>
              <!-- Erabiltzaile izena sartzeko eremua -->
              <input type="text" id="erabiltzailea" name="erabiltzailea" required/>
              <label for="erabiltzailea">Agentzia izena</label>
            </div>
            <div class="inputbox">
              <ion-icon name="lock-closed-outline"></ion-icon>
              <!-- Pasahitza sartzeko eremua -->
              <input type="password" id="pasahitza" name="pasahitza" required />
              <label for="pasahitza">Pasahitza</label>
            </div>
            <div class="view">
              <!-- Pasahitza ikusteko kontrola -->
              <label for="ikusiPasahitza">
                <input type="checkbox" id="ikusiPasahitza">Ikusi pasahitza
              </label>
            </div>
            <button id="buttonlogin1" type="submit">Log in</button>
            <!-- Bidaltzeko botoia -->
            <div id="registratu">
              <a HREF="html/registro.html" style="text-decoration: none;">Registratu</a>
              <!-- Erregistratzeko aukera -->
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Ionicons ikonoak kargatzen dira -->
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
// Formularioaren datuak jasotzen dira (erabiltzailea eta pasahitza)
$erabiltzailea = htmlspecialchars(trim($_POST['erabiltzailea']));
$pasahitza = htmlspecialchars(trim($_POST['pasahitza']));

// SQL kontsulta erabiltzailearen datuak egiaztatzeko
$sql = "SELECT izena, pasahitza FROM agentzia WHERE izena = '$erabiltzailea' and pasahitza = '$pasahitza'";
// Erabiltzailea erakusten da (debugging helburuetarako)
echo $erabiltzailea;
$result = $conn->query($sql);

// Kontsulta arrakastatsua bada eta erabiltzailea aurkitzen bada
if ($result->num_rows > 0) {
    // Erabiltzailearen datuak jasotzen dira
    $user = $result->fetch_assoc();

    // Erabiltzailea onartu eta beste orri batera bideratzen da
    header("Location: hasiera.html");
    exit();
} else {
    // Erabiltzailea ez da aurkitu: errore mezua eta berriro saiatzea
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
// Sententzia prestatzailea itxura
$stmt->close();
?>
