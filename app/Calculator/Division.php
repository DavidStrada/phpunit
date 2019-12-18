<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperationAbsctract implements OperationInterface
{
    public function calculate()
    {
        $this->emptyItemsException();

        return array_reduce(array_filter($this->items), function ($a, $b) {
            // first run $a will be null, $b will be first value on array.
            if (!is_null($a)) {
                return $a / $b;
            }
            return $b;
        });

    }
}
