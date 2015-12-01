<?php

namespace test;

class SearchTest extends TestCase
{
    /**
     * @dataProvider dataSrc
     */
    public function testBinarySearch($list, $item, $expected)
    {
        if (!function_exists('binary_search')) {
            $this->load('search.binary');
            $this->assertTrue(function_exists('binary_search'));
        }

        $this->assertEquals($expected, binary_search($list, $item));
    }

    /**
     * @dataProvider dataSrc
     */
    public function testLinearSearch($list, $item, $expected)
    {
        if (!function_exists('linear_search')) {
            $this->load('search.linear');
            $this->assertTrue(function_exists('linear_search'));
        }

        $this->assertEquals($expected, linear_search($list, $item));
    }

    public function dataSrc()
    {
        return [
            // name => [[list], item, expected]
            'search fail' => [[1, 3, 5], 10, null],
            'search ok #integer data' => [[1, 3, 5, 7, 9], 7, 3],
            'search ok #mixed data' => [[1, '3', 5, '7', 9, '11'], '11', 5],
            'search ok #mixed assoc list' => [['apple', 'ball'], 'ball', 1],
        ];
    }
}
