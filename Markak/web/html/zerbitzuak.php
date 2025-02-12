<?php
// conexion.php fitxategia ireki
require 'conexion.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zerbitzuak</title>
  <link rel="stylesheet" href="../css/style.css">
</head> 
<body> 
  
<header>
        <div>
          <img class="logoAlexJav" src="../img/logoAlexjavexplorers(1).png" alt="Logo" />
          <nav>
            <a href="hasiera.html">Hasiera</a>
            <a href="../index.html" onclick="seguruZaude(event)">Log out</a>
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
  <div class="formulario">
  <h1>Formulario Dinamikoak</h1>

    <div class="radioak">
      <label>
        <input type="radio" name="form-selector" value="hegaldia" /> Hegaldia
      </label>
      <label>
        <input type="radio" name="form-selector" value="ostatuak" /> Ostatuak
      </label>
      <label>
        <input type="radio" name="form-selector" value="deskripcion" /> Beste batzuk
      </label>
    </div>
<br>
  <div id="hegaldia" class="form-container">
    <h2>Hegaldiak</h2>
    <br>
    <form id="hegaldia-form">
      <label for="bidai_mota">Bidai Mota:</label><br/>
      <select id="bidai_mota" name="bidai_mota" required>
        <option value="null" style="visibility: hidden; display:none;">--AUKERATU--</option>

        <?php
                //DATU BASETIK
                $sql = "SELECT Kodea , Izena FROM zerbitzuak"; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Kodea'] . "'>" . $row['Izena'] . "</option>";
                    }
                }
                
                ?>
        </select><br>
      <label for="aireportua1">Aireportua 1:</label><br/>
      <select id="aireportua1" name="aireportua1" required>
                <option value="null" style="visibility: hidden; display:none;">--AUKERATU--</option>
                <?php
                //DATU BASETIK
                $sql = "SELECT AIREPORTUA, HIRIA FROM iata"; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['AIREPORTUA'] . "'>" . $row['HIRIA'] . "</option>";
                    }
                }
                
                ?>
            </select>
            <br>      
          <label for="aireportua2">Aireportua 2:</label><br/>
            <select id="aireportua1" name="aireportua1" required>
                <option value="null" style="visibility: hidden; display:none;">--AUKERATU--</option>
                <?php
                //DATU BASETIK
                $sql = "SELECT AIREPORTUA, HIRIA FROM iata"; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['AIREPORTUA'] . "'>" . $row['HIRIA'] . "</option>";
                    }
                }
                
                ?>
            </select>
            <br>      
      <label for="airelinea">Airelinea:</label><br/>
      <select id="airelinea" name="airelinea" required>
                <option value="null" style="visibility: hidden;" style="display:none;">--AUKERATU--</option>
                <?php
                //DATU BASETIK
                $sql = "SELECT AIRELINEA_KODEA, AIRELINEA_IZENA FROM airelineak"; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['AIRELINEA_KODEA'] . "'>" . $row['AIRELINEA_IZENA'] . "</option>";
                    }
                }
                
                ?>
            </select>
          <br>
      <label for="prezioa">Prezioa:</label><br/>
      <input type="number" id="prezioa" name="prezioa" required/><br/>
      <label for="irtera">Irteera:</label><br/>
      <input type="date" id="irtera" name="irtera" required/><br/>
      <label for="ordua">Ordua:</label><br/>
      <input type="time" id="ordua" name="ordua" required/><br/>
      <label for="iraupena">Iraupena:</label><br/>
      <input type="text" id="iraupena" name="iraupena" required/><br/>
        <div class="radioak">
      <label>
        <input type="radio" name="hegaldia-type" value="joan" checked/> Joan
      </label>
      <label>
        <input type="radio" name="hegaldia-type" value="joan-etorri"/> Joan eta Etorri
      </label>
        </div>
      <div id="joan-etorri-form" style="display: none;">
        <h3>Formulario Adicional (Joan eta Etorri)</h3>
        <label for="itzulera">Itzulera:</label><br/>
        <input type="date" id="itzulera" name="itzulera"/><br/>
        <label for="itzuleraordua">Itzulera Ordua:</label><br/>
        <input type="time" id="itzuleraordua" name="itzuleraordua"/><br/>
        <label for="bueltairaupena">Bueltairaupena:</label><br />
        <input type="text" id="bueltairaupena" name="bueltairaupena"/><br/>
        <label for="hegialdikode">Hegialdi Kode:</label><br />
        <input type="text" id="hegialdikode" name="hegialdikode"/><br/>
      </div>
      <br>
      <button type="submit" formmethod="post" formaction="hegaldi.php" class="form-buton"  id="botoia">Gorde </button>
      <button type="button" onclick="addToTable('hegaldia')">Gehitu taulara</button>
    </form>
    <h3>Hegaldien datuen taula</h3>
    <table id="hegaldia-table">
      <thead>
        <tr>
          <th>Bidai Mota</th>
          <th>Aireportua 1</th>
          <th>Aireportua 2</th>
          <th>Airelinea</th>
          <th>Prezioa</th>
          <th>Irteera</th>
          <th>Ordua</th>
          <th>Iraupena</th>
          <th>Itzulera</th>
          <th>Itzulera Ordua</th>
          <th>Bueltairaupena</th>
          <th>Hegialdi Kode</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>

  <div id="ostatuak" class="form-container">
    <h2>Ostatuak</h2>
    <br>
    <form id="ostatuak-form">
      <label for="bidai_mota">Bidai Mota:</label><br />
      <select id="bidai_mota" name="bidai_mota" required>
        <option value="null" style="visibility: hidden; display:none;">--AUKERATU--</option>

        <?php
                //DATU BASETIK
                $sql = "SELECT Kodea , Izena FROM zerbitzuak"; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Kodea'] . "'>" . $row['Izena'] . "</option>";
                    }
                }
                
                ?>
        </select><br>
      <label for="izena">Izena:</label><br/>
      <input type="text" id="izena" name="izena" required /><br/>
      <label for="hiria">Hiria:</label><br />
      <input type="text" id="hiria" name="hiria" required /><br/>
      <label for="prezioa">Prezioa:</label><br/>
      <input type="number" id="prezioa" name="prezioa" required /><br/>
      <label for="sarreraeguna">Sarrera Eguna:</label><br/>
      <input type="date" id="sarreraeguna" name="sarreraeguna" required /><br/>
      <label for="irtera">Irteera:</label><br/>
      <input type="date" id="irtera" name="irtera" required /><br/>
      <label for="logela">Logela:</label><br/>
      <select id="logela" name="logela" required>
                <option value="null">--AUKERATU--</option>
                <?php
                //DATU BASETIK
                $sql = "SELECT KODEA , DESKRIBAPENA FROM logela_motak"; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['KODEA'] . "'>" . $row['DESKRIBAPENA'] . "</option>";
                    }
                }
                
                ?>
            </select><br>
      <button type="button" onclick="addToTable('ostatuak')">Gehitu taulara</button>
      <button type="submit" formmethod="post" formaction="ostatua.php" class="form-buton"  id="botoia">Gorde</button>
    </form>
    <h3>Ostatuen datu taula</h3>
    <table id="ostatuak-table">
      <thead>
        <tr>
          <th>Bidai Mota</th>
          <th>Izena</th>
          <th>Hiria</th>
          <th>Prezioa</th>
          <th>Sarrera Eguna</th>
          <th>Irteera</th>
          <th>Logela</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>

  <div id="deskripcion" class="form-container">
    <h2>Beste batzuk</h2>
    <br>
    <form id="deskripcion-form">
      <label for="bidai_mota">Bidai Mota:</label><br/>
      <select id="bidai_mota" name="bidai_mota" required>
        <option value="null" style="visibility: hidden; display:none;">--AUKERATU--</option>

        <?php
                //DATU BASETIK
                $sql = "SELECT Kodea , Izena FROM zerbitzuak"; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Kodea'] . "'>" . $row['Izena'] . "</option>";
                    }
                }
                
                ?>
        </select><br>
      <label for="izena">Izena:</label><br />
      <input type="text" id="izena" name="izena" required /><br/>
      <label for="eguna">Eguna:</label><br />
      <input type="date" id="eguna" name="eguna" required /><br/>
      <label for="deskribapena">Deskribapena:</label><br />
      <textarea  name="deskribapena" id="deskribapena" rows="5"  placeholder="Deskribapena"></textarea>
      <br/>
      <label for="prezioa">Prezioa:</label><br />
      <input type="number" id="prezioa" name="prezioa" required /><br/>
      <button type="submit" formmethod="post" formaction="beste_batzuk.php" class="form-buton"  id="botoia">Gorde</button>
      <button type="button" onclick="addToTable('deskripcion')">Gehitu taulara</button>
    </form>
    <h3>Beste batzuk datuen taula</h3>
    <table  id="deskripcion-table">
      <thead>
        <tr>
          <th>Bidai Mota</th>
          <th>Izena</th>
          <th>Eguna</th>
          <th>Deskribapena</th>
          <th>Prezioa</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>

<script>
  function calcularDias() {
  var sarreraeguna = document.getElementById("sarreraeguna").value;
  var irtera = document.getElementById("irtera").value;

  if (sarreraeguna && irtera) {
    var fechaInicio = new Date(sarreraeguna);
    var fechaFin = new Date(irtera);

    // Milisegundoetan dagoen desberdintasuna kalkulatu
    var diferencia = fechaFin - fechaInicio;

    // Desberdintasun hori egunerako bihurtu
    var dias = diferencia / (1000 * 3600 * 24);

    // Desberdintasun negatiboa bada, errore mezua erakutsi
    if (dias < 0) {
      document.getElementById("egunak").value = "";
      alert("Amaiera data ezin da hasiera data baino lehenago izan.");
    } else {
      document.getElementById("egunak").value = dias + " egun";
    }
  }
}
</script>
<script src="../script/zerbitzu.js"></script>

      <script>
        function seguruZaude(event) {
             event.preventDefault();
             document.getElementById("overlay").style.visibility = "visible";
         }
         
         function erantzunaBaiEz(erantzuna) {
             if (erantzuna) {
                 alert("saioa ixten");
                 window.location.href = "../index.html"; // Agrega la URL aquí
             } else {
                 document.getElementById("overlay").style.visibility = "hidden";
             }
         }
    </script>
</body>
</html>
