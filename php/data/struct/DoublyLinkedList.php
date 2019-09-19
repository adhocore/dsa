<?php

namespace data\struct;

/**
 * Node with data, prev and next attributes.
 */
class DoublyNode
{
    public $data;

    /** @var DoublyNode */
    public $prev;

    /** @var DoublyNode */
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

/**
 * Class DoublyLinkedList.
 *
 * @link https://en.wikipedia.org/wiki/Doubly_linked_list.
 */
class DoublyLinkedList
{
    /** @var DoublyNode */
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
        if (!$item instanceof DoublyNode) {
            $item = new DoublyNode($item);
        }
        if (!$this->head) {
            $this->head = $item;

            return $this->count++;
        }

        $current = $this->head;
        while ($current->next) {
            $current = $current->next;
        }

        $item->prev    = $current;
        $current->next = $item;

        return $this->count++;
    }

    /**
     * Gets a node at given index.
     *
     * @param int $index
     *
     * @return DoublyNode|null Node if exist, or null
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
