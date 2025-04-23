// Elementos del DOM
const carrito = document.getElementById('carrito');
const elementos1 = document.getElementById('lista-1'); // Asegúrate de que este ID exista en tu HTML
const lista = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');

// Cargar eventos
cargarEventListeners();

function cargarEventListeners() {
    if (elementos1) {
        elementos1.addEventListener('click', comprarElemento);
    }
    if (carrito) {
        carrito.addEventListener('click', eliminarElemento);
    }
    if (vaciarCarritoBtn) {
        vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
    }
}

// Función para agregar un producto al carrito
function comprarElemento(e) {
    e.preventDefault();
    if (e.target.classList.contains('agregar-carrito')) {
        const elemento = e.target.closest('.producto'); // Usa una clase que envuelva el producto
        if (elemento) {
            leerDatosElemento(elemento);
        }
    }
}

// Leer datos del producto
function leerDatosElemento(elemento) {
    const infoElemento = {
        imagen: elemento.querySelector('img')?.src || '',
        titulo: elemento.querySelector('h3')?.textContent || 'Sin título',
        precio: elemento.querySelector('.precio')?.textContent.replace('$', '') || '0',
        id: elemento.querySelector('a')?.getAttribute('data-id') || ''
    };

    insertarCarrito(infoElemento);
}

// Insertar producto en el carrito
function insertarCarrito(elemento) {
    const row = document.createElement('tr');
    row.innerHTML = `
        <td><img src="${elemento.imagen}" width="100" /></td>
        <td>${elemento.titulo}</td>
        <td>$${elemento.precio}</td>
        <td><a href="#" class="borrar" data-id="${elemento.id}">X</a></td>
    `;
    lista.appendChild(row);
}

// Eliminar un producto del carrito
function eliminarElemento(e) {
    e.preventDefault();
    if (e.target.classList.contains('borrar')) {
        e.target.closest('tr').remove(); // Elimina la fila completa
    }
}

// Vaciar todo el carrito
function vaciarCarrito() {
    while (lista.firstChild) {
        lista.removeChild(lista.firstChild);
    }
}