<?php

namespace data\type;

/**
 * FIFO data type.
 */
class Queue
{
    protected $queue;

    public function __construct()
    {
        $this->queue = [];
    }

    /**
     * Enqueue an item to the queue.
     * 
     * @param mixed $item
     */
    public function enqueue($item)
    {
        $this->queue[] = $item;
    }

    /**
     * Dequeue the first item from the queue.
     * 
     * @return mixed The first item of the queue    
     */
    public function dequeue()
    {
        return array_shift($this->queue);
    }
}
