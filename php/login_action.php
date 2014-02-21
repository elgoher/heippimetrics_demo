<?php
require_once 'conect.php';//archivo que contiene las funciones de conexion, ejecutar sql y cerrar conexion con la BD
session_start();
$user= $_POST['user'];
$password= $_POST['password'];

$conexion=conectar();//se conecta con la bd

$sql="SELECT * FROM heippianalyticsdemo.user where password='$password' and (email='$user' or name_user='$user')";


$rs = ejecutar_sql($sql,$conexion);

if($row = $rs->fetch_row()){
	$_SESSION['id_user']  = $row[0];
	$_SESSION['email']  = $row[1];
	$_SESSION['user']  = $row[2];
	$_SESSION['password']  = $row[3];

	//se crea array con datos de usuario
	$json = array(
    'id_user' => $row[0],
    'email' => $row[1],
    'user' => $row[2],
    'password' => $row[3],    
	);

	//se guarda archivo con datos en json
	$jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
	$file = fopen("../js/".$row[2].".json", 'w');
	fwrite($file, $jsonencoded);
	fclose($file);

	cerrar($conexion);
	echo "main&&".$row[2];
	
}else{
	cerrar($conexion);
	echo"login";
	
}

?>