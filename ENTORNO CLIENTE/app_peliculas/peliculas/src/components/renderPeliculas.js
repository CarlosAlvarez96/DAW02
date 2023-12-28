/**
 * 
 * @param {url} url - Url de la api que fetchea la función 
 */
export async function cargarPeliculas(url) {
    try {
        const response = await fetch(url);
        const data = await response.json();
        let peliculas = [];

        data.results.forEach(pelicula => {
            peliculas.push(`
                <div class="pelicula">
                    <img src="https://image.tmdb.org/t/p/w500/${pelicula.poster_path}" class="poster" />
                    <h3 class="titulo">${pelicula.title}</h3>
                </div>
            `);
        });

        document.getElementById('contenedor').innerHTML = peliculas.join('');
    } catch (error) {
        console.error('Error al cargar películas:', error);
    }
}
