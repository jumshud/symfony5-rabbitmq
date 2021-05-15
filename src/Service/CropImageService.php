<?php

namespace App\Service;

class CropImageService
{
    public function crop(string $imageUrl, string $size): bool
    {
        [$width, $height] = explode('x', $size);
        $img = imagecreatefromjpeg($imageUrl);
        $imgcrop = imagecrop($img, ['x' => 0, 'y' => 0, 'width' => $width, 'height' => $height]);
        if ($imgcrop !== FALSE) {
            $path = dirname(dirname(__DIR__)) . '/public/images/img-cropped.'.time().'.jpg';
            imagejpeg($imgcrop, $path);
            imagedestroy($imgcrop);
            echo "Image cropped successfully" . PHP_EOL;
        }
        imagedestroy($img);

        return true;
    }
}
