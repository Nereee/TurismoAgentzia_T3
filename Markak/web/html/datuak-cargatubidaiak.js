// Cargar los países dinámicamente en el select
function cargarHerrialdeak() {
    fetch('get_herrialdeak.php') 
        .then(response => response.json())
        .then(data => {
            const selectElement = document.getElementById('herrialdeak');
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.kodea;
                option.textContent = item.helmuga;
                selectElement.appendChild(option);
            });
        })
        .catch(error => console.error('Error al cargar los datos:', error));
}

// Cargar los tipos de viaje dinámicamente en el select de 'bidaimota'
function cargarBidaimota() {
    fetch('get_bidaimota.php')  
        .then(response => response.json())
        .then(data => {
            const selectElement = document.getElementById('bidaimota');
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.KODEA;
                option.textContent = item.DESKRIBAPENA;
                selectElement.appendChild(option);
            });
        })
        .catch(error => console.error('Error al cargar los datos:', error));
}

// Función para confirmar el logout
function seguruZaude(event) {
    event.preventDefault();
    document.getElementById("overlay").style.visibility = "visible";
}

// Respuesta del usuario en la confirmación de logout
function erantzunaBaiEz(erantzuna) {
    if (erantzuna) {
        alert("Saioa ixten");
        window.location.href = "../index.html";
    } else {
        document.getElementById("overlay").style.visibility = "hidden";
    }
}

// Llamamos a las funciones al cargar la página
document.addEventListener("DOMContentLoaded", function () {
    cargarHerrialdeak();
    cargarBidaimota();
});
