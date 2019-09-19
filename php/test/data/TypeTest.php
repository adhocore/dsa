<?php

namespace test\data;

use data\type\Queue;
use data\type\Stack;
use test\TestCase;

class TypeTest extends TestCase
{
    public function testQueue()
    {
        $q = new Queue();

        $this->assertInstanceOf(Queue::class, $q);

        $q->enqueue($a = 34);
        $q->enqueue($b = 'string');
        $q->enqueue($c = new \stdClass());
        $q->enqueue($d = [1, 'str', new \stdClass(), [2, 'C']]);

        $this->assertEquals(4, $q->count());
        $this->assertEquals($a, $q->dequeue());
        $this->assertEquals(3, $q->count());
        $this->assertEquals($b, $q->dequeue());
        $this->assertEquals(2, $q->count());
        $this->assertEquals($c, $q->dequeue());
        $this->assertEquals(1, $q->count());
        $this->assertEquals($d, $q->dequeue());
        $this->assertEquals(0, $q->count());

        $q->enqueue($e = json_encode(compact('a', 'b', 'c')));
        $this->assertEquals(1, $q->count());
        $this->assertEquals($e, $q->dequeue());
        $this->assertEquals(0, $q->count());
    }

    public function testStack()
    {
        $q = new Stack();

        $this->assertInstanceOf(Stack::class, $q);

        $q->push($a = 34);
        $q->push($b = 'string');
        $q->push($c = new \stdClass());
        $q->push($d = [1, 'str', new \stdClass(), [2, 'C']]);

        $this->assertEquals(4, $q->count());
        $this->assertEquals($d, $q->pop());
        $this->assertEquals(3, $q->count());
        $this->assertEquals($c, $q->pop());
        $this->assertEquals(2, $q->count());
        $this->assertEquals($b, $q->pop());
        $this->assertEquals(1, $q->count());
        $this->assertEquals($a, $q->pop());
        $this->assertEquals(0, $q->count());

        $q->push($e = json_encode(compact('a', 'b', 'c')));
        $this->assertEquals(1, $q->count());
        $this->assertEquals($e, $q->peek());
        $this->assertEquals(1, $q->count());
        $this->assertEquals($e, $q->pop());
        $this->assertEquals(0, $q->count());
    }
}
