<?php

namespace test;

class MiscTest extends TestCase
{
    public function testBase64loader()
    {
        $this->load('misc.base64');

        $this->assertTrue(function_exists('base64encode'));
        $this->assertTrue(function_exists('base64decode'));
    }

    /**
     * @depends testBase64loader
     */
    public function testBase64encode()
    {
        $this->assertEmpty(base64encode(''));
        $this->assertEquals('YXBwbGU=', base64encode('apple'));
        $this->assertEquals(base64_encode('15'), base64encode(15));
        $this->assertEquals(
            base64_encode('म नेपाली'),
            base64encode('म नेपाली'),
            'with unicode #1'
        );
        $this->assertEquals(base64encode(1234), base64encode('1234'));
        $this->assertEquals(
            base64encode('हाम्रो नेपाल'),
            base64encode(base64_decode('4KS54KS+4KSu4KWN4KSw4KWLIOCkqOClh+CkquCkvuCksg==')),
            'with unicode #2'
        );
    }

    /**
     * @depends testBase64loader
     */
    public function testBase64decode()
    {
        $this->assertEquals('apple', base64decode('YXBwbGU='));
        $this->assertEquals('bowl', base64decode('Ym93bA=='));
        $this->assertEquals(
            'हाम्रो नेपाल',
            base64decode('4KS54KS+4KSu4KWN4KSw4KWLIOCkqOClh+CkquCkvuCksg=='),
            'with unicode #1'
        );
        $this->assertEquals(
            base64_decode(base64_encode('15k')),
            base64decode(base64_encode('15k'))
        );
        $this->assertEquals(
            base64_decode('c29tZSBnaWJiZXJpc2g='),
            base64decode('c29tZSBnaWJiZXJpc2g=')
        );
    }

    /**
     * @depends testBase64loader
     * @expectedException \InvalidArgumentException
     */
    public function testBase65encodeException()
    {
        base64encode([]);
    }

    /**
     * @depends testBase64loader
     * @expectedException \InvalidArgumentException
     */
    public function testBase65decodeException()
    {
        base64decode(new \stdClass());
    }

    public function testPalindromeloader()
    {
        $this->load('misc.palindrome');

        $this->assertTrue(function_exists('is_palindrome'));
    }

    /**
     * @depends testPalindromeloader
     */
    public function testIsPalindrome()
    {
        $this->assertTrue(is_palindrome('liril'), 'w/o case');
        $this->assertTrue(is_palindrome('LiRrIl'), 'w/ case');
        $this->assertFalse(is_palindrome('l ir il', true), 'with consider whitespace');
        $this->assertTrue(is_palindrome('l ir il', false), 'with ignore whitespace');
        $this->assertTrue(is_palindrome('Madam im Adam', false), 'w/ case and ignore whitespace');
    }

    /**
     * @depends testPalindromeloader
     * @expectedException \InvalidArgumentException
     */
    public function testIsPalindromeException()
    {
        is_palindrome([]);
    }
}
