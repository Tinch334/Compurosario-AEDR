<?php
include "data.php";
    //We check that we got the username and password
    if (isset($_POST['username']) && $_POST['username'] && isset($_POST['password']) && $_POST['password']) {
        $query = $mysqli->query("select * from users where username ='".$_POST['username']."'");
        $encryptedPass = password_hash($_POST['password'], PASSWORD_BCRYPT);

        if ($query->num_rows) {
            $row = $query->fetch_array(MYSQLI_ASSOC);

            if ($row["account_verified"] == true) {
                if (password_verify($_POST['password'], $row["password"])) {
                    echo json_encode(array('success' => 1)); //Successful verification.   
                }
                else {
                    echo json_encode(array('success' => -3));
                }
            }
            else {
                echo json_encode(array('success' => -2));
            }
        }
        else {
            echo json_encode(array('success' => -1));
        }    
    }
    else {
        echo json_encode(array('success' => 0));
    }
?>