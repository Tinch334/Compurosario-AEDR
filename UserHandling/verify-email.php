<!DOCTYPE html>
    <head>
        <title>COMPUROSARIO</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2019.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <link rel="stylesheet" type="text/css" href="css/lightslider.css">

        <!--Page font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@300&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/x-icon" href="Images/Main page/Favicon.png">
    </head>
    <body>
        <?php
            include "data.php";

            if($_GET['key'] && $_GET['token']) {
                $email = $_GET['key'];
                $token = $_GET['token'];

                //We check if there's an entry in the database with that email and token.
                $getQuery = "SELECT username,account_verified FROM users WHERE email_verif_code=? AND email=?";
                $query = $mysqli->prepare($getQuery);
                $query->bind_param("ss", $token, $email);
                $query->execute();
                $query->bind_result($usr,$av);
                $query->fetch();
                $query->close();
        
                //echo ("token:". $token);
                //echo("email:". $email);
                if ($usr) {
                    //We check if the account has been verified
                    if ($av == false) {
                        //Cambiamos el campo "account_verified" de false a true.
                        $verified = 1;
                        $updateQuery = "UPDATE users SET account_verified=? WHERE email=?";
                        $update = $mysqli->prepare($updateQuery);
                        $update->bind_param("is", $verified, $email);
                        $update->execute();

                        echo "Cuenta verificada con exito!";
                    }
                    else {
                        echo "Ya verifico su cuenta con nosotros!";
                    }
                }
                else {
                    echo "No tiene una cuenta con nosotros, por favor cree una";
                }

                $mysqli->close();
            }
        ?>
        <a href="/TRES/index.html">Volver a la pagina principal</a>
    </body>
</html>