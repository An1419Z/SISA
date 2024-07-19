function handleLogin(event) {
    event.preventDefault(); // Previene la acción por defecto del formulario
    var destino;
        alert('Usuario registrado exitosamente');
        destino = '../../Index.html';
    // Redirigir al usuario al destino correspondiente
    window.location.href = destino;
}
