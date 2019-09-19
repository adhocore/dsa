<?php

namespace data\struct;

/**
 * Node with data and next attribute.
 */
class SinglyNode
{
    public $data;

    /** @var SinglyNode */
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

/**
 * Class LinkedList.
 *
 * @link https://en.wikipedia.org/wiki/Linked_list.
 */
class LinkedList
{
    /** @var SinglyNode */
    protected $head;

    protected $count;

    public function __construct()
    {
        $this->count = 0;
    }

    /**
     * Adds a node to the list.
     *
     * @param mixed $item
     *
     * @return int The size of list
     */
    public function add($item)
    {
        if (!$item instanceof SinglyNode) {
            $item = new SinglyNode($item);
        }
        if (!$this->head) {
            $this->head = $item;

            return $this->count++;
        }

        $current = $this->head;
        while ($current->next) {
            $current = $current->next;
        }

        $current->next = $item;

        return $this->count++;
    }

    /**
     * Gets a node at given index.
     *
     * @param int $index
     *
     * @return SinglyNode|null Node if exist, or null
     */
    public function get($index)
    {
        if ($index < 0 or $index > $this->count) {
            return;
        }

        $current = $this->head;
        while ($index--) {
            $current = $current->next;
        }

        return $current;
    }

    /**
     * Count the list items.
     *
     * @return int The count of items
     */
    public function count()
    {
        return $this->count;
    }
}
