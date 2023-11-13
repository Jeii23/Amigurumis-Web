// Selecciona todos los enlaces de categoría
const categoryLinks = document.querySelectorAll('.category_item');

// Añade un event listener a cada enlace
categoryLinks.forEach(link => {
  link.addEventListener('click', function(event) {
    // Previene el comportamiento por defecto del enlace
    event.preventDefault();

    // Obtiene la categoría del atributo href del enlace
    const category = this.getAttribute('href').split('=')[2];

    // Realiza la llamada fetch al endpoint de tu servidor
    fetch(`../controller/llistar_productes_per_categories.php?categoria=${category}`)
      .then(response => response.json())
      .then(data => {
        console.log(data);
        // Aquí puedes actualizar el DOM de tu página con los datos recibidos
        // Por ejemplo, podrías crear un nuevo elemento para cada producto y añadirlo a la lista de productos
        const productList = document.querySelector('.products-list');
        productList.innerHTML = ''; // Limpia la lista de productos existente
        data.forEach(product => {
          const productItem = document.createElement('div');
          productItem.classList.add('product-item');
          productItem.innerHTML = `
            <img src="../imagenes/${product.imatge}.png" width="300" height="300" alt="${product.nom}">
            <a href="#">${product.nom}</a>
            <p>${product.descripcio}</p>
            <p>Precio: ${product.preu}€</p>
          `;
          productList.appendChild(productItem);
        });
      })
      .catch(error => console.error('Error:', error));
  });
});
// Selecciona todos los productos
const detailButtons = document.querySelectorAll('.details-button');

// Añade un event listener a cada botón
detailButtons.forEach(button => {
  button.addEventListener('click', function(event) {
    // Previene el comportamiento por defecto del botón
    event.preventDefault();


    // Obtiene el ID del producto del atributo href del enlace
    const productId = this.querySelector('a').getAttribute('href').split('=')[1];

    // Realiza la llamada fetch al endpoint de tu servidor
    fetch(`../controller/detalles_del_producto.php?id=${productId}`)
      .then(response => response.json())
      .then(data => {
        // Aquí puedes actualizar el DOM de tu página con los datos recibidos
        // Por ejemplo, podrías crear un nuevo elemento para cada detalle del producto y añadirlo a un contenedor de detalles del producto
        const productDetailsContainer = document.querySelector('.product-details');
        productDetailsContainer.innerHTML = ''; // Limpia los detalles del producto existente
        const productDetails = document.createElement('div');
        productDetails.innerHTML = `
          <h2>${data.titulo}</h2>
          <img src="../imagenes/${data.imagen}.png" width="300" height="300" alt="${data.titulo}">
          <p>${data.descripcion}</p>
          <p>Precio: ${data.precio}€</p>
          <button>Añadir al carrito</button>
        `;
        productDetailsContainer.appendChild(productDetails);
      })
      .catch(error => console.error('Error:', error));
  });
});

