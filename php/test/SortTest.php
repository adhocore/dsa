<?php

namespace test;

class SortTest extends TestCase
{
    /** @test */
    public function bubble()
    {
        $this->doTest(__FUNCTION__);
    }

    /** @test */
    public function bucket()
    {
        $this->doTest(__FUNCTION__);
    }

    /** @test */
    public function insertion()
    {
        $this->doTest(__FUNCTION__);
    }

    /** @test */
    public function merge()
    {
        $this->doTest(__FUNCTION__);
    }

    /** @test */
    public function quick()
    {
        $this->doTest(__FUNCTION__);
    }

    /** @test */
    public function selection()
    {
        $this->doTest(__FUNCTION__);
    }

    /** @test */
    public function shell()
    {
        $this->doTest(__FUNCTION__);
    }

    protected function doTest($testcase, $cycles = 2)
    {
        $this->load('sort.'.$testcase);

        while ($cycles--) {
            $expected = $list = range(
                $a = rand(1, rand(10, 20)),
                $b = rand(31, rand(50, 60))
            );

            shuffle($list);
            $sortFunc = $testcase.'_sort';
            $actual = $sortFunc($list);

            $this->assertEquals($expected, $actual, "$sortFunc test with range($a, $b)");
        }
    }
}
