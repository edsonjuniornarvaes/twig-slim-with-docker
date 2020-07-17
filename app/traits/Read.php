<?php

namespace app\traits;

trait Read {

    private $sql;

    public function select($fields = '*') {
        $this->sql = "select {$fields} from {$this->table}";

        return $this;
    }

    public function get() {
        $select = $this->bindAndExecute();
        return $select->fetchAll();
    }

    public function first() {
        $select = $this->bindAndExecute();
        return $select->fetch();
    }
    
    private function bindAndExecute() {
        $select = $this->connect->prepare($this->sql);
        $select->execute();

        return $select;
    }

}