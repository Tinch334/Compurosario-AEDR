<?php
	$db_host='localhost';
	$db_user='root';
	$db_pass='root';
	$db_name='tres';

$mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 
 if ( $mysqli->connect_error ) {
	die ('Error de Conexion (' . $mysqli -> connect_errno .') '
. $mysqli->connect_error );
}
?>