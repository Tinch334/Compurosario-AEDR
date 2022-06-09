<?php 
include "data.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

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
         
            // para verificar el login se usa password_verify($_POST['password'],$encryptedPass)
            $encryptedPass = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // formando token unico para el mail
            $token = md5($_POST['email']).rand(10,9999);

            //
            $mysqli->query("INSERT INTO users(username, email, email_verif_code, password) VALUES('" . $_POST['username'] . "', '" . $_POST['email'] . "', '" . $token . "', '" . $encryptedPass . "')");

            $link = "<a href='localhost/proyecto_compurosario/Compurosario-AEDR/DB_test/verify-email.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a>";

          
            
            $mail=new PHPMailer();
            $mail->CharSet = 'UTF-8';
            $body = 'Cuerpo del correo de prueba';

            $mail->IsSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->SMTPDebug  = 1;
            $mail->SMTPAuth   = true;
            $mail->Username   = 'juani.bertoni7x@gmail.com';
            $mail->Password   = '';
            $mail->SetFrom('juani.bertoni7x@gmail.com', "juan ignacio bertoni");
            $mail->AddReplyTo('no-reply@mycomp.com','no-reply');
            $mail->Subject    = 'Correo de prueba PHPMailer';
            $mail->MsgHTML($body);
            $mail->oauthUserEmail = "juani.bertoni7x@gmail.com";
            $mail->oauthClientId = "juani.bertoni7x@gmail.com";
            $mail->oauthClientSecret = "[Redacted]";
            $mail->oauthRefreshToken = "[Redacted]";    
            
            $mail->AddAddress('juani.bertoni74@gmail.com', 'Juan Ignacio Bertoni');
            $mail->send();
}


$mysqli->close();



?>