<?php

namespace TaHUoP\Structures\BTree\Importers;


use TaHUoP\Contracts\Structures\BTree\Importer;
use TaHUoP\Structures\BTree\BTree;
use TaHUoP\Structures\BTree\BNode;

class RandomImporter implements Importer
{
    private $nodes_num = 0;
    private $min_node_value = 0;
    private $max_node_value = 0;

    public function __construct($nodes_num = null, $min_node_value = null, $max_node_value = null)
    {
        $this->nodes_num = $nodes_num;
        $this->min_node_value = $min_node_value;
        $this->max_node_value = $max_node_value;
    }

    private function createNode()
    {
        return new BNode(mt_rand($this->min_node_value, $this->max_node_value));
    }

    public function import(): BTree
    {
        $tree = new BTree();

        $nodes_number = $this->nodes_num;

        $root = $this->createNode();
        $tree->setRoot($root);
        $nodes_number--;

        $add_child_nodes = function (array $nodes) use (&$nodes_number, &$add_child_nodes) {
            $new_nodes = [];

            foreach ($nodes as $node) {
                if ($nodes_number) {
                    $node->setLeftChild($this->createNode());
                    $nodes_number--;
                    $new_nodes []= $node->getLeftChild();
                }
                if ($nodes_number) {
                    $node->setRightChild($this->createNode());
                    $nodes_number--;
                    $new_nodes []= $node->getRightChild();
                }
            }

            if ($nodes_number) {
                $add_child_nodes($new_nodes);
            }
        };

        while ($nodes_number > 0) {
            $add_child_nodes([$root]);
        }

        return $tree;
    }
}