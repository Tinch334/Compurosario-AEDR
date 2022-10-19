<?php 
include $_SERVER['DOCUMENT_ROOT']."/TRES/auth/data.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'].'/TRES/PHPMailer/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'].'/TRES/PHPMailer/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'].'/TRES/PHPMailer/src/SMTP.php';


if (isset($_POST['username'])&& $_POST['email'] && $_POST['password']) {
    $checkRepUserQuery = "SELECT username from users where username=? LIMIT 1";
    $checkRepEmailQuery = "SELECT email from users where email=? LIMIT 1";

    
    $checkRepUser = $mysqli->prepare($checkRepUserQuery);
    $checkRepUser->bind_param("s", $_POST['username']);
    $checkRepUser->execute();
    $checkRepUser->bind_result($resultUser);
    $checkRepUser->fetch();
    $checkRepUser->close();


    $checkRepEmail = $mysqli->prepare($checkRepEmailQuery);
    $checkRepEmail->bind_param("s", $_POST['email']);
    $checkRepEmail->execute();
    $checkRepEmail->bind_result($resultEmail);
    $checkRepEmail->fetch();
    $checkRepEmail->close();

    //We check to make sure the email or username are not in use
    if ($resultEmail) {
        echo json_encode(array('success' => -2));
    } else if ($resultUser) {
        echo json_encode(array('success' => -1));
    }
    else {
        //Para verificar el login se usa password_verify($_POST['password'],$encryptedPass).
        $encryptedPass = password_hash($_POST['password'], PASSWORD_BCRYPT);

        //Token unico para el mail.
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
        $mail->Body = $verificationLink;
             
        if(!$mail->Send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        }
        else {

            //We add the user if the email was sent
            $addUserQuery = "INSERT INTO users(username, email, email_verif_code, password) VALUES (?,?,?,?)";
            $insert = $mysqli->prepare($addUserQuery);
            $insert->bind_param("ssss", $_POST['username'], $_POST['email'], $token, $encryptedPass);

            $insert->execute();
            $insert->close();
            //The user registration was successful.
            echo json_encode(array('success' => 1));
        }
    }
}
$mysqli->close();
?>