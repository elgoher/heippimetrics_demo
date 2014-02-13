<?php
session_start();
if (isset($_SESSION['user'])||!empty($_SESSION['user'])) {
unset($_SESSION['user']);
unset($_SESSION['email']);
unset($_SESSION['password']);
header('Location:../login.html'); // Redirecionamos a Google
exit(); //terminamos la ejecución del script ya que si redirecionamos ya no nos interesa seguir con el codigo PHP
}

?>
?>