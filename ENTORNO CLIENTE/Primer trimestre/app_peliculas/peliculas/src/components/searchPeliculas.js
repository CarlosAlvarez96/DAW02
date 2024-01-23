
/**
 * 
 * @param {texto} texto - Parámetro que incluye el texto de búsqueda
 * @param {pagina} pagina - Número de página que muestra la app web
 * @returns 
 */
export function buscar(texto, pagina) {
    const apiKey = '1910e49e85b3f4faf4c931860df2d542';
    const baseUrl = 'https://api.themoviedb.org/3/search/movie';
    const language = 'en-ES';

    const endpoint = `${baseUrl}?query=${encodeURIComponent(texto)}&language=${language}&page=${pagina}&api_key=${apiKey}`;

    return endpoint;
}