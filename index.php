<?php
// Inicia la sesión al principio de tu archivo
session_start();

// Comprueba si el usuario ha iniciado sesión
if (isset($_SESSION['user'])) {
    // Imprime los datos del usuario de forma bonita
    echo "<div style='margin: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;'>";
    echo "<h2>Bienvenido, " . $_SESSION['user']['username'] . "</h2>";
    echo "<p>Email: " . $_SESSION['user']['email'] . "</p>";
    echo "</div>";
}

?>



<?php
//index.php
$accio = $_GET['accio'] ?? NULL;
$categoria = $_GET['categoria'] ?? NULL;
switch ($accio) {
    case 'llistar-categories':
        include __DIR__.'/controller/llistar_categories.php';
        break;
    case 'categoria':
        include __DIR__.'/controller/llistar_productes_per_categories.php';
        break;
    default:
        include __DIR__.'/controller/home.php';
        break;
}
