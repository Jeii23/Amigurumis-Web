<?php
// model/categories.php

function getProductes($password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // Prepara la consulta SQL para obtener las categorías
    $sql = 'SELECT * FROM "public"."products";';

    // Ejecuta la consulta y obtén los resultados
    $result = pg_query($conn, $sql);

    // Verifica si la consulta fue exitosa
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

    // Prepara la consulta SQL para obtener las categorías
    $sql = "SELECT * FROM products WHERE categoria = '$category';";

    // Ejecuta la consulta y obtén los resultados
    $result = pg_query($conn, $sql);

    // Verifica si la consulta fue exitosa
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

    // Prepara la consulta SQL para obtener las categorías
    $sql = "SELECT DISTINCT categoria FROM products;";
    

    // Prepara la declaración
    $result = pg_query($conn, $sql);


    // Si se proporcionó una categoría, vincula el parámetro
    

    // Ejecuta la consulta

    // Obtiene los resultados
    

    // Verifica si la consulta fue exitosa
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
