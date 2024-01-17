<?php
// model/products.php

// model/products.php

function searchProducts($searchTerm, $password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // Prepara la consulta SQL para buscar productos
    $sql = "SELECT * FROM public.products WHERE nom ILIKE $1 OR descripcio ILIKE $1 ";

    // Prepara la consulta
    $result = pg_prepare($conn, "my_query", $sql);

    // Ejecuta la consulta y obtén los resultados
    $result = pg_execute($conn, "my_query", array('%' . $searchTerm . '%'));

    // Obtiene los productos que coinciden
    $products = [];
    while ($row = pg_fetch_assoc($result)) {
        $products[] = $row;
    }

    return $products;
}

?>