<?php
include "data.php";
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<style>

  .credentials-title {
    text-align: center;
  }

  .credentials-title {

    
    text-align: center;
    overflow: hidden;
    font-weight: bold;
    color: whitesmoke;
    background-color: #112B3C;
    padding: 1%;
    margin: 10% 20% ;

  }

  .admin-body{
    font-family: 'Poppins', sans-serif;
    background-color: #205375;
  }

</style>


<head>
    <title>COMPUROSARIO</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2019.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!--Page font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- Jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- page js -->
    <script src="/TRES/scripts/script.js" defer></script>

    <!-- Segmente includer -->
    <script src="/TRES/scripts/csi.js" defer></script>

    <!-- Lightsldier -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/lightslider.css">
    <script type="text/javascript" src="/TRES/scripts/lightslider.js"></script>   

    <!-- slick script cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="TRES/Images/Main page/Favicon.ico">
</head>
<body class="admin-body">

    <div class='credentials-title'>
      <h1>Panel de administración</h1>
        <p>
          Por favor, verificar sus credenciales.
        </p>
    <?php
      if (isset($_SESSION["error"])) {
        $error = $_SESSION["error"];
        echo "<span style='color: red'>$error</span>";  
      }
    ?>
      


      <form action="check_admin.php" method="post" class="credentials-form">
        <label for="fname">Nombre de admin</label><br>
        <input type="text" id="username" name="username" required="true"><br>
        <label for="lname">Contraseña</label><br>
        <input type="password" id="password" name="password" required="true"><br><br>
        <input type="submit" value="Ingresar">

      </form> 

      </div>  


</body>
</html>

<?php
unset($_SESSION["error"]);
?>