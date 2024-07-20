document.querySelector('.logout').addEventListener('click', function(event) {
    event.preventDefault(); // Previene la acción por defecto del enlace
    var mensaje = 'Quiere cerrar sesión?'; // Cambia esto por el mensaje que desees
    var confirmacion = confirm(mensaje);
    if (confirmacion) {
        window.location.href = '../../Index.html'; // Asegúrate de que esta es la página a la que quieres redirigir
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const edificiosButton = document.getElementById("edificios-button");
    const buildingContent = document.getElementById("building-content");
    const edificioAButton = document.getElementById("edificio-a");
    const edificioAButtonh = document.getElementById("edificio-h");
    const edificioA = document.getElementById("edificio-A");
    const edificioH = document.getElementById("edificio-H");
    const audiovisualButton = document.getElementById("audiovisual-button");
    const audiovisualButtonh = document.getElementById("audiovisual-button-h");
    const avContent = document.getElementById("av-content");
    const agendarUsoButton = document.getElementById("agendar-uso-button");
    const agendaForm = document.getElementById("agenda-form");
    const solicitarusoButton = document.getElementById("solicitar-uso-button");
    const solicitarForm = document.getElementById("solicitar-form");
    const imagen = document.getElementById("Logo");

    edificiosButton.addEventListener("click", function() {
        if (buildingContent.style.display === "none" || buildingContent.style.display === "") {
            buildingContent.style.display = "block";
        } else {
            buildingContent.style.display = "none";
            edificioA.style.display = "none"; // Ocultar la tabla de salones si se cierra la de edificios
            edificioH.style.display = "none";
            avContent.style.display = "none"; // Ocultar el cuadro de audiovisual si se cierra la de edificios
            agendaForm.style.display = "none"; // Ocultar el formulario si se cierra la de edificios
        }
    });

    edificioAButton.addEventListener("click", function() {
        if (edificioA.style.display === "none" || edificioA.style.display === "") {
            edificioA.style.display = "block";
        } else {
            edificioA.style.display = "none";
            avContent.style.display = "none"; // Ocultar el cuadro de audiovisual si se cierra la de salones
            agendaForm.style.display = "none"; // Ocultar el formulario si se cierra la de salones
        }
    });

    edificioAButtonh.addEventListener("click", function() {
        if (edificioA.style.display === "none" || edificioA.style.display === "") {
            edificioA.style.display = "none";
            edificioH.style.display = "block";
        } else {
            edificioH.style.display = "none";
            edificioA.style.display = "none";
            avContent.style.display = "none"; // Ocultar el cuadro de audiovisual si se cierra la de salones
            agendaForm.style.display = "none"; // Ocultar el formulario si se cierra la de salones
        }
    });

    audiovisualButton.addEventListener("click", function() {
        if (avContent.style.display === "none" || avContent.style.display === "") {
            avContent.style.display = "block";

        } else {
            avContent.style.display = "none";

        }
    });

    audiovisualButtonh.addEventListener("click", function() {
        if (avContent.style.display === "none" || avContent.style.display === "") {
            avContent.style.display = "block";
            agendarUsoButton.style.display = "none";
            solicitarForm.style.display = "none";
        } else {
            avContent.style.display = "none";
            agendarUsoButton.style.display = "none";
            solicitarForm.style.display = "none";
        }
    });

    agendarUsoButton.addEventListener("click", function() {
        if (agendaForm.style.display === "none" || agendaForm.style.display === "") {
            agendaForm.style.display = "block";
            avContent.style.display = "none";
        } else {
            agendaForm.style.display = "none"; // Ocultar el formulario si se cierra el cuadro de audiovisual
        }
    });

    solicitarusoButton.addEventListener("click", function() {
        if (solicitarForm.style.display === "none" || agendaForm.style.display === "") {
            solicitarForm.style.display = "block";
            avContent.style.display = "none";
        } else {
            solicitarForm.style.display = "none";
        }
    });
});

function enviarSolicitud() {
    // Aquí puedes agregar la lógica para enviar la solicitud
    alert('Solicitud enviada');
    document.getElementById("av-content").style.display = "block"; 
    document.getElementById("agenda-form").style.display = "none";
}

function cancelar() {
    document.getElementById("agenda-form").style.display = "none"; // Ocultar el formulario cuando se cancela
    document.getElementById("av-content").style.display = "block"; 
}

function enviarSolicitudS() {
    // Aquí puedes agregar la lógica para enviar la solicitud
    alert('Solicitud enviada');
    document.getElementById("solicitar-form").style.display = "none"; // Ocultar el formulario después de enviar
    document.getElementById("av-content").style.display = "block"; 
}

function cancelarS() {
    document.getElementById("solicitar-form").style.display = "none"; // Ocultar el formulario cuando se cancela
    document.getElementById("av-content").style.display = "block"; 
}

function cancelart() {
    document.getElementById("av-content").style.display = "none"; 
    document.getElementById("Logo").style.display = "block"; 
}