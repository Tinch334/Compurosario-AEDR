<?php
include $_SERVER['DOCUMENT_ROOT']."/TRES/auth/data.php";
session_start();

    //We check that we got the username and password
    if (isset($_POST['username']) && $_POST['password']) {
        $sqlQuery = "SELECT username, account_verified, password, id, is_blocked from users WHERE username=? LIMIT 1";
        $query = $mysqli->prepare($sqlQuery);
        $query->bind_param("s", $_POST['username']);
        $query->execute();

        $query->bind_result($user, $av, $p, $id, $ib);
        $query->fetch();
        $query->close();

        if ($user) {
            if ($av == true) {
                if (password_verify($_POST['password'], $p)) {
                    if ($ib == false) {
                       //We update the last time the user logged in.
                        $date = date("Y-m-d H:i:s");
    
                        $sqlUpdate = "UPDATE users SET last_log=? WHERE username=?";
                        $update = $mysqli->prepare($sqlUpdate);
                        $update->bind_param("ss", $date, $_POST['username']);
                        $update->execute();
                        $update->close();

                        //Increment number of logins
                        $sqlQuery = "UPDATE users SET num_of_logs = num_of_logs + 1 WHERE id=? LIMIT 1";
                        $query = $mysqli->prepare($sqlQuery);
                        $query->bind_param("s", $id);
                        $query->execute();

                        //Start session
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