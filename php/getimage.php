<?php

$img= $_POST['image'];

if($img!="")
{
    $connection = mysql_connect("ipserver", "use", "password");
    mysql_select_db("database_name", $connection);
    $result = mysql_query("SELECT DISTINCT Max(id) as id FROM image_php", $connection);
    $maxId = mysql_result($result, 0, "id")+1;

	$pathImage = "C:/xampp/htdocs/DemoHeippi/Demov4/resources/images-php/img".$maxId.".jpg"; 

	$image = explode("base64,",$img);
	file_put_contents($pathImage, base64_decode($image[1]));

	$processed = 0;
    $sql = "INSERT INTO image_php(id, path_image, processed) VALUES('$maxId','$pathImage', '$processed')";    

    mysql_query($sql, $connection);
    mysql_close($connection);
}
?>
