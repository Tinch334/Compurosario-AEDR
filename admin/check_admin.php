<?php
include $_SERVER['DOCUMENT_ROOT']."/TRES/auth/data.php";
session_start();

$errMessage = "Credenciales inválidas.";


if (!empty($_POST['username']) && !empty($_POST['password'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 

    $stmt = $mysqli->prepare("SELECT username,pass FROM admin WHERE username=? LIMIT 1");
    
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $stmt->bind_result($usr,$pw);

    while($stmt->fetch()) {
        if (!strcmp($usr, $username) && password_verify($password,$pw)) {
            $_SESSION["loggedIn"] = true;
            header("Location: admin.php");
            die();
        }
        else {
            $_SESSION["error"] = $errMessage;
            header("Location: index.php");
            die();
        }
    }
    $_SESSION["error"] = $errMessage;
    header("Location: index.php");
    die();
}

?>