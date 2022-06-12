<?php 
include "data.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['username']) && $_POST['username'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']) {

    $checkRepUser = $mysqli->query("select * from users where username ='".$_POST['username']."'");
    $checkRepEmail = $mysqli->query("select * from users where email ='".$_POST['email']."'");

    //We check to make shure the email or username are not in use
    if ($checkRepEmail->num_rows) {
        echo json_encode(array('success' => -2));

    } else if ($checkRepUser->num_rows) {
        echo json_encode(array('success' => -1));
    }
    else {
        // para verificar el login se usa password_verify($_POST['password'],$encryptedPass)
        $encryptedPass = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // formando token unico para el mail
        $token = md5($_POST['email']).rand(10,9999);

        //A link taking the user to the verification page.
        $verificationLink = "<a href='https://www.agssoft.ar/TRES/UserHandling/verify-email.php?key=".$_POST['email']."&token=".$token."'>Hace click para verificar tu cuenta</a>";
          
            
        $mail = new PHPMailer;
        $mail->IsSMTP();
        // Send email using Yahoo SMTP server
        $mail->Host = 'smtp.mail.yahoo.com';
        // port for Send email
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->Username = 'compurosario.noreply@Yahoo.com';
        $mail->Password = 'gpzrqhbygsudxyxm';
             
        $mail->From = 'compurosario.noreply@Yahoo.com';
        $mail->FromName = 'compurosario';// frome name
        $mail->AddAddress($_POST['email']);  // Add a recipient  to name
             
        $mail->IsHTML(true); // Set email format to HTML
             
        $mail->Subject = 'Por favor verifica tu cuenta';
        $mail->Body    = $verificationLink;
            
             
        if(!$mail->Send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        }
        else {
            //We add the user if the email was sent
            $mysqli->query("INSERT INTO users(username, email, email_verif_code, password) VALUES('" . $_POST['username'] . "', '" . $_POST['email'] . "', '" . $token . "', '" . $encryptedPass . "')");

            //The user registration was successful.
            echo json_encode(array('success' => 1));
        }
    }
}

$mysqli->close();
?>



<?php
/*include "data.php";
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
?>*/