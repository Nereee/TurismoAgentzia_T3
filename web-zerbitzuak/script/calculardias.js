// Bi data artean egon daitezkeen egun kopurua kalkulatzen duen funtzioa
function calcularDias() {
  var hasieraData = document.getElementById("hasiera_data").value;
  var amaieraData = document.getElementById("amaiera_data").value;

  if (hasieraData && amaieraData) {
    var fechaInicio = new Date(hasieraData);
    var fechaFin = new Date(amaieraData);

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

// Data aldatu bakoitzean egun kopurua berrikusteko ekintza gehitu
document.getElementById("hasiera_data").addEventListener("change", calcularDias);
document.getElementById("amaiera_data").addEventListener("change", calcularDias);

// Formularioa bidaltzea saihesteko balidazioa, data egokiak ez badira
const form = document.getElementById('bidaiakForm');
const table = document.getElementById('dataTable');
const tableBody = table.querySelector('tbody');
