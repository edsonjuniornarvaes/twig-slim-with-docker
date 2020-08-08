<?php

namespace app\traits;

trait Links 
{
	protected $maxLinks = 4;

	private function pageRequest()
	{
		return (!busca()) ? "?page=" : "?s=" . busca() . "&page=";
	}

	private function previous() 
	{
		if ($this->page > 1) {
			$preview = ($this->page - 1);
			$links = '<li><a href="' . $this->pageRequest() . '1"> [1] </a></li>';
			$links .= '<li><a href="' . $this->pageRequest() . $preview . '" aria-label="Previous"> 
					   <span aria-hidden="true">&laquo;</span></a></li>';
			return $links;
		}
	}

	private function next() 
	{
		if ($this->page < $this->pages) {
			$next = ($this->page + 1);
			$links = '<li><a href="' . $this->pageRequest() . $next . '" aria-label="Next"> 
					  <span aria-hidden="true">&raquo;</span></a></li>';
			$links .= '<li><a href="' . $this->pageRequest() . $this->pages . '"> [' . $this->pages . '] </a></li>';

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
					$links .= "<li class='page-item'><a href='" . $this->pageRequest() .$i . "' class=" .$class . ">{$i}</a></li>";
				}
			}

			$links .= $this->next();
			$links .= '</ul>';

			return $links;
		}
	}
}