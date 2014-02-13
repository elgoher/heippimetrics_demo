<?php
require_once 'conect.php';//archivo que contiene las funciones de conexion, ejecutar sql y cerrar conexion con la BD

$nombre= $_POST['nombre'];
$password= $_POST['password'];
$email= $_POST['email'];

$conexion=conectar();//se conecta con la bd

$sql="select max(id) from user";//se busca el id mayor

$rs = ejecutar_sql($sql,$conexion);

$row = $rs->fetch_row();

$id =$row[0];

$id=$id+1;//se incrementa para insertar el nuevo usuario en la bd

$sql="INSERT INTO user(id,email,name_user,password) VALUES ($id,'$email', '$nombre', '$password')";

if (!$insert=ejecutar_sql($sql,$conexion)) 
		echo $insert;
else
	echo "insertado";

cerrar($conexion);
?>