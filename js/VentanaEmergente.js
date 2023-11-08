// Función para mostrar la ventana emergente
function mostrarVentanaEmergente() {
    document.getElementById("miVentanaEmergente").style.display = "block";
}

// Función para cerrar la ventana emergente
function cerrarVentanaEmergente() {
    document.getElementById("miVentanaEmergente").style.display = "none";
}

// Función para procesar los datos del formulario
function enviarDatos() {
    var nombre = document.getElementById("nombre").value;
    var email = document.getElementById("email").value;
    alert("Nombre: " + nombre + "\nEmail: " + email);
    window.location.href = '../proy/Grupos_chat.php';

    cerrarVentanaEmergente(); // Cierra la ventana después de procesar los datos (puedes personalizar esto)
}



// Función para mostrar la información del usuario seleccionado
function mostrarInfoUsuario(usuario) {
    // Obtén el elemento div donde se mostrará la información
    var infoUsuarioDiv = document.getElementById("info-usuario-seleccionado");
    
    // Actualiza el contenido del div con la información del usuario
    infoUsuarioDiv.innerHTML = "Usuario seleccionado: " + usuario;
}

// Asocia la función mostrarInfoUsuario a los elementos de la lista de chat
var listaChatItems = document.querySelectorAll(".chat-list-item");
listaChatItems.forEach(function(item) {
    item.addEventListener("click", function() {
        var nombreUsuario = item.querySelector("span").textContent;
        mostrarInfoUsuario(nombreUsuario);
    });
});


function mostrarInfoUsuario(chatId) {
    // Obtén el elemento <li> seleccionado por su ID
    const chatItem = document.getElementById(chatId);

    // Obtén el nombre y la imagen del elemento seleccionado
    const nombreUsuario = chatItem.querySelector('span').textContent;
    //const imagenUsuario = chatItem.querySelector('chat-icon_V2').getAttribute('src');



    // Actualiza <div class="info-usuario-seleccionado"> con la información
    const infoUsuarioSeleccionado = document.querySelector('.info-usuario-seleccionado');
    // <img src="${imagenUsuario}" alt="${nombreUsuario}" class="info-usuario-icon"></img>
    infoUsuarioSeleccionado.innerHTML = ` 
        
        <span>${nombreUsuario}</span>
        <button type="button" id="eliminarUsuarioButton" style="border-radius: 50%; width: 30px; padding: 5px; " onclick="eliminarUsuario()"> 
    <i class='bx bx-minus'></i>
</button>

    `;
}
function eliminarUsuario() {
    // Encuentra el elemento <div class="info-usuario-seleccionado">
    const infoUsuarioSeleccionado = document.querySelector('.info-usuario-seleccionado');

    // Verifica si el elemento existe y si sí, lo elimina
    if (infoUsuarioSeleccionado) {
        infoUsuarioSeleccionado.innerHTML = '';
    }
}
//:::::::::::::::::::::::::::::::::::crear grupo ventana emergente
/* mostrar pantalla crear grupo */ 
function mostrarVentanaEmergenteCrearGrupos() {
    document.getElementById("miVentanaEmergenteCrearGrupos").style.display = "block";
}
/* eliminar pantalla crear grupo */ 
function cerrarVentanaEmergenteCrearGrupos() {
    document.getElementById("miVentanaEmergenteCrearGrupos").style.display = "none";
}

// mostrar imagen de grupo
function mostrarImagen() {
    var input = document.getElementById('fotoGrupo');
    var imagenMostrada = document.getElementById('imagenMostrada');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            imagenMostrada.src = e.target.result;
            imagenMostrada.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    }
}


//:::::::::::::::::::::::::::::::::::ventan de miembros
function mostrarVentanaEmergenteMiembros() {
    document.getElementById("miVentanaEmergenteMiembros").style.display = "block";
}
/* eliminar pantalla crear grupo */ 
function cerrarVentanaEmergenteMiembros() {
    document.getElementById("miVentanaEmergenteMiembros").style.display = "none";
}

//pagina sub grupos


//:::::::::::::::::::::::::::::::::::crear subgrupo ventana emergente
/* mostrar pantalla crear grupo */ 
function mostrarVentanaEmergenteSubCrearGrupos() {
    document.getElementById("miVentanaEmergenteSubCrearGrupos").style.display = "block";
}
/* eliminar pantalla crear grupo */ 
function cerrarVentanaEmergenteSubCrearGrupos() {
    document.getElementById("miVentanaEmergenteSubCrearGrupos").style.display = "none";
}
//******************* agragar miembros*/

/* mostrar pantalla agragar miembros  */ 
function mostrarVentanaEmergenteAgregarMimbros_SubGrupos() {
    document.getElementById("miVentanaEmergenteAgregarMimbros_SubGrupos").style.display = "block";
}
/* eliminar pantalla agragar miembros */ 
function cerrarVentanaEmergenteAgregarMimbros_SubGrupos() {
    document.getElementById("miVentanaEmergenteAgregarMimbros_SubGrupos").style.display = "none";
}
//******************* Miembros_SubGrupos*/
function mostrarVentanaEmergenteMiembros_SubGrupos() {
    document.getElementById("miVentanaEmergenteMiembros_SubGrupos").style.display = "block";
}
/* eliminar pantalla crear grupo */ 
function cerrarVentanaEmergenteMiembros_SubGrupos() {
    document.getElementById("miVentanaEmergenteMiembros_SubGrupos").style.display = "none";
}
//******************* Crear _Tareas*/
function mostrarVentanaEmergenteTareas() {
    document.getElementById("miVentanaEmergenteTareas").style.display = "block";
}
/* eliminar pantalla crear grupo */ 
function cerrarVentanaEmergenteTareas() {
    document.getElementById("miVentanaEmergenteTareas").style.display = "none";
}


//******************* AsignarInsignia*/
function mostrarVentanaEmergenteAsignarInsignia() {
    document.getElementById("miVentanaEmergenteAsignarInsignia").style.display = "block";
}
/* eliminar pantalla crear grupo */ 
function cerrarVentanaEmergenteAsignarInsignia() {
    document.getElementById("miVentanaEmergenteAsignarInsignia").style.display = "none";
}