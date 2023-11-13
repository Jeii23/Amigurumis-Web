<?php
function createUser($username, $email, $hashed_password, $password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // Prepara la consulta SQL para crear el usuario
    $sql = "INSERT INTO public.users (username, email, password) VALUES ($1, $2, $3);";
    $params = [$username, $email, $hashed_password];

    // Ejecuta la consulta
    $result = pg_query_params($conn, $sql, $params);

    // Devuelve el resultado de la consulta
    return $result;
}
