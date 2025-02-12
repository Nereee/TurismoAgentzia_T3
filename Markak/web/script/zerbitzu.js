// Radio botoiak eta formularioak aukeratzeko elementuak hautatzen dira
const radioButtons = document.querySelectorAll('input[name="form-selector"]');
const forms = document.querySelectorAll('.form-container');

// Radio botoi bat aldatzen denean, formulario egokia erakusteko logika
radioButtons.forEach(radio => {
  radio.addEventListener('change', () => {
    // Formulario guztiak ezkutatu
    forms.forEach(form => form.style.display = 'none');
    
    // Hautatutako radio botoiaren balioarekin lotutako formularioa erakutsi
    const selectedForm = document.getElementById(radio.value);
    if (selectedForm) {
      selectedForm.style.display = 'block';
    }
  });
});

// "Joan-Etorri" aukera hautatuz gero, formulario gehigarri bat erakutsi
document.querySelectorAll('input[name="hegoaldia-type"]').forEach(radio => {
  radio.addEventListener('change', () => {
    const additionalForm = document.getElementById('joan-etorri-form');
    if (radio.value === 'joan-etorri') {
      additionalForm.style.display = 'block';
    } else {
      additionalForm.style.display = 'none';
    }
  });
});

// Formularioaren datuak taulan gehitzeko funtzioa
function addToTable(formId) {
  // Formularioa eta formularioan sartutako datuak lortzen dira
  const form = document.getElementById(`${formId}-form`);
  const formData = new FormData(form);

  // Taula eta haren gorputza lortzen dira
  const table = document.getElementById(`${formId}-table`);
  const tableBody = table.querySelector('tbody');

  // Taulako lerro berri bat sortu
  const row = document.createElement('tr');

  // Formularioaren arabera, egokitutako zelulak gehitzen dira
  if (formId === 'hegoaldia') {
    const fields = ['bidai_mota', 'aireportua1', 'aireportua2', 'airelinea', 'prezioa', 'irtera', 'ordua', 'iraupena'];
    fields.forEach(field => {
      const cell = document.createElement('td');
      cell.textContent = formData.get(field);
      row.appendChild(cell);
    });

    // "Joan-Etorri" hautatuz gero, beste eremu batzuk gehitu
    if (formData.get('hegoaldia-type') === 'joan-etorri') {
      const additionalFields = ['itzulera', 'itzuleraordua', 'bueltairaupena', 'hegialdikode'];
      additionalFields.forEach(field => {
        const cell = document.createElement('td');
        cell.textContent = formData.get(field);
        row.appendChild(cell);
      });
    } else {
      // "Joan-Etorri" ez hautatuz gero, zelulak hutsik uzten dira
      ['itzulera', 'itzuleraordua', 'bueltairaupena', 'hegialdikode'].forEach(() => {
        const cell = document.createElement('td');
        cell.textContent = '';
        row.appendChild(cell);
      });
    }
  } else if (formId === 'ostatuak') {
    const fields = ['bidai_mota', 'izena', 'hiria', 'prezioa', 'sarreraeguna', 'irtera', 'logela'];
    fields.forEach(field => {
      const cell = document.createElement('td');
      cell.textContent = formData.get(field);
      row.appendChild(cell);
    });
  } else if (formId === 'deskripcion') {
    const fields = ['bidai_mota', 'izena', 'eguna', 'deskribapena', 'prezioa'];
    fields.forEach(field => {
      const cell = document.createElement('td');
      cell.textContent = formData.get(field);
      row.appendChild(cell);
    });
  }

  // Lerroa taulako gorputzean gehitzen da eta taula erakusten da (ezkutatuta egon bazen)
  tableBody.appendChild(row);
  table.style.display = 'table';

  // Datuak taulara gehitu ondoren, formularioa berriro garbitzen da
  form.reset();
}
