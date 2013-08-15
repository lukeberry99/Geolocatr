<?php
include_once('Exif.php');

$Exif = new Exif;

$Exif->set_image('test.jpg');

$loc = $Exif->get_location();

?>
<pre>
<?print_r($loc);?>
</pre>
<img border="0" src="//maps.googleapis.com/maps/api/staticmap?center=<?=$loc['lat']?>,<?=$loc['long']?>&amp;zoom=8&amp;size=400x400&amp;sensor=false" alt="Greenwich, England">