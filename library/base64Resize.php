<?php
class base64Resize
{
  private $image;
  private $width;
  private $height;
  private $aspect_ratio;

  public function __construct($base64_image)
  {
    $this->image = $this->imageCreate($base64_image);
    $this->width = (int) imagesx($this->image);
    $this->height = (int) imagesy($this->image);
    $this->aspect_ratio = $this->width / $this->height;
  }

  private function imageCreate($base64_image)
  {
    return imagecreatefromstring(base64_decode($base64_image));
  }

  private function recalWidthAndHeight($max_width,$max_height){
    if ($max_width > 0 && $this->width > $max_width)
    {
        $this->width	 = $max_width;
        $this->height	 = $this->width / $this->aspect_ratio;
    }

    if ($max_height > 0 && $this->height > $max_height)
    {
        $this->height	 = $max_height;
        $this->width	 = $this->height * $this->aspect_ratio;
    }
  }

  private function imageScaleCheck(){
    if ($this->width != imagesx($this->image) || $this->height != imagesy($this->image))
    {
        $this->image = imagescale($this->image, $this->width, $this->height);
    }
  }

  public function resize($max_width,$max_height){
    $this->recalWidthAndHeight($max_width,$max_height);
    $this->imageScaleCheck();
    ob_start();
    imagejpeg($this->image);
    $this->image = ob_get_contents();
    ob_end_clean();
  }

  public function getImage(){
    return $this->image;
  }

}
