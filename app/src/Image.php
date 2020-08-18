<?php

namespace app\src;

use Intervention\Image\ImageManager;

class Image {
    private $intervention;
    private $image;
    private $rename;
    private $resized = false;

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

        $target = getimagesize($this->image['tmp_name']);

        $percent = ($target[0] > $target[1]) ? ($size / $target[0]) : ($size / $target[1]);
        $resizeWidth = round($target[0] * $percent);
        $resizeHeight = round($target[1] * $percent);

        $this->type = $type;
        $this->resized = true;

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

    private function doUpload() {
        if(!$this->resized) {
            throw new \Exception('Esta faltando você chamar o método size para redimensionar essa foto');
        }
    }

    public function upload() {

    }
}