<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
session_unset();

// Destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión o a la página principal
header("Location: ../../index.php"); // Cambia "login.php" por la página a la que quieres redirigir
exit();
?>
