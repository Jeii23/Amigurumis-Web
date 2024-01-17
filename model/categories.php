<?php
// model/categories.php

function getProductes($password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // SQL
    $sql = "SELECT * FROM public.products;";

    // Consulta y resultats
    $result = pg_query($conn, $sql);

   
    if ($result) {
        // Si hay resultados, los guarda en un array
        $products = [];
        while ($row = pg_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    } else {
        // Si no hay resultados, devuelve un array vacío
        return [];
    }
}
function getProductById($id, $password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // SQL
    $sql = "SELECT * FROM public.products WHERE id = $1;";
    $params = [$id];
    // Consulta y resultats
    $result = pg_query_params($conn, $sql,$params);

 
    if ($result) {
        // Si hay resultados, los guarda en un array
        $products = [];
        while ($row = pg_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    } else {
        // Si no hay resultados, devuelve un array vacío
        return [];
    }
}
// NO ESTOY SEGURO DE ESTO 

function getProductByCategory($category, $password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // SQL
    $sql = "SELECT * FROM public.products WHERE categoria_id = $1;";
    $params = [$category];
    // Consulta y resultats
    $result = pg_query_params($conn, $sql,$params);

    if ($result) {
        // Si hay resultados, los guarda en un array
        $products = [];
        while ($row = pg_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    } else {
        // Si no hay resultados, devuelve un array vacío
        return [];
    }
}

function getCategories($password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // SQL
    $sql = "SELECT * FROM public.categoria;";
    

    // Prepara la declaración
    $result = pg_query($conn, $sql);

    if ($result) {
        // Si hay resultados, los guarda en un array
        $products = [];
        while ($row = pg_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    } else {
        // Si no hay resultados, devuelve un array vacío
        return [];
    }
}

function searchProducts($searchTerm, $password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // SQL
    $sql = "SELECT * FROM public.products WHERE nom LIKE $1 OR descripcio LIKE $1;";
    $params = ['%' . $searchTerm . '%'];

    // Consulta y resultats
    $result = pg_query_params($conn, $sql, $params);

    if ($result) {
        // Si hay resultados, los guarda en un array
        $products = [];
        while ($row = pg_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    } else {
        // Si no hay resultados, devuelve un array vacío
        return [];
    }
}
