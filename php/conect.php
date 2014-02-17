<?php

function conectar(){

 $conn = new mysqli('localhost', 'root', '', 'heippianalyticsdemo')
	 or die ('No se pudo conectar a la base de datos'.mysqli_connect_error());
	return $conn;
}

function ejecutar_sql($sql, $conn){
	
	$result = $conn->query($sql) or die($conn->error);
	return $result;
}

 function cerrar($conn){
 	if(isset($conn)||!empty($conn)){
		mysqli_close($conn);
		unset($conn);
	}
}
?>
