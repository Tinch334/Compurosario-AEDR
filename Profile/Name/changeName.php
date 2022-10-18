<?php
    include $_SERVER['DOCUMENT_ROOT']."/TRES/auth/data.php";
    session_start();

    $sqlQuery = "UPDATE users SET username = {$_POST['new-username']} WHERE id=? LIMIT 1";
    $query = $mysqli->prepare($sqlQuery);
    $query->bind_param("s", $_SESSION[$_POST["requested"]]);
    $query->execute();

    echo "DONE";
?>