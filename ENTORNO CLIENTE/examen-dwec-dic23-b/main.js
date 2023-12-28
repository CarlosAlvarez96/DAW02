/**
 * @author Carlos Álvarez Martín
 * @description Examen dwec Javascript
 */

//Imports
import { findFoodsApi } from "./src/components/findFoodsApi";
import { getFoodApi } from "./src/helpers/getFoodApi";
import { getFoodById } from "./src/helpers/getFoodById";
import { getOrders } from "./src/helpers/getOrders";
import { quitFoodById } from "./src/helpers/quitFoodById";
import { saveOrderApi } from "./src/helpers/saveOrderApi";

// Variables globales
const URL = "http://localhost:4000/categories";
const URL2 = "http://localhost:4000/order";
const cardContainer = document.querySelector("#cards-container");
const orderContainer = document.querySelector("#pedidos");
const searchFormContainer = document.getElementById("search-form-container")
let padreAdd = "";


const pagar = document.createElement("div");
pagar.innerHTML ='<a href="#" id="pagar" class="btn btn-link card-link">Pagar</a>';
orderContainer.appendChild(pagar)
// const btnAdd = document.querySelector("#add");
// const card = document.querySelector("#miCard");

/**
 * Función de inicialización (init) para configurar y manejar eventos en la aplicación.
 * Se encarga de cargar datos iniciales, configurar eventos de teclado y clic, y gestionar
 * las interacciones del usuario en la aplicación.
 */
function init() {

  
  getFoodApi(URL, cardContainer);

  searchFormContainer.addEventListener('keyup', function(event) {
    e.preventDefault();
    if (event.key === 'Escape') {
        // Tu código para manejar la pulsación de la tecla Escape aquí
        console.log('Tecla Escape presionada');
        window.location.reload(true);
    } 
    
});
searchFormContainer.addEventListener("click", (e) => {
  e.preventDefault();
  if(e.target.id === "search"){
      // Tu código para manejar la pulsación de la tecla Escape aquí
      const text = document.getElementById("text-content").value;
      if(text === ""){
        window.location.reload(true);
      }
    } 
});
  searchFormContainer.addEventListener("click", (e) => {
    e.preventDefault();
    if(e.target.id === "search"){
      const text = document.getElementById("text-content").value;
      console.log(findFoodsApi(text, URL));
    }
  })
  cardContainer.addEventListener("click", (e) => {
    e.preventDefault();
    if (e.target.id === "add") {
      padreAdd = e.target.parentElement.parentElement;
      padreAdd.classList.add("opacity-25");
      const idFood = e.target.parentElement.id;
      getFoodById(idFood, URL, orderContainer);
    }
    });
    orderContainer.addEventListener("click", (e) => {
      e.preventDefault();
      if (e.target.id === "quit") {
        padreAdd.classList.add("opacity-100");
        const idFood = e.target.parentElement.parentElement.id;
        console.log(idFood);
        quitFoodById(URL2, idFood);  // Ajusta la URL según sea necesario
        document.getElementById("ordered-card").remove();
    }
    if (e.target.id === "pagar") {
      getOrders(URL2)
          .then((allOrders) => {
              localStorage.setItem("orderFoods", JSON.stringify(allOrders));
              saveOrderApi(allOrders);
              // Aqui reinicio el contenido de la web
              location.reload();
          })
          .catch((error) => {
              console.error("Error al obtener pedidos:", error);
          });
  }
    })
}




  document.addEventListener("DOMContentLoaded", init);