<?php

$img= $_POST['image'];

if($img!="")
{
    $connection = mysql_connect("127.0.0.1", "root");
   
    mysql_select_db("heippianalyticsdemo", $connection);
   
    $result = mysql_query("SELECT DISTINCT Max(id) as id FROM image_php", $connection);
   
    $maxId = mysql_result($result, 0, "id")+1;

    $root=str_replace("\\","/",getcwd());
   
    $pathImage = $root."/../resources/images-php/img".$maxId.".jpg"; 
    
    $image = explode("base64,",$img);
	
    file_put_contents($pathImage, base64_decode($image[1]));
   
    $processed = 0;
    
    $sql = "INSERT INTO image_php(id, path_image, processed) VALUES('$maxId','$pathImage', '$processed')";    

    mysql_query($sql, $connection);
   
    mysql_close($connection);
}
?>
