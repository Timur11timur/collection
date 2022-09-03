<?php

namespace Tests;

use App\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /** @test */
    public function it_creates_collection()
    {
        $items = ['one', 'two', 'three'];

        $this->assertInstanceOf(Collection::class, Collection::make($items));
        $this->assertInstanceOf(Collection::class, new Collection($items));
    }

    /** @test */
    public function it_wraps_an_array_of_items()
    {
        $items = ['one', 'two', 'three'];

        $this->assertCount(3, Collection::make($items));
    }
}
