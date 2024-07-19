document.querySelector('.logout').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quiere cerrar sesión?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        window.location.href = '../../Index.html'; // Asegúrate de que esta es la página a la que quieres redirigir
    }
});

document.querySelector('.tutores').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'Tutores/Tutores.html'; // Redirects to the agendacion.html page
});

document.querySelector('.asignar').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'Asignar/Asignar.html'; // Redirects to the agendacion.html page
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