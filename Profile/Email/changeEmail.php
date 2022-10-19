<?php 
include $_SERVER['DOCUMENT_ROOT']."/TRES/auth/data.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'].'/TRES/PHPMailer/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'].'/TRES/PHPMailer/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'].'/TRES/PHPMailer/src/SMTP.php';


if ($_POST['new-email']) {
    $sqlQuery = "SELECT email from users where email=? LIMIT 1";
    $query = $mysqli->prepare($sqlQuery);
    $query->bind_param("s", $_POST['new-email']);
    $query->execute();
    
    $query->bind_result($resultEmail);
    $query->fetch();
    $query->close();

    //We check to make sure the email is not in use.
    if ($resultEmail) {
        echo json_encode(array('success' => -1));
    }
    else {
        //Formando token unico para el mail.
        $token = md5($_POST['new-email']).rand(10,9999);

        //A link taking the user to the verification page.
        $verificationLink = "<a href='https://www.agssoft.ar/TRES/UserHandling/verify-email.php?key=".$_POST['new-email']."&token=".$token."'>Hace click para verificar tu cuenta</a>";
            
        $mail = new PHPMailer;
 
        $mail->IsSMTP();
        //Send email using Yahoo SMTP server
        $mail->Host = 'smtp.mail.yahoo.com';
        //Port for Send email
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->Username = 'compurosario.noreply@Yahoo.com';
        $mail->Password = 'gpzrqhbygsudxyxm';
             
        $mail->From = 'compurosario.noreply@Yahoo.com';
        $mail->FromName = 'compurosario'; //Frome name
        $mail->AddAddress($_POST['new-email']); //Add a recipient  to name
             
        $mail->IsHTML(true); //Set email format to HTML
             
        $mail->Subject = 'Por favor verifica tu cuenta';
        $mail->Body = $verificationLink;
             
        if(!$mail->Send()) {
            //In case the email could not be sent.
            echo json_encode(array('success' => -2));
            exit;
        }
        else {
            //We update the database.
            $sqlQuery = "UPDATE users SET email=" . "'" . $_POST['new-email'] . "'" . " WHERE id=? LIMIT 1";
            $query = $mysqli->prepare($sqlQuery);
            $query->bind_param("s", $_SESSION["logged-in"]);
            $query->execute();

            $sqlQuery = "UPDATE users SET email_verif_code=" . "'" . $token . "'" . " WHERE id=? LIMIT 1";
            $query = $mysqli->prepare($sqlQuery);
            $query->bind_param("s", $_SESSION["logged-in"]);
            $query->execute();

            $sqlQuery = "UPDATE users SET account_verified=0 WHERE id=? LIMIT 1";
            $query = $mysqli->prepare($sqlQuery);
            $query->bind_param("s", $_SESSION["logged-in"]);
            $query->execute();
    
            //If everything is successful we return 1.
            echo json_encode(array('success' => 1));
        }
    }
}
$mysqli->close();
?>