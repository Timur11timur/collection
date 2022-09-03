<?php

namespace App;

use Countable;

class Collection implements Countable
{
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public static function make(array $items): Collection
    {
        return new static($items);
    }

    public function count(): int
    {
        return count($this->items);
    }
}
