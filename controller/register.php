<?php
require_once __DIR__.'/../model/connectaDB.php';
require_once __DIR__.'/../model/users.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

// Recoge los datos del formulario
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Cifra la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Almacena los datos del usuario en la base de datos
$result = createUser($username, $email, $hashed_password, $password_a8);

if ($result) {
    echo "Usuario registrado con éxito.";
} else {
    echo "Error al registrar el usuario.";
}
include __DIR__.'/../view/home.php';

?>
