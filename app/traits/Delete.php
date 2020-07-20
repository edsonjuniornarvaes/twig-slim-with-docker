<?php

namespace app\traits;

trait Delete{

    public function delete(){

        if(!isset($this->field) or !isset($this->value)){
            throw new \Exception("Antes de fazer o update, por favor chame o find");
        }

        $sql = "delete from {$this->table} where {$this->field} = :{$this->field}";
        $delete = $this->connect->prepare($sql);
        $delete->bindValue($this->field,$this->value);
        $delete->execute();

        return $delete->rowCount();

    }

}