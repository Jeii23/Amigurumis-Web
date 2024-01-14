
document.addEventListener('DOMContentLoaded', (event) => {
  document.querySelectorAll('.category_item').forEach(item => {
    item.addEventListener('click', event => {
      // Prevent the default action
      event.preventDefault();

      // Get the category from the clicked item
      const category = event.target.getAttribute('category');

      fetch('controller/llistar_productes_per_categories.php?categoria=' + category)
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(products => {
          // Aquí, "products" será un array con los productos de la categoría.
          // Puedes usar estos datos para actualizar tu página web.

          // Encuentra el elemento de la lista de productos en tu página web
          const productsList = document.querySelector('.products-list');

          // Elimina todos los productos existentes de la lista
          while (productsList.firstChild) {
            productsList.removeChild(productsList.firstChild);
          }

          // Añade cada producto a la lista
          products.forEach(product => {
            // Crea un nuevo elemento de producto
            const productItem = document.createElement('div');
            productItem.classList.add('product-item');

            // Añade el título del producto
            const title = document.createElement('a');
            title.href = 'index.php?id=' + product.id;
            title.textContent = product.nom;
            productItem.appendChild(title);

            // Añade la imagen del producto
            const image = document.createElement('img');
            image.src = '../imagenes/' + product.imatge + '.png';
            image.width = 300;
            image.height = 300;
            image.alt = product.nom;
            productItem.appendChild(image);
            // Añade la descripción del producto
            //const description = document.createElement('p');
            //description.textContent = product.descripcio;
            //productItem.appendChild(description);

            // Añade el precio del producto
            const price = document.createElement('p');
            price.textContent = 'Precio: ' + product.preu + '€';
            productItem.appendChild(price);

            // Añade el botón de detalles
            const detailsButton = document.createElement('button');
            detailsButton.classList.add('details-button');
            detailsButton.textContent = 'Ver detalles';
            productItem.appendChild(detailsButton);

            // Añade el elemento de producto a la lista de productos
            productsList.appendChild(productItem);
          });
        })
        .catch(error => {
          console.log('There was a problem with the fetch operation:', error.message);
        });
    });
  });

  document.querySelector('.products-list').addEventListener('click', event => {
    // Comprueba si se hizo clic en un botón de detalles
    if (event.target.classList.contains('details-button')) {
      // Prevent the default action
      event.preventDefault();

      // Get the product ID from the clicked button
      const id = event.target.parentElement.querySelector('a').href.split('=')[1];

      fetch('controller/detalles_del_producto.php?id=' + id)
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(products => {
          // Aquí, "products" será un array con los productos de la categoría.
          // Puedes usar estos datos para actualizar tu página web.

          // Encuentra el elemento de la lista de productos en tu página web
          const productsList = document.querySelector('.products-list');

          // Elimina todos los productos existentes de la lista
          while (productsList.firstChild) {
            productsList.removeChild(productsList.firstChild);
          }

          // Añade cada producto a la lista
          products.forEach(product => {
            // Crea un nuevo elemento de producto
            const productItem = document.createElement('div');
            productItem.classList.add('product-item');

            // Añade el título del producto
            const title = document.createElement('a');
            title.href = 'index.php?id=' + product.id;
            title.textContent = product.nom;
            productItem.appendChild(title);

            // Añade la imagen del producto
            const image = document.createElement('img');
            image.src = '../imagenes/' + product.imatge + '.png';
            image.width = 300;
            image.height = 300;
            image.alt = product.nom;
            productItem.appendChild(image);

            // Añade la descripción del producto
            const description = document.createElement('p');
            description.textContent = product.descripcio;
            productItem.appendChild(description);

            // Añade el precio del producto
            const price = document.createElement('p');
            price.textContent = 'Precio: ' + product.preu + '€';
            productItem.appendChild(price);

            // Añade el botón de detalles
            const detailsButton = document.createElement('button');
            detailsButton.classList.add('añadir-carrito');
            detailsButton.textContent = 'Añadir al carrito';
            detailsButton.dataset.id = product.id;  // Asigna el ID del producto al atributo data-id
            detailsButton.addEventListener('click', function() {
                var product_id = $(this).data('id');
              
                $.ajax({
                    url: '../controller/añadir_carrito.php',
                    method: 'post',
                    data: { id: product_id },
                    success: function(response) {
                        alert(response);
                    }
                });
            });
            productItem.appendChild(detailsButton);

            // Añade el elemento de producto a la lista de productos
            productsList.appendChild(productItem);
          });
        })

        .catch(error => {
          console.log('There was a problem with the fetch operation:', error.message);
        });
    }
  });


  
});
