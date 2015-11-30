<?php

namespace data\type;

/**
 * LIFO data type.
 */
class Stack
{
    protected $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    /**
     * Push item to the stack.
     * 
     * @param mixed $item
     */
    public function push($item)
    {
        array_push($this->stack, $item);
    }

    /**
     * Pop the latest item off the stack, shortening the stack.
     * 
     * @return mixed $item 
     */
    public function pop()
    {
        return array_pop($this->stack);
    }

    /**
     * Check the latest item of the stack without removing.
     * 
     * @return mixed $item
     */
    public function peek()
    {
        return end($this->stack);
    }
}
