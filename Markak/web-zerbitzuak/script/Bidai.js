// Función para calcular los días entre dos fechas
function calcularDias() {
  var hasieraData = document.getElementById("hasiera_data").value;
  var amaieraData = document.getElementById("amaiera_data").value;

  if (hasieraData && amaieraData) {
    var fechaInicio = new Date(hasieraData);
    var fechaFin = new Date(amaieraData);

    // Calcular la diferencia en milisegundos
    var diferencia = fechaFin - fechaInicio;

    // Convertir la diferencia a días
    var dias = diferencia / (1000 * 3600 * 24);

    // Si la diferencia es negativa, muestra un mensaje de error
    if (dias < 0) {
      document.getElementById("egunak").value = "";
      alert("Amaiera data ezin da hasiera data baino lehenago izan.");
    } else {
      document.getElementById("egunak").value = dias + " egun";
    }
  }
}

// Agregar los eventos para recalcular los días cuando se cambian las fechas
document.getElementById("hasiera_data").addEventListener("change", calcularDias);
document.getElementById("amaiera_data").addEventListener("change", calcularDias);

// Validación para evitar enviar el formulario si las fechas no son correctas
const form = document.getElementById('bidaiakForm');
const table = document.getElementById('dataTable');
const tableBody = table.querySelector('tbody');

form.addEventListener('miBoton', function(event) {
  event.preventDefault();

  // Obtener los valores del formulario
  const izena = document.getElementById('izena').value;
  const bidaimota = document.getElementById('bidaimota').value;
  const hasieraData = document.getElementById('hasiera_data').value;
  const amaieraData = document.getElementById('amaiera_data').value;
  const egunak = document.getElementById('egunak').value;
  const herrialdeak = document.getElementById('herrialdeak').value;
  const deskribapena = document.getElementById('deskribapena').value;
  const zerbitzuak = document.getElementById('zerbitzuak').value;

  // Crear una nueva fila en la tabla
  const row = document.createElement('tr');
  row.innerHTML = `
    <td>${izena}</td>
    <td>${bidaimota}</td>
    <td>${hasieraData}</td>
    <td>${amaieraData}</td>
    <td>${egunak}</td>
    <td>${herrialdeak}</td>
    <td>${deskribapena}</td>
    <td>${zerbitzuak}</td>
  `;

  // Agregar la fila al cuerpo de la tabla
  tableBody.appendChild(row);

  // Mostrar la tabla
  table.style.display = 'table';

  // Limpiar el formulario
  form.reset();
});
