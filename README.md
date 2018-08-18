### Php Base64 Resize



**Not:** Projede bazı geliştirmeler daha sonra tekrar düzenlenecek (refactoring).


[Demo](https://hasimyerli.com/projects/dev/php-base64-resize)

**Not:** Detaylı kullanım **preivew.php** dosyasında mevcuttur.
```php
<?php
  $base64_resize = new base64Resize($base64_image);
  $base64_resize->resize($width,$height);

  header("Content-type: image/gif");

  echo $base64_resize->getImage();
?>
```
