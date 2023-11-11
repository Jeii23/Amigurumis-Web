<?php
// model/categories.php

function getProductes($password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // Prepara la consulta SQL para obtener las categorías
    $sql = "SELECT * FROM products";

    // Ejecuta la consulta y obtén los resultados
    $result = $conn->query($sql);

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

// NO ESTOY SEGURO DE ESTO 

function getCategories($category = NULL) {
    // Conecta a la base de datos
    $conn = connectaDB();

    // Prepara la consulta SQL para obtener las categorías
    $sql = "SELECT * FROM products";
    if ($category !== NULL) {
        $sql .= " WHERE categoria = ?";
    }

    // Prepara la declaración
    $stmt = $conn->prepare($sql);

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
