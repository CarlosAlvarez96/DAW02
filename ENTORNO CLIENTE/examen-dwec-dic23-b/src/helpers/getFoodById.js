import { renderCardOrder } from "../components/renderCardOrder";
import { postCard } from "./postCard";

export function getFoodById(id, URL, container) {
  return fetch(`${URL}/${id}`)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Could not find any food");
      }
      return response.json();
    })
    .then((data) => {
      console.log('Data:', data);
      renderCardOrder(container, data);
      postCard(data);
    })
    .catch((error) => {
      console.error('Error fetching food by ID:', error);
      // Propagate the error to the calling code
      throw error;
    });
}

