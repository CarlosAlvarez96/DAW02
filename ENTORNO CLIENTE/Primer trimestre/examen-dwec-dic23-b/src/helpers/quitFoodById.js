/**
 * Realiza una solicitud de eliminación para quitar un elemento mediante su ID de la API.
 * 
 * @param {string} URL - La URL base de la API.
 * @param {string} id - El ID del elemento que se va a eliminar.
 * @throws {Error} Si la eliminación no tiene éxito.
 */
export function quitFoodById(URL, id) {
  fetch(`${URL}/${id}`, {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('No se pudo realizar la eliminación');
      }
      console.log('Eliminación exitosa');
      return response.json();
    })
    .then(data => {
      console.log('Datos de respuesta:', data);
    })
    .catch(error => {
      console.error('Error al eliminar:', error.message);
    });
}
