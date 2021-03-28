<?php

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    public $functions;

    public function setUp() : void
    {
        $this->functions = new Functions();
    }

    public function testFreqCount()
    {
        $nesting = 0;
        $this->assertEquals([4], $this->functions->freqCount([1, 1, 1, 1], 1));
		$this->assertEquals([2], $this->functions->freqCount([1, 1, 2, 2], 1));
		$this->assertEquals([2, 1], $this->functions->freqCount([1, 1, 2, [1]], 1));
		$this->assertEquals([2, 0, 1], $this->functions->freqCount([1, 1, 2, [[1]]], 1));
		$this->assertEquals([0, 0, 1], $this->functions->freqCount([[[1]]], 1));
		$this->assertEquals([1, 2, 3], $this->functions->freqCount([1, 4, 4, [1, 1, [1, 2, 1, 1]]], 1));
		$this->assertEquals([3, 4, 0], $this->functions->freqCount([1, 5, 5, [5, [1, 2, 1, 1], 5, 5], 5, [5]], 5));
		$this->assertEquals([0, 1, 1, 1, 1], $this->functions->freqCount([1, [2], 1, [[2]], 1, [[[2]]], 1, [[[[2]]]]], 2));
    }

    public function testFreqCountToKeyIsArray()
    {
        $this->assertEquals([[0, 4]], $this->functions->freqCountToKeyIsArray([1, 1, 1, 1], 1));
		$this->assertEquals([[0, 2]], $this->functions->freqCountToKeyIsArray([1, 1, 2, 2], 1));
		$this->assertEquals([[0, 2], [1, 1]], $this->functions->freqCountToKeyIsArray([1, 1, 2, [1]], 1));
		$this->assertEquals([[0, 2], [1, 0], [2, 1]], $this->functions->freqCountToKeyIsArray([1, 1, 2, [[1]]], 1));
		$this->assertEquals([[0, 0], [1, 0], [2, 1]], $this->functions->freqCountToKeyIsArray([[[1]]], 1));
		$this->assertEquals([[0, 1], [1, 2], [2, 3]], $this->functions->freqCountToKeyIsArray([1, 4, 4, [1, 1, [1, 2, 1, 1]]], 1));
		$this->assertEquals([[0, 3], [1, 4], [2, 0]], $this->functions->freqCountToKeyIsArray([1, 5, 5, [5, [1, 2, 1, 1], 5, 5], 5, [5]], 5));
		$this->assertEquals([[0, 0], [1, 1], [2, 1], [3, 1], [4, 1]], $this->functions->freqCountToKeyIsArray([1, [2], 1, [[2]], 1, [[[2]]], 1, [[[[2]]]]], 2));
    }

    public function testAbacaba()
    {
        $this->assertEquals('A', $this->functions->abacaba(1));
        $this->assertEquals('ABA', $this->functions->abacaba(2));
        $this->assertEquals('ABACABA', $this->functions->abacaba(3));
        $this->assertEquals('ABACABADABACABA', $this->functions->abacaba(4));
        $this->assertEquals('ABACABADABACABAEABACABADABACABA', $this->functions->abacaba(5));
        $this->assertEquals('ABACABADABACABAEABACABADABACABAFABACABADABACABAEABACABADABACABA', $this->functions->abacaba(6));
    }

    public function testIterativeFactorial()
    {
        $this->assertEquals(number_format(1, 0), $this->functions->iterativeFactorial(1));
        $this->assertEquals(number_format(2, 0), $this->functions->iterativeFactorial(2));
        $this->assertEquals(number_format(6, 0), $this->functions->iterativeFactorial(3));
        $this->assertEquals(number_format(5040, 0), $this->functions->iterativeFactorial(7));
        $this->assertEquals(number_format(121645100408832000, 0), $this->functions->iterativeFactorial(19));
        // $this->assertEquals(number_format(10333147966386144929666651337523200000000, 0), $this->functions->iterativeFactorial(35));
        // $this->assertEquals(number_format(2658271574788448768043625811014615890319638528000000000, 0), $this->functions->iterativeFactorial(44));
        // $this->assertEquals(number_format(119622220865480194561963161495657715064383733760000000000, 0), $this->functions->iterativeFactorial(45));
    }

    public function testRecursiveFactorial()
    {
        $this->assertEquals(number_format(1, 0), $this->functions->recursiveFactorial(1));
        $this->assertEquals(number_format(2, 0), $this->functions->recursiveFactorial(2));
        $this->assertEquals(number_format(6, 0), $this->functions->recursiveFactorial(3));
        $this->assertEquals(number_format(5040, 0), $this->functions->recursiveFactorial(7));
        $this->assertEquals(number_format(121645100408832000, 0), $this->functions->recursiveFactorial(19));
        // $this->assertEquals(number_format(10333147966386144929666651337523200000000, 0), $this->functions->recursiveFactorial(35));
        // $this->assertEquals(number_format(2658271574788448768043625811014615890319638528000000000, 0), $this->functions->recursiveFactorial(44));
        // $this->assertEquals(number_format(119622220865480194561963161495657715064383733760000000000, 0), $this->functions->recursiveFactorial(45));
    }

    public function tearDown() : void
    {
        $this->functions = null;
    }
    
}