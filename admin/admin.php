<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPUROSARIO (admin)</title>
</head>
<body>
    <h1>Compurosario - Panel de administración</h1>

    <?php
    // check if user is logged in
    if (!isset($_SESSION['loggedIn']) ||  ! ($_SESSION['loggedIn'])) {
        echo "<p>Parece que no iniciaste sesión. <a href='index.php'>Iniciar sesión</a>.</p>";
        die();
    } 
    ?>

    <p>No olvides <a href='logout.php'>Cerrar sesion</a> al terminar :)</p>

    <a href="users.php">Administrar usuarios</a>


</body>
</html>