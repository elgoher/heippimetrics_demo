<?php
require_once 'conect.php';//archivo que contiene las funciones de conexion, ejecutar sql y cerrar conexion con la BD
session_start();
$user= $_POST['user'];
$password= $_POST['password'];

$conexion=conectar();//se conecta con la bd

$sql="SELECT * FROM heippianalyticsdemo.user where password='$password' and (email='$user' or name_user='$user')";


$rs = ejecutar_sql($sql,$conexion);
if($row = $rs->fetch_row()){
	$_SESSION['email']  = $row[1];
	$_SESSION['user']  = $row[2];
	$_SESSION['password']  = $row[3];
	header ("Location: ../main.php");
}else{
	echo"<script type='text/javascript'>
			alert('Usuario / email o password estan errados por favor intente nuevamente');
			setTimeout(function () {
			 		location.href='../login.html';
			 	},10);
		</script>";
}
?>