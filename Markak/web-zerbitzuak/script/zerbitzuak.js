   
        // Selección de radio buttons
        const radioForm1 = document.getElementById('radio-form1');
        const radioForm2 = document.getElementById('radio-form2');
        const radioForm3 = document.getElementById('radio-form3');
    
        // Formularios
        const formulario1 = document.getElementById('formulario1');
        const formulario2 = document.getElementById('formulario2');
        const formulario3 = document.getElementById('formulario3');
    
        // Función para mostrar el formulario correspondiente
        function manejarCambio() {
            formulario1.style.display = radioForm1.checked ? 'block' : 'none';
            formulario2.style.display = radioForm2.checked ? 'block' : 'none';
            formulario3.style.display = radioForm3.checked ? 'block' : 'none';
        }
    
        // Asignar eventos
        radioForm1.addEventListener('change', manejarCambio);
        radioForm2.addEventListener('change', manejarCambio);
        radioForm3.addEventListener('change', manejarCambio);
    
        // Manejo del formulario Joan Etorri
        const radioJoan = document.getElementById('radio-joan');
        const radioJoan2 = document.getElementById('radio-joan2');
        const formularioJoanEtorri = document.getElementById('formulariojoanetorri');
    
        radioJoan2.addEventListener('change', function() {
            formularioJoanEtorri.style.display = this.checked ? 'block' : 'none';
        });
    
        radioJoan.addEventListener('change', function() {
            if (this.checked) {
                formularioJoanEtorri.style.display = 'none';
            }
        });
    