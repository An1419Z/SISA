document.querySelector('.logout').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quiere cerrar sesión?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        window.location.href = '../../Index.php'; // Asegúrate de que esta es la página a la que quieres redirigir
    }
});

document.getElementById('ok').addEventListener('click', function() {
    const dateInput = document.getElementById('date-input').value;
    const regex = /7\/2024$/; // Modificamos la expresión regular para que solo acepte fechas en el formato MM/2024

    if (dateInput === '') {
        // Si no se ingresa ninguna fecha, muestra un mensaje de error diferente
        document.getElementById('error-message').style.display = 'block';
        document.getElementById('error-message').innerText = 'Por favor, ingresa una fecha.';
        document.getElementById('table-container').style.display = 'none';
    } else if (regex.test(dateInput)) {
        // Si la fecha cumple con el formato MM/2024, muestra la tabla
        document.getElementById('table-container').style.display = 'block';
        document.getElementById('error-message').style.display = 'none';
    } else {
        // Si la fecha no cumple con el formato, muestra un mensaje de error
        document.getElementById('error-message').style.display = 'block';
        document.getElementById('error-message').innerText = 'Fecha no válida. Por favor, use el formato mm/aaaa.';
        document.getElementById('table-container').style.display = 'none';
    }
});

document.getElementById('clear').addEventListener('click', function() {
    // Limpia el campo de entrada y oculta la tabla y el mensaje de error
    document.getElementById('date-input').value = '';
    document.getElementById('error-message').style.display = 'none';
    document.getElementById('table-container').style.display = 'none';
});

document.getElementById('cancel').addEventListener('click', function() {
    // Limpia el campo de entrada y oculta la tabla y el mensaje de error
    document.getElementById('date-input').value = '';
    document.getElementById('error-message').style.display = 'none';
    document.getElementById('table-container').style.display = 'none';
});