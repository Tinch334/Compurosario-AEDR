<?php
session_start();
include "data.php";
    // check if user is logged in
    if (!isset($_SESSION['loggedIn']) ||  ! ($_SESSION['loggedIn'])) {
        echo "<p>Parece que no iniciaste sesión. <a href='index.php'>Iniciar sesión</a>.</p>";
        exit();
    } else {
    $todo = $_POST["todo"] == 'block' ? 1 : 0;
    $stmt = $mysqli->prepare("UPDATE users SET is_blocked=" . "'" . $todo . "'" . "WHERE username=" . "'" . $_POST['foo'] . "'");  
    $res = $stmt->execute();
    header("Location: users.php");
}
?>

 
