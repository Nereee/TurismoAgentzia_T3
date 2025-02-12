document.getElementById('jsButton').addEventListener('click', function(event) {
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
  const tableBody = document.querySelector('#dataTable tbody');
  tableBody.appendChild(row);

  // Mostrar la tabla
  const table = document.getElementById('dataTable');
  table.style.display = 'table';

  // Limpiar el formulario
  document.getElementById('bidaiakForm').reset();
});

