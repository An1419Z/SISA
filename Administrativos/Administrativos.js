document.querySelector('.logout').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quiere cerrar sesión?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        window.location.href = '../Index.html'; // Asegúrate de que esta es la página a la que quieres redirigir
    }
});

document.querySelector('.SALONES').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'Agendacion/Agendacion.html'; // Redirects to the agendacion.html page
});

document.querySelector('.HORARIOS').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'AdministrarHo/Administrarho.html'; // Redirects to the agendacion.html page
});

document.querySelector('.TUTORADOS').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'AdministrarTu/AdministrarTu.html'; // Redirects to the agendacion.html page
});