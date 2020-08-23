<?php

namespace app\src;

use Intervention\Image\ImageManager;

class Image {
    private $intervention;

	private $image;

	private $rename;

	private $resized = false;

	private $resizeWidth;

	private $resizeHeight;

	public function __construct($imageName) {
		$this->intervention = new ImageManager;

		$this->image = $_FILES[$imageName];
	}

	private function rename() {
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

		$this->resizeWidth = round($target[0] * $percent);

		$this->resizeHeight = round($target[1] * $percent);

		$this->type = $type;

		$this->resized = true;

		return $this;

	}

	private function type($type) {
		switch ($type) {
		case 'user':
			$size = 300;
			break;

		default:
			$size = 640;
			break;
		}

		return $size;
	}

	private function doUpload() {
		if (!$this->resized) {
			throw new \Exception("Esta faltando você chamar o método size para redimensionar essa foto");
		}

		$image = $this->intervention->make($this->image['tmp_name'])->resize($this->resizeWidth, $this->resizeHeight, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});

		if ($this->type == 'user') {
			$background = $this->intervention->canvas(190, 190);
			$background->insert($image, 'center');
			$background->save("assets/imgs/photos/{$this->rename}");
		} else {
			$image->save("assets/imgs/photos/{$this->rename}");
		}

	}

    public function upload() {
        $this->rename();
        $this->doUpload();
	}
	
    public function delete($photo) {
		@unlink(path().'/public'.$photo);
    }
}