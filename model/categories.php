<?php
// model/categories.php

function getCategories() {
    // Conecta a la base de datos
    $conn = connectaDb();

    // Prepara la consulta SQL para obtener las categorías
    $sql = "SELECT * FROM categories";

    // Ejecuta la consulta y obtén los resultados
    $result = $conn->query($sql);

    // Verifica si la consulta fue exitosa
    if ($result->num_rows > 0) {
        // Si hay resultados, los guarda en un array
        $categories = [];
        while($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
        return $categories;
    } else {
        // Si no hay resultados, devuelve un array vacío
        return [];
    }
}