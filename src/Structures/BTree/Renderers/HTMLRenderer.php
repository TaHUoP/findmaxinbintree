<?php

namespace TaHUoP\Structures\BTree\Renderers;


use TaHUoP\Contracts\Structures\BTree\Renderer;
use TaHUoP\Structures\BTree\BTree;
use TaHUoP\Structures\BTree\BNode;

class HTMLRenderer implements Renderer
{
    private function renderNode(BNode $node = null)
    {
        echo '<li>';
        if ($node) {
            echo '<a>' . $node->getValue() . '</a>';
            $this->renderChildren($node);
        }
        echo '</li>';
    }

    private function renderChildren(BNode $node)
    {
        if (!$node->hasChildren())
            return;

        echo '<ul>';
        foreach ($node->getChildren() as $child) {
            $this->renderNode($child);
        }
        echo '</ul>';
    }

    public function render(BTree $tree)
    {
        echo '<link rel="stylesheet" type="text/css" href="assets/btree.css">';

        echo '<div class="tree"><ul>';
        $this->renderNode($tree->getRoot());
        echo '</ul></div>';
    }
}