<?php

$HOST = "3.130.9.8";
$USER = "trestres";
$PASS = "3300tres3";
$mysqli = new mysqli ($HOST ,$USER , $PASS );
if ( $mysqli->connect_error ) {
die ('Error de Conexion (' . $mysqli -> connect_errno .') '
. $mysqli->connect_error );
}
echo "Anduvo joya\n";

$mysqli->close();

?>