<?php

namespace TaHUoP\Structures\BTree;

class BTree
{
    /**
     * @var BNode
     */
    private $root;

    public function __construct(BNode $root = null)
    {
        $this->root = $root;
    }

    /**
     * @return null|BNode
     */
    public function getRoot() : ?BNode
    {
        return $this->root;
    }

    /**
     * @param BNode $node
     */
    public function setRoot(BNode $node) : void
    {
        $this->root = $node;
    }

    /**
     * @return array
     */
    public function findMaxSum()
    {
        $dfs = function (BNode $node, callable $visitor, $default = null) use (&$dfs) {
            return $visitor(
                $node,
                $node->getLeftChild() ? $dfs($node->getLeftChild(), $visitor, $default) : $default,
                $node->getRightChild() ? $dfs($node->getRightChild(), $visitor, $default) : $default
            );
        };

        $visitor = function (BNode $node, $left_result, $right_result) {
            return [
                'max' => max($node->getValue(), $left_result['max'], $right_result['max']),
                'sum' => max(
                    $node->getValue() + $left_result['max'] + $right_result['max'],
                    $left_result['sum'],
                    $right_result['sum']
                ),
            ];
        };

        return $dfs($this->getRoot(), $visitor, [
            'sum' => -INF,
            'max' => -INF,
        ]);
    }
}