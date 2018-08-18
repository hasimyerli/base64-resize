### Php Base64 Resize



**Not:** Projede bazı geliştirmeler daha sonra tekrar düzenlenecek (refactoring).


[Demo](https://hasimyerli.com/projects/dev/php-base64-resize)


```php
<?php
  include "library/base64Resize.php";

  $resize = new base64Resize($base64_image);
  $resize->resize($width,$height);

  header("Content-type: image/gif");

  echo $resize->getImage();
?>
```
