<?php

namespace app\models;

use app\traits\Links;

class Paginate 
{
    use Links;
    
    private $page;
    private $perPage;
    private $offset;
    private $pages;
    private $records;

    private function current() 
    {
        $this->page = $_GET['page'] ?? 1;
    }

    private function perPage($perPage) 
    {
        $this->perPage = $perPage ?? 30;
    }

    private function offset()
    {
        $this->offset = ($this->page * $this->perPage) - $this->perPage;
    }

    public function records($records)
    {
        $this->records = $records;
    }

    private function pages()
    {
        $this->pages = ceil($this->records / $this->perPage);
    }

    public function sqlPaginate()
    {
        return " limit {$this->perPage} offset {$this->offset}";
    }

    public function paginate($perPage) 
    {
        $this->current();
        $this->perPage($perPage);
        $this->offset();
        $this->pages();

        // return $this;

    }
}