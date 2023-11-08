function enviarMensaje(remitente) {
    const mensaje = document.getElementById('mensaje').value;
    const destinatario = document.getElementById('usuarios').value;

    if (mensaje && destinatario) {
        const mensajesDiv = document.getElementById('mensajes');
        const nuevoMensaje = document.createElement('div');
        nuevoMensaje.innerText = 'Tú: ' + mensaje;
        mensajesDiv.appendChild(nuevoMensaje);

        // Resto del código de AJAX
        // Asegúrate de enviar remitente en la llamada AJAX
        console.log('Enviando mensaje:', remitente, destinatario, mensaje);

        $.ajax({
            url: 'guardar_mensaje1.php',
            type: 'POST',
            data: {
                remitente: remitente, // Envía el remitente
                destinatario: destinatario,
                contenido: mensaje
            },
            success: function(response) {
                console.log('Mensaje guardado en la base de datos.');
            },
            error: function(error) {
                console.error('Error al guardar el mensaje en la base de datos:', error);
            }
        });

        document.getElementById('mensaje').value = '';
    }
}
function mostrarConversacion(usuarioDestino) {
    //const destinatario = document.getElementById('usuariosSelect').value;


    // Realiza una solicitud AJAX para obtener los mensajes
    $.ajax({
        url: 'obtener_conversacion.php',
        type: 'GET',
        data: {
            usuario_destino: usuarioDestino
           // destinatario: destinatario,
        },
        success: function(response) {
            console.log('Respuesta del servidor:', response);  
            // La respuesta debe contener los mensajes de la conversación en el formato que prefieras
            // Por ejemplo, podrías recibir los mensajes como un array de objetos JSON

            // Supongamos que response es un array de objetos JSON
            const mensajes = JSON.parse(response);

            // Mostrar los mensajes en el elemento "conversacion"
            const conversacionDiv = document.getElementById('conversacion');
            conversacionDiv.innerHTML = '';  // Limpiar el contenido anterior

            mensajes.forEach(mensaje => {
                const mensajeDiv = document.createElement('div');
                mensajeDiv.innerHTML = `<strong>${mensaje.Remitente}:</strong> ${mensaje.Contenido}`;
                conversacionDiv.appendChild(mensajeDiv);
            });
        },
        error: function(error) {
            console.error('Error al obtener la conversación:', error);
        }
    });
}

// Llamada a la función para mostrar la conversación con un usuario específico
 // Reemplaza 'usuario_destino' con el nombre del usuario con el que deseas mostrar la conversación

