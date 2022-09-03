<?php

namespace Tests;

use App\Collection;
use IteratorAggregate;
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

    /** @test */
    public function it_mimics_an_array()
    {
        $items = ['one', 'two', 'three'];

        $collection = Collection::make($items);

        $this->assertEquals('one', $collection[0]);
        $this->assertEquals('two', $collection[1]);
        $this->assertEquals('three', $collection[2]);

        $collection[3] = 'four';
        $this->assertEquals('four', $collection[3]);

        $collection[] = 'five';
        $this->assertEquals('five', $collection[4]);

        $collection[4] = 'six';
        $this->assertEquals('six', $collection[4]);

        $this->assertTrue(isset($collection[4]));
        unset($collection[4]);
        $this->assertFalse(isset($collection[4]));
    }

    /** @test */
    public function it_can_be_iterated()
    {
        $items = ['one', 'two', 'three'];

        $collection = Collection::make($items);

        $this->assertInstanceOf(IteratorAggregate::class, $collection);

        foreach ($collection as $index => $item) {
            $this->assertEquals($items[$index], $item);
        }
    }
}
