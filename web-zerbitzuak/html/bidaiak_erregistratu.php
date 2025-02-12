<?php
// conexion.php fitxategia inportatzen da (datu-basearekin konektatzeko)
require 'conexion.php';
session_start(); // Saioa hasteko
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Bidaiak</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Estilo orrialdea -->
</head>
<body>
<header>
    <div>
        <!-- Logoa eta menua -->
        <img class="logoAlexJav" src="../img/logoAlexjavexplorers(1).png" alt="Logo" width="170" height="110"/>
        <nav>
            <a href="hasiera.html">Hasiera</a>
            <a href="../index.html" onclick="seguruZaude(event)">Log out</a> <!-- Irten -->
        </nav>
    </div>
    <div id="overlay" class="overlay">
        <div class="dialog">
            <p>Seguru zaude atera nahi zarela?</p>
            <button class="bai-btn" onclick="erantzunaBaiEz(true)">BAI</button>
            <button class="ez-btn" onclick="erantzunaBaiEz(false)">EZ</button>
        </div>
    </div>
</header>

<!-- Formularioa -->
<form class="formulario" id="bidaiakForm">
    <h1>Bidaiak erregistratu</h1>
    
    <!-- Izena -->
    <label for="izena">Izena:</label>
    <hr><br>
    <input type="text" id="izena" name="izena" required><br>

    <!-- Bidai mota -->
    <label for="bidaimota">Bidai mota:</label>
    <hr><br>
    <select id="bidaimota" name="bidaimota" required>
        <option value="null" style="display:none;">--AUKERATU--</option>
        <?php
            // Datu-basearen "bidaia_motak" taulatik bidai mota guztiak lortzen
            $sql = "SELECT KODEA, DESKRIBAPENA FROM bidaia_motak"; 
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Aukera bakoitzaren izena eta kodea gehitzen
                    echo "<option value='" . $row['KODEA'] . "'>" . $row['DESKRIBAPENA'] . "</option>";
                }
            }
        ?>
    </select><br>

    <!-- Hasiera data -->
    <label for="hasiera_data">Hasiera data:</label>
    <hr><br>
    <input type="date" id="hasiera_data" name="hasiera_data" required><br>

    <!-- Amaiera data -->
    <label for="amaiera_data">Amaiera data:</label>
    <hr><br>
    <input type="date" id="amaiera_data" name="amaiera_data" required><br>

    <!-- Egunak -->
    <label for="egunak">Egunak:</label>
    <hr><br>
    <input type="text" id="egunak" name="egunak" readonly required><br>

    <!-- Herrialdeak -->
    <label for="herrialdeak">Herrialdea:</label>
    <select name="herrialdeak" id="herrialdeak">
        <option value="" style="display:none;">--Aukeratu herrialdea--</option>
        <?php
            // Datu-basearen "herrialdeak" taulatik herrialdeak lortzen
            $sql = "SELECT KODEA, HELMUGA FROM herrialdeak"; 
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Herrialde bakoitzaren izena eta kodea gehitzen
                    echo "<option value='" . $row['KODEA'] . "'>" . $row['HELMUGA'] . "</option>";
                }
            }
            $conn->close(); // Datu-basearekin lotura itxi
        ?>
    </select><br>
    <hr><br>

    <!-- Deskribapena -->
    <label for="deskribapena">Deskribapena:</label>
    <hr><br>
    <textarea name="deskribapena" id="deskribapena" rows="4" placeholder="Idatzi zerbait"></textarea><br>

    <!-- Zerbitzuak -->
    <label for="zerbitzuak">Kanpona agertzen diren zerbitzuak:</label>
    <hr><br>
    <textarea name="zerbitzuak" id="zerbitzuak" rows="4" placeholder="Idatzi zerbait"></textarea><br>

    <!-- Taula -->
    <table id="dataTable" style="display:none;">
        <thead>
            <tr>
                <th>Izena</th>
                <th>Bidai mota</th>
                <th>Hasiera data</th>
                <th>Amaiera data</th>
                <th>Egunak</th>
                <th>Herrialdeak</th>
                <th>Deskribapena</th>
                <th>Zerbitzuak</th>
            </tr>
        </thead>
        <tbody>
            <!-- Hemen dinamikoki erregistroak gehituko dira -->
        </tbody>
    </table>

    <!-- Botoiak -->
    <div>
        <button type="button" id="jsButton" class="form-buton">Taula bistaratu</button>
        <button type="submit" formmethod="post" formaction="bidaiak.php" class="form-buton" id="botoia">Erosi bidaia</button>
    </div>
</form>

<!-- JavaScript fitxategiak -->
<script src="../script/calculardias.js"></script> <!-- Egunen kalkulua -->
<script src="../script/Bidai.js"></script> <!-- Formularioa eta taula kudeatzea -->

</body>
</html>
