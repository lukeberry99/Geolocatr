<?php
include_once('Exif.php');
$Exif = new Exif;
$Exif->set_image("image4.jpg");
echo "<pre>";
print_r($Exif->get_location());
echo "</pre>";
?>