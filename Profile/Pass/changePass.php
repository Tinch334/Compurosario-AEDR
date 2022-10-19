<?php
    include $_SERVER['DOCUMENT_ROOT']."/TRES/auth/data.php";
    session_start();

    $sqlQuery = "SELECT password from users WHERE id=? LIMIT 1";
    $query = $mysqli->prepare($sqlQuery);
    $query->bind_param("s", $_SESSION["logged-in"]);
    $query->execute();
    
    $query->bind_result($currentPassword);
    $query->fetch();
    $query->close();

     if (isset($_POST['new-pass'])) {
        //We check if the current password is the same as the old password, if so we return -1.
        if (password_verify($_POST['new-pass'], $currentPassword))
            echo json_encode(array('success' => -1));
        else {
            //We generate the hash for the new password.
            $newEncryptedPass = password_hash($_POST['new-pass'], PASSWORD_BCRYPT);
    
            //We update the database.
            $sqlQuery = "UPDATE users SET password=" . "'" . $newEncryptedPass . "'" . " WHERE id=? LIMIT 1";
            $query = $mysqli->prepare($sqlQuery);
            $query->bind_param("s", $_SESSION["logged-in"]);
            $query->execute();
    
            //If everything is successful we return 1.
            echo json_encode(array('success' => 1));
        }
    }
    else {
        //The file was called on it's own, return 0.
        echo json_encode(array('success' => 0));
    }  
?>