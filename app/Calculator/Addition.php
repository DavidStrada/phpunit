<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Addition extends OperationAbsctract implements OperationInterface
{
    public function calculate()
    {
        $this->emptyItemsException();

        return array_sum($this->items);
    }

}
