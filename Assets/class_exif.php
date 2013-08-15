<?php
class Exif {
  public $the_image;
  public $errors;

  public function set_image($in_image) {
    global $the_image;
    $the_image = $in_image;
  }

  public function get_exif() {
    global $the_image;


    if(!empty($the_image)) {
      if(file_exists($the_image)) {
        return exif_read_data($the_image);
      }
      else {
        $errors = "The image does not exist";
        echo "<p>$errors</p>";
      }
    } else {
      $errors = "An image was not supplied or the image type is not supported (jpg only)";
      echo "<p>$errors</p>";
    }
  }

  function to_decimal($deg, $min, $sec, $hem){
    $d = $deg + (($min/60) + ($sec/3600));
    return ($hem =='S' || $hem=='W') ?  $d*=-1 : $d;
  }

  public function get_location() {
    global $the_image;

    $exif = $this->get_exif();
    if(isset($exif['GPSLongitude'])) {

      $degLong = $exif['GPSLongitude'][0];
      $minLong = $exif['GPSLongitude'][1];
      $secLong = $exif['GPSLongitude'][2];
      $refLong = $exif['GPSLongitudeRef'];

      $degLat = $exif['GPSLatitude'][0];
      $minLat = $exif['GPSLatitude'][1];
      $secLat = $exif['GPSLatitude'][2];
      $refLat = $exif['GPSLatitudeRef'];

      $long = $this->to_decimal($degLong, $minLong, $secLong, $refLong);
      $lat  = $this->to_decimal($degLat, $minLat, $secLat, $refLat);

      $loc = array (
        'long' =>  $long,
        'lat' => $lat
      );

      return $loc;
    } else {
      $errors = "This image does not contain location data";
      echo "<p>$errors</p>";
    }
  }
  public function get_image() {
    global $the_image;
    return $the_image;
  }
}