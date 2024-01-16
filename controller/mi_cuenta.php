<?php
require_once __DIR__ . '/../model/connectaDB.php';
require_once __DIR__ . '/../model/users.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

$filesAbsolutePath = '/home/TDIW/tdiw-a8/public_html/fitxers/';

// Verifica si la sesión ha sido iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión
}
// Obtiene los datos del usuario de la sesión
$user = $_SESSION['user'];

// Recoge los datos del formulario
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (isset($_FILES['profile_image']) && !empty($_FILES['profile_image']['name'])) {
    $profile_image = $_FILES['profile_image']['name'];

    // Mueve la imagen de perfil subida a un directorio en tu servidor
    $destinationPath = $filesAbsolutePath . basename($profile_image);
    move_uploaded_file($_FILES['profile_image']['tmp_name'], $destinationPath);
    
    
} else {
    $profile_image = $user['profile_image'];
}

// Verifica si se ha proporcionado una nueva contraseña
if (empty($password)) {
    // Si no se proporciona una nueva contraseña, usa la contraseña actual del usuario
    $password = $user['password'];
}

// Mueve la imagen de perfil subida a un directorio en tu servidor
$destinationPath = $filesAbsolutePath . basename($profile_image);
move_uploaded_file($_FILES['profile_image']['tmp_name'], $destinationPath);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Actualiza los datos del usuario en la base de datos
$result = updateUser($username, $email, $hashed_password, $profile_image, $password_a8);

if ($result) {
    $_SESSION['user'] = getUserByEmail($email, $password_a8);
    echo "Perfil actualizado con éxito.";
    header('Location: ../view/mi_cuenta.php');
    exit;
} else {
    echo "<script>alert('Error al actualizar el perfil.'); </script>";
    exit;
}
