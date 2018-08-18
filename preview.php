<?php
  if (!empty($_POST)) {

    $base64_image = $_POST['base64Image'];
    $width = $_POST['baseImageWidth'];
    $height = $_POST['baseImageHeight'];

    include "library/base64Resize.php";
    $resize = new base64Resize($base64_image);
    $resize->resize($width,$height);

    header("Content-type: image/gif");
    echo $resize->getImage();

  } else {

    header("Location: index.php");

  }

?>
