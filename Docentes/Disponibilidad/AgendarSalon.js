document.querySelector('.logout').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quiere cerrar sesión?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        window.location.href = '../../../Index.php'; // Asegúrate de que esta es la página a la que quieres redirigir
    }
});

document.querySelector('.H001').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default action of the button
    window.location.href = 'EDIFICIO-H/H001/disponibilidad.php'; // Redirects to the agendacion.html page
});

function mostrarLista(id) {
var lista = document.getElementById(id);
if (lista.style.display === 'block') {
lista.style.display = 'none';
} else {
var listas = document.getElementsByClassName('lista');
for (var i = 0; i < listas.length; i++) {
listas[i].style.display = 'none';
}
lista.style.display = 'block';
}
}