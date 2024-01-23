export function renderCardOrder(container, data) {
  const card = document.createElement("div");
  card.id= data.id;

  // card.classList.add("col-md-4");
  card.innerHTML = `
    <div id="ordered-card" class="card-body">
        <img style="width: 8rem;" src="${data.strCategoryThumb}" alt="img de comida pedida" />
        <h5 class="text-white">${data.strCategory}</h5>
        <p class="card-text text-white">Precio: ${data.price}€</p>
        <a href="#" id="quit" class="btn btn-link card-link">Quitar</a>
    </div>`;

  container.appendChild(card);
}
