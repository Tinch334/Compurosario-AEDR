<?php
include $_SERVER['DOCUMENT_ROOT'] . "/TRES/auth/data.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>COMPUROSARIO (admin)</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2019.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/TRES/admin/css/user.css">



    <!--Page font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- Jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- page js -->
    <script src="/TRES/scripts/script.js" defer></script>

    <!-- Segmente includer -->
    <script src="/TRES/scripts/csi.js" defer></script>

    <!-- Lightsldier -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/lightslider.css">
    <script type="text/javascript" src="/TRES/scripts/lightslider.js"></script>

    <!-- slick script cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="/TRES/Images/Main page/Favicon.ico">
</head>

<body>
    <h1>Administrar usuarios</h1>

    <?php
    // check if user is logged in
    if (!isset($_SESSION['loggedIn']) ||  !($_SESSION['loggedIn'])) {
        echo "<p>Parece que no iniciaste sesión. <a href='index.php'>Iniciar sesión</a>.</p>";
        die();
    }


    echo "<p>No olvides <a href='logout.php'>Cerrar sesion</a> al terminar :)</p>";

    echo "<h2>Usuarios actuales</h2>";


    echo ("<table>" . "\n");
    $stmt = $mysqli->query("SELECT username, email, account_verified, num_of_logs, last_log from users where is_blocked=0");


    echo ("<th class='edge1'><b>Nombre de usuario</b></th>");
    echo ("<th><b>Correo electrónico</b</th>");
    echo ("<th><b>Cuenta verificada</b</th>");
    echo ("<th><b>Número de inicios de sesión</b</th>");
    echo ("<th><b>Último inicio de sesión</b</th>");
    echo ("<th class='edge2'><b>Administrar usuario</b</th>");

    while ($row = $stmt->fetch_assoc()) {
        echo "<tr><td>";
        echo (htmlentities($row['username']));
        echo "</td><td>";
        echo (htmlentities($row['email']));
        echo "</td><td>";
        echo (htmlentities($row['account_verified']) ? "Sí" : "No");
        echo "</td><td>";
        echo (htmlentities($row['num_of_logs']));
        echo "</td><td>";
        echo (htmlentities($row['last_log']) ? htmlentities($row['last_log']) : "Sin registro");
        echo "</td><td>";
        echo ('<form action="manage_user.php" method="post">
            <input placeholder="Ingresar motivo de bloqueo" type="text" id="reason" name="reason" required="true">
            <input type="hidden" name="todo" value=block>
            <input type="hidden" name="email" value=' . htmlentities($row["email"]) . '>
            <input type="submit" value="Bloquear">
            </form>'
        );
        echo ("\n" . "</td></tr>" . "\n");
    }
    ?>
    </table>

    <?php
    echo "<h2>Usuarios bloqueados</h2>";

    echo ("<table>" . "\n");

    $stmt2 = $mysqli->query("SELECT username, email, account_verified, num_of_logs, last_log from users where is_blocked=1");

    if (($stmt2->num_rows) == 0) {
        echo "<p>Actualmente no hay usuarios bloqueados</p>";
    } else {
        echo ("<th class='edge1'><b>Nombre de usuario</b></th>");
        echo ("<th><b>Correo electrónico</b</th>");
        echo ("<th><b>Cuenta verificada</b</th>");
        echo ("<th><b>Número de inicios de sesión</b</th>");
        echo ("<th><b>Último inicio de sesión</b</th>");
        echo ("<th class='edge2'><b>Administrar usuario</b</th>");

        while ($row = $stmt2->fetch_assoc()) {
            echo "<tr><td>";
            echo (htmlentities($row['username']));
            echo "</td><td>";
            echo (htmlentities($row['email']));
            echo "</td><td>";
            echo (htmlentities($row['account_verified']) ? "Sí" : "No");
            echo "</td><td>";
            echo (htmlentities($row['num_of_logs']));
            echo "</td><td>";
            echo (htmlentities($row['last_log']) ? htmlentities($row['last_log']) : "Sin registro");
            echo "</td><td>";
            echo ('<form action="manage_user.php" method="post">
                    <input type="hidden" name="todo" value=unblock>
                    <input type="hidden" name="email" value=' . htmlentities($row["email"]) . '>
                    <input type="submit" value="Desbloquear">
                    </form>'
            );
            echo ("\n" . "</td></tr>" . "\n");
        }
    }
    ?>
    </table>

    <a href='admin.php'>Volver</a>


</body>

</html>