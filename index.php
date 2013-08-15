<?php
require_once('Assets/class_exif.php');
$Exif = new Exif;
if(isset($_POST["saveme"])) {

  $type = $_FILES["file"]["type"];
  if(($type == "image/jpeg") or ($type == "image/jpg")) {
    $Exif->set_image($_FILES["file"]["tmp_name"]);
    $exdata = $Exif->get_exif();
  } else {

  }
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
        <a href="index.php">
          <h1>geolocatr<br />
          <span>geo location of geo tagged images</h1>
        </a>
      </header>

      <section role="upload">
        <header>
          <h3>Upload an image to see location data (don't worry, we never save your images)</h3>
        </header>
        <div class="upload-area">
          <button class="upload" onclick="javascript:document.getElementById('file').click();">Choose an image</button>
          <form method="POST" action="" name="imageform" id="imageform" enctype="multipart/form-data">
            <input type="file" id="file" style="display: none;" name="file" />
            <input type="hidden" id="saveme" name="saveme" />
          </form>
        </div>
      </section>
      <section role="errors">
        <?php $results = $Exif->get_location(); ?>
      </section>
      <?php if(isset($results)): ?>
        <section role="location">
          <header>
            <h3>This image was taken here</h3>
          </header>
          <div class="map">
            <img src="http://maps.googleapis.com/maps/api/staticmap?center=<?=$results['lat']?>, <?=$results['long']?>&amp;zoom=14&amp;size=900x300&amp;maptype=roadmap&amp;markers=color:blue%7Clabel:X%7C<?=$results['lat']?>, <?=$results['long']?>&amp;sensor=false" alt="The Map" />
          </div>
        </section>
      <?php endif; ?>

      <?php if(isset($exdata)): ?>

        <section role="information">
          <div class="info">
            <p><a class="show" id="show" onclick="showShit();">Click here to view raw EXIF data</a></p>
            <div id='hidden-stuff'>
<pre>
<?print_r($exdata)?>
</pre>
            </div>
          </div>
        </section>

      <?php  endif; ?>
    </div>
  </div>
  <footer>
    <p>A project by <a href="http://www.luke-berry.co.uk/">Luke Berry</a> view the <a href="http://luke-berry.co.uk/blog/?p=16">blog post</a> associated with this project. Source code is available on <a href="http://www.github.com/lukeberry99/Geolocatr.git">Github</a></p>
  </footer>
  <script>
    document.getElementById("file").onchange = function() {
      document.getElementById("imageform").submit();
    }
  </script>
  <script>
    function showShit() {
      document.getElementById("hidden-stuff").style.display = "inline";
    }
  </script>
</body>
</html>
 <?php
} else {
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
        <a href="index.php">
          <h1>geolocatr<br />
          <span>geo location of geo tagged images</h1>
        </a>
      </header>

      <section role="upload">
        <header>
          <h3>Upload an image to see location data (don't worry, we never save your images)</h3>
        </header>
        <div class="upload-area">
          <button class="upload" onclick="javascript:document.getElementById('file').click();">Choose an image</button>
          <form method="POST" action="" name="imageform" id="imageform" enctype="multipart/form-data">
            <input type="file" id="file" style="display: none;" name="file" />
            <input type="hidden" id="saveme" name="saveme" />
          </form>
        </div>
      </section>
    </div>
  </div>
  <footer>
    <p>A project by <a href="http://www.luke-berry.co.uk/">Luke Berry</a> view the <a href="http://luke-berry.co.uk/blog/?p=16">blog post</a> associated with this project. Source code is available on <a href="http://www.github.com/lukeberry99/Geolocatr.git">Github</a></p>
  </footer>
  <script>
    document.getElementById("file").onchange = function() {
      document.getElementById("imageform").submit();
    }
  </script>
</body>
</html>
<?php
}
?>

