document.querySelector('.logout').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quiere cerrar sesión?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        window.location.href = '../Index.html'; // Asegúrate de que esta es la página a la que quieres redirigir
    }
});

document.querySelector('.Disponibilidad').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'Disponibilidad de salones/Disponibilidad de salones.html'; // Redirects to the agendacion.html page
});

document.querySelector('.Agendar').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'Agendar salon/Agendar salon.html'; // Redirects to the agendacion.html page
});

document.querySelector('.Horario').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'Horario de grupo/Horario de grupo.html'; // Redirects to the agendacion.html page
});