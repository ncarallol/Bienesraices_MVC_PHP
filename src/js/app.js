document.addEventListener('DOMContentLoaded', function() {

    eventListeners();

    darkMode ();
});

function darkMode () {
    const modoOscuro = window.matchMedia('(prefers-color-scheme:dark)');
    
    if (modoOscuro.matches) {
        document.body.classList.add('darkmode');
    } else {
        document.body.classList.remove('darkmode');
    }

    modoOscuro.addEventListener('change',function() {
        if (modoOscuro.matches) {
            document.body.classList.add('darkmode');
        } else {
            document.body.classList.remove('darkmode');
        }

    });
}





function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', mostrarNav);

    function mostrarNav(){

        const navegacion = document.querySelector('.navegacion');

        navegacion.classList.toggle('mostrar'); 
    } 
    
    //Muestra campos de email o telefono

    const contacto = document.querySelectorAll('input[name="contacto[contacto]"]')

    contacto.forEach(input => input.addEventListener('click', mostrarContacto));
}

function mostrarContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if (e.target.id === 'tel') {
     contactoDiv.innerHTML = `
     <label for="Telefono" >Telefono</label>
     <input type="tel" placeholder="Tu Telefono" id="Telefono" name="contacto[telefono]" required>
     <p>Elija la fecha y la hora</p>
     <label for="fecha">Fecha:</label>
     <input type="date" id="fecha" name="contacto[fecha]">
     <label for="Hora">Hora:</label>
    <input type="time" id="Hora" min="09:00" max="19:00" name="contacto[hora]">

    
     `;

    } else {
    contactoDiv.innerHTML = `
    <label for="E-mail" >E-mail</label>
    <input type="email" placeholder="Tu E-mail" id="E-mail" name="contacto[email]" required>

    
    `;

    }

    
}

