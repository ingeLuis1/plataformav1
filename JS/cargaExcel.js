// Acción de clic para abrir el selector de archivo
document.getElementById('encuestaA').addEventListener('click', () => {
    document.getElementById('fileInputA').click();
});
document.getElementById('encuestaO').addEventListener('click', () => {
    document.getElementById('fileInputO').click();
});
document.getElementById('egresados').addEventListener('click', () => {
    document.getElementById('fileInputEgresados').click();
});
document.getElementById('empleadorN').addEventListener('click', () => {
    document.getElementById('fileInputempleadorN').click();
});

// Detectar cambio en cada input de archivo
document.getElementById('fileInputA').addEventListener('change', function () {
    handleFileUpload(this, "atributos");
});
document.getElementById('fileInputO').addEventListener('change', function () {
    handleFileUpload(this, "objetivos");
});
document.getElementById('fileInputEgresados').addEventListener('change', function () {
    handleFileUpload(this, "egresados");
});
document.getElementById('fileInputempleadorN').addEventListener('change', function () {
    handleFileUpload(this, "empleadorN");
});

// Función para manejar la carga de archivos
function handleFileUpload(input, tipo) {
    const file = input.files[0];
    if (file) {
        alert(`Archivo seleccionado: ${file.name}`);
        uploadFile(file, tipo);

        // Restablecer el input para permitir la carga del mismo archivo otra vez
        input.value = '';
    }
}

// Función para enviar el archivo usando fetch
async function uploadFile(file, tipo) {
    const formData = new FormData();
    formData.append("encuestaFile", file);
    formData.append("tipo", tipo);

    try {
        const response = await fetch('../Control/altaEncuestas.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (result.success) {
            alert('¡Archivo cargado exitosamente!');
            document.getElementById('myModal').style.display = 'flex';
            renderTable(result.data);
        } else {
            alert('Hubo un error al cargar el archivo.');
        }
    } catch (error) {
        console.error('Error al enviar el archivo:', error);
        alert('Error al cargar el archivo.');
    }
}

// Renderiza la tabla en el modal
function renderTable(data) {
    const tableBody = document.getElementById('preguntas');
    tableBody.innerHTML = '';

    data.forEach(pregunta => {
        const row = document.createElement('tr');
        let opcionesHTML = '';

        ['opcionA', 'opcionB', 'opcionC', 'opcionD', 'opcionE', 'opcionF'].forEach(opcion => {
            opcionesHTML += `<td>${pregunta[opcion] || ''}</td>`;
        });

        row.innerHTML = `<td>${pregunta.texto}</td>${opcionesHTML}`;
        tableBody.prepend(row);
    });
}

// Cierra el modal
document.getElementById('close').addEventListener('click', () => {
    document.getElementById('myModal').style.display = 'none';
});
