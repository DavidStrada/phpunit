<?php

namespace App\Support;
use Countable, IteratorAggregate, ArrayIterator, JsonSerializable;

class Collection implements Countable, IteratorAggregate, JsonSerializable
{
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get()
    {
        return $this->items;
    }

    public function count()
    {
        return count($this->items);
    }

    public function getIterator() : ArrayIterator
    {
         return new ArrayIterator($this->items);
    }

    public function add(array $items)
    {
        $this->items = array_merge($this->items, $items);
    }

    public function merge(Collection $collection)
    {
        // return new Collection(array_merge($this->get(), $collection->get()));
        return $this->add($collection->get());
    }

    public function toJson()
    {
        return json_encode($this->items);
    }

    public function jsonSerialize()
    {
        return $this->items;
    }
}
