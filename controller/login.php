<?php
require_once __DIR__.'/../model/connectaDB.php';
require_once __DIR__.'/../model/users.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

// Recoge los datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Obtiene el usuario de la base de datos
$user = getUserByEmail($email, $password_a8);

if ($user) {
    // Comprueba si la contraseña es correcta
    if (password_verify($password, $user['password'])) {
        // Inicia la sesión y guarda los datos del usuario en la sesión
        session_start();
        $_SESSION['user'] = $user;

        echo "Usuario logeado con éxito.";
        header('Location: ../index.php');
        exit;
    } else {
        echo "<script>alert('Contraseña incorrecta.'); window.location.href='../Login_Register/login.html';</script>";
        exit;
    }
} else {
    echo "<script>alert('Usuario no encontrado.'); window.location.href='../Login_Register/login.html';</script>";
    exit;
}
?>

