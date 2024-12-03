function mostrarContenido(id) {
    const secciones = document.querySelectorAll('.contenido-seccion');
    secciones.forEach(seccion => {
        seccion.classList.remove('active');
    });
    document.getElementById(id).classList.add('active');
}
function mostrarEdad(sintomaId, edad) {
    const edades = ['bebe', 'niño', 'adolescente', 'joven', 'adulto', 'adulto_mayor'];
    
    edades.forEach(e => {
        const info = document.getElementById(`info-${sintomaId}-${e}`);
        if (info) {
            info.style.display = (e === edad) ? 'block' : 'none';
        }
    });
}



function regresar() {
    window.history.back();
}
