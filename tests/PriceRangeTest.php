<?php

use PHPUnit\Framework\TestCase;

final class PriceRangeTest extends TestCase{

    public function testPriceRangeIterator(){

        $this->assertCount(2, [PriceRangeIterator::class, 'accept']);
    }
}