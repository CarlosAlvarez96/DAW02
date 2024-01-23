import { cargarPeliculas } from "./src/components/renderPeliculas.js";
import { buscar } from "./src/components/searchPeliculas.js";

// Variables globales
let pagina = 1;
let url = `https://api.themoviedb.org/3/movie/popular?api_key=1910e49e85b3f4faf4c931860df2d542&language=es-ES&page=${pagina}`;
const btnAnterior = document.getElementById('btnAnterior');
const btnSiguiente = document.getElementById('btnSiguiente');

// Events listeners
btnSiguiente.addEventListener('click', manejarSiguiente);
btnAnterior.addEventListener('click', manejarAnterior);


// Funciones de manejo de la paginación
function manejarSiguiente() {
    pagina += 1;
    url = `https://api.themoviedb.org/3/movie/popular?api_key=1910e49e85b3f4faf4c931860df2d542&language=es-ES&page=${pagina}`;
    cargarPeliculas(url);
}
function manejarAnterior() {
    if (pagina > 1) {
        pagina -= 1;
        url = `https://api.themoviedb.org/3/movie/popular?api_key=1910e49e85b3f4faf4c931860df2d542&language=es-ES&page=${pagina}`;
        cargarPeliculas(url);
    }
}

/**
 * Funciónes de inicio que cargan las películas, eventos de búsqueda por input y durante la escritura 
 */
function init() {
    const searchInput = document.getElementById('inputBusqueda');
    const searchForm = document.getElementById('formBusqueda');

    searchInput.addEventListener('input', (event) => {
        const textoIngresado = event.target.value;
        url = buscar(textoIngresado, pagina);
		cargarPeliculas(url);
        console.log('Texto ingresado:', textoIngresado);
    });

    searchForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const textoIngresado = searchInput.value;
        url = buscar(textoIngresado, pagina);
		cargarPeliculas(url);
        console.log('Texto ingresado:', textoIngresado);
    });

    
    cargarPeliculas(url);
}

document.addEventListener('DOMContentLoaded', init);
