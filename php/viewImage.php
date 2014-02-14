<?php
    $connection = mysql_connect("127.0.0.1", "root", "password");
    mysql_select_db("heippianalyticsdemo", $connection);
    $result = mysql_query("SELECT Min(id) as id, image_php_id, path_image, detections_number FROM image_processed where view = 0 ORDER By id", $connection);

    $path_image = mysql_result($result, 0, "path_image");    

    if ($path_image != "" ) 
    {
        $id = mysql_result($result, 0, "id");
        $image_php_id = mysql_result($result, 0, "image_php_id");
        $detections_number = mysql_result($result, 0, "detections_number");

        // echo "ID ".$id." image_php_id ".$image_php_id." path_image ".$path_image." detections_number ".$detections_number;

        $sql = "UPDATE image_processed SET view = 1 where id = '$id'";    
        mysql_query($sql, $connection);
       
        mysql_close($connection);

        echo $id."#".$detections_number;
    }else
    {
        // echo "no hay imagenes disponibles";
        mysql_close($connection);
        echo false;
    }
?>