<html>
<head>
	<title>main en heippi</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['user'])||!empty($_SESSION['user'])) {
	$user=$_SESSION['user'];
	echo "bienvenido ".$_SESSION['user'];  // usuario esta loguiado;
}else{
	echo "<script type='text/javascript'>
			alert('Usted no se ha loquiado aun, sera reenviado a la pagina de login');
			setTimeout(function () {
			 		location.href='login.html';
			 	},1000);
		</script>";
		
}?>
<form method="post" action="php/logout_action.php">
<input type="submit" value="salir">
</form>

</body>
</html>