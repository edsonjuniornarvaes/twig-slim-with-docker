<?php

namespace app\src;

use Intervention\Image\ImageManager;

class Image {
    private $intervention;
    private $image;
    private $rename;

    public function __construct($imageName) {
        $this->intervention = new ImageManager;
        $this->image = $_FILES[$imageName];
    }

    public function rename() {
        $extension = pathinfo($this->image['name'], PATHINFO_EXTENSION);
        $this->rename = md5(uniqid()) . time() . ".{$extension}";
    }

    public function getName() {
        return $this->rename;
    }

    public function size($type) {
        $size = $this->type($type);
    }

    public function type($type) {
        switch ($type) {
            case 'user':
                $size = 300;
                break;
            default:
                $size = 400;
                break;
        }

        return $size;
    }
}