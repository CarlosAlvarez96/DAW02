export function saveOrderApi(data){
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