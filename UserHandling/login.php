<?php
include "data.php";
session_start();

    //We check that we got the username and password
    if (isset($_POST['username']) && $_POST['username'] && isset($_POST['password']) && $_POST['password']) {
        $query = $mysqli->query("select * from users where username ='".$_POST['username']."'");
        $encryptedPass = password_hash($_POST['password'], PASSWORD_BCRYPT);

        if ($query->num_rows) {
            $row = $query->fetch_array(MYSQLI_ASSOC);

            if ($row["account_verified"] == true) {
                if (password_verify($_POST['password'], $row["password"])) {
                    //We update the last time the user logged in.
                    $date = date("Y-m-d H:i:s");
                    $mysqli->query("UPDATE users set last_log = '" . $date . "' WHERE username= '" . $_POST['username'] . "'");

                    //NOT WORKING
                    //Cookies do not work in any of the computers of the members of the group.
                    //We create a cookie that will expire in 30 days and grants the user access to all the files.
                    //setcookie("userLogged", "pito de mono" , time()+60*60*24*30, "/", 1);

                    //Using sessions until issue is resolved.
                    $_SESSION["logged-in"] = $row["id"];

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