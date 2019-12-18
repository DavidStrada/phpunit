<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

abstract class OperationAbsctract
{
    protected $items;

    public function setOperands($items)
    {
        $this->items = $items;
    }
    public function emptyItemsException()
    {
        if(empty($this->items)) {
            throw new NoOperandsException;
        }
    }
}
