<?php

namespace DSA\Tree;

/**
 * Node. Yes it has public attributes.
 */
class Node
{
    public $key;
    public $value;
    public $left;
    public $right;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}
