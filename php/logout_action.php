<?php
session_start();
if (isset($_SESSION['user'])||!empty($_SESSION['user'])) {
unset($_SESSION['user']);
unset($_SESSION['email']);
unset($_SESSION['password']);
echo"logout";
}
else {
	echo"error";
}
?>
