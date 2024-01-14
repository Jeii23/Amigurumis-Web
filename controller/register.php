<?php
require_once __DIR__.'/../model/connectaDB.php';
require_once __DIR__.'/../model/users.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

// Recoge los datos del formulario
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];

// Comprueba si algún campo está vacío
if (empty($username) || empty($email) || empty($password) || empty($address) || empty($city) || empty($zip)) {
    echo "<script>alert('Por favor, rellena todos los campos.'); window.location.href='../Login_Register/register.html';</script>";
    exit;
}

// Comprueba si el correo electrónico tiene un formato válido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Por favor, introduce un correo electrónico válido.'); window.location.href='../Login_Register/register.html';</script>";
    exit;
}

// Comprueba si el código postal es un número de 5 dígitos
if (!preg_match("/^\d{5}$/", $zip)) {
    echo "<script>alert('Por favor, introduce un código postal válido.'); window.location.href='../Login_Register/register.html';</script>";
    exit;
}


// Cifra la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Almacena los datos del usuario en la base de datos
$result = createUser($username, $email, $hashed_password, $password_a8);

if ($result) {
    echo "Usuario registrado con éxito.";
    header('Location: ../index.php');
    exit;
} else {
    echo "<script>alert('Error al registrar el usuario.'); window.location.href='../Login_Register/register.html';</script>";
    exit;
}
?>
