<?php
require_once __DIR__ . '/connectaDB.php';

function createOrder($cart, $password_a8)
{
    $conn = connectaDB($password_a8);

    $data_i_hora = date('Y-m-d H:i:s');
    $id_usuari = $_SESSION['user']['id'];

    $import_total = 0;
    $quantitat_total_productes = 0;

    // Transforma los ID de los productos en el carrito en productos completos
    foreach ($cart as $key => $id) {
        $product = getProductById($id, $password_a8);
        if ($product !== null && isset($product[0])) {
            $cart[$key] = $product[0];
            $import_total += $product[0]['preu'];
            $quantitat_total_productes++;
        } else {
            echo "Error: No se encontró el producto con el ID " . $id;
            return false;
        }
    }

    $sql = "INSERT INTO comanda (data_i_hora, usuari_id, import_total, quantitat_total_productes) VALUES ($1, $2, $3, $4) RETURNING id";
    $params = [$data_i_hora, $id_usuari, $import_total, $quantitat_total_productes];
    $result = pg_query_params($conn, $sql, $params);

    if ($result) {
        $row = pg_fetch_row($result);
        $id_comanda = $row[0];

        foreach ($cart as $product) {
            $id_producte = $product['id'];
            $nom = $product['nom'];
            $preu = $product['preu'];

            $sql = "INSERT INTO linia_comanda (comanda_id, producte_id, nom, quantitat, preu) VALUES ($1, $2, $3, $4, $5)";
            $params = [$id_comanda, $id_producte, $nom, 1, $preu];
            $result = pg_query_params($conn, $sql, $params);

            if (!$result) {
                echo "Error: " . $sql . "<br>" . pg_last_error($conn);
            }
        }

        $_SESSION['cart'] = [];
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . pg_last_error($conn);
        return false;
    }

    pg_close($conn);
}
