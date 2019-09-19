<?php

namespace test\data;

use data\struct\DoublyLinkedList as DLL;
use data\struct\DoublyNode as DN;
use data\struct\LinkedList as LL;
use data\struct\SinglyNode as SN;
use test\TestCase;

class StructTest extends TestCase
{
    public function testLinkedList()
    {
        $l = new LL();

        $this->assertInstanceOf(LL::class, $l);
        $this->assertEquals(0, $l->count());

        $i = $l->add($a = 124);
        $this->assertEquals(0, $i);
        $this->assertEquals(1, $l->count());
        $this->assertInstanceOf(SN::class, $li = $l->get($i));
        $this->assertEquals($a, $l->get($i)->data);

        $j = $l->add($b = '123 str');
        $this->assertEquals(1, $j);
        $this->assertEquals(2, $l->count());
        $this->assertInstanceOf(SN::class, $lj = $l->get($j));
        $this->assertEquals($b, $l->get($j)->data);

        $this->assertSame($lj, $li->next);
        $this->assertEquals(null, $lj->next);
    }

    public function testDoublyLinkedList()
    {
        $l = new DLL();

        $this->assertInstanceOf(DLL::class, $l);
        $this->assertEquals(0, $l->count());

        $i = $l->add($a = 124);
        $this->assertEquals(0, $i);
        $this->assertEquals(1, $l->count());
        $this->assertInstanceOf(DN::class, $li = $l->get($i));
        $this->assertEquals($a, $l->get($i)->data);

        $j = $l->add($b = '123 str');
        $this->assertEquals(1, $j);
        $this->assertEquals(2, $l->count());
        $this->assertInstanceOf(DN::class, $lj = $l->get($j));
        $this->assertEquals($b, $l->get($j)->data);

        $this->assertSame($lj, $li->next);
        $this->assertSame($li, $lj->prev);
        $this->assertEquals(null, $lj->next);
        $this->assertEquals(null, $li->prev);
    }
}
