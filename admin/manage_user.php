<?php
session_start();
include "data.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../UserHandling/PHPMailer/src/Exception.php';
require '../UserHandling/PHPMailer/src/PHPMailer.php';
require '../UserHandling/PHPMailer/src/SMTP.php';

    // check if user is logged in
    if (!isset($_SESSION['loggedIn']) ||  ! ($_SESSION['loggedIn'])) {
        echo "<p>Parece que no iniciaste sesión. <a href='index.php'>Iniciar sesión</a>.</p>";
        exit();
    } else {
    $todo = $_POST["todo"] == 'block' ? 1 : 0;
    $stmt = $mysqli->prepare("UPDATE users SET is_blocked=" . "'" . $todo . "'" . "WHERE email=" . "'" . $_POST['email'] . "'");  
    $res = $stmt->execute();

    if ($todo==1) {
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
         
    $mail->Subject = 'Tu cuenta de compurosario fue bloqueada :(';
    $mail->Body = $_POST['reason'];
        
         
    if(!$mail->Send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        echo '<br>';
        echo '<a href=users.php>Volver</a>';
        exit;
    } else {
        header("Location: users.php");
    }

    } else {
        header("Location: users.php");
    }
    
}
?>
