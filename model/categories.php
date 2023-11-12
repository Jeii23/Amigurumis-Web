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

function getProductByCategory($category = NULL,$password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // Prepara la consulta SQL para obtener las categorías
    $sql = "SELECT * FROM products";
    if ($category !== NULL) {
        $sql .= " WHERE categoria = ?";
    }

    // Prepara la declaración
    $stmt = pg_query($conn, $sql);


    // Si se proporcionó una categoría, vincula el parámetro
    if ($category !== NULL) {
        $stmt->bind_param("s", $category);
    }

    // Ejecuta la consulta
    $stmt->execute();

    // Obtiene los resultados
    $result = $stmt->get_result();

    // Verifica si la consulta fue exitosa
    if ($result->num_rows > 0) {
        // Si hay resultados, los guarda en un array
        $products = [];
        while($row = $result->fetch_assoc()) {
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
    $sql = "SELECT * FROM products";
    

    // Prepara la declaración
    $result = pg_query($conn, $sql);


    // Si se proporcionó una categoría, vincula el parámetro
    

    // Ejecuta la consulta

    // Obtiene los resultados
    

    // Verifica si la consulta fue exitosa
    if ($result->num_rows > 0) {
        // Si hay resultados, los guarda en un array
        $products = [];
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    } else {
        // Si no hay resultados, devuelve un array vacío
        return [];
    }
}
