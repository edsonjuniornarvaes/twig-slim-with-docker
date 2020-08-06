<?php

namespace app\traits;

trait Links 
{
	protected $maxLinks = 4;

	private function previous() 
	{
		if ($this->page > 1) {
			$preview = ($this->page - 1);
			$links = '<li><a href="?page=1"> [1] </a></li>';
			$links .= '<li><a href="?page=' . $preview . '" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a></li>';

			return $links;
		}
	}

	private function next() 
	{
		if ($this->page < $this->pages) {
			$next = ($this->page + 1);
			$links = '<li><a href="?page=' . $next . '" aria-label="Next"> <span aria-hidden="true">&raquo;</span></a></li>';
			$links .= '<li><a href="?page=' . $this->pages . '"> [' . $this->pages . '] </a></li>';

			return $links;
		}
	}

	public function links() 
	{

		if ($this->pages > 0) {

			$links = "<ul class='pagination'>";
			$links .= $this->previous();

			for ($i = $this->page - $this->maxLinks; $i <= $this->page + $this->maxLinks; $i++) {

				$class = ($i == $this->page) ? 'actual' : '';

				if ($i > 0 && $i <= $this->pages) {
					$links .= "<li><a href='?page=" . $i . "' class=" . $class . ">{$i}</a></li>";
				}
			}

			$links .= $this->next();
			$links .= '</ul>';

			return $links;
		}
	}
}