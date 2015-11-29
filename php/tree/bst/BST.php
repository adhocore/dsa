<?php

namespace DSA\Tree;

/**
 * Binary search tree.
 */
class BST
{
    public function search(Node $node, $key)
    {
        if ($node->key == $key) {
            return $node;
        } elseif ($key < $node->key) {
            return $node->left ? $this->search($node->left, $key) : null;
        } else {
            return $node->right ? $this->search($node->right, $key) : null;
        }
    }

    public function insert(/* Node */ &$root, $key, $value)
    {
        if (null !== $root and $root instanceof Node) {
            throw new \InvalidArgumentException('The root parameter must be null or instanceof Node');
        }
        if (!$root) {
            $root = new Node($key, $value);
        } elseif ($key < $root->key) {
            $this->insert($root->left, $key, $value);
        } else {
            $this->insert($root->right, $key, $value);
        }
    }
}
