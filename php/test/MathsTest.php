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

        // cross assertion
        $this->assertEquals(
            '123123',
            convert_base(convert_base('123123', 2, 4), 4, 2),
            'cross assert 123123'
        );
        $this->assertEquals(
            'ABC',
            convert_base(convert_base('ABC', 16, 24), 24, 16),
            'cross assert ABC'
        );
        $this->assertEquals(
            '273615',
            convert_base(convert_base('273615', 32, 8), 8, 32),
            'cross assert 273615'
        );

        $map = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $len = strlen($map) + 1;
        // frombase
        for ($i = 2; $i < $len; $i++) {
            $pool = substr($map, 0, $i);
            // tobase
            for ($j = 2; $j < $len; $j++) {
                $num  = '';
                $size = rand(1, ($i > 9 or $j > 9) ? 5 : 8);
                while ($size--) {
                    $num .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
                }

                // validate
                $num = ltrim($num, '0');
                if (empty($num)) {
                    continue;
                }
                $actual   = convert_base($num, $j, $i);
                $expected = base_convert($num, $i, $j);

                // assert
                $this->assertEquals(
                    strtolower($expected),
                    strtolower($actual),
                    sprintf('convert %s to base %d from base %d [assert against native base_convert()]', $num, $j, $i)
                );
            }
        }
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
        $this->assertEquals(1, exponentiation_by_square(rand(1, 100), 0), '* to the power 0');
        $this->assertEquals(1 / 2, exponentiation_by_square(2, -1), '2 to the power -1');
    }

    /**
     * @depends testExponentiation
     * @expectedException \InvalidArgumentException
     */
    public function testExponentiationException()
    {
        exponentiation_by_square('str', 2);
    }

    /**
     * @depends testExponentiation
     * @expectedException \InvalidArgumentException
     */
    public function testExponentiationException2()
    {
        exponentiation_by_square(2, 'str');
    }

    public function testFactorial()
    {
        $this->load('maths.factorial');

        $this->assertEquals(5 * 4 * 3 * 2 * 1, factorial(5), 'factorial of 5 (5!)');
        $this->assertEquals(40320, factorial(8), 'factorial of 8 (8!)');
        $this->assertEquals(1, factorial(0), 'factorial of 0 (0!)');
        $this->assertEquals(1, factorial(1), 'factorial of 0 (1!)');
    }

    /**
     * @depends testFactorial
     * @expectedException \InvalidArgumentException
     */
    public function testFactorialException()
    {
        factorial('str');
    }

    public function testFibonacciLoader()
    {
        $this->load('maths.fibonacci');

        $this->assertTrue(function_exists('fibonacci'));
        $this->assertTrue(function_exists('fibonacci_series'));
    }

    /**
     * @depends testFibonacciLoader
     */
    public function testFibonacci()
    {
        $this->assertEquals(0, fibonacci(0), '0th fibonacci');
        $this->assertEquals(5, fibonacci(5), '5th fibonacci');
        $this->assertEquals(21, fibonacci(8), '8th fibonacci');

        $this->assertEquals(5, fibonacci(-5), '-5th fibonacci');
        $this->assertEquals(0 - fibonacci(8), fibonacci(-8), '-8th fibonacci');
    }

    /**
     * @depends testFibonacciLoader
     */
    public function testFibonacciSeries()
    {
        $expected = [0, 1, 1, 2, 3];
        $this->assertEquals($expected, fibonacci_series(count($expected) - 1), sprintf('1st %d fibonacci_series', count($expected) - 1));

        $expected = [0, 1];
        $this->assertEquals($expected, fibonacci_series(count($expected) - 1), sprintf('1st %d fibonacci_series', count($expected) - 1));

        $expected = [0, 1, 1, 2, 3, 5, 8, 13, 21];
        $this->assertEquals($expected, fibonacci_series(count($expected) - 1), sprintf('1st %d fibonacci_series', count($expected) - 1));

        $expected = [-5 => 5, -4 => -3, -3 => 2, -2 => -1, -1 => 1, 0 => 0];
        $this->assertEquals($expected, fibonacci_series(-5), sprintf('1st %d fibonacci_series', -5));
    }

    /**
     * @depends testFibonacciLoader
     * @expectedException \InvalidArgumentException
     */
    public function testFibonacciException()
    {
        fibonacci('str');
    }

    /**
     * @depends testFibonacciLoader
     * @expectedException \InvalidArgumentException
     */
    public function testFibonacciSeriesException()
    {
        fibonacci_series('str');
    }

    public function testGreatestCommonDivisor()
    {
        $this->load('maths.greatest_common_divisor');

        $this->assertEquals(5, greatest_common_divisor(10, 15), 'gcd(10, 15)');
        $this->assertEquals(6, greatest_common_divisor(12, 18), 'gcd(12, 18)');
    }

    /**
     * @depends testGreatestCommonDivisor
     * @expectedException \InvalidArgumentException
     */
    public function testGreatestCommonDivisorException()
    {
        greatest_common_divisor('str', 5);
    }

    /**
     * @depends testGreatestCommonDivisor
     * @expectedException \InvalidArgumentException
     */
    public function testGreatestCommonDivisorException2()
    {
        greatest_common_divisor(5, 'str');
    }

    public function testPrimeLoader()
    {
        $this->load('maths.primes');

        $this->assertTrue(function_exists('prime'));
        $this->assertTrue(function_exists('primes'));
        $this->assertTrue(function_exists('is_prime'));
    }

    /**
     * @depends testPrimeLoader
     * @expectedException \InvalidArgumentException
     */
    public function testPrimeException()
    {
        prime('str');
    }

    /**
     * @depends testPrimeLoader
     */
    public function testPrime()
    {
        $this->assertEquals(2, prime(1), '1st prime number');
        $this->assertEquals(29, prime(10), '10th prime number');
        $this->assertEquals(7919, prime(1000), '1000th prime number');
    }

    /**
     * @depends testPrimeLoader
     */
    public function testPrimes()
    {
        $expected = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29];
        $this->assertEquals($expected, primes(count($expected)), sprintf('1st %d prime numbers', count($expected)));

        $expected = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71];
        $this->assertEquals($expected, primes(count($expected)), sprintf('1st %d prime numbers', count($expected)));
    }

    /**
     * @depends testPrimeLoader
     */
    public function testIsPrime()
    {
        $this->assertEquals(false, is_prime(10), '10 is not prime number');
        $this->assertTrue(is_prime(13), '13 is prime number');
        $this->assertFalse(is_prime(100), '100 is prime number');
        $this->assertTrue(!is_prime(1), '1 is not prime number');
    }

    /**
     * @depends testPrimeLoader
     * @expectedException \InvalidArgumentException
     */
    public function testPrimesException()
    {
        primes('str');
    }

    /**
     * @depends testPrimeLoader
     * @expectedException \InvalidArgumentException
     */
    public function testIsPrimeException()
    {
        is_prime('str');
    }
}
