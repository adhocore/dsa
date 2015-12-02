<?php

namespace test\tree;

use test\TestCase;
use tree\bst\BST;
use tree\bst\Node;

class BstTest extends TestCase
{
    public function testRoot()
    {
        $root = new Node($k = 100, $v = 'root node');

        $this->assertInstanceOf(Node::class, $root);
        $this->assertEquals(null, $root->right);
        $this->assertEquals(null, $root->left);
        $this->assertEquals($k, $root->key);
        $this->assertEquals($v, $root->value);

        return $root;
    }

    /**
     * @depends testRoot
     */
    public function testInsert($root)
    {
        $bst = new BST();
        $this->assertInstanceOf(BST::class, $bst);

        $bst->insert($root, $k1 = 12, $v1 = 'should go to left of root');
        $this->assertInstanceOf(Node::class, $left1 = $root->left);
        $this->assertEquals($v1, $left1->value);

        $bst->insert($root, $k2 = 120, $v2 = 'should go to right of root');
        $this->assertInstanceOf(Node::class, $right1 = $root->right);
        $this->assertEquals($v2, $right1->value);

        $bst->insert($right1, $k3 = 15, $v3 = 'should go to left of right1');
        $this->assertInstanceOf(Node::class, $left2 = $right1->left);
        $this->assertEquals($v3, $left2->value);

        $bst->insert($left1, $k4 = 110, $v4 = 'should go to right of left1');
        $this->assertInstanceOf(Node::class, $right2 = $left1->right);
        $this->assertEquals($v4, $right2->value);

        return compact(
            'root', 'right1', 'right2', 'left1', 'left2',
            'v1', 'v2', 'v3', 'v4', 'k1', 'k2', 'k3', 'k4'
        );
    }

    /**
     * @depends testInsert
     */
    public function testSearch($data)
    {
        extract($data);

        $bst = new BST();

        $this->assertSame($root, $search0 = $bst->search($root, $k = 100));
        $this->assertEquals('root node', $search0->value);
        $this->assertEquals($k, $search0->key);

        $this->assertSame($left1, $search1 = $bst->search($root, $k1));
        $this->assertSame($search0->left, $bst->search($root, $k1));
        $this->assertEquals($k1, $search1->key);
        $this->assertEquals($v1, $search1->value);

        $this->assertSame($right1, $search2 = $bst->search($root, $k2));
        $this->assertSame($search0->right, $search2);
        $this->assertEquals($k2, $search2->key);
        $this->assertEquals($v2, $search2->value);

        $this->assertSame($left2, $search3 = $bst->search($right1, $k3));
        $this->assertSame($right1->left, $search3);
        $this->assertEquals($k3, $search3->key);
        $this->assertEquals($v3, $search3->value);

        $this->assertSame($right2, $search4 = $bst->search($left1, $k4));
        $this->assertSame($left1->right, $search4);
        $this->assertEquals($k4, $search4->key);
        $this->assertEquals($v4, $search4->value);
    }
}
