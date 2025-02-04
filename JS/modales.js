const urlParams = new URLSearchParams(window.location.search);
///funciones de error
// Función para cerrar el modal
function closeModal() {
    document.getElementById('modalOverlay').style.display = 'none';
}
function closeModal2() {
    document.getElementById('modalOverlay2').style.display = 'none';
}
// Mostrar el modal si 'error=1' está en la URL
if (urlParams.get('error') === '1') {
    document.getElementById('modalOverlay').style.display = 'block';
} else if (urlParams.get('error') === '2') {
    document.getElementById('modalOverlay2').style.display = 'block';
}
////
// Función para cerrar el modal
function closeModalLogin() {
    document.getElementById('modalOverlayLogin').style.display = 'none';
}



///
if (urlParams.get('success') === 'egresado') {
    document.getElementById('modalOverlayLogin').style.display = 'block';
    setTimeout(() => {
        window.location.href = "../Views/egresado.php";
    }, 3000);
}
else if (urlParams.get('success') === 'empleador') {
    document.getElementById('modalOverlayLogin').style.display = 'block';
    setTimeout(() => {
        window.location.href = "../Views/empleador.php";
    }, 3000);
}
else if (urlParams.get('success') === 'admin') {
    document.getElementById('modalOverlayLogin').style.display = 'block';
    setTimeout(() => {
        window.location.href = "../Views/admin.php";
        console.log("admin")
    }, 3000);
}
