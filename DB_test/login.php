<?php 
include "data.php";


    $checkRepUser = $mysqli->query("select * from users where username ='".$_POST['username']."'");
    $checkRepEmail = $mysqli->query("select * from users where email ='".$_POST['email']."'");

    if ($checkRepEmail->num_rows) {
        print ("mail repetido");
        exit;
    } else if ($checkRepUser->num_rows) {
        print ("user repetido");
        exit;
    }
    else {
         print($_POST['email']);
    print($_POST['username']);
    print($_POST['password']);
    
    // para verificar el login se usa password_verify($_POST['password'],$encryptedPass)
    $encryptedPass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $mysqli->query("insert into users (email, username, password) values ('".$_POST['email']."','".$_POST['username']."','".$encryptedPass."')");
    }


$mysqli->close();



?>