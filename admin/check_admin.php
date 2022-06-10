<?php
include "data.php";
if (!empty($_POST['username']) && !empty($_POST['password'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 

    $stmt = $mysqli->prepare("SELECT username,pass FROM admin WHERE username=? LIMIT 1");
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    
   // $result = $stmt->get_result();

    $stmt->bind_result($usr,$pw);

    while($stmt->fetch()){
        if (password_verify($password,$pw)) {
            header("Location: admin.html");
            die();
        }
        else 
            echo "Try again.";
            die();
    }
    echo "Try again.";
    die();
}

?>