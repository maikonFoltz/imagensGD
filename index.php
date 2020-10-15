<?php

    $filename = "natureza.jpg";

    $width = 200;
    $height = 200;

    list($width_original, $height_original) = getimagesize($filename);

    $ratio = $width_original / $height_original;

    if($width / $height > $ratio){
        $width = $height * $ratio;
    }else{
        $height = $width * $ratio;
    }

    $image_final = imagecreatetruecolor($width, $height);

    $image_original = imagecreatefromjpeg($filename);

    imagecopyresampled($image_final, $image_original, 0, 0, 0, 0, $width, $height, $width_original, $height_original);

    header("Content-Type: image/jpg");
    
    imagejpeg($image_final, null, 80);

?>