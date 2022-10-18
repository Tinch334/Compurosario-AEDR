<?php
include $_SERVER['DOCUMENT_ROOT']."/TRES/auth/data.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPUROSARIO (admin)</title>
</head>
<body>
    <h1>Administrar usuarios</h1>

    <?php
    // check if user is logged in
    if (!isset($_SESSION['loggedIn']) ||  ! ($_SESSION['loggedIn'])) {
        echo "<p>Parece que no iniciaste sesión. <a href='index.php'>Iniciar sesión</a>.</p>";
        die();
    } 
    

    echo "<p>No olvides <a href='logout.php'>Cerrar sesion</a> al terminar :)</p>";

    echo "<h2>Usuarios actuales</h2>";

 
    echo("<table>"."\n");
        $stmt = $mysqli->query("SELECT username, email, account_verified, num_of_logs, last_log from users where is_blocked=0");


        echo("<td><b>Nombre de usuario</b></td>");
        echo("<td><b>Correo electrónico</b</td>");
        echo("<td><b>Cuenta verificada</b</td>");
        echo("<td><b>Numero de inicios de sesion</b</td>");
        echo("<td><b>Ultimo inicio de sesión</b</td>");
        echo("<td><b>Administrar usuario</b</td>");

        while ( $row = $stmt->fetch_assoc() ) {
            echo "<tr><td>";
            echo(htmlentities($row['username']));
            echo "</td><td>";
            echo(htmlentities($row['email']));
            echo "</td><td>";
            echo(htmlentities($row['account_verified'])? "Sí" : "No");
            echo "</td><td>";
            echo(htmlentities($row['num_of_logs']));
            echo "</td><td>";
            echo(htmlentities($row['last_log'])? htmlentities($row['last_log']) : "Sin registro");
            echo "</td><td>";
            echo(
            '<form action="manage_user.php" method="post">
            <input placeholder="Ingresar motivo de bloqueo" type="text" id="reason" name="reason" required="true">
            <input type="hidden" name="todo" value=block>
            <input type="hidden" name="email" value='.htmlentities($row["email"]).'>
            <input type="submit" value="Bloquear">
            </form>'
            );
            echo("\n"."</td></tr>"."\n");
        }
    ?>
    </table>

    <?php
    echo "<h2>Usuarios bloqueados</h2>";

    echo("<table>"."\n");
    
        $stmt2 = $mysqli->query("SELECT username, email, account_verified, num_of_logs, last_log from users where is_blocked=1");

        if ($stmt2->fetch_assoc() == NULL) {
            echo "<p>Actualmente no hay usuarios bloqueados</p>";
        }

        else {

            echo("<td><b>Nombre de usuario</b></td>");
            echo("<td><b>Correo electrónico</b</td>");
            echo("<td><b>Cuenta verificada</b</td>");
            echo("<td><b>Numero de inicios de sesion</b</td>");
            echo("<td><b>Ultimo inicio de sesión</b</td>");
            echo("<td><b>Administrar usuario</b</td>");
        }
        

        while ( $row = $stmt2->fetch_assoc() ) {
            echo "<tr><td>";
            echo(htmlentities($row['username']));
            echo "</td><td>";
            echo(htmlentities($row['email']));
            echo "</td><td>";
            echo(htmlentities($row['account_verified'])? "Sí" : "No");
            echo "</td><td>";
            echo(htmlentities($row['num_of_logs']));
            echo "</td><td>";
            echo(htmlentities($row['last_log'])? htmlentities($row['last_log']) : "Sin registro");
            echo "</td><td>";
            echo(
            '<form action="manage_user.php" method="post">
            <input type="hidden" name="todo" value=unblock>
            <input type="hidden" name="email" value='.htmlentities($row["email"]).'>
            <input type="submit" value="Desbloquear">
            </form>'
            );
            echo("\n"."</td></tr>"."\n");
        }
    ?>
    </table>


<a href='admin.php'>Volver</a>



</body>
</html>