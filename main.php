<html>
<head>
	<title>main en heippi</title>
	<meta charset="utf-8">
	<script src="js/sesion.js"></script>
	<script src="js/jquery-1.9.1.js"></script>
	<script type="text/javascript">
	$( document ).ready(function() {
		validarSesion();
	});
	</script>
</head>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['user'])||!empty($_SESSION['user'])) {
	$user=$_SESSION['user'];
	echo "bienvenido ".$user;// usuario esta loguiado;
	?>
	<input type="hidden" id="user" value=<?php echo $user; ?> />
<?php

?>
<button onclick="cerrarSesion();">salir</button>


</body>
</html>