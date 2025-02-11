// Acción de clic para abrir el selector de archivo
document.getElementById('encuestaA').addEventListener('click', () => {
    document.getElementById('fileInputA').click(); // Simula el clic en el input file
});
document.getElementById('encuestaO').addEventListener('click', () => {
    document.getElementById('fileInputO').click(); // Simula el clic en el input file
});


// Detectar el cambio de archivo seleccionado y obtener el tipo de encuesta a subir
document.getElementById('fileInputA').addEventListener('change', () => {
    const fileInput = document.getElementById('fileInputA');
    const file = fileInput.files[0];
    if (file) {
        // Muestra un alert con el nombre del archivo
        alert(`Archivo seleccionado: ${file.name}`);
        // Enviar el archivo al servidor usando fetch
        uploadFile(file, "atributos");
    }
});
// Detectar el cambio de archivo seleccionado y obtener el tipo de encuesta a subir
document.getElementById('fileInputO').addEventListener('change', () => {
    const fileInput = document.getElementById('fileInputO');
    const file = fileInput.files[0];
    if (file) {
        // Muestra un alert con el nombre del archivo
        alert(`Archivo seleccionado: ${file.name}`);
        // Enviar el archivo al servidor usando fetch
        uploadFile(file, "objetivos");
    }
});
// Función para enviar el archivo usando fetch
async function uploadFile(file, tipo) {
    const formData = new FormData();
    formData.append("encuestaFile", file);
    formData.append("tipo", tipo);//indica el tipo de encuesta que se sube
    try {
        const response = await fetch('../Control/altaEncuestas.php', {
            method: 'POST',
            body: formData
        });
        const result = await response.json(); // Se espera que el servidor devuelva un JSON
        if (result.success) {
            alert('¡Archivo cargado exitosamente!');
            document.getElementById('myModal').style.display = 'flex';
            renderTable(result.data);
            ///Renderisar el modal para mostrar datos cargados
        } else {
            alert('Hubo un error al cargar el archivo.');
        }
    } catch (error) {
        console.error('Error al enviar el archivo:', error);
        alert('Error al cargar el archivo.');
    }
}


///Abre modal y renderisa

function renderTable(data) {
    const tableBody = document.getElementById('preguntas');
    tableBody.innerHTML = '';
    data.forEach(pregunta => {
        const row = document.createElement('tr');
        let opcionesHTML = ''; // Contendrá solo las opciones no vacías
        ['opcionA', 'opcionB', 'opcionC', 'opcionD', 'opcionE', 'opcionF'].forEach(opcion => {
            if (pregunta[opcion]) { // Verifica si la opción no es null ni vacía
                opcionesHTML += `<td>${pregunta[opcion]}</td>`;
            } else {
                opcionesHTML += `<td></td>`; // Celda vacía para mantener el formato
            }
        });
        row.innerHTML = `
            <td>${pregunta.texto}</td>
            ${opcionesHTML}
        `;
        tableBody.prepend(row);
    });


}

///cierra modal

document.getElementById('close').addEventListener('click', () => {
    // Cerrar modal al hacer clic en el botón de cierre
    document.getElementById('myModal').style.display = 'none';

})