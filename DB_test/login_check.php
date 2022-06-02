<?php 
	echo "Anduvo joya la form\n";
	echo $_POST["username"];
	echo $_POST["password"];




















$HOST = "localhost";
$USER = "trestres";
$PASS = "";



























$mysqli = new mysqli ($HOST ,$USER , $PASS );
if ( $mysqli->connect_error ) {
die ('Error de Conexion (' . $mysqli -> connect_errno .') '
. $mysqli->connect_error );
}
echo "Anduvo joya\n";

$res = $mysqli->query("SELECT * FROM `users`");
echo $res

$mysqli->close();



exit;

?>