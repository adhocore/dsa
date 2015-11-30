<?php

namespace test;

class MathsTest extends TestCase
{
    public function testConvertBase()
    {
        $this->load('maths.base');

        $this->assertEquals('451', convert_base('1213', 8, 6), 'convert 1213 to base 8 from base 6');
        $this->assertEquals('A', convert_base('10', 16, 10), 'convert 10 to base 16 from base 10');
        $this->assertEquals(
            base_convert('1111', 2, 10), 
            convert_base('1111', 10, 2), 
            'convert 1111 to base 10 from base 2 [assert against native base_convert()]'
        );
    }

    /**
     * @depends testConvertBase 
     * @expectedException \InvalidArgumentException
     */
    public function testConvertBaseException()
    {
        convert_base('A', 10, 2);
    }

    /**
     * @depends testConvertBaseException 
     * @expectedException \InvalidArgumentException
     */
    public function testConvertBaseException2()
    {
        convert_base('1234', 1, 10);
    }

    public function testExponentiation()
    {
        $this->load('maths.exponentiation_by_square');

        $this->assertEquals(16, exponentiation_by_square(2, 4), '2 to the power 4');
        $this->assertEquals(pow(3, 3), exponentiation_by_square(3, 3), '3 to the power 3');
    }

    public function testFactorial()
    {
        $this->load('maths.factorial');

        $this->assertEquals(5*4*3*2*1, factorial(5), 'factorial of 5 (5!)');
        $this->assertEquals(40320, factorial(8), 'factorial of 8 (8!)');
    }

    public function testFibonacci()
    {
        $this->load('maths.fibonacci');

        $this->assertEquals(5, fibonacci(5), '5th fibonacci');
        // $this->assertEquals(1, fibonacci(-5), '-5th fibonacci');
        $this->assertEquals(21, fibonacci(8), '8th fibonacci');
    }

    public function testGreaestCommonDivisor()
    {
        $this->load('maths.greatest_common_divisor');

        $this->assertEquals(5, greatest_common_divisor(10, 15), 'gcd(10, 15)');
        $this->assertEquals(6, greatest_common_divisor(12, 18), 'gcd(12, 18)');
    }
}
