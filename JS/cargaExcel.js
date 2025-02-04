////abrir el explorador de archivos para cargar la encuesta

// Acción de clic para abrir el selector de archivo
document.getElementById('encuesta').addEventListener('click', () => {
    document.getElementById('fileInput').click(); // Simula el clic en el input file
});

// Detectar el cambio de archivo seleccionado
document.getElementById('fileInput').addEventListener('change', () => {
    const fileInput = document.getElementById('fileInput');
    const file = fileInput.files[0];
    if (file) {
        // Muestra un alert con el nombre del archivo
        alert(`Archivo seleccionado: ${file.name}`);
        // Enviar el archivo al servidor usando fetch
        uploadFile(file);
    }
});
// Función para enviar el archivo usando fetch
async function uploadFile(file) {
    const formData = new FormData();
    formData.append("encuestaFile", file);
    formData.append("tipo", "atributos")

    try {
        const response = await fetch('../Control/altaEncuestas.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json(); // Se espera que el servidor devuelva un JSON
        if (result.success) {
            alert('¡Archivo cargado exitosamente!');
        } else {
            alert('Hubo un error al cargar el archivo.');
        }
    } catch (error) {
        console.error('Error al enviar el archivo:', error);
        alert('Error al cargar el archivo.');
    }
}