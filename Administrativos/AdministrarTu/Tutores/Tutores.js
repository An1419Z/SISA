document.querySelector('.logout').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quiere cerrar sesión?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        window.location.href = '../../../Index.php'; // Asegúrate de que esta es la página a la que quieres redirigir
    }
});

document.querySelector('.REGRESAR').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = '../AdministrarTu.html'; // Redirects to the agendacion.html page
});

document.getElementById('MODIFICAR').addEventListener('click', function() {
    document.getElementById('boton1').style.display = 'none'; // Hides the MODIFICAR button
    document.getElementById('boton2').style.display = 'block'; // Shows the CONFIRMAR button
});

document.getElementById('CANCELAR').addEventListener('click', function() {
    document.getElementById('boton1').style.display = 'block'; // Shows the MODIFICAR button
    document.getElementById('boton2').style.display = 'none'; // Hides the CONFIRMAR button
});

document.querySelector('.CONFIRMAR').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quieres guardar los cambios?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        document.getElementById('boton1').style.display = 'block'; // Shows the MODIFICAR button
        document.getElementById('boton2').style.display = 'none'; // Hides the CONFIRMAR button
    }
});