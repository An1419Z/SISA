document.querySelector('.logout').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quiere cerrar sesión?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        window.location.href = '../Index.php'; // Asegúrate de que esta es la página a la que quieres redirigir
    }
});

document.querySelector('.SALONES').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'Agendacion/INDEX.php'; // Redirects to the agendacion.html page
});

document.querySelector('.HORARIOS').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'AdministrarHo/Administrarho.php'; // Redirects to the agendacion.html page
});

document.querySelector('.TUTORADOS').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'AdministrarTu/AdministrarTu.php'; // Redirects to the agendacion.html page
});

document.querySelector('.DISPONIBILIDAD').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'Disponibilidaddesalones/Consultardisponibilidad/IndexDispo.php'; // Redirects to the disponibilidad.php page
});

document.querySelector('.REGISTRO').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = '../Inicio/Registro/Registro.php'; // Redirects to the disponibilidad.php page
});

document.addEventListener('DOMContentLoaded', function(){
    const menu = document.getElementById('container');
    const toggle = document.getElementById('toggleMenu');

    toggle.addEventListener("click", function(){
        if(menu.style.display === "none" || menu.style.display === ""){
            menu.style.display = "block";
        } else {
            menu.style.display = "none";
        }
    });
});