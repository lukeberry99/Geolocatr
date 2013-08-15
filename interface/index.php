<?php
require_once('Assets/class_exif.php');
$Exif = new Exif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Geolocatr | Image Location Service</title>

  <link href="css/globals.css" rel="stylesheet" />
</head>
<body>
  <div id="wrapper">
    <div id="main">
      <header role="logo">
        <a href="index.html">
          <h1>geolocatr<br />
          <span>view locations from images</span></h1>
        </a>
      </header>
      <section role="upload">
        <header>
          <h3>Upload an image to see location data</h3>
        </header>
        <div class="upload-area">
          <button class="upload">Choose an image</button>
        </div>
      </section>
      <section role="location">
        <header>
          <h3>This image was taken here</h3>
        </header>
        <div class="map">
          <img src="images/map.png" alt="The Map" />
        </div>
      </section>
    </div>
  </div>
  <footer>
    <p>A project by <a href="http://www.luke-berry.co.uk/">Luke Berry</a> view the <a href="http://www.luke-berry.co.uk/blog/">blog post</a> associated with this project. Source code is available on <a href="http://www.github.com/lukeberry99/geolocatr">Github</a></p>
  </footer>
</body>
</html>