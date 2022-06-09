<?php 
include "data.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $checkRepUser = $mysqli->query("select * from users where username ='".$_POST['username']."'");
    $checkRepEmail = $mysqli->query("select * from users where email ='".$_POST['email']."'");

    //We check to make shure the email or username are not in use
    if ($checkRepEmail->num_rows) {
        print ("mail repetido");
        exit;
    } else if ($checkRepUser->num_rows) {
        print ("user repetido");
        exit;
    }
    else {
         
        // para verificar el login se usa password_verify($_POST['password'],$encryptedPass)
        $encryptedPass = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // formando token unico para el mail
        $token = md5($_POST['email']).rand(10,9999);

        //We add the verification token onto the users entry in the databse
        $mysqli->query("INSERT INTO users(username, email, email_verif_code, password) VALUES('" . $_POST['username'] . "', '" . $_POST['email'] . "', '" . $token . "', '" . $encryptedPass . "')");

        //A link taking the user to the verification page.
        $verificationLink = "<a href='localhost/proyecto_compurosario/Compurosario-AEDR/DB_test/verify-email.php?key=".$_POST['email']."&token=".$token."'>Hace click para verificar tu cuenta</a>";
          
            
        $mail = new PHPMailer;
 
        $mail->IsSMTP();
        // Send email using Yahoo SMTP server
        $mail->Host = 'smtp.mail.yahoo.com';
        // port for Send email
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPDebug = 1;
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
            echo 'Message of Send email using Yahoo SMTP server has been sent';
        }
    }


$mysqli->close();

?>