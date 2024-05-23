const canvas = document.querySelector('canvas');
const formulario = document.querySelector('.Formulario-pad-de-firmas');
const botonLimpiar = document.querySelector('.boton-limpiar');
const ctx = canvas.getContext('2d');
let modoEscritura = false;
let posicionX, posicionY;

canvas.width = 500;  
canvas.height = 300; 

formulario.addEventListener('submit', (evento) => {
    evento.preventDefault();

    const imageURL = canvas.toDataURL();
    const imagen = document.createElement('img');
    imagen.src = imageURL;
    imagen.height = canvas.height;
    imagen.style.display = 'block';
    formulario.appendChild(imagen);
    limpiarPad();
});

const limpiarPad = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
};

botonLimpiar.addEventListener('click', (evento) => {
    evento.preventDefault();
    limpiarPad();
});

const obtenerPosicion = (evento) => {
    const rect = canvas.getBoundingClientRect();
    const scaleX = canvas.width / rect.width;
    const scaleY = canvas.height / rect.height;
    
    posicionX = (evento.clientX - rect.left) * scaleX;
    posicionY = (evento.clientY - rect.top) * scaleY;

    return [posicionX, posicionY];
};

const manejarMovimientoCursor = (evento) => {
    if (!modoEscritura) return;
    [posicionX, posicionY] = obtenerPosicion(evento);
    ctx.lineTo(posicionX, posicionY);
    ctx.stroke();
};

const manejarLevantamientoCursor = () => {
    modoEscritura = false;
};

const manejarPresionadoCursor = (evento) => {
    modoEscritura = true;
    ctx.beginPath();

    [posicionX, posicionY] = obtenerPosicion(evento);
    ctx.moveTo(posicionX, posicionY);
};

ctx.lineWidth = 3;
ctx.lineJoin = ctx.lineCap = 'round';

canvas.addEventListener('pointerdown', manejarPresionadoCursor, { passive: true });
canvas.addEventListener('pointerup', manejarLevantamientoCursor, { passive: true });
canvas.addEventListener('pointermove', manejarMovimientoCursor, { passive: true });
