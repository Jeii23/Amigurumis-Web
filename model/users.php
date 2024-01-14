<?php

function getUserByEmail($email, $password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // Prepara la consulta SQL para obtener el usuario
    $sql = "SELECT * FROM public.usuari WHERE email = $1;";
    $params = [$email];

    // Ejecuta la consulta
    $result = pg_query_params($conn, $sql, $params);

    // Verifica si la consulta fue exitosa
    if ($result === FALSE) {
        echo "Error en la consulta: " . pg_last_error($conn);
        return FALSE;
    }

    // Cierra la conexión a la base de datos
    pg_close($conn);

    // Devuelve el resultado de la consulta
    return pg_fetch_assoc($result);
}



function createUser($username, $email, $hashed_password, $password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // Prepara la consulta SQL para crear el usuario
    $sql = "INSERT INTO public.usuari (username, email, password) VALUES ($1, $2, $3);";
    $params = [$username, $email, $hashed_password];

    // Ejecuta la consulta
    $result = pg_query_params($conn, $sql, $params);

    // Verifica si la consulta fue exitosa
    if ($result === FALSE) {
        echo "Error en la consulta: " . pg_last_error($conn);
        return FALSE;
    }

    // Cierra la conexión a la base de datos
    pg_close($conn);

    // Devuelve el resultado de la consulta
    return $result;
}

function loginUser($email, $hashed_password, $password_a8) {
    // Conecta a la base de datos
    $conn = connectaDB($password_a8);

    // Prepara la consulta SQL para crear el usuario
    $sql = "INSERT INTO public.usuari (username, email, password) VALUES ($1, $2, $3);";
    $params = [ $email, $hashed_password];

    // Ejecuta la consulta
    $result = pg_query_params($conn, $sql, $params);

    // Verifica si la consulta fue exitosa
    if ($result === FALSE) {
        echo "Error en la consulta: " . pg_last_error($conn);
        return FALSE;
    }

    // Cierra la conexión a la base de datos
    pg_close($conn);

    // Devuelve el resultado de la consulta
    return $result;
}
