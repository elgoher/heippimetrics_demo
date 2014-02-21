<?php
session_start();
if (isset($_SESSION['user'])||!empty($_SESSION['user'])) {

unlink("../js/".$_SESSION['user'].".json");//se elimina archivos de datos de usuario

unset($_SESSION['user']);
unset($_SESSION['email']);//se eliminan datos de session en php
unset($_SESSION['password']);

echo"logout";
}
else {
	echo"error";
}
?>
