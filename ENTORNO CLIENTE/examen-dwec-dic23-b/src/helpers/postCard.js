/**
 * 
 * @param {data} data - Información a incluir en order
 * @throws {Error} Si la eliminación no tiene éxito.
 */
export function postCard(data) {
  fetch('http://localhost:4000/order/', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error('Failed to add to order');
      }
      return response.json();
    })
    .catch((error) => {
      console.error('Error updating order:', error);
    });
}
