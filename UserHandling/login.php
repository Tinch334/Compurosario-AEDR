<?php
include "data.php";
session_start();

    //We check that we got the username and password
    if (isset($_POST['username']) && $_POST['username'] && isset($_POST['password']) && $_POST['password']) {
        $sqlQuery = "SELECT username, account_verified, password, id, is_blocked from users WHERE username=? LIMIT 1";
        $query = $mysqli->prepare($sqlQuery);
        $query->bind_param("s", $_POST['username']);
        $query->execute();
        
        $encryptedPass = password_hash($_POST['password'], PASSWORD_BCRYPT);

        //$result = $query->get_result();
        $query->bind_result($user, $av, $p, $id, $ib);
        $query->fetch();
        $query->close();

        if ($user) {
            if ($av == true) {
                if (password_verify($_POST['password'], $p)) {
                    if ($ib == false) {
                       //We update the last time the user logged in.
                        $date = date("Y-m-d H:i:s");
    
                        //ll $date
                        //usr $_POST['username']
    
                        $sqlUpdate = "UPDATE users SET last_log=? WHERE username=?";
                        $update = $mysqli->prepare($sqlUpdate);
    
                        $update->bind_param("ss", $date, $_POST['username']);
    
                        $update->execute();
                        $update->close();
    
                        //NOT WORKING
                        //Cookies do not work in any of the computers of the members of the group.
                        //We create a cookie that will expire in 30 days and grants the user access to all the files.
                        //setcookie("userLogged", "pito de mono" , time()+60*60*24*30, "/", 1);
    
                        //Using sessions until issue is resolved.
                        $_SESSION["logged-in"] = $id;
    
                        echo json_encode(array('success' => 1)); //Successful verification.  
                    }
                    else {
                        echo json_encode(array('success' => -4));
                    }
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
$mysqli->close();
?>