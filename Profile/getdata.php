<?php
    include $_SERVER['DOCUMENT_ROOT']."/TRES/auth/data.php";
    session_start();

    $sqlQuery = "SELECT username, email from users WHERE id=? LIMIT 1";
    $query = $mysqli->prepare($sqlQuery);
    $query->bind_param("s", $_SESSION[$_POST["requested"]]);
    $query->execute();
    
    $query->bind_result($username, $email);
    $query->fetch();
    $query->close();

    print json_encode(array('username' => $username, 'email' => $email));
?>